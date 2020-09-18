<?php

namespace SellerLegend\Http\Traits;

trait NotificationsAttributes {

    /**
     * @param string $notification_type
     * @return array
     * @throws \Exception
     */
    public function getNotificationsList($notification_type) {
        return $this->_submitCall("api/notifications/list", compact("notification_type"));
    }

}
