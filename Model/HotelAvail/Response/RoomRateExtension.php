<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

class RoomRateExtension
{
    /**
     * @SerializedName("Services")
     * @XmlList(inline=false, entry="Service")
     * @Type("array<C2is\OTA\Model\HotelAvail\Response\Service>")
     * @var array
     */
    private $services = array();

    /**
     * @SerializedName("Occupancy")
     * @XmlList(inline=false, entry="GuestCounts")
     * @Type("array<C2is\OTA\Model\HotelAvail\Response\GuestCounts>")
     * @var array
     */
    private $occupancy = array();

    /**
     * @param array $services
     */
    public function setServices($services)
    {
        $this->services = $services;

        return $this;
    }

    /**
     * @param Service $services
     */
    public function addServices(Service $services)
    {
        $this->services[] = $services;

        return $this;
    }

    /**
     * @return array
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param array $occupancy
     */
    public function setOccupancy($occupancy)
    {
        $this->occupancy = $occupancy;

        return $this;
    }

    /**
     * @param GuestCounts $occupancy
     */
    public function addOccupancy(GuestCounts $guestCounts)
    {
        $this->occupancy[] = $guestCounts;

        return $this;
    }

    /**
     * @return array
     */
    public function getOccupancy()
    {
        return $this->occupancy;
    }
}
