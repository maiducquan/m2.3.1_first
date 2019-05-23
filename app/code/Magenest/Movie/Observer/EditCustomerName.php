<?php

namespace Magenest\Movie\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class EditCustomerName implements ObserverInterface
{
    protected $_customerRepositoryInterface;
    public function __construct(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
    ){
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function execute(Observer $observer)
    {
        $customerId = $observer->getCustomer()->getID();
        $customer = $this->_customerRepositoryInterface->getById($customerId);
        $customer->setFirstname("Magenest");
        $this->_customerRepositoryInterface->save($customer);
    }
}