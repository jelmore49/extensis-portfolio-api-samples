# Imports

from base64 import b64encode
from Crypto.Cipher import PKCS1_v1_5
from Crypto.PublicKey import RSA
from json import dumps, load
from random import choice, randint
import os
import requests

# Constants

SERVER_HTTP_PORT = "8090"  # Default port
SERVER_HTTPS_PORT = "9443"  # Default port
USE_HTTPS = False
USE_API_TOKEN = True

REQUEST_HEADERS = {'Accept': 'application/json, text/plain, */*',
                   'Content-Type': 'application/json;charset=UTF-8'}

ASSETS_FOLDER = "Originals"  # Folder to save downloaded assets on disk
PREVIEWS_FOLDER = "Previews"  # Folder to save downloaded previews on disk
METADATA_FOLDER = "Metadata"  # Folder to save downloaded metadata on disk


# Functions
# Functions with "/" in their signature will only accept parameters to the left of / as positional
# Functions with "*" in their signature will only accept parameters to the right of * as keywords
# If you break these rules, you will get a TypeError

def get_asset(server_url: str, /, catalog_id: str, session: str, record_id: int) -> dict:
    """Returns the Asset with the record ID of record_id"""
    request_url = f"{server_url}/api/v1/catalog/{catalog_id}/asset/?session={session}"
    request_body = {'pageSize': 1,
                    'startingIndex': 0,
                    'sortOptions': {'field': "RID", 'order': "asc"},
                    'term': {'operator': "assetsById", 'values': [record_id]}}

    try:
        request = requests.post(request_url, data=dumps(request_body), headers=REQUEST_HEADERS)
        request.raise_for_status()
    except requests.exceptions.ConnectionError:
        print(f"ERROR: get_asset() failed to connect to {request_url}\n")
        return {}
    else:
        response = request.json()
        return response['assets'][0]  # We get a list back so we return the first item


def get_asset_id(server_url: str, /, catalog_id: str, session: str, asset_index: int) -> int:
    """Returns the record ID of an Asset.
    Returns 0 if we can't connect to the server.
    Record IDs (RIDs) aren't entirely sequential; as records are deleted, the RIDs disappear.
    To avoid requesting a nonexistent record we use Portfolio's paging capabilities:
    we query the RIDs of the entire catalog, set the items per page to 1, sort the pages by RID,
    then get the asset_index-th page and return the RID of that item.
    """

    request_url = f"{server_url}/api/v1/catalog/{catalog_id}/asset/?session={session}"
    request_body = {'fields': ["Item ID"],
                    'pageSize': 1,
                    'startingIndex': asset_index,
                    'sortOptions': {'field': "RID", 'order': "asc"}}

    try:
        request = requests.post(request_url, data=dumps(request_body), headers=REQUEST_HEADERS)
        request.raise_for_status()
    except requests.exceptions.ConnectionError:
        print(f"ERROR: get_asset_id() failed to connect to {request_url}\n")
        return 0
    else:
        response = request.json()
        if response['totalNumberOfAssets'] == 0:
            print("ERROR: No assets are available.\n")
            return 0
        else:
            assets = response['assets']
            # We get a list back so we return the first item
            # The "id" field is a string so we make it an integer
            return int(assets[0]['id'])


def get_asset_ids_for_gallery(server_url: str, /, catalog_id: str, gallery_id: str, session: str) -> list:
    """Returns a list of record IDs for the records in a gallery.
    If there are more than 100 records, we return the first 100 IDs.
    Returns an empty list if we can't connect to the server.
    """

    request_url = f"{server_url}/api/v1/catalog/{catalog_id}/asset/?session={session}"
    request_body = {'fields': ["Item ID"],
                    'pageSize': 100,
                    'startingIndex': 0,
                    'galleryId': gallery_id,
                    'sortOptions': {'field': "RID", 'order': "asc"}
                    }

    try:
        request = requests.post(request_url, data=dumps(request_body), headers=REQUEST_HEADERS)
        request.raise_for_status()
    except requests.exceptions.ConnectionError:
        print(f"ERROR: get_asset_ids_for_gallery() failed to connect to {request_url}\n")
        return []
    else:
        response = request.json()
        response_assets = response['assets']  # We get a dict back so we get list of assets...
        return [int(asset['id']) for asset in response_assets]  # ...and return a list of the IDs


