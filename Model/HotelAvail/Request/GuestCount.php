<?php

namespace C2is\OTA\Model\HotelAvail\Request;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class GuestCount
{
    /**
     * @SerializedName("Count")
     * @XmlAttribute
     * @Type("integer")
     */
    private $count;

    /**
     * @SerializedName("AgeQualifyingCode")
     * @XmlAttribute
     * @Type("integer")
     */
    private $ageCode;

    /**
     * @SerializedName("Age")
     * @XmlAttribute
     * @Type("integer")
     */
    private $age;

    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAgeCode($ageCode)
    {
        $this->ageCode = $ageCode;

        return $this;
    }

    public function getAgeCode()
    {
        return $this->ageCode;
    }

    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    public function getCount()
    {
        return $this->count;
    }
}
