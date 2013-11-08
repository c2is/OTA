<?php

namespace C2is\OTA\Model\HotelSearch\Request;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;

/** @XmlRoot("Ota_HotelSearchRQ") */
class OTA_HotelSearchRQ
{
    /**
     * @SerializedName("EchoToken")
     * @XmlAttribute
     * @Type("string")
     */
    private $echoToken;

    /**
     * @SerializedName("PrimaryLangID")
     * @XmlAttribute
     * @Type("string")
     */
    private $lang = 'en';

    /**
     * @SerializedName("Target")
     * @XmlAttribute
     * @Type("string")
     */
    private $target;

    /**
     * @SerializedName("TimeStamp")
     * @XmlAttribute
     * @Type("string")
     */
    private $timestamp;

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
     * @SerializedName("POS")
     * @Type("string")
     */
    private $pos;

    /**
     * @SerializedName("Criteria")
     * @Type("string")
     */
    private $criteria;

    /**
     * @param $echoToken
     */
    public function setEchoToken($echoToken)
    {
        $this->echoToken = $echoToken;
    }

    /**
     * @return mixed
     */
    public function getEchoToken()
    {
        return $this->echoToken;
    }

    /**
     * @param $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param $target
     */
    public function setTarget($target)
    {
        $this->target = $target;
    }

    /**
     * @return mixed
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
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
     */
    public function setXmlns($xmlns)
    {
        $this->xmlns = $xmlns;
    }

    /**
     * @return mixed
     */
    public function getXmlns()
    {
        return $this->xmlns;
    }

    /**
     * @param $pos
     */
    public function setPos($pos)
    {
        $this->pos = $pos;
    }

    /**
     * @return mixed
     */
    public function getPos()
    {
        return $this->pos;
    }

    /**
     * @param $criteria
     */
    public function setCriteria($criteria)
    {
        $this->criteria = $criteria;
    }

    /**
     * @return mixed
     */
    public function getCriteria()
    {
        return $this->criteria;
    }
}
