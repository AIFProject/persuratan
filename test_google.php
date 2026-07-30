<?php

require 'vendor/autoload.php';

use Google\Client;
use GuzzleHttp\Client as GuzzleClient;

$client = new Client();

$client->setHttpClient(new GuzzleClient([
    'verify' => 'C:/laragon/etc/ssl/cacert.pem',
]));

$client->setAuthConfig(__DIR__ . '/storage/app/google-drive/service-account.json');

$client->addScope(\Google\Service\Drive::DRIVE);

try {

    $token = $client->fetchAccessTokenWithAssertion();

    var_dump($token);

} catch (Throwable $e) {

    echo get_class($e) . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;

}