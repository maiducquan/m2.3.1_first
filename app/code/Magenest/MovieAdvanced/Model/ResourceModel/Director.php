<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 09/05/2019
 * Time: 14:09
 */
namespace Magenest\MovieAdvanced\Model\ResourceModel;
class Director extends
    \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('magenest_director_advanced', 'director_id');
    }
}