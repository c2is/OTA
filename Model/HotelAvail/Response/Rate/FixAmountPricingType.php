<?php

namespace C2is\OTA\Model\HotelAvail\Response\Rate;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class FixAmountPricingType
{
    /**
     * @SerializedName("Amount")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $amount;

    /**
     * @SerializedName("Currency")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $currency;

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
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
