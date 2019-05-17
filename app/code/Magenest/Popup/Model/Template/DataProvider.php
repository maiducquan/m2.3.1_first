<?php
namespace Magenest\Popup\Model\Template;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider {

    /** @var \Magenest\Popup\Model\ResourceModel\Template\CollectionFactory $_templateCollectionFactory */
    protected $_templateCollectionFactory;
    /** @var \Magenest\Popup\Model\Session $_sessionTemplate */
    protected $_sessionTemplate;
    protected $loadedData;
    public function __construct(
        \Magenest\Popup\Model\Session $sessionTemplate,
        \Magenest\Popup\Model\ResourceModel\Template\CollectionFactory $collectionFactory,
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
        foreach ($items as $employee) {
            $this->loadedData[$employee->getId()] = $employee->getData();
        }
        return $this->loadedData;
    }
}