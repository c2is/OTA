<?php

namespace C2is\OTA\Model\HotelRes;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class Extensions
{
    /**
     * @SerializedName("RedeemedNights")
     * @Type("C2is\OTA\Model\HotelRes\RedeemedNights")
     * @var RedeemedNights
     */
    private $redeemedNights;

    /**
     * @param \C2is\OTA\Model\HotelRes\RedeemedNights $redeemedNights
     */
    public function setRedeemedNights($redeemedNights)
    {
        $this->redeemedNights = $redeemedNights;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\RedeemedNights
     */
    public function getRedeemedNights()
    {
        return $this->redeemedNights;
    }
}
