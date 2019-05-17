<?php
namespace Magenest\Popup\Controller\Adminhtml\Popup;

class ChangeStatus extends \Magenest\Popup\Controller\Adminhtml\Popup\Popup {

    public function execute()
    {
        try{
            $collection = $this->_filer->getCollection($this->_popupCollectionFactory->create());
            $count = 0;
            /** @var \Magenest\Popup\Model\Popup $item */
            foreach ($collection->getItems() as $item){
                $status = $item->getPopupStatus();
                if($status == 1){
                    $item->setPopupStatus(0);
                }else{
                    $item->setPopupStatus(1);
                }
                $this->_popupResource->save($item);
                $count++;
            }
            /* Invalidate Full Page Cache */
            $this->cache->invalidate('full_page');
            $this->messageManager->addSuccessMessage(
                __('A total of %1 record(s) have been changed.', $count)
            );
        }catch (\Exception $exception){
            $this->messageManager->addErrorMessage($exception->getMessage());
        }
        return $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }
}