<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class Text
 * @package C2is\OTA\Model\HotelAvail\Response
 * @AccessType("public_method")
 */
class Text
{
    /**
     * @SerializedName("Language")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $lang;

    /**
     * @SerializedName("Value")
     * @XmlValue
     * @Type("string")
     * @var string
     */
    private $value;

    /**
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param string $value
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
