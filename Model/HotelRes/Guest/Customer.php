<?php

namespace C2is\OTA\Model\HotelRes\Guest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

class Customer
{
    /**
     * @SerializedName("CurrencyCode")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $currency;

    /**
     * @SerializedName("Gender")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $gender;

    /**
     * @SerializedName("PersonName")
     * @Type("C2is\OTA\Model\HotelRes\Guest\PersonName")
     * @var PersonName
     */
    private $personName;

    /**
     * @SerializedName("Telephone")
     * @Type("C2is\OTA\Model\HotelRes\Guest\Telephone")
     * @var Telephone
     */
    private $telephone;

    /**
     * @SerializedName("Email")
     * @Type("string")
     * @var string
     */
    private $email;

    /**
     * @SerializedName("Address")
     * @Type("C2is\OTA\Model\HotelRes\Guest\Address")
     * @var Address
     */
    private $address;

    /**
     * @SerializedName("CustLoyalty")
     * @Type("C2is\OTA\Model\HotelRes\Guest\Loyalty")
     * @var Loyalty
     */
    private $loyalty;

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param \C2is\OTA\Model\HotelRes\Guest\PersonName $personName
     */
    public function setPersonName($personName)
    {
        $this->personName = $personName;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\Guest\PersonName
     */
    public function getPersonName()
    {
        return $this->personName;
    }

    /**
     * @param \C2is\OTA\Model\HotelRes\Guest\Telephone $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\Guest\Telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param \C2is\OTA\Model\HotelRes\Guest\Address $address
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\Guest\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param \C2is\OTA\Model\HotelRes\Guest\Loyalty $loyalty
     */
    public function setLoyalty($loyalty)
    {
        $this->loyalty = $loyalty;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\Guest\Loyalty
     */
    public function getLoyalty()
    {
        return $this->loyalty;
    }
}
