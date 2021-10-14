<?php

use SellerLegend\Http\SalesClient;

$config = [
    "client_id" => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "refresh_token" => "REFRESH_TOKEN"
];

$client = new SalesClient($config);

/**
 * This endpoint makes Sales Statistics screen data available through API.
 * Since this endpoint provides statistics grouped in many ways, all you need
 * to choose is the correct method for your need, based on the list below:
 *
 * ==================================================================
 * | Statistics Group           | Endpoint / method                 |
 * ==================================================================
 * | Product - ID               | getSalesStatisticsByID            |
 * | Product - SKU              | getSalesStatisticsBySKU           |
 * | Product - ASIN             | getSalesStatisticsByASIN          |
 * | Product - Parent ASIN      | getSalesStatisticsByParentASIN    |
 * | Product - Brand            | getSalesStatisticsByBrand         |
 * | Product - Product Group    | getSalesStatisticsByProductGroup  |
 * | Date - Day                 | getSalesStatisticsByDay           |
 * | Date - Week                | getSalesStatisticsByWeek          |
 * | Date - Month               | getSalesStatisticsByMonth         |
 * | Date - Quarter             | getSalesStatisticsByQuarter       |
 * | Date - Semester            | getSalesStatisticsBySemester      |
 * | Date - Year                | getSalesStatisticsByYear          |
 * ==================================================================
 */

try {
    $response = $client->getSalesStatisticsByDay(
        "YOUR_SELLER_ID",
        "ATVPDKIKX0DER",
        "2021-07-01",
        "2021-07-31",
        1,
        500
    );

    print_r($response);

} catch (Exception $e) {
    print_r($e->getMessage());
}
