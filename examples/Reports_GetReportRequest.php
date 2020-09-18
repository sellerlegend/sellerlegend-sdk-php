<?php

use SellerLegend\Http\Client;

$config = [
    "client_id" => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "refresh_token" => "REFRESH_TOKEN"
];

$client = new Client($config);

/**
 * Getting Report Content:
 * The SellerLegend API requires 'report_id'
 * which was been provided while requesting a report in previous step.
 */

$report_id = "REPORT_ID";

/**
 * The API responds with ',' delimited csv file as gzencoded string, which is then decoded by the client
 * this csv data contains following headers:
 * 'sku';'date';'product_cost';'vat';'fees';'total_promo_amount';'ppc_spent';'ppc_sales';'ppc_units';'ppc_clicks';'ppc_impressions';'profit_after_ppc';'promo_units';'organic_units';'quantity_ordered';'quantity_returned';'orders_count';'promo_sales';'organic_sales';'ooe';'revenue';'sessions';'page_views';'quantity_returned_on_purchase_date';'pending_revenue';'estimated_principal';'taxes';'income_principal';'income_other';'income_fees';'income_commission_fees';'income_other_fees';'refund_principal';'refund_other';'refund_fees';'refund_commission_fees';'refund_other_fees';'estimated_fees';'product_vat';'marketplace_vat';'quantity_shipped';'shipping_cost';'miscellaneous_costs';'min_inventory';'max_inventory';'avg_inventory'
 */

$response = $client->getReport($report_id);

print_r($response);
