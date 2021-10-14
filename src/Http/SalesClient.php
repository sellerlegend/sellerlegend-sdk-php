<?php

namespace SellerLegend\Http;

use Exception;

class SalesClient extends Client {

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param int $page
     * @param null $start_date
     * @param null $end_date
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByID($seller_id, $marketplace_id, $start_date = null, $end_date = null, int $page = 1, int $per_page = 500) {
        return $this->_submitCall("api/sales/statistics-dashboard", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            "view_by"        => "product",
            "group_by"       => "Product",
            "start_date"     => $start_date,
            "end_date"       => $end_date,
            "per_page"       => $per_page,
            "page"           => $page,
        ]);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param int $page
     * @param null $start_date
     * @param null $end_date
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsBySKU($seller_id, $marketplace_id, $start_date = null, $end_date = null, int $page = 1, int $per_page = 500) {
        return $this->_submitCall("api/sales/statistics-dashboard", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            "view_by"        => "product",
            "group_by"       => "SKU",
            "start_date"     => $start_date,
            "end_date"       => $end_date,
            "per_page"       => $per_page,
            "page"           => $page,
        ]);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param int $page
     * @param null $start_date
     * @param null $end_date
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByASIN($seller_id, $marketplace_id, $start_date = null, $end_date = null, int $page = 1, int $per_page = 500) {
        return $this->_submitCall("api/sales/statistics-dashboard", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            "view_by"        => "product",
            "group_by"       => "ASIN",
            "start_date"     => $start_date,
            "end_date"       => $end_date,
            "per_page"       => $per_page,
            "page"           => $page,
        ]);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param int $page
     * @param null $start_date
     * @param null $end_date
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByParentASIN($seller_id, $marketplace_id, $start_date = null, $end_date = null, int $page = 1, int $per_page = 500) {
        return $this->_submitCall("api/sales/statistics-dashboard", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            "view_by"        => "product",
            "group_by"       => "ParentASIN",
            "start_date"     => $start_date,
            "end_date"       => $end_date,
            "per_page"       => $per_page,
            "page"           => $page,
        ]);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param int $page
     * @param null $start_date
     * @param null $end_date
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByBrand($seller_id, $marketplace_id, $start_date = null, $end_date = null, int $page = 1, int $per_page = 500) {
        return $this->_submitCall("api/sales/statistics-dashboard", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            "view_by"        => "product",
            "group_by"       => "Brand",
            "start_date"     => $start_date,
            "end_date"       => $end_date,
            "per_page"       => $per_page,
            "page"           => $page,
        ]);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param int $page
     * @param null $start_date
     * @param null $end_date
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByProductGroup($seller_id, $marketplace_id, $start_date = null, $end_date = null, int $page = 1, int $per_page = 500) {
        return $this->_submitCall("api/sales/statistics-dashboard", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            "view_by"        => "product",
            "group_by"       => "ProductGroup",
            "start_date"     => $start_date,
            "end_date"       => $end_date,
            "per_page"       => $per_page,
            "page"           => $page,
        ]);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param int $page
     * @param null $start_date
     * @param null $end_date
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByDay($seller_id, $marketplace_id, $start_date = null, $end_date = null, int $page = 1, int $per_page = 500) {
        return $this->_submitCall("api/sales/statistics-dashboard", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            "view_by"        => "date",
            "group_by"       => "Date",
            "start_date"     => $start_date,
            "end_date"       => $end_date,
            "per_page"       => $per_page,
            "page"           => $page,
        ]);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param int $page
     * @param null $start_date
     * @param null $end_date
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByWeek($seller_id, $marketplace_id, $start_date = null, $end_date = null, int $page = 1, int $per_page = 500) {
        return $this->_submitCall("api/sales/statistics-dashboard", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            "view_by"        => "date",
            "group_by"       => "Week",
            "start_date"     => $start_date,
            "end_date"       => $end_date,
            "per_page"       => $per_page,
            "page"           => $page,
        ]);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param int $page
     * @param null $start_date
     * @param null $end_date
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByMonth($seller_id, $marketplace_id, $start_date = null, $end_date = null, int $page = 1, int $per_page = 500) {
        return $this->_submitCall("api/sales/statistics-dashboard", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            "view_by"        => "date",
            "group_by"       => "Month",
            "start_date"     => $start_date,
            "end_date"       => $end_date,
            "per_page"       => $per_page,
            "page"           => $page,
        ]);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param int $page
     * @param null $start_date
     * @param null $end_date
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByQuarter($seller_id, $marketplace_id, $start_date = null, $end_date = null, int $page = 1, int $per_page = 500) {
        return $this->_submitCall("api/sales/statistics-dashboard", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            "view_by"        => "date",
            "group_by"       => "Quarter",
            "start_date"     => $start_date,
            "end_date"       => $end_date,
            "per_page"       => $per_page,
            "page"           => $page,
        ]);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param int $page
     * @param null $start_date
     * @param null $end_date
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsBySemester($seller_id, $marketplace_id, $start_date = null, $end_date = null, int $page = 1, int $per_page = 500) {
        return $this->_submitCall("api/sales/statistics-dashboard", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            "view_by"        => "date",
            "group_by"       => "Semester",
            "start_date"     => $start_date,
            "end_date"       => $end_date,
            "per_page"       => $per_page,
            "page"           => $page,
        ]);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param int $page
     * @param null $start_date
     * @param null $end_date
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByYear($seller_id, $marketplace_id, $start_date = null, $end_date = null, int $page = 1, int $per_page = 500) {
        return $this->_submitCall("api/sales/statistics-dashboard", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            "view_by"        => "date",
            "group_by"       => "Year",
            "start_date"     => $start_date,
            "end_date"       => $end_date,
            "per_page"       => $per_page,
            "page"           => $page,
        ]);
    }
}
