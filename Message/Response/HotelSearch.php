<?php

namespace C2is\OTA\Message\Response;

use C2is\OTA\Model\HotelSearchData;
use C2is\OTA\Model\RateRangeData;
use C2is\OTA\Model\RoomTypeData;

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

        $rootAttributes = $xml->attributes();
        if (!isset($rootAttributes['EchoToken'])) {
            throw new \Exception('Invalid XML : Root element must have an attribute named EchoToken.');
        }
        $this->addParam('echo', (string) $xml->attributes()['EchoToken']);
        if (!isset($rootAttributes['Version'])) {
            throw new \Exception('Invalid XML : Root element must have an attribute named Version.');
        }
        $this->addParam('ota.version', (string) $xml->attributes()['Version']);

        if ($xml->Properties->Property) {
            foreach ($xml->Properties->Property as $result) {
                $hotel = array();
                $hotel['chain_code'] = (string) $result->attributes()['ChainCode'];
                $hotel['code'] = (string) $result->attributes()['HotelCode'];

                if ($result->RateRange) {
                    $hotel['rate_range'] = array();
                    $hotel['rate_range']['currency'] = (string) $result->RateRange->attributes()['CurrencyCode'];
                    $hotel['rate_range']['max_rate'] = (string) $result->RateRange->attributes()['MaxRate'];
                    $hotel['rate_range']['min_rate'] = (string) $result->RateRange->attributes()['MinRate'];

                    if ($result->TPA_Extensions) {
                        $roomTypes = array(
                            'min' => array(),
                            'max' => array(),
                        );
                        foreach ($result->TPA_Extensions->RateRangeLabels->RateRangeLabel as $rateRangeLabel) {
                            $lang = (string) $rateRangeLabel->attributes()['Langcode'];
                            $roomTypes['min']['code'] = (string) $rateRangeLabel->MinLabel->attributes()['RoomTypeCode'];
                            $roomTypes['min']['context'] = (string) $rateRangeLabel->MinLabel->attributes()['RoomTypeCodeContext'];
                            $roomTypes['min']['labels'][$lang] = (string) utf8_decode($rateRangeLabel->MinLabel[0]);

                            $roomTypes['max']['code'] = (string) $rateRangeLabel->MaxLabel->attributes()['RoomTypeCode'];
                            $roomTypes['max']['context'] = (string) $rateRangeLabel->MaxLabel->attributes()['RoomTypeCodeContext'];
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
