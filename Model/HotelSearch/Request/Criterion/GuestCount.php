<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class GuestCount
{
    /**
     * @SerializedName("Age")
     * @XmlAttribute
     * @Type("integer")
     */
    private $age;

    /**
     * @SerializedName("AgeQualifyingCode")
     * @XmlAttribute
     * @Type("integer")
     */
    private $ageCode;

    /**
     * @SerializedName("Count")
     * @XmlAttribute
     * @Type("integer")
     */
    private $count;

    /**
     * @param $age
     * @return $this
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param $ageCode
     * @return $this
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
     * @param $count
     * @return $this
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
