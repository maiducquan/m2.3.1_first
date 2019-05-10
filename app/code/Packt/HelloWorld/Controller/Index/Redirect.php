<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 03/05/2019
 * Time: 16:34
 */
namespace Packt\HelloWorld\Controller\Index;
class Redirect extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        // change both frontend and url
        // $this->_redirect('about-us');
        // still change the frontend, the url does not change
        $this->_forward('index');
    }
}