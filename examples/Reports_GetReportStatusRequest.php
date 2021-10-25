<?php

use SellerLegend\Http\ReportsClient;

$config = [
    "client_id"     => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "refresh_token" => "REFRESH_TOKEN"
];

$client = new ReportsClient($config);

/**
 * Getting Report Status:
 * The SellerLegend API requires 'report_id'
 * which was been provided while requesting a report in previous step.
 */

$report_id = "REPORT_ID";

/**
 * The API responds with one the following statuses:
 * queued --> when the request has been accepted but not processed,
 * working --> when the request is getting processed,
 * failed --> when a report has failed due to any anomaly at server side,
 * done --> when the request has been processed, and the report is ready to download,
 * cancelling --> when the request is in process of cancelling,
 * cancelled --> when the request has been cancelled by the administration
 */

try {
    $response = $client->getReportStatus($report_id);
    print_r($response);

} catch (Exception $e) {
    print_r($e->getMessage());
}
