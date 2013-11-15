<?php

namespace C2is\OTA\Model\HotelRes\Guest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class Comment
{
    /**
     * @SerializedName("GuestViewable")
     * @XmlAttribute
     * @Type("boolean")
     * @var boolean
     */
    private $guestViewable = true;

    /**
     * @SerializedName("CommentOriginatorCode")
     * @XmlAttribute
     * @Type("integer")
     * @var integer
     */
    private $originatorCode = 0;

    /**
     * @SerializedName("Text")
     * @Type("string")
     * @var string
     */
    private $text;

    /**
     * @param boolean $guestViewable
     */
    public function setGuestViewable($guestViewable)
    {
        $this->guestViewable = $guestViewable;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getGuestViewable()
    {
        return $this->guestViewable;
    }

    /**
     * @param int $originatorCode
     */
    public function setOriginatorCode($originatorCode)
    {
        $this->originatorCode = $originatorCode;

        return $this;
    }

    /**
     * @return int
     */
    public function getOriginatorCode()
    {
        return $this->originatorCode;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}
