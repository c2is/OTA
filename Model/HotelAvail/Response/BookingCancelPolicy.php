<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class BookingCancelPolicy
 * @package C2is\OTA\Model\HotelAvail\Response
 * @AccessType("public_method")
 */
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
        $indexedBookingPolicies = array();
        foreach ($bookingPolicy as $text) {
            $indexedBookingPolicies[$text->getLang()] = $text;
        }

        $this->bookingPolicy = $indexedBookingPolicies;

        return $this;
    }

    /**
     * @param Text $bookingPolicy
     */
    public function addBookingPolicy(Text $text)
    {
        $this->bookingPolicy[$text->getLang()] = $text;

        return $this;
    }

    /**
     * @return array
     */
    public function getBookingPolicy()
    {
        return $this->bookingPolicy;
    }

    public function getBookingPolicyForLocale($locale)
    {
        $defaultValue = '';

        foreach ($this->bookingPolicy as $bookingPolicy) {
            if ($bookingPolicy->getLang() == $locale) {
                return $bookingPolicy->getValue();
            }
            if ($bookingPolicy->getLang() == 'EN') {
                $defaultValue = $bookingPolicy->getValue();
            }
        }

        return $defaultValue;
    }

    /**
     * @param array $cancelPolicy
     */
    public function setCancelPolicy($cancelPolicy)
    {
        $indexedCancelPolicies = array();
        foreach ($cancelPolicy as $text) {
            $indexedCancelPolicies[$text->getLang()] = $text;
        }

        $this->cancelPolicy = $indexedCancelPolicies;

        return $this;
    }

    /**
     * @param Text $bookingPolicy
     */
    public function addCancelPolicy(Text $text)
    {
        $this->cancelPolicy[$text->getLang()] = $text;

        return $this;
    }

    /**
     * @return array
     */
    public function getCancelPolicy()
    {
        return $this->cancelPolicy;
    }

    public function getCancelPolicyForLocale($locale)
    {
        $defaultValue = '';

        foreach ($this->cancelPolicy as $cancelPolicy) {
            if ($cancelPolicy->getLang() == $locale) {
                return $cancelPolicy->getValue();
            }
            if ($cancelPolicy->getLang() == 'EN') {
                $defaultValue = $cancelPolicy->getValue();
            }
        }

        return $defaultValue;
    }
}
