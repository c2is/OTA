<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use C2is\OTA\Model\HotelSearch\Request\Criterion;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class PositionCriterion extends Criterion
{
    /**
     * @SerializedName("Position")
     * @Type("C2is\OTA\Model\HotelSearch\Request\Criterion\Position")
     */
    private $position;

    public function __construct(Position $position)
    {
        $this->position = $position;
    }

    /**
     * @param $position
     * @return $this
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return Position
     */
    public function getPosition()
    {
        return $this->position;
    }
}
