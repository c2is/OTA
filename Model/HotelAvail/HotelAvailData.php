<?php

namespace C2is\OTA\Model\HotelAvail;

/**
 * Data class used to hold the results of an HotelAvail request.
 *
 * Class HotelAvailData
 * @package C2is\Bundle\OtaBundle\Model\HotelAvail
 */
class HotelAvailData
{
    /**
     * @var array The list of room stays.
     */
    public $stays = array();

    /**
     * @var array The list of cancel policies for the rooms listed in this response.
     */
    public $cancelPolicies = array();
}
