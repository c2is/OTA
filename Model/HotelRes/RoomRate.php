<?php

namespace C2is\OTA\Model\HotelRes;

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
     * @SerializedName("RatePlanCode")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $code;

    /**
     * @SerializedName("NumberOfUnits")
     * @XmlAttribute
     * @Type("integer")
     * @var int
     */
    private $numberOfUnits;

    /**
     * @SerializedName("RatePlanCategory")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $category;

    /**
     * @SerializedName("Rates")
     * @XmlList(inline=false, entry="Rate")
     * @Type("array<C2is\OTA\Model\HotelRes\Rate>")
     * @var array
     */
    private $rates;

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate($startDate)
    {
        if (!$startDate instanceof \DateTime) {
            $startDate = new \DateTime($startDate);
        }

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
        if (!$endDate instanceof \DateTime) {
            $endDate = new \DateTime($endDate);
        }

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
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $numberOfUnits
     */
    public function setNumberOfUnits($numberOfUnits)
    {
        $this->numberOfUnits = $numberOfUnits;
    }

    /**
     * @return int
     */
    public function getNumberOfUnits()
    {
        return $this->numberOfUnits;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    public function setRates($rates)
    {
        $this->rates = $rates;

        return $this;
    }

    public function addRate(Rate $rate)
    {
        $this->rates[] = $rate;

        return $this;
    }

    public function getRates()
    {
        return $this->rates;
    }
}
