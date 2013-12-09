<?php

namespace C2is\OTA\Model\HotelRes;

use C2is\OTA\Model\Common\Comment;
use C2is\OTA\Model\HotelRes\Guest\Customer;
use C2is\OTA\Model\HotelRes\Guest\Profile;
use C2is\OTA\Model\HotelRes\Guest\ProfileInfo;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

class Guest
{
    const GENDER_MALE = 'Male';

    const GENDER_FEMALE = 'Female';

    /**
     * @SerializedName("ResGuestRPH")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $rph;

    /**
     * @SerializedName("Profiles")
     * @XmlList(inline=false, entry="ProfileInfo")
     * @Type("array<C2is\OTA\Model\HotelRes\Guest\ProfileInfo>")
     * @var array
     */
    private $profiles;

    /**
     * @SerializedName("Comments")
     * @XmlList(inline=false, entry="Comment")
     * @Type("array<C2is\OTA\Model\Common\Comment>")
     * @var array
     */
    private $comments;

    /**
     * @param string $rph
     */
    public function setRph($rph)
    {
        $this->rph = $rph;

        return $this;
    }

    /**
     * @return string
     */
    public function getRph()
    {
        return $this->rph;
    }

    /**
     * @param array $profiles
     */
    public function setProfiles($profiles)
    {
        $this->profiles = $profiles;

        return $this;
    }

    /**
     * @return array
     */
    public function getProfiles()
    {
        return $this->profiles;
    }

    /**
     * @param Customer $profiles
     */
    public function addCustomer(Customer $customer)
    {
        $this->profiles[] = new ProfileInfo($profile = new Profile());
        $profile->setCustomer($customer);

        return $this;
    }

    /**
     * @param array $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * @param Comment $comments
     */
    public function addComment(Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * @return array
     */
    public function getComments()
    {
        return $this->comments;
    }
}
