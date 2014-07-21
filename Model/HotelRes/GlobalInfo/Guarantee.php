<?php

namespace C2is\OTA\Model\HotelRes\GlobalInfo;

use C2is\OTA\Exception\InvalidParameterException;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\SerializedName;

class Guarantee
{
    /**
     * @Exclude
     * @var array
     */
    public static $allowedTypes = array(
        'CC/DC/Voucher',
        'Deposit',
        'PrePay',
    );

    /**
     * @SerializedName("GuaranteeType")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $type = 'CC/DC/Voucher';

    /**
     * @SerializedName("GuaranteesAccepted")
     * @XmlList(inline=false, entry="GuaranteeAccepted")
     * @Type("array<C2is\OTA\Model\HotelRes\GlobalInfo\GuaranteeAccepted>")
     * @var array
     */
    private $guaranteesAccepted;

    /**
     * @SerializedName("DepositPayments")
     * @XmlList(inline=false, entry="GuaranteePayment")
     * @Type("array<C2is\OTA\Model\HotelRes\GlobalInfo\GuaranteePayment>")
     * @var array
     */
    private $guaranteesPayments;

    /**
     * @param string $type
     */
    public function setType($type)
    {
        if (!in_array($type, self::$allowedTypes)) {
            throw new InvalidParameterException(sprintf('Invalid value for guarantee type. Allowed value are : %s ; got "%s"', implode(', ', self::$allowedTypes), $type));
        }

        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param array $guaranteesAccepted
     */
    public function setGuaranteesAccepted($guaranteesAccepted)
    {
        $this->guaranteesAccepted = $guaranteesAccepted;

        return $this;
    }

    /**
     * @param PaymentCard $paymentCard
     */
    public function addPaymentCard(PaymentCard $paymentCard)
    {
        $this->guaranteesAccepted[] = new GuaranteeAccepted($paymentCard);

        return $this;
    }

    /**
     * @return array
     */
    public function getGuaranteesAccepted()
    {
        return $this->guaranteesAccepted;
    }

    /**
     * @param array $guaranteesPayments
     * @return $this
     */
    public function setGuaranteesPayments($guaranteesPayments)
    {
        $this->guaranteesPayments = $guaranteesPayments;

        return $this;
    }

    /**
     * @param GuaranteePayment $guaranteePayment
     */
    public function addGuaranteePayment($guaranteePayment)
    {
        $this->guaranteesAccepted[] = $guaranteePayment;

        return $this;
    }

    /**
     * @return array
     */
    public function getGuaranteesPayments()
    {
        return $this->guaranteesPayments;
    }
}
