<?php

namespace C2is\OTA\Message\Request;

use C2is\OTA\Message\AbstractMessage;
use C2is\OTA\Model\HotelSearch\Request\Criteria;
use C2is\OTA\Model\HotelSearch\Request\Criterion\Address;
use C2is\OTA\Model\HotelSearch\Request\Criterion\Filter;
use C2is\OTA\Model\HotelSearch\Request\Criterion\FilterExtension;
use C2is\OTA\Model\HotelSearch\Request\Criterion\GuestCount;
use C2is\OTA\Model\HotelSearch\Request\Criterion\GuestCounts;
use C2is\OTA\Model\HotelSearch\Request\Criterion\HotelRef;
use C2is\OTA\Model\HotelSearch\Request\Criterion\Keyword;
use C2is\OTA\Model\HotelSearch\Request\Criterion\Position;
use C2is\OTA\Model\HotelSearch\Request\Criterion\Radius;
use C2is\OTA\Model\HotelSearch\Request\Criterion\RoomStayCandidate;
use C2is\OTA\Model\HotelSearch\Request\Criterion\RoomStayCandidates;
use C2is\OTA\Model\HotelSearch\Request\Criterion\StayDateRange;
use JMS\Serializer\SerializerBuilder;

/**
 * Class HotelSearch
 * @package Seh\Bundle\ReservitBundle\OTA
 */
class HotelSearch extends AbstractMessage
{
    public function getName()
    {
        return 'hotel_search';
    }

    protected function getRequiredParams()
    {
        return array(
            'echo'          => $this->generateEcho(),
            'timestamp'     => $this->getTimestamp(),
            'ota.version',
            'ota.namespace',
            'requestor.id',
            'requestor.type',
            'company_name',
            'hotel.chain_code'
        );
    }

    protected function generateXml()
    {
        $hotelSearch = new \C2is\OTA\Model\HotelSearch\Request\HotelSearch();
        $hotelSearch->setEchoToken($this->generateEcho());
        $hotelSearch->setTimestamp($this->getTimestamp());
        $hotelSearch->setRequestorId($this->getParam('requestor.id'));
        $hotelSearch->setRequestorType($this->getParam('requestor.type'));
        $hotelSearch->setCompanyName($this->getParam('company_name'));
        $hotelSearch->setVersion($this->getParam('ota.version'));
        $hotelSearch->setXmlns($this->getParam('ota.namespace'));
        $hotelSearch->setMaxResponses($this->getParam('max_responses'));
        $hotelSearch->setLang($this->getParam('lang', 'en'));
        $hotelSearch->setCriteria($criteria = new Criteria());
        $hotelSearch->setTarget($this->getParam('target', 'Test'));

        if ($hotel = $this->getParam('hotel') and is_array($hotel)) {
            if ($codes = $this->getParam('hotel.codes')) {
                foreach ($codes as $code) {
                    $criterion = new HotelRef();
                    $criterion->setChainCode($this->getParam('hotel.chain_code'));
                    $criterion->setHotelCode($code);
                    $criteria->addCriterion($criterion);
                }
            } else {
                $criterion = new HotelRef();
                $criterion->setChainCode($this->getParam('hotel.chain_code'));
                if ($area = $this->getParam('hotel.area')) {
                    $criterion->setArea($area);
                }
                if ($name = $this->getParam('hotel.name')) {
                    $criterion->setHotelName($name);
                }
                if ($brand = $this->getParam('hotel.brand')) {
                    $criterion->setBrandCode($brand);
                    $criterion->setBrandName('Pegasus');
                }
                $criteria->addCriterion($criterion);
            }
        }

        if ($rooms = $this->getParam('rooms') and is_array($rooms)) {
            $criteria->addCriterion($criterion = new RoomStayCandidates());

            foreach ($rooms as $room) {
                $criterion->addRoomStayCandidate($roomStayCandidate  = new RoomStayCandidate());
                $roomStayCandidate->setGuestCounts($guestCounts = new GuestCounts());
                foreach ($room as $guest) {
                    $guestCounts->addGuestCount($guestCount = new GuestCount());
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

        if ($dateRange = $this->getParam('date_range') and is_array($dateRange)) {
            $criteria->addCriterion($criterion = new StayDateRange());

            $criterion->setStart($this->getParam('date_range.start_date'));
            $criterion->setEnd($this->getParam('date_range.end_date'));
        }

        if ($address = $this->getParam('address') and is_array($address)) {
            $criteria->addCriterion($criterion = new Address());

            if ($cityName = $this->getParam('address.city_name')) {
                $criterion->setCityName($cityName);
            }
            if ($countryName = $this->getParam('address.country_name')) {
                $criterion->setCountryName($countryName);
            }
        }

        if ($position = $this->getParam('position') and is_array($position)) {
            $criteria->addCriterion($criterion = new Position());

            $criterion->setLongitude($this->getParam('position.longitude'));
            $criterion->setLatitude($this->getParam('position.latitude'));
        }

        if ($radius = $this->getParam('radius') and is_array($radius)) {
            $criteria->addCriterion($criterion = new Radius());

            $criterion->setDistance($this->getParam('radius.distance'));
            $criterion->setDistanceMeasure($this->getParam('radius.measure', 'km'));
        }

        if ($this->getParam('keyword')) {
            $criteria->addCriterion($criterion = new Keyword());

            $criterion->setKeyword($this->getParam('keyword'));
        }

        if ($filter = $this->getParam('filter') and is_array($filter)) {
            $criteria->addCriterion(new FilterExtension($criterion = new Filter()));

            if (isset($filter['bpromo'])) {
                $criterion->setPromo($filter['bpromo'] === true or $filter['bpromo'] === 'true');
            }
            if (isset($filter['bpackage'])) {
                $criterion->setPackage($filter['bpackage'] === true or $filter['bpackage'] === 'true');
            }
            if (isset($filter['bstay'])) {
                $criterion->setStay($filter['bstay'] === true or $filter['bstay'] === 'true');
            }
            if (isset($filter['rate_range'])) {
                $criterion->setRateRangeReq($filter['rate_range'] === true or $filter['rate_range'] === 'true');
            }
            if (isset($filter['rate_range_name'])) {
                $criterion->setRateRangeNameReq($filter['rate_range_name'] === true or $filter['rate_range_name'] === 'true');
            }
        }

        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();

        $this->xml = $serializer->serialize($hotelSearch, 'xml');

        return $serializer->serialize($hotelSearch, 'xml');
    }

    public function getData()
    {
        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();

        return $serializer->deserialize($this->getXml(), 'C2is\\OTA\\Model\\HotelSearch\\Request\\HotelSearch', 'xml');
    }
}
