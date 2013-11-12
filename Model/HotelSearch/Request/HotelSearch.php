<?php

namespace C2is\OTA\Model\HotelSearch\Request;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;

/** @XmlRoot("OTA_HotelSearchRQ") */
class HotelSearch
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
     * @SerializedName("POS")
     * @Type("C2is\OTA\Model\HotelSearch\Request\Pos")
     * @var Pos
     */
    private $pos;

    /**
     * @SerializedName("Criteria")
     * @Type("C2is\OTA\Model\HotelSearch\Request\Criteria")
     * @var Criteria
     */
    private $criteria;

    /**
     * @SerializedName("MaxResponses")
     * @XmlAttribute
     * @Type("string")
     */
    private $maxResponses = 100;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->pos = new Pos();
        $this->criteria = new Criteria();
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
     * @param Criteria $criteria
     * @return $this
     */
    public function setCriteria(Criteria $criteria)
    {
        $this->criteria = $criteria;

        return $this;
    }

    /**
     * @return Criteria
     */
    public function getCriteria()
    {
        return $this->criteria;
    }

    /**
     * @param $maxResponses
     * @return $this
     */
    public function setMaxResponses($maxResponses)
    {
        $this->maxResponses = $maxResponses;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxResponses()
    {
        return $this->maxResponses;
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
        $this->pos->getSource()->getRequestorId()->setCompanyName($companyName);

        return $this;
    }
}
