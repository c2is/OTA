<?php

namespace C2is\OTA\Model\HotelAvail\Response\Rate;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class FixPercentagePricingType
{
    /**
     * @SerializedName("Percentage")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $percentage;

    /**
     * @param string $percentage
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * @return string
     */
    public function getPercentage()
    {
        return $this->percentage;
    }
}
