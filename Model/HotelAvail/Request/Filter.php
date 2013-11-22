<?php

namespace C2is\OTA\Model\HotelAvail\Request;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

class Filter
{
    /**
     * @SerializedName("ResponseFormatters")
     * @XmlList(inline=false, entry="TextDelimiter")
     * @Type("array<C2is\OTA\Model\HotelAvail\Request\ResponseDelimiter>")
     * @var array
     */
    private $responseFormatters;

    /**
     * @param $responseFormatters
     * @return $this
     */
    public function setResponseFormatters($responseFormatters)
    {
        $this->responseFormatters = $responseFormatters;

        return $this;
    }

    /**
     * @param TextDelimiter $responseFormatter
     * @return $this
     */
    public function addResponseFormatter(TextDelimiter $responseFormatter)
    {
        $this->responseFormatters[] = $responseFormatter;

        return $this;
    }

    /**
     * @return ResponseDelimiter
     */
    public function getResponseFormatters()
    {
        return $this->responseFormatters;
    }
}
