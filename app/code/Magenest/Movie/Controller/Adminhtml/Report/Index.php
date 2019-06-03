<?php


namespace Magenest\Movie\Controller\Adminhtml\Report;

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
    ){
        parent::__construct($context, $productBuilder);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magenest_Movie::report')
            ->addBreadcrumb(__('Report'), __('Report'));
        $resultPage->getConfig()->getTitle()->prepend(__('Request Report'));
        return $resultPage;
    }
}