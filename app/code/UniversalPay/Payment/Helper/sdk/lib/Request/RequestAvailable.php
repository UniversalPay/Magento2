<?php

namespace UniversalPay\Payment\Helper\sdk\lib\Request;

use UniversalPay\Payment\Helper\sdk\lib\Request;
use UniversalPay\Payment\Helper\sdk\lib\Request\Action\RequestActionAvailable;
use UniversalPay\Payment\Helper\sdk\lib\Request\Token\RequestTokenAvailable;

class RequestAvailable extends Request {

    public function __construct($values = array()) {
        parent::__construct();
        $this->_token_request = new RequestTokenAvailable($values);
        $this->_action_request = new RequestActionAvailable($values);
    }

}
