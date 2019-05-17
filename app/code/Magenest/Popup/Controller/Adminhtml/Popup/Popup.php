<?php
namespace Magenest\Popup\Controller\Adminhtml\Popup;

use Magenest\Popup\Model\ResourceModel\Popup\Collection;
use Magenest\Popup\Model\ResourceModel\Template;

abstract class Popup extends \Magento\Backend\App\Action{
    /** @var  \Magenest\Popup\Model\PopupFactory */
    protected $_popupFactory;

    /** @var  \Magenest\Popup\Model\TemplateFactory $_popupTemplateFactory */
    protected $_popupTemplateFactory;

    /** @var  \Psr\Log\LoggerInterface $_logger */
    protected $_logger;

    /** @var  \Magento\Framework\Registry $_coreRegistry */
    protected $_coreRegistry;

    protected $_dateTime;

    /** @var \Magento\Framework\App\Cache\TypeListInterface $cache */
    protected $cache;

    /** @var \Magenest\Popup\Model\ResourceModel\Popup $_popupResource */
    protected $_popupResource;

    /** @var \Magenest\Popup\Model\ResourceModel\Popup\CollectionFactory $_popupCollectionFactory */
    protected $_popupCollectionFactory;

    /** @var \Magenest\Popup\Model\ResourceModel\Template\CollectionFactory $_templateCollectionFactory  */
    protected $_templateCollectionFactory;

    /** @var \Magenest\Popup\Model\ResourceModel\Template $_popupTemplateResource  */
    protected $_popupTemplateResource;

    /** @var  \Magento\Ui\Component\MassAction\Filter $_filer */
    protected $_filer;

    /** @var  \Magento\Framework\View\Result\PageFactory $resultPageFactory */
    protected $resultPageFactory;

    /** @var \Magenest\Popup\Model\Session $_sessionPopup  */
    protected $_sessionPopup;

    /**
     * @var \Magento\Framework\View\Result\LayoutFactory
     */
    protected $resultLayoutFactory;

    public function __construct(
        \Magenest\Popup\Model\ResourceModel\Popup\CollectionFactory $popupCollectionFactory,
        \Magenest\Popup\Model\ResourceModel\Popup $popupResource,
        \Magenest\Popup\Model\PopupFactory $popupFactory,
        \Magenest\Popup\Model\ResourceModel\Template\CollectionFactory $templateCollectionFactory,
        \Magenest\Popup\Model\ResourceModel\Template $templateResource,
        \Magenest\Popup\Model\TemplateFactory $popupTemplateFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magenest\Popup\Model\Session $sessionPopup,
        \Magento\Framework\Stdlib\DateTime\DateTime $dateTime,
        \Magento\Framework\App\Cache\TypeListInterface $cache,
        \Magento\Backend\App\Action\Context $context,
        \Magento\Ui\Component\MassAction\Filter $filter,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory
    ){
        $this->_popupCollectionFactory = $popupCollectionFactory;
        $this->_popupResource = $popupResource;
        $this->_popupFactory = $popupFactory;
        $this->_templateCollectionFactory = $templateCollectionFactory;
        $this->_popupTemplateFactory = $popupTemplateFactory;
        $this->_popupTemplateResource = $templateResource;
        $this->_logger = $logger;
        $this->_sessionPopup = $sessionPopup;
        $this->_dateTime = $dateTime;
        $this->cache = $cache;
        $this->_filer = $filter;
        $this->resultPageFactory = $resultPageFactory;
        $this->resultLayoutFactory = $resultLayoutFactory;
        parent::__construct($context);
    }
    public function validDateFromTo($from, $to){
        if($from == '' || $to == ''){
            return false;
        }else{
            $timestampFrom = $this->_dateTime->timestamp($from);
            $timestampTo = $this->_dateTime->timestamp($to);
            if($timestampFrom > $timestampTo){
                return __('Start Date must not be later than End Date');
            }else{
                return false;
            }
        }
    }
}