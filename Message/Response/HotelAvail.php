<?php

namespace C2is\OTA\Message\Response;

use C2is\OTA\Model\HotelAvail\RateData;
use C2is\OTA\Model\HotelAvail\RoomRateData;
use C2is\OTA\Model\HotelAvail\RoomTypeData;
use C2is\OTA\Model\HotelAvail\TaxData;
use C2is\OTA\Model\HotelAvail\AdditionalDetailData;
use C2is\OTA\Model\HotelAvail\GuestCountData;
use C2is\OTA\Model\HotelAvail\HotelAvailData;
use C2is\OTA\Model\HotelAvail\RoomStayData;

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

                if ($basicPropertyInfo = $xmlRoomStay->BasicPropertyInfo) {
                    $roomStayAttributes = $basicPropertyInfo->attributes();
                    $roomStay['hotel'] = array();
                    $roomStay['hotel']['chain_code']    = (string) $roomStayAttributes['ChainCode'];
                    $roomStay['hotel']['code']          = (string) $roomStayAttributes['HotelCode'];
                }

                if ($timeSpan = $xmlRoomStay->TimeSpan) {
                    $timeSpanAttributes = $xmlRoomStay->attributes();
                    $roomStay['start_date'] = strtotime((string) $timeSpanAttributes['Start']);
                    $roomStay['end_date']   = strtotime((string) $timeSpanAttributes['End']);
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
                                $roomType['description'][(string) $descriptionAttributes['Language']] = (string) $xmlDescription;
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
                                    $detail['description'][(string) $descriptionAttributes['Language']] = (string) $xmlDescription;
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
                        if ($xmlRoomRate->RoomRateDescription->Text) {
                            foreach ($xmlRoomRate->RoomRateDescription->Text as $xmlDescription) {
                                $descriptionAttributes = $xmlDescription->attributes();
                                $rate['description'][(string) $descriptionAttributes['Language']] = (string) $xmlDescription;
                            }
                        }

                        $roomRate['rates'] = array();
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
                                        $rate['grid_pricing'] = (string) $specialRateInfo->GridPricingType;
                                    }
                                }
                            }

                            $roomRate['rates'][] = $rate;
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
                            'age'       => (string) $guestCountAttributes['Age'],
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
                                $roomType['description'][(string) $descriptionAttributes['Language']] = (string) $xmlDescription;
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
        $data = new HotelAvailData();

        foreach ($this->getParam('room_stays', array()) as $roomStay) {
            $roomStayData = new RoomStayData();
            $roomStayData->chainCode = $roomStay['hotel']['chain_code'];
            $roomStayData->hotelCode = $roomStay['hotel']['code'];

            foreach ($roomStay['room_types'] as $roomType) {
                $roomTypeData = new RoomTypeData();

                $roomTypeData->code = $roomType['code'];
                $roomTypeData->description = $roomType['description'];

                if (isset($roomType['details'])) {
                    foreach ($roomType['details'] as $detail) {
                        $detailData = new AdditionalDetailData();

                        $detailData->detailType = $detail['type'];
                        $detailData->detailDescription = $detail['description'];

                        $roomTypeData->details[] = $detailData;
                    }
                }

                $roomStayData->roomTypes[] = $roomTypeData;
            }

            foreach ($roomStay['room_rates'] as $roomRate) {
                $roomRateData = new RoomRateData();

                $roomRateData->planCode         = $roomRate['plan']['code'];
                $roomRateData->planCategory     = $roomRate['plan']['category'];
                $roomRateData->effectiveDate    = $roomRate['effective_date'];
                $roomRateData->expireDate       = $roomRate['expire_date'];
                $roomRateData->numberOfUnits    = $roomRate['number_units'];
                $roomRateData->description      = $roomRate['description'];

                foreach ($roomRate['rates'] as $rate) {
                    $rateData = new RateData();

                    $rateData->effectiveDate    = $rate['effective_date'];
                    $rateData->expireDate       = $rate['expire_date'];
                    $rateData->timeUnit         = $rate['time_unit'];
                    $rateData->unitMultiplier   = $rate['unit_multiplier'];
                    $rateData->amountBeforeTax  = $rate['amount']['before_tax'];
                    $rateData->amountAfterTax   = $rate['amount']['after_tax'];
                    $rateData->currencyCode     = $rate['amount']['currency'];
                    $rateData->isLastMinute     = !empty($rate['last_minute']);
                    if ($rateData->isLastMinute) {
                        $rateData->firstDay  = $rate['last_minute'];
                    }
                    $rateData->isEarlyBooking = !empty($rate['early_booking']);
                    if ($rateData->isEarlyBooking) {
                        $rateData->lastDay = $rate['early_booking'];
                    }
                    if (!empty($rate['promotion'])) {
                        $rateData->promotion = $rate['promotion'];
                    }
                    if (!empty($rate['special'])) {
                        $rateData->special = $rate['special'];
                    }
                    $rateData->hasFixAmountPricing = !empty($rate['fix_amount_pricing']['amount']);
                    if ($rateData->hasFixAmountPricing) {
                        $rateData->fixAmount            = $rate['fix_amount_pricing']['amount'];
                        $rateData->fixAmountCurrency    = $rate['fix_amount_pricing']['currency'];
                    }
                    $rateData->hasFixPercentagePricing = !empty($rate['fix_percentage_pricing']);
                    if ($rateData->hasFixPercentagePricing) {
                        $rateData->fixPercentage = $rate['fix_percentage_pricing'];
                    }
                    $rateData->hasFreeNights = !empty($rate['free_night']['nb_nights']);
                    if ($rateData->hasFreeNights) {
                        $rateData->nbFreeNights             = $rate['free_night']['nb_nights'];
                        $rateData->nbMinNights              = $rate['free_night']['min_nights'];
                        $rateData->freeNightsType           = $rate['free_night']['type'];
                        $rateData->freeNightsApplication    = $rate['free_night']['application'];
                        $rateData->freeNightsPercentage     = $rate['free_night']['percentage'];
                    }
                    $rateData->hasGridPricing           = !empty($rate['grid_pricing']);
                    $rateData->cancelPolicyIdentifier   = $rate['cancel_policy_identifier'];

                    $roomRateData->rates[] = $rateData;
                }

                $roomStayData->roomRates[] = $roomRateData;
            }

            $roomStayData->guestCountPerRoom = $roomStay['guests']['per_room'];
            foreach ($roomStay['guests']['counts'] as $guestCount) {
                $guestCountData = new GuestCountData();

                $guestCountData->age                = $guestCount['age'];
                $guestCountData->ageQualifyingCode  = $guestCount['age_code'];
                $guestCountData->count              = $guestCount['count'];

                $roomStayData->guestCounts[] = $guestCountData;
            }

            $roomStayData->timeStart            = $roomStay['start_date'];
            $roomStayData->timeEnd              = $roomStay['end_date'];
            $roomStayData->totalBeforeTax       = $roomStay['amount']['before_tax'];
            $roomStayData->totalAfterTax        = $roomStay['amount']['after_tax'];
            $roomStayData->currencyCode         = $roomStay['amount']['currency'];
            $roomStayData->taxesAmount          = $roomStay['tax']['amount'];
            $roomStayData->taxesCurrencyCode    = $roomStay['tax']['currency'];

            foreach ($roomStay['taxes'] as $tax) {
                $taxData = new TaxData();

                $taxData->percent       = $tax['percent'];
                $taxData->description   = $tax['description'];

                $roomStayData->taxes[] = $taxData;
            }

            $data->stays[] = $roomStayData;
        }

        return $data;
    }
}
