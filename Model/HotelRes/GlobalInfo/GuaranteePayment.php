<?php

namespace C2is\OTA\Model\HotelRes\GlobalInfo;

use JMS\Serializer\Annotation as DI;

/**
 * Class GuaranteePayment
 * @package C2is\OTA\Model\HotelRes\GlobalInfo
 */
class GuaranteePayment
{
    /**
     * @DI\SerializedName("AmountPercent")
     * @DI\Type("C2is\OTA\Model\HotelRes\GlobalInfo\AmountPercent")
     * @var AmountPercent
     */
    private $amountPercent;

    /**
     * @param AmountPercent $amountPercent
     * @return $this
     */
    public function setAmountPercent($amountPercent)
    {
        $this->amountPercent = $amountPercent;

        return $this;
    }

    /**
     * @return AmountPercent
     */
    public function getAmountPercent()
    {
        return $this->amountPercent;
    }
}
