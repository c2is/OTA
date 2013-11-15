<?php

namespace C2is\OTA\Model\HotelRes;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class Rate
{
    /**
     * @SerializedName("EffectiveDate")
     * @XmlAttribute
     * @Type("DateTime<'Y-m-d'>")
     * @var \Datetime
     */
    private $effectiveDate;

    /**
     * @SerializedName("ExpireDate")
     * @XmlAttribute
     * @Type("DateTime<'Y-m-d'>")
     * @var \Datetime
     */
    private $expireDate;

    /**
     * @SerializedName("AgeQualifyingCode")
     * @XmlAttribute
     * @Type("integer")
     * @var int
     */
    private $ageCode = 0;

    /**
     * @SerializedName("Base")
     * @Type("C2is\OTA\Model\HotelRes\Base")
     * @var Base
     */
    private $base;

    /**
     * @param \Datetime $effectiveDate
     */
    public function setEffectiveDate($effectiveDate)
    {
        if (!$effectiveDate instanceof \DateTime) {
            $effectiveDate = new \DateTime($effectiveDate);
        }
        $this->effectiveDate = $effectiveDate;

        return $this;
    }

    /**
     * @return \Datetime
     */
    public function getEffectiveDate()
    {
        return $this->effectiveDate;
    }

    /**
     * @param \Datetime $expireDate
     */
    public function setExpireDate($expireDate)
    {
        if (!$expireDate instanceof \DateTime) {
            $expireDate = new \DateTime($expireDate);
        }
        $this->expireDate = $expireDate;

        return $this;
    }

    /**
     * @return \Datetime
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * @param int $ageCode
     */
    public function setAgeCode($ageCode)
    {
        $this->ageCode = $ageCode;

        return $this;
    }

    /**
     * @return int
     */
    public function getAgeCode()
    {
        return $this->ageCode;
    }

    /**
     * @param \C2is\OTA\Model\HotelRes\Base $base
     */
    public function setBase($base)
    {
        $this->base = $base;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\Base
     */
    public function getBase()
    {
        return $this->base;
    }
}
