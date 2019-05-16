<?php
/**
 * Webkul Software.
 *
 * @category  Webkul
 * @package   Webkul_UiForm
 * @author    Webkul
 * @copyright Copyright (c) 2010-2016 Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 */
namespace Magenest\Movie\Model\Actor;

use Magenest\Movie\Model\ResourceModel\Actor\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;

;

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
        CollectionFactory $movieactorcollection,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $movieactorcollection->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $movieactor) {
            $this->_loadedData[$movieactor->getId()] = $movieactor->getData();
        }
        return $this->_loadedData;
    }
}