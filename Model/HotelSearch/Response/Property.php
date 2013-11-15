<?php

namespace C2is\OTA\Model\HotelSearch\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class Property
{
    /**
     * @SerializedName("ChainCode")
     * @XmlAttribute
     * @Type("integer")
     */
    private $chainCode;

    /**
     * @SerializedName("HotelCode")
     * @XmlAttribute
     * @Type("integer")
     */
    private $hotelCode;

    /**
     * @SerializedName("RateRange")
     * @Type("C2is\OTA\Model\HotelSearch\Response\RateRange")
     */
    private $rateRange;

    /**
     * @SerializedName("TPA_Extensions")
     * @Type("C2is\OTA\Model\HotelSearch\Response\Extensions")
     */
    private $extensions;

    public function setChainCode($chainCode)
    {
        $this->chainCode = $chainCode;
    }

    public function getChainCode()
    {
        return $this->chainCode;
    }

    public function setHotelCode($hotelCode)
    {
        $this->hotelCode = $hotelCode;
    }

    public function getHotelCode()
    {
        return $this->hotelCode;
    }

    public function setRateRange($rateRange)
    {
        $this->rateRange = $rateRange;
    }

    public function getRateRange()
    {
        return $this->rateRange;
    }

    public function setExtensions($extensions)
    {
        $this->extensions = $extensions;
    }

    public function getExtensions()
    {
        return $this->extensions;
    }
}
