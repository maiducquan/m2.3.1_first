<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 09/05/2019
 * Time: 09:52
 */

namespace Magenest\Movie\Model\ResourceModel;
class Director extends
    \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('magenest_director', 'director_id');
    }
}