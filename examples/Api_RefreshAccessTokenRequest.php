<?php

use SellerLegend\Http\Client;

$config = [
    "client_id"     => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "refresh_token" => "REFRESH_TOKEN",
];

$client = new Client($config);

/**
 * Refreshing Access Token:
 * The SellerLegend application issues short-lived access tokens,
 * You (the consumer) need to refresh your access tokens via the refresh token
 * that was provided when the access token was issued.
 */

$response = $client->refreshAccessToken();

print_r($response);
