<?php

namespace C2is\OTA\Model\HotelRes;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class Base
{
    /**
     * @SerializedName("AmountBeforeTax")
     * @XmlAttribute
     * @Type("double")
     * @var double
     */
    private $amountBeforeTax;

    /**
     * @SerializedName("AmountAfterTax")
     * @XmlAttribute
     * @Type("double")
     * @var double
     */
    private $amountAfterTax;

    /**
     * @SerializedName("CurrencyCode")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $currency;

    /**
     * @SerializedName("TPA_Extensions")
     * @Type("C2is\OTA\Model\HotelRes\Extensions")
     * @var Extensions
     */
    private $extensions;

    /**
     * @param double $amountAfterTax
     */
    public function setAmountAfterTax($amountAfterTax)
    {
        $this->amountAfterTax = $amountAfterTax;
    }

    /**
     * @return double
     */
    public function getAmountAfterTax()
    {
        return $this->amountAfterTax;
    }

    /**
     * @param double $amountBeforeTax
     */
    public function setAmountBeforeTax($amountBeforeTax)
    {
        $this->amountBeforeTax = $amountBeforeTax;
    }

    /**
     * @return double
     */
    public function getAmountBeforeTax()
    {
        return $this->amountBeforeTax;
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
     * @param \C2is\OTA\Model\HotelRes\Base $extensions
     */
    public function setExtensions($extensions)
    {
        $this->extensions = $extensions;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\Base
     */
    public function getExtensions()
    {
        return $this->extensions;
    }
}
