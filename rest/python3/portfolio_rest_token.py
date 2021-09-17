# Imports
import urllib3
import json
import random
import os

# Constants

SERVER_PROTOCOL = "http"  # "http" or "https"
SERVER_ADDRESS = "playground.extensis.com"
SERVER_PORT = "8090"  # Portfolio uses "8090" for HTTP and "9443" for HTTPS by default
SERVER_URL = f"{SERVER_PROTOCOL}://{SERVER_ADDRESS}:{SERVER_PORT}" # Our server URL
API_TOKEN = "TOKEN-e554ed0f-5438-4576-bfc4-fe562d972920" # API token; see Portfolio docs on how to generate
TARGET_CATALOG = "DEMO - Stock Photography"
IMAGES_PATH = "Assets" # Folder to save downloaded assets on disk
METADATA_PATH = "Metadata" # Folder to save downloaded metadata

# These are filled out as the script runs

catalog_id = ""
random_id = ""
random_filename = ""
random_metadata = ""
total_assets = 0

# Start our PoolManager

http = urllib3.PoolManager()


def get_catalogs():
    """Returns and prints an array of available catalogs"""
    catalog_url = f"{SERVER_URL}/api/v1/catalog?session={API_TOKEN}"

    try:
        catalogs_request = http.request("GET", catalog_url)
        catalogs_body = catalogs_request.data.decode('UTF-8')
        catalogs = json.loads(catalogs_body)

    except urllib3.exceptions.RequestError as error:
        print(f"\n[ Get Catalogs ] : [ ERROR ! ] : Unable to Connect to {error.url}!\n")

    else:
        if "[]" in catalogs_body:
            print("\n[ Get Catalogs ] : [ ERROR ! ] : No Catalogs Available !\n")

        else:
            catalogs_output = json.dumps(catalogs, sort_keys=True, indent=4, separators=(',', ': '))
            print(f"\n[ Catalogs Output ] =\n\n{catalogs_output}\n")
            print("The following Catalogs are available :")

            for catalog_name in catalogs:
                print(f"[ {catalog_name['name']} ]")

            for catalog_name in catalogs:
                if catalog_name['name'] in TARGET_CATALOG:
                    print(f"[ {catalog_name['name']} ] = [ {catalog_name['id']} ]")
                    global catalog_id
                    catalog_id = catalog_name['id']


def find_number_assets():
    """Returns and prints the current total number of assets"""
    find_number_url = f"{SERVER_URL}/api/v1/catalog/{catalog_id}/asset/?session={API_TOKEN}"
    find_number_data = '{"fields":["Item ID","Filename"],"pageSize":1,"startingIndex":0,"sortOptions":{' \
                       '"field":"Cataloged","order":"desc"},}'

    try:
        find_number_request = http.request("POST", find_number_url, body=find_number_data,
                                           headers={'Accept': 'application/json, text/plain, */*',
                                                    'Content-Type': 'application/json;charset=UTF-8'})
        find_number_body = find_number_request.data.decode('UTF-8')
        assets = json.loads(find_number_body)

    except urllib3.exceptions.RequestError as error:
        print(f"\n[ Find Number Assets ] : [ ERROR ! ] : Unable to Connect to {error.url}!\n")

    else:
        if assets['totalNumberOfAssets'] == 0:
            print("\n[ Find Number Assets ] : [ ERROR ! ] : No Assets Available !\n")

        else:
            print(f"\n[ Assets Output ] = \n\n{json.dumps(assets, sort_keys=True, indent=4, separators=(',', ': '))}\n")
            print(f"[ Total Number of Assets ] = {assets['totalNumberOfAssets']}\n")
            global total_assets
            total_assets = int(assets['totalNumberOfAssets'])


def find_random_id():
    """Finds a random record ID and sets the global random_id to that value (for other functions to use)"""
    find_id_url = f"{SERVER_URL}/api/v1/catalog/{catalog_id}/asset/?session={API_TOKEN}"

    # Record IDs aren't entirely sequential; as records are deleted, the IDs disappear.
    # To work around this we use Portfolio's paging capabilities to set the items
    # per page to 1, then pick a random page.
    random_asset_index = random.randint(0, total_assets)
    find_id_data = f'{{"fields":["Item ID","Filename"],"pageSize":1,"startingIndex":{random_asset_index},' \
                   f'"sortOptions":{{"field":"RID","order":"desc"}},}} '

    try:
        find_id_request = http.request("POST", find_id_url, body=find_id_data,
                                       headers={'Accept': 'application/json, text/plain, */*',
                                                'Content-Type': 'application/json;charset=UTF-8'})
        find_id_body = find_id_request.data.decode('UTF-8')
        assets = json.loads(find_id_body)

    except urllib3.exceptions.RequestError as error:
        print(f"\n[ Find Random ID ] : [ ERROR ! ] : Unable to Connect to {error.url}!\n")

    else:
        if assets['totalNumberOfAssets'] == 0:
            print("[ Find Random ID ] : [ ERROR ! ] : No Assets Available !\n")

        else:
            print(f"\n[ Assets Output ] =\n\n{json.dumps(assets, sort_keys=True, indent=4, separators=(',', ': '))}\n")
            print(f"[ Random Item ID ] = {assets['assets'][0]['id']}\n")

            global random_id
            random_id = int(assets['assets'][0]['id'])


