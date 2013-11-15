<?php

namespace C2is\OTA\Model\HotelRes\Guest;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class ProfileInfo
{
    /**
     * @SerializedName("Profile")
     * @Type("C2is\OTA\Model\HotelRes\Guest\Profile")
     * @var Profile
     */
    private $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * @param \C2is\OTA\Model\HotelRes\Guest\Profile $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\Guest\Profile
     */
    public function getProfile()
    {
        return $this->profile;
    }
}
