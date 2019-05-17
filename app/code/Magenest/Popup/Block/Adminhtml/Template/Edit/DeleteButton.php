<?php
namespace Magenest\Popup\Block\Adminhtml\Template\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton extends GenericButton implements ButtonProviderInterface {
    public function getButtonData()
    {
        $data = [
            'label' => __('Delete Template'),
            'class' => 'delete',
            'on_click' => 'deleteConfirm(\''
                . __('Are you sure you want to delete this template ?')
                . '\', \'' . $this->getDeleteUrl() . '\')',
            'sort_order' => 20,
        ];
        return $data;
    }
    /**
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['id' => $this->getTemplateId()]);
    }
}