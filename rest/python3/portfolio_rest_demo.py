# TODO: Add option for demoing username/password logins

# Imports

import urllib3
import json
import random
import os

# Constants

SERVER_ADDRESS = "playground.extensis.com"
SERVER_HTTP_PORT = "8090"  # Default port
SERVER_HTTPS_PORT = "9443"  # Default port
USE_HTTPS = True
API_TOKEN = "TOKEN-e554ed0f-5438-4576-bfc4-fe562d972920"  # API token; see Portfolio docs on how to generate
REQUEST_HEADERS = {'Accept': 'application/json, text/plain, */*',
                   'Content-Type': 'application/json;charset=UTF-8'}

ASSETS_FOLDER = "Originals"  # Folder to save downloaded assets on disk
PREVIEWS_FOLDER = "Previews"  # Folder to save downloaded previews on disk
METADATA_FOLDER = "Metadata"  # Folder to save downloaded metadata on disk

# Start our PoolManager
http = urllib3.PoolManager()


# Functions

def get_catalogs(server_url, session):
    """Returns an array of available catalogs.
    Returns an empty array if we can't connect to the server.
    """
    request_url = f"{server_url}/api/v1/catalog?session={session}"

    try:
        request = http.request("GET", request_url)
        response_body = request.data.decode('UTF-8')
        return json.loads(response_body)

    except urllib3.exceptions.RequestError:
        print(f"ERROR: get_catalogs failed to connect to {request_url}\n")
        return []


def get_catalog_asset_count(server_url, catalog_id, session):
    """Returns the number of assets in a catalog.
    Returns 0 if we can't connect to the server.
    """
    request_url = f"{server_url}/api/v1/catalog/{catalog_id}/asset/?session={session}"
    # All we want is the totalNumberOfAssets field in the response so we make
    # the smallest query possible; we're requesting a single Asset but we don't do anything with it
    request_body = {'fields': ["Filename"],  # If we don't specify at least one field, we get all of them
                    'pageSize': 1,
                    'startingIndex': 0,
                    'sortOptions': {'field': "Cataloged", 'order': "desc"}}

    try:
        request = http.request("POST", request_url, body=json.dumps(request_body), headers=REQUEST_HEADERS)
        response_body = request.data.decode('UTF-8')
        response = json.loads(response_body)
        return response['totalNumberOfAssets']

    except urllib3.exceptions.RequestError:
        print(f"ERROR: get_catalog_asset_count failed to connect to {request_url}\n")
        return 0


