<?php
namespace Magenest\Popup\Controller\Adminhtml\Template;

class Index extends \Magenest\Popup\Controller\Adminhtml\Template\Template {

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->addBreadcrumb(__('Manage Popup Template'), __('Manage Popup Template'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Popup Template'));

        return $resultPage;
    }
    public function _isAllowed(){
        return $this->_authorization->isAllowed('Magenest_Popup::template');
    }

}