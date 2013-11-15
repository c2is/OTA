<?php

namespace C2is\OTA\Model\HotelRes;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class RedeemedNight
{
    /**
     * @SerializedName("Date")
     * @XmlAttribute
     * @Type("DateTime<'Y-m-d'>")
     * @var \Datetime
     */
    private $date;

    /**
     * @param \Datetime $date
     */
    public function setDate($date)
    {
        if (!$date instanceof \DateTime) {
            $date = new \DateTime($date);
        }
        $this->date = $date;
    }

    /**
     * @return \Datetime
     */
    public function getDate()
    {
        return $this->date;
    }
}
