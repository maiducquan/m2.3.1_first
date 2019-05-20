<?php
namespace Magenest\Movie\Model\Director;


use Magenest\Movie\Model\ResourceModel\Director\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{
    /**
     * @var array
     */
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $directorcollection,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $directorcollection->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $director) {
            $this->_loadedData[$director->getId()] = $director->getData();
        }
        return $this->_loadedData;
    }
}