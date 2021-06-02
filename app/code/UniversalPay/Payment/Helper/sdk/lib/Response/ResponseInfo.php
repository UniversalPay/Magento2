<?php

namespace UniversalPay\Payment\Helper\sdk\lib\Response;

use UniversalPay\Payment\Helper\sdk\lib\Response;

class ResponseInfo extends Response {

    public function __construct($info = array()) {
        $this->_params = array_keys($info);
        $this->_data = $info;
    }

    public function __debugInfo() {
        return $this->_data;
    }

}
