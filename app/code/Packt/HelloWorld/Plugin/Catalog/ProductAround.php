<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 06/05/2019
 * Time: 14:27
 */

namespace Packt\HelloWorld\Plugin\Catalog;

use Magento\Catalog\Model\Product;

class ProductAround
{
    public function aroundGetName($interceptedInput)
    {
        return "Name of product";
    }
}