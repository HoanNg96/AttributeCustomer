<?php

namespace AHT\AttributeCustomer\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if ($context->getVersion() && version_compare($context->getVersion(), '1.0.1') < 0) {

            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

            // add data to customer_company_type table
            $company_type = [
                [
                    'type_name' => 'CBD Manufacturer',
                ],
                [
                    'type_name' => 'CBD Brand and Marketing company',
                ],
                [
                    'type_name' => 'CBD Extractor',
                ],
                [
                    'type_name' => 'Other',
                ]
            ];
            foreach ($company_type as $data) {
                $setup->getConnection()->insert($setup->getTable('customer_company_type'), $data);
            }
        }

        $setup->endSetup();
    }
}
