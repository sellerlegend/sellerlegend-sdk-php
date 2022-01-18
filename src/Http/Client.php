<?php

namespace SellerLegend\Http;

use Exception;
use SellerLegend\Http\Helpers\CurlRequest;
use SellerLegend\Http\Traits\ClientAttributes;

class Client {

    use ClientAttributes;

    private $config = [
        "client_id"     => null,
        "client_secret" => null,
        "access_token"  => null,
        "refresh_token" => null,
        "api_endpoint"  => null,
        "redirect"      => null
    ];

    private $endpoint;
    private $authUrl = "/oauth/authorize";
    private $tokenUrl = "/oauth/token";
    private $version = "1.0.4";
    private $userAgent;

    public function __construct($config) {
        $this->config = $config;

        $this->_validateConfig($this->config);

        $this->userAgent = "SellerLegend-SDK PHP Client Library {$this->version}";
        $this->endpoint = $this->config["api_endpoint"];
        $this->authUrl = $this->endpoint . $this->authUrl;
        $this->tokenUrl = $this->endpoint . $this->tokenUrl;

        if (is_null($this->config["access_token"]) && !is_null($this->config["refresh_token"])) {
            /* convenience */
            $this->refreshAccessToken();
        }
    }

    public function getAuthorizationCode($state) {
        $query = http_build_query([
            "response_type" => "code",
            "client_id"     => $this->config["client_id"],
            "redirect_uri"  => $this->config["redirect"],
            "state"         => $state,
            "scope"         => "*",
        ]);

        return redirect($this->authUrl . "?" . $query);
    }

    /**
     * @param string $code
     * @return array
     */
    public function getAccessToken($code) {
        $headers = [
            "Content-Type: application/x-www-form-urlencoded;charset=UTF-8",
            "User-Agent: {$this->userAgent}"
        ];

        $request = new CurlRequest();
        $request->setOption(CURLOPT_URL, $this->tokenUrl);
        $request->setOption(CURLOPT_HTTPHEADER, $headers);
        $request->setOption(CURLOPT_USERAGENT, $this->userAgent);
        $request->setOption(CURLOPT_POST, true);
        $request->setOption(CURLINFO_HEADER_OUT, true);
        $request->setOption(CURLOPT_POSTFIELDS, http_build_query([
            "grant_type"    => "authorization_code",
            "client_id"     => $this->config["client_id"],
            "client_secret" => $this->config["client_secret"],
            "redirect_uri"  => $this->config["redirect"],
            "code"          => $code,
        ]));

        return $this->_getResponse($request);
    }

    public function refreshAccessToken() {
        $headers = [
            "Content-Type: application/x-www-form-urlencoded;charset=UTF-8",
            "User-Agent: {$this->userAgent}"
        ];

        $refresh_token = rawurldecode($this->config["refresh_token"]);

        $request = new CurlRequest();
        $request->setOption(CURLOPT_URL, $this->tokenUrl);
        $request->setOption(CURLOPT_HTTPHEADER, $headers);
        $request->setOption(CURLOPT_USERAGENT, $this->userAgent);
        $request->setOption(CURLOPT_POST, true);
        $request->setOption(CURLOPT_POSTFIELDS, http_build_query([
            "grant_type"    => "refresh_token",
            "client_id"     => $this->config["client_id"],
            "client_secret" => $this->config["client_secret"],
            "refresh_token" => $refresh_token
        ]));

        $response = $this->_getResponse($request);
        $response_array = json_decode($response["response"], true);

        if (is_array($response_array)) {
            if (isset($response["success"]) && $response["success"]) {
                if (array_key_exists("access_token", $response_array)) {
                    $this->config["access_token"] = $response_array["access_token"];
                }
            }
        }

        return $response;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getServiceStatus() {
        return $this->_submitCall("api/service-status");
    }
}
