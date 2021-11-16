<?php

namespace AHT\AttributeCustomer\Block;

class AddCustomerAttr extends \Magento\Framework\View\Element\Template
{
    /**
     * Country instance
     *
     * @param \Magento\Directory\Model\CountryFactory
     */
    protected $_countryFactory;

    /**
     * CompanyType instance
     *
     * @param \AHT\AttributeCustomer\Model\CompanyTypeFactory
     */
    protected $_companytypeFactory;

    /**
     * Options array
     *
     * @var array
     */
    protected $_options = null;

    /**
     * Helper data
     *
     * @var \AHT\AttributeCustomer\Helper\Data
     */
    protected $_helperData;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Directory\Model\CountryFactory $countryFactory,
        \AHT\AttributeCustomer\Model\CompanyTypeFactory $companytypeFactory,
        \AHT\AttributeCustomer\Helper\Data $helperData,
        array $data = []
    ) {
        $this->_countryFactory = $countryFactory;
        $this->_companytypeFactory = $companytypeFactory;
        $this->_helperData = $helperData;
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

    /**
     * Get all country code
     *
     * @return array
     */
    public function getCountryCode()
    {
        return $this->_helperData->getCountryCode();
    }
}
