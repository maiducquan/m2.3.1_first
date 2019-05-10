<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 06/05/2019
 * Time: 20:10
 */

namespace Packt\HelloWorld\Controller\Index;

class Collection extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $productCollection = $this->_objectManager
            ->create('Magento\Catalog\Model\ResourceModel\Product\Collection')
            ->addAttributeToSelect([
                'name',
                'price',
                'image',
                'thumbnail',
            ])
//            ->addAttributeToFilter('name', 'Overnight Duffle')
            ->addAttributeToFilter('entity_id', array(
                'in' => array(159, 160, 161)
            ))
//            ->addAttributeToFilter('name', array(
//                'like' => '%Sport%'
//            ))
            ->setPageSize(10,1);
        $output = '';

//        $productCollection->setDataToAll('price', 20);
//        $productCollection->save();

        foreach ($productCollection as $product) {
            $output .= var_dump($product->debug(), null, false);
        }
        $this->getResponse()->setBody($output . $productCollection->getSelect()->__toString());

    }
}