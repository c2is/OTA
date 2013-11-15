<?php

namespace C2is\OTA\Model\Common;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class Timespan
{
    /**
     * @SerializedName("Start")
     * @XmlAttribute
     * @Type("DateTime<'Y-m-d\TH:i:s\Z'>")
     * @var \DateTime
     */
    private $start;

    /**
     * @SerializedName("End")
     * @XmlAttribute
     * @Type("DateTime<'Y-m-d\TH:i:s\Z'>")
     * @var \DateTime
     */
    private $end;

    /**
     * @param $start
     * @return $this
     */
    public function setStart($start)
    {
        if (!$start instanceof \DateTime) {
            $start = new \DateTime($start);
        }
        $this->start = $start;

        return $this;
    }

    /**
     * @return \DateTime
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
            $end = new \DateTime($end);
        }
        $this->end = $end;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }
}
