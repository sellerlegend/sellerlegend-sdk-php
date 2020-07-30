<?php
return [
    /**
     * The CLIENT-ID configured on SellerLegend
     *
     * You can find your CLIENT ID on SellerLegend's developers interface.
     * If you have not created one, please follow the documentation
     *
     */
    'client_id' => env('SL_CLIENT_ID'),

    /**
     * The CLIENT-SECRET configured on SellerLegend
     *
     * You can find your CLIENT SECRET on SellerLegend's developers interface.
     * If you have not created one, please follow the documentation
     *
     */
    'client_secret' => env('SL_CLIENT_SECRET'),

    /**
     * The registered REDIRECT-PATH of the client
     *
     * This is the path of SellerLegend API consuming app - your app
     * The redirect-path here should match the one you specified at SellerLegend's interface
     */
    'redirect' => env('SL_REDIRECT', 'http://your-app.com/'),

    /**
     * The ACCESS-TOKEN issued by SellerLegend
     *
     * You can leave this empty if you want to pass the values at runtime
     * If you haven't got any access token yet, use SellerLegend Client to get the access-token
     *
     */
    'access_token' => env('SL_ACCESS_TOKEN', null),

    /**
     * The REFRESH-TOKEN issued by SellerLegend
     *
     * You can leave this empty if you want to pass the values at runtime
     * This parameter is not required until your access token has not not been revoked
     *
     */
    'refresh_token' => env('SL_REFRESH_TOKEN', null),

    /**
     * The version of SellerLegend application you're using
     *
     * By default this is set to 'v1' - the retail version of SellerLegend
     * Please contact support <support@sellerlegend.com> if you are not sure of the version
     */
    'app_version' => env('SL_APP_VERSION', 'v1'),
];
