<?php

use SellerLegend\Http\Client;

$config = [
    "client_id" => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "refresh_token" => "REFRESH_TOKEN"
];

$client = new Client($config);

/**
 * Getting Registered Accounts List:
 * The SellerLegend API responds with details of the user,
 * against the provided access_token
 * The response contains:
 * id --> SellerLegend Account ID
 * name --> The name of the user registered at SellerLegend
 * email --> The registered email on SellerLegend
 * status --> The status of the account on SellerLegend
 * active --> if the user is active on SellerLegend, 1 | 0
 */

try {
    $response = $client->getUser();
    print_r($response);
} catch (Exception $e) {
    print_r($e->getMessage());
}
