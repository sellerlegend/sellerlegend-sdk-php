<?php

namespace SellerLegend\Http;

use Exception;

class ConnectionsClient extends Client {

    /**
     * @return array
     * @throws Exception
     */
    public function getConnectionsList() {
        return $this->_submitCall("api/connections/list");
    }
}
