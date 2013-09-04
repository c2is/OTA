<?php

namespace C2is\OTA;

use C2is\OTA\Message\AbstractMessage;

abstract class Container
{
    protected $message;

    protected $service;

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

    public function getMessage()
    {
        return $this->message;
    }

    public function getService()
    {
        return $this->service;
    }

    public function getXml()
    {
        return $this->message->getXml();
    }

    public function addParams(array $params)
    {
        $this->message->addParams($params);
    }

    public function addParam($key, $value)
    {
        $this->message->addParam($key, $value);
    }

    abstract protected function getType();
}
