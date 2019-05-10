<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 08/05/2019
 * Time: 16:53
 */
namespace Magenest\Movie\Controller\Index;

class Collection extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $productCollection = $this->_objectManager
            ->create('Magenest\Movie\Model\ResourceModel\Subscription\Collection');
        $output = '';

//        $productCollection->setDataToAll('price', 20);
//        $productCollection->save();

//        foreach ($productCollection as $product) {
//            $output .= var_dump($product->debug(), null, false);
//        }
//        $this->getResponse()->setBody($output . $productCollection->getSelect()->__toString());
        return $productCollection;
    }
}