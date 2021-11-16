<?php

namespace AHT\AttributeCustomer\Model\ResourceModel\CompanyType;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'aht_attributecustomer_company_type_collection';
    protected $_eventObject = 'company_type_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'AHT\AttributeCustomer\Model\CompanyType',
            'AHT\AttributeCustomer\Model\ResourceModel\CompanyType'
        );
    }
}
