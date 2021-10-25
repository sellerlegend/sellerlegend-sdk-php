<?php

namespace SellerLegend\Http;

class RestockSuggestionsClient extends Client {

    /**
     * @param $seller_id
     * @param $marketplace_id
     * @param int $per_page
     * @param int $page
     * @return array
     * @throws \Exception
     */
    public function getRestockSuggestions($seller_id, $marketplace_id, int $per_page, int $page = 1) {
        return $this->_submitCall("api/supply-chain/restock-suggestions", [
            "seller_id"      => $seller_id,
            "marketplace_id" => $marketplace_id,
            "per_page"       => $per_page,
            "page"           => $page
        ]);
    }
}
