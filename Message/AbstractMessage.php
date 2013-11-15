<?php

namespace C2is\OTA\Message;

use C2is\OTA\Error;
use C2is\OTA\Exception\MissingParameterException;
use C2is\OTA\Lib\Parametrable;

/**
 * Implements basic methods allowing the generation and reception of OTA messages
 *
 * Class AbstractOtaMessage
 * @package C2is\Bundle\OtaBundle\OTA
 */
abstract class AbstractMessage extends Parametrable
{
    /**
     * @var string The message XML content.
     */
    protected $xml;

    protected $generated = false;

    /**
     * @return mixed An array containing the name of required parameters in the OTA message.
     */
    abstract protected function getRequiredParams();

    /**
     * @return mixed This message's name.
     */
    abstract public function getName();

    abstract protected function generateXml();

    abstract public function getData();

    /**
     * @return string A unique identifier.
     */
    protected function generateEcho()
    {
        return uniqid();
    }

    /**
     * @return string The current UTC timestamp formatted in accordance to OTA standards.
     */
    protected function getTimestamp()
    {
        return gmdate('Y-m-d\TH:i:s\Z');
    }

    /**
     * @return string The generated message XML.
     * @throws MissingParameterException If any of the parameters returned by getRequiredParamns() is not set.
     */
    public function getXml()
    {
        if (!$this->generated) {
            foreach ($this->getRequiredParams() as $key => $value) {
                $paramName = is_int($key) ? $value : $key;
                if (!is_int($key) and !$this->getParam($paramName) and $value) {
                    $this->addParam($paramName, $value);
                }

                if ($this->getParam($paramName, null) === null) {
                    throw new MissingParameterException(sprintf('Parameter "%s" is required and was not found.', $paramName));
                }
            }

            $this->xml = $this->generateXml();
            $this->generated = true;
        } else {

        }

        return $this->xml;
    }

    public function setXml($xml)
    {
        $this->xml = $xml;
        $this->generated = true;
    }

    protected function generatePOSNode(\DOMDocument $dom)
    {
        $pos = $dom->createElement('POS');
        $source = $dom->createElement('Source');
        $requestorId = $dom->createElement('RequestorID');

        $requestorId->setAttribute('ID'     , $this->getParam('requestor.id'));
        $requestorId->setAttribute('Type'   , $this->getParam('requestor.type'));

        $companyName = $dom->createElement('CompanyName');
        $companyName->appendChild($dom->createTextNode($this->getParam('company_name')));

        $requestorId->appendChild($companyName);
        $source->appendChild($requestorId);
        $pos->appendChild($source);

        return $pos;
    }

    public function addParam($key, $value)
    {
        $this->generated = false;
        return parent::addParam($key, $value);
    }

    public function addParams(array $params)
    {
        $this->generated = false;
        return parent::addParams($params);
    }

    public function setParams(array $params)
    {
        $this->generated = false;
        return parent::setParams($params);
    }

    protected function getTranslatedValue($xmlNode) {
        $translatedValue = array();
        foreach ($xmlNode as $translationNode) {
            $translationAttributes = $translationNode->attributes();
            $translatedValue[(string) $translationAttributes['Language']] = (string) $translationNode;
        }

        return $translatedValue;
    }
}
