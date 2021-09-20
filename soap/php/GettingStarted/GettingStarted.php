<?php
// Includes =================================================
include('Crypt/RSA.php');
require_once 'AssetService/AssetSEIService.php';

// Variables ================================================

$SERVER_ADDRESS = "127.0.0.1";
$SERVER_PORT = "8090";
$USERNAME="administrator";
$PASSWORD="password";

// Main Code ================================================

// Create Asset Service
$service = new AssetSEIService(array(), "http://$SERVER_ADDRESS:$SERVER_PORT/ws/1.0/AssetService?wsdl");

// Get RSA key and encrypt the password.
$getRSA = new getRSAPublicEncryptionKey();
$RSAresponse = $service->getRSAPublicEncryptionKey($getRSA);
$key = $RSAresponse->return;
$ePassword = encrypt($PASSWORD, $key);

// login to the server and retrieve a session Id.
$login = new login($USERNAME, $ePassword);
$sessionId = $service->login($login)->return;
echo "Session ID: $sessionId\n\n";

// Get a list of available catalogs.
$getCatalogs = new getCatalogs($sessionId);
$catalogs = $service->getCatalogs($getCatalogs)->return;
$catalogId = "";
$continue = true;
$catalogcount = count($catalogs);
if ($catalogcount == 0) {
    echo "No catalogs available.  Go to http://$SERVER_ADDRESS:8091/ to create a catalog.\n\n";
    $continue = false;
} else {
    echo "$catalogcount catalog(s) available.\n";
    if ($catalogcount > 1) {
        $catalogId = $catalogs[0]->catalogId;
        foreach ($catalogs as $catalog) {
            echo "$catalog->name\n";
        }
    } else {
    $catalogId = $catalogs->catalogId;
    echo "$catalogs->name\n";
    }
}

if ($continue) {

// Build a search to retrieve assets from the first catalog.
$assetQuery = new AssetQuery();
$pageSize = 5;
$startingIndex = 0;
$assetQueryResultsOptions = new assetQueryResultOptions($pageSize, $startingIndex);
$assetQueryResultsOptions->fieldNames = array(
    0 => "Filename",
    1 => "Directory Path",
    2 => "Cataloged"
);

$sortOptions = new sortOptions(true);
$sortOptions->sortFieldName = "Cataloged";

$assetQuery->sortOptions = $sortOptions;

$getAssets = new getAssets($sessionId, $catalogId, $assetQuery, $assetQueryResultsOptions );

$AssetsResults = $service->getAssets($getAssets)->return;

$total = $AssetsResults->totalNumberOfAssets;
$assetCount = count($AssetsResults->assets);

// Print the results of the search.
echo "Retrieved $assetCount out of a total of $total assets.";
foreach ($AssetsResults->assets as $asset) {
    echo "\n";
    printAttributeValue("Filename", $asset);
    printAttributeValue("Directory Path", $asset);
    printAttributeValue("Cataloged", $asset);
}
}

// Logout
$service->logout(new logout($sessionId));

// Functions ================================================

function encrypt($pass, $keySpec) {

    $m = new Math_BigInteger($keySpec->modulusBase16, 16);
    $e = new Math_BigInteger($keySpec->exponent);

    $rsa = new Crypt_RSA();
    $publickey = array( "modulus" => $m, "e" => $e);
    $rsa->loadKey($publickey, CRYPT_RSA_PUBLIC_FORMAT_RAW);

    $rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
    $ePass = base64_encode($rsa->encrypt($pass));

    return $ePass;
}

function printAttributeValue ( $field, $asset) {
    $value = "";
    foreach ($asset->attributes as $att) {
        if ($att->name == $field) {
            if (count($att->values) > 1) {
                $value = $att->values[0];
            } else {
                $value = $att->values;
            }
            break;
        }
    }
    echo "$field: $value\n";
}
?>
