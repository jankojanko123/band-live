<?php
// include your composer dependencies
require_once '../vendor/autoload.php';

$client = new Google_Client();
$client->setAuthConfig('../creds/client_secret_18465532971-20volsbv87tfc7c3sl1ltr0t343dioun.apps.googleusercontent.com.json');

$client->addScope(Google_Service_Drive::DRIVE);

// Your redirect URI can be any registered URI, but in this example
// we redirect back to this same page
$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$client->setRedirectUri($redirect_uri);

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
}
