<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 07/05/2019
 * Time: 16:05
 */

namespace Packt\HelloWorld\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ){
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        ?>
            <p> tét </p>
            <p> tét </p>
            <p> tét </p>
            <p> tét </p>
        <?php
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Packt_HelloWorld::index');
    }
}