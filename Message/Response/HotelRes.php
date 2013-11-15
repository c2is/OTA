<?php

namespace C2is\OTA\Message\Response;

use C2is\OTA\Message\Response\AbstractResponse;
use C2is\OTA\Model\Common\Comment;
use C2is\OTA\Model\HotelRes\Base;
use C2is\OTA\Model\HotelRes\Extensions;
use C2is\OTA\Model\HotelRes\GlobalInfo\Guarantee;
use C2is\OTA\Model\HotelRes\GlobalInfo\HotelReservationId;
use C2is\OTA\Model\HotelRes\GlobalInfo\PaymentCard;
use C2is\OTA\Model\HotelRes\Guest;
use C2is\OTA\Model\HotelRes\GuestCount;
use C2is\OTA\Model\HotelRes\HotelReservation;
use C2is\OTA\Model\HotelRes\Rate;
use C2is\OTA\Model\HotelRes\RedeemedNight;
use C2is\OTA\Model\HotelRes\RedeemedNights;
use C2is\OTA\Model\HotelRes\RoomRate;
use C2is\OTA\Model\HotelRes\RoomStay;
use C2is\OTA\Model\HotelRes\RoomType;
use C2is\OTA\Model\HotelRes\Service;
use C2is\OTA\Model\HotelRes\ServiceRph;
use C2is\OTA\Model\Common\Taxes\Tax;
use C2is\OTA\Model\Common\Taxes\TaxDescription;
use C2is\OTA\Model\Common\Total;
use JMS\Serializer\SerializerBuilder;

/**
 * Class HotelRes
 * @package Seh\Bundle\ReservitBundle\OTA
 */
class HotelRes extends AbstractResponse
{
    public function getName()
    {
        return 'hotel_res';
    }

    protected function getRequiredParams()
    {
        return array(
            'echo'          => $this->generateEcho(),
        );
    }

