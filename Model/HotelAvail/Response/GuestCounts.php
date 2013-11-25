<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class GuestCounts
 * @package C2is\OTA\Model\HotelAvail\Response
 * @AccessType("public_method")
 */
class GuestCounts
{
    /**
     * @XmlList(inline=true, entry="GuestCount")
     * @Type("array<C2is\OTA\Model\HotelAvail\Response\GuestCount>")
     * @var array
     */
    private $guestCount = array();

    /**
     * @param array $guestCount
     */
    public function setGuestCount($guestCount)
    {
        $this->guestCount = $guestCount;

        return $this;
    }

    /**
     * @param GuestCount $guestCount
     */
    public function addGuestCount(GuestCount $guestCount)
    {
        $this->guestCount[] = $guestCount;

        return $this;
    }

    /**
     * @return array
     */
    public function getGuestCount()
    {
        return $this->guestCount;
    }
}
