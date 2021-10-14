<?php

namespace SellerLegend\Http;

use Exception;

class CogsClient extends Client {

    /** @var array */
    protected $cost_elements = [];

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param $value
     * @return array
     * @throws Exception
     */
    public function getCogsBySku($seller_id, $marketplace_id, $value) {
        return $this->getCogs($seller_id, $marketplace_id, "sku", $value);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param $value
     * @return array
     * @throws Exception
     */
    public function getCogsByAsin($seller_id, $marketplace_id, $value) {
        return $this->getCogs($seller_id, $marketplace_id, "asin", $value);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param $value
     * @return array
     * @throws Exception
     */
    public function getCogsByParentAsin($seller_id, $marketplace_id, $value) {
        return $this->getCogs($seller_id, $marketplace_id, "parent_asin", $value);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param $key
     * @param $value
     * @return array
     * @throws Exception
     */
    protected function getCogs($seller_id, $marketplace_id, $key, $value) {
        return $this->_submitCall("api/cogs/cost-periods", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            $key             => $value
        ]);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param $value
     * @return array
     * @throws Exception
     */
    public function deleteCogsBySku($seller_id, $marketplace_id, $value) {
        return $this->deleteCogs($seller_id, $marketplace_id, "sku", $value);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param $value
     * @return array
     * @throws Exception
     */
    public function deleteCogsByAsin($seller_id, $marketplace_id, $value) {
        return $this->deleteCogs($seller_id, $marketplace_id, "asin", $value);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param $value
     * @return array
     * @throws Exception
     */
    public function deleteCogsByParentAsin($seller_id, $marketplace_id, $value) {
        return $this->deleteCogs($seller_id, $marketplace_id, "parent_asin", $value);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param $key
     * @param $value
     * @return array
     * @throws Exception
     */
    protected function deleteCogs($seller_id, $marketplace_id, $key, $value) {
        return $this->_submitCall("api/cogs/cost-periods", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            $key             => $value
        ], "delete");
    }

    /**
     * @param string $from_date
     * @param string $to_date
     * @param string $cost_element
     * @param string|null $provider
     * @param string|null $notes
     * @param double $total_amount
     * @param double $amount
     * @param string $currency
     * @param int $units
     * @param double $conversion_rate
     * @return $this
     */
    public function setCostElement(string $from_date, string $to_date, string $cost_element, ?string $provider, ?string $notes,
                                   float $total_amount, float $amount, string $currency, int $units = 1, $conversion_rate = 1) {

        if (!isset($this->cost_elements[$from_date . "_" . $to_date])) {
            $this->cost_elements[$from_date . "_" . $to_date] = [
                "dates"         => compact("from_date", "to_date"),
                "cost_elements" => []
            ];
        }

        $this->cost_elements[$from_date . "_" . $to_date]["cost_elements"][] = [
            "cost_element"    => $cost_element,
            "provider"        => $provider,
            "amount"          => $amount,
            "notes"           => $notes,
            "total_amount"    => $total_amount,
            "units"           => $units,
            "conversion_rate" => $conversion_rate,
            "currency"        => $currency
        ];

        return $this;
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param $value
     * @return array
     * @throws Exception
     */
    public function postCogsBySku($seller_id, $marketplace_id, $value) {
        return $this->postCogs($seller_id, $marketplace_id, "sku", $value);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param $value
     * @return array
     * @throws Exception
     */
    public function postCogsByAsin($seller_id, $marketplace_id, $value) {
        return $this->postCogs($seller_id, $marketplace_id, "asin", $value);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param $value
     * @return array
     * @throws Exception
     */
    public function postCogsByParentAsin($seller_id, $marketplace_id, $value) {
        return $this->postCogs($seller_id, $marketplace_id, "parent_asin", $value);
    }

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param $key
     * @param $value
     * @return array
     * @throws Exception
     */
    protected function postCogs($seller_id, $marketplace_id, $key, $value) {
        $data = $this->cost_elements;
        $this->cost_elements = [];

        return $this->_submitCall("api/cogs/cost-periods", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            $key             => $value,
            "data"           => $data
        ], "post");
    }

}
