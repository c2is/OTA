<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class RateExtension
{
    /**
     * @SerializedName("BookingCancelPolicyRPH")
     * @Type("C2is\OTA\Model\HotelAvail\Response\BookingCancelPolicyRph")
     * @var \C2is\OTA\Model\HotelAvail\Response\Rate\BookingCancelPolicyRph
     */
    private $bookingCancelPolicyRPH;

    /**
     * @SerializedName("LastMinute")
     * @Type("C2is\OTA\Model\HotelAvail\Response\LastMinute")
     * @var \C2is\OTA\Model\HotelAvail\Response\Rate\LastMinute
     */
    private $lastMinute;

    /**
     * @SerializedName("EarlyBooking")
     * @Type("C2is\OTA\Model\HotelAvail\Response\EarlyBooking")
     * @var \C2is\OTA\Model\HotelAvail\Response\Rate\EarlyBooking
     */
    private $earlyBooking;

    /**
     * @SerializedName("Promotion")
     * @Type("string")
     * @var string
     */
    private $promotion;

    /**
     * @SerializedName("Special")
     * @Type("string")
     * @var string
     */
    private $special;

    /**
     * @SerializedName("FixAmountPricingType")
     * @Type("C2is\OTA\Model\HotelAvail\Response\Rate\FixAmountPricingType")
     * @var \C2is\OTA\Model\HotelAvail\Response\Rate\FixAmountPricingType
     */
    private $fixAmountPricingType;

    /**
     * @SerializedName("FixPercentagePricingType")
     * @Type("C2is\OTA\Model\HotelAvail\Response\Rate\FixPercentagePricingType")
     * @var \C2is\OTA\Model\HotelAvail\Response\Rate\FixPercentagePricingType
     */
    private $fixPercentagePricingType;

    /**
     * @SerializedName("FreeNight")
     * @Type("C2is\OTA\Model\HotelAvail\Response\Rate\FreeNight")
     * @var \C2is\OTA\Model\HotelAvail\Response\Rate\FreeNight
     */
    private $freeNight;

    /**
     * @param \C2is\OTA\Model\HotelAvail\Response\Rate\BookingCancelPolicyRph $bookingCancelPolicyRPH
     */
    public function setBookingCancelPolicyRPH($bookingCancelPolicyRPH)
    {
        $this->bookingCancelPolicyRPH = $bookingCancelPolicyRPH;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelAvail\Response\Rate\BookingCancelPolicyRph
     */
    public function getBookingCancelPolicyRPH()
    {
        return $this->bookingCancelPolicyRPH;
    }

    /**
     * @param \C2is\OTA\Model\HotelAvail\Response\Rate\LastMinute $lastMinute
     */
    public function setLastMinute($lastMinute)
    {
        $this->lastMinute = $lastMinute;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelAvail\Response\Rate\LastMinute
     */
    public function getLastMinute()
    {
        return $this->lastMinute;
    }

    /**
     * @param \C2is\OTA\Model\HotelAvail\Response\Rate\EarlyBooking $earlyBooking
     */
    public function setEarlyBooking($earlyBooking)
    {
        $this->earlyBooking = $earlyBooking;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelAvail\Response\Rate\EarlyBooking
     */
    public function getEarlyBooking()
    {
        return $this->earlyBooking;
    }

    /**
     * @param string $promotion
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * @return string
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * @param string $special
     */
    public function setSpecial($special)
    {
        $this->special = $special;

        return $this;
    }

    /**
     * @return string
     */
    public function getSpecial()
    {
        return $this->special;
    }

    /**
     * @param \C2is\OTA\Model\HotelAvail\Response\Rate\FixAmountPricingType $fixAmountPricingType
     */
    public function setFixAmountPricingType($fixAmountPricingType)
    {
        $this->fixAmountPricingType = $fixAmountPricingType;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelAvail\Response\Rate\FixAmountPricingType
     */
    public function getFixAmountPricingType()
    {
        return $this->fixAmountPricingType;
    }

    /**
     * @param \C2is\OTA\Model\HotelAvail\Response\Rate\FixPercentagePricingType $fixPercentagePricingType
     */
    public function setFixPercentagePricingType($fixPercentagePricingType)
    {
        $this->fixPercentagePricingType = $fixPercentagePricingType;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelAvail\Response\Rate\FixPercentagePricingType
     */
    public function getFixPercentagePricingType()
    {
        return $this->fixPercentagePricingType;
    }

    /**
     * @param \C2is\OTA\Model\HotelAvail\Response\Rate\FreeNight $freeNight
     */
    public function setFreeNight($freeNight)
    {
        $this->freeNight = $freeNight;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelAvail\Response\Rate\FreeNight
     */
    public function getFreeNight()
    {
        return $this->freeNight;
    }
}
