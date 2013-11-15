<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class Keyword
{
    /**
     * @SerializedName("Keyword")
     * @Type("string")
     */
    private $keyword;

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
     * @return string
     */
    public function getKeyword()
    {
        return $this->keyword;
    }
}
