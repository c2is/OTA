<?php

namespace C2is\OTA\Model\HotelRes\Service;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class Base
{
    /**
     * @SerializedName("AmountAfterTax")
     * @XmlAttribute
     * @Type("double")
     * @var double
     */
    private $afterTax;

    /**
     * @SerializedName("AmountBeforeTax")
     * @XmlAttribute
     * @Type("double")
     * @var double
     */
    private $beforeTax;

    /**
     * @SerializedName("CurrencyCode")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $currency = 'EUR';

    /**
     * @SerializedName("Taxes")
     * @Type("C2is\OTA\Model\Common\Taxes\Taxes")
     * @var \C2is\OTA\Model\Common\Taxes\Taxes
     */
    private $taxes;

    /**
     * @param double $afterTax
     */
    public function setAfterTax($afterTax)
    {
        $this->afterTax = $afterTax;

        return $this;
    }

    /**
     * @return double
     */
    public function getAfterTax()
    {
        return $this->afterTax;
    }

    /**
     * @param double $beforeTax
     */
    public function setBeforeTax($beforeTax)
    {
        $this->beforeTax = $beforeTax;

        return $this;
    }

    /**
     * @return double
     */
    public function getBeforeTax()
    {
        return $this->beforeTax;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param \C2is\OTA\Model\Common\Taxes\Taxes $taxes
     */
    public function setTaxes(\C2is\OTA\Model\Common\Taxes\Taxes $taxes)
    {
        $this->taxes = $taxes;

        return $this;
    }

    /**
     * @param \C2is\OTA\Model\Common\Taxes\Tax $tax
     */
    public function addTax(\C2is\OTA\Model\Common\Taxes\Tax $tax)
    {
        $this->taxes->addTax($tax);

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\Common\Taxes\Taxes
     */
    public function getTaxes()
    {
        return $this->taxes;
    }
}
