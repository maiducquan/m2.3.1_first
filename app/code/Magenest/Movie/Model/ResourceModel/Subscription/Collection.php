<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 08/05/2019
 * Time: 16:55
 */

namespace Magenest\Movie\Model\ResourceModel\Subscription;

/**
 * Subscription Collection
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
        $this->_init('Magenest\Movie\Model\Subscription',
            'Magenest\Movie\Model\ResourceModel\Subscription');
    }
}