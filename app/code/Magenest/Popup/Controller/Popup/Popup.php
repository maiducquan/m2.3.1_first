<?php
namespace Magenest\Popup\Controller\Popup;

use Psr\Log\LoggerInterface;

abstract class Popup extends \Magento\Framework\App\Action\Action {

    /** @var  \Magenest\Popup\Model\PopupFactory $_popupFactory */
    protected $_popupFactory;

    /** @var \Magenest\Popup\Model\ResourceModel\Popup $_popupResource */
    protected $_popupResource;

    /** @var  \Magenest\Popup\Helper\Cookie $_cookieHelper */
    protected $_cookieHelper;

    /** @var \Magento\Framework\Stdlib\DateTime\DateTime $_dateTime */
    protected $_dateTime;

    /** @var \Magenest\Popup\Helper\Data $_dataHelper  */
    protected $_dataHelper;

    /** @var  \Magento\Framework\View\Result\PageFactory $resultPageFactory */
    protected $resultPageFactory;

    /** @var \Psr\Log\LoggerInterface $_logger */
    protected $_logger;

    /** @var  \Magento\Framework\Registry $_coreRegistry */
    protected $_coreRegistry;

    public function __construct(
        \Magenest\Popup\Model\PopupFactory $popupFactory,
        \Magenest\Popup\Model\ResourceModel\Popup $popupResource,
        \Magenest\Popup\Helper\Cookie $cookieHelper,
        \Magenest\Popup\Helper\Data $dataHelper,
        \Magento\Framework\Stdlib\DateTime\DateTime $dateTime,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\App\Action\Context $context
    ){
        $this->_popupFactory = $popupFactory;
        $this->_popupResource = $popupResource;
        $this->_cookieHelper = $cookieHelper;
        $this->_dataHelper = $dataHelper;
        $this->resultPageFactory = $resultPageFactory;
        $this->_dateTime = $dateTime;
        $this->_logger = $logger;
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }
}