<?php

namespace C2is\OTA\Model\HotelRes;

use C2is\OTA\Model\Common\Comment;
use C2is\OTA\Model\Common\Total;
use C2is\OTA\Model\HotelRes\GlobalInfo\Guarantee;
use C2is\OTA\Model\HotelRes\GlobalInfo\GuaranteePayment;
use C2is\OTA\Model\HotelRes\GlobalInfo\HotelReservationId;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

class GlobalInfo
{
    /**
     * @SerializedName("Comments")
     * @XmlList(inline=false, entry="Comment")
     * @Type("array<C2is\OTA\Model\Common\Comment>")
     * @var array
     */
    private $comments;

    /**
     * @SerializedName("Guarantee")
     * @Type("C2is\OTA\Model\HotelRes\GlobalInfo\Guarantee")
     * @var \C2is\OTA\Model\HotelRes\GlobalInfo\Guarantee
     */
    private $guarantee;

    /**
     * @SerializedName("Total")
     * @Type("C2is\OTA\Model\Common\Total")
     * @var \C2is\OTA\Model\Common\Total
     */
    private $total;

    /**
     * @SerializedName("HotelReservationIDs")
     * @XmlList(inline=false, entry="HotelReservationID")
     * @Type("array<C2is\OTA\Model\HotelRes\GlobalInfo\HotelReservationId>")
     * @var array
     */
    private $hotelReservationIds;

    /**
     * @SerializedName("DepositPayments")
     * @XmlList(inline=false, entry="GuaranteePayment")
     * @Type("array<C2is\OTA\Model\HotelRes\GlobalInfo\GuaranteePayment>")
     * @var array
     */
    private $guaranteesPayments;

    /**
     * @param array $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * @param Comment $comment
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

    /**
     * @param \C2is\OTA\Model\HotelRes\GlobalInfo\Guarantee $guarantee
     */
    public function setGuarantee(Guarantee $guarantee)
    {
        $this->guarantee = $guarantee;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\HotelRes\GlobalInfo\Guarantee
     */
    public function getGuarantee()
    {
        return $this->guarantee;
    }

    /**
     * @param \C2is\OTA\Model\Common\Total $total
     */
    public function setTotal(Total $total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return \C2is\OTA\Model\Common\Total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param array $hotelReservationIds
     */
    public function setHotelReservationIds($hotelReservationIds)
    {
        $this->hotelReservationIds = $hotelReservationIds;

        return $this;
    }

    /**
     * @param HotelReservationId $hotelReservationId
     */
    public function addHotelReservationId(HotelReservationId $hotelReservationId)
    {
        $this->hotelReservationIds[] = $hotelReservationId;

        return $this;
    }

    /**
     * @return array
     */
    public function getHotelReservationIds()
    {
        return $this->hotelReservationIds;
    }

    /**
     * @param array $guaranteesPayments
     * @return $this
     */
    public function setGuaranteesPayments($guaranteesPayments)
    {
        $this->guaranteesPayments = $guaranteesPayments;

        return $this;
    }

    /**
     * @param GuaranteePayment $guaranteePayment
     */
    public function addGuaranteePayment($guaranteePayment)
    {
        $this->guaranteesPayments[] = $guaranteePayment;

        return $this;
    }

    /**
     * @return array
     */
    public function getGuaranteesPayments()
    {
        return $this->guaranteesPayments;
    }
}
