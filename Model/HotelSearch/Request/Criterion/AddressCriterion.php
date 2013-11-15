<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use C2is\OTA\Model\HotelSearch\Request\Criterion;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class AddressCriterion extends Criterion
{
    /**
     * @SerializedName("Address")
     * @Type("C2is\OTA\Model\HotelSearch\Request\Criterion\Address")
     */
    private $address;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    /**
     * @param $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }
}
