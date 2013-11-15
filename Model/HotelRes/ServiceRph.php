<?php

namespace C2is\OTA\Model\HotelRes;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

class ServiceRph
{
    /**
     * @SerializedName("IsPerRoom")
     * @XmlAttribute
     * @Type("boolean")
     * @var boolean
     */
    private $isPerRoom;

    /**
     * @SerializedName("RPH")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $rph;

    /**
     * @param boolean $isPerRoom
     */
    public function setIsPerRoom($isPerRoom)
    {
        $this->isPerRoom = $isPerRoom;
    }

    /**
     * @return boolean
     */
    public function getIsPerRoom()
    {
        return $this->isPerRoom;
    }

    /**
     * @param string $rph
     */
    public function setRph($rph)
    {
        $this->rph = $rph;
    }

    /**
     * @return string
     */
    public function getRph()
    {
        return $this->rph;
    }
}
