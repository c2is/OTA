<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class BookingCancelPolicy
{
    /**
     * @SerializedName("RPH")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $rph;

    /**
     * @SerializedName("CancellableBooking")
     * @XmlAttribute
     * @Type("boolean")
     * @var boolean
     */
    private $cancellable;

    /**
     * @SerializedName("EditableBooking")
     * @XmlAttribute
     * @Type("boolean")
     * @var boolean
     */
    private $editable;

    /**
     * @SerializedName("BookingPolicy")
     * @XmlList(inline=false, entry="Text")
     * @Type("array<C2is\OTA\Model\HotelAvail\Response\Text>")
     * @var array
     */
    private $bookingPolicy = array();

    /**
     * @SerializedName("CancelPolicy")
     * @XmlList(inline=false, entry="Text")
     * @Type("array<C2is\OTA\Model\HotelAvail\Response\Text>")
     * @var array
     */
    private $cancelPolicy = array();

    /**
     * @param int $rph
     */
    public function setRph($rph)
    {
        $this->rph = $rph;

        return $this;
    }

    /**
     * @return int
     */
    public function getRph()
    {
        return $this->rph;
    }

    /**
     * @param boolean $cancellable
     */
    public function setCancellable($cancellable)
    {
        $this->cancellable = $cancellable;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getCancellable()
    {
        return $this->cancellable;
    }

    /**
     * @param boolean $editable
     */
    public function setEditable($editable)
    {
        $this->editable = $editable;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getEditable()
    {
        return $this->editable;
    }

    /**
     * @param array $bookingPolicy
     */
    public function setBookingPolicy($bookingPolicy)
    {
        $this->bookingPolicy = $bookingPolicy;

        return $this;
    }

    /**
     * @param Text $bookingPolicy
     */
    public function addBookingPolicy(Text $text)
    {
        $this->bookingPolicy[] = $text;

        return $this;
    }

    /**
     * @return array
     */
    public function getBookingPolicy()
    {
        return $this->bookingPolicy;
    }

    /**
     * @param array $cancelPolicy
     */
    public function setCancelPolicy($cancelPolicy)
    {
        $this->cancelPolicy = $cancelPolicy;

        return $this;
    }

    /**
     * @param Text $bookingPolicy
     */
    public function addCancelPolicy(Text $text)
    {
        $this->cancelPolicy[] = $text;

        return $this;
    }

    /**
     * @return array
     */
    public function getCancelPolicy()
    {
        return $this->cancelPolicy;
    }
}
