<?php
namespace Magenest\Popup\Controller\Adminhtml\Template;

class Delete extends \Magenest\Popup\Controller\Adminhtml\Template\Template {

    public function execute()
    {
        $params = $this->_request->getParams();
        try{
            /** @var \Magenest\Popup\Model\Template $popupTemplate */
            $popupTemplate = $this->_popupTemplateFactory->create();
            if(isset($params['id'])&&$params['id']){
                $this->_popupTemplateResource->load($popupTemplate,$params['id']);
                if($this->getPopupsByTemplateId($params['id'])){
                    $message =  __('%1 is currently being used for a popup. You must remove the template from this configuration before deleting the template',$popupTemplate->getTemplateName());
                    throw new \Exception($message);
                }
                $this->_popupTemplateResource->delete($popupTemplate);
                $this->messageManager->addSuccessMessage(__('The Popup template has been deleted.'));
            }
        }catch (\Exception $exception){
            $this->messageManager->addErrorMessage($exception->getMessage());
        }
        $this->_redirect('*/*/index');
    }
}