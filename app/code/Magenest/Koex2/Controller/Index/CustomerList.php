<?php


namespace Magenest\Koex2\Controller\Index;


use Magento\Framework\App\Action\Context;

class CustomerList extends \Magento\Framework\App\Action\Action
{
    protected $_customerFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerFactory
    ){
        parent::__construct($context);
        $this->_customerFactory = $customerFactory;
    }

    public function execute()
    {
        $customers = $this->_customerFactory->create();
        $data = [];
        foreach ($customers as $customer){
            array_push($data, $customer->getData());
        }
        echo json_encode( $data);
    }
}