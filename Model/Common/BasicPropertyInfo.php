<?php

namespace C2is\OTA\Model\Common;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class BasicPropertyInfo
{
    /**
     * @SerializedName("ChainCode")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $chainCode;

    /**
     * @SerializedName("HotelCode")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $hotelCode;

    /**
     * @param string $chainCode
     */
    public function setChainCode($chainCode)
    {
        $this->chainCode = $chainCode;
    }

    /**
     * @return string
     */
    public function getChainCode()
    {
        return $this->chainCode;
    }

    /**
     * @param string $hotelCode
     */
    public function setHotelCode($hotelCode)
    {
        $this->hotelCode = $hotelCode;
    }

    /**
     * @return string
     */
    public function getHotelCode()
    {
        return $this->hotelCode;
    }
}
