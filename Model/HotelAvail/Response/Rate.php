<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class Rate
{
    /**
     * @SerializedName("AgeQualifyingCode")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $ageCode;

    /**
     * @SerializedName("EffectiveDate")
     * @XmlAttribute
     * @Type("DateTime<'Y-m-d'>")
     * @var \DateTime
     */
    private $startDate;
    /**
     * @SerializedName("ExpireDate")
     * @XmlAttribute
     * @Type("DateTime<'Y-m-d'>")
     * @var \DateTime
     */
    private $endDate;
    /**
     * @SerializedName("MinLOS")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $minLos;
    /**
     * @SerializedName("RateTimeUnit")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $timeUnit;
    /**
     * @SerializedName("UnitMultiplier")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $unitMultiplier;

    /**
     * @SerializedName("Base")
     * @Type("C2is\OTA\Model\HotelAvail\Response\Base")
     * @var \C2is\OTA\Model\HotelAvail\Response\Base
     */
    private $base;

    /**
     * @SerializedName("RateDescription")
     * @XmlList(inline=false, entry="Text")
     * @Type("array<C2is\OTA\Model\HotelAvail\Response\Text>")
     * @var array
     */
    private $description = array();

    /**
     * @SerializedName("Extensions")
     * @Type("C2is\OTA\Model\HotelAvail\Response\RateExtension")
     * @var \C2is\OTA\Model\HotelAvail\Response\RateExtension
     */
    private $extensions;

    /**
     * @param int $ageCode
     */
    public function setAgeCode($ageCode)
    {
        $this->ageCode = $ageCode;
    }

    /**
     * @return int
     */
    public function getAgeCode()
    {
        return $this->ageCode;
    }

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param string $timeUnit
     */
    public function setTimeUnit($timeUnit)
    {
        $this->timeUnit = $timeUnit;
    }

    /**
     * @return string
     */
    public function getTimeUnit()
    {
        return $this->timeUnit;
    }

    /**
     * @param int $unitMultiplier
     */
    public function setUnitMultiplier($unitMultiplier)
    {
        $this->unitMultiplier = $unitMultiplier;
    }

    /**
     * @return int
     */
    public function getUnitMultiplier()
    {
        return $this->unitMultiplier;
    }

    /**
     * @param int $minLos
     */
    public function setMinLos($minLos)
    {
        $this->minLos = $minLos;
    }

    /**
     * @return int
     */
    public function getMinLos()
    {
        return $this->minLos;
    }

    /**
     * @param \C2is\OTA\Model\HotelAvail\Response\Base $base
     */
    public function setBase($base)
    {
        $this->base = $base;
    }

    /**
     * @return \C2is\OTA\Model\HotelAvail\Response\Base
     */
    public function getBase()
    {
        return $this->base;
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

    /**
     * @param \C2is\OTA\Model\HotelAvail\Response\RateExtension $extensions
     */
    public function setExtensions($extensions)
    {
        $this->extensions = $extensions;
    }

    /**
     * @return \C2is\OTA\Model\HotelAvail\Response\RateExtension
     */
    public function getExtensions()
    {
        return $this->extensions;
    }
}
