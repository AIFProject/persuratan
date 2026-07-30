<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client([
    'verify' => 'C:/laragon/etc/ssl/cacert.pem',
]);

try {
    $response = $client->post('https://oauth2.googleapis.com/token', [
        'form_params' => [
            'grant_type' => 'invalid'
        ]
    ]);

    echo $response->getStatusCode();

} catch (Exception $e) {
    echo get_class($e) . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
}