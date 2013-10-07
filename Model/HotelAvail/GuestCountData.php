<?php

namespace C2is\OTA\Model\HotelAvail;

class GuestCountData
{
    /**
     * @var int Age code (see constats in \C2is\OTA\Container).
     */
    public $ageQualifyingCode;

    /**
     * @var int Number of persons for this age code.
     */
    public $count;

    /**
     * @var int Age of the guest to be used if the age qualifying code is not specified.
     */
    public $age;
}