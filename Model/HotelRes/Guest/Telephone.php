<?php

namespace C2is\OTA\Model\HotelRes\Guest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class Telephone
{
    /**
     * @SerializedName("CountryAccessCode")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $countryAccessCode;

    /**
     * @SerializedName("PhoneNumber")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $number;

    /**
     * @param string $countryAccessCode
     */
    public function setCountryAccessCode($countryAccessCode)
    {
        $this->countryAccessCode = $countryAccessCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountryAccessCode()
    {
        return $this->countryAccessCode;
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }
}
