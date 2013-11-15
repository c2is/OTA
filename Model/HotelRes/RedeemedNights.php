<?php

namespace C2is\OTA\Model\HotelRes;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class RedeemedNights
{
    /**
     * @SerializedName("ProgramID")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $programId;

    /**
     * @XmlList(inline=true, entry="RedeemedNight")
     * @Type("array<C2is\OTA\Model\HotelRes\RedeemedNight>")
     * @var array
     */
    private $redeemedNights;

    /**
     * @param array $redeemedNights
     */
    public function setRedeemedNights($redeemedNights)
    {
        $this->redeemedNights = $redeemedNights;

        return $this;
    }

    /**
     * @param array RedeemedNight $redeemedNights
     */
    public function addRedeemedNight(RedeemedNight $redeemedNight)
    {
        $this->redeemedNights[] = $redeemedNight;

        return $this;
    }

    /**
     * @return array
     */
    public function getRedeemedNights()
    {
        return $this->redeemedNights;
    }

    /**
     * @param string $programId
     */
    public function setProgramId($programId)
    {
        $this->programId = $programId;

        return $this;
    }

    /**
     * @return string
     */
    public function getProgramId()
    {
        return $this->programId;
    }
}
