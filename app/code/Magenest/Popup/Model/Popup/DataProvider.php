<?php
namespace Magenest\Popup\Model\Popup;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider {
    /** @var \Magenest\Popup\Model\ResourceModel\Popup\CollectionFactory $_popupCollectionFactory */
    protected $_popupCollectionFactory;
    /** @var \Magenest\Popup\Model\Session $_sessionTemplate */
    protected $_sessionTemplate;
    protected $loadedData;
    public function __construct(
        \Magenest\Popup\Model\Session $sessionTemplate,
        \Magenest\Popup\Model\ResourceModel\Popup\CollectionFactory $collectionFactory,
        $name,
        $primaryFieldName,
        $requestFieldName,
        array $meta = [],
        array $data = []
    ){
        $this->_sessionTemplate = $sessionTemplate;
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $item) {
            $this->loadedData[$item->getPopupId()]['general'] = $item->getData();
            $this->loadedData[$item->getPopupId()]['setting'] = $item->getData();
            $this->loadedData[$item->getPopupId()]['html'] = $item->getData();
            $this->loadedData[$item->getPopupId()]['report'] = $item->getData();
        }
        return $this->loadedData;
    }
}