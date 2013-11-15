<?php

namespace C2is\OTA\Model\HotelAvail\Request;

use C2is\OTA\Model\HotelSearch\Request\Criteria;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class AvailRequestSegment
{
    /**
     * @SerializedName("AvailReqType")
     * @XmlAttribute
     * @Type("string")
     */
    private $availReqType = 'Room';

    /**
     * @SerializedName("StayDateRange")
     * @Type("C2is\OTA\Model\HotelAvail\Request\StayDateRange")
     */
    private $stayDateRange;

    /**
     * @SerializedName("RateRange")
     * @Type("C2is\OTA\Model\HotelAvail\Request\RateRange")
     */
    private $rateRange;

    /**
     * @SerializedName("RoomStayCandidates")
     * @XmlList(inline=false, entry="RoomStayCandidate")
     * @Type("array<C2is\OTA\Model\HotelAvail\Request\RoomStayCandidate>")
     */
    private $roomStayCandidates = array();

    /**
     * @SerializedName("HotelSearchCriteria")
     * @Type("C2is\OTA\Model\HotelSearch\Request\Criteria")
     * @var Criteria
     */
    private $criteria;

    public function setAvailReqType($availReqType)
    {
        $this->availReqType = $availReqType;

        return $this;
    }

    public function getAvailReqType()
    {
        return $this->availReqType;
    }

    public function setRateRange($rateRange)
    {
        $this->rateRange = $rateRange;

        return $this;
    }

    public function getRateRange()
    {
        return $this->rateRange;
    }

    public function setRoomStayCandidates($roomStayCandidates)
    {
        $this->roomStayCandidates = $roomStayCandidates;

        return $this;
    }

    public function addRoomStayCandidate(RoomStayCandidate $roomStayCandidate)
    {
        $this->roomStayCandidates[] = $roomStayCandidate;

        return $this;
    }

    public function getRoomStayCandidates()
    {
        return $this->roomStayCandidates;
    }

    public function setStayDateRange($stayDateRange)
    {
        $this->stayDateRange = $stayDateRange;

        return $this;
    }

    public function getStayDateRange()
    {
        return $this->stayDateRange;
    }

    /**
     * @param Criteria $criteria
     */
    public function setCriteria($criteria)
    {
        $this->criteria = $criteria;

        return $this;
    }

    /**
     * @return Criteria
     */
    public function getCriteria()
    {
        return $this->criteria;
    }
}
