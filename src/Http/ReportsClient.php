<?php

namespace SellerLegend\Http;

use Exception;

class ReportsClient extends Client {

    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function requestReport($data) {
        return $this->_submitCall("api/reports/request", $data, "POST");
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
