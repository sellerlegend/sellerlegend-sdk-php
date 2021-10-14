<?php

use SellerLegend\Http\CogsClient;

$config = [
    "client_id"     => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "refresh_token" => "REFRESH_TOKEN"
];

$client = new CogsClient($config);

/**
 * This endpoint is to provide list of all cost periods existing on a product
 * along with their relevant details. The endpoint need you to input product's
 * sku, asin or parent_asin (any one of these) for which you want to get the list.
 */

try {
    $response = $client->getCogsBySku(
        "YOUR_SELLER_ID",
        "ATVPDKIKX0DER",
        "MyProductSKUxxx"
    );

    print_r($response);

} catch (Exception $e) {
    print_r($e->getMessage());
}
