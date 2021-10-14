<?php

use SellerLegend\Http\Client;

$config = [
    "client_id" => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "refresh_token" => "REFRESH_TOKEN"
];

$client = new Client($config);

/**
 * Get SellerLegend Service Status:
 * The SellerLegend API responds with the status code 200 and status 'Active',
 * if the service is up and running
 */

try {
    $response = $client->getServiceStatus();
    print_r($response);

} catch (Exception $e) {
    print_r($e->getMessage());
}

