<?php
namespace Magenest\Popup\Controller\Adminhtml\Template;

class Edit extends \Magenest\Popup\Controller\Adminhtml\Template\Template {
    public function execute()
    {
        $popupTemplate = $this->_popupTemplateFactory->create();
        try{
            $template_id = $this->_request->getParam('id');
            if($template_id){
                $this->_popupTemplateResource->load($popupTemplate,$template_id);
                if(!$popupTemplate->getTemplateId()){
                    $this->messageManager->addErrorMessage(__('This Popup Template doesn\'t exist'));
                    $resultRedirect = $this->resultRedirectFactory->create();
                    return $resultRedirect->setPath('*/*/index');
                }
            }
        }catch (\Exception $exception){
            $this->messageManager->addErrorMessage($exception->getMessage());
            $this->_logger->critical($exception->getMessage());
        }
        $this->_sessionPopup->setData('popup_template',$popupTemplate);
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend($popupTemplate->getTemplateId() ? __('Edit Popup Template') : __('New Popup Template'));
        return $resultPage;
    }
}