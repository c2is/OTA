<?php

namespace C2is\OTA\Model\HotelSearch\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class RateRange
{
    /**
     * @SerializedName("MaxRate")
     * @XmlAttribute
     * @Type("double")
     */
    private $max;

    /**
     * @SerializedName("MinRate")
     * @XmlAttribute
     * @Type("double")
     */
    private $min;

    /**
     * @SerializedName("CurrencyCode")
     * @XmlAttribute
     * @Type("string")
     */
    private $currency;

    public function setMax($max)
    {
        $this->max = $max;
    }

    public function getMax()
    {
        return $this->max;
    }

    public function setMin($min)
    {
        $this->min = $min;
    }

    public function getMin()
    {
        return $this->min;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function getCurrency()
    {
        return $this->currency;
    }
}
