<?php

namespace C2is\OTA\Model\HotelAvail\Request;

use JMS\Serializer\Annotation as DI;

class DiscountCodes
{
    /**
     * @DI\XmlAttribute
     * @DI\SerializedName("discountCode")
     * @DI\Type("string")
     * @var string
     */
    private $code;

    /**
     * @DI\XmlAttribute
     * @DI\SerializedName("bExclusif")
     * @DI\Type("string")
     * @DI\Accessor(getter="getExclusiveString",setter="setExclusiveString")
     * @var boolean
     */
    private $exclusive;

    /**
     * @param string $code
     * @return $this
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
     * @param boolean $exclusive
     * @return $this
     */
    public function setExclusive($exclusive)
    {
        $this->exclusive = $exclusive;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getExclusive()
    {
        return $this->exclusive;
    }

    /**
     * @param string $exclusive
     * @return $this
     */
    public function setExclusiveString($exclusive)
    {
        $this->exclusive = ($exclusive === 'true');

        return $this;
    }

    /**
     * @return string
     */
    public function getExclusiveString()
    {
        return $this->exclusive ? 'true' : 'false';
    }
}
