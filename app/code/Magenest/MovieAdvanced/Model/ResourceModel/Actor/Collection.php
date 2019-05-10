<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 09/05/2019
 * Time: 14:07
 */
namespace Magenest\MovieAdvanced\Model\ResourceModel\Actor;

/**
 * Movie Collection
 */
class Collection extends
    \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Magenest\MovieAdvanced\Model\Actor',
            'Magenest\MovieAdvanced\Model\ResourceModel\Actor');
    }
}