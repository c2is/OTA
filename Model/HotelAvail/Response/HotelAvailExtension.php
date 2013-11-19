<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

class HotelAvailExtension
{
    /**
     * @SerializedName("BookingCancelPolicies")
     * @XmlList(inline=false, entry="BookingCancelPolicy")
     * @Type("array<C2is\OTA\Model\HotelAvail\Response\BookingCancelPolicy>")
     * @var array
     */
    private $bookingCancelPolicies = array();

    /**
     * @param array $bookingCancelPolicies
     */
    public function setBookingCancelPolicies($bookingCancelPolicies)
    {
        $indexedBookingCancelPolicies = array();
        foreach ($bookingCancelPolicies as $bookingCancelPolicy) {
            $indexedBookingCancelPolicies[$bookingCancelPolicy->getRph()] = $bookingCancelPolicy;
        }

        $this->bookingCancelPolicies = $indexedBookingCancelPolicies;

        return $this;
    }

    /**
     * @return array
     */
    public function getBookingCancelPolicies()
    {
        return $this->bookingCancelPolicies;
    }
}
