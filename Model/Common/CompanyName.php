<?php

namespace C2is\OTA\Model\Common;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlValue;

class CompanyName
{
    /**
     * @SerializedName("Code")
     * @XmlAttribute
     * @Type("integer")
     */
    private $code;

    /**
     * @XmlValue
     * @Type("string")
     */
    private $name;

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }
}
