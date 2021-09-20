using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Security.Cryptography;

namespace GettingStarted
{
    class Program
    {

        static void Main(string[] args)
        {                 
            String SERVER_ADDRESS = "localhost";
            int SERVER_PORT = 8090;
            String USERNAME = "administrator";
            String PASSWORD = "password";
            String sessionId = null;

            // Create Service for accessing the Portfolio Server
            AssetSEIService service = new AssetSEIService();
            service.Url = "http://" + SERVER_ADDRESS + ":" + SERVER_PORT + "/ws/1.0/AssetService";

            try
            {
                // Use getRSAPublicEncryptionKey to get the necessary Key for encrypting the password.
                keySpecification ks = service.getRSAPublicEncryptionKey();

                // Encrypt password 
                String encryptedPassword = EncryptPassword(PASSWORD, ks);

                // Pass the username and the encrypted password through the login method.
                // This will return a Session-ID, which can be used to access other API services.
                sessionId = service.login(USERNAME, encryptedPassword);
            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);
            }

            Console.WriteLine("SessionID: " + sessionId);

            // List the catalogs that are available to this user.
            catalog[] catalogs = service.getCatalogs(sessionId);

            if (catalogs == null || catalogs.Length == 0)
            {
                Console.WriteLine("No catalogs available.  Go to http://" + SERVER_ADDRESS + ":8091/ to create a catalog.");
                return;
            }


            Console.WriteLine(catalogs.Length + " catalog(s) available.");

            foreach (catalog catalog in catalogs) 
            {
                Console.WriteLine("  " + catalog.name);
            }

            Console.WriteLine();

            // Get some information about assets in the first catalog.
            assetQuery assetQuery = new assetQuery();
            assetQueryResultOptions resultOptions = new assetQueryResultOptions();

            // Ask Portfolio to return Filename, Directory Path, and Cataloged date-time information 
            // for the first 5 assets in the catalog.
            resultOptions.pageSize = 5;

            List<String> getFieldNames = new List<String>();
            getFieldNames.Add("Filename");
            getFieldNames.Add("Directory Path");
            getFieldNames.Add("Cataloged");

            resultOptions.fieldNames = getFieldNames.ToArray();

            // Sort the results by the date/time they were cataloged.
            sortOptions sortOptions = new sortOptions();
            assetQuery.sortOptions = sortOptions;
	        sortOptions.sortFieldName = "Cataloged";
            sortOptions.sortOrderAscending = false; // Most recently cataloged items first.

            assetQueryResults results = service.getAssets(sessionId, catalogs[0].catalogId, assetQuery, resultOptions);

            Console.WriteLine("Retrieved " + results.assets.Length + " out of a total of " + results.totalNumberOfAssets + " assets.");

            foreach (asset asset in results.assets) 
            {
                Console.WriteLine();
                Console.WriteLine("  Filename: " + GetAttributeValue("Filename", asset));
                Console.WriteLine("  Directory Path: " + GetAttributeValue("Directory Path", asset));
                Console.WriteLine("  Cataloged: " + GetAttributeValue("Cataloged", asset));
            }



            // When you are finished with the Portfolio server, close the session
            // by passing the Session ID to the logout method.
            service.logout(sessionId);
            PauseForUserInput();

        }

#region Utility methods
        

        static void PauseForUserInput()
        {
            Console.WriteLine("Hit Enter to continue");
            Console.ReadLine();
        }


        static String EncryptPassword(String password, keySpecification key)
        {
            String ePass = null;
            int keySize = 2048;

            // Get the exponent bytes
            UInt32 exponent = UInt32.Parse(key.exponent);
            byte[] exponentBytes = BitConverter.GetBytes(exponent);

            if (BitConverter.IsLittleEndian)
            {
                Array.Reverse(exponentBytes);
            }

            // Get the modulus bytes. Each byte is described by a pair of hex characers (00-ff)
            // This could be handled by a BigInteger class. One is provided with .NET 4.0
            // or here: http://www.codeproject.com/KB/cs/biginteger.aspx
            // but the byte results are the same as below.

            char[] chars = key.modulusBase16.ToCharArray();
            int byteCount = chars.Length / 2;
            byte[] modulus = new byte[byteCount];

            for (int i = 0; i < byteCount; ++i)
            {
                int offset = i * 2;

                // There's probably a more performant way to do this.
                string strByte = string.Format("{0}{1}", chars[offset], chars[offset + 1]);
                modulus[i] = Convert.ToByte(strByte, 16);

            }

            RSACryptoServiceProvider crypto = new RSACryptoServiceProvider(keySize);
            RSAParameters rsaParams = new RSAParameters();
            rsaParams.Exponent = exponentBytes;
            rsaParams.Modulus = modulus;
            crypto.ImportParameters(rsaParams);

            UTF8Encoding unicodeByteConverter = new UTF8Encoding();
            byte[] dataToEncrypt = unicodeByteConverter.GetBytes(password);

            byte[] encryptedData = crypto.Encrypt(dataToEncrypt, false);
            ePass = Convert.ToBase64String(encryptedData);

            return ePass;
        }

        private static String GetAttributeValue(String name, asset asset) 
        {
            multiValuedAttribute a = GetAttribute(name, asset);
            if (a != null && a.values.Length > 0)
            {
                return a.values[0];
            }

            return null;
        }

        private static multiValuedAttribute GetAttribute(String name, asset asset)
        {
            foreach (multiValuedAttribute a in asset.attributes )
            {
                if (name.Equals(a.name))
                {
                    return a;
                }
            }

            return null;
        }

#endregion // Utility methods

    }

}

