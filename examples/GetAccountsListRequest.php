<?php

use SellerLegend\Reports\Http\Client;

$config = [
    "client_id"     => "CLIENT_ID",
    "access_token"  => "ACCESS_TOKEN",
];

$client = new Client($config);

/**
 * Getting Registered Accounts List:
 * The SellerLegend API responds with the list of amazon merchant profiles,
 * which are SellerLegend onboard, against the provided access_token
 * The response contains:
 * id --> SellerLegend Account ID
 * country_code --> The marketplace's country code
 * currency_code --> The marketplace's currency
 * timezone --> The marketplace's timezone
 * marketplace --> The amazon provided marketplace ID
 * seller_id --> The amazon registered SellerID
 */

$response = $client->getAccountsList();

print_r($response);
