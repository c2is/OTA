<?php

namespace C2is\OTA\Model\HotelAvail\Response\Rate;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class EarlyBooking
 * @package C2is\OTA\Model\HotelAvail\Response\Rate
 * @AccessType("public_method")
 */
class EarlyBooking
{
    /**
     * @SerializedName("LastDay")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $lastDay;

    /**
     * @param int $lastDay
     */
    public function setLastDay($lastDay)
    {
        $this->lastDay = $lastDay;

        return $this;
    }

    /**
     * @return int
     */
    public function getLastDay()
    {
        return $this->lastDay;
    }
}
