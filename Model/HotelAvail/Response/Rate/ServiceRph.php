<?php

namespace C2is\OTA\Model\HotelAvail\Response\Rate;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class ServiceRph
 * @package C2is\OTA\Model\HotelAvail\Response\Rate
 * @AccessType("public_method")
 */
class ServiceRph
{
    /**
     * @SerializedName("RPH")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $rph;

    /**
     * @param $rph
     * @return $this
     */
    public function setRph($rph)
    {
        $this->rph = $rph;

        return $this;
    }

    /**
     * @return int
     */
    public function getRph()
    {
        return $this->rph;
    }
}
