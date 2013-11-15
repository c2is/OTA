<?php

namespace C2is\OTA\Model\HotelSearch\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class Filter
{
    /**
     * @SerializedName("bpackage")
     * @XmlAttribute
     * @Type("boolean")
     */
    private $package;

    /**
     * @SerializedName("bpromo")
     * @XmlAttribute
     * @Type("boolean")
     */
    private $promo;

    public function setPackage($package)
    {
        $this->package = $package;
    }

    public function getPackage()
    {
        return $this->package;
    }

    public function setPromo($promo)
    {
        $this->promo = $promo;
    }

    public function getPromo()
    {
        return $this->promo;
    }
}
