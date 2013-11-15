<?php

namespace C2is\OTA\Model\HotelSearch\Request\Criterion;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class HotelRef
{
    /**
     * @SerializedName("ChainCode")
     * @XmlAttribute
     * @Type("integer")
     */
    private $chainCode;

    /**
     * @SerializedName("AreaID")
     * @XmlAttribute
     * @Type("string")
     */
    private $area;

    /**
     * @SerializedName("HotelName")
     * @XmlAttribute
     * @Type("string")
     */
    private $hotelName;

    /**
     * @SerializedName("HotelCode")
     * @XmlAttribute
     * @Type("string")
     */
    private $hotelCode;

    /**
     * @SerializedName("BrandName")
     * @XmlAttribute
     * @Type("string")
     */
    private $brandName;

    /**
     * @SerializedName("BrandCode")
     * @XmlAttribute
     * @Type("string")
     */
    private $brandCode;

    /**
     * @param $chainCode
     * @return $this
     */
    public function setChainCode($chainCode)
    {
        $this->chainCode = $chainCode;

        return $this;
    }

    /**
     * @return int
     */
    public function getChainCode()
    {
        return $this->chainCode;
    }

    /**
     * @param $area
     * @return $this
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param $hotelName
     * @return $this
     */
    public function setHotelName($hotelName)
    {
        $this->hotelName = $hotelName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHotelName()
    {
        return $this->hotelName;
    }

    /**
     * @param $hotelCode
     * @return $this
     */
    public function setHotelCode($hotelCode)
    {
        $this->hotelCode = $hotelCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHotelCode()
    {
        return $this->hotelCode;
    }

    /**
     * @param $brandName
     * @return $this
     */
    public function setBrandName($brandName)
    {
        $this->brandName = $brandName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBrandName()
    {
        return $this->brandName;
    }

    /**
     * @param $brandCode
     * @return $this
     */
    public function setBrandCode($brandCode)
    {
        $this->brandCode = $brandCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBrandCode()
    {
        return $this->brandCode;
    }
}
