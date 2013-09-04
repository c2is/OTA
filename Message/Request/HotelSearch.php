<?php

namespace C2is\OTA\Message\Request;

use C2is\OTA\Message\AbstractMessage;

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
        $dom = new \DOMDocument('1.0', 'utf-8');

        $root = $dom->createElement('OTA_HotelSearchRQ');
        if ($locale = $this->getParam('locale')) {
            $root->setAttribute('PrimaryLangID', $locale);
        }
        $root->setAttribute('EchoToken'     , $this->getParam('echo'));
        $root->setAttribute('Target'        , $this->getParam('target', 'Test'));
        $root->setAttribute('TimeStamp'     , $this->getParam('timestamp'));
        $root->setAttribute('Version'       , $this->getParam('ota.version'));
        $root->setAttribute('xmlns'         , $this->getParam('ota.namespace'));
        $root->setAttribute('MaxResponses'  , $this->getParam('max_responses', 100));
        $dom->appendChild($root);

        $root->appendChild($this->generatePOSNode($dom));

        $criteria = $dom->createElement('Criteria');

        if ($hotel = $this->getParam('hotel') and is_array($hotel)) {
            $criterion = $dom->createElement('Criterion');
            $hotelRef = $dom->createElement('HotelRef');
            $hotelRef->setAttribute('ChainCode', $this->getParam('hotel.chain_code'));
            if ($area = $this->getParam('hotel.area')) {
                $hotelRef->setAttribute('AreaID', $area);
            }
            if ($name = $this->getParam('hotel.name')) {
                $hotelRef->setAttribute('HotelName', $name);
            }
            if ($brand = $this->getParam('hotel.brand')) {
                $hotelRef->setAttribute('BrandCode', $brand);
                $hotelRef->setAttribute('BrandName', 'Pegasus');
            }
            $criterion->appendChild($hotelRef);
            $criteria->appendChild($criterion);

            if ($codes = $this->getParam('hotel.codes')) {
                foreach ($codes as $code) {
                    $criterion = $dom->createElement('Criterion');
                    $hotelRef = $dom->createElement('HotelRef');
                    $hotelRef->setAttribute('ChainCode', $this->getParam('hotel.chain_code'));
                    $hotelRef->setAttribute('HotelCode', $code);
                    $criterion->appendChild($hotelRef);
                    $criteria->appendChild($criterion);
                }
            }
        }

        if ($rooms = $this->getParam('rooms') and is_array($rooms)) {
            $criterion          = $dom->createElement('Criterion');
            $roomStayCandidates = $dom->createElement('RoomStayCandidates');
            $roomStayCandidate  = $dom->createElement('RoomStayCandidate');

            foreach ($rooms as $room) {
                $guestCounts = $dom->createElement('GuestCounts');
                foreach ($room as $guest) {
                    $guestCount = $dom->createElement('GuestCount');
                    $category   = isset($guest['category']) ? $guest['category']    : 10;
                    $count      = isset($guest['count'])    ? $guest['count']       : 1;
                    $guestCount->setAttribute('AgeQualifyingCode', $category);
                    $guestCount->setAttribute('Count', $count);
                    if (isset($guest['age'])) {
                        $guestCount->setAttribute('Age', $guest['age']);
                    }
                    $guestCounts->appendChild($guestCount);
                }
                $roomStayCandidate->appendChild($guestCounts);
            }

            $roomStayCandidates->appendChild($roomStayCandidate);
            $criterion->appendChild($roomStayCandidates);
            $criteria->appendChild($criterion);
        }

        if ($dateRange = $this->getParam('date_range') and is_array($dateRange)) {
            $criterion = $dom->createElement('Criterion');
            $stayDateRange = $dom->createElement('StayDateRange');

            $stayDateRange->setAttribute('Start', date('Y-m-d', strtotime($this->getParam('date_range.start_date'))));
            $stayDateRange->setAttribute('End'  , date('Y-m-d', strtotime($this->getParam('date_range.end_date'))));

            $criterion->appendChild($stayDateRange);
            $criteria->appendChild($criterion);
        }

        if ($address = $this->getParam('address') and is_array($address)) {
            $criterion = $dom->createElement('Criterion');
            $address = $dom->createElement('Address');

            if ($cityName = $this->getParam('address.city_name')) {
                $cityNameNode = $dom->createElement('CityName');
                $cityNameNode->appendChild($dom->createTextNode($cityName));
                $address->appendChild($cityNameNode);
            }
            if ($countryName = $this->getParam('address.country_name')) {
                $countryNameNode = $dom->createElement('CountryName');
                $countryNameNode->appendChild($dom->createTextNode($countryName));
                $address->appendChild($countryNameNode);
            }

            $criterion->appendChild($address);
            $criteria->appendChild($criterion);
        }

        if ($position = $this->getParam('position') and is_array($position)) {
            $criterion = $dom->createElement('Criterion');
            $position = $dom->createElement('Position');

            $position->setAttribute('Longitude', $this->getParam('position.longitude'));
            $position->setAttribute('Latitude' , $this->getParam('position.latitude'));

            $criterion->appendChild($position);
            $criteria->appendChild($criterion);
        }

        if ($radius = $this->getParam('radius') and is_array($radius)) {
            $criterion = $dom->createElement('Criterion');
            $radius = $dom->createElement('Radius');

            $radius->setAttribute('Distance'        , $this->getParam('radius.distance'));
            $radius->setAttribute('DistanceMeasure' , $this->getParam('radius.measure', 'km'));

            $criterion->appendChild($radius);
            $criteria->appendChild($criterion);
        }

        if ($this->getParam('keyword')) {
            $criterion = $dom->createElement('Criterion');
            $tpaExtensions = $dom->createElement('TPA_Extensions');
            $keyword = $dom->createElement('Keyword');

            $keyword->appendChild($dom->createTextNode($this->getParam('keyword')));

            $tpaExtensions->appendChild($keyword);
            $criterion->appendChild($tpaExtensions);
            $criteria->appendChild($criterion);
        }

        if ($amenities = $this->getParam('amenities') and is_array($amenities)) {
            $criterion = $dom->createElement('Criterion');
            $tpaExtensions = $dom->createElement('TPA_Extensions');

            foreach ($amenities as $amenity) {
                $amenityNode = $dom->createElement('Amenity');
                if (isset($amenity['ota'])) {
                    $amenityNode->setAttribute('OTACode', $amenity['ota']['code']);
                    $amenityNode->setAttribute('OTAType', $amenity['ota']['type']);
                } else {
                    $amenityNode->setAttribute('Code', $amenity['code']);
                }
                $tpaExtensions->appendChild($amenityNode);
            }

            $criterion->appendChild($tpaExtensions);
            $criteria->appendChild($criterion);
        }

        if ($filter = $this->getParam('filter') and is_array($filter)) {
            $criterion = $dom->createElement('Criterion');
            $tpaExtensions = $dom->createElement('TPA_Extensions');
            $filterNode = $dom->createElement('Filter');

            if (isset($filter['bpromo'])) {
                $filterNode->setAttribute('bpromo', ($filter['bpromo'] === true or $filter['bpromo'] === 'true') ? 'true' : 'false');
            }
            if (isset($filter['bpackage'])) {
                $filterNode->setAttribute('bpackage', ($filter['bpackage'] === true or $filter['bpackage'] === 'true') ? 'true' : 'false');
            }
            if (isset($filter['bstay'])) {
                $filterNode->setAttribute('bstay', ($filter['bstay'] === true or $filter['bstay'] === 'true') ? 'true' : 'false');
            }
            if (isset($filter['rate_range'])) {
                $filterNode->setAttribute('RateRangeReq', ($filter['rate_range'] === true or $filter['rate_range'] === 'true') ? 'true' : 'false');
            }
            if (isset($filter['rate_range_name'])) {
                $filterNode->setAttribute('RateRangeNameReq', ($filter['rate_range_name'] === true or $filter['rate_range_name'] === 'true') ? 'true' : 'false');
            }

            $tpaExtensions->appendChild($filterNode);
            $criterion->appendChild($tpaExtensions);
            $criteria->appendChild($criterion);
        }

        $root->appendChild($criteria);

        $dom->formatOutput = true;
        return $dom->saveXML();
    }

    protected function fromXml($xml)
    {
        // TODO: Implement fromXml() method.
    }

    public function getData()
    {
        // TODO: Implement getData() method.
    }
}
