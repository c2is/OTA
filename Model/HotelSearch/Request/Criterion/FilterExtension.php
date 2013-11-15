<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlAttribute;

class FilterExtension
{
    /**
     * @SerializedName("Filter")
     * @Type("C2is\OTA\Model\HotelSearch\Request\Criterion\Filter")
     */
    private $filter;

    public function __construct(Filter $filter)
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
     * @return string
     */
    public function getFilter()
    {
        return $this->filter;
    }
}