def get_asset():
    """Returns and prints the filename and keywords for a random item set by find_random_id()"""
    get_asset_url = f"{SERVER_URL}/api/v1/catalog/{catalog_id}/asset/?session={API_TOKEN}"
    get_asset_data = f'{{"fields":["Item ID","Filename","Keywords"],"pageSize":10,"startingIndex":0,"sortOptions":{{' \
                     f'"field":"RID","order":"desc"}},"term":{{"operator":"assetsById","values":[{random_id}]}}}} '

    try:
        get_asset_request = http.request("POST", get_asset_url, body=get_asset_data,
                                         headers={'Accept': 'application/json, text/plain, */*',
                                                  'Content-Type': 'application/json;charset=UTF-8'})

        get_asset_body = get_asset_request.data.decode('UTF-8')
        assets = json.loads(get_asset_body)

    except urllib3.exceptions.RequestError as error:
        print(f"\n[ Get Asset ] : [ ERROR ! ] : Unable to Connect to {error.url}!\n")

    else:
        if random_id == "0" and assets['totalNumberOfAssets'] == 0:
            print("[ Get Asset ] : [ ERROR ! ] : No Assets Available !\n")

        else:
            print(f"\n[ Assets Output ] =\n\n{json.dumps(assets, sort_keys=True, indent=4, separators=(',', ': '))}\n")
            print(f"[ Random Item ID ] = {assets['assets'][0]['id']}\n")

            global random_filename
            random_filename = assets['assets'][0]['attributes']['Filename'][0]
            print(f"[ Random Filename ] = {str(random_filename)}\n")

            global random_metadata

            save_random_preview()

            if 'Keywords' in assets['assets'][0]['attributes']:
                random_metadata = assets['assets'][0]['attributes']['Keywords']
                random_metadata_text = json.dumps(random_metadata, sort_keys=True, indent=4, separators=(',', ': '))
                print(
                    f"[ Random Metadata ] = {random_metadata_text}\n")

                save_random_metadata()

            else:
                print("[ Save Random Metadata ] : [ ERROR ! ] - [ No Available Keywords ! ]\n")


def save_random_preview():
    """Saves the JPEG preview for the random record to the folder specified by IMAGES_PATH"""
    try:
        os.makedirs(IMAGES_PATH)
    except OSError:
        if not os.path.isdir(IMAGES_PATH):
            raise

    save_random_url = f"{SERVER_URL}/api/v1/catalog/{catalog_id}/asset/{random_id}/preview?session={API_TOKEN}"

    print(f"[ Save Random Item's Preview ] : [ Saving ! ] : [{random_filename}]\n")

    try:
        save_random_request = http.request("GET", save_random_url)
        save_random_body = save_random_request.data

        with open(os.path.join(IMAGES_PATH, random_filename), 'wb') as preview:
            preview.write(save_random_body)

    except urllib3.exceptions.RequestError as error:
        print(f"\n[ Find Assets ] : [ ERROR ! ] : Unable to Connect to {error.url}!\n")


def save_random_metadata():
    """Saves the metadata for the random record to a CSV text file to the folder specified by METADATA_PATH"""
    global random_metadata

    try:
        os.makedirs(METADATA_PATH)
    except OSError:
        if not os.path.isdir(METADATA_PATH):
            raise

    print(f"[ Save Random Item's Metadata ] : [ Saving ! ] : [{os.path.splitext(random_filename)[0]}.txt]\n")

    try:
        with open(os.path.join(METADATA_PATH, os.path.splitext(random_filename)[0]) + '.txt', 'w') as metadata:
            metadata.write(', '.join(random_metadata))

    except urllib3.exceptions.RequestError:
        print("\n[ Find Assets ] : [ ERROR ! ] : Unable to Connect to {error.url}!\n")


def logout():
    """Logs out our user session. In practice this isn't normally needed as there is no
    connection limit or timeout for REST API connections"""
    logout_url = f"{SERVER_URL}/api/v1/auth/logout?session={API_TOKEN}"
    logout_data = '{}'

    try:
        logout_request = http.request("POST", logout_url, body=logout_data,
                                      headers={'Accept': 'application/json, text/plain, */*',
                                               'Content-Type': 'application/json;charset=UTF-8'})
        logout_response = logout_request.data.decode('UTF-8')

    except urllib3.exceptions.RequestError as error:
        print(f"\n[ Logout ] : [ ERROR ! ] : Unable to Connect to {error.url}!\n")

    else:
        print("[ Logout ] : [ - Session Logout Successful - ]\n")
        print(f"logout_response is {logout_response}")


# Show off what we can do

get_catalogs()

find_number_assets()

find_random_id()

get_asset()

logout()