def get_catalog_asset_count(server_url: str, /, catalog_id: str, session: str) -> int:
    """Returns the number of assets in a catalog.
    Returns 0 if we can't connect to the server.
    """

    request_url = f"{server_url}/api/v1/catalog/{catalog_id}/asset/?session={session}"
    # All we want is the totalNumberOfAssets field in the response so we make the smallest query possible;
    # we're requesting a single field but we don't do anything with it
    request_body = {'fields': ["Filename"],  # If we don't specify at least one field, we get all of them
                    'pageSize': 1,
                    'startingIndex': 0,
                    'sortOptions': {'field': "Cataloged", 'order': "asc"}}

    try:
        request = requests.post(request_url, data=dumps(request_body), headers=REQUEST_HEADERS)
        request.raise_for_status()
    except requests.exceptions.ConnectionError:
        print(f"ERROR: get_catalog_asset_count() failed to connect to {request_url}\n")
        return 0
    else:
        response = request.json()
        return response['totalNumberOfAssets']


def get_catalogs(server_url: str, /, session: str) -> list:
    """Returns a list of available catalogs.
    Returns an empty list if we can't connect to the server.
    """

    request_url = f"{server_url}/api/v1/catalog?session={session}"

    try:
        request = requests.get(request_url)
        request.raise_for_status()
    except requests.exceptions.ConnectionError:
        print(f"ERROR: get_catalogs() failed to connect to {request_url}\n")
        return []
    else:
        return request.json()


def get_galleries_from_catalog(server_url: str, /, catalog_id: str, session: str) -> list:
    """Returns a list of available galleries.
    Returns an empty list if we can't connect to the server.
    """

    request_url = f"{server_url}/api/v1/catalog/{catalog_id}/galleries?session={session}"

    try:
        request = requests.get(request_url)
        request.raise_for_status()
    except requests.exceptions.ConnectionError:
        print(f"ERROR: get_galleries_from_catalog() failed to connect to {request_url}\n")
        return []
    else:
        return request.json()


def get_login_session(server_url: str, /, username: str, password: str) -> str:
    # Get the public key from the server
    server_public_key = get_public_key(server_url)

    # If it's False, we error out.
    if not server_public_key:
        print("ERROR: No public key found.")
        return ""

    # We create an encryptor with the server public key
    # We use PKCS1_v1_5 instead of PKCS1_OEAP because the latter adds padding that messes with our authentication
    encryptor = PKCS1_v1_5.new(server_public_key)
    # The encrypt() function requires a bytes-like object so we encode our password
    password_bytes = password.encode()
    # Encrypt the password
    enc_password = encryptor.encrypt(password_bytes)
    # Encode the result as Base64 and turn it into a string
    b64_password = b64encode(enc_password).decode()
    # Build our login URL
    request_url = f"{server_url}/api/v1/auth/login"
    # Set the request body to our username and encrypted password
    request_body = {'userName': username,
                    'encryptedPassword': b64_password}

    try:
        request = requests.post(request_url, data=dumps(request_body), headers=REQUEST_HEADERS)
        request.raise_for_status()
    except requests.exceptions.ConnectionError:
        print(f"ERROR: get_login_session() failed to connect to {request_url}\n")
        return ""
    else:
        response = request.json()

        if "session" in response:
            return response['session']
        elif "faultCode" in response:
            print(f"ERROR: could not log in. Fault code {response['faultCode']}, message is {response['message']}")
            return ""
        else:
            print(f"ERROR: could not log in, unknown error.")
            return ""


def get_public_key(server_url: str, /) -> RsaKey:
    """Returns an RsaKey of the Portfolio server's public key.
    Returns None if we can't connect to the server.
    """

    request_url = f"{server_url}/api/v1/auth/public-key"

    try:
        request = requests.get(request_url, headers=REQUEST_HEADERS)
        request.raise_for_status()
    except requests.exceptions.ConnectionError:
        print(f"ERROR: get_public_key() failed to connect to {request_url}\n")
        return None
    else:
        response = request.json()
        modulus = int(response['modulusBase16'], base=16)  # It's a hex string so we need to turn it into a base 10 int
        exponent = int(response['exponent'])
        return RSA.construct((modulus, exponent))


def logout(server_url: str, /, session: str) -> bool:
    """Logs out the user session.
    This isn't needed for API tokens, as they don't take up a Portfolio user seat, but you should
    do this for username/password logins so the seat is released.
    """

    # Sanity check; if we pass a session ID that starts with TOKEN then it's an API token
    #  and there's nothing for us to do.
    if session[0:5] == "TOKEN":
        print("We're using an API token so there's no seat to reclaim.")
        return True

    request_url = f"{server_url}/api/v1/auth/logout?session={session}"
    request_body = "{}"  # This is an empty dict so there's no reason to use dumps()

    try:
        request = requests.post(request_url, data=request_body, headers=REQUEST_HEADERS)
        request.raise_for_status()
    except requests.exceptions.ConnectionError:
        print(f"ERROR: logout() failed to connect to {request_url}\n")
        return False
    else:
        # Status code 204 indicates a successful logout
        if request.status_code == 204:
            return True
        else:
            print(f"Logout response is {request.status_code}")
            return False


