<?php

namespace C2is\OTA\Model\HotelAvail\Request;

use C2is\OTA\Model\Common\Pos;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;

/** @XmlRoot("OTA_HotelAvailRQ") */
class HotelAvail
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
    private $target = 'Test';

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
     * @SerializedName("BestOnly")
     * @XmlAttribute
     * @Type("boolean")
     */
    private $bestOnly;

    /**
     * @SerializedName("RateRangeOnly")
     * @XmlAttribute
     * @Type("boolean")
     */
    private $rateRangeOnly;

    /**
     * @SerializedName("SummaryOnly")
     * @XmlAttribute
     * @Type("boolean")
     */
    private $summaryOnly;

    /**
     * @SerializedName("POS")
     * @Type("C2is\OTA\Model\Common\Pos")
     * @var Pos
     */
    private $pos;

    /**
     * @SerializedName("AvailRequestSegments")
     * @XmlList(inline=false, entry="AvailRequestSegment")
     * @Type("array<C2is\OTA\Model\HotelAvail\Request\AvailRequestSegment>")
     * @var array
     */
    private $availRequestSegments = array();

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->pos = new Pos();
    }

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
     * @param $lang
     * @return $this
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
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
     * @return $this
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
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
     * @return $this
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
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

    public function setBestOnly($bestOnly)
    {
        $this->bestOnly = $bestOnly;
    }

    public function getBestOnly()
    {
        return $this->bestOnly;
    }

    public function setRateRangeOnly($rateRangeOnly)
    {
        $this->rateRangeOnly = $rateRangeOnly;
    }

    public function getRateRangeOnly()
    {
        return $this->rateRangeOnly;
    }

    public function setSummaryOnly($summaryOnly)
    {
        $this->summaryOnly = $summaryOnly;
    }

    public function getSummaryOnly()
    {
        return $this->summaryOnly;
    }

    /**
     * @param Pos $pos
     * @return $this
     */
    public function setPos(Pos $pos)
    {
        $this->pos = $pos;

        return $this;
    }

    /**
     * @return Pos
     */
    public function getPos()
    {
        return $this->pos;
    }

    /**
     * @param $requestorId
     * @return $this
     */
    public function setRequestorId($requestorId)
    {
        $this->pos->getSource()->getRequestorId()->setId($requestorId);

        return $this;
    }

    /**
     * @param $requestorType
     * @return $this
     */
    public function setRequestorType($requestorType)
    {
        $this->pos->getSource()->getRequestorId()->setType($requestorType);

        return $this;
    }

    /**
     * @param $companyName
     * @return $this
     */
    public function setCompanyName($companyName)
    {
        $this->pos->getSource()->getRequestorId()->getCompanyName()->setName($companyName);

        return $this;
    }

    /**
     * @param array $availRequestSegments
     */
    public function setAvailRequestSegments($availRequestSegments)
    {
        $this->availRequestSegments = $availRequestSegments;
    }

    public function addAvailRequestSegment(AvailRequestSegment $availRequestSegment)
    {
        $this->availRequestSegments[] = $availRequestSegment;
    }

    /**
     * @return array
     */
    public function getAvailRequestSegments()
    {
        return $this->availRequestSegments;
    }
}
