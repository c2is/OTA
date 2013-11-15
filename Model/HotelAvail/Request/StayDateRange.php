<?php

namespace C2is\OTA\Model\HotelAvail\Request;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class StayDateRange
{
    /**
     * @SerializedName("Start")
     * @XmlAttribute
     * @Type("DateTime<'Y-m-d'>")
     */
    private $start;

    /**
     * @SerializedName("End")
     * @XmlAttribute
     * @Type("DateTime<'Y-m-d'>")
     */
    private $end;

    /**
     * @SerializedName("Duration")
     * @Type("C2is\OTA\Model\HotelAvail\Request\RateRange")
     */
    private $duration;

    /**
     * @SerializedName("DateWindowRange")
     * @Type("string")
     */
    private $range;

    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function setEnd($end)
    {
        if (!$end instanceof \DateTime) {
            $end = new \DateTime(sprintf('@%s', strtotime($end)));
        }

        $this->end = $end;

        return $this;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function setRange($range)
    {
        $this->range = $range;

        return $this;
    }

    public function getRange()
    {
        return $this->range;
    }

    public function setStart($start)
    {
        if (!$start instanceof \DateTime) {
            $start = new \DateTime(sprintf('@%s', strtotime($start)));
        }

        $this->start = $start;

        return $this;
    }

    public function getStart()
    {
        return $this->start;
    }
}
