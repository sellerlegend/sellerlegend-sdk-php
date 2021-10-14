<?php

use SellerLegend\Http\CogsClient;

$config = [
    "client_id"     => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "refresh_token" => "REFRESH_TOKEN"
];

$client = new CogsClient($config);

/**
 * This endpoint allows you to modify all associated cost periods of
 * a product (or a list of products). This action overrides all existing cost-periods
 * with the new list provided, so make sure you do send all cost periods which you want to keep,
 * every time, even if there's no change in them. In short, this endpoint behaves exactly the same way
 * as do the COGS file upload.
 */

try {
    $response = $client
        ->setCostElement(
            "2021-01-01", "2021-12-31", "Pick & Pack", "", "",
            2.9, 2.9, "USD", 1, 1)
        ->setCostElement(
            "2021-01-01", "2021-12-31", "Shipping Charges", "", "",
            3.15, 3.15, "USD", 1, 1)
        // add more setCostElement here as many as you want, but postCogsBySku should be the last call of this sequence
        ->postCogsBySku(
            "YOUR_SELLER_ID", "ATVPDKIKX0DER", "MyProductSKUxxx");

    print_r($response);

    /**
     * @NOTE Please bear in mind that the changes do not get immediately reflected all across the SellerLegend app,
     * it however triggers an event which propagates changes in (~approx) 60 minutes
     */

} catch (Exception $e) {
    print_r($e->getMessage());
}
