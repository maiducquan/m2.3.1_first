<?php

namespace Packt\HelloWorld\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CheckCartQtyObserver implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        if ($observer->getProduct()->getQty() %2 != 0) {
            throw new \Exception('Qty must be even');
        }
    }
}