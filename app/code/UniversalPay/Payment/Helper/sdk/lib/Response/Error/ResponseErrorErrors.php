<?php

namespace UniversalPay\Payment\Helper\sdk\lib\Response\Error;

use UniversalPay\Payment\Helper\sdk\lib\Response;

class ResponseErrorErrors extends Response {

<<<<<<< HEAD
    public function __construct($errors = array())
        {
            if (is_array($errors)) {
                foreach ($errors as $error) {
                    if (is_array($error)) {
                        $this->_data['errors'] = array_key_exists('messageCode', $error) ? $error['messageCode'] : print_r($error, true);
                    }else{
                        $this->_data['errors'] = $error;
                    }
                }
            } else {
                $this->_data['errors'] = $errors;
            }
        }
=======
    public function __construct($errors = array()) {
        if (is_array($errors)) {
            foreach ($errors as $error) {
                $this->_data[$error] = $error;
            }
        } else {
            $this->_data[$errors] = $errors;
        }
    }
>>>>>>> a4e3308eab793fa14e98745bdcf7ae517729efae

}
