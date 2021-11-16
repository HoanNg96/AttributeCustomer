<?php

namespace AHT\AttributeCustomer\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class CompanyTypeSelect extends AbstractSource implements OptionSourceInterface
{
    /**
     * CompanyType instance
     *
     * @var \AHT\AttributeCustomer\Model\CompanyTypeFactory
     */
    protected $_companytypeFactory;

    /**
     * @param \AHT\AttributeCustomer\Model\CompanyTypeFactory $companytypeFactory
     */
    public function __construct(
        \AHT\AttributeCustomer\Model\CompanyTypeFactory $companytypeFactory
    ) {
        $this->_companytypeFactory = $companytypeFactory;
    }

    /**
     * get all value for company type select
     * @return array
     */
    public function getAllOptions()
    {
        if (!$this->_options) {
            /* get all commission type */
            $collection = $this->_companytypeFactory->create()->getCollection();

            foreach ($collection as $item) {
                $this->_options[] = [
                    /* label = company type name */
                    'label' => $item->getTypeName(),
                    /* value = company type id */
                    'value' => $item->getEntityId(),
                ];
            }
        }

        return $this->_options;
    }
}
