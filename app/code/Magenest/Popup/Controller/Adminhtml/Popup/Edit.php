<?php
namespace Magenest\Popup\Controller\Adminhtml\Popup;

class Edit extends \Magenest\Popup\Controller\Adminhtml\Popup\Popup {

    public function execute()
    {
        $popupModel = $this->_popupFactory->create();
        try{
            $popup_id = $this->_request->getParam('id');
            if($popup_id){
                $popupModel->load($popup_id);
                if(!$popupModel->getPopupId()){
                    $this->messageManager->addErrorMessage(__('This Popup doesn\'t exist'));
                    $resultRedirect = $this->resultRedirectFactory->create();
                    return $resultRedirect->setPath('*/*/index');
                }
            }
        }catch (\Exception $exception){
            $this->messageManager->addErrorMessage($exception->getMessage());
            $this->_logger->critical($exception->getMessage());
        }
        $this->_sessionPopup->setData('popup',$popupModel);
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend($popupModel->getPopupId() ? __($popupModel->getPopupName()) : __('New Popup'));
        return $resultPage;
    }
}