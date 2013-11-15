<?php

namespace C2is\OTA\Model\HotelSearch\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

class Extensions
{
    /**
     * @SerializedName("Filter")
     * @Type("C2is\OTA\Model\HotelSearch\Response\Filter")
     */
    private $filter;

    /**
     * @SerializedName("RateRangeLabels")
     * @XmlList(inline=false, entry="RateRangeLabel")
     * @Type("array<C2is\OTA\Model\HotelSearch\Response\RateRangeLabel>")
     */
    private $rateRangeLabels = array();

    public function setFilter($filter)
    {
        $this->filter = $filter;
    }

    public function getFilter()
    {
        return $this->filter;
    }

    public function setRateRangeLabels($rateRangeLabels)
    {
        $this->rateRangeLabels = $rateRangeLabels;
    }

    public function addRateRangeLabels(RateRangeLabel $rateRangeLabels)
    {
        $this->rateRangeLabels[] = $rateRangeLabels;
    }

    public function getRateRangeLabels()
    {
        return $this->rateRangeLabels;
    }
}
