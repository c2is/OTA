<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class RoomType
{
    /**
     * @SerializedName("RoomTypeCode")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $code;

    /**
     * @SerializedName("RoomDescription")
     * @XmlList(inline=false, entry="Text")
     * @Type("array<C2is\OTA\Model\HotelAvail\Response\Text>")
     * @var array
     */
    private $description = array();

    /**
     * @SerializedName("AdditionalDetails")
     * @XmlList(inline=false, entry="AdditionalDetail")
     * @Type("array<C2is\OTA\Model\HotelAvail\Response\AdditionalDetail>")
     * @var array
     */
    private $additionalDetails = array();

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param array $description
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param Text $text
     */
    public function addDescription(Text $text)
    {
        $this->description[] = $text;

        return $this;
    }

    /**
     * @return array
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param array $additionalDetails
     */
    public function setAdditionalDetails($additionalDetails)
    {
        $this->additionalDetails = $additionalDetails;

        return $this;
    }

    /**
     * @param AdditionalDetail $additionalDetails
     */
    public function addAdditionalDetail(AdditionalDetail $additionalDetail)
    {
        $this->additionalDetails[] = $additionalDetail;

        return $this;
    }

    /**
     * @return array
     */
    public function getAdditionalDetails()
    {
        return $this->additionalDetails;
    }
}