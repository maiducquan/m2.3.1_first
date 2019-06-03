<?php


namespace Magenest\Movie\Block\Adminhtml\Information;


use Magento\Framework\View\Element\Template;

class Report extends Template
{
    protected $_reportTable;
    protected $_customerFactory;
    protected $_productCollectionFactory;
    protected $_orderCollection;
    protected $_invoiceCollection;
    protected $_creditmemoCollection;

    public function __construct(
        Template\Context $context,
        \Magenest\Movie\Model\ResourceModel\Report\CollectionFactory $reportTable,
        \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollection,
        \Magento\Sales\Model\ResourceModel\Order\Invoice\CollectionFactory $invoiceCollection,
        \Magento\Sales\Model\ResourceModel\Order\Creditmemo\CollectionFactory $creditmemoCollection,
        array $data = []
    ){
        parent::__construct($context, $data);
        $this->_reportTable = $reportTable;
        $this->_customerFactory = $customerFactory;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_orderCollection = $orderCollection;
        $this->_invoiceCollection = $invoiceCollection;
        $this->_creditmemoCollection = $creditmemoCollection;
    }

    public function getCollection(){
        return $this->_reportTable->create();
    }

    public function countCustomer(){
        return count($this->_customerFactory->create()->getData());
    }

    public function countProducts(){
        return count($this->_productCollectionFactory->create()->getData());
    }

    public function countOrders(){
        return count($this->_orderCollection->create()->getData());
    }

    public function countInvoices(){
        return count($this->_invoiceCollection->create()->getData());
    }

    public function countCreditmemo(){
        return count($this->_creditmemoCollection->create()->getData());
    }
}