<?php

namespace SellerLegend\Http;

use Exception;

class SalesClient extends Client {

    /**
     * @param string $seller_id
     * @param string $marketplace_id
     * @param string|null $amazon_order_id
     * @param string|null $start_date
     * @param string|null $end_date
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getOrders(string $seller_id, string $marketplace_id, ?string $amazon_order_id = null, ?string $start_date = null, ?string $end_date = null, int $page = 1, int $per_page = 500) {
        $amazon_order_id = $amazon_order_id ? ["amazon_order_id" => $amazon_order_id] : [];
        return $this->_submitCall("api/sales/orders", array_merge([
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            "start_date"     => $start_date,
            "end_date"       => $end_date,
            "per_page"       => $per_page,
            "page"           => $page,
        ], $amazon_order_id));
    }

    /**
     * @param string $seller_id
     * @param string $marketplace_id
     * @param string|null $start_date
     * @param string|null $end_date
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getTransactions(string $seller_id, string $marketplace_id, string $start_date = null, string $end_date = null, int $page = 1, int $per_page = 500) {
        return $this->_submitCall("api/sales/transactions", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            "start_date"     => $start_date,
            "end_date"       => $end_date,
            "per_page"       => $per_page,
            "page"           => $page,
        ]);
    }

    /**
     * @param string $seller_id
     * @param string $marketplace_id
     * @param string|null $start_date
     * @param string|null $end_date
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesPerDayPerProduct(string $seller_id, string $marketplace_id, ?string $start_date = null, ?string $end_date = null, int $page = 1, int $per_page = 500) {
        return $this->_submitCall("api/sales/per-day-per-product", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            "start_date"     => $start_date,
            "end_date"       => $end_date,
            "per_page"       => $per_page,
            "page"           => $page,
        ]);
    }

    /**
     * @param string $seller_id
     * @param string $marketplace_id
     * @param string|null $start_date
     * @param string|null $end_date
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByID(string $seller_id, string $marketplace_id, ?string $start_date = null, ?string $end_date = null, int $page = 1, int $per_page = 500) {
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
     * @param string $seller_id
     * @param string $marketplace_id
     * @param string|null $start_date
     * @param string|null $end_date
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsBySKU(string $seller_id, string $marketplace_id, ?string $start_date = null, ?string $end_date = null, int $page = 1, int $per_page = 500) {
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
     * @param string $seller_id
     * @param string $marketplace_id
     * @param string|null $start_date
     * @param string|null $end_date
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByASIN(string $seller_id, string $marketplace_id, ?string $start_date = null, ?string $end_date = null, int $page = 1, int $per_page = 500) {
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
     * @param string $seller_id
     * @param string $marketplace_id
     * @param string|null $start_date
     * @param string|null $end_date
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByParentASIN(string $seller_id, string $marketplace_id, ?string $start_date = null, ?string $end_date = null, int $page = 1, int $per_page = 500) {
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
     * @param string $seller_id
     * @param string $marketplace_id
     * @param string|null $start_date
     * @param string|null $end_date
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByBrand(string $seller_id, string $marketplace_id, ?string $start_date = null, ?string $end_date = null, int $page = 1, int $per_page = 500) {
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
     * @param string $seller_id
     * @param string $marketplace_id
     * @param string|null $start_date
     * @param string|null $end_date
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByProductGroup(string $seller_id, string $marketplace_id, ?string $start_date = null, ?string $end_date = null, int $page = 1, int $per_page = 500) {
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
     * @param string $seller_id
     * @param string $marketplace_id
     * @param string|null $start_date
     * @param string|null $end_date
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByDay(string $seller_id, string $marketplace_id, ?string $start_date = null, ?string $end_date = null, int $page = 1, int $per_page = 500) {
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
     * @param string $seller_id
     * @param string $marketplace_id
     * @param string|null $start_date
     * @param string|null $end_date
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByWeek(string $seller_id, string $marketplace_id, ?string $start_date = null, ?string $end_date = null, int $page = 1, int $per_page = 500) {
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
     * @param string $seller_id
     * @param string $marketplace_id
     * @param string|null $start_date
     * @param string|null $end_date
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByMonth(string $seller_id, string $marketplace_id, ?string $start_date = null, ?string $end_date = null, int $page = 1, int $per_page = 500) {
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
     * @param string $seller_id
     * @param string $marketplace_id
     * @param string|null $start_date
     * @param string|null $end_date
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByQuarter(string $seller_id, string $marketplace_id, ?string $start_date = null, ?string $end_date = null, int $page = 1, int $per_page = 500) {
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
     * @param string $seller_id
     * @param string $marketplace_id
     * @param string|null $start_date
     * @param string|null $end_date
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsBySemester(string $seller_id, string $marketplace_id, ?string $start_date = null, ?string $end_date = null, int $page = 1, int $per_page = 500) {
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
     * @param string $seller_id
     * @param string $marketplace_id
     * @param string|null $start_date
     * @param string|null $end_date
     * @param int $page
     * @param int $per_page
     * @return array
     * @throws Exception
     */
    public function getSalesStatisticsByYear(string $seller_id, string $marketplace_id, ?string $start_date = null, ?string $end_date = null, int $page = 1, int $per_page = 500) {
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
