<?php

use SellerLegend\Http\Client;

$config = [
    "client_id" => "CLIENT_ID",
    "redirect"  => "RETURN_URL"
];

$client = new Client($config);

/**
 * STEP 1: Getting Authorization Code
 * The SellerLegend API manages permissions using the Login with SellerLegend service - the authorization code grant.
 * The API uses authorization and refresh tokens in a standard OAuth 2.0 flow.
 * You are required to obtain authorization code and pass it to get ACCESS and REFRESH TOKEN
 * For example, to generate an authorization code for users of retail version, the client makes the following request:
 * https://app.sellerlegend.com/oauth/authorize?client_id=YOUR_SL_CLIENT_ID&scope=&state=YOUR_APP_STATE&response_type=code&redirect_uri=YOUR_RETURN_URL
 */

/**
 * The API do not maintain session state between requests. This needs to handled at your end.
 * You should first verify the state parameter against the value that was stored prior to the redirect.
 * If the state parameter matches your should then issue a request to get access token.
 */

$state = "YOUR_STRING";

return $client->getAuthorizationCode($state);
