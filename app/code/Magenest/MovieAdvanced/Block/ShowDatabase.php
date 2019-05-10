<?php
/**
 * Created by PhpStorm.
 * User: mdq
 * Date: 09/05/2019
 * Time: 13:29
 */

namespace Magenest\MovieAdvanced\Block;

use Magento\Framework\View\Element\Template;

class ShowDatabase extends Template
{
    private $_movieTable;
    private $_actorTable;
    private $_directorTable;
    private $_movieActorTable;

    public function __construct(
        Template\Context $context,
        \Magenest\MovieAdvanced\Model\ResourceModel\Movie\CollectionFactory $movieTable,
        \Magenest\MovieAdvanced\Model\ResourceModel\Actor\CollectionFactory $actorTable,
        \Magenest\MovieAdvanced\Model\ResourceModel\Director\CollectionFactory $directorTable,
        \Magenest\MovieAdvanced\Model\ResourceModel\MovieActor\CollectionFactory $movieActorTable,
        array $data = []
    ){
        parent::__construct($context, $data);
        $this->_movieTable = $movieTable;
        $this->_actorTable = $actorTable;
        $this->_directorTable = $directorTable;
        $this->_movieActorTable = $movieActorTable;
    }

    public function getMovieData() {
        $collectionMovie = $this->_movieTable->create();
        $collectionActor = $this->_actorTable->create();
        $collectionDirector = $this->_directorTable->create();
        $collectionMovieActor = $this->_movieActorTable->create();

        $collectionMovieActor->getSelect()->joinLeft(
            [
                'movie' => $collectionMovieActor->getTable('magenest_movie_advanced')
            ],
            'main_table.movie_id = movie.movie_id',
            ['movie.director_id']
        );
        return $collectionMovieActor;
    }
}