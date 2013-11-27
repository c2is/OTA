<?php

namespace C2is\OTA\Model\HotelResNotif;

use C2is\OTA\Exception\InvalidParameterException;
use C2is\OTA\Model\Common\BookingChannel;
use C2is\OTA\Model\Common\Pos;
use C2is\OTA\Model\HotelRes\HotelReservation;
use JMS\Serializer\Annotation as DI;

/** @DI\XmlRoot("OTA_HotelResNotifRQ") */
class HotelResNotif
{
    const RESERVATION_STATUS_CREATE = 'Initiate';

    const RESERVATION_STATUS_EDIT = 'Modify';

    const RESERVATION_STATUS_HOLD = 'Hold';

    const RESERVATION_STATUS_COMMIT = 'Commit';

    const RESERVATION_STATUS_IGNORE = 'Ignore';

    /**
     * @DI\Exclude
     * @var array
     */
    public static $allowedStatus = array(
        self::RESERVATION_STATUS_CREATE,
        self::RESERVATION_STATUS_EDIT,
        self::RESERVATION_STATUS_HOLD,
        self::RESERVATION_STATUS_COMMIT,
        self::RESERVATION_STATUS_IGNORE,
    );

    /**
     * @DI\SerializedName("EchoToken")
     * @DI\XmlAttribute
     * @DI\Type("string")
     * @var string
     */
    private $echoToken;

    /**
     * @DI\SerializedName("PrimaryLangID")
     * @DI\XmlAttribute
     * @DI\Type("string")
     */
    private $lang;

    /**
     * @DI\SerializedName("Target")
     * @DI\XmlAttribute
     * @DI\Type("string")
     */
    private $target = 'Test';

    /**
     * @DI\SerializedName("TimeStamp")
     * @DI\XmlAttribute
     * @DI\Type("string")
     */
    private $timestamp;

    /**
     * @DI\SerializedName("Version")
     * @DI\XmlAttribute
     * @DI\Type("string")
     * @var string
     */
    private $version;

    /**
     * @DI\SerializedName("xmlns")
     * @DI\XmlAttribute
     * @DI\Type("string")
     * @var string
     */
    private $xmlns;

    /**
     * @DI\SerializedName("ResStatus")
     * @DI\XmlAttribute
     * @DI\Type("string")
     * @var string
     */
    private $status;

    /**
     * @DI\SerializedName("POS")
     * @DI\Type("C2is\OTA\Model\Common\Pos")
     * @var Pos
     */
    private $pos;

    /**
     * @DI\SerializedName("HotelReservations")
     * @DI\XmlList(inline=false, entry="HotelReservation")
     * @DI\Type("array<C2is\OTA\Model\HotelRes\HotelReservation>")
     * @var HotelReservations
     */
    private $reservations = array();

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->pos = new Pos();
    }

    /**
     * @param $echoToken
     * @return $this
     */
    public function setEchoToken($echoToken)
    {
        $this->echoToken = $echoToken;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEchoToken()
    {
        return $this->echoToken;
    }

    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    public function getLang()
    {
        return $this->lang;
    }

    public function setTarget($target)
    {
        $this->target = $target;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param $xmlns
     * @return $this
     */
    public function setXmlns($xmlns)
    {
        $this->xmlns = $xmlns;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getXmlns()
    {
        return $this->xmlns;
    }

    /**
     * @param Pos $pos
     * @return $this
     */
    public function setPos(Pos $pos)
    {
        $this->pos = $pos;

        return $this;
    }

    /**
     * @return Pos
     */
    public function getPos()
    {
        return $this->pos;
    }

    /**
     * @param $requestorId
     * @return $this
     */
    public function setRequestorId($requestorId)
    {
        $this->pos->getSource()->getRequestorId()->setId($requestorId);

        return $this;
    }

    /**
     * @param $requestorType
     * @return $this
     */
    public function setRequestorType($requestorType)
    {
        $this->pos->getSource()->getRequestorId()->setType($requestorType);

        return $this;
    }

    /**
     * @param $companyName
     * @return $this
     */
    public function setRequestorCompanyName($companyName)
    {
        $this->pos->getSource()->getRequestorId()->getCompanyName()->setName($companyName);

        return $this;
    }

    /**
     * @param $bookingType
     * @return $this
     */
    public function setBookingType($bookingType)
    {
        if (!$this->pos->getBookingChannel()) {
            $this->pos->setBookingChannel(new BookingChannel());
        }
        $this->pos->getBookingChannel()->setType($bookingType);

        return $this;
    }

    /**
     * @param $bookingCompanyName
     * @return $this
     */
    public function setBookingCompanyName($bookingCompanyName)
    {
        if (!$this->pos->getBookingChannel()) {
            $this->pos->setBookingChannel(new BookingChannel());
        }
        $this->pos->getBookingChannel()->getCompanyName()->setName($bookingCompanyName);

        return $this;
    }

    /**
     * @param $bookingCompanyCode
     * @return $this
     */
    public function setBookingCompanyCode($bookingCompanyCode)
    {
        if (!$this->pos->getBookingChannel()) {
            $this->pos->setBookingChannel(new BookingChannel());
        }
        $this->pos->getBookingChannel()->getCompanyName()->setCode($bookingCompanyCode);

        return $this;
    }

    public function setStatus($status)
    {
        if (!in_array($status, self::$allowedStatus)) {
            throw new InvalidParameterException(sprintf('"%s" value for reservation status is invalid. A reservation status must be set to "Initiate" for a creation or "Modify" for an update. For two phases commit processes, the status can be set to "Hold", "Commit", or "Ignore"', $status));
        }
        $this->status = $status;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param $reservations
     * @return $this
     */
    public function setReservations($reservations)
    {
        $this->reservations = $reservations;

        return $this;
    }

    /**
     * @param HotelReservation $reservation
     */
    public function addReservation(HotelReservation $reservation)
    {
        $this->reservations[] = $reservation;

        return $this;
    }

    /**
     * @return array
     */
    public function getReservations()
    {
        return $this->reservations;
    }
}
