<?php

namespace C2is\OTA\Model\HotelRes;

use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class GuestCounts
{
    /**
     * @SerializedName("IsPerRoom")
     * @XmlAttribute
     * @Type("boolean")
     * @var boolean
     */
    private $perRoom;

    /**
     * @XmlList(inline=true, entry="GuestCount")
     * @Type("array<C2is\OTA\Model\HotelRes\GuestCount>")
     */
    private $guestCount = array();

    public function getGuestCount()
    {
        return $this->guestCount;
    }

    public function addGuestCount(GuestCount $guestCount)
    {
        $this->guestCount[] = $guestCount;

        return $this;
    }

    public function setGuestCount(array $guestCount)
    {
        $this->guestCount = $guestCount;

        return $this;
    }

    public function resetGuestCount()
    {
        $this->guestCount = array();

        return $this;
    }

    /**
     * @param boolean $perRoom
     */
    public function setPerRoom($perRoom)
    {
        $this->perRoom = $perRoom;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getPerRoom()
    {
        return $this->perRoom;
    }
}
