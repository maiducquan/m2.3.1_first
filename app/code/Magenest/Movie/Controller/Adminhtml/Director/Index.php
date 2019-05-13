<?php

namespace Magenest\Movie\Controller\Adminhtml\Director;

use Magento\Catalog\Controller\Adminhtml\Product;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;


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
        $resultPage->setActiveMenu('Magenest_Movie::director')
            ->addBreadcrumb(__('Director'), __('Director'));
        $resultPage->getConfig()->getTitle()->prepend(__('Driector Title'));
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magenest_Movie::director');
    }
}