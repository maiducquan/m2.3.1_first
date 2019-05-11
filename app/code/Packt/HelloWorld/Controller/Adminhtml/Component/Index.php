<?php

namespace Packt\HelloWorld\Controller\Adminhtml\Component;

use Magento\Catalog\Controller\Adminhtml\Product;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Catalog\Controller\Adminhtml\Product implements HttpGetActionInterface
{
    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Product\Builder $productBuilder
    )
    {
        parent::__construct($context, $productBuilder);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        /**
         * @var \Magento\Backend\Model\View\Result\Page $resultPage
         */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Packt_HelloWorld::component')
                    ->addBreadcrumb(__('HelloWorld'), __('HelloWorld'))
                    ->addBreadcrumb(__('Components'), __('Components'));
        $resultPage->getConfig()->getTitle()->prepend(__('Components'));
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Packt_HelloWorld::helloworld');
    }
}