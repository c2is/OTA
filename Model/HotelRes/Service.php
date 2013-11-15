<?php

namespace C2is\OTA\Model\HotelRes;

use C2is\OTA\Exception\InvalidParameterException;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

class Service
{
    const PRICING_TYPE_PER_STAY = 'Per stay';

    const PRICING_TYPE_PER_PERSON = 'Per person';

    const PRICING_TYPE_PER_NIGHT = 'Per night';

    const PRICING_TYPE_PER_PERSON_PER_NIGHT = 'Per person per night';

    /**
     * @SerializedName("ServiceRPH")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $rph;

    /**
     * @SerializedName("Quantity")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $quantity = 1;

    /**
     * @SerializedName("ServiceInventoryCode")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $inventoryCode;

    /**
     * @SerializedName("ServicePricingType")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $pricingType;

    /**
     * @SerializedName("Price")
     * @Type("C2is\OTA\Model\HotelRes\Service\Price")
     * @var \C2is\OTA\Model\HotelRes\Service\Price
     */
    private $price;

    /**
     * @SerializedName("ServiceDetails")
     * @Type("C2is\OTA\Model\HotelRes\Service\Details")
     * @var \C2is\OTA\Model\HotelRes\Service\Details
     */
    private $details;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->price = new \C2is\OTA\Model\HotelRes\Service\Price();
        $this->details = new \C2is\OTA\Model\HotelRes\Service\Details();
    }

    /**
     * @param string $rph
     */
    public function setRph($rph)
    {
        $this->rph = $rph;

        return $this;
    }

    /**
     * @return string
     */
    public function getRph()
    {
        return $this->rph;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param string $inventoryCode
     */
    public function setInventoryCode($inventoryCode)
    {
        $this->inventoryCode = $inventoryCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getInventoryCode()
    {
        return $this->inventoryCode;
    }

    /**
     * @param string $pricingType
     */
    public function setPricingType($pricingType)
    {
        $allowedValues = array(
            self::PRICING_TYPE_PER_STAY,
            self::PRICING_TYPE_PER_PERSON,
            self::PRICING_TYPE_PER_NIGHT,
            self::PRICING_TYPE_PER_PERSON_PER_NIGHT,
        );

        if (!in_array($pricingType, $allowedValues)) {
            throw new InvalidParameterException(sprintf('Invalid value for service pricing type. Allowed values are %s ; got "%s".', implode($allowedValues, ', '), $pricingType));
        }

        $this->pricingType = $pricingType;

        return $this;
    }

    /**
     * @return string
     */
    public function getPricingType()
    {
        return $this->pricingType;
    }

    /**
     * @param \C2is\OTA\Model\HotelRes\Service\Price $price
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\Service\Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param \C2is\OTA\Model\HotelRes\Service\Details $details
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\Service\Details
     */
    public function getDetails()
    {
        return $this->details;
    }
}
