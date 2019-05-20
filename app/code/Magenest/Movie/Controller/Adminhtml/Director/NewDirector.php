<?php


namespace Magenest\Movie\Controller\Adminhtml\Director;


use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class NewDirector extends Action
{
    protected $_resultPageFactory;

    public function __construct(
        Action\Context $context,
        PageFactory $resultFactory
    ){
        parent::__construct($context);
        $this->_resultPageFactory = $resultFactory;
    }

    public function execute()
    {
        $resultPage =  $this->_resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend('Add New Director');
        return $resultPage;
    }
}