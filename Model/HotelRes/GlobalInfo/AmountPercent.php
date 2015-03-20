<?php

namespace C2is\OTA\Model\HotelRes\GlobalInfo;

use JMS\Serializer\Annotation as DI;

/**
 * Class AmountPercent
 * @package C2is\OTA\Model\HotelRes\GlobalInfo
 */
class AmountPercent
{
    /**
     * @DI\SerializedName("Amount")
     * @DI\Type("string")
     * @DI\XmlAttribute
     * @var string
     */
    private $amount;

    /**
     * @DI\SerializedName("Percent")
     * @DI\Type("string")
     * @DI\XmlAttribute
     * @var string
     */
    private $percent;

    /**
     * @param string $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * @param string $percent
     */
    public function setPercent($percent)
    {
        $this->percent = $percent;
    }
}
