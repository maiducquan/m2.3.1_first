<?php


namespace Magenest\Movie\Block;


class ReadOnly extends \Magento\Config\Block\System\Config\Form\Field
{
    protected function _getElementHtml($element) {
        $element->setDisabled('disabled');
        return parent::_getElementHtml($element);
    }
}