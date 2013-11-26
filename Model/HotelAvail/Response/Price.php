<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class Price
 * @package C2is\OTA\Model\HotelAvail\Response
 * @AccessType("public_method")
 */
class Price
{
    /**
     * @SerializedName("NumberOfUnits")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $numberOfUnits;

    /**
     * @SerializedName("Base")
     * @Type("C2is\OTA\Model\HotelAvail\Response\Base")
     * @var \C2is\OTA\Model\HotelAvail\Response\Base
     */
    private $base;

    /**
     * @SerializedName("OnSpot")
     * @Type("C2is\OTA\Model\HotelAvail\Response\OnSpot")
     * @var \C2is\OTA\Model\HotelAvail\Response\OnSpot
     */
    private $onSpot;

    /**
     * @param int $numberOfUnits
     */
    public function setNumberOfUnits($numberOfUnits)
    {
        $this->numberOfUnits = $numberOfUnits;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumberOfUnits()
    {
        return $this->numberOfUnits;
    }

    /**
     * @param \C2is\OTA\Model\HotelAvail\Response\Base $base
     */
    public function setBase(Base $base)
    {
        $this->base = $base;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelAvail\Response\Base
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @param \C2is\OTA\Model\HotelAvail\Response\OnSpot $onSpot
     */
    public function setOnSpot($onSpot)
    {
        $this->onSpot = $onSpot;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelAvail\Response\OnSpot
     */
    public function getOnSpot()
    {
        return $this->onSpot;
    }
}
