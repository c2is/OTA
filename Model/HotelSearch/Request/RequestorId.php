<?php

namespace C2is\OTA\Model\HotelSearch\Request;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;

class RequestorId
{
    /**
     * @SerializedName("ID")
     * @XmlAttribute
     * @Type("integer")
     */
    private $id = 0;

    /**
     * @SerializedName("Type")
     * @XmlAttribute
     * @Type("integer")
     */
    private $type = 2;

    /**
     * @SerializedName("CompanyName")
     * @Type("string")
     */
    private $companyName;

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $type
     * @return $this
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
     * @param $companyName
     * @return $this
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }
}
