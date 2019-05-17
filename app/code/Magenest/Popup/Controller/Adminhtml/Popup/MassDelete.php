<?php
namespace Magenest\Popup\Controller\Adminhtml\Popup;

class MassDelete extends \Magenest\Popup\Controller\Adminhtml\Popup\Popup {

    public function execute()
    {
        try{
            $collection = $this->_filer->getCollection($this->_popupCollectionFactory->create());
            $count = 0;
            foreach ($collection->getItems() as $item){
                $item->delete();
                $count++;
            }
            /* Invalidate Full Page Cache */
            $this->cache->invalidate('full_page');
            $this->messageManager->addSuccessMessage(
                __('A total of %1 record(s) have been deleted.', $count)
            );
        }catch (\Exception $exception){
            $this->messageManager->addErrorMessage($exception->getMessage());
        }
        return $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }
}