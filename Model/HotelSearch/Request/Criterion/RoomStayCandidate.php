<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class RoomStayCandidate
{
    /**
     * @SerializedName("GuestCounts")
     * @Type("C2is\OTA\Model\HotelSearch\Request\Criterion\GuestCounts")
     */
    private $guestCounts;

    /**
     * @param $guestCounts
     * @return $this
     */
    public function setGuestCounts(GuestCounts $guestCounts)
    {
        $this->guestCounts = $guestCounts;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGuestCounts()
    {
        return $this->guestCounts;
    }
}
