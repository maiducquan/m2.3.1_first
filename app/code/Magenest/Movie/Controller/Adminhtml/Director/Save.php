<?php


namespace Magenest\Movie\Controller\Adminhtml\Director;



use Magento\Backend\App\Action;

class Save extends \Magento\Backend\App\Action
{
    protected $_directorFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magenest\Movie\Model\DirectorFactory $directorFactory
    ){
        parent::__construct($context);
        $this->_directorFactory = $directorFactory;
    }

    public function execute()
    {
        $director_id = $this->getRequest()->getParam('director_id');
        $modelDirector = $this->_directorFactory->create();
        if($director_id){
            $modelDirector->load($director_id);
            $modelDirector->delete();
        }

        $formData = $this->getRequest()->getParam('name');
        $modelDirector->setName($formData);
        try{
            $modelDirector->save();
            $this->messageManager->addSuccess(__('This Director has been saved.'));

            if($this->getRequest()->getParam('back')){
                return $this->_redirect('*/*/edit', ['actor_id' => $modelDirector->getId()]);
            }

            return $this->_redirect('*/*');
        }catch (\Exception $e){
            $this->messageManager->addError($e->getMessage());
            $this->_getSession()->setFormData($formData);
            $this->_redirect('*/*/edit' , ['actor_id' => $director_id]);
        }
    }
}