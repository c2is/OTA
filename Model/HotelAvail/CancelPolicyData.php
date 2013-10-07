<?php

namespace C2is\OTA\Model\HotelAvail;

/**
 * Data class used to hold a cancel policy data.
 *
 * Class CancelPolicyData
 * @package C2is\Bundle\OtaBundle\Model\HotelAvail
 */
class CancelPolicyData
{
    /**
     * @var The booking and cancel policies identifier.
     */
    public $cancelPolicyIdentifier;

    /**
     * @var boolean Whether the booking can be canceled or not.
     */
    public $cancelableBooking;

    /**
     * @var boolean Whether the booking can be edited or not.
     */
    public $editableBooking;

    /**
     * @var array The localized labels for the booking policy.
     */
    public $bookingPolicy = array();

    /**
     * @var array The localized labels for the cancel policy.
     */
    public $cancelPolicy = array();
}
