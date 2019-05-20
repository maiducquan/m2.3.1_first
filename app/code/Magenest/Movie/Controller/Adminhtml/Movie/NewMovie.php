<?php


namespace Magenest\Movie\Controller\Adminhtml\Movie;


use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class NewMovie extends \Magento\Backend\App\Action
{
    protected $_resultFactory;
    public function __construct(
        Action\Context $context,
        PageFactory $resultFactory
    ){
        parent::__construct($context);
        $this->_resultFactory = $resultFactory;
    }

    public function execute()
    {
        $resultPage = $this->_resultFactory->create();
        $resultPage->getConfig()->getTitle()->prepend('Add new Movie');
        return $resultPage;
    }
}