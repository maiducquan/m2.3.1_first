<?php
namespace Magenest\Popup\Block\Adminhtml\Template\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magenest\Popup\Block\Adminhtml\Template\Edit\GenericButton;

class SaveButton extends GenericButton implements ButtonProviderInterface{
    public function getButtonData()
    {
        $data = [
            'label' => __('Save Template'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
        return $data;
    }
}