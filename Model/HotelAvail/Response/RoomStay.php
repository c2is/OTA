<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use C2is\OTA\Model\Common\BasicPropertyInfo;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class RoomStay
 * @package C2is\OTA\Model\HotelAvail\Response
 * @AccessType("public_method")
 */
class RoomStay
{
    /**
     * @SerializedName("RoomTypes")
     * @XmlList(inline=false, entry="RoomType")
     * @Type("array<C2is\OTA\Model\HotelAvail\Response\RoomType>")
     * @var array
     */
    private $roomTypes;

    /**
     * @SerializedName("RoomRates")
     * @XmlList(inline=false, entry="RoomRate")
     * @Type("array<C2is\OTA\Model\HotelAvail\Response\RoomRate>")
     * @var array
     */
    private $roomRates;

    /**
     * @SerializedName("GuestCounts")
     * @XmlList(inline=false, entry="GuestCount")
     * @Type("array<C2is\OTA\Model\HotelAvail\Response\GuestCount>")
     * @var array
     */
    private $guestCounts;

    /**
     * @SerializedName("Timespan")
     * @Type("C2is\OTA\Model\Common\Timespan")
     * @var \C2is\OTA\Model\Common\Timespan
     */
    private $timespan;

    /**
     * @SerializedName("BasicPropertyInfo")
     * @Type("C2is\OTA\Model\Common\BasicPropertyInfo")
     * @var \C2is\OTA\Model\Common\BasicPropertyInfo
     */
    private $basicPropertyInfo;

    /**
     * @SerializedName("TPA_Extensions")
     * @Type("C2is\OTA\Model\HotelAvail\Response\RoomRateExtension")
     * @var \C2is\OTA\Model\HotelAvail\Response\RoomRateExtension
     */
    private $extensions;

    /**
     * @param array $roomTypes
     */
    public function setRoomTypes($roomTypes)
    {
        $this->roomTypes = $roomTypes;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoomTypes()
    {
        return $this->roomTypes;
    }

    /**
     * @param array $roomRates
     */
    public function setRoomRates($roomRates)
    {
        $this->roomRates = $roomRates;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoomRates()
    {
        return $this->roomRates;
    }

    /**
     * @param array $guestCounts
     */
    public function setGuestCounts($guestCounts)
    {
        $this->guestCounts = $guestCounts;

        return $this;
    }

    /**
     * @return array
     */
    public function getGuestCounts()
    {
        return $this->guestCounts;
    }

    /**
     * @param \C2is\OTA\Model\Common\Timespan $timespan
     */
    public function setTimespan($timespan)
    {
        $this->timespan = $timespan;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\Common\Timespan
     */
    public function getTimespan()
    {
        return $this->timespan;
    }

    /**
     * @param BasicPropertyInfo $basicPropertyInfo
     * @return $this
     */
    public function setBasicPropertyInfo(BasicPropertyInfo $basicPropertyInfo)
    {
        $this->basicPropertyInfo = $basicPropertyInfo;

        return $this;
    }

    /**
     * @return BasicPropertyInfo
     */
    public function getBasicPropertyInfo()
    {
        return $this->basicPropertyInfo;
    }

    /**
     * @param \C2is\OTA\Model\HotelAvail\Response\RoomRateExtension $extensions
     */
    public function setExtensions(RoomRateExtension $extensions)
    {
        $this->extensions = $extensions;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelAvail\Response\RoomRateExtension
     */
    public function getExtensions()
    {
        return $this->extensions;
    }
}
