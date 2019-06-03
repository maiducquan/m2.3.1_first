<?php

namespace Magenest\Movie\Ui\Component\Form;

use Magento\Framework\Data\OptionSourceInterface;
use Magenest\Movie\Model\ResourceModel\Director\CollectionFactory;


class Movie implements OptionSourceInterface
{
    protected $options;
    protected $_directorCollection;
    protected $currentOptions = [];

    public function __construct(
        CollectionFactory $directorCollection
    ){
        $this->_directorCollection = $directorCollection;
    }

    public function toOptionArray()
    {
        if ($this->options !== null) {
            return $this->options;
        }
        $this->generateCurrentOptions();
        $this->options = array_values($this->currentOptions);
        return $this->options;
    }

    protected function generateCurrentOptions(){
        $directorCollection = $this->_directorCollection->create();
        foreach ($directorCollection->getData() as $key => $data){
            $this->currentOptions[$key]['label'] = $data['name'];
            $this->currentOptions[$key]['value'] = $data['director_id'];
        }
    }
}