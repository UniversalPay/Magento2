<?php

namespace UniversalPay\Payment\Helper\sdk\lib\Request;

use UniversalPay\Payment\Helper\sdk\lib\Config;
use UniversalPay\Payment\Helper\sdk\lib\Request;

class RequestToken extends Request{
    public function execute($callback = NULL, $result_from_prev = array()){
        foreach ($result_from_prev as $k => $v) {
            $this->_data[$k] = $v;
        }
        $data = $this->validate();
        return $this->_exec_post(Config::$SessionTokenRequestUrl, $data, $callback);
    }
}
