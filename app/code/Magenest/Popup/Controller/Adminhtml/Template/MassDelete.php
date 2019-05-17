<?php
namespace Magenest\Popup\Controller\Adminhtml\Template;

class MassDelete extends \Magenest\Popup\Controller\Adminhtml\Template\Template {

    public function execute()
    {
        try{
            $collection = $this->_filter->getCollection($this->_templateCollectionFactory->create());
            $count = 0;
            $templateIds = [];
            /** @var \Magenest\Popup\Model\Template $item */
            foreach ($collection->getItems() as $item) {
                if($this->getPopupsByTemplateId($item->getTemplateId())){
                    $message = __('%1 is currently being used for a popup. You must remove the template from this configuration before deleting the template',$item->getTemplateName());
                    throw new \Exception($message);
                }
                $templateIds[] = $item->getTemplateId();
                $count++;
            }
            $this->_popupTemplateResource->deleteMultipleRecords($templateIds);
            $this->messageManager->addSuccessMessage(
                __('A total of %1 record(s) have been deleted.', $count)
            );
        }catch (\Exception $e){
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        return $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }
}