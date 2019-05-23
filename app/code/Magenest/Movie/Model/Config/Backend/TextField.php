<?php

namespace Magenest\Movie\Model\Config\Backend;

class TextField extends \Magento\Framework\App\Config\Value
{
    public function beforeSave()
    {
        $this->_eventManager->dispatch(
            'save_magenest_config',
            ['text_field' => $this]
        );
        return parent::beforeSave();
    }
}