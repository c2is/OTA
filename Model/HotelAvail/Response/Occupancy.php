<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class Occupancy
 * @package C2is\OTA\Model\HotelAvail\Response
 * @AccessType("public_method")
 */
class Occupancy
{
    /**
     * @SerializedName("Base")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $base;

    /**
     * @SerializedName("FreeChildren")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $freeChildren;

    /**
     * @SerializedName("FreeInfants")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $freeInfants;

    /**
     * @SerializedName("FreeJuniors")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $freeJuniors;

    /**
     * @SerializedName("Max")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $max;

    /**
     * @SerializedName("MaxAdults")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $maxAdults;

    /**
     * @SerializedName("MaxChildren")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $maxChildren;

    /**
     * @SerializedName("MaxInfants")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $maxInfants;

    /**
     * @SerializedName("MaxJuniors")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $maxJuniors;

    /**
     * @SerializedName("MaxSeniors")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $maxSeniors;

    /**
     * @SerializedName("Min")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $min;

    /**
     * @XmlList(inline=true, entry="GuestCount")
     * @Type("array<C2is\OTA\Model\HotelAvail\Response\GuestCount>")
     * @var array
     */
    private $guestCount = array();

    /**
     * @param int $base
     */
    public function setBase($base)
    {
        $this->base = $base;

        return $this;
    }

    /**
     * @return int
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @param int $freeChildren
     */
    public function setFreeChildren($freeChildren)
    {
        $this->freeChildren = $freeChildren;

        return $this;
    }

    /**
     * @return int
     */
    public function getFreeChildren()
    {
        return $this->freeChildren;
    }

    /**
     * @param int $freeInfants
     */
    public function setFreeInfants($freeInfants)
    {
        $this->freeInfants = $freeInfants;

        return $this;
    }

    /**
     * @return int
     */
    public function getFreeInfants()
    {
        return $this->freeInfants;
    }

    /**
     * @param int $freeJuniors
     */
    public function setFreeJuniors($freeJuniors)
    {
        $this->freeJuniors = $freeJuniors;

        return $this;
    }

    /**
     * @return int
     */
    public function getFreeJuniors()
    {
        return $this->freeJuniors;
    }

    /**
     * @param int $max
     */
    public function setMax($max)
    {
        $this->max = $max;

        return $this;
    }

    /**
     * @return int
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param int $maxAdults
     */
    public function setMaxAdults($maxAdults)
    {
        $this->maxAdults = $maxAdults;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxAdults()
    {
        return $this->maxAdults;
    }

    /**
     * @param int $maxChildren
     */
    public function setMaxChildren($maxChildren)
    {
        $this->maxChildren = $maxChildren;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxChildren()
    {
        return $this->maxChildren;
    }

    /**
     * @param int $maxInfants
     */
    public function setMaxInfants($maxInfants)
    {
        $this->maxInfants = $maxInfants;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxInfants()
    {
        return $this->maxInfants;
    }

    /**
     * @param int $maxJuniors
     */
    public function setMaxJuniors($maxJuniors)
    {
        $this->maxJuniors = $maxJuniors;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxJuniors()
    {
        return $this->maxJuniors;
    }

    /**
     * @param int $maxSeniors
     */
    public function setMaxSeniors($maxSeniors)
    {
        $this->maxSeniors = $maxSeniors;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxSeniors()
    {
        return $this->maxSeniors;
    }

    /**
     * @param int $min
     */
    public function setMin($min)
    {
        $this->min = $min;

        return $this;
    }

    /**
     * @return int
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param array $guestCount
     */
    public function setGuestCount($guestCount)
    {
        $this->guestCount = $guestCount;

        return $this;
    }

    /**
     * @param GuestCount $guestCount
     */
    public function addGuestCount(GuestCount $guestCount)
    {
        $this->guestCount[] = $guestCount;

        return $this;
    }

    /**
     * @return array
     */
    public function getGuestCount()
    {
        return $this->guestCount;
    }
}
