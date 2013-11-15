<?php

namespace C2is\OTA\Model\HotelRes\Guest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class Address
{
    /**
     * @SerializedName("Code")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $code;

    /**
     * @SerializedName("AddressLine")
     * @Type("string")
     * @var string
     */
    private $line;

    /**
     * @SerializedName("CityName")
     * @Type("string")
     * @var string
     */
    private $city;

    /**
     * @SerializedName("PostalCode")
     * @Type("string")
     * @var string
     */
    private $postalCode;

    /**
     * @SerializedName("CountryName")
     * @Type("C2is\OTA\Model\HotelRes\Guest\Country")
     * @var Country
     */
    private $country;

    public function __construct()
    {
        $this->country = new Country();
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $line
     */
    public function setLine($line)
    {
        $this->line = $line;

        return $this;
    }

    /**
     * @return string
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param Country $country
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $code
     */
    public function setCountryCode($code)
    {
        $this->country->setCode($code);
    }

    /**
     * @param string $name
     */
    public function setCountryName($name)
    {
        $this->country->setName($name);
    }
}
