<?php

namespace UniversalPay\Payment\Block;

use UniversalPay\Payment\Helper\Helper;
use Symfony\Component\Config\Definition\Exception\Exception;

class Iframe extends \Magento\Payment\Block\Form
{
    /**
     * @var \Magento\Checkout\Model\Session
     */
    private $_checkoutSession;

    /**
     * @var \Magento\Checkout\Model\Order
     */
    private $_order;

    /**
     * @var Helper
     */
    private $_helper;
    private $_urlInterface;
    /**
     * Process constructor.
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Sales\Model\OrderFactory                $orderFactory
     * @param \Magento\Checkout\Model\Session                  $checkoutSession
     * @param Helper                                           $helper
     * @param array                                            $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Sales\Model\OrderFactory $orderFactory,
        \Magento\Checkout\Model\Session $checkoutSession,
        Helper $helper,
        array $data = []
    ) {
        $this->_orderFactory = $orderFactory;
        $this->_checkoutSession = $checkoutSession;
        $this->_helper = $helper;
        parent::__construct($context, $data);
        $this->_getOrder();
    }

    /**
     * @return string
     */
    public function getFormUrl()
    {
        $result = '';
        try {
            $order = $this->_order;
            if ($order->getPayment()) {
                $result = $this->_order->getPayment()->getMethodInstance()->getFormUrl();
            }
        } catch (Exception $e) {
            $this->_helper->logDebug('Could not get redirect form url: '.$e);
            throw($e);
        }

        return $result;
    }

    public function getMerchantLandingPageUrl(){
        $result = '';
        try {
            $order = $this->_order;
            if ($order->getPayment()) {
                $result = $this->_order->getPayment()->getMethodInstance()->getMerchantLandingPageUrl();
            }
        } catch (Exception $e) {
            $this->_helper->logDebug('Could not get MerchantLandingPageUrl: '.$e);
            throw($e);
        }

        return $result;
    }
    public function getAllowOriginUrl(){
        // to get only the site's domain url name to assign to the parameter allowOriginUrl .
        //otherwise it will encounter a CORS issue when it is deployed inside a subfolder of the web server.
        $url = $this->_urlBuilder->getBaseUrl();
        $parse_result = parse_url($url);
        if(isset($parse_result['port'])){
            $allowOriginUrl = $parse_result['scheme']."://".$parse_result['host'].":".$parse_result['port'];
        }else{
            $allowOriginUrl = $parse_result['scheme']."://".$parse_result['host'];
        }

        return $allowOriginUrl;
    }
    public function getJsUrl(){
        return $this->_helper->getJsUrl();
    }
    /**
     * @return string
     */
    public function getFormMethod() {
        $result = '';
        try {
            $order = $this->_order;
            if ($order->getPayment()) {
                $result = $this->_order->getPayment()->getMethodInstance()->getFormMethod();
            }
        } catch (Exception $e) {
            $this->_helper->logDebug('Could not get redirect form method: '.$e);
            throw($e);
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getFormFields()
    {
        $result = [];
        try {
            if ($this->_order->getPayment()) {
                $result = $this->_order->getPayment()->getMethodInstance()->getFormFields();
            }
        } catch (Exception $e) {
            $this->_helper->logDebug('Could not get redirect form fields: '.$e);
        }

        return $result;
    }

    /**
     * Get order object.
     *
     * @return \Magento\Sales\Model\Order
     */
    private function _getOrder()
    {
        if (!$this->_order) {
            $incrementId = $this->_getCheckout()->getLastRealOrderId();
            $this->_order = $this->_orderFactory->create()->loadByIncrementId($incrementId);
        }

        return $this->_order;
    }

    /**
     * Get frontend checkout session object.
     *
     * @return \Magento\Checkout\Model\Session
     */
    private function _getCheckout()
    {
        return $this->_checkoutSession;
    }
}
