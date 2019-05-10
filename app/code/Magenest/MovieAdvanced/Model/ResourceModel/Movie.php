<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 09/05/2019
 * Time: 13:32
 */

namespace Magenest\MovieAdvanced\Model\ResourceModel;
class Movie extends
    \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('magenest_movie_advanced', 'movie_id');
    }
}