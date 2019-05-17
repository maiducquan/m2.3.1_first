<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

// @codingStandardsIgnoreFile

/**
 * Adminhtml reviews grid
 *
 * @method int getProductId() getProductId()
 * @method \Magento\Review\Block\Adminhtml\Grid setProductId() setProductId(int $productId)
 * @method int getCustomerId() getCustomerId()
 * @method \Magento\Review\Block\Adminhtml\Grid setCustomerId() setCustomerId(int $customerId)
 * @method \Magento\Review\Block\Adminhtml\Grid setMassactionIdFieldOnlyIndexValue() setMassactionIdFieldOnlyIndexValue(bool $onlyIndex)
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
namespace Magenest\Popup\Block\Adminhtml\Product\Edit\Tab\AddProduct;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * Review action pager
     *
     * @var \Magento\Review\Helper\Action\Pager
     */
    protected $_reviewActionPager = null;

    /**
     * Review data
     *
     * @var \Magento\Review\Helper\Data
     */
    protected $_reviewData = null;

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * Review collection model factory
     *
     * @var \Magento\Review\Model\ResourceModel\Review\Product\CollectionFactory
     */
    protected $_productsFactory;

    /**
     * Review model factory
     *
     * @var \Magento\Review\Model\ReviewFactory
     */
    protected $_reviewFactory;

    protected $_productFactory;

    protected $_productCollection;


    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Magento\Review\Model\ReviewFactory $reviewFactory
     * @param \Magento\Review\Model\ResourceModel\Review\Product\CollectionFactory $productsFactory
     * @param \Magento\Review\Helper\Data $reviewData
     * @param \Magento\Review\Helper\Action\Pager $reviewActionPager
     * @param \Magento\Framework\Registry $coreRegistry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Magento\Review\Model\ReviewFactory $reviewFactory,
        \Magento\Review\Model\ResourceModel\Review\Product\CollectionFactory $productsFactory,
        \Magento\Review\Helper\Data $reviewData,
        \Magento\Review\Helper\Action\Pager $reviewActionPager,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollection,
        array $data = []
    ) {
        $this->_productsFactory = $productsFactory;
        $this->_coreRegistry = $coreRegistry;
        $this->_reviewData = $reviewData;
        $this->_reviewActionPager = $reviewActionPager;
        $this->_reviewFactory = $reviewFactory;
        $this->_productFactory = $productFactory;
        $this->_productCollection = $productCollection;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * Initialize grid
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('popupProductGrid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('asc');
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = $this->_productCollection->create()->addAttributeToSelect(
        'name','inner'
    )->addAttributeToSelect(
        'sku','inner'
    )->addAttributeToSelect(
        'price','inner'
    )->joinField(
        'position',
        'catalog_category_product',
        'position',
        'product_id=entity_id',
        'category_id=' . (int)$this->getRequest()->getParam('id', 0),
        'left'
    );
        $storeId = (int)$this->getRequest()->getParam('store', 0);
        if ($storeId > 0) {
            $collection->addStoreFilter($storeId);
        }
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }
    protected function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    protected function _prepareFilterButtons()
    {
        parent::_prepareFilterButtons();
    }
    /**
     * Prepare grid columns
     *
     * @return \Magento\Backend\Block\Widget\Grid
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareColumns()
    {
        $this
            ->addColumn(
                'in_location',
                array(
                    'type' => 'checkbox',
                    'name' => 'in_map',
                    'index' => 'entity_id',
                    'header_css_class' => 'col-select col-massaction',
                    'column_css_class' => 'col-select col-massaction',
                    'filter' => false,
                )
            )
            ->addColumn(
                'entity_id',
                array(
                    'header' => __('ID'),
                    'index' => 'entity_id',
                )
            )
            ->addColumn(
                'product_name',
                array(
                    'header' => __('Name'),
                    'index' => 'name',
                )
            )
            ->addColumn(
                'product_sku',
                array(
                    'header' => __('Sku'),
                    'index' => 'sku',
                )
            )
            ->addColumn(
                'product_price',
                array(
                    'header' => __('Price'),
                    'index' => 'price',
                )
            );

        // todo: render status bar on grid

        return parent::_prepareColumns();
    }

}
