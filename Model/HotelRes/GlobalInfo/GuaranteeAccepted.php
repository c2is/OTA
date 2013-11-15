<?php

namespace C2is\OTA\Model\HotelRes\GlobalInfo;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

class GuaranteeAccepted
{
    /**
     * @SerializedName("PaymentCard")
     * @Type("C2is\OTA\Model\HotelRes\GlobalInfo\PaymentCard")
     * @var PaymentCard
     */
    private $paymentCard;

    /**
     * Constructor.
     * 
     * @param PaymentCard $paymentCard
     */
    public function __construct(PaymentCard $paymentCard)
    {
        $this->paymentCard = $paymentCard;
    }

    /**
     * @param \C2is\OTA\Model\HotelRes\GlobalInfo\PaymentCard $paymentCard
     */
    public function setPaymentCard($paymentCard)
    {
        $this->paymentCard = $paymentCard;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\GlobalInfo\PaymentCard
     */
    public function getPaymentCard()
    {
        return $this->paymentCard;
    }
}
