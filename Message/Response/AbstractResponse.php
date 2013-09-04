<?php

namespace C2is\OTA\Message\Response;

use C2is\OTA\Message\AbstractMessage;
use C2is\OTA\OtaError;

abstract class AbstractResponse extends AbstractMessage
{
    protected $errors = array();

    protected $success = true;

    public function getErrors()
    {
        return $this->errors;
    }

    public function addError(OtaError $error)
    {
        $this->errors[] = $error;
        $this->success = false;
        return $this;
    }

    public function isSuccessful()
    {
        return $this->success;
    }

    public function setSuccessful(boolean $success)
    {
        $this->success = $success;
    }

    /**
     * @param $xml The response XML.
     * @return array An array of OtaErrors
     */
    public function getErrorsFromXml(\SimpleXMLElement $xml)
    {
        if ($xml->Errors->Error) {
            foreach ($xml->Errors->Error as $xmlError) {
                $objError = new OtaError();
                $errorCode = $xmlError->xpath('@Code');
                $objError->setCode((string) $errorCode[0]);
                $errorType = $xmlError->xpath('@Type');
                $objError->setCode((string) $errorType[0]);
                $objError->setMessage((string) $xmlError);

                $this->addError($objError);
            }
        }

        return $this;
    }
}
