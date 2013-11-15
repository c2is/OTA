<?php

namespace C2is\OTA\Model\Common\Taxes;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

class Taxes
{
    /**
     * @SerializedName("Amount")
     * @XmlAttribute
     * @Type("double")
     * @var double
     */
    private $amount;
    /**
     * @SerializedName("CurrencyCode")
     * @XmlAttribute
     * @Type("string")
     * @var string
     */
    private $currency;

    /**
     * @XmlList(inline=true, entry="Tax")
     * @Type("array<C2is\OTA\Model\Common\Taxes\Tax>")
     * @var array
     */
    private $tax;

    /**
     * @param double $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return double
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param array $tax
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * @param Tax $tax
     */
    public function addTax(Tax $tax)
    {
        $this->tax[] = $tax;

        return $this;
    }

    /**
     * @return array
     */
    public function getTax()
    {
        return $this->tax;
    }
}
