<?php

namespace C2is\OTA\Model\HotelRes\Guest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\SerializedName;

class Loyalty
{
    /**
     * @SerializedName("MembershipID")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $membershipId;

    /**
     * @SerializedName("ProgramID")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $programId;

    /**
     * @param string $membershipId
     */
    public function setMembershipId($membershipId)
    {
        $this->membershipId = $membershipId;

        return $this;
    }

    /**
     * @return string
     */
    public function getMembershipId()
    {
        return $this->membershipId;
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
