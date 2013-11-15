<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
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
     * @SerializedName("Currency")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $currency;

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
}
