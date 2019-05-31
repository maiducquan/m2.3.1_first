define([
    'ko',
    'uiComponent',
    'mage/url',
    'mage/storage',
], function (ko, Component, urlBuilder,storage) {
    'use strict';
    var id=1;

    return Component.extend({

        defaults: {
            template: 'Magenest_KnockoutJs/test',
        },

        productList: ko.observableArray([]),

        getProduct: function () {
            var self = this;
            var serviceUrl = urlBuilder.build('knockout/test/product?id='+id);
            id ++;
            return storage.post(
                serviceUrl,
                ''
            ).done(
                function (response) {
                    self.productList.push(JSON.parse(response));
                }
            ).fail(
                function (response) {
                    alert(response);
                }
            );
        },

        removeLastProduct: function () {
            var self = this;
            if(id > 0 ){
                id --;
                self.productList.pop();
            }else{
                alert('Empty Product!');
            }
        },

        removeProduct: function (id) {
            let self = this;
            self.productList.remove(id);
        },

        sort: function () {
            this.productList.sort(function (a,b) {
                let x = a.name.toLowerCase();
                let y = b.name.toLowerCase();
                return x < y ? -1 : 0;
            });
        }
    });
});