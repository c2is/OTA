<?php

namespace C2is\OTA\Model\HotelAvail\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\SerializedName;

class DetailDescription
{
    /**
     * @SerializedName("Text")
     * @Type("string")
     * @var string
     */
    private $text;

    /**
     * @SerializedName("URL")
     * @Type("string")
     * @var string
     */
    private $url;

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

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
