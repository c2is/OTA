<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\Accessor;

/**
 * Class Service
 * @package C2is\OTA\Model\HotelAvail\Response
 * @AccessType("public_method")
 */
class ServiceDetails
{
    /**
     * @SerializedName("Adult")
     * @XmlAttribute
     * @Type("boolean")
     * @var boolean
     */
    private $adult;

    /**
     * @SerializedName("Child")
     * @XmlAttribute
     * @Type("boolean")
     * @var boolean
     */
    private $child;

    /**
     * @SerializedName("Infant")
     * @XmlAttribute
     * @Type("boolean")
     * @var boolean
     */
    private $infant;

    /**
     * @SerializedName("Junior")
     * @XmlAttribute
     * @Type("boolean")
     * @var boolean
     */
    private $junior;

    /**
     * @SerializedName("MinPax")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $minPax;

    /**
     * @SerializedName("PricePerNight")
     * @XmlAttribute
     * @Type("boolean")
     * @var boolean
     */
    private $pricePerNight;

    /**
     * @SerializedName("PricePerPax")
     * @XmlAttribute
     * @Type("boolean")
     * @var boolean
     */
    private $pricePerPax;

    /**
     * @SerializedName("Senior")
     * @XmlAttribute
     * @Type("boolean")
     * @var boolean
     */
    private $senior;

    /**
     * @param boolean $adult
     */
    public function setAdult($adult)
    {
        $this->adult = $adult;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getAdult()
    {
        return $this->adult;
    }

    /**
     * @param boolean $child
     */
    public function setChild($child)
    {
        $this->child = $child;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getChild()
    {
        return $this->child;
    }

    /**
     * @param boolean $infant
     */
    public function setInfant($infant)
    {
        $this->infant = $infant;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getInfant()
    {
        return $this->infant;
    }

    /**
     * @param boolean $junior
     */
    public function setJunior($junior)
    {
        $this->junior = $junior;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getJunior()
    {
        return $this->junior;
    }

    /**
     * @param int $minPax
     */
    public function setMinPax($minPax)
    {
        $this->minPax = $minPax;

        return $this;
    }

    /**
     * @return int
     */
    public function getMinPax()
    {
        return $this->minPax;
    }

    /**
     * @param boolean $pricePerNight
     */
    public function setPricePerNight($pricePerNight)
    {
        $this->pricePerNight = $pricePerNight;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getPricePerNight()
    {
        return $this->pricePerNight;
    }

    /**
     * @param boolean $pricePerPax
     */
    public function setPricePerPax($pricePerPax)
    {
        $this->pricePerPax = $pricePerPax;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getPricePerPax()
    {
        return $this->pricePerPax;
    }

    /**
     * @param boolean $senior
     */
    public function setSenior($senior)
    {
        $this->senior = $senior;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getSenior()
    {
        return $this->senior;
    }
}
