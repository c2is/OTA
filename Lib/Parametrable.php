<?php

namespace C2is\OTA\Lib;

class Parametrable
{
    protected $params = array();

    public function getParams()
    {
        return $this->params;
    }

    public function getParam($key, $defaultValue = null)
    {
        $path = explode('.', $key);
        $params = $this->params;
        foreach ($path as $node) {
            if (!isset($params[$node])) {
                return $defaultValue;
            }
            $params = $params[$node];
        }

        return $params;
    }

    public function addParam($key, $value)
    {
        $path = explode('.', $key);
        $this->params = $this->addValueToPath($this->params, $path, $value);
        return $this;
    }

    public function addParams(array $params)
    {
        foreach($params as $key => $value) {
            $this->addParam($key, $value);
        }
        return $this;
    }

    public function setParams(array $params)
    {
        $this->params = $params;
        return $this;
    }

    private function addValueToPath(array $array, array $path, $value)
    {
        $key = array_shift($path);
        if ($path) {
            if (!isset($array[$key]) or !is_array($array[$key])) {
                $array[$key] = array();
            }

            $array[$key] = $this->addValueToPath($array[$key], $path, $value);
        } else {
            $array[$key] = $value;
        }

        return $array;
    }
}
