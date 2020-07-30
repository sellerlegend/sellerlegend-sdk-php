# SellerLegend SDK

## Synopsis

Official SellerLegend SDK for Laravel applications.

## Requirements

php: ^7.1<br/>
ext-curl: *<br/>
ext-json: *<br/>
ext-zlib: *<br/>

## Documentation

[API Reference](http://docs.sellerlegend.com)<br/>
[Access Request](http://docs.sellerlegend.com)<br/>
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
SellerLegend\Reports\SellerLegendServiceProvider::class
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
use SellerLegend\Reports\Http\Client;

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
use SellerLegend\Reports\Http\Client;

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

### Get Accounts List
```
$request = $client->getAccountsList();
```
```
[{
    "id": 100000,
    "country_code": "US",
    "currency_code": "USD",
    "timezone": "America\/Los_Angeles",
    "marketplace": "ATVPDKIKX0DER",
    "seller_id": "<SELLER-ID>"
}]
```
Once you've your account id you can start making report requests using that account id.

## Example API Calls

### Request Report
Request report method can accept `product_sku`, `dps_date` and/or `last_updated_at` parameters. See documentation for details.

The request report method returns `report_id` in response, which is a required parameter of other report calls. 

```
$data = [
    'account_id' => '100000',
    'dps_date'   => '2020-07-01'
];

$response = $client->requestReport($data);
```
```
{
    "status": "Success",
    "code": 200,
    "message": "Request Submitted",
    "path": "api\/request-report",
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
    "path": "api\/report-status",
    "report_id": 7xxxxx
}
```

### Get Report
Retrieves `,` delimited csv report content.

```
$report_id = 7xxxxx;

$response = $client->getReport($report_id);
```