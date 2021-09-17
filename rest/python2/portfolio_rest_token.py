import urllib2
import json
import random
import os
import errno

# - - - - - - - - - - - - - - - - - - - - - - - - - version 29sep2016 -
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

SERVER_PROTOCOL = "https" # - - - - "http" or "https"
SERVER_ADDRESS = "playground.extensis.com"
SERVER_PORT = "9443" # - - - - - - "8090" for http / "9443" for https
API_TOKEN = "TOKEN-e554ed0f-5438-4576-bfc4-fe562d972920"
TARGET_CATALOG = "DEMO - Stock Photography"
IMAGES_PATH = "Assets"
METADATA_PATH = "Metadata"

# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -



# --- [ START ] : Get Catalogs - - - - - - - - - - - - - - - - - - - -
#                 Retrieves an array of the available Catalogs - - - -

def getCatalogs():

	catalog_url = SERVER_PROTOCOL+'://'+SERVER_ADDRESS+':'+SERVER_PORT+'/api/v1/catalog?session='+API_TOKEN

	try:
		catalogs_response = urllib2.urlopen(catalog_url).read()
		catalogs = json.loads(catalogs_response)

	except urllib2.URLError, error:

		if "Errno 61" in str(error.reason):
			print "\n" + "[ Get Catalogs ] : [ ERROR ! ] : Unable to Connect !" + "\n"

		else:
			print "\n" + "[ Get Catalogs ] : [ ERROR ! ] =" , error.reason , "\n"

	else:
		if "[]" in catalogs_response:
			print "\n" + "[ Get Catalogs ] : [ ERROR ! ] : No Catalogs Available !" + "\n"

		else:
			print "\n" + "[ Catalogs Output ] =" + "\n" + "\n", json.dumps(catalogs, sort_keys=True, indent=4, separators=(',', ': ')), "\n"

			print "The following Catalogs are available :",
			for catalog_name in catalogs:
				print "[ ", catalog_name['name'], " ]",
			print "\n"

			for catalog_name in catalogs:
				if catalog_name['name'] in TARGET_CATALOG:
					print "[ ", catalog_name['name'], " ] = " + "[ ", catalog_name['id'], " ]"
					global catalog_id
					catalog_id = catalog_name['id']

# --- [  END  ] : Get Catalogs - - - - - - - - - - - - - - - - - - - -



# --- [ START ] : Find Number Assets - - - - - - - - - - - - - - - - - - - -
#                 Retrieves the current total number of available assets - -

def findNumberAssets():

	find_number_url = SERVER_PROTOCOL+'://'+SERVER_ADDRESS+':'+SERVER_PORT+'/api/v1/catalog/'+catalog_id+'/asset/?session='+API_TOKEN
	find_number_data = '{"fields":["Item ID","Filename"],"pageSize":1,"startingIndex":0,"sortOptions":{"field":"Cataloged","order":"desc"},}'

	request = urllib2.Request(find_number_url, find_number_data, headers={'Accept': 'application/json, text/plain, */*','Content-Type': 'application/json;charset=UTF-8'})

	try:
		find_number_response = urllib2.urlopen(request).read()
		assets = json.loads(find_number_response)

	except urllib2.URLError, error:
			print "\n" + "[ Find Number Assets ] : [ ERROR ! ] =" , error.reason , "\n"

	else:
		if assets['totalNumberOfAssets'] == 0:
			print "\n" + "[ Find Number Assets ] : [ ERROR ! ] : No Assets Available !" + "\n"

		else:
			print "\n" + "[ Assets Output ] =" + "\n" + "\n", json.dumps(assets, sort_keys=True, indent=4, separators=(',', ': ')), "\n"
			print "[ Total Number of Assets ] =", assets['totalNumberOfAssets'] , "\n"
			global total_assets
			total_assets = int(assets['totalNumberOfAssets'])

# --- [  END  ] : Find Number Assets - - - - - - - - - - - - - - - - - - - -



# --- [ START ] : Find Random ID - - - - - - - - - - - - - - - - - - - - - -
#                 Makes use of the Portfolio API's advanced paging
#                 capabilities by changing the items per page to 1 and then
#                 returning a random page containing a single item. Note that
#                 this method is used because - even though Portfolio
#                 automatically assigns an Item ID during the cataloging
#                 process - there are often breaks in the Item ID sequence
#                 due to item deletion - - - - - - - - - - - - - - - - - - - -

def findRandomID():

	find_id_url = SERVER_PROTOCOL+'://'+SERVER_ADDRESS+':'+SERVER_PORT+'/api/v1/catalog/'+catalog_id+'/asset/?session='+API_TOKEN
	find_id_data = '{"fields":["Item ID","Filename"],"pageSize":1,"startingIndex":'+str(random.randint(0, total_assets))+',"sortOptions":{"field":"RID","order":"desc"},}'

	request = urllib2.Request(find_id_url, find_id_data, headers={'Accept': 'application/json, text/plain, */*','Content-Type': 'application/json;charset=UTF-8'})

	try:
		find_id_response = urllib2.urlopen(request).read()
		assets = json.loads(find_id_response)

	except urllib2.URLError, error:
			print "\n" + "[ Find Random ID ] : [ ERROR ! ] =" , error.reason , "\n"

	else:
		if assets['totalNumberOfAssets'] == 0:
			print "[ Find Random ID ] : [ ERROR ! ] : No Assets Available !" + "\n"

		else:
			print "\n" + "[ Assets Output ] =" + "\n" + "\n", json.dumps(assets, sort_keys=True, indent=4, separators=(',', ': ')), "\n"
			print "[ Random Item ID ] =", assets['assets'][0]['id'], "\n"

			global random_id
			random_id = int(assets['assets'][0]['id'])

