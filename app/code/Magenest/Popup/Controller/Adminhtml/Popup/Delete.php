<?php
namespace Magenest\Popup\Controller\Adminhtml\Popup;

class Delete extends \Magenest\Popup\Controller\Adminhtml\Popup\Popup {

    public function execute()
    {
        $params = $this->_request->getParams();
        try{
            /** @var \Magenest\Popup\Model\Popup $popupModel */
            $popupModel = $this->_popupFactory->create();
            if(isset($params['id'])&&$params['id']){
                $this->_popupResource->load($popupModel,$params['id']);
                $this->_popupResource->delete($popupModel);
            }
            /* Invalidate Full Page Cache */
            $this->cache->invalidate('full_page');
            $this->messageManager->addSuccessMessage(__('The Popup has been deleted.'));
        }catch (\Exception $exception){
            $this->messageManager->addErrorMessage($exception->getMessage());
        }
        $this->_redirect('*/*/index');
    }
}