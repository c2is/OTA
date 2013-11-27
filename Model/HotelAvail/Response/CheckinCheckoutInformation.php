<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class CheckinCheckoutInformation
 * @package C2is\OTA\Model\HotelAvail\Response
 * @AccessType("public_method")
 */
class CheckinCheckoutInformation
{
    /**
     * @SerializedName("Checkin")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $checkin;

    /**
     * @SerializedName("Checkout")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $checkout;

    /**
     * @param string $checkin
     */
    public function setCheckin($checkin)
    {
        $this->checkin = $checkin;

        return $this;
    }

    /**
     * @return string
     */
    public function getCheckin()
    {
        return $this->checkin;
    }

    /**
     * @param string $checkout
     */
    public function setCheckout($checkout)
    {
        $this->checkout = $checkout;

        return $this;
    }

    /**
     * @return string
     */
    public function getCheckout()
    {
        return $this->checkout;
    }
}
