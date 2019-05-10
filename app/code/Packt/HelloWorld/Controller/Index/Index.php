<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 03/05/2019
 * Time: 16:16
 */
namespace Packt\HelloWorld\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * Index action
     *
     * @return $this
     */
    /** @var \Magento\Framework\View\Result\PageFactory */
    protected $resultPageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        ?>
            <p style="color:red">Index</p>
        <?php
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}
