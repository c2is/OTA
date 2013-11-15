<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use C2is\OTA\Model\HotelSearch\Request\Criterion;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class StayDateRangeCriterion extends Criterion
{
    /**
     * @SerializedName("StayDateRange")
     * @Type("C2is\OTA\Model\HotelSearch\Request\Criterion\StayDateRange")
     */
    private $stayDateRange;

    public function __construct(StayDateRange $stayDateRange)
    {
        $this->stayDateRange = $stayDateRange;
    }

    /**
     * @param $stayDateRange
     * @return $this
     */
    public function setStayDateRange($stayDateRange)
    {
        $this->stayDateRange = $stayDateRange;

        return $this;
    }

    /**
     * @return StayDateRange
     */
    public function getStayDateRange()
    {
        return $this->stayDateRange;
    }
}
