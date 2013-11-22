<?php

namespace C2is\OTA\Model\HotelAvail\Request;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class TextDelimiter
{
    /**
     * @SerializedName("On")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $on;

    /**
     * @SerializedName("Value")
     * @Xmlvalue
     * @Type("string")
     * @var string
     */
    private $value;

    /**
     * @param $on
     * @return $this
     */
    public function setOn($on)
    {
        $this->on = $on;

        return $this;
    }

    /**
     * @return string
     */
    public function getOn()
    {
        return $this->on;
    }

    /**
     * @param $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
