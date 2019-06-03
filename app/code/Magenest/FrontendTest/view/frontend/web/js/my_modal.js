requirejs([
    'jquery',
    'Magento_Ui/js/modal/modal'
],function ($, modal) {
    'use strict';
    jQuery(document).ready(function () {
        var options = {
            type: 'popup',
            modalClass: 'popup-authentication',
            focus: '[name=username]',
            responsive: true,
            innerScroll: true,
            trigger: '.proceed-to-checkout, .trigger-auth-popup',
            title: 'Login Modal',
            buttons: [{
                text: $.mage.__('Ok'),
                class: 'button_modal',
                click: function () {
                    this.closeModal();
                }
            }]
        };

        var popup = modal(options, $('#popup-modal'));

        $('#button2').click(function () {
            $('#popup-modal').modal('openModal');
        });
    });
});