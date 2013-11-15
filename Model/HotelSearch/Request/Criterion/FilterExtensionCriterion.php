<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use C2is\OTA\Model\HotelSearch\Request\Criterion;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class FilterExtensionCriterion extends Criterion
{
    /**
     * @SerializedName("TPA_Extensions")
     * @Type("C2is\OTA\Model\HotelSearch\Request\Criterion\FilterExtension")
     */
    private $filter;

    public function __construct(FilterExtension $filter)
    {
        $this->filter = $filter;
    }

    /**
     * @param $filter
     * @return $this
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * @return Filter
     */
    public function getFilter()
    {
        return $this->filter;
    }
}
