<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 06/05/2019
 * Time: 14:27
 */

namespace Magenest\Movie\Plugin\Catalog;

use Magento\Catalog\Model\Product;

class ProductChange
{
    public function beforeGet(\Magento\Catalog\Model\Product $product)
    {
        return '100';
    }
}