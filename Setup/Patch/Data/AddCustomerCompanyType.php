<?php
namespace AHT\AttributeCustomer\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddCustomerCompanyType implements DataPatchInterface
{
    /**
     * @param \Magento\Framework\Setup\ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    public function __construct(
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
    )
    {
        $this->moduleDataSetup = $moduleDataSetup;
        
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();

        /* $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]); */

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
            $this->moduleDataSetup->getConnection()->insert($this->moduleDataSetup->getTable('customer_company_type'), $data);
        }

        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
