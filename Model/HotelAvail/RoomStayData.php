<?php

namespace C2is\OTA\Model\HotelAvail;

use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Data class used to hold a room stay data.
 *
 * Class RoomStayData
 * @package C2is\Bundle\OtaBundle\Model\HotelAvail
 */
class RoomStayData
{
    /**
     * @var string The chain code.
     */
    public $chainCode;

    /**
     * @var string The hotel code.
     */
    public $hotelCode;

    /**
     * @var array The list of room types for this stay.
     */
    public $roomTypes = array();

    /**
     * @var array The list of room rates for this stay.
     */
    public $roomRates = array();

    /**
     * @var boolean Whether the guest count is per room or not.
     */
    public $guestCountPerRoom;

    /**
     * @var array The list of guests for this stay.
     */
    public $guestCounts = array();

    /**
     * @var DateTime The start date for this stay.
     */
    public $timeStart;

    /**
     * @var DateTime The end date for this stay.
     */
    public $timeEnd;

    /**
     * @var double Total price for the stay before taxes.
     */
    public $totalBeforeTax;

    /**
     * @var double Total price for the stay after taxes.
     */
    public $totalAfterTax;

    /**
     * @var string Currency used in the pricing for this stay.
     */
    public $currencyCode;

    /**
     * @var double Total amount of taxes for this stay.
     */
    public $taxesAmount;

    /**
     * @var string Currency used in the taxes amount for this stay.
     */
    public $taxesCurrencyCode;

    /**
     * @var array The list of taxes that apply for this stay.
     */
    public $taxes = array();

    /**
     * @var array The list of services proposed for this stay.
     */
    public $services = array();

    /**
     * @var array The room occupancy.
     */
    public $occupancy;
}
