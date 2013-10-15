<?php

namespace C2is\OTA\Model\HotelAvail;

/**
 * Data class used to hold a room type data.
 *
 * Class RoomTypeData
 * @package C2is\Bundle\OtaBundle\Model\HotelAvail
 */
class RoomTypeData
{
    /**
     * @var string The room type code.
     */
    public $code;

    /**
     * @var array The localized labels for the room type description.
     */
    public $description = array();

    /**
     * @var array The list of additional details for this room type
     */
    public $details = array();
}