    protected function generateXml()
    {
        $hotelRes = new \C2is\OTA\Model\HotelRes\HotelRes();
        $hotelRes->setEchoToken($this->getParam('echo'));
        $hotelRes->setRequestorId($this->getParam('requestor.id'));
        $hotelRes->setRequestorType($this->getParam('requestor.type'));
        $hotelRes->setRequestorCompanyName($this->getParam('company_name'));
        $hotelRes->setVersion($this->getParam('ota.version'));
        $hotelRes->setXmlns($this->getParam('ota.namespace'));
        $hotelRes->setBookingType($this->getParam('booking.type'));
        $hotelRes->setBookingCompanyCode($this->getParam('booking.company_code'));
        $hotelRes->setBookingCompanyName($this->getParam('booking.company_name'));
        $hotelRes->setStatus($this->getParam('status'));

        foreach ($this->getParam('reservations') as $reservation) {
            $hotelRes->addReservation($hotelReservation = new HotelReservation());

            if ($hotelRes->getStatus() == 'Initiate') {
                $hotelReservation->setCreateDateTime(new \DateTime());
            } elseif ($hotelRes->getStatus() == 'Modify') {
                $hotelReservation->setLastModifyDateTime(new \DateTime());
            }

            foreach ($reservation['room_stays'] as $roomStay) {
                $hotelReservation->addRoomStay($objRoomStay = new RoomStay());
                foreach ($roomStay['room_types'] as $roomType) {
                    $objRoomStay->addRoomType($objRoomType = new RoomType());
                    $objRoomType->setCode($roomType['code']);
                    $objRoomType->setNumberOfUnits($roomType['number_of_units']);
                }

                foreach ($roomStay['room_rates'] as $roomRate) {
                    $objRoomStay->addRoomRate($objRoomRate = new RoomRate());
                    $objRoomRate->setNumberOfUnits($roomRate['number_of_units']);
                    if ($roomRate['rate_plan_category'] != 'RAC') {
                        $objRoomRate->setCode($roomRate['rate_plan_code']);
                    }
                    $objRoomRate->setCategory($roomRate['rate_plan_category']);

                    foreach ($roomRate['rates'] as $rate) {
                        $objRoomRate->addRate($objRate = new Rate());
                        $objRate->setEffectiveDate($rate['start_date']);
                        $objRate->setExpireDate($rate['end_date']);

                        $objRate->setBase($objBase = new Base());
                        $base = $rate['base'];
                        $objBase->setAmountAfterTax($base['after_tax']);
                        $objBase->setAmountBeforeTax($base['before_tax']);
                        $objBase->setCurrency($base['currency']);

                        if (isset($rate['extensions'])) {
                            $objBase->setExtensions($objExtensions = new Extensions());
                            $objExtensions->setRedeemedNights($objRedeemedNights = new RedeemedNights());
                            $extensions = $rate['extensions'];

                            $objRedeemedNights->setProgramId($extensions['program_id']);
                            foreach ($extensions['nights'] as $night) {
                                $objRedeemedNights->addRedeemedNight($objRedeemedNight = new RedeemedNight());
                                $objRedeemedNight->setDate($night['date']);
                            }
                        }
                    }
                }

                foreach ($roomStay['guest_counts'] as $guestCount) {
                    $objRoomStay->addGuestCount($objGuestCount = new GuestCount());
                    $objGuestCount->setAge($guestCount['age']);
                    $objGuestCount->setAgeCode($guestCount['age_code']);
                    $objGuestCount->setCount($guestCount['count']);
                }

                if (isset($roomStay['timespan'])) {
                    $objRoomStay->setTimespan($objTimespan = new Timespan());
                    $objTimespan->setStart($roomStay['timespan']['start']);
                    $objTimespan->setEnd($roomStay['timespan']['end']);
                }

                if (isset($roomStay['total'])) {
                    $objTotal = $objRoomStay->getTotal();
                    $objTotal->setBeforeTax($roomStay['total']['before_tax']);
                    $objTotal->setAfterTax($roomStay['total']['after_tax']);
                    $objTotal->setCurrency($roomStay['total']['currency']);

                    foreach ($roomStay['total']['taxes'] as $tax) {
                        $objTotal->addTax($objTax = new Tax());
                        $objTax->setAmount($tax['amount']);

                        foreach ($tax['description'] as $taxDescription) {
                            $objTax->addDescription($objDescription = new TaxDescription());
                            $objDescription->setDescription($taxDescription['description']);
                            $objDescription->setLanguage($taxDescription['lang']);
                        }
                    }
                }

                if (isset($roomStay['hotel'])) {
                    $objBasicPropertyInfo = $objRoomStay->getBasicPropertyInfo();
                    $objBasicPropertyInfo->setChainCode($roomStay['hotel']['chain_code']);
                    $objBasicPropertyInfo->setHotelCode($roomStay['hotel']['code']);
                }

                if (isset($roomStay['services'])) {
                    foreach ($roomStay['services'] as $service) {
                        $objRoomStay->addServiceRph($objServiceRph = new ServiceRph());
                        $objServiceRph->setIsPerRoom($service['per_room']);
                        $objServiceRph->setRph($service['rph']);
                    }
                }
            }

            foreach ($reservation['services'] as $service) {
                $hotelReservation->addService($objService = new Service());
                $objService->setRph($service['rph']);
                $objService->setInventoryCode($service['inventory_code']);
                $objService->setPricingType($service['pricing_type']);
                $objService->setQuantity($service['quantity']);

                $amount = $service['amount'];
                $objBase = $objService->getPrice()->getBase();
                if (isset($amount['after_tax'])) {
                    $objBase->setAfterTax($amount['after_tax']);
                }
                if (isset($amount['before_tax'])) {
                    $objBase->setBeforeTax($amount['before_tax']);
                }
                if (isset($amount['currency'])) {
                    $objBase->setCurrency($amount['currency']);
                }

                if (in_array($objService->getPricingType(), array(Service::PRICING_TYPE_PER_NIGHT, Service::PRICING_TYPE_PER_PERSON_PER_NIGHT)) and isset($service['details'])) {
                    $details = $service['details'];
                    if (isset($details['duration'])) {
                        $objService->getDetails()->getTimespan()->setDuration($details['duration']);
                    }
                }
            }

            foreach ($reservation['guests'] as $guest) {
                $hotelReservation->addGuest($objGuest = new Guest());
                $objGuest->setRph($guest['rph']);

                $objGuest->addCustomer($objCustomer = new Guest\Customer());
                $objCustomer->setEmail($guest['email']);
                $objCustomer->setCurrency($guest['currency']);
                $objCustomer->setGender($guest['gender']);

                if (isset($guest['person_name'])) {
                    $objCustomer->setPersonName($objPersonName = new Guest\PersonName());
                    $objPersonName->setGivenName($guest['person_name']['given_name']);
                    $objPersonName->setSurName($guest['person_name']['surname']);
                }

                if (isset($guest['address'])) {
                    $objCustomer->setAddress($objAddress = new Guest\Address());
                    $objAddress->setLine($guest['address']['line']);
                    $objAddress->setCity($guest['address']['city']);
                    $objAddress->setPostalCode($guest['address']['postal_code']);
                    if (isset($guest['address']['country'])) {
                        $objAddress->setCountryName($guest['address']['country']['name']);
                        $objAddress->setCountryCode($guest['address']['country']['code']);
                    }
                }

                if (isset($guest['telephone'])) {
                    $objCustomer->setTelephone($objTelephone = new Guest\Telephone());
                    $objTelephone->setCountryAccessCode($guest['telephone']['country_access_code']);
                    $objTelephone->setNumber($guest['telephone']['number']);
                }

                if (isset($guest['loyalty'])) {
                    $objCustomer->setLoyalty($objLoyalty = new Guest\Loyalty());
                    $objLoyalty->setMembershipId($guest['loyalty']['membership_id']);
                    $objLoyalty->setProgramId($guest['loyalty']['program_id']);
                }

                if (isset($guest['comments'])) {
                    foreach ($guest['comments'] as $comment) {
                        $objGuest->addComment($objComment = new Comment());
                        $objComment->setText($comment);
                    }
                }
            }
        }

        if ($globalInfo = $this->getParam('global_info')) {
            $hotelReservation->setGlobalInfo($objGlobalInfo = new GlobalInfo());

            if (isset($globalInfo['guarantee'])) {
                $objGlobalInfo->setGuarantee($objGuarantee = new Guarantee());

                if (isset($globalInfo['guarantee']['guarantees_accepted'])) {
                    foreach ($globalInfo['guarantee']['guarantees_accepted'] as $guaranteeAccepted) {
                        $objGuarantee->addPaymentCard($objPaymentCard = new PaymentCard());
                        $objPaymentCard->setCardHolderName($guaranteeAccepted['card_holder_name']);
                        $objPaymentCard->setCardNumber($guaranteeAccepted['card_number']);
                        $objPaymentCard->setCardType($guaranteeAccepted['card_type']);
                        $objPaymentCard->setExpireDate($guaranteeAccepted['card_expire_date']);
                        $objPaymentCard->setSeriesCode($guaranteeAccepted['card_series_code']);
                    }
                }
            }

            if (isset($globalInfo['total'])) {
                $objGlobalInfo->setTotal($objTotal = new Total());
                $objTotal->setAfterTax($globalInfo['total']['after_tax']);
                $objTotal->setBeforeTax($globalInfo['total']['before_tax']);
                if (isset($globalInfo['total']['currency'])) {
                    $objTotal->setCurrency($globalInfo['total']['currency']);
                }

                if (isset($globalInfo['total']['taxes'])) {
                    foreach ($globalInfo['total']['taxes'] as $tax) {
                        $objTotal->addTax($objTax = new Tax());
                        $objTax->setAmount($tax['amount']);
                        $objTax->setPercent($tax['percent']);
                    }
                }
            }

            if (isset($globalInfo['hotel_reservation_ids'])) {
                foreach ($globalInfo['hotel_reservation_ids'] as $hotelReservationId) {
                    $objGlobalInfo->addHotelReservationId($objHotelReservationId = new HotelReservationId());
                    $objHotelReservationId->setSource($hotelReservationId['source']);
                    $objHotelReservationId->setValue($hotelReservationId['value']);
                }
            }

            if (isset($globalInfo['comments'])) {
                foreach ($globalInfo['comments'] as $comment) {
                    $objGlobalInfo->addComment(new Comment($comment));
                }
            }
        }

        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();

        return $serializer->serialize($hotelRes, 'xml');
    }

    public function getData()
    {
        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();

        return $serializer->deserialize($this->getXml(), 'C2is\\OTA\\Model\\HotelRes\\HotelRes', 'xml');
    }
}
