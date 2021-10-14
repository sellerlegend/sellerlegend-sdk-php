<?php

use SellerLegend\Http\ReportsClient;

$config = [
    "client_id" => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "refresh_token" => "REFRESH_TOKEN"
];

$client = new ReportsClient($config);

/**
 * Requesting Report:
 * The SellerLegend API receives list of following parameters to successfully log your request:
 * account_id --> The id of a SellerLegend onboard account, only one at a time, this is a required parameter
 * product_sku --> SellerSKU of amazon listing, this must belong to the provided account_id
 * dps_date --> The amazon order date if sales data is concerned
 * last_updated_date --> The last update date at SellerLegend, the API responds with all data updated on and after this date
 */

$data = [
    'account_id'        => 'SL_ACCOUNT_ID', // required
    'product_sku'       => 'AMAZON_SellerSKU', // required if not 'dps_date' or 'last_updated_date' provided
    'dps_date'          => '2020-07-01', // required if not 'product_sku' or 'last_updated_date' provided, format:Y-m-d
    'last_updated_date' => '2020-07-01' // required if not 'product_sku' or 'dps_date', format:Y-m-d
];

/**
 * The API responds with 'report_id' if the request went successful
 * The maximum time a report takes to get ready to download is 3 hours
 * You can check the status of your requested report using this 'report_id',
 * and download when its status is 'done'
 */

try {
    $response = $client->requestReport($data);
    print_r($response);

} catch (Exception $e) {
    print_r($e->getMessage());
}
