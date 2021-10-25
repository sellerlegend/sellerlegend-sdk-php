<?php

use Illuminate\Http\Request;
use SellerLegend\Http\Client;

$config = [
    "client_id"     => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "redirect"      => "REDIRECT_URL"
];

$client = new Client($config);

/**
 * STEP 2: Getting Access Token
 * If the SellerLegend user approves the authorization request, they will be redirected back to your application.
 * Here, you should first verify the state parameter against the value that was stored prior to the redirect.
 * If the state parameter matches issue a POST request to get an access token.
 * The request should include the authorization code that was issued by SellerLegend when the user approved the
 * authorization request.
 */

throw_unless(
    Request::get("state") == "YOUR_STRING",
    InvalidArgumentException::class
);

$response = $client->getAccessToken(Request::get("code"));

print_r($response);
