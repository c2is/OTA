<?php

namespace C2is\OTA\Model\HotelAvail\Request;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class Extensions
{
    /**
     * @SerializedName("bstay")
     * @XmlAttribute
     * @Type("boolean")
     * @var boolean
     */
    private $bStay;
    /**
     * @SerializedName("Filter")
     * @Type("C2is\OTA\Model\HotelAvail\Request\Filter")
     * @var \C2is\OTA\Model\HotelAvail\Request\Filter
     */
    private $filter;

    /**
     * @param $bStay
     * @return $this
     */
    public function setBStay($bStay)
    {
        $this->bStay = $bStay;

        return $this;
    }

    /**
     * @return bool
     */
    public function getBStay()
    {
        return $this->bStay;
    }

    /**
     * @param \C2is\OTA\Model\HotelAvail\Request\Filter $filter
     */
    public function setFilter(Filter $filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelAvail\Request\Filter
     */
    public function getFilter()
    {
        return $this->filter;
    }
}
