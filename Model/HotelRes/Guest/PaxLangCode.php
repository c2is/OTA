<?php

namespace C2is\OTA\Model\HotelRes\Guest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class PaxLangCode
{
    /**
     * @SerializedName("Code")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $code;

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}
