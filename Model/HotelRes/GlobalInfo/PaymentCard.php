<?php

namespace C2is\OTA\Model\HotelRes\GlobalInfo;

use C2is\OTA\Exception\InvalidParameterException;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class PaymentCard
{
    /**
     * @Exclude
     * @var array
     */
    public static $allowedValues = array(
        'AX',
        'VI',
        'DN',
        'DC',
        'DS',
        'JC',
        'MC',
        'IK',
        'CA',
        'EC',
    );

    /**
     * @SerializedName("CardNumber")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $cardNumber;

    /**
     * @SerializedName("CardType")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $cardType;

    /**
     * @SerializedName("ExpireDate")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $expireDate;

    /**
     * @SerializedName("SeriesCode")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $seriesCode;

    /**
     * @SerializedName("CardHolderName")
     * @Type("string")
     * @var string
     */
    private $cardHolderName;

    /**
     * @param string $cardNumber
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardType
     */
    public function setCardType($cardType)
    {
        if (!in_array($cardType, self::$allowedValues)) {
            throw new InvalidParameterException(sprintf('Invalid value for card type. Allowed values are %s ; got "%s"', implode(', ', self::$allowedValues), $cardType));
        }

        $this->cardType = $cardType;

        return $this;
    }

    /**
     * @return string
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * @param string $expireDate
     */
    public function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * @param string $seriesCode
     */
    public function setSeriesCode($seriesCode)
    {
        $this->seriesCode = $seriesCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getSeriesCode()
    {
        return $this->seriesCode;
    }

    /**
     * @param string $cardHolderName
     */
    public function setCardHolderName($cardHolderName)
    {
        $this->cardHolderName = $cardHolderName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCardHolderName()
    {
        return $this->cardHolderName;
    }
}
