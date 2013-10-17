<?php

namespace C2is\OTA\Model\HotelAvail;

/**
 * Data class used to hold a room rate data.
 *
 * Class RoomRateData
 * @package C2is\Bundle\OtaBundle\Model\HotelAvail
 */
class RoomRateData
{
    /**
     * @var string The room rate plan code.
     */
    public $planCode;

    /**
     * @var string The room rate plan category.
     */
    public $planCategory;

    /**
     * @var DateTime The room rate start date.
     */
    public $effectiveDate;

    /**
     * @var DateTime The room rate end date.
     */
    public $expireDate;

    /**
     * @var integer How many of this room rate are included in the stay.
     */
    public $numberOfUnits;

    /**
     * @var array The localized labels for the room rate description.
     */
    public $description = array();

    /**
     * @var array The list of rates for this room.
     */
    public $rates = array();

    /**
     * @return array The total amount of this room's stay. The array contains both before tax and after tax values.
     */
    public function getTotalAmount()
    {
        $total = array(
            'before_tax' => 0,
            'after_tax' => 0,
            'currency' => 'EUR',
        );

        foreach ($this->rates as $rate) {
            $total['before_tax']    += $rate->amountBeforeTax;
            $total['after_tax']     += $rate->amountAfterTax;
            $total['currency']       = $rate->currencyCode;
        }

        return $total;
    }
}
