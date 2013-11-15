<?php

namespace C2is\OTA\Model\HotelRes;

use C2is\OTA\Model\Common\BasicPropertyInfo;
use C2is\OTA\Model\Common\Timespan;
use C2is\OTA\Model\Common\Total;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

class RoomStay
{
    /**
     * @SerializedName("RoomTypes")
     * @XmlList(inline=false, entry="RoomType")
     * @Type("array<C2is\OTA\Model\HotelRes\RoomType>")
     * @var array
     */
    private $roomTypes;

    /**
     * @SerializedName("RoomRates")
     * @XmlList(inline=false, entry="RoomRate")
     * @Type("array<C2is\OTA\Model\HotelRes\RoomRate>")
     * @var array
     */
    private $roomRates;

    /**
     * @SerializedName("GuestCounts")
     * @Type("C2is\OTA\Model\HotelRes\GuestCounts")
     * @var GuestCounts
     */
    private $guestCounts;

    /**
     * @SerializedName("TimeSpan")
     * @Type("C2is\OTA\Model\Common\Timespan")
     * @var Timespan
     */
    private $timespan;

    /**
     * @SerializedName("Total")
     * @Type("C2is\OTA\Model\Common\Total")
     * @var Total
     */
    private $total;

    /**
     * @SerializedName("BasicPropertyInfo")
     * @Type("C2is\OTA\Model\Common\BasicPropertyInfo")
     * @var BasicPropertyInfo
     */
    private $basicPropertyInfo;

    /**
     * @SerializedName("ServiceRPHs")
     * @XmlList(inline=false, entry="ServiceRPH")
     * @Type("array<C2is\OTA\Model\HotelRes\ServiceRph>")
     * @var array
     */
    private $serviceRphs = array();

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->guestCounts = new GuestCounts();
        $this->basicPropertyInfo = new BasicPropertyInfo();
    }

    public function setRoomTypes($roomTypes)
    {
        $this->roomTypes = $roomTypes;

        return $this;
    }

    public function addRoomType(RoomType $roomType)
    {
        $this->roomTypes[] = $roomType;

        return $this;
    }

    public function getRoomTypes()
    {
        return $this->roomTypes;
    }

    public function setRoomRates($roomRates)
    {
        $this->roomRates = $roomRates;

        return $this;
    }

    public function addRoomRate(RoomRate $roomRate)
    {
        $this->roomRates[] = $roomRate;

        return $this;
    }

    public function getRoomRates()
    {
        return $this->roomRates;
    }

    /**
     * @param \C2is\OTA\Model\HotelRes\GuestCounts $guestCounts
     */
    public function setGuestCounts($guestCounts)
    {
        $this->guestCounts = $guestCounts;

        return $this;
    }

    /**
     * @param \C2is\OTA\Model\HotelRes\GuestCount $guestCount
     */
    public function addGuestCount(GuestCount $guestCount)
    {
        $this->guestCounts->addGuestCount($guestCount);

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\GuestCounts
     */
    public function getGuestCounts()
    {
        return $this->guestCounts;
    }

    /**
     * @param \C2is\OTA\Model\Common\Timespan $timespan
     */
    public function setTimespan(Timespan $timespan)
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
     * @param \C2is\OTA\Model\Common\Total $total
     */
    public function setTotal(Total $total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\Common\Total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param \C2is\OTA\Model\Common\BasicPropertyInfo $basicPropertyInfo
     */
    public function setBasicPropertyInfo($basicPropertyInfo)
    {
        $this->basicPropertyInfo = $basicPropertyInfo;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\Common\BasicPropertyInfo
     */
    public function getBasicPropertyInfo()
    {
        return $this->basicPropertyInfo;
    }

    /**
     * @param array $serviceRphs
     */
    public function setServiceRphs($serviceRphs)
    {
        $this->serviceRphs = $serviceRphs;

        return $this;
    }

    /**
     * @param ServiceRph $serviceRph
     */
    public function addServiceRph(ServiceRph $serviceRph)
    {
        $this->serviceRphs[] = $serviceRph;

        return $this;
    }

    /**
     * @return array
     */
    public function getServiceRphs()
    {
        return $this->serviceRphs;
    }
}
