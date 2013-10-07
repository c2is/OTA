<?php

namespace C2is\OTA\Message\Response;

use C2is\OTA\Model\HotelAvail\HotelAvailData;

class HotelAvail extends AbstractResponse
{
    /**
     * @return mixed This message's name.
     */
    public function getName()
    {
        return 'hotel_avail';
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
        $this->params['room_stays'] = array();
        $this->params['cancel_policies'] = array();
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

        if ($xmlRoomStays = $xml->RoomStays->RoomStay) {
            foreach ($xmlRoomStays as $xmlRoomStay) {
                $roomStay = array();

                if ($basicPropertyInfo = $xmlRoomStay->basicPropertyInfo) {
                    $roomStayAttributes = $basicPropertyInfo->attributes();
                    $roomStay['hotel'] = array();
                    $roomStay['hotel']['chain_code']    = (string) $roomStayAttributes['ChainCode'];
                    $roomStay['hotel']['code']          = (string) $roomStayAttributes['HotelCode'];
                }

                if ($timeSpan = $xmlRoomStay->TimeSpan) {
                    $timeSpanAttributes = $xmlRoomStay->attributes();
                    $roomRate['start_date'] = strtotime((string) $timeSpanAttributes['Start']);
                    $roomRate['end_date']   = strtotime((string) $timeSpanAttributes['End']);
                }

                if ($xmlRoomStay->RoomTypes) {
                    $roomStay['room_types'] = array();
                    foreach ($xmlRoomStay->RoomTypes->RoomType as $xmlRoomType) {
                        $roomType = array();
                        $roomTypeAttributes = $xmlRoomType->attributes();
                        $roomType['code'] = (string) $roomTypeAttributes['RoomTypeCode'];

                        if ($xmlRoomType->RoomDescription) {
                            $roomType['description'] = array();
                            foreach ($xmlRoomType->RoomDescription->Text as $xmlDescription) {
                                $descriptionAttributes = $xmlDescription->attributes();
                                $roomType['description'][$descriptionAttributes['Language']] = (string) $xmlDescription;
                            }
                        }

                        if ($xmlRoomType->AdditionalDetails) {
                            $roomType['details'] = array();
                            foreach ($xmlRoomType->additionalDetails->AdditionalDetail as $xmlDetail) {
                                $detail = array();
                                $detailAttributes = $xmlDetail->attributes();
                                $detail['type'] = (string) $detailAttributes['Type'];

                                $detail['description'] = array();
                                foreach ($xmlDetail->DetailDescription->Text as $xmlDescription) {
                                    $descriptionAttributes = $xmlDescription->attributes();
                                    $detail['description'][$descriptionAttributes['Language']] = (string) $xmlDescription;
                                }
                                $roomType['details'][] = $detail;
                            }
                        }
                        $roomStay['room_types'][] = $roomType;
                    }
                }

                if ($xmlRoomStay->RoomRates) {
                    $roomStay['room_rates'] = array();
                    foreach ($xmlRoomStay->RoomRates->RoomRate as $xmlRoomRate) {
                        $roomRate = array();
                        $roomRateAttributes = $xmlRoomRate->attributes();
                        $roomRate['effective_date'] = strtotime((string) $roomRateAttributes['EffectiveDate']);
                        $roomRate['expire_date']    = strtotime((string) $roomRateAttributes['ExpireDate']);
                        $roomRate['number_units']   = (string) $roomRateAttributes['NumberOfUnits'];

                        $roomRate['plan'] = array();
                        $roomRate['plan']['code']       = (string) $roomRateAttributes['RatePlanCode'];
                        $roomRate['plan']['category']   = (string) $roomRateAttributes['RatePlanCategory'];

                        $roomRate['description'] = array();
                        foreach ($xmlRoomRate->RoomRateDescription->Text as $xmlDescription) {
                            $descriptionAttributes = $xmlDescription->attributes();
                            $rate['description'][$descriptionAttributes['Language']] = (string) $xmlDescription;
                        }

                        foreach ($xmlRoomRate->Rates->Rate as $xmlRate) {
                            $rate = array();
                            $rateAttributes = $xmlRate->attributes();
                            $rate['effective_date']     = (string) $rateAttributes['EffectiveDate'];
                            $rate['expire_date']        = (string) $rateAttributes['ExpireDate'];
                            $rate['time_unit']          = (string) $rateAttributes['RateTimeUnit'];
                            $rate['unit_multiplier']    = (string) $rateAttributes['UnitMultiplier'];

                            $rateAmountAttributes = $xmlRate->Base->attributes();
                            $rate['amount'] = array();
                            $rate['amount']['before_tax']   = (string) $rateAmountAttributes['AmountBeforeTax'];
                            $rate['amount']['after_tax']    = (string) $rateAmountAttributes['AmountAfterTax'];
                            $rate['amount']['currency']     = (string) $rateAmountAttributes['CurrencyCode'];

                            if ($extensions = $xmlRate->TPA_Extensions) {
                                if ($extensions->BookingCancelPolicyRPH) {
                                    $cancelPolicyIdentifierAttributes = $extensions->BookingCancelPolicyRPH->attributes();
                                    $rate['cancel_policy_identifier'] = (string) $cancelPolicyIdentifierAttributes['RPH'];
                                }

                                if ($specialRateInfo = $extensions->SpecialRateInfo) {
                                    if ($specialRateInfo->LastMinute) {
                                        $specialRateAttributes = $specialRateInfo->LastMinute->attributes();
                                        $rate['last_minute'] = (string) $specialRateAttributes['FirstDay'];
                                    }
                                    if ($specialRateInfo->EarlyBooking) {
                                        $specialRateAttributes = $specialRateInfo->EarlyBooking->attributes();
                                        $rate['early_booking'] = (string) $specialRateAttributes['LastDay'];
                                    }
                                    if ($specialRateInfo->Promotion) {
                                        $rate['promotion'] = (string) $specialRateInfo->Promotion;
                                    }
                                    if ($specialRateInfo->Special) {
                                        $rate['special'] = (string) $specialRateInfo->Special;
                                    }

                                    if ($specialRateInfo->FixAmountPricingType) {
                                        $specialRateAttributes = $specialRateInfo->FixAmountPricingType->attributes();
                                        $rate['fix_amount_pricing'] = array();
                                        $rate['fix_amount_pricing']['amount']   = (string) $specialRateAttributes['Amount'];
                                        $rate['fix_amount_pricing']['currency'] = (string) $specialRateAttributes['Currency'];
                                    }
                                    if ($specialRateInfo->FixPercentagePricingType) {
                                        $specialRateAttributes = $specialRateInfo->FixPercentagePricingType->attributes();
                                        $rate['fix_percentage_pricing'] = (string) $specialRateAttributes['Percentage'];
                                    }
                                    if ($specialRateInfo->FreeNight) {
                                        $specialRateAttributes = $specialRateInfo->FreeNight->attributes();
                                        $rate['free_night'] = array();
                                        $rate['free_night']['nb_nights']    = (string) $specialRateAttributes['NbFreeNights'];
                                        $rate['free_night']['min_nights']   = (string) $specialRateAttributes['NbMinNights'];
                                        $rate['free_night']['type']         = (string) $specialRateAttributes['FreeNightsType'];
                                        $rate['free_night']['application']  = (string) $specialRateAttributes['Application'];
                                        $rate['free_night']['percentage']   = (string) $specialRateAttributes['FreePercent'];
                                    }
                                    if ($specialRateInfo->GridPricingType) {
                                        $rate['fix_percentage_pricing'] = (string) $specialRateInfo->GridPricingType;
                                    }
                                }
                            }
                        }

                        $roomStay['room_rates'][] = $roomRate;
                    }
                }

                if ($xmlRoomStay->GuestCounts) {
                    $roomStay['guests'] = array();
                    $guestCountsAttributes = $xmlRoomStay->attributes();
                    $roomStay['guests']['per_room'] = ((string) $guestCountsAttributes['IsPerRoom']) === 'true';
                    $roomStay['guests']['counts'] = array();
                    foreach ($xmlRoomStay->GuestCounts->GuestCount as $xmlGuestCount) {
                        $guestCountAttributes = $xmlGuestCount->attributes();
                        $roomStay['guests']['counts'][] = array(
                            'age_code'  => (string) $guestCountAttributes['AgeQualifyingCode'],
                            'count'     => (string) $guestCountAttributes['Count'],
                        );
                    }
                }

                if ($xmlRoomStay->Total) {
                    $roomStay['amount'] = array();
                    $totalAttributes = $xmlRoomStay->Total->attributes();
                    $roomStay['amount']['before_tax']   = (string) $totalAttributes['AmountBeforeTax'];
                    $roomStay['amount']['after_tax']    = (string) $totalAttributes['AmountAfterTax'];
                    $roomStay['amount']['currency']     = (string) $totalAttributes['CurrencyCode'];

                    if ($xmlTaxes = $xmlRoomStay->Total->Taxes) {
                        $roomStay['tax'] = array();
                        $taxesAttributes = $xmlTaxes->attributes();
                        $roomStay['tax']['amount']      = (string) $taxesAttributes['Amount'];
                        $roomStay['tax']['currency']    = (string) $taxesAttributes['CurrencyCode'];

                        $roomStay['taxes'] = array();
                        foreach ($xmlTaxes->Tax as $xmlTax) {
                            $tax = array();
                            $taxAttributes = $xmlTax->attributes();
                            $tax['percent'] = $taxAttributes['Percent'];
                            $tax['description'] = array();
                            foreach ($xmlTax->TaxDescription->Text as $xmlDescription) {
                                $descriptionAttributes = $xmlDescription->attributes();
                                $roomType['description'][$descriptionAttributes['Language']] = (string) $xmlDescription;
                            }
                        }
                    }
                }

                if ($xmlExtensions = $xmlRoomStay->TPA_Extensions) {
                    if ($xmlExtensions->Services) {

                    }
                }

                $this->params['room_stays'][] = $roomStay;
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
