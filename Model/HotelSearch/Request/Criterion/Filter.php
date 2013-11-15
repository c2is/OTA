<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlAttribute;

class Filter
{
    /**
     * @SerializedName("bpromo")
     * @XmlAttribute
     * @Type("boolean")
     */
    private $promo;

    /**
     * @SerializedName("bpackage")
     * @XmlAttribute
     * @Type("boolean")
     */
    private $package;

    /**
     * @SerializedName("RateRangeReq")
     * @XmlAttribute
     * @Type("boolean")
     */
    private $rateRangeReq;

    /**
     * @SerializedName("RateRangeNameReq")
     * @XmlAttribute
     * @Type("boolean")
     */
    private $rateRangeNameReq;

    /**
     * @SerializedName("bstay")
     * @XmlAttribute
     * @Type("boolean")
     */
    private $stay;

    /**
     * @param $promo
     * @return $this
     */
    public function setPromo($promo)
    {
        $this->promo = $promo;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getPromo()
    {
        return $this->promo;
    }

    /**
     * @param $package
     * @return $this
     */
    public function setPackage($package)
    {
        $this->package = $package;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * @param $rateRangeReq
     * @return $this
     */
    public function setRateRangeReq($rateRangeReq)
    {
        $this->rateRangeReq = $rateRangeReq;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getRateRangeReq()
    {
        return $this->rateRangeReq;
    }

    /**
     * @param $rateRangeNameReq
     * @return $this
     */
    public function setRateRangeNameReq($rateRangeNameReq)
    {
        $this->rateRangeNameReq = $rateRangeNameReq;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getRateRangeNameReq()
    {
        return $this->rateRangeNameReq;
    }

    /**
     * @param $stay
     * @return $this
     */
    public function setStay($stay)
    {
        $this->stay = $stay;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getStay()
    {
        return $this->stay;
    }
}
