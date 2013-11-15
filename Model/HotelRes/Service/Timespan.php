<?php

namespace C2is\OTA\Model\HotelRes\Service;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class Timespan
{
    /**
     * @SerializedName("Duration")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $duration;

    /**
     * @param string $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }
}
