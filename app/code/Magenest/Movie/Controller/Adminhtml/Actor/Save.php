<?php
/**
 * Created by PhpStorm.
 * User: pinkman
 * Date: 01/11/2018
 * Time: 09:12
 */
namespace Magenest\Movie\Controller\Adminhtml\Actor;

class Save extends \Magento\Backend\App\Action{
    protected $_actorFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magenest\Movie\Model\ActorFactory $actorFactory
    ){
        parent::__construct($context);
        $this->_actorFactory = $actorFactory;
    }

    public function execute()
    {
        $actor_id = $this->getRequest()->getParam('actor_id');
        $modelActor = $this->_actorFactory->create();
        if($actor_id){
            $modelActor->load($actor_id);
            $modelActor->delete();
        }

        $formdata = $this->getRequest()->getParam('name');
        $modelActor->setName($formdata);

        $this->_getSession()->setFormData('');

        try{
            $modelActor->save();
            $this->messageManager->addSuccess(__('This Actor has been saved.'));

            if($this->getRequest()->getParam('back')){
                return $this->_redirect('*/*/edit', ['actor_id' => $modelActor->getId()]);
            }

            return $this->_redirect('*/*');

        }catch (\Exception $e){
            $this->messageManager->addError($e->getMessage());
             $this->_getSession()->setFormData($formdata);
             $this->_redirect('*/*/edit' , ['actor_id' => $actor_id]);
        }
    }
}