<?php

use SellerLegend\Http\UserClient;

$config = [
    "client_id"     => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "refresh_token" => "REFRESH_TOKEN"
];

$client = new UserClient($config);

/**
 * Getting Amazon Connections List:
 * This method fetches list of amazon connections between SellerLegend with Amazon Selling Partner API and Amazon Advertising API token status and respective marketplace's information.
 * The response contains:
 * account_title --> The title of account on SellerLegend
 * seller_id --> The amazon registered SellerID
 * region --> The marketplace's region
 * sp --> status --> The status of Amazon selling partner API
 * sp --> last_connected_at --> Timestamp when sp_api token updated
 * sp --> brand_analytics_access --> Does account has access to sales_traffic_report, true | false
 * ppc --> status --> The status of Amazon advertising partner API
 * ppc --> last_connected_at --> Timestamp when ppc token updated
 * Marketplace's List
 * A list of all marketplaces with account_title, marketplace_id, status, onboarding_progress (if account is still in onboarding phase) or account_updates (if account is onboarded)
 */

try {
    $response = $client->getConnectionsList();
    print_r($response);

} catch (Exception $e) {
    print_r($e->getMessage());
}
