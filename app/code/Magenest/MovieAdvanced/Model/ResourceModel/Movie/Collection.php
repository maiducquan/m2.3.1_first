<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 09/05/2019
 * Time: 13:30
 */
namespace Magenest\MovieAdvanced\Model\ResourceModel\Movie;

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
        $this->_init('Magenest\MovieAdvanced\Model\Movie',
            'Magenest\MovieAdvanced\Model\ResourceModel\Movie');
    }
}