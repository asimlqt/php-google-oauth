<?php

// Copy your client id and secret from Google developer console

$clientId = '';
$clientSecret = '';
$redirectUrl = 'http://localhost';


// -----------------------------------------------------------------------------
// DO NOT EDIT BELOW THIS LINE
// -----------------------------------------------------------------------------


require_once 'src/Google_Client.php';

session_start();

$client = new Google_Client();
$client->setClientId($clientId);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUrl);
$client->setScopes(array('https://spreadsheets.google.com/feeds'));


if (isset($_GET['code'])) {
    $client->authenticate();
    print_r(json_decode($client->getAccessToken(), true));
    exit;
}

print '<a href="' . $client->createAuthUrl() . '">Authenticate</a>';
