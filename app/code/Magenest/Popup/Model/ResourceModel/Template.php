<?php
namespace Magenest\Popup\Model\ResourceModel;

class Template extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb{
    public function _construct()
    {
        $this->_init('magenest_popup_templates','template_id');
    }
    public function insertMultipleRecords($data){
        try{
            $this->getConnection()->insertMultiple(
                $this->getMainTable(),
                $data
            );
        }catch (\Exception $exception){
            throw $exception;
        }
    }
    public function deleteMultipleRecords($data){
        try{
            $size = count($data);
            if(!is_array($data)&&$size == 0) return;
            $collectionIds = implode(', ', $data);
            $this->getConnection()->delete(
                $this->getMainTable(),
                "{$this->getIdFieldName()} in ({$collectionIds})"
            );
        }catch (\Exception $exception){
            throw $exception;
        }
    }
}