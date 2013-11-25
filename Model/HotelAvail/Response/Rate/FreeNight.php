<?php

namespace C2is\OTA\Model\HotelAvail\Response\Rate;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class FreeNight
 * @package C2is\OTA\Model\HotelAvail\Response\Rate
 * @AccessType("public_method")
 */
class FreeNight
{
    const RATE_FREE_NIGHT_APPLICATION_ONE = 'OneTime';

    const RATE_FREE_NIGHT_APPLICATION_MANY = 'AsMuchAsPossible';

    /**
     * @SerializedName("NbFreeNights")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $nbFreeNights;

    /**
     * @SerializedName("NbMinNights")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $nbMinNights;

    /**
     * @SerializedName("FreeNightsType")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $type;

    /**
     * @SerializedName("Application")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $application;

    /**
     * @SerializedName("FreePercent")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $percent;

    /**
     * @param int $nbFreeNights
     */
    public function setNbFreeNights($nbFreeNights)
    {
        $this->nbFreeNights = $nbFreeNights;

        return $this;
    }

    /**
     * @return int
     */
    public function getNbFreeNights()
    {
        return $this->nbFreeNights;
    }

    /**
     * @param int $nbMinNights
     */
    public function setNbMinNights($nbMinNights)
    {
        $this->nbMinNights = $nbMinNights;

        return $this;
    }

    /**
     * @return int
     */
    public function getNbMinNights()
    {
        return $this->nbMinNights;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $application
     */
    public function setApplication($application)
    {
        $this->application = $application;

        return $this;
    }

    /**
     * @return string
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * @param string $percent
     */
    public function setPercent($percent)
    {
        $this->percent = $percent;

        return $this;
    }

    /**
     * @return string
     */
    public function getPercent()
    {
        return $this->percent;
    }
}
