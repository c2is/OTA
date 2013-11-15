<?php

namespace C2is\OTA\Model\HotelRes\Guest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class PersonName
{
    /**
     * @SerializedName("NamePrefix")
     * @Type("string")
     * @var string
     */
    private $prefix;

    /**
     * @SerializedName("GivenName")
     * @Type("string")
     * @var string
     */
    private $givenName;

    /**
     * @SerializedName("Surname")
     * @Type("string")
     * @var string
     */
    private $surName;

    /**
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param string $givenName
     */
    public function setGivenName($givenName)
    {
        $this->givenName = $givenName;

        return $this;
    }

    /**
     * @return string
     */
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * @param string $surName
     */
    public function setSurName($surName)
    {
        $this->surName = $surName;

        return $this;
    }

    /**
     * @return string
     */
    public function getSurName()
    {
        return $this->surName;
    }
}
