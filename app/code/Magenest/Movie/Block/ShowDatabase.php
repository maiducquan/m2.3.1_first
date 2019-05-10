<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 08/05/2019
 * Time: 16:40
 */

namespace Magenest\Movie\Block;

use Magento\Framework\View\Element\Template;

class ShowDatabase extends Template
{
    private $_movieTable;
    private $_actorTable;

    public function __construct(
        Template\Context $context,
        \Magenest\Movie\Model\ResourceModel\Subscription\CollectionFactory $movieTable,
        \Magenest\Movie\Model\ResourceModel\Actor\CollectionFactory $actorTable,
        array $data = []
    ){
        parent::__construct($context, $data);
        $this->_movieTable = $movieTable;
        $this->_actorTable = $actorTable;
    }

    public function getMovieData() {
        $collection = $this->_movieTable->create();
        $collection->addFieldToSelect('*');
        return $collection;
    }

    public function getActorData() {
        $collection = $this->_actorTable->create();
        $collection->addFieldToSelect('*');
        return $collection;
    }
}