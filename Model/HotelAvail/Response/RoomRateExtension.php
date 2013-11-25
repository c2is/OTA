<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class RoomRateExtension
 * @package C2is\OTA\Model\HotelAvail\Response
 * @AccessType("public_method")
 */
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
     * @Type("C2is\OTA\Model\HotelAvail\Response\Occupancy")
     * @var \C2is\OTA\Model\HotelAvail\Response\Occupancy
     */
    private $occupancy;

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
     * @param Occupancy $occupancy
     * @return $this
     */
    public function setOccupancy(Occupancy $occupancy)
    {
        $this->occupancy = $occupancy;

        return $this;
    }

    /**
     * @return Occupancy
     */
    public function getOccupancy()
    {
        return $this->occupancy;
    }
}
