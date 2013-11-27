<?php

namespace C2is\OTA\Model\HotelRes\GlobalInfo;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

class HotelReservationId
{
    /**
     * @SerializedName("ResID_Source")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $source;

    /**
     * @SerializedName("ResID_Value")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $value;

    /**
     * @SerializedName("ResID_Type")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $type;

    /**
     * @SerializedName("CancelOriginatorCode")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $cancelOriginatorCode;

    /**
     * @SerializedName("CancellationDate")
     * @XmlAttribute
     * @Type("DateTime<'Y-m-d\TH:i:s\Z'>")
     * @var \DateTime
     */
    private $cancellationDate;

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $cancelOriginatorCode
     */
    public function setCancelOriginatorCode($cancelOriginatorCode)
    {
        $this->cancelOriginatorCode = $cancelOriginatorCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCancelOriginatorCode()
    {
        return $this->cancelOriginatorCode;
    }

    /**
     * @param \DateTime $cancellationDate
     */
    public function setCancellationDate($cancellationDate)
    {
        $this->cancellationDate = $cancellationDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCancellationDate()
    {
        return $this->cancellationDate;
    }
}
