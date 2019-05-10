<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 05/05/2019
 * Time: 10:30
 */
namespace Packt\HelloWorld\Block;
use Magento\Framework\View\Element\Template;
class Landingspage extends Template
{
    public function getLandingsUrl()
    {
        return $this->getUrl('test_helloworld');
    }

    public function getRedirectUrl()
    {
        return $this->getUrl('test_helloworld/index/redirect');
    }
}
?>
