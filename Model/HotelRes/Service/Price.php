<?php

namespace C2is\OTA\Model\HotelRes\Service;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class Price
{
    /**
     * @SerializedName("Base")
     * @Type("C2is\OTA\Model\HotelRes\Service\Base")
     * @var Base
     */
    private $base;

    public function __construct()
    {
        $this->base = new Base();
    }

    /**
     * @param \C2is\OTA\Model\HotelRes\Service\Base $base
     */
    public function setBase($base)
    {
        $this->base = $base;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\Service\Base
     */
    public function getBase()
    {
        return $this->base;
    }
}
