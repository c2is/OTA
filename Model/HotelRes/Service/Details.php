<?php

namespace C2is\OTA\Model\HotelRes\Service;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class Details
{
    /**
     * @SerializedName("TimeSpan")
     * @Type("C2is\OTA\Model\HotelRes\Service\Timespan")
     * @var Timespan
     */
    private $timespan;

    public function __construct()
    {
        $this->timespan = new Timespan();
    }

    /**
     * @param \C2is\OTA\Model\HotelRes\Service\Timespan $timespan
     */
    public function setTimespan(Timespan $timespan)
    {
        $this->timespan = $timespan;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\Service\Timespan
     */
    public function getTimespan()
    {
        return $this->timespan;
    }
}
