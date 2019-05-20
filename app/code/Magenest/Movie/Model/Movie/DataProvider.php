<?php


namespace Magenest\Movie\Model\Movie;


use Magenest\Movie\Model\ResourceModel\Movie\CollectionFactory;
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
        CollectionFactory $moviecollection,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $moviecollection->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $movie) {
            $this->_loadedData[$movie->getId()] = $movie->getData();
        }
        return $this->_loadedData;
    }
}