<?php

namespace C2is\OTA\Model\HotelSearch\Request;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlRoot;

class Pos
{
    /**
     * @SerializedName("Source")
     * @Type("C2is\OTA\Model\HotelSearch\Request\Source")
     * @var Source
     */
    private $source;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->source = new Source();
    }

    /**
     * @param Source $source
     * @return $this
     */
    public function setSource(Source $source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return Source
     */
    public function getSource()
    {
        return $this->source;
    }
}