def get_asset_id(server_url, catalog_id, session, asset_index):
    """Returns an the record ID of an Asset object.
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
                    'sortOptions': {'field': "RID", 'order': "desc"}}

    try:
        request = http.request("POST", request_url, body=json.dumps(request_body), headers=REQUEST_HEADERS)
        response_body = request.data.decode('UTF-8')
        response = json.loads(response_body)

    except urllib3.exceptions.RequestError:
        print(f"ERROR: get_asset_id failed to connect to {request_url}\n")
        return 0

    else:
        if response['totalNumberOfAssets'] == 0:
            print("ERROR: No assets are available.\n")
            return 0

        else:
            assets = response['assets']
            # The "id" field is a string so we make it an integer
            return int(assets[0]['id'])


def get_asset(server_url, catalog_id, session, record_id):
    """Returns the Asset with the record ID of record_id"""
    request_url = f"{server_url}/api/v1/catalog/{catalog_id}/asset/?session={session}"
    request_body = {'pageSize': 1,
                    'startingIndex': 0,
                    'sortOptions': {'field': "RID", 'order': "desc"},
                    'term': {'operator': "assetsById", 'values': [record_id]}}

    try:
        request = http.request("POST", request_url, body=json.dumps(request_body), headers=REQUEST_HEADERS)

        response_body = request.data.decode('UTF-8')
        response = json.loads(response_body)

    except urllib3.exceptions.RequestError:
        print(f"ERROR: get_asset failed to connect to {request_url}\n")
        return {}

    else:
        return response['assets'][0]


def save_asset_metadata(asset, folder_path):
    """Saves the metadata for the Asset in a tab-delimited text file to the folder specified by folder_path"""
    try:
        os.makedirs(folder_path)
    except OSError:
        if not os.path.isdir(folder_path):
            print(f"ERROR: Can't create {folder_path}")
            raise

    # We're only saving a subset of fields
    output_fields = ("Cataloged By", "Cataloged", "Created", "Directory Path", "Height", "Keywords",
                     "Last Modified", "Last Updated", "Updated By", "Width")
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


def save_asset_original(server_url, catalog_id, session, asset, folder_path):
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
        request = http.request("GET", request_url)
        response = request.data

        with open(os.path.join(folder_path, filename), 'wb') as original:
            original.write(response)

    except urllib3.exceptions.RequestError:
        print(f"ERROR: save_asset_original failed to connect to {request_url}\n")


def save_asset_preview(server_url, catalog_id, session, asset, folder_path):
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
        request = http.request("GET", request_url)
        response = request.data

        with open(os.path.join(folder_path, filename), 'wb') as preview:
            preview.write(response)

    except urllib3.exceptions.RequestError:
        print(f"ERROR: save_asset_preview failed to connect to {request_url}\n")


def logout(server_url, session):
    """Logs out the user session.
    This isn't needed for API tokens, as they don't take up a Portfolio user seat, but you should
    do this for username/password logins so the seat is released.
    """
    request_url = f"{server_url}/api/v1/auth/logout?session={session}"
    request_body = "{}"  # This is an empty object so there's no reason to use json.dumps()

    try:
        request = http.request("POST", request_url, body=request_body, headers=REQUEST_HEADERS)
        # We're using an API token so there shouldn't be an error. If this was a proper login session,
        # we want to capture the response in case there is an error.
        response_body = request.data.decode('UTF-8')

    except urllib3.exceptions.RequestError:
        print(f"ERROR: logout failed to connect to {request_url}\n")
        return False
    else:
        if response_body == "":
            return True
        else:
            print(f"Logout response is {response_body}")
            return False


#
# Show off what we can do
#

if USE_HTTPS:
    demo_url = f"https://{SERVER_ADDRESS}:{SERVER_HTTPS_PORT}"
else:
    demo_url = f"http://{SERVER_ADDRESS}:{SERVER_HTTP_PORT}"

print(f"Getting a list of catalogs from {demo_url}...")
catalogs = get_catalogs(server_url=demo_url, session=API_TOKEN)

if not catalogs:  # If the list is empty
    print("No catalogs are available, exiting\n")
    exit()

catalog_names = [catalog['name'] for catalog in catalogs]
print("Available catalogs:")
print(*catalog_names, sep=", ")

demo_catalog = random.choice(catalog_names)
print(f"We're going to use '{demo_catalog}'")
for catalog in catalogs:
    if catalog['name'] == demo_catalog:
        demo_catalog_id = catalog['id']

print(f"\nGetting the total number of assets in '{demo_catalog}'...")
total_assets = get_catalog_asset_count(server_url=demo_url, session=API_TOKEN, catalog_id=demo_catalog_id)

if total_assets == 0:
    print(f"'{demo_catalog}' has no assets, exiting")
    exit()

print(f"'{demo_catalog}' has {total_assets} assets")

print(f"\nGetting a random record ID from '{demo_catalog}'...")
print("(In practice, you wouldn't do this: you'd submit search terms to get a useful set\n"
      "of assets back. Since we don't know what is in the catalog,\n"
      "we're choosing a random asset. See get_asset_id() for an explanation of how we do this.)")

random_asset_index = random.randint(0, total_assets)
print(f"Our random asset index is {random_asset_index}")
random_asset_id = get_asset_id(server_url=demo_url, session=API_TOKEN, catalog_id=demo_catalog_id,
                               asset_index=random_asset_index)
print(f"The record's ID is {random_asset_id}")

if random_asset_id == 0:
    print(f"We don't have a valid record ID, exiting")
    exit()

print(f"\nGetting our random Asset from '{demo_catalog}'...")
test_asset = get_asset(server_url=demo_url, session=API_TOKEN, catalog_id=demo_catalog_id, record_id=random_asset_id)

if test_asset == {}:
    print(f"We have no Asset to work with, exiting")
    exit()

test_asset_fields = test_asset['attributes']
test_asset_filename = test_asset_fields['Filename'][0]

print(f"Our test asset is '{test_asset_filename}'.")
print(f"It was cataloged on {test_asset_fields['Cataloged'][0]} by {test_asset_fields['Cataloged By'][0]}.")
print(f"The file is {test_asset_fields['File Size'][0]} bytes in size.")
print("The file's keywords are:")
print(*test_asset_fields['Keywords'], sep="; ")

# Uncomment to see the whole Asset
# test_asset_pretty = json.dumps(test_asset, sort_keys=True, indent=2, separators=(',', ': '))
# print(f"The full content of the Asset record is:\n{test_asset_pretty}")

print(f"Saving metadata for '{test_asset_filename}' to a text file...")
save_asset_metadata(asset=test_asset, folder_path=METADATA_FOLDER)

print(f"Getting the original file for '{test_asset_filename}'...")
save_asset_original(server_url=demo_url, session=API_TOKEN, catalog_id=demo_catalog_id, asset=test_asset,
                    folder_path=ASSETS_FOLDER)

print(f"Getting the preview for '{test_asset_filename}'...")
save_asset_preview(server_url=demo_url, session=API_TOKEN, catalog_id=demo_catalog_id, asset=test_asset,
                   folder_path=PREVIEWS_FOLDER)

if logout(server_url=demo_url, session=API_TOKEN):
    print("\nSession logout successful.")
else:
    print("\nSession logout failed.")
