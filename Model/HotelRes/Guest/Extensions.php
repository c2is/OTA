<?php

namespace C2is\OTA\Model\HotelRes\Guest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class Extensions {
    /**
     * @SerializedName("PaxLangCode")
     * @Type("C2is\OTA\Model\HotelRes\Guest\PaxLangCode")
     * @var PaxLangCode
     */
    private $paxLangCode;

    /**
     * @param \C2is\OTA\Model\HotelRes\Guest\PaxLangCode $paxLangCode
     */
    public function setPaxLangCode(PaxLangCode $paxLangCode)
    {
        $this->paxLangCode = $paxLangCode;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\Guest\PaxLangCode
     */
    public function getPaxLangCode()
    {
        return $this->paxLangCode;
    }
}
