<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use JMS\Serializer\Annotation\XmlList;

class RoomStayCandidates
{
    /**
     * @XmlList(inline=true, entry="RoomStayCandidate")
     */
    private $roomStayCandidate = array();

    public function getRoomStayCandidate()
    {
        return $this->roomStayCandidate;
    }

    public function addRoomStayCandidate(RoomStayCandidate $roomStayCandidate)
    {
        $this->roomStayCandidate[] = $roomStayCandidate;
    }

    public function setRoomStayCandidate(array $roomStayCandidate)
    {
        $this->roomStayCandidate = $roomStayCandidate;
    }

    public function resetRoomStayCandidate()
    {
        $this->roomStayCandidate = array();
    }
}
