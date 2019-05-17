<?php
namespace Magenest\Popup\Controller\Adminhtml\Template;

use Magenest\Popup\Model\Session;

abstract class Template extends \Magento\Backend\App\Action {
    /** @var  \Magenest\Popup\Model\PopupFactory $_popupFactory */
    protected $_popupFactory;

    /** @var \Magenest\Popup\Model\ResourceModel\Popup $_popupResource */
    protected $_popupResource;

    /** @var \Magenest\Popup\Model\ResourceModel\Popup\CollectionFactory $_popupCollectionFactory */
    protected $_popupCollectionFactory;

    /** @var  \Magenest\Popup\Model\TemplateFactory $_popupTemplateFactory */
    protected $_popupTemplateFactory;

    /** @var \Magenest\Popup\Model\ResourceModel\Template $_popupTemplateResource  */
    protected $_popupTemplateResource;

    /** @var \Magenest\Popup\Model\ResourceModel\Template\CollectionFactory $_templateCollectionFactory  */
    protected $_templateCollectionFactory;

    /** @var \Magenest\Popup\Helper\Data $_helperData */
    protected $_helperData;

    /** @var  \Psr\Log\LoggerInterface $_logger */
    protected $_logger;

    /** @var \Magenest\Popup\Model\Session $_sessionPopup  */
    protected $_sessionPopup;

    /** @var \Magento\Framework\View\Result\PageFactory $_resultPageFactory */
    protected $_resultPageFactory;

    /** @var \Magento\Ui\Component\MassAction\Filter $_filter */
    protected $_filter;

    public function __construct(
        \Magenest\Popup\Model\ResourceModel\Popup\CollectionFactory $popupCollectionFactory,
        \Magenest\Popup\Model\ResourceModel\Popup $popupResource,
        \Magenest\Popup\Model\PopupFactory $popupFactory,
        \Magenest\Popup\Model\ResourceModel\Template\CollectionFactory $templateCollectionFactory,
        \Magenest\Popup\Model\ResourceModel\Template $templateResource,
        \Magenest\Popup\Model\TemplateFactory $popupTemplateFactory,
        \Magenest\Popup\Helper\Data $helperData,
        \Psr\Log\LoggerInterface $logger,
        \Magenest\Popup\Model\Session $sessionPopup,
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Ui\Component\MassAction\Filter $filter
    ){
        $this->_popupCollectionFactory = $popupCollectionFactory;
        $this->_popupResource = $popupResource;
        $this->_popupFactory = $popupFactory;
        $this->_templateCollectionFactory = $templateCollectionFactory;
        $this->_popupTemplateFactory = $popupTemplateFactory;
        $this->_popupTemplateResource = $templateResource;
        $this->_helperData = $helperData;
        $this->_logger = $logger;
        $this->_sessionPopup = $sessionPopup;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_filter = $filter;
        parent::__construct($context);
    }
    public function getPopupsByTemplateId($templateId){
        $flag = false;
        try{
            /** @var \Magenest\Popup\Model\Popup $collection */
            $collection = $this->_popupCollectionFactory->create()
                ->addFieldToFilter('popup_template_id',$templateId)
                ->getFirstItem();
            if($collection->getPopupId()){
                $flag = true;
            }
        }catch (\Exception $e){
            $this->_logger->critical($e->getMessage());
        }
        return $flag;
    }
}