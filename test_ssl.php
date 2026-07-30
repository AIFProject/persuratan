<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

try {
    $response = $client->get('https://www.google.com');

    echo "Status : ".$response->getStatusCode();
} catch (\Exception $e) {
    echo $e->getMessage();
}