<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class GuestCount
 * @package C2is\OTA\Model\HotelAvail\Response
 * @AccessType("public_method")
 */
class GuestCount
{
    /**
     * @SerializedName("AgeQualifyingCode")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $ageCode;

    /**
     * @SerializedName("Count")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $count;

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
     * @param int $count
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }
}
