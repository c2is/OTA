<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;

class Service
{
    /**
     * @SerializedName("Inclusive")
     * @XmlAttribute
     * @Type("boolean")
     * @var boolean
     */
    private $inclusive;

    /**
     * @SerializedName("Type")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $type;

    /**
     * @SerializedName("Mandatory")
     * @XmlAttribute
     * @Type("boolean")
     * @var boolean
     */
    private $mandatory;

    /**
     * @SerializedName("Quantity")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $quantity;

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
     * @SerializedName("isNightRequested")
     * @XmlAttribute
     * @Type("boolean")
     * @var boolean
     */
    private $isNightRequested;

    /**
     * @SerializedName("isGuestsRequested")
     * @XmlAttribute
     * @Type("boolean")
     * @var boolean
     */
    private $isGuestsRequested;

    /**
     * @SerializedName("Price")
     * @Type("C2is\OTA\Model\HotelAvail\Response\Price")
     * @var \C2is\OTA\Model\HotelAvail\Response\Price
     */
    private $price;

    /**
     * @SerializedName("Description")
     * @XmlList(inline=false, entry="Text")
     * @Type("array<C2is\OTA\Model\HotelAvail\Response\Text>")
     * @var array
     */
    private $description = array();

    /**
     * @param boolean $inclusive
     */
    public function setInclusive($inclusive)
    {
        $this->inclusive = $inclusive;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getInclusive()
    {
        return $this->inclusive;
    }

    /**
     * @param boolean $type
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param boolean $mandatory
     */
    public function setMandatory($mandatory)
    {
        $this->mandatory = $mandatory;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getMandatory()
    {
        return $this->mandatory;
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
     * @param boolean $isNightRequested
     */
    public function setIsNightRequested($isNightRequested)
    {
        $this->isNightRequested = $isNightRequested;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsNightRequested()
    {
        return $this->isNightRequested;
    }

    /**
     * @param boolean $isGuestsRequested
     */
    public function setIsGuestsRequested($isGuestsRequested)
    {
        $this->isGuestsRequested = $isGuestsRequested;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsGuestsRequested()
    {
        return $this->isGuestsRequested;
    }

    /**
     * @param \C2is\OTA\Model\HotelAvail\Response\Price $price
     */
    public function setPrice(Price $price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelAvail\Response\Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param array $description
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param Text $text
     */
    public function addDescription(Text $text)
    {
        $this->description[] = $text;

        return $this;
    }

    /**
     * @return array
     */
    public function getDescription()
    {
        return $this->description;
    }
}
