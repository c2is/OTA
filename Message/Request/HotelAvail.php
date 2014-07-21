<?php

namespace C2is\OTA\Message\Request;

use C2is\OTA\Message\AbstractMessage;
use C2is\OTA\Model\HotelAvail\Request\AvailRequestSegment;
use C2is\OTA\Model\HotelAvail\Request\DiscountCodes;
use C2is\OTA\Model\HotelAvail\Request\Extensions;
use C2is\OTA\Model\HotelAvail\Request\Filter;
use C2is\OTA\Model\HotelAvail\Request\GuestCount;
use C2is\OTA\Model\HotelAvail\Request\RateRange;
use C2is\OTA\Model\HotelAvail\Request\RoomStayCandidate;
use C2is\OTA\Model\HotelAvail\Request\StayDateRange;
use C2is\OTA\Model\HotelAvail\Request\TextDelimiter;
use C2is\OTA\Model\HotelSearch\Request\Criteria;
use C2is\OTA\Model\HotelSearch\Request\Criterion\HotelRef;

/**
 * Class HotelSearch
 * @package Seh\Bundle\ReservitBundle\OTA
 */
class HotelAvail extends AbstractMessage
{
    public function getName()
    {
        return 'hotel_avail';
    }

    protected function getRequiredParams()
    {
        return array(
            'echo' => $this->generateEcho(),
            'timestamp' => $this->getTimestamp(),
            'ota.version',
            'ota.namespace',
            'requestor.id',
            'requestor.type',
            'company_name',
            'requests',
        );
    }

    protected function generateXml()
    {
        $hotelAvail = new \C2is\OTA\Model\HotelAvail\Request\HotelAvail();
        $hotelAvail->setEchoToken($this->generateEcho());
        $hotelAvail->setTimestamp($this->getTimestamp());
        $hotelAvail->setRequestorId($this->getParam('requestor.id'));
        $hotelAvail->setRequestorType($this->getParam('requestor.type'));
        $hotelAvail->setCompanyName($this->getParam('company_name'));
        $hotelAvail->setVersion($this->getParam('ota.version'));
        $hotelAvail->setXmlns($this->getParam('ota.namespace'));
        $hotelAvail->setLang($this->getParam('lang', 'en'));
        $hotelAvail->setTarget($this->getParam('target', 'Test'));

        $hotelAvail->setBestOnly($this->getParam('best_only', false));
        $hotelAvail->setRateRangeOnly($rateRangeOnly = $this->getParam('rate_range_only', false));
        $hotelAvail->setSummaryOnly($this->getParam('summary_only', false));

        foreach ($this->getParam('requests', array()) as $request) {
            $hotelAvail->addAvailRequestSegment($availRequestSegment = new AvailRequestSegment());

            $type = empty($request['type']) ? 'Room' : $request['type'];
            $availRequestSegment->setAvailReqType($type);

            $duration = null;
            if (isset($request['date_range']) and ((isset($request['date_range']['start_date']) and $startDate = $request['date_range']['start_date']) and ((isset($request['date_range']['end_date']) and $endDate = $request['date_range']['end_date']) or (isset($request['date_range']['duration']) and $duration = $request['date_range']['duration'])))) {
                $availRequestSegment->setStayDateRange($stayDateRange = new StayDateRange());
                $stayDateRange->setStart($startDate);
                if ($endDate) {
                    $stayDateRange->setEnd($endDate);
                }
                if ($duration) {
                    $stayDateRange->setDuration($duration);
                }
                $stayDateRange->setRange(date('Y-m-d', strtotime($startDate)));
            }

            if ($rateRangeOnly and isset($request['rate_range']) and isset($request['rate_range']['max']) and $rateRangeMax = $request['rate_range']['max']) {
                $availRequestSegment->setRateRange($rateRange = new RateRange());
                $min = isset($request['rate_range']['min']) ? $request['rate_range']['min'] : 0;
                $rateRange->setMin($min);
                $rateRange->setMax($request['rate_range']['max']);
                $currency = isset($request['rate_range']['currency']) ? $request['rate_range']['currency'] : 'EUR';
                $rateRange->setCurrency($currency);
            }

            if (isset($request['rooms']) and $rooms = $request['rooms'] and is_array($rooms)) {
                foreach ($rooms as $room) {
                    $availRequestSegment->addRoomStayCandidate($roomStayCandidate = new RoomStayCandidate());
                    $roomStayCandidate->setQuantity($room['quantity']);

                    foreach ($room['guests'] as $guest) {
                        $roomStayCandidate->addGuestCount($guestCount = new GuestCount());
                        $category   = isset($guest['category']) ? $guest['category']    : 10;
                        $count      = isset($guest['count'])    ? $guest['count']       : 1;
                        $guestCount->setAgeCode($category);
                        $guestCount->setCount($count);
                        if (isset($guest['age'])) {
                            $guestCount->setAge($guest['age']);
                        }
                    }
                }
            }

            if (isset($request['hotel'])) {
                $availRequestSegment->setCriteria($hotelSearchCriteria = new Criteria());
                foreach ($request['hotel']['codes'] as $hotelCode) {
                    $criterion = new HotelRef();
                    $criterion->setChainCode($request['hotel']['chain_code']);
                    $criterion->setHotelCode($hotelCode);
                    $hotelSearchCriteria->addCriterion($criterion);
                }
            }

            if (isset($request['formatters']) || isset($request['promoCode'])) {
                $availRequestSegment->setExtensions($extensions = new Extensions());
                if (isset($request['formatters'])) {
                    $extensions->setFilter($fitler = new Filter());
                    foreach ($request['formatters'] as $type => $value) {
                        $formatter = new TextDelimiter();
                        $formatter->setOn($type);
                        $formatter->setValue($value);
                        $fitler->addResponseFormatter($formatter);
                    }
                }

                if ($promoCode = $this->getParam('promoCode')) {
                    $extensions->setDiscountCodes($discountCodes = new DiscountCodes());
                    if (isset($promoCode['exclusive'])) {
                        $discountCodes->setExclusive($promoCode['exclusive']);
                    }
                    if (isset($promoCode['code'])) {
                        $discountCodes->setCode($promoCode['code']);
                    }
                }
            }
        }

        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        $this->xml = $serializer->serialize($hotelAvail, 'xml');

        return $serializer->serialize($hotelAvail, 'xml');
    }

    public function getData()
    {
        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();

        return $serializer->deserialize($this->getXml(), 'C2is\\OTA\\Model\\HotelSearch\\Request\\HotelSearch', 'xml');
    }
}
