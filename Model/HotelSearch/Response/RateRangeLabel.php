<?php

namespace C2is\OTA\Model\HotelSearch\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class RateRangeLabel
{
    /**
     * @SerializedName("Langcode")
     * @XmlAttribute
     * @Type("string")
     */
    private $lang;

    /**
     * @SerializedName("MinLabel")
     * @Type("string")
     */
    private $min;

    /**
     * @SerializedName("MaxLabel")
     * @Type("string")
     */
    private $max;

    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    public function getLang()
    {
        return $this->lang;
    }

    public function setMin($min)
    {
        $this->min = $min;
    }

    public function getMin()
    {
        return $this->min;
    }

    public function setMax($max)
    {
        $this->max = $max;
    }

    public function getMax()
    {
        return $this->max;
    }
}
