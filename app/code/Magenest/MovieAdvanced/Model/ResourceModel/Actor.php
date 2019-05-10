<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 09/05/2019
 * Time: 14:09
 */
namespace Magenest\MovieAdvanced\Model\ResourceModel;
class Actor extends
    \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('magenest_actor_advanced', 'actor_id');
    }
}