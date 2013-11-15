<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use JMS\Serializer\Annotation\XmlList;

class GuestCounts
{
    /**
     * @XmlList(inline=true, entry="GuestCount")
     */
    private $guestCount = array();

    public function getGuestCount()
    {
        return $this->guestCount;
    }

    public function addGuestCount(GuestCount $guestCount)
    {
        $this->guestCount[] = $guestCount;
    }

    public function setGuestCount(array $guestCount)
    {
        $this->guestCount = $guestCount;
    }

    public function resetGuestCount()
    {
        $this->guestCount = array();
    }
}
