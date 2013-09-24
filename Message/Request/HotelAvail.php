<?php

namespace C2is\OTA\Message\Request;

use C2is\OTA\Message\AbstractMessage;

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
            'hotel.chain_code',
            'hotel.codes',
        );
    }

    protected function generateXml()
    {
        $dom = new \DOMDocument('1.0', 'utf-8');

        $root = $dom->createElement('OTA_HotelAvailRQ');
        if ($locale = $this->getParam('locale')) {
            $root->setAttribute('PrimaryLangID', $locale);
        }
        $root->setAttribute('EchoToken'     , $this->getParam('echo'));
        $root->setAttribute('Target'        , $this->getParam('target', 'Test'));
        $root->setAttribute('TimeStamp'     , $this->getParam('timestamp'));
        $root->setAttribute('Version'       , $this->getParam('ota.version'));
        $root->setAttribute('xmlns'         , $this->getParam('ota.namespace'));
        $root->setAttribute('MaxResponses'  , $this->getParam('max_responses', 100));
        $root->setAttribute('BestOnly'      , $this->getParam('best_only', 'false'));
        $root->setAttribute('RateRangeOnly' , $rateRangeOnly = $this->getParam('rate_range_only', 'true'));
        $root->setAttribute('SummaryOnly'   , $this->getParam('summary_only', 'false'));
        $dom->appendChild($root);

        $root->appendChild($this->generatePOSNode($dom));

        $availRequestSegments = $dom->createElement('AvailRequestSegments');

        $availRequestSegment = $dom->createElement('AvailRequestSegment');
        $availRequestSegment->setAttribute('AvailReqType', $this->getParam('type', 'Room'));

        $duration = null;
        if ($startDate = $this->getParam('date_range.start_date') and ($endDate = $this->getParam('date_range.end_date') or $duration = $this->getParam('date_range.duration'))) {
            $stayDateRange = $dom->createElement('StayDateRange');
            $stayDateRange->setAttribute('Start', $startDate);
            if ($endDate) {
                $stayDateRange->setAttribute('End', $endDate);
            }
            if ($duration) {
                $stayDateRange->setAttribute('Duration', $duration);
            }
            $dateWindowRange = $dom->createElement('DateWindowRange');
            $dateWindowRange->appendChild($dom->createTextNode($startDate));

            $stayDateRange->appendChild($dateWindowRange);
            $availRequestSegment->appendChild($stayDateRange);
        }

        if ($rateRangeOnly and $rateRangeMax = $this->getParam('rate_range.max')) {
            $rateRange = $dom->createElement('RateRange');
            $rateRange->setAttribute('MinRate', $this->getParam('rate_range.min', 0));
            $rateRange->setAttribute('MaxRate', $this->getParam('rate_range.max'));
            $rateRange->setAttribute('CurrencyCode', $this->getParam('rate_range.currency', 'EUR'));
        }

        if ($rooms = $this->getParam('rooms') and is_array($rooms)) {
            $roomStayCandidates = $dom->createElement('RoomStayCandidates');

            foreach ($rooms as $room) {
                $roomStayCandidate  = $dom->createElement('RoomStayCandidate');
                $roomStayCandidate->setAttribute('Count', $room['count']);
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
            $availRequestSegment->appendChild($roomStayCandidates);
        }

        $hotelSearchCriteria = $dom->createElement('HotelSearchCriteria');
        foreach ($this->getParam('hotel.codes') as $hotelCode) {
            $criterion = $dom->createElement('Criterion');
            $hotelRef = $dom->createElement('HotelRef');

            $hotelRef->setAttribute('ChainCode', $this->getParam('hotel.chain_code'));
            $hotelRef->setAttribute('HotelCode', $hotelCode);

            $criterion->appendChild($hotelRef);
            $hotelSearchCriteria->appendChild($criterion);
        }

        $availRequestSegment->appendChild($hotelSearchCriteria);

        $availRequestSegments->appendChild($availRequestSegment);
        $root->appendChild($availRequestSegments);

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
