<?php

namespace C2is\Bundle\OtaBundle\Model\HotelAvail;

/**
 * Data class used to hold a rate data.
 *
 * Class RateData
 * @package C2is\Bundle\OtaBundle\Model\HotelAvail
 */
class RateData
{
    /**
     * @var DateTime The room rate start date.
     */
    public $effectiveDate;

    /**
     * @var DateTime The room rate end date.
     */
    public $expireDate;

    /**
     * @var string The unit of time used to describe the length of stay in this room.
     */
    public $timeUnit;

    /**
     * @var int The length of stay in this room (depends on timeUnit).
     */
    public $unitMultiplier;

    /**
     * @var double Total price of this rate before taxes.
     */
    public $amountBeforeTax;

    /**
     * @var double Total price of this rate after taxes.
     */
    public $amountAfterTax;

    /**
     * @var string Currency used for this rate.
     */
    public $currencyCode;

    /**
     * @var boolean Whether this rate proposes a last minute offer.
     */
    public $isLastMinute;

    /**
     * If this rate proposes a last minute offer, number of days before the effectiveDate after which the offer is available.
     * For example, if this rate isLastMinute is set to true, and firstDay to 4, and the effectiveDate is 20/12/2013,
     * it means the PAX is eligible to the offer only if he completes the reservation after December the 16th.
     *
     * @var int Number of days before the effectiveDate before which the offer is available.
     */
    public $firstDay;

    /**
     * @var boolean Whether this rate proposes an early booking offer.
     */
    public $isEarlyBooking;

    /**
     * If this rate proposes an early booking offer, number of days before the effectiveDate before which the offer is available.
     * For example, if this rate isEarlyBooking is set to true, and lastDay to 14, and the effectiveDate is 20/12/2013,
     * it means the PAX is eligible to the offer only if he completes the reservation before December the 6th.
     *
     * @var int Number of days before the effectiveDate before which the offer is available.
     */
    public $lastDay;

    /**
     * @var string The promotion rate if applicable.
     */
    public $promotion;

    /**
     * @var string The special rate if applicable.
     */
    public $special;

    /**
     * @var boolean Whether the pricing for this rate is a fix amount.
     */
    public $hasFixAmountPricing;

    /**
     * @var double Price for this rate (if has a fix amount pricing).
     */
    public $fixAmount;

    /**
     * @var string Currency for this rate amount (if has a fix amount pricing).
     */
    public $fixAmountCurrency;

    /**
     * @var boolean Whether the pricing for this rate is a percentage.
     */
    public $hasFixPercentagePricing;

    /**
     * @var string Percentage for this rate if applicable.
     */
    public $fixPercentage;

    /**
     * @var boolean Whether this rate proposes free nights or not.
     */
    public $hasFreeNights;

    /**
     * @var int Maximum number of free nights this rate proposes.
     */
    public $nbFreeNights;

    /**
     * @var int Minimum amount of nights for this rate's free nights to apply.
     */
    public $nbMinNights;

    /**
     * @var string To specify what nights are free nights on the room stay. Possible values: “MostExpensive", “LessExpensive", “Time”.
     */
    public $freeNightsType;

    /**
     * @var string The application for free nights. Two possible values: "OneTime" and “AsMuchAsPossible”.

     */
    public $freeNightsApplication;

    /**
     * @var string The Percent reduction for free nights. 100% = free night
     */
    public $freeNightsPercentage;

    /**
     * @var boolean Whether this rate price depends on a specific price grid.
     */
    public $hasGridPricing;

    /**
     * @var The booking and cancel policies identifier.
     */
    public $cancelPolicyIdentifier;
}
