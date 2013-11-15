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
        return $this->xml;
    }

    public function getData()
    {
        $serializer = \JMS\Serializer\SerializerBuilder::create()->setDebug(true)->build();

        return $serializer->deserialize($this->getXml(), 'C2is\\OTA\\Model\\HotelSearch\\Response\\HotelSearch', 'xml');
    }
}
