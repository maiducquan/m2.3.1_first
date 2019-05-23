<?php


namespace Magenest\Movie\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class EditMagenestConfig implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $textField = $observer->getTextField();
        if($textField->getValue() == 'Ping'){
            $textField->setValue('Pong');
        }
    }
}