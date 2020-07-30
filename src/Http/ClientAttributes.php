<?php

namespace SellerLegend\Reports\Http;

trait ClientAttributes {

    private function _validateConfig(&$config) {
        if (is_null($config)) {
            throw new \Exception("'config' cannot be null.");
        }

        foreach ($config as $key => $value) {
            if (array_key_exists($key, $this->config)) {
                $this->config[$key] = $value;
            } else {
                throw new \Exception("Unknown parameter '{$key}' in config.");
            }
        }

        if (!isset($config["api_endpoint"])) {
            $config["api_endpoint"] = "https://app.sellerlegend.com";
        }

        return true;
    }

    private function _getResponse(CurlRequest $request) {
        $response = $request->execute();
        $response_info = $request->getInfo();
        $request->close();

        if (!preg_match("/^(2|3)\d{2}$/", $response_info["http_code"])) {
            return [
                "success"  => false,
                "code"     => $response_info["http_code"],
                "response" => $response
            ];
        } else {
            return [
                "success"  => true,
                "code"     => $response_info["http_code"],
                "response" => $response
            ];
        }
    }

    private function _submitCall($interface, $params = [], $method = "GET") {
        $headers = [
            "Authorization: Bearer {$this->config["access_token"]}",
            "Accept: application/json",
            "User-Agent: {$this->userAgent}"
        ];

        if (!is_null($this->config["client_id"])) {
            array_push($headers, "SellerLegend-Reports-API-ClientId: {$this->config["client_id"]}");
        }

        $request = new CurlRequest();
        $url = "{$this->endpoint}/{$interface}";

        switch (strtolower($method)) {
            case "get":
                if (!empty($params)) {
                    $url .= "?";
                    foreach ($params as $k => $v) {
                        $url .= "{$k}=" . rawurlencode($v) . "&";
                    }
                    $url = rtrim($url, "&");
                }
                break;
            case "put":
            case "post":
            case "delete":
                if (!empty($params)) {
                    $data = json_encode($params);
                    $request->setOption(CURLOPT_POST, true);
                    $request->setOption(CURLOPT_POSTFIELDS, $data);
                    array_push($headers, "Content-Type: application/json");
                }
                break;
            default:
                throw new \Exception("Unknown verb {$method}.");
        }

        $request->setOption(CURLOPT_URL, $url);
        $request->setOption(CURLOPT_HTTPHEADER, $headers);
        $request->setOption(CURLOPT_USERAGENT, $this->userAgent);
        $request->setOption(CURLOPT_CUSTOMREQUEST, strtoupper($method));

        return $this->_getResponse($request);
    }
}
