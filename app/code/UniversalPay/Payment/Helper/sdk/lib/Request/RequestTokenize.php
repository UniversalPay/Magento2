<?php

namespace UniversalPay\Payment\Helper\sdk\lib\Request;

use UniversalPay\Payment\Helper\sdk\lib\Request;
use UniversalPay\Payment\Helper\sdk\lib\Request\Action\RequestActionTokenize;
use UniversalPay\Payment\Helper\sdk\lib\Request\Token\RequestTokenTokenize;

class RequestTokenize extends Request {

    public function __construct($values = array()) {
        parent::__construct();
        $this->_token_request = new RequestTokenTokenize($values);
        $this->_action_request = new RequestActionTokenize($values);
    }

}
