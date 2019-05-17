<?php
namespace Magenest\Popup\Controller\Adminhtml\Popup;

class Save extends \Magenest\Popup\Controller\Adminhtml\Popup\Popup {

    public function execute()
    {
        $params = $this->_request->getParams();
        $resultRedirect = $this->resultRedirectFactory->create();
        $redirectBack = $this->getRequest()->getParam('back', false);
        try{

            /** @var \Magenest\Popup\Model\Popup $popupModel */
            $popupModel = $this->_popupFactory->create();
            $data = array();
            $data['popup_name'] = isset($params['general']['popup_name'])?$params['general']['popup_name']:'';
            $data['popup_type'] = isset($params['general']['popup_type'])?$params['general']['popup_type']:'';
            $data['popup_status'] = isset($params['general']['popup_status'])?$params['general']['popup_status']:0;

            $start_date = isset($params['general']['start_date'])?$params['general']['start_date']:'';
            if($start_date != ''){
                $start_date = $this->_dateTime->date('Y-m-d',$start_date);
            }
            $data['start_date'] = $start_date;

            $end_date = isset($params['general']['end_date'])?$params['general']['end_date']:'';
            if($end_date != ''){
                $end_date = $this->_dateTime->date('Y-m-d',$end_date);
            }
            $data['end_date'] = $end_date;

            $data['priority'] = isset($params['general']['priority'])?$params['general']['priority']:'';
            $data['popup_template_id'] = isset($params['setting']['popup_template_id'])?$params['setting']['popup_template_id']:'';
            $data['popup_trigger'] = isset($params['setting']['popup_trigger'])?$params['setting']['popup_trigger']:1;
            $data['number_x'] = isset($params['setting']['number_x'])?$params['setting']['number_x']:0;
            $data['popup_position'] = isset($params['setting']['popup_position'])?$params['setting']['popup_position']:'';
            $data['popup_animation'] = isset($params['setting']['popup_animation'])?$params['setting']['popup_animation']:1;
            $visible_stores = isset($params['setting']['visible_stores'])?$params['setting']['visible_stores']:'';
            $data['enable_cookie_lifetime'] = isset($params['setting']['enable_cookie_lifetime'])?$params['setting']['enable_cookie_lifetime']:0;
            $data['cookie_lifetime'] = isset($params['setting']['cookie_lifetime'])?$params['setting']['cookie_lifetime']:'';
            $data['coupon_code'] = isset($params['setting']['coupon_code'])?$params['setting']['coupon_code']:'';
            $data['thankyou_message'] = isset($params['setting']['thankyou_message'])?$params['setting']['thankyou_message']:'';

            if(is_array($visible_stores)){
                $visible_stores = implode(',', $visible_stores);
            }
            $data['visible_stores'] = $visible_stores;
            $html_content = isset($params['html']['html_content'])?$params['html']['html_content']:'';
            $css_style = isset($params['html']['css_style'])?$params['html']['css_style']:'';
            if($data['popup_name'] == '' || $data['popup_type'] == ''){
                $this->messageManager->addErrorMessage(__('Some fields are required!'));
            }
            if(isset($params['html']['popup_id'])&&$params['html']['popup_id']){
                $this->_popupResource->load($popupModel,$params['html']['popup_id']);
                $template_id = $popupModel->getPopupTemplateId();
                $templateModel = $this->_popupTemplateFactory->create();
                /** @var \Magenest\Popup\Model\Template $templateModel */
                $this->_popupTemplateResource->load($templateModel,$data['popup_template_id']);
                if(
                    ($html_content == '' && $data['popup_template_id'] != '')
                    ||
                    ($data['popup_template_id'] != '' && $template_id != '' && $template_id != $data['popup_template_id'])
                ){
                    $data['html_content'] = $templateModel->getHtmlContent();
                }
                if(
                    ($css_style == '' && $data['popup_template_id'] != '')
                    ||
                    ($data['popup_template_id'] != '' && $template_id != '' && $template_id != $data['popup_template_id'])
                ){
                    $data['css_style'] = $templateModel->getCssStyle();
                }
                if($data['popup_type'] != $popupModel->getPopupType()){
                    $template = $this->getPopupTemplateByPopupType($data['popup_type']);
                    $data['popup_template_id'] = $template->getTemplateId();
                    $data['html_content'] = $template->getHtmlContent();
                    $data['css_style'] = $template->getCssStyle();
                }
            }
            $popupModel->addData($data);
            $this->_popupResource->save($popupModel);
            if($this->validDateFromTo($start_date, $end_date)){
                $popupModel->setPopupStatus(0);
                $this->_popupResource->save($popupModel);
                throw new \Exception($this->validDateFromTo($start_date, $end_date));
            }
            $this->messageManager->addSuccessMessage(__('The Popup has been saved.'));
            /* Invalidate Full Page Cache */
            $this->cache->invalidate('full_page');
        }catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->_logger->critical($e->getMessage());
            $this->messageManager->addErrorMessage($e->getMessage());
        }catch  (\Exception $exception){
            $this->_logger->critical($exception->getMessage());
            $this->messageManager->addErrorMessage($exception->getMessage());
        }
        if ($redirectBack === 'edit') {
            $resultRedirect->setPath(
                '*/*/edit',
                ['id' => $popupModel->getPopupId(), 'back' => null, '_current' => true]
            );
        }else{
            $resultRedirect->setPath('*/*/index');
        }
        return $resultRedirect;
    }
    public function getPopupTemplateByPopupType($popup_type){
        $collection = $this->_templateCollectionFactory->create()
            ->addFieldToFilter('template_type',$popup_type)
            ->getFirstItem();
        return $collection == null ? $this->_popupTemplateFactory->create() : $collection;
    }
}