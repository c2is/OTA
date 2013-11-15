<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

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
     * @param $start
     * @return $this
     */
    public function setStart($start)
    {
        if (!$start instanceof \DateTime) {
            $start = new \DateTime(sprintf('@%s', strtotime($start)));
        }
        $this->start = $start;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param $end
     * @return $this
     */
    public function setEnd($end)
    {
        if (!$end instanceof \DateTime) {
            $end = new \DateTime(sprintf('@%s', strtotime($end)));
        }
        $this->end = $end;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }
}
