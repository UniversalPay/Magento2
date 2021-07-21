<?php

namespace UniversalPay\Payment\Helper\sdk\lib\Request\Action;


use UniversalPay\Payment\Helper\sdk\lib\Payments;

class RequestActionCapture extends RequestActionRefund {

    public function __construct() {
        parent::__construct();
        $this->_data["action"] = Payments::ACTION_CAPTURE;
    }

}
