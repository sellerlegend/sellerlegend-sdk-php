<?php

use SellerLegend\Reports\Http\Client;

$config = [
    "client_id"     => "CLIENT_ID",
    "access_token"  => "ACCESS_TOKEN",
];

$client = new Client($config);

/**
 * Get SellerLegend Service Status:
 * The SellerLegend API responds with the status code 200 and status 'Active',
 * if the service is up and running
 */

$response = $client->getServiceStatus();

print_r($response);
