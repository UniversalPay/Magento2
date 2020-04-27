define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'universalpay',
                component: 'UniversalPay_Payment/js/view/payment/method-renderer/universalpaystandard'
            }
        );
        /** Add view logic here if needed */
        return Component.extend({});
    }
);
