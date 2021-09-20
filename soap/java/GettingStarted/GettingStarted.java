import java.math.BigInteger;
import java.net.URL;
import java.security.KeyFactory;
import java.security.PublicKey;
import java.security.spec.RSAPublicKeySpec;
import java.util.List;
import javax.crypto.Cipher;
import javax.xml.namespace.QName;

import extensis.portfolio.service.asset.Asset;
import extensis.portfolio.service.asset.AssetQuery;
import extensis.portfolio.service.asset.AssetQueryResultOptions;
import extensis.portfolio.service.asset.AssetQueryResults;
import extensis.portfolio.service.asset.AssetSEI;
import extensis.portfolio.service.asset.AssetSEIService;
import extensis.portfolio.service.asset.Catalog;
import extensis.portfolio.service.asset.KeySpecification;
import extensis.portfolio.service.asset.MultiValuedAttribute;
import extensis.portfolio.service.asset.SortOptions;

public class GettingStarted
{
    public static final String SERVER_ADDRESS = "localhost";
    public static final int SERVER_PORT = 8090;
    public static final String USERNAME = "administrator";
    public static final String PASSWORD = "password";

    public static void main(String[] args) throws Exception {

        // Create Service for accessing the Portfolio Server.
        AssetSEI service = getAssetService(SERVER_ADDRESS, SERVER_PORT);

        // Use getRSAPublicEncryptionKey to get the necessary Key for encrypting the password.
        KeySpecification ks = service.getRSAPublicEncryptionKey();

        // Encrypt the password.
        String encryptedPassword = encryptPasswordForKeySpec(ks, PASSWORD);

        // Pass the username and the encrypted password through the login method.
        // This will return a Session-ID, which can be used to access other API services.
        String sessionId = service.login(USERNAME, encryptedPassword);
        System.out.println("SessionID: " + sessionId);

        // List the catalogs that are available to this user.
        List<Catalog> catalogs = service.getCatalogs(sessionId);
        if (catalogs.size() == 0) {
            System.out.println("No catalogs available.  Go to http://" + SERVER_ADDRESS + ":8091/ to create a catalog.");
            return;
        }

        System.out.println(catalogs.size() + " catalog(s) available.");
        for (Catalog catalog : catalogs) {
            System.out.println("  " + catalog.getName());
        }

        System.out.println();

        // Get some information about assets in the first catalog.
        AssetQuery assetQuery = new AssetQuery();
        AssetQueryResultOptions resultOptions = new AssetQueryResultOptions();
	

        // Ask Portfolio to return Filename, Directory Path, and Cataloged date-time information 
        // for the first 5 assets in the catalog.
        resultOptions.setPageSize(5);
        resultOptions.getFieldNames().add("Filename");
        resultOptions.getFieldNames().add("Directory Path");
        resultOptions.getFieldNames().add("Cataloged");

        // Sort the results by the date/time they were cataloged.
        SortOptions sortOptions = new SortOptions();
        assetQuery.setSortOptions(sortOptions);
	sortOptions.setSortFieldName("Cataloged");
        sortOptions.setSortOrderAscending(false); // Most recently cataloged items first.

        AssetQueryResults results = service.getAssets(sessionId, catalogs.get(0).getCatalogId(), assetQuery, resultOptions);
        System.out.println("Retrieved " + results.getAssets().size() + " out of a total of " + results.getTotalNumberOfAssets() + " assets.");
        for (Asset asset : results.getAssets()) {
            System.out.println();
            System.out.println("  Filename: " + getAttributeValue("Filename", asset));
            System.out.println("  Directory Path: " + getAttributeValue("Directory Path", asset));
            System.out.println("  Cataloged: " + getAttributeValue("Cataloged", asset));
        }

        // When you are finished with the Portfolio server, close the session
        // by passing the Session ID to the logout method.
        service.logout(sessionId);
    }

    // Utility methods
    public static AssetSEI getAssetService(String serverAddress, int serverPort) throws Exception {
        // Create Service for accessing the Portfolio Server.
        URL serviceWsdlURL = new URL("http://" + SERVER_ADDRESS + ":" + SERVER_PORT + "/ws/1.0/AssetService?wsdl");
        QName serviceQName = new QName("http://portfolio.extensis/service/asset", "AssetSEIService");
        return new AssetSEIService(serviceWsdlURL, serviceQName).getAssetSEIPort();
    }

    public static String encryptPasswordForKeySpec(KeySpecification ksd, String password) throws Exception {
        RSAPublicKeySpec keySpec = new RSAPublicKeySpec(new BigInteger(ksd.getModulusBase16(), 16), new BigInteger(ksd.getExponent()));
        KeyFactory keyFactory = KeyFactory.getInstance("RSA");
        PublicKey pk = keyFactory.generatePublic(keySpec);
        return Base64.encodeBytes(encrypt(pk, password.getBytes()));
    }

    private static byte[] encrypt(PublicKey pk, byte[] src) {
        try {
          Cipher cipher = Cipher.getInstance("RSA");
          cipher.init(Cipher.ENCRYPT_MODE, pk);
          return cipher.doFinal(src);
        } catch (Exception e) {
          throw new RuntimeException("error encrypting cipher data: ", e);
        }
    }

    private static String getAttributeValue(String name, Asset asset) {
        MultiValuedAttribute a = getAttribute(name, asset);
        if (a != null && a.getValues().size() > 0)
            return a.getValues().get(0);
        return null;
    }

    private static MultiValuedAttribute getAttribute(String name, Asset asset)
    {
        for (MultiValuedAttribute a : asset.getAttributes())
        {
            if (name.equals(a.getName()))
                return a;
        }
        return null;
    }
}

