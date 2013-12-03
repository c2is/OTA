<?php

namespace C2is\OTA\Model\HotelRes;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class HotelReservation
 * @package C2is\OTA\Model\HotelRes
 * @AccessType("public_method")
 */
class HotelReservation
{
    /**
     * @SerializedName("RoomStayReservation")
     * @XmlAttribute
     * @Type("boolean")
     * @var string
     */
    private $roomStayReservation = true;

    /**
     * @SerializedName("CreateDateTime")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $createDateTime;

    /**
     * @SerializedName("LastModifyDateTime")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $lastModifyDateTime;

    /**
     * @SerializedName("CreatorID")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $creatorId;

    /**
     * @SerializedName("RoomStays")
     * @XmlList(inline=false, entry="RoomStay")
     * @Type("array<C2is\OTA\Model\HotelRes\RoomStay>")
     * @var array
     */
    private $roomStays;

    /**
     * @SerializedName("Services")
     * @XmlList(inline=false, entry="Service")
     * @Type("array<C2is\OTA\Model\HotelRes\Service>")
     * @var array
     */
    private $services = array();

    /**
     * @SerializedName("ResGuests")
     * @XmlList(inline=false, entry="ResGuest")
     * @Type("array<C2is\OTA\Model\HotelRes\Guest>")
     * @var Guest
     */
    private $guests = array();

    /**
     * @SerializedName("ResGlobalInfo")
     * @Type("C2is\OTA\Model\HotelRes\GlobalInfo")
     * @var GlobalInfo
     */
    private $globalInfo;

    /**
     * @param string $createDateTime
     */
    public function setCreateDateTime($createDateTime)
    {
        if (!$createDateTime instanceof \DateTime) {
            $createDateTime = new \DateTime($createDateTime);
        }
        $this->createDateTime = $createDateTime;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreateDateTime()
    {
        return $this->createDateTime instanceof \DateTime ? $this->createDateTime->format('Y-m-d\TH:i:s\Z') : $this->createDateTime;
    }

    /**
     * @param string $creatorId
     */
    public function setCreatorId($creatorId)
    {
        $this->creatorId = $creatorId;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreatorId()
    {
        return $this->creatorId;
    }

    /**
     * @param string $lastModifyDateTime
     */
    public function setLastModifyDateTime($lastModifyDateTime)
    {
        if (!$lastModifyDateTime instanceof \DateTime) {
            $lastModifyDateTime = new \DateTime($lastModifyDateTime);
        }
        $this->lastModifyDateTime = $lastModifyDateTime;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastModifyDateTime()
    {
        return $this->lastModifyDateTime instanceof \DateTime ? $this->lastModifyDateTime->format('Y-m-d\TH:i:s\Z') : $this->lastModifyDateTime;
    }

    /**
     * @param string $roomStayReservation
     */
    public function setRoomStayReservation($roomStayReservation)
    {
        $this->roomStayReservation = $roomStayReservation;

        return $this;
    }

    /**
     * @return string
     */
    public function getRoomStayReservation()
    {
        return $this->roomStayReservation;
    }

    public function setRoomStays($roomStays)
    {
        $this->roomStays = $roomStays;

        return $this;
    }

    public function addRoomStay(RoomStay $roomStay)
    {
        $this->roomStays[] = $roomStay;

        return $this;
    }

    public function getRoomStays()
    {
        return $this->roomStays;
    }

    /**
     * @param array $services
     */
    public function setServices($services)
    {
        $this->services = $services;

        return $this;
    }

    /**
     * @param array $service
     */
    public function addService($service)
    {
        $this->services[] = $service;

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
     * @param array $guests
     */
    public function setGuests($guests)
    {
        $this->guests = $guests;

        return $this;
    }

    /**
     * @param Guest $guests
     */
    public function addGuest(Guest $guest)
    {
        $this->guests[] = $guest;

        return $this;
    }

    /**
     * @return array
     */
    public function getGuests()
    {
        return $this->guests;
    }

    /**
     * @param \C2is\OTA\Model\HotelRes\GlobalInfo $globalInfo
     */
    public function setGlobalInfo($globalInfo)
    {
        $this->globalInfo = $globalInfo;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\GlobalInfo
     */
    public function getGlobalInfo()
    {
        return $this->globalInfo;
    }
}
