<?php
namespace Magenest\Movie\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class EditMagenestMovie implements ObserverInterface
{
    public function __construct(

    ){

    }

    public function execute(Observer $observer)
    {
        $observer->getMovie()->setRating(0);
    }
}