<?php

namespace C2is\OTA\Model\HotelAvail;

class OccupancyData
{
    /**
     * @var Base room occupancy.
     */
    public $base = 1;

    /**
     * @var Number of children for which the stay is free.
     */
    public $freeChildren = 0;

    /**
     * @var Number of infants for which the stay is free.
     */
    public $freeInfants = 0;

    /**
     * @var Number of juniors for which the stay is free.
     */
    public $freeJuniors = 0;

    /**
     * @var Minimum number of occupants.
     */
    public $min;

    /**
     * @var Maximum number of occupants.
     */
    public $max;

    /**
     * @var Maximum number of adults.
     */
    public $maxAdults;

    /**
     * @var Maximum number of children.
     */
    public $maxChildren;

    /**
     * @var Maximum number of infants.
     */
    public $maxInfants;

    /**
     * @var Maximum number of juniors.
     */
    public $maxJuniors;

    /**
     * @var Maximum number of seniors.
     */
    public $maxSeniors;

    /**
     * @var List of guest counts.
     */
    public $guestCounts = array();
}
