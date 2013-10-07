<?php

namespace C2is\OTA\Message\Response;

use C2is\OTA\Model\HotelSearch\HotelSearchData;
use C2is\OTA\Model\HotelSearch\RateRangeData;
use C2is\OTA\Model\HotelSearch\RoomTypeData;

class HotelSearch extends AbstractResponse
{
    /**
     * @return mixed This message's name.
     */
    public function getName()
    {
        return 'hotel_search';
    }

    /**
     * @return mixed An array containing the name of required parameters in the OTA message.
     */
    protected function getRequiredParams()
    {
        return array(
            'echo'          => $this->generateEcho(),
            'ota.version',
        );
    }

    protected function generateXml()
    {
        // TODO: Implement generate() method.
    }

    protected function fromXml($xml)
    {
        $this->params['hotels'] = array();
        $xml = simplexml_load_string($xml);
        $xmlAttributes = $xml->attributes();

        $rootAttributes = $xml->attributes();
        if (!isset($rootAttributes['EchoToken'])) {
            throw new \Exception('Invalid XML : Root element must have an attribute named EchoToken.');
        }
        $this->addParam('echo', (string) $xmlAttributes['EchoToken']);
        if (!isset($rootAttributes['Version'])) {
            throw new \Exception('Invalid XML : Root element must have an attribute named Version.');
        }
        $this->addParam('ota.version', (string) $xmlAttributes['Version']);

        if ($xml->Properties->Property) {
            foreach ($xml->Properties->Property as $result) {
                $resultAttributes = $result->attributes();
                $hotel = array();
                $hotel['chain_code'] = (string) $resultAttributes['ChainCode'];
                $hotel['code'] = (string) $resultAttributes['HotelCode'];

                if ($result->RateRange) {
                    $rateRangeAttributes = $result->RateRange->attributes();
                    $hotel['rate_range'] = array();
                    $hotel['rate_range']['currency'] = (string) $rateRangeAttributes['CurrencyCode'];
                    $hotel['rate_range']['max_rate'] = (string) $rateRangeAttributes['MaxRate'];
                    $hotel['rate_range']['min_rate'] = (string) $rateRangeAttributes['MinRate'];

                    if ($result->TPA_Extensions) {
                        $roomTypes = array(
                            'min' => array(),
                            'max' => array(),
                        );
                        foreach ($result->TPA_Extensions->RateRangeLabels->RateRangeLabel as $rateRangeLabel) {
                            $rateRangeLabelAttributes = $rateRangeLabel->attributes();
                            $minLabelAttributes = $rateRangeLabel->MinLabel->attributes();
                            $maxLabelAttributes = $rateRangeLabel->MaxLabel->attributes();
                            $lang = (string) $rateRangeLabelAttributes['Langcode'];
                            $roomTypes['min']['code'] = (string) $minLabelAttributes['RoomTypeCode'];
                            $roomTypes['min']['context'] = (string) $minLabelAttributes['RoomTypeCodeContext'];
                            $roomTypes['min']['labels'][$lang] = (string) utf8_decode($rateRangeLabel->MinLabel[0]);

                            $roomTypes['max']['code'] = (string) $maxLabelAttributes['RoomTypeCode'];
                            $roomTypes['max']['context'] = (string) $maxLabelAttributes['RoomTypeCodeContext'];
                            $roomTypes['max']['labels'][$lang] = (string) utf8_decode($rateRangeLabel->MaxLabel[0]);
                        }

                        $hotel['rate_range']['room_type_min'] = $roomTypes['min'];
                        $hotel['rate_range']['room_type_max'] = $roomTypes['max'];
                    }
                }

                $this->params['hotels'][] = $hotel;
            }
        }

        $this->getErrorsFromXml($xml);
    }

    public function getData()
    {
        $data = array();

        foreach ($this->getParam('hotels', array()) as $hotel) {
            $hotelSearch = new HotelSearchData();
            $hotelSearch->chainCode = $hotel['chain_code'];
            $hotelSearch->hotelCode = $hotel['code'];

            if ($hotel['rate_range']) {
                $rateRange = new RateRangeData();
                $rateRange->currencyCode = $hotel['rate_range']['currency'];
                $rateRange->maxRate = $hotel['rate_range']['max_rate'];
                $rateRange->minRate = $hotel['rate_range']['min_rate'];

                if ($hotel['rate_range']['room_type_min']) {
                    $rateRange->roomTypeMin = new RoomTypeData();
                    $rateRange->roomTypeMin->roomTypeCode = $hotel['rate_range']['room_type_min']['code'];
                    $rateRange->roomTypeMin->roomTypeCodeContext = $hotel['rate_range']['room_type_min']['context'];
                    $rateRange->roomTypeMin->roomTypeLabel = $hotel['rate_range']['room_type_min']['labels'];
                }

                if ($hotel['rate_range']['room_type_max']) {
                    $rateRange->roomTypeMax = new RoomTypeData();
                    $rateRange->roomTypeMax->roomTypeCode = $hotel['rate_range']['room_type_max']['code'];
                    $rateRange->roomTypeMax->roomTypeCodeContext = $hotel['rate_range']['room_type_max']['context'];
                    $rateRange->roomTypeMax->roomTypeLabel = $hotel['rate_range']['room_type_max']['labels'];
                }

                $hotelSearch->rateRange = $rateRange;
            }

            $data[] = $hotelSearch;
        }

        return $data;
    }
}
