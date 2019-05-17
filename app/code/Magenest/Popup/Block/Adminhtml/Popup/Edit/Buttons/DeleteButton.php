<?php
namespace Magenest\Popup\Block\Adminhtml\Popup\Edit\Buttons;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton  extends GenericButton implements ButtonProviderInterface {
    public function getButtonData()
    {
        $data = [
            'label' => __('Delete Popup'),
            'class' => 'delete',
            'on_click' => 'deleteConfirm(\''
                . __('Are you sure you want to delete this popup ?')
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
        return $this->getUrl('*/*/delete', ['id' => $this->getPopupId()]);
    }
}