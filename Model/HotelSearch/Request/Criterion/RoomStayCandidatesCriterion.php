<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use C2is\OTA\Model\HotelSearch\Request\Criterion;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class RoomStayCandidatesCriterion extends Criterion
{
    /**
     * @SerializedName("RoomStayCandidates")
     * @Type("C2is\OTA\Model\HotelSearch\Request\Criterion\RoomStayCandidates")
     */
    private $roomStayCandidates;

    public function __construct(RoomStayCandidates $roomStayCandidates)
    {
        $this->roomStayCandidates = $roomStayCandidates;
    }

    /**
     * @param $roomStayCandidates
     * @return $this
     */
    public function setRoomStayCandidates($roomStayCandidates)
    {
        $this->roomStayCandidates = $roomStayCandidates;

        return $this;
    }

    /**
     * @return RoomStayCandidates
     */
    public function getRoomStayCandidates()
    {
        return $this->roomStayCandidates;
    }
}
