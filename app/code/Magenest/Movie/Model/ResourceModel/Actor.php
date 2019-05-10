<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 09/05/2019
 * Time: 09:52
 */

namespace Magenest\Movie\Model\ResourceModel;
class Actor extends
    \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('magenest_actor', 'actor_id');
    }
}