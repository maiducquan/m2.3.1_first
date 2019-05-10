<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 09/05/2019
 * Time: 14:08
 */
namespace Magenest\MovieAdvanced\Model\ResourceModel\MovieActor;

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
        $this->_init('Magenest\MovieAdvanced\Model\MovieActor',
            'Magenest\MovieAdvanced\Model\ResourceModel\MovieActor');
    }
}