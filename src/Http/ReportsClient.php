<?php

namespace SellerLegend\Http;

use Exception;

class ReportsClient extends Client {

    /**
     * @param string $seller_id
     * @param string $marketplace_id
     * @param string|null $product_sku
     * @param string|null $dps_date
     * @param string|null $last_updated_date
     * @return array
     * @throws Exception
     */
    public function requestReport(string $seller_id, string $marketplace_id, ?string $product_sku = null, ?string $dps_date = null, ?string $last_updated_date = null) {
        $params = [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id
        ];

        !$product_sku ?: ($params["product_sku"] = $product_sku);
        !$dps_date ?: ($params["dps_date"] = $dps_date);
        !$last_updated_date ?: ($params["last_updated_date"] = $last_updated_date);

        return $this->_submitCall("api/reports/request", $params, "POST");
    }

    /**
     * @param string|int $report_id
     * @return array
     * @throws Exception
     */
    public function getReportStatus($report_id) {
        return $this->_submitCall("api/reports/status", compact("report_id"));
    }

    /**
     * @param string|int $report_id
     * @return array
     * @throws Exception
     */
    public function getReport($report_id) {
        $response = $this->_submitCall("api/reports/download", compact("report_id"));
        if ($response["success"]) {
            try {
                $response["response"] = empty($response["response"]) ? "[]" : gzdecode($response["response"]);
            } catch (Exception $ex) {
                $response["response"] = $ex->getMessage();
            }
        }
        return $response;
    }
}
