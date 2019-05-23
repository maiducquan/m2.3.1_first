<?php


namespace Magenest\Movie\Controller\Adminhtml\Movie;


use Magento\Backend\App\Action;

class Save extends \Magento\Backend\App\Action
{
    protected $_movieFactory;
    protected $_update;

    public function __construct(
        Action\Context $context,
        \Magenest\Movie\Model\MovieFactory $movieFactory,
        \Magenest\Movie\Setup\UpdateDataRowTable $update
    ){
        parent::__construct($context);
        $this->_movieFactory = $movieFactory;
        $this->_update = $update;
    }

    public function execute()
    {
        $movie_id = $this->getRequest()->getParam('movie_id');
        $modelMovie = $this->_movieFactory->create();
        if($movie_id){
            $modelMovie->load($movie_id);
            $modelMovie->delete();
        }

        $name = $this->getRequest()->getParam('name');
        $modelMovie->setName($name);

        $description = $this->getRequest()->getParam('description');
        $modelMovie->setDescription($description);

        $rating = $this->getRequest()->getParam('rating');
        $modelMovie->setRating($rating);

        $directorId = $this->getRequest()->getParam('director_id');
        $modelMovie->setDirectorId($directorId);

//        $formData = $this->getRequest()->getParams();
//        $modelMovie->addData($formData);

        $this->_eventManager->dispatch(
            'save_magenest_movie',
            ['movie' => $modelMovie]
        );

        $modelMovie->save();

        $rows = $modelMovie->getCollection()->count();
        $this->_update->updateRow('movie/moviepage/rows_magenest_movie', $rows);
        $this->messageManager->addSuccess(__('This Director has been saved.'));
        return $this->_redirect('*/*');

//        try{
//            $modelDirector->save();
//            $this->messageManager->addSuccess(__('This Director has been saved.'));
//
//            if($this->getRequest()->getParam('back')){
//                return $this->_redirect('*/*/edit', ['actor_id' => $modelDirector->getId()]);
//            }
//
//            return $this->_redirect('*/*');
//        }catch (\Exception $e){
//            $this->messageManager->addError($e->getMessage());
//            $this->_getSession()->setFormData($formData);
//            $this->_redirect('*/*/edit' , ['actor_id' => $director_id]);
//        }
    }
}