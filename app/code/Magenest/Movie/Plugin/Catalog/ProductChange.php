<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 06/05/2019
 * Time: 14:27
 */

namespace Magenest\Movie\Plugin\Catalog;


class ProductChange
{
    public function afterGetProductName()
    {
        return 'Test Configurable-Black';
    }

    public function afterGetImage($item, $result){
        $result->setImageUrl('https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500');
        $result->setWidth(300);
        $result->setHeight(300);
        return $result;
    }
}