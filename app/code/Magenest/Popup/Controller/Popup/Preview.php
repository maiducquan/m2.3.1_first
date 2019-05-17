<?php
namespace Magenest\Popup\Controller\Popup;

class Preview extends \Magenest\Popup\Controller\Popup\Popup {

    public function execute()
    {
        $popupModel = $this->_popupFactory->create();
        try{
            $popup_id = $this->_request->getParam('popup_id');
            if($popup_id){
                $this->_popupResource->load($popupModel,$popup_id);
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
        $this->_coreRegistry->register('popup',$popupModel);
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Preview Popup'));
        return $resultPage;
    }
}