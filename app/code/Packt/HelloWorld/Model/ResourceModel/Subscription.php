<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 06/05/2019
 * Time: 18:15
 */

namespace Packt\HelloWorld\Model\ResourceModel;
class Subscription extends
    \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('packt_helloworld_subscription', 'subscription_id');
    }
}

?>