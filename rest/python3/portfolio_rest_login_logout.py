import urllib
import urllib.request,urllib.parse,urllib.error
import json


# - - - - - - - - - - - - - - - - - - - - - - - - - - - version 27september2021 - -
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

SERVER_PROTOCOL = "http" # - - - - "http" or "https"
SERVER_ADDRESS = "localhost"
SERVER_PORT = "8090" # - - - - - - "8090" for http / "9443" for https
USERNAME = "Administrator"
PASSWORD = "password"

# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
# - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -



# --- [ START ] : Get Public Key - - - - - - - - - - - - - - - - - - - -

def getPublicKey():

	publickey_url = SERVER_PROTOCOL+'://'+SERVER_ADDRESS+':'+SERVER_PORT+'/api/v1/auth/public-key'
	request = urllib.request.Request(publickey_url)

	try:
		publickey_response = urllib.request.urlopen(request).read()
		publickey = json.loads(publickey_response)

	except urllib.error.URLError as error:
		print("[ Public Key ] : [ ERROR ! ] =" , error.reason , "\n")

	else:
		print("[ Public Key ] : [ " , publickey , " ]" , "\n")
		modulus = int(publickey['modulusBase16'], base=16)
		exponent = int(publickey['exponent'])



		doEncrypt(modulus, exponent)



# --- [  END  ] : Get Oublic Key - - - - - - - - - - - - - - - - - - - -



# --- [ START ] : Do Encrypt - - - - - - - - - - - - - - - - - - - -

def doEncrypt(modulus, exponent):
	
	from Cryptodome.PublicKey import RSA
	from Cryptodome.Cipher import PKCS1_v1_5
	from base64 import b64encode, b64decode
	
	rsaKey = RSA.construct( ( modulus, exponent ) )
	pubKey = rsaKey.publickey()

	encryptor = PKCS1_v1_5.new(pubKey)

	encrypted = encryptor.encrypt(PASSWORD.encode())

	cipher64 = b64encode(encrypted).decode()

	print("[ Encrypted Password ] : [ ", cipher64, " ]", "\n")



	login(cipher64);



# --- [  END  ] : Do Encrypt - - - - - - - - - - - - - - - - - - - -



# --- [ START ] : Login - - - - - - - - - - - - - - - - - - - -
#                 Session login.

def login(cipher64):

	login_url = SERVER_PROTOCOL+'://'+SERVER_ADDRESS+':'+SERVER_PORT+'/api/v1/auth/login'
	login_data = '{"userName":"'+USERNAME+'","encryptedPassword":"'+cipher64+'"}'	
	login_data = login_data.encode()
	
	request = urllib.request.Request(login_url, login_data)
	request.add_header('Accept', '*/*')
	request.add_header('Content-Type', 'application/json')

	try:
		login_response = urllib.request.urlopen(request).read()
		session = json.loads(login_response)

	except urllib.error.URLError as error:
		print("[ Login ] : [ ERROR ! ] =" , error.reason , "\n")

	else:
		sessionId = session['session']
		print("[ Login ] : [ - Session Login Successful - ] ; [ Session ID ] = [", sessionId, "]\n")



		logout(sessionId)



# --- [  END  ] : Login - - - - - - - - - - - - - - - - - - - -



# --- [ START ] : Logout - - - - - - - - - - - - - - - - - - - -
#                 Session logout.

def logout(sessionId):

	logout_url = SERVER_PROTOCOL+'://'+SERVER_ADDRESS+':'+SERVER_PORT+'/api/v1/auth/logout?session='+sessionId
	logout_data = urllib.parse.urlencode({}).encode("utf-8")
	request = urllib.request.Request(logout_url, logout_data)
	request.add_header('Accept', 'application/json, text/plain, */*')
	request.add_header('Content-Type', 'application/json;charset=UTF-8')

	try:
		logout_response = urllib.request.urlopen(request).read()

	except urllib.error.URLError as error:
		print("[ Logout ] : [ ERROR ! ] =" , error.reason , "\n")

	else:
		print("[ Logout ] : [ - Session Logout Successful - ] ; [ Session ID ] = [",sessionId,"]\n")

# --- [  END  ] : Logout - - - - - - - - - - - - - - - - - - - -



getPublicKey();


