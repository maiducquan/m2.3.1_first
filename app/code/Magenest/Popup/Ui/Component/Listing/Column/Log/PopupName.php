<?php
namespace Magenest\Popup\Ui\Component\Listing\Column\Log;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;

class PopupName extends \Magento\Ui\Component\Listing\Columns\Column {
    protected $options;
    protected $_popupFactory;
    protected $_popupResource;
    public function __construct(
        \Magenest\Popup\Model\PopupFactory $popupFactory,
        \Magenest\Popup\Model\ResourceModel\Popup $popupResource,
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    ){
        $this->_popupFactory = $popupFactory;
        $this->_popupResource = $popupResource;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $popup_id = $item['popup_id'];
                $popupModel = $this->_popupFactory->create();
                $this->_popupResource->load($popupModel,$popup_id);
                if($popupModel->getPopupId()){
                    $item['popup_id'] = $popupModel->getPopupName();
                }
            }
        }
        return $dataSource;
    }
}