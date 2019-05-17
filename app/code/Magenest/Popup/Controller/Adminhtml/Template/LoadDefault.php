<?php
namespace Magenest\Popup\Controller\Adminhtml\Template;

use Magenest\Popup\Model\TemplateFactory;
use Psr\Log\LoggerInterface;

class LoadDefault extends \Magenest\Popup\Controller\Adminhtml\Template\Template {

    public function execute()
    {
        try{
            $popup_type = [
                [
                    'path' => 'yesno_button/popup_1',
                    'type' => '1',
                    'class' => 'popup-default-3'
                ],
                [
                    'path' => 'contact_form/popup_1',
                    'type' => '2',
                    'class' => 'popup-default-1'
                ],
                [
                    'path' => 'contact_form/popup_2',
                    'type' => '2',
                    'class' => 'popup-default-4'
                ],
                [
                    'path' => 'share_social/popup_1',
                    'type' => '3',
                    'class' => 'popup-default-5'
                ],
                [
                    'path' => 'subcribe_form/popup_2',
                    'type' => '4',
                    'class' => 'popup-default-6'
                ],
                [
                    'path' => 'subcribe_form/popup_1',
                    'type' => '4',
                    'class' => 'popup-default-2'
                ],
                [
                    'path' => 'static_form/popup_1',
                    'type' => '5',
                    'class' => 'popup-default-7'
                ],
                [
                    'path' => 'static_form/popup_2',
                    'type' => '5',
                    'class' => 'popup-default-8'
                ],
                [
                    'path' => 'subcribe_form/popup_3',
                    'type' => '4',
                    'class' => 'popup-default-9'
                ],
                [
                    'path' => 'subcribe_form/popup_4',
                    'type' => '4',
                    'class' => 'popup-default-10'
                ],
                [
                    'path' => 'yesno_button/popup_3',
                    'type' => '1',
                    'class' => 'popup-default-11'
                ],
                [
                    'path' => 'static_form/popup_3',
                    'type' => '5',
                    'class' => 'popup-default-12'
                ],
                [
                    'path' => 'static_form/popup_4',
                    'type' => '5',
                    'class' => 'popup-default-13'
                ],
                [
                    'path' => 'subcribe_form/popup_5',
                    'type' => '4',
                    'class' => 'popup-default-14'
                ],
                [
                    'path' => 'contact_form/popup_3',
                    'type' => '2',
                    'class' => 'popup-default-15'
                ],
                [
                    'path' => 'subcribe_form/popup_6',
                    'type' => '4',
                    'class' => 'popup-default-16'
                ],
                [
                    'path' => 'share_social/popup_2',
                    'type' => '3',
                    'class' => 'popup-default-17'
                ],
                [
                    'path' => 'subcribe_form/popup_7',
                    'type' => '4',
                    'class' => 'popup-default-18'
                ],
                [
                    'path' => 'subcribe_form/popup_8',
                    'type' => '4',
                    'class' => 'popup-default-19'
                ],
                [
                    'path' => 'subcribe_form/popup_9',
                    'type' => '4',
                    'class' => 'popup-default-20'
                ],
                [
                    'path' => 'static_form/popup_8',
                    'type' => '5',
                    'class' => 'popup-default-21'
                ],
                [
                    'path' => 'static_form/popup_7',
                    'type' => '5',
                    'class' => 'popup-default-22'
                ],
                [
                    'path' => 'subcribe_form/popup_10',
                    'type' => '4',
                    'class' => 'popup-default-23'
                ],
                [
                    'path' => 'static_form/popup_6',
                    'type' => '5',
                    'class' => 'popup-default-24'
                ],
                [
                    'path' => 'static_form/popup_9',
                    'type' => '5',
                    'class' => 'popup-default-25'
                ]

            ];
            $count = 0;
            $data = [];
            foreach ($popup_type as $type){
                $data[] = [
                    'template_name' => "Default Template ".$count,
                    'template_type' => $type['type'],
                    'html_content' => $this->_helperData->getTemplateDefault($type['path']),
                    'css_style' => '',
                    'class' => $type['class']
                ];
                $count++;
            }
            if(!empty($data)){
                $this->_popupTemplateResource->insertMultipleRecords($data);
            }
            $this->messageManager->addSuccessMessage(
                __('A total of %1 record(s) have been inserted.', $count)
            );
        }catch (\Exception $exception){
            $this->_logger->critical($exception->getMessage());
            $this->messageManager->addErrorMessage($exception->getMessage());
        }
        return $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }
}