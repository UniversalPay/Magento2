<?php
namespace UniversalPay\Payment\Model\Source;
class Cctype extends \Magento\Payment\Model\Source\Cctype{
    public function getAllowedTypes()
    {
        return array('VI', 'MC', 'AE', 'DI', 'JCB', 'OT');
    }
}
