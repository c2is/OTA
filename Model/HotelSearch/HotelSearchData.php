<?php

namespace C2is\OTA\Model\HotelSearch;

/**
 * Data class used to hold the results of an HotelSearch request.
 *
 * Class HotelSearchData
 * @package C2is\Bundle\OtaBundle\Model\HotelSearch
 */
class HotelSearchData
{
    /**
     * @var string The chain code
     */
    public $chainCode;

    /**
     * @var string The hotel code
     */
    public $hotelCode;

    /**
     * @var RateRange The rate range
     */
    public $rateRange;
}
