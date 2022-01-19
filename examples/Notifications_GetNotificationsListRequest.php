<?php

use SellerLegend\Http\NotificationsClient;

$config = [
    "client_id"     => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "refresh_token" => "REFRESH_TOKEN"
];

$client = new NotificationsClient($config);

/**
 * Getting Zapier Enabled Notifications List:
 * The SellerLegend API responds with the list of notifications been sent through zapier channel,
 * against the provided access_token and notification type, during the last 24 hours
 * Below is the list of valid notification types,
 * you are required to pass one of these at a time to get the list
 * +---------------------------------+
 * | Zapier Notification Types       |
 * |---------------------------------|
 * | Download Charge Invoices        |
 * | Excessive Order Quantity        |
 * | Export Report                   |
 * | Export Report Failure           |
 * | Feedback Notification           |
 * | Import Report                   |
 * | Inventory Alerts (on days)      |
 * | Inventory Alerts (on units)     |
 * | Listing Changes                 |
 * | Loss Of Buybox                  |
 * | Orders by Watchlisted Customers |
 * | Restock Suggestions             |
 * | Returns                         |
 * | Suppressed Listings             |
 * +---------------------------------+
 */

try {
    $notification_type = "Export Report";
    $response = $client->getNotificationsList($notification_type);
    print_r($response);

} catch (Exception $e) {
    print_r($e->getMessage());
}
