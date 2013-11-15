<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use C2is\OTA\Model\HotelSearch\Request\Criterion;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class RadiusCriterion extends Criterion
{
    /**
     * @SerializedName("Radius")
     * @Type("C2is\OTA\Model\HotelSearch\Request\Criterion\Radius")
     */
    private $radius;

    public function __construct(Radius $radius)
    {
        $this->radius = $radius;
    }

    /**
     * @param $radius
     * @return $this
     */
    public function setRadius($radius)
    {
        $this->radius = $radius;

        return $this;
    }

    /**
     * @return Radius
     */
    public function getRadius()
    {
        return $this->radius;
    }
}
