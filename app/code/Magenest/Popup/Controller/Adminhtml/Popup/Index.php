<?php
namespace Magenest\Popup\Controller\Adminhtml\Popup;

class Index extends \Magenest\Popup\Controller\Adminhtml\Popup\Popup {

    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->addBreadcrumb(__('Manage Popup'), __('Manage Popup'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Popup'));

        return $resultPage;
    }
    public function _isAllowed(){
        return $this->_authorization->isAllowed('Magenest_Popup::popup');
    }
}