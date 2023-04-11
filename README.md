# SellerLegend SDK

## Synopsis

Official SellerLegend SDK for Laravel applications.

## Requirements

php: ^7.1<br/>
ext-curl: *<br/>
ext-json: *<br/>
ext-zlib: *<br/>

## Documentation

[Postman](https://documenter.getpostman.com/view/17637582/UUxwD9Ao) <br/>
[Access Request](https://app.sellerlegend.com/account/developers) <br/>
[Getting Started](http://docs.sellerlegend.com)

## License
The MIT License (MIT). Please see License File for more information.

## Installation

The recommended way to install sellerlegend-sdk-php is through Composer:

```
composer require sellerlegend/sellerlegend-sdk-php
```

### Service Provider
```
SellerLegend\SellerLegendServiceProvider::class
```

### Publish Assets
```
$ php artisan vendor:publish --tag=sellerlegend
```
And that's it!

## Quick Start

### Get Authorization Code
To get an authorization code you only need client id and redirect path.

```
use SellerLegend\Http\Client;

$config = [
    "client_id"     => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "redirect"      => "REDIRECT_PATH"
];

$client = new Client($config);

$request = $client->getAuthorizationCode('YOUR_STATE_HERE');
```

### Get Access Token
To get access token you need to send the received auth code. The auth code is for one time use only.

```
$request = $client->getAccessToken($request->get("code"));
```

### Instantiate the Client
Once you have your `access_token` or the `refresh_token` you only need one of these along with client credentials to instantiate the client.

```
use SellerLegend\Http\Client;

$config = [
    "client_id"     => "CLIENT_ID",
    "client_secret" => "CLIENT_SECRET",
    "refresh_token" => "REFRESH_TOKEN"
];

$client = new Client($config);
```

### Refresh Access Token
You can refresh your access token when it expires by using the following method. The new access token will be in the request response.

```
$request = $client->refreshAccessToken();
```

### Check Service Status
```
$request = $client->getServiceStatus();
```
```
{
    "status": "Success",
    "code": 200,
    "message": "Active",
    "path": "api\/service-status"
}
```
### Get User Details
```
use SellerLegend\Http\UserClient;

$client = new UserClient($config);
$request = $client->getUser();
```
```
{
    "id": 1xxxxx,
    "name": "Fxxxxx Dxxxxx",
    "email": "fdxxxxx@domain.co",
    "status": "ACTIVE",
    "active": 1
}
```

### Get Accounts List
This method fetches list of all marketplaces connected on SellerLegend against the provided access_token

```
use SellerLegend\Http\UserClient;

$client = new UserClient($config);
$request = $client->getAccountsList();
```
```
[{
    "id": 1xxxxx,
    "account_title": "[ACCOUNT-TITLE]",
    "country_code": "US",
    "currency_code": "USD",
    "timezone": "America\/Los_Angeles",
    "marketplace": "ATVPDKIKX0DER",
    "seller_id": "[SELLER-ID]"
}]
```
### Get Connections List
This method returns a list of Amazon connections between SellerLegend and the Amazon Selling Partner API and the Amazon Advertising API. With connection token status and details about all connected marketplaces.

```
use SellerLegend\Http\UserClient;

$client = new UserClient($config);
$response = $client->getConnectionsList();
```
```
[{
    "account_title": "MyAccountTitle (Europe)",
    "seller_id": "<SELLER-ID>",
    "region": "Europe",
    "sp": {
        "status": "CONNECTED",
        "last_connected_at": "2023-03-26T06:58:53Z",
        "last_refreshed_at": "2023-04-10T02:10:23Z",
        "brand_analytics_access": true
    },
    "ppc": {
        "status": "CONNECTED",
        "last_connected_at": "2023-03-26T04:25:53Z",
        "last_refreshed_at": "2023-04-10T02:10:23Z",
    },
    "marketplaces": {
        "DE": {
            "account_title": "MyAccountTitle 2 (ES)",
            "country": "DE",
            "marketplace_id": "A1RKKUPIHCS9HS",
            "status": "ONBOARDED",
            "account_updates": {
                "orders_updated_at": "2023-04-01T00:10:53Z",
                "products_updated_at": "2023-04-02T01:30:20Z",
                "finances_updated_at": "2023-04-02T02:00:24Z",
                "inventory_updated_at": "2023-04-02T03:50:43Z",
                "ppc_updated_at": "2023-04-06T07:00:23Z"
            }
        },
        "ES": {
          "status": "NOT_STARTED_BY_USER"
        }
    }
}]
```
Once you've your account id you can start making report requests using that account id.

## Example API Calls

### Request Report
Request report method can accept `product_sku`, `dps_date` and/or `last_updated_at` parameters. See documentation for details.

The request report method returns `report_id` in response, which is a required parameter of other report calls. 

```
use SellerLegend\Http\ReportsClient;

$client = new ReportsClient($config);

$data = [
    'account_id' => '1xxxxx',
    'dps_date'   => '2020-07-01'
];

$response = $client->requestReport($data);
```
```
{
    "status": "Success",
    "code": 200,
    "message": "Request Submitted",
    "path": "api\/report\/request",
    "report_id": 7xxxxx
}
```

### Get Report Status
This method is supposed to return a status from the list of possible statuses. See documentation for details.

```
$report_id = 7xxxxx;

$response = $client->getReportStatus($report_id);
```
```
{
    "status": "working",
    "code": 200,
    "message": "Report Status",
    "path": "api\/reports\/status",
    "report_id": 7xxxxx
}
```

### Get Report
Retrieves `,` delimited csv report content.

```
$report_id = 7xxxxx;

$response = $client->getReport($report_id);
```

### Get Notifications List
This method accepts one of the SellerLegend registered notification types and responds with the list of notifications sent during the last 24 hours using zapier notification channel. See documentation for details.

```
use SellerLegend\Http\NotificationsClient;

$client = new NotificationsClient($config);

$notification_type = "Export Report";
$response = $client->getNotificationsList($notification_type);
```
```
[{
  "id": 8xxx2,
  "report_name": "US-COGS-20200827-080xxx.xlsx",
  "type": "COGS",
  "download_url": "https:\/\/app.sellerlegend.com\/reports\/download-report\/8xxx2",
  "status": "done",
  "requested_by": "Fxxxxx Dxxxxx",
  "requested_at": "2020-08-27 08:54:36",
  "completed_at": "2020-08-27 08:55:10"
}]
```