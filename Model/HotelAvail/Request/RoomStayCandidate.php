<?php

namespace C2is\OTA\Model\HotelAvail\Request;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class RoomStayCandidate
{
    /**
     * @SerializedName("Quantity")
     * @XmlAttribute
     * @Type("integer")
     */
    private $quantity;

    /**
     * @SerializedName("GuestCounts")
     * @XmlList(inline=false, entry="GuestCount")
     * @Type("array<C2is\OTA\Model\HotelAvail\Request\GuestCount>")
     */
    private $guestCounts = array();

    public function setGuestCounts($guestCounts)
    {
        $this->guestCounts = $guestCounts;

        return $this;
    }

    public function addGuestCount(GuestCount $guestCount)
    {
        $this->guestCounts[] = $guestCount;

        return $this;
    }

    public function getGuestCounts()
    {
        return $this->guestCounts;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}
