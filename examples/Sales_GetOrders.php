<?php

use SellerLegend\Http\SalesClient;

$config = [
    "client_id"     => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "refresh_token" => "REFRESH_TOKEN"
];

$client = new SalesClient($config);

try {
    $response = $client->getOrders(
        "YOUR_SELLER_ID",
        "MARKETPLACE_ID",
        null,
        "2021-07-01",
        "2021-07-31",
        1,
        500
    );

    print_r($response);

} catch (Exception $e) {
    print_r($e->getMessage());
}
