<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use C2is\OTA\Model\HotelSearch\Request\Criterion;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class KeywordCriterion extends Criterion
{
    /**
     * @SerializedName("TPA_Extensions")
     * @Type("C2is\OTA\Model\HotelSearch\Request\Criterion\Keyword")
     */
    private $keyword;

    public function __construct(Keyword $keyword)
    {
        $this->keyword = $keyword;
    }

    /**
     * @param $keyword
     * @return $this
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * @return Keyword
     */
    public function getKeyword()
    {
        return $this->keyword;
    }
}
