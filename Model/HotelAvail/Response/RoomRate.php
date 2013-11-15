<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class RoomRate
{
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
     * @SerializedName("NumberOfUnits")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $numberOfUnits;
    /**
     * @SerializedName("RatePlanCategory")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $planCategory;
    /**
     * @SerializedName("RatePlanCode")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $planCode;

    /**
     * @SerializedName("Rates")
     * @XmlList(inline=false, entry="Rate")
     * @Type("array<C2is\OTA\Model\HotelAvail\Response\Rate>")
     * @var array
     */
    private $rates = array();

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
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

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param int $numberOfUnits
     */
    public function setNumberOfUnits($numberOfUnits)
    {
        $this->numberOfUnits = $numberOfUnits;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumberOfUnits()
    {
        return $this->numberOfUnits;
    }

    /**
     * @param string $planCategory
     */
    public function setPlanCategory($planCategory)
    {
        $this->planCategory = $planCategory;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlanCategory()
    {
        return $this->planCategory;
    }

    /**
     * @param string $planCode
     */
    public function setPlanCode($planCode)
    {
        $this->planCode = $planCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlanCode()
    {
        return $this->planCode;
    }

    /**
     * @param array $rates
     */
    public function setRates($rates)
    {
        $this->rates = $rates;

        return $this;
    }

    /**
     * @param array $rate
     */
    public function addRate(Rate $rate)
    {
        $this->rates[] = $rate;

        return $this;
    }

    /**
     * @return array
     */
    public function getRates()
    {
        return $this->rates;
    }
}
