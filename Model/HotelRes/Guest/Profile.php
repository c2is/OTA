<?php

namespace C2is\OTA\Model\HotelRes\Guest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class Profile
{
    /**
     * @SerializedName("ProfileType")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $type = 1;

    /**
     * @SerializedName("Customer")
     * @Type("C2is\OTA\Model\HotelRes\Guest\Customer")
     * @var Customer
     */
    private $customer;

    /**
     * @SerializedName("TPA_Extensions")
     * @Type("C2is\OTA\Model\HotelRes\Guest\Extensions")
     * @var Extensions
     */
    private $extensions;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
        $this->extensions = new Extensions();
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param \C2is\OTA\Model\HotelRes\Guest\Customer $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\Guest\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}
