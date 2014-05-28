<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use C2is\OTA\Model\Common\BasicPropertyInfo;
use JMS\Serializer\Annotation as DI;

/**
 * Class RoomStay
 * @package C2is\OTA\Model\HotelAvail\Response
 * @DI\AccessType("public_method")
 */
class RoomStay
{
    /**
     * @DI\SerializedName("RoomTypes")
     * @DI\XmlList(inline=false, entry="RoomType")
     * @DI\Type("array<C2is\OTA\Model\HotelAvail\Response\RoomType>")
     * @var array
     */
    private $roomTypes;

    /**
     * @DI\SerializedName("RoomRates")
     * @DI\XmlList(inline=false, entry="RoomRate")
     * @DI\Type("array<C2is\OTA\Model\HotelAvail\Response\RoomRate>")
     * @var array
     */
    private $roomRates;

    /**
     * @DI\SerializedName("GuestCounts")
     * @DI\XmlList(inline=false, entry="GuestCount")
     * @DI\Type("array<C2is\OTA\Model\HotelAvail\Response\GuestCount>")
     * @var array
     */
    private $guestCounts;

    /**
     * @DI\SerializedName("Timespan")
     * @DI\Type("C2is\OTA\Model\Common\Timespan")
     * @var \C2is\OTA\Model\Common\Timespan
     */
    private $timespan;

    /**
     * @DI\SerializedName("BasicPropertyInfo")
     * @DI\Type("C2is\OTA\Model\Common\BasicPropertyInfo")
     * @var \C2is\OTA\Model\Common\BasicPropertyInfo
     */
    private $basicPropertyInfo;

    /**
     * @DI\SerializedName("TPA_Extensions")
     * @DI\Type("C2is\OTA\Model\HotelAvail\Response\RoomStayExtension")
     * @var \C2is\OTA\Model\HotelAvail\Response\RoomStayExtension
     */
    private $extensions;

    /**
     * @DI\Exclude
     * @var boolean
     */
    private $displayRack = null;

    /**
     * @param array $roomTypes
     * @return $this
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
     * @return $this
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
     * @return $this
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
     * @return $this
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
     * @param \C2is\OTA\Model\HotelAvail\Response\RoomStayExtension $extensions
     * @return $this
     */
    public function setExtensions(RoomStayExtension $extensions)
    {
        $this->extensions = $extensions;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelAvail\Response\RoomStayExtension
     */
    public function getExtensions()
    {
        return $this->extensions;
    }

    /**
     * @return boolean
     */
    public function getDisplayRack()
    {
        if ($this->displayRack === null) {
            $this->displayRack = true;
            /** @var RoomRate $roomRate */
            foreach ($this->getRoomRates() as $roomRate) {
                /** @var Rate $rate */
                foreach ($roomRate->getRates() as $rate) {
                    if ($rate->getExtensions() && $rate->getExtensions()->getSpecialRateInfo() && !$rate->getExtensions()->getSpecialRateInfo()->getDisplayRack()) {
                        $this->displayRack = false;
                        break;
                    }
                }
            }
        }

        return $this->displayRack;
    }

    /**
     * @param boolean $displayRack
     * @return $this
     */
    public function setDisplayRack($displayRack)
    {
        $this->displayRack = $displayRack;

        return $this;
    }
}
