<?php

namespace C2is\OTA\Model\HotelSearch;

/**
 * Data class used to hold data for a rate range.
 *
 * Class RateRangeData
 * @package C2is\Bundle\OtaBundle\Model\HotelSearch
 */
class RateRangeData
{
    /**
     * @var string The currency code.
     */
    public $currencyCode;

    /**
     * @var string The maximum rate.
     */
    public $maxRate;

    /**
     * @var string The minimum rate.
     */
    public $minRate;

    /**
     * @var RoomType The min rate room type.
     */
    public $roomTypeMin;

    /**
     * @var RoomType The max rate room type.
     */
    public $roomTypeMax;
}