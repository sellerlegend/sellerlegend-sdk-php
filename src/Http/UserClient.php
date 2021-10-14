<?php

namespace SellerLegend\Http;

use Exception;

class UserClient extends Client {

    /**
     * @return array
     * @throws Exception
     */
    public function getUser() {
        return $this->_submitCall("api/user/me");
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getAccountsList() {
        return $this->_submitCall("api/user/accounts");
    }
}
