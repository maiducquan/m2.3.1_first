<?php

namespace Magenest\Movie\Setup;


use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpdateDataRowTable implements UpgradeDataInterface
{
    protected $resourceConfig;

    public function
    __construct(\Magento\Config\Model\ResourceModel\Config $resourceConfig)
    {
        $this->resourceConfig = $resourceConfig;
    }

    public function updateRow($path ,$row)
    {
        $this->resourceConfig->saveConfig(
            $path,
            $row,
            \Magento\Config\Block\System\Config\Form::SCOPE_DEFAULT,
            0
        );
    }

    /**
     * Upgrades data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        // TODO: Implement upgrade() method.
    }
}