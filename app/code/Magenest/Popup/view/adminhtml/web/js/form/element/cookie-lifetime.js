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
            this.enableDisableCookieLifetime(self.value());
            return this;
        },
        /**
         * On value change handler.
         *
         * @param {String} value
         */
        onUpdate: function (value) {
            this.enableDisableCookieLifetime(value);
            return this._super();
        },
        /**
         * Show/Hiden field Cookie Lifetime
         * @param value
         */
        enableDisableCookieLifetime: function (value) {
            var cookie_lifetime = uiRegistry.get('index = cookie_lifetime');
            if (value == 1) {
                cookie_lifetime.show();
            } else {
                cookie_lifetime.hide();
            }
        }
    });
});