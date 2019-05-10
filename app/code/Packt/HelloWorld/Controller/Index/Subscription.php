<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 06/05/2019
 * Time: 18:53
 */

namespace Packt\HelloWorld\Controller\Index;
class Subscription extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $subscription = $this->_objectManager->create('Packt\HelloWorld\Model\Subscription');
        $subscription->setFirstname('John');
        $subscription->setLastname('Doe');
        $subscription->setEmail('john.doe@example.com');
        $subscription->setMessage('A short message to test');
        $subscription->save();
        $this->getResponse()->setBody('success');
    }
}