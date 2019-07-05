define(
    [
        'jquery',
        'ko',
        'uiComponent'
    ],
    function ($, ko, Component) {
        "use strict";
        var listCustomers = ko.observableArray([]);

        return Component.extend({
            getListCustomers: function () {
                if (!listCustomers().length) {
                    jQuery.ajax({
                        url: 'http://127.0.0.1/Magento/m2.3.1_first/koex2/index/customerList',
                        type: 'POST',
                        complete: function (data) {
                            listCustomers(JSON.parse(data.responseText));
                        },
                    });
                }
                return listCustomers;
            },

            sex: function () {
                return true;
            }
        });
    }
);