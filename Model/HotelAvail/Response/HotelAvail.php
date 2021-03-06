<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use C2is\OTA\Model\Common\Pos;
use C2is\OTA\Model\Common\Warning;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\XmlRoot;

/**
 * @XmlRoot("OTA_HotelAvailRS")
 * @AccessType("public_method")
 */
class HotelAvail
{
    /**
     * @SerializedName("EchoToken")
     * @XmlAttribute
     * @Type("string")
     */
    private $echoToken;

    /**
     * @SerializedName("Version")
     * @XmlAttribute
     * @Type("string")
     */
    private $version;

    /**
     * @SerializedName("xmlns")
     * @XmlAttribute
     * @Type("string")
     */
    private $xmlns;

    /**
     * @SerializedName("RoomStays")
     * @XmlList(inline=false, entry="RoomStay")
     * @Type("array<C2is\OTA\Model\HotelAvail\Response\RoomStay>")
     * @var array
     */
    private $roomStays = array();

    /**
     * @SerializedName("TPA_Extensions")
     * @Type("C2is\OTA\Model\HotelAvail\Response\HotelAvailExtension")
     * @var \C2is\OTA\Model\HotelAvail\Response\HotelAvailExtension
     */
    private $extensions;

    /**
     * @SerializedName("Warnings")
     * @XmlList(inline=false, entry="Warning")
     * @Type("array<C2is\OTA\Model\Common\Warning>")
     * @var array
     */
    private $warnings;

    /**
     * @param $echoToken
     * @return $this
     */
    public function setEchoToken($echoToken)
    {
        $this->echoToken = $echoToken;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEchoToken()
    {
        return $this->echoToken;
    }

    /**
     * @param $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param $xmlns
     * @return $this
     */
    public function setXmlns($xmlns)
    {
        $this->xmlns = $xmlns;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getXmlns()
    {
        return $this->xmlns;
    }

    /**
     * @param array $roomStays
     */
    public function setRoomStays($roomStays)
    {
        $this->roomStays = $roomStays;

        return $this;
    }

    /**
     * @param RoomStay $roomStay
     */
    public function addRoomStays(RoomStay $roomStay)
    {
        $this->roomStays[] = $roomStay;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoomStays()
    {
        return $this->roomStays;
    }

    /**
     * @param \C2is\OTA\Model\HotelAvail\Response\HotelAvailExtension $extensions
     */
    public function setExtensions(HotelAvailExtension $extensions)
    {
        $this->extensions = $extensions;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelAvail\Response\HotelAvailExtension
     */
    public function getExtensions()
    {
        return $this->extensions;
    }

    /**
     * @param array $warnings
     * @return $this
     */
    public function setWarnings($warnings)
    {
        $this->warnings = $warnings;

        return $this;
    }

    /**
     * @return array
     */
    public function getWarnings()
    {
        return $this->warnings;
    }

    /**
     * @param $code
     * @return boolean
     */
    public function hasWarning($code)
    {
        /** @var Warning $warning */
        foreach ($this->warnings as $warning) {
            if ($warning->getCode() == $code) {
                return true;
            }
        }

        return false;
    }
}
