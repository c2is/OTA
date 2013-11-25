<?php

namespace C2is\OTA\Model\HotelAvail\Response\Rate;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class LastMinute
 * @package C2is\OTA\Model\HotelAvail\Response\Rate
 * @AccessType("public_method")
 */
class LastMinute
{
    /**
     * @SerializedName("FirstDay")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $firstDay;

    /**
     * @param int $firstDay
     */
    public function setFirstDay($firstDay)
    {
        $this->firstDay = $firstDay;

        return $this;
    }

    /**
     * @return int
     */
    public function getFirstDay()
    {
        return $this->firstDay;
    }
}
