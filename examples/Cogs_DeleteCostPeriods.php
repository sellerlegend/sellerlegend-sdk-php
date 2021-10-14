<?php

use SellerLegend\Http\CogsClient;

$config = [
    "client_id"     => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "refresh_token" => "REFRESH_TOKEN"
];

$client = new CogsClient($config);

/**
 * This endpoint allows you to simply flush out all existing cost-periods and COGS for any specified product.
 */

try {
    $response = $client->deleteCogsBySku(
        "YOUR_SELLER_ID",
        "ATVPDKIKX0DER",
        "MyProductSKUxxx"
    );

    print_r($response);

} catch (Exception $e) {
    print_r($e->getMessage());
}
