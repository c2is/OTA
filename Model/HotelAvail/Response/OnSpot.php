<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class OnSpot
 * @package C2is\OTA\Model\HotelAvail\Response
 * @AccessType("public_method")
 */
class OnSpot
{
    /**
     * @SerializedName("AmountOnSpot")
     * @XmlAttribute
     * @Type("double")
     * @var double
     */
    private $amount;

    /**
     * @param double $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return double
     */
    public function getAmount()
    {
        return $this->amount;
    }
}