def save_asset_metadata(*, asset: dict, folder_path: str):
    """Saves the metadata for the Asset in a tab-delimited text file to the folder specified by folder_path"""

    try:
        os.makedirs(folder_path)
    except OSError:
        if not os.path.isdir(folder_path):
            print(f"ERROR: Can't create {folder_path}")
            raise

    # We're only saving a subset of fields
    output_fields = ("Cataloged By", "Cataloged", "Created", "Directory Path", "Keywords",
                     "Last Modified", "Last Updated", "Updated By")
    asset_fields = asset['attributes']
    filename = f"{asset_fields['Filename'][0]} - Metadata.txt"

    with open(os.path.join(folder_path, filename), 'w') as metadata:
        for key in output_fields:
            if isinstance(asset_fields[key][0], int):
                # If it's an integer we write it directly
                metadata.write(f"{key}\t{asset_fields[key][0]}\n")
            else:
                # If it's not then we join the list (even one-item lists)
                metadata.write(f"{key}\t{','.join(asset_fields[key])}\n")


def save_asset_original(server_url: str, /, catalog_id: str, session, asset: dict, folder_path: str):
    """Saves the original file for the Asset to the folder specified by folder_path"""

    try:
        os.makedirs(folder_path)
    except OSError:
        if not os.path.isdir(folder_path):
            print(f"ERROR: Can't create {folder_path}")
            raise

    original_asset_id = asset['id']

    request_url = f"{server_url}/api/v1/catalog/{catalog_id}/asset/{original_asset_id}/_original?session={session}"
    filename = asset['attributes']['Filename'][0]

    try:
        request = requests.get(request_url)
        request.raise_for_status()
    except requests.exceptions.ConnectionError:
        print(f"ERROR: save_asset_original() failed to connect to {request_url}\n")
    else:
        response = request.content
        with open(os.path.join(folder_path, filename), 'wb') as original:
            original.write(response)


def save_asset_preview(server_url: str, /, catalog_id: str, session: str, asset: dict, folder_path: str):
    """Saves the JPEG preview for the Asset to the folder specified by folder_path"""

    try:
        os.makedirs(folder_path)
    except OSError:
        if not os.path.isdir(folder_path):
            print(f"ERROR: Can't create {folder_path}")
            raise

    preview_asset_id = asset['id']

    request_url = f"{server_url}/api/v1/catalog/{catalog_id}/asset/{preview_asset_id}/preview?session={session}"
    filename = f"Preview of {asset['attributes']['Filename'][0]}"

    try:
        request = requests.get(request_url)
        request.raise_for_status()
    except requests.exceptions.ConnectionError:
        print(f"ERROR: save_asset_preview() failed to connect to {request_url}\n")
    else:
        response = request.content
        with open(os.path.join(folder_path, filename), 'wb') as preview:
            preview.write(response)


#
# Show off what we can do
#

# Get server information. We're looking for a creds.json file
# with the same structure as the dict below. If we can't find it
# Then we use the placeholder info

try:
    with open('creds.json', 'r') as file:
        server_credentials = load(file)
except FileNotFoundError:
    print("ERROR: Can't find creds.json, using defaults")
    server_credentials = {
        'server': 'playground.extensis.com',  # This is the Extensis test server
        'token': 'TOKEN-e554ed0f-5438-4576-bfc4-fe562d972920',  # This is a valid API token for the Extensis test server
        'username': 'administrator',
        'password': 'password'  # This is not the password for the admin account for the Extensis test server
    }

if USE_HTTPS:
    demo_url = f"https://{server_credentials['server']}:{SERVER_HTTPS_PORT}"
else:
    demo_url = f"http://{server_credentials['server']}:{SERVER_HTTP_PORT}"

if USE_API_TOKEN:
    print("We're using an API token to log in.")
    session_id = server_credentials['token']
else:
    print(f"Logging in to {demo_url} with username {server_credentials['username']}...")
    session_id = get_login_session(demo_url, username=server_credentials['username'], password=server_credentials['password'])
    if not session_id:  # We got an empty string back for some reason
        print("ERROR: We didn't get a valid session from get_login_session(), exiting.")
        exit()

