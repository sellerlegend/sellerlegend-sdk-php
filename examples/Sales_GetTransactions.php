<?php

use SellerLegend\Http\SalesClient;

$config = [
    "client_id"     => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "refresh_token" => "REFRESH_TOKEN"
];

$client = new SalesClient($config);

try {
    $response = $client->getTransactions(
        "YOUR_SELLER_ID",
        "MARKETPLACE_ID",
        "2022-01-01 00:00:00",
        "2021-01-01 00:29:59",
        1,
        500
    );

    print_r($response);

} catch (Exception $e) {
    print_r($e->getMessage());
}
