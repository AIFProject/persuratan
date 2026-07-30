<?php

require __DIR__.'/vendor/autoload.php';

$client = new GuzzleHttp\Client([
    'verify' => 'C:\laragon\etc\ssl\cacert.pem',
]);

try {
    $response = $client->get('https://oauth2.googleapis.com/token');
    echo "Status: ".$response->getStatusCode();
} catch (\Exception $e) {
    echo $e->getMessage();
}