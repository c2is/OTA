<?php

namespace C2is\OTA\Model\Common\Taxes;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\SerializedName;

class TaxDescription
{
    /**
     * @SerializedName("Language")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $language;

    /**
     * @SerializedName("Text")
     * @Type("string")
     * @var string
     */
    private $description;

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
