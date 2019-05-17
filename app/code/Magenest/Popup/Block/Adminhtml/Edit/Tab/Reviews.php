<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magenest\Popup\Block\Adminhtml\Edit\Tab;
use Magenest\Popup\Block\Adminhtml\Product\Edit\Tab\AddProduct\Grid;

/**
 * @api
 * @since 100.0.2
 */
class Reviews extends Grid
{
    /**
     * Hide grid mass action elements
     *
     * @return \Magenest\Popup\Block\Adminhtml\Edit\Tab\Reviews
     */
    protected function _prepareMassaction()
    {
        return $this;
    }

    /**
     * Determine ajax url for grid refresh
     *
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('magenest_popup/popup/productReviews', ['_current' => true]);
    }
}
