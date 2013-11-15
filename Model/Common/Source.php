<?php

namespace C2is\OTA\Model\Common;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;

class Source
{
    /**
     * @SerializedName("RequestorID")
     * @Type("C2is\OTA\Model\Common\RequestorId")
     * @var RequestorId
     */
    private $requestorId;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->requestorId = new RequestorId();
    }

    /**
     * @param RequestorId $requestorId
     * @return $this
     */
    public function setRequestorId(RequestorId $requestorId)
    {
        $this->requestorId = $requestorId;

        return $this;
    }

    /**
     * @return RequestorId
     */
    public function getRequestorId()
    {
        return $this->requestorId;
    }
}
