<?php

namespace C2is\OTA\Model\Common;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;

class Pos
{
    /**
     * @SerializedName("Source")
     * @Type("C2is\OTA\Model\Common\Source")
     * @var Source
     */
    private $source;

    /**
     * @SerializedName("BookingChannel")
     * @Type("C2is\OTA\Model\Common\BookingChannel")
     * @var BookingChannel
     */
    private $bookingChannel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->source = new Source();
    }

    /**
     * @param Source $source
     * @return $this
     */
    public function setSource(Source $source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return Source
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param \C2is\OTA\Model\Common\BookingChannel $bookingChannel
     */
    public function setBookingChannel(BookingChannel $bookingChannel)
    {
        $this->bookingChannel = $bookingChannel;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\Common\BookingChannel
     */
    public function getBookingChannel()
    {
        return $this->bookingChannel;
    }
}
