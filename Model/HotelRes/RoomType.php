<?php

namespace C2is\OTA\Model\HotelRes;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class RoomType
{
    /**
     * @SerializedName("RoomTypeCode")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $code;

    /**
     * @SerializedName("NumberOfUnits")
     * @XmlAttribute
     * @Type("integer")
     * @var int
     */
    private $numberOfUnits;

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $numberOfUnits
     */
    public function setNumberOfUnits($numberOfUnits)
    {
        $this->numberOfUnits = $numberOfUnits;
    }

    /**
     * @return int
     */
    public function getNumberOfUnits()
    {
        return $this->numberOfUnits;
    }
}