# --- [  END  ] : Find Random ID - - - - - - - - - - - - - - - - - - - -



# --- [ START ] : Get Asset - - - - - - - - - - - - - - - - - - - - - - -
#                 Returns an array containing both the Filename and
#                 Keywords for the random Item ID - - - - - - - - - - - -

def getAsset():

	get_asset_url = SERVER_PROTOCOL+'://'+SERVER_ADDRESS+':'+SERVER_PORT+'/api/v1/catalog/'+catalog_id+'/asset/?session='+API_TOKEN
	get_asset_data = '{"fields":["Item ID","Filename","Keywords"],"pageSize":10,"startingIndex":0,"sortOptions":{"field":"RID","order":"desc"},"term":{"operator":"assetsById","values":["'+str(random_id)+'"]}}'

	request = urllib2.Request(get_asset_url, get_asset_data, headers={'Accept': 'application/json, text/plain, */*','Content-Type': 'application/json;charset=UTF-8'})

	try:
		get_asset_response = urllib2.urlopen(request).read()
		assets = json.loads(get_asset_response)

	except urllib2.URLError, error:
			print "\n" + "[ Get Asset ] : [ ERROR ! ] =" , error.reason , "\n"

	else:
		if random_id == "0" and assets['totalNumberOfAssets'] == 0:
			print "[ Get Asset ] : [ ERROR ! ] : No Assets Available !" + "\n"

		else:
			print "\n" + "[ Assets Output ] =" + "\n" + "\n", json.dumps(assets, sort_keys=True, indent=4, separators=(',', ': ')), "\n"
			print "[ Random Item ID ] =", assets['assets'][0]['id'], "\n"

			global random_filename
			random_filename = assets['assets'][0]['attributes']['Filename'][0]
			print "[ Random Filename ] =", str(random_filename), "\n"

			global random_metadata

			saveRandomPreview()

			if 'Keywords' in assets['assets'][0]['attributes']:
				random_metadata = assets['assets'][0]['attributes']['Keywords']
				print "[ Random Metadata ] =", json.dumps(random_metadata, sort_keys=True, indent=4, separators=(',', ': ')), "\n"

				saveRandomMetadata()

			else:
				print "[ Save Random Metadata ] : [ ERROR ! ] - [ No Available Keywords ! ]" + "\n"

# --- [  END  ] : Get Asset - - - - - - - - - - - - - - - - - - - - - - - - -



# --- [ START ] : Save Random Preview - - - - - - - - - - - - - - - - - - - -
#                 Saves the Item's JPEG Preview. Note that during the
#                 cataloging process , Portfolio automatically generates both
#                 a Thumbnail ( 256 pixels ) and an intermediary  Preview
#                 ( default of 1600 pixels )  - - - - - - - - - - - - - - - -

def saveRandomPreview():

	try:
		os.makedirs(IMAGES_PATH)
	except OSError:
		if not os.path.isdir(IMAGES_PATH):
			raise

	save_random_url = SERVER_PROTOCOL+'://'+SERVER_ADDRESS+':'+SERVER_PORT+'/api/v1/catalog/'+catalog_id+'/asset/'+str(random_id)+'/preview?session='+API_TOKEN

	print "[ Save Random Item's Preview ] : [ Saving ! ] : [", random_filename, "]" + "\n"

	try:
		save_random_response = urllib2.urlopen(save_random_url).read()

		with open(os.path.join(IMAGES_PATH,random_filename), 'w') as preview:
			preview.write(save_random_response)

	except urllib2.URLError, error:
			print "\n" + "[ Find Assets ] : [ ERROR ! ] =" , error.reason , "\n"

# --- [  END  ] : Save Random Preview - - - - - - - - - - - - - - - - - - - -



# --- [ START ] : Save Random Metadata - - - - - - - - - - - - - - - - - - - -
#                 Saves the Keyword metadata as a CSV text file - - - - - - -

def saveRandomMetadata():

	global random_metadata

	try:
		os.makedirs(METADATA_PATH)
	except OSError:
		if not os.path.isdir(METADATA_PATH):
			raise

	print "[ Save Random Item's Metadata ] : [ Saving ! ] : [", os.path.splitext(random_filename)[0]+'.txt', "]" + "\n"

	try:
		with open(os.path.join(METADATA_PATH,os.path.splitext(random_filename)[0])+'.txt', 'w') as metadata:
			metadata.write(', '.join(random_metadata))

	except urllib2.URLError, error:
			print "\n" + "[ Find Assets ] : [ ERROR ! ] =" , error.reason , "\n"

# --- [  END  ] : Save Random Metadata - - - - - - - - - - - - - - - - - - - -



# --- [ START ] : Logout - - - - - - - - - - - - - - - - - - - -
#                 Session logout. Note that this is not normally
#                 needed as there is no connection limit nor
#                 timeout for RESTful API connections - - - - -

def Logout():

	logout_url = SERVER_PROTOCOL+'://'+SERVER_ADDRESS+':'+SERVER_PORT+'/api/v1/auth/logout?session='+API_TOKEN
	logout_data = '{}'

	request = urllib2.Request(logout_url, logout_data, headers={'Accept': 'application/json, text/plain, */*','Content-Type': 'application/json;charset=UTF-8'})

	try:
		logout_response = urllib2.urlopen(request).read()

	except urllib2.URLError, error:
		print "\n" + "[ Logout ] : [ ERROR ! ] =" , error.reason , "\n"

	else:
		print "[ Logout ] : [ - Session Logout Successful - ]" + "\n"

# --- [  END  ] : Logout - - - - - - - - - - - - - - - - - - - -



getCatalogs()

findNumberAssets()

findRandomID()

getAsset()

Logout()
