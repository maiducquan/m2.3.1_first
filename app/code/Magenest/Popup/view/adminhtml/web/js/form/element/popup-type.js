/**
 * Created by magenest on 27/03/2019.
 */
define([
    'underscore',
    'uiRegistry',
    'Magento_Ui/js/form/element/select'
], function (_, uiRegistry, select) {
    'use strict';

    return select.extend({
        initialize: function () {
            var self = this;
            this._super();
            this.showHidenCoupon(self.value());
            return this;
        },
        /**
         * On value change handler.
         *
         * @param {String} value
         */
        onUpdate: function (value) {
            this.showHidenCoupon(value);
            return this._super();
        },
        /**
         * Show/Hiden field Coupon Code
         * @param value
         */
        showHidenCoupon: function (value) {
            var coupon_code = uiRegistry.get('index = coupon_code');
            if (value == 2 || value == 4) {
                coupon_code.show();
            } else {
                coupon_code.hide();
            }
        }
    });
});