<?php

namespace C2is\OTA\Model\Common;

use C2is\OTA\Model\Common\Taxes\Tax;
use C2is\OTA\Model\Common\Taxes\Taxes;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class Total
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
    private $currency;

    /**
     * @SerializedName("Taxes")
     * @Type("C2is\OTA\Model\Common\Taxes\Taxes")
     * @var Taxes
     */
    private $taxes;

    public function __construct()
    {
        $this->taxes = new Taxes();
    }

    /**
     * @param double $afterTax
     */
    public function setAfterTax($afterTax)
    {
        $this->afterTax = $afterTax;
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
    public function setTaxes(Taxes $taxes)
    {
        $this->taxes = $taxes;
    }

    /**
     * @param \C2is\OTA\Model\Common\Taxes\Tax $tax
     */
    public function addTax(Tax $tax)
    {
        $this->taxes->addTax($tax);
    }

    /**
     * @return \C2is\OTA\Model\Common\Taxes\Taxes
     */
    public function getTaxes()
    {
        return $this->taxes;
    }
}
