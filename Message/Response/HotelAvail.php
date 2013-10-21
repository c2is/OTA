<?php

namespace C2is\OTA\Message\Response;

use C2is\OTA\Model\HotelAvail\CancelPolicyData;
use C2is\OTA\Model\HotelAvail\OccupancyData;
use C2is\OTA\Model\HotelAvail\RateData;
use C2is\OTA\Model\HotelAvail\RoomRateData;
use C2is\OTA\Model\HotelAvail\RoomTypeData;
use C2is\OTA\Model\HotelAvail\ServiceData;
use C2is\OTA\Model\HotelAvail\TaxData;
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
                            foreach ($xmlRoomType->AdditionalDetails->AdditionalDetail as $xmlDetail) {
                                $type = (string) $xmlDetail->DetailDescription->Text;

                                if ('BIG' == $type) {
                                    $roomType['big_thumbnail'] = (string) $xmlDetail->DetailDescription->URL;
                                } elseif ('SMALL' == $type) {
                                    $roomType['small_thumbnail'] = (string) $xmlDetail->DetailDescription->URL;
                                }
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

                $roomStay['services'] = array();
                if ($xmlExtensions = $xmlRoomStay->TPA_Extensions) {
                    if ($xmlExtensions->Services) {
                        foreach ($xmlExtensions->Services->Service as $xmlService) {
                            $service = array();
                            $serviceAttributes = $xmlService->attributes();

                            $service['inclusive']       = (string) $serviceAttributes['Inclusive'];
                            $service['mandatory']       = (string) $serviceAttributes['Mandatory'];
                            $service['night_requested'] = (string) $serviceAttributes['NightRequested'];
                            $service['pax_requested']   = (string) $serviceAttributes['PaxRequested'];
                            $service['inventory_code']  = (string) $serviceAttributes['ServiceInventoryCode'];
                            $service['pricing_type']    = (string) $serviceAttributes['ServicePricingType'];

                            if ($xmlService->Price->Base) {
                                $priceAttributes = $xmlService->Price->Base->attributes();
                                $service['amount'] = array();
                                $service['amount']['before_tax']    = (string) $priceAttributes['AmountBeforeTax'];
                                $service['amount']['after_tax']     = (string) $priceAttributes['AmountAfterTax'];
                                $service['amount']['currency']      = (string) $priceAttributes['CurrencyCode'];
                            }

                            $service['description'] = $this->getTranslatedValue($xmlService->Description);

                            if ($xmlService->Details) {
                                $detailAttributes = $xmlService->Details->attributes();
                                $service['adult']           = (string) $detailAttributes['Adult'];
                                $service['child']           = (string) $detailAttributes['Child'];
                                $service['infant']          = (string) $detailAttributes['Infant'];
                                $service['junior']          = (string) $detailAttributes['Junior'];
                                $service['min_pax']         = (string) $detailAttributes['MinPax'];
                                $service['price_per_night'] = (string) $detailAttributes['PricePerNight'];
                                $service['price_per_pax']   = (string) $detailAttributes['PricePerPax'];
                                $service['senior']          = (string) $detailAttributes['Senior'];
                            }

                            $roomStay['services'][] = $service;
                        }
                    }

                    if ($xmlOccupancy = $xmlExtensions->Occupancy) {
                        $occupancy = array();
                        $occupancyAttributes = $xmlOccupancy->attributes();

                        $occupancy['base']          = (string) $occupancyAttributes['Base'];
                        $occupancy['free_children'] = (string) $occupancyAttributes['FreeChildren'];
                        $occupancy['free_infants']  = (string) $occupancyAttributes['FreeInfants'];
                        $occupancy['free_juniors']  = (string) $occupancyAttributes['FreeJuniors'];
                        $occupancy['min']           = (string) $occupancyAttributes['Min'];
                        $occupancy['max']           = (string) $occupancyAttributes['Max'];
                        $occupancy['max_adults']    = (string) $occupancyAttributes['MaxAdults'];
                        $occupancy['max_children']  = (string) $occupancyAttributes['MaxChildren'];
                        $occupancy['max_infants']   = (string) $occupancyAttributes['MaxInfants'];
                        $occupancy['max_juniors']   = (string) $occupancyAttributes['MaxJuniors'];
                        $occupancy['max_seniors']   = (string) $occupancyAttributes['MaxSeniors'];

                        $occupancy['guest_counts'] = array();
                        if ($xmlOccupancy->GuestCounts) {
                            foreach ($xmlOccupancy->GuestCounts->GuestCount as $xmlGuestCount) {
                                $guestCount = array();
                                $guestCountAttributes = $xmlGuestCount->attributes();

                                $guestCount['age']      = (string) $guestCountAttributes['Age'];
                                $guestCount['age_code'] = (string) $guestCountAttributes['AgeQualifyingCode'];
                                $guestCount['count']    = (string) $guestCountAttributes['Count'];

                                $occupancy['guest_counts'][] = $guestCount;
                            }
                        }

                        $roomStay['occupancy'] = $occupancy;
                    }
                }
                $this->params['room_stays'][] = $roomStay;
            }
        }

        if ($xml->TPA_Extensions and ($xmlCancelPolicies = $xml->TPA_Extensions->BookingCancelPolicies)) {
            foreach ($xmlCancelPolicies->BookingCancelPolicy as $xmlCancelPolicy) {
                $cancelPolicy = array();
                $cancelPolicyAttributes = $xmlCancelPolicy->attributes();

                $cancelPolicy['id']             = (string) $cancelPolicyAttributes['RPH'];
                $cancelPolicy['cancellable']    = (string) $cancelPolicyAttributes['CancellableBooking'];
                $cancelPolicy['editable']       = (string) $cancelPolicyAttributes['EditableBooking'];
                $cancelPolicy['booking_policy'] = $this->getTranslatedValue($xmlCancelPolicy->BookingPolicy->Text);
                $cancelPolicy['cancel_policy']  = $this->getTranslatedValue($xmlCancelPolicy->CancelPolicy->Text);

                $this->params['cancel_policies'][] = $cancelPolicy;
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

                if (isset($roomType['big_thumbnail'])) {
                    $roomTypeData->bigThumbnail = $roomType['big_thumbnail'];
                }
                if (isset($roomType['small_thumbnail'])) {
                    $roomTypeData->smallThumbnail = $roomType['small_thumbnail'];
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

            foreach ($roomStay['services'] as $service) {
                $serviceData = new ServiceData();

                $serviceData->adult     = !(empty($service['adult'])    or $service['adult']    == 'false');
                $serviceData->child     = !(empty($service['child'])    or $service['child']    == 'false');
                $serviceData->infant    = !(empty($service['infant'])   or $service['infant']   == 'false');
                $serviceData->junior    = !(empty($service['junior'])   or $service['junior']   == 'false');
                $serviceData->senior    = !(empty($service['senior'])   or $service['senior']   == 'false');

                $roomStayData->services[] = $serviceData;
            }

            $occupancyData = new OccupancyData();
            if ($occupancy = $roomStay['occupancy']) {
                $occupancyData->base            = $occupancy['base'];
                $occupancyData->min             = $occupancy['min'];
                $occupancyData->max             = $occupancy['max'];
                $occupancyData->freeChildren    = $occupancy['free_children'];
                $occupancyData->freeInfants     = $occupancy['free_infants'];
                $occupancyData->freeJuniors     = $occupancy['free_juniors'];
                $occupancyData->maxAdults       = $occupancy['max_adults'];
                $occupancyData->maxChildren     = $occupancy['max_children'];
                $occupancyData->maxInfants      = $occupancy['max_infants'];
                $occupancyData->maxJuniors      = $occupancy['max_juniors'];
                $occupancyData->maxSeniors      = $occupancy['max_seniors'];

                foreach ($occupancy['guest_counts'] as $guestCount) {
                    $guestCountData = new GuestCountData();

                    $guestCountData->age = $guestCount['age'];
                    $guestCountData->ageQualifyingCode = $guestCount['age_code'];
                    $guestCountData->count = $guestCount['count'];

                    $occupancyData->guestCount[] = $guestCountData;
                }
            }
            $roomStayData->occupancy = $occupancy;
            $data->stays[] = $roomStayData;
        }

        foreach ($this->getParam('cancel_policies', array()) as $cancelPolicy) {
            $cancelPolicyData = new CancelPolicyData();

            $cancelPolicyData->cancelPolicyIdentifier   = $cancelPolicy['id'];
            $cancelPolicyData->cancelableBooking        = $cancelPolicy['cancellable'];
            $cancelPolicyData->editableBooking          = $cancelPolicy['editable'];
            $cancelPolicyData->cancelPolicy             = $cancelPolicy['cancel_policy'];
            $cancelPolicyData->bookingPolicy            = $cancelPolicy['booking_policy'];

            $data->cancelPolicies[$cancelPolicyData->cancelPolicyIdentifier] = $cancelPolicyData;
        }

        return $data;
    }
}
