<?php
/**
 *  Reviews products admin grid
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magenest\Popup\Block\Adminhtml\Product\Edit\Tab;
use Magenest\Popup\Block\Adminhtml\Product\Edit\Tab\AddProduct\Grid;

/**
 * @api
 * @SuppressWarnings(PHPMD.DepthOfInheritance)
 * @since 100.0.2
 */
class Reviews extends Grid
{
    /**
     * Hide grid mass action elements
     *
     * @return $this
     */
    protected function _prepareMassaction()
    {
        return $this;
    }

    protected function _prepareCollection()
    {
        return $this;
    }

    public function getGridUrl()
    {
        return $this->getUrl('magenest_popup/product_reviews/grid', ['_current' => true]);
    }

}
