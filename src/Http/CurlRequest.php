<?php
namespace SellerLegend\Reports\Http;

class CurlRequest
{
    private $handle = null;

    public function __construct()
    {
        $this->reset();
    }

    public function reset()
    {
        $this->handle = curl_init();
        curl_setopt($this->handle, CURLOPT_PORT, 443);
        curl_setopt($this->handle, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($this->handle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($this->handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->handle, CURLOPT_HEADER, false);
        if (defined("CURLOPT_IPRESOLVE")) {
            curl_setopt($this->handle, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        }
    }

    public function setOption($name, $value)
    {
        curl_setopt($this->handle, $name, $value);
    }

    public function execute()
    {
        return curl_exec($this->handle);
    }

    public function getInfo()
    {
        return curl_getinfo($this->handle);
    }

    public function getError()
    {
        return curl_error($this->handle);
    }

    public function close()
    {
        curl_close($this->handle);
    }
}
