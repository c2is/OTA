<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlAttribute;

class Radius
{
    /**
     * @SerializedName("Distance")
     * @XmlAttribute
     * @Type("double")
     */
    private $distance;

    /**
     * @SerializedName("DistanceMeasure")
     * @XmlAttribute
     * @Type("string")
     */
    private $distanceMeasure;

    /**
     * @param $distance
     * @return $this
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * @return string
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @param $distanceMeasure
     * @return $this
     */
    public function setDistanceMeasure($distanceMeasure)
    {
        $this->distanceMeasure = $distanceMeasure;

        return $this;
    }

    /**
     * @return string
     */
    public function getDistanceMeasure()
    {
        return $this->distanceMeasure;
    }
}
