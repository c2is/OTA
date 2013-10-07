<?php

namespace C2is\OTA\Model\HotelAvail;

class ServiceData
{
    /**
     * @var boolean Whether the service is included in the room price.
     */
    public $inclusive;

    /**
     * @var string The service type.
     */
    public $type;

    /**
     * @var boolean Whether the service is required or not.
     */
    public $mandatory;

    /**
     * @var string The number of services requested.
     */
    public $quantity;

    /**
     * @var boolean Whether the customer can choose the number of nights for which this service is requested.
     */
    public $nightRequested;

    /**
     * @var boolean Whether the number of guests eligible for this service can be chosen by the customer
     */
    public $guestsRequested;

    /**
     * @var string The service identifier.
     */
    public $inventoryCode;

    /**
     * @var string The service pricing type.
     */
    public $pricingType;

    /**
     * If the price is not by person then this value should be set to "1".
     *
     * @var int the number of persons eligible for this service.
     */
    public $numberOfUnits;

    /**
     * @var double A unit price before taxes.
     */
    public $amountBeforeTax;

    /**
     * @var double A unit price after taxes.
     */
    public $amountAfterTax;

    /**
     * @var string The price currency.
     */
    public $currencyCode;

    /**
     * @var double Amount only payable on spot.
     */
    public $amountOnSpot;

    /**
     * @var array The localized labels for the service description.
     */
    public $description = array();

    /**
     * @var boolean Whether the service is available to adults.
     */
    public $adult;

    /**
     * @var boolean Whether the service is available to childs.
     */
    public $child;

    /**
     * @var boolean Whether the service is available to infants.
     */
    public $infant;

    /**
     * @var boolean Whether the service is available to juniors.
     */
    public $junior;

    /**
     * @var boolean Whether the service is available to serniors.
     */
    public $senior;

    /**
     * @var boolean Whether the service price depends on the number of nights requested.
     */
    public $pricePerNight;

    /**
     * @var boolean Whether the service price depends on the number of guests.
     */
    public $pricePerPax;

    /**
     * @var int The minimum number of guests required to make the service available.
     */
    public $minPax;
}
