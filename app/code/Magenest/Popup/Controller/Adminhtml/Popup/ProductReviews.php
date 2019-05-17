<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magenest\Popup\Controller\Adminhtml\Popup;

class ProductReviews extends \Magenest\Popup\Controller\Adminhtml\Popup\Popup
{


    /**
     * Get popup's product list
     *
     * @return \Magento\Framework\View\Result\Layout
     */
    public function execute()
    {
        $popupId = (int)$this->getRequest()->getParam('id');
        $resultLayout = $this->resultLayoutFactory->create();
        $block = $resultLayout->getLayout()->getBlock('admin.customer.review');
        $block->setPopupId($popupId)->setUseAjax(true);
        return $resultLayout;
    }
}