print(f"Getting a list of catalogs from {demo_url}...")
catalogs = get_catalogs(demo_url, session=session_id)

if not catalogs:  # If the list is empty
    print("ERROR: No catalogs are available, exiting\n")
    exit()

catalog_names = [catalog['name'] for catalog in catalogs]
print("Available catalogs:")
print(*catalog_names, sep=", ")

demo_catalog = choice(catalog_names)
demo_catalog_id = ""
print(f"We're going to use '{demo_catalog}'")
for catalog in catalogs:
    if catalog['name'] == demo_catalog:
        demo_catalog_id = catalog['id']

if demo_catalog_id == "":
    print("ERROR: We can't get the catalog's ID for some reason, exiting\n")
    exit()

print(f"\nGetting the total number of assets in '{demo_catalog}'...")
total_assets = get_catalog_asset_count(demo_url, session=session_id, catalog_id=demo_catalog_id)

if total_assets == 0:
    print(f"ERROR: '{demo_catalog}' has no assets, exiting")
    exit()

print(f"'{demo_catalog}' has {total_assets} assets")

print(f"\nGetting the gallery information for '{demo_catalog}'...")
catalog_galleries = get_galleries_from_catalog(demo_url, session=session_id, catalog_id=demo_catalog_id)
gallery_names = [gallery['name'] for gallery in catalog_galleries]
print(f"The galleries in '{demo_catalog}' are:")
print(*gallery_names, sep=", ")

demo_gallery_name = catalog_galleries[0]['name']
demo_gallery_id = catalog_galleries[0]['id']
print(f"\nGetting the list of record IDs from the gallery '{demo_gallery_name}'...")
gallery_record_ids = get_asset_ids_for_gallery(demo_url, session=session_id, gallery_id=demo_gallery_id,
                                               catalog_id=demo_catalog_id)
print(f"The record IDs from the gallery '{demo_gallery_name}' are {gallery_record_ids}")

print(f"\nGetting a random record ID from '{demo_catalog}'...")
print("(In practice, you wouldn't do this: you'd submit search terms to get a useful set\n"
      "of assets back. Since we don't know what is in the catalog, we're choosing a random asset.\n"
      "See get_asset_id() for an explanation of how we do this.)")

random_asset_index = randint(0, total_assets)
print(f"Our random asset index is {random_asset_index}")
random_asset_id = get_asset_id(demo_url, session=session_id, catalog_id=demo_catalog_id,
                               asset_index=random_asset_index)
print(f"The record's ID is {random_asset_id}")

if random_asset_id == 0:
    print(f"ERROR: We don't have a valid record ID, exiting")
    exit()

print(f"\nGetting our random Asset from '{demo_catalog}'...")
test_asset = get_asset(demo_url, session=session_id, catalog_id=demo_catalog_id, record_id=random_asset_id)

if test_asset == {}:
    print(f"ERROR: We have no Asset to work with, exiting")
    exit()

test_asset_fields = test_asset['attributes']
test_asset_filename = test_asset_fields['Filename'][0]

print(f"Our test asset is '{test_asset_filename}'.")
print(f"It was cataloged on {test_asset_fields['Cataloged'][0]} by {test_asset_fields['Cataloged By'][0]}.")
print(f"The file is {test_asset_fields['File Size'][0]} bytes in size.")

# FIXME: This breaks if there are no keywords
print("The file's keywords are:")
print(*test_asset_fields['Keywords'], sep="; ")

# Uncomment to see the whole Asset
# test_asset_pretty = dumps(test_asset, sort_keys=True, indent=2, separators=(',', ': '))
# print(f"The full content of the Asset record is:\n{test_asset_pretty}")

print(f"\nSaving metadata for '{test_asset_filename}' to a text file...")
save_asset_metadata(asset=test_asset, folder_path=METADATA_FOLDER)

print(f"Getting the original file for '{test_asset_filename}'...")
save_asset_original(demo_url, session=session_id, catalog_id=demo_catalog_id, asset=test_asset,
                    folder_path=ASSETS_FOLDER)

print(f"Getting the preview for '{test_asset_filename}'...")
save_asset_preview(demo_url, session=session_id, catalog_id=demo_catalog_id, asset=test_asset,
                   folder_path=PREVIEWS_FOLDER)

print("\nLogging out of the server...")

if USE_API_TOKEN:
    print("We're using an API token so there's no seat to reclaim; skipping logout.")
else:
    if logout(demo_url, session=session_id):
        print("Session logout successful.")
    else:
        print("Session logout failed for some reason.")
