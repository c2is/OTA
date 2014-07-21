<?php

namespace C2is\OTA\Model\Common;

use JMS\Serializer\Annotation as DI;

/**
 * Class Warning
 * @package C2is\OTA\Model\Common
 * @DI\AccessType("public_method")
 */
class Warning
{
    /**
     * @DI\SerializedName("Code")
     * @DI\XmlAttribute
     * @DI\Type("string")
     * @var string
     */
    private $code;

    /**
     * @DI\SerializedName("Type")
     * @DI\XmlAttribute
     * @DI\Type("string")
     * @var string
     */
    private $type;

    /**
     * @DI\SerializedName("Message")
     * @DI\XmlValue
     * @DI\Type("string")
     * @var string
     */
    private $message;

    /**
     * @param string $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
