<?php

namespace AHT\AttributeCustomer\Block;

class AddCustomerAttr extends \Magento\Framework\View\Element\Template
{
    /**
     * @param \Magento\Directory\Model\CountryFactory
     */
    protected $_countryFactory;

    protected $_companytypeFactory;

    protected $_options = null;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Directory\Model\CountryFactory $countryFactory,
        \AHT\AttributeCustomer\Model\CompanyTypeFactory $companytypeFactory,
        array $data = []
    ) {
        $this->_countryFactory = $countryFactory;
        $this->_companytypeFactory = $companytypeFactory;
        parent::__construct($context, $data);
    }

    /**
     * Get country name by country code
     * @param string $code
     * @return string
     */
    public function getCountryName($code)
    {
        $country = $this->_countryFactory->create()->loadByCode($code);
        return $country->getName();
    }

    /**
     * Get all company type
     * @return array
     */
    public function getCompanyType()
    {
        if (!$this->_options) {
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
