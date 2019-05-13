<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 09/05/2019
 * Time: 09:54
 */
namespace Magenest\Movie\Model\ResourceModel\Director;

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
        $this->_init('Magenest\Movie\Model\Director',
            'Magenest\Movie\Model\ResourceModel\Director');
    }
}