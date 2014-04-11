<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class RoomRate
 * @package C2is\OTA\Model\HotelAvail\Response
 * @AccessType("public_method")
 */
class RoomRate
{
    /**
     * @SerializedName("EffectiveDate")
     * @XmlAttribute
     * @Type("string")
     * @var \DateTime
     */
    private $startDate;
    /**
     * @SerializedName("ExpireDate")
     * @XmlAttribute
     * @Type("string")
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
     * @SerializedName("RoomRateDescription")
     * @XmlList(inline=false, entry="Text")
     * @Type("array<C2is\OTA\Model\Common\Text>")
     * @var array
     */
    private $description = array();

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
        return $this->startDate instanceof \DateTime ? $this->startDate->format('Y-m-d') : $this->startDate;
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
        return $this->endDate instanceof \DateTime ? $this->endDate->format('Y-m-d') : $this->endDate;
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

    /**
     * @param array $description
     */
    public function setDescription($description)
    {
        $indexedDescription = array();
        foreach ($description as $text) {
            $indexedDescription[$text->getLang()] = $text;
        }

        $this->description = $indexedDescription;

        return $this;
    }

    /**
     * @param Text $text
     */
    public function addDescription(Text $text)
    {
        $this->description[$text->getLang()] = $text;

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
     * @return array The total amount of this room's stay. The array contains both before tax and after tax values.
     */
    public function getTotalAmount()
    {
        $total = array(
            'before_tax' => 0,
            'after_tax' => 0,
            'currency' => 'EUR',
        );

        foreach ($this->getRates() as $rate) {
            $base = $rate->getBase();
            $total['before_tax']    += ($base->getBeforeTax() * $rate->getUnitMultiplier());
            $total['after_tax']     += ($base->getAfterTax()  * $rate->getUnitMultiplier());
            $total['currency']       = $base->getCurrency();
        }

        return $total;
    }

    public function getDescriptionForLocale($locale)
    {
        $defaultValue = '';

        foreach ($this->description as $text) {
            if ($text->getLang() == $locale) {
                return $text->getValue();
            }
            if ($text->getLang() == 'EN') {
                $defaultValue = $text->getValue();
            }
        }

        return $defaultValue;
    }

    public function getMinStayLength()
    {
        $minStayLength = 0;

        /** @var Rate $rate */
        foreach ($this->rates as $rate) {
            if (($minLos = $rate->getMinLos()) > $minStayLength) {
                $minStayLength = $minLos;
            }
        }

        return $minStayLength;
    }

    public function getMaxStayLength()
    {
        $maxStayLength = 0;

        /** @var Rate $rate */
        foreach ($this->rates as $rate) {
            if (!$maxStayLength or ($rate->getMaxLos() < $maxStayLength)) {
                $maxStayLength = $rate->getMaxLos();
            }
        }

        return $maxStayLength;
    }
}
