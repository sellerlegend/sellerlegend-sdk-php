<?php

namespace SellerLegend\Reports\Http;

class Versions {

    public $resellerConfig = [
        "local" => [
            "apiVersion"         => "v1",
            "applicationVersion" => "1.0",
            "reseller"           => "R1",
            "endpoint"           => "http://localhost/sellerlegend/public"
        ],

        "v1" => [
            "apiVersion"         => "v1",
            "applicationVersion" => "1.0",
            "reseller"           => "R1",
            "endpoint"           => "https://app.sellerlegend.com"
        ],

        "v8" => [
            "apiVersion"         => "v1",
            "applicationVersion" => "1.0",
            "reseller"           => "R8",
            "endpoint"           => "https://dashboard.sunkenstone.com"
        ],

        "v10" => [
            "apiVersion"         => "v1",
            "applicationVersion" => "1.0",
            "reseller"           => "R10",
            "endpoint"           => "https://app.bettersellerdata.com"
        ],
    ];
}
