<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class Address
{
    /**
     * @SerializedName("CityName")
     * @Type("string")
     */
    private $cityName;

    /**
     * @SerializedName("CountryName")
     * @Type("string")
     */
    private $countryName;

    /**
     * @param $cityName
     * @return $this
     */
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * @param $countryName
     * @return $this
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountryName()
    {
        return $this->countryName;
    }
}
