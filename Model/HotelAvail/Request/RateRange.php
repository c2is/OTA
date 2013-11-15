<?php

namespace C2is\OTA\Model\HotelAvail\Request;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class RateRange
{
    /**
     * @SerializedName("MinRate")
     * @XmlAttribute
     * @Type("double")
     */
    private $min;

    /**
     * @SerializedName("MaxRate")
     * @XmlAttribute
     * @Type("double")
     */
    private $max;

    /**
     * @SerializedName("CurrencyCode")
     * @XmlAttribute
     * @Type("string")
     */
    private $currency;

    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setMax($max)
    {
        $this->max = $max;

        return $this;
    }

    public function getMax()
    {
        return $this->max;
    }

    public function setMin($min)
    {
        $this->min = $min;

        return $this;
    }

    public function getMin()
    {
        return $this->min;
    }
}
