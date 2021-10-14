<?php

use SellerLegend\Http\UserClient;

$config = [
    "client_id" => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "refresh_token" => "REFRESH_TOKEN"
];

$client = new UserClient($config);

/**
 * Getting Registered Accounts List:
 * The SellerLegend API responds with the list of amazon merchant profiles,
 * which are SellerLegend onboard, against the provided access_token
 * The response contains:
 * id --> SellerLegend Account ID
 * account_title --> The title of account on SellerLegend
 * country_code --> The marketplace's country code
 * currency_code --> The marketplace's currency
 * timezone --> The marketplace's timezone
 * marketplace --> The amazon provided marketplace ID
 * seller_id --> The amazon registered SellerID
 */

try {
    $response = $client->getAccountsList();
    print_r($response);

} catch (Exception $e) {
    print_r($e->getMessage());
}
