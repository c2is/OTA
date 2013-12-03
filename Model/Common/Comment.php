<?php

namespace C2is\OTA\Model\Common;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class Comment
 * @package C2is\OTA\Model\Common
 * @AccessType("public_method")
 */
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
     * @Type("string")
     * @var string
     */
    private $originatorCode = 0;

    /**
     * @SerializedName("Texts")
     * @XmlList(inline=true, entry="Text")
     * @Type("array<C2is\OTA\Model\Common\Text>")
     * @var array
     */
    private $text;

    public function __construct($text = '')
    {
        $this->text = $text;
    }

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
     * @param array $text
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @param array $text
     */
    public function addText(Text $text)
    {
        $this->text[] = $text;

        return $this;
    }

    /**
     * @return array
     */
    public function getText()
    {
        return $this->text;
    }
}
