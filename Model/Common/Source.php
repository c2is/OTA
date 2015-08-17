<?php

namespace C2is\OTA\Model\Common;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;

class Source
{
    /**
     * @SerializedName("RequestorID")
     * @Type("C2is\OTA\Model\Common\RequestorId")
     * @var RequestorId
     */
    private $requestorId;

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
        $this->requestorId = new RequestorId();
    }

    /**
     * @param RequestorId $requestorId
     * @return $this
     */
    public function setRequestorId(RequestorId $requestorId)
    {
        $this->requestorId = $requestorId;

        return $this;
    }

    /**
     * @return RequestorId
     */
    public function getRequestorId()
    {
        return $this->requestorId;
    }

    /**
     * @param \C2is\OTA\Model\Common\BookingChannel $bookingChannel
     *
     * @return $this
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
