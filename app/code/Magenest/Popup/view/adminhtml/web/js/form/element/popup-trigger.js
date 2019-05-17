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
            this.showHidenX(self.value());
            return this;
        },
        /**
         * On value change handler.
         *
         * @param {String} value
         */
        onUpdate: function (value) {
            this.showHidenX(value);
            return this._super();
        },
        /**
         * Show/Hiden field Number X
         * @param value
         */
        showHidenX: function (value) {
            var number_x = uiRegistry.get('index = number_x');
            if (value == 4) {
                number_x.hide();
            } else {
                number_x.show();
            }
        }
    });
});