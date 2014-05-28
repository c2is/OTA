<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation as DI;

/**
 * Class SpecialRateInfo
 * @package C2is\OTA\Model\HotelAvail\Response
 * @DI\AccessType("public_method")
 */
class SpecialRateInfo
{
    /**
     * @DI\SerializedName("bDisplayRack")
     * @DI\Type("boolean")
     * @var boolean
     */
    private $displayRack;

    /**
     * @param boolean $displayRack
     * @return $this
     */
    public function setDisplayRack($displayRack)
    {
        $this->displayRack = $displayRack;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getDisplayRack()
    {
        return $this->displayRack;
    }
}
