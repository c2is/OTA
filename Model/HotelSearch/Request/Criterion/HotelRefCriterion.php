<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use C2is\OTA\Model\HotelSearch\Request\Criterion;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class HotelRefCriterion extends Criterion
{
    /**
     * @SerializedName("HotelRef")
     * @Type("C2is\OTA\Model\HotelSearch\Request\Criterion\HotelRef")
     */
    private $hotelRef;

    public function __construct(HotelRef $hotelRef)
    {
        $this->hotelRef = $hotelRef;
    }

    /**
     * @param $hotelRef
     * @return $this
     */
    public function setHotelRef($hotelRef)
    {
        $this->hotelRef = $hotelRef;

        return $this;
    }

    /**
     * @return int
     */
    public function getHotelRef()
    {
        return $this->hotelRef;
    }
}
