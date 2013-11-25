<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\AccessType;

/**
 * Class AdditionalDetail
 * @package C2is\OTA\Model\HotelAvail\Response
 * @AccessType("public_method")
 */
class AdditionalDetail
{
    /**
     * @SerializedName("Type")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $type;

    /**
     * @SerializedName("DetailDescription")
     * @XmlList
     * @Type("array<C2is\OTA\Model\HotelAvail\Response\DetailDescription>")
     * @var array
     */
    private $description;

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param array $description
     */
    public function setDescription($description)
    {
        $indexedDescriptions = array();
        foreach ($description as $text) {
            $indexedDescriptions[$text->getLang()] = $text;
        }

        $this->description = $indexedDescriptions;

        return $this;
    }

    /**
     * @param Text $text
     */
    public function addDescription(Text $text)
    {
        $this->description[$text->getLang()] = $text;

        return $this;
    }

    /**
     * @return array
     */
    public function getDescription()
    {
        return $this->description;
    }
}
