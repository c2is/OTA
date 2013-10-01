<?php

namespace C2is\OTA;

use C2is\OTA\Message\AbstractMessage;

abstract class Container
{
    /**
     * Age Qualifying Code for infants
     */
    const _AGE_CODE_INFANT = 7;

    /**
     * Age Qualifying Code for children
     */
    const _AGE_CODE_CHILDREN = 8;

    /**
     * Age Qualifying Code for juniors
     */
    const _AGE_CODE_JUNIOR = 9;

    /**
     * Age Qualifying Code for adults
     */
    const _AGE_CODE_ADULT = 10;

    /**
     * Age Qualifying Code for seniors
     */
    const _AGE_CODE_SENIOR = 11;

    /**
     * @var AbstractMessage
     */
    protected $message;

    /**
     * @var string
     */
    protected $service;

    /**
     * @param $service
     * @param $content
     */
    public function __construct($service, $content)
    {
        if (!class_exists($messageClass = sprintf('\\C2is\\OTA\\Message\\%s\\%s', $this->getType(), $service)) or ! (($message = new $messageClass()) instanceof AbstractMessage)) {
            throw new \Exception(sprintf('OTA %s Message %s does not exist.', $this->getType(), $service));
        }

        $this->service = $service;
        if (is_array($content)) {
            $message->setParams($content);
        } else {
            $message->setXml($content);
        }

        $this->message = $message;
    }

    /**
     * @return AbstractMessage
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @return string
     */
    public function getXml()
    {
        return $this->message->getXml();
    }

    /**
     * @param array $params
     */
    public function addParams(array $params)
    {
        $this->message->addParams($params);
    }

    /**
     * @param $key
     * @param $value
     */
    public function addParam($key, $value)
    {
        $this->message->addParam($key, $value);
    }

    /**
     * @return mixed
     */
    abstract protected function getType();
}
