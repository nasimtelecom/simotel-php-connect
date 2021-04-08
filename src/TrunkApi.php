<?php

namespace Hsy\Simotel;

class TrunkApi
{
    private $config;
    private $errorMessage;

    public function __construct(array $trunkApiConfig = [])
    {
        $this->config = $trunkApiConfig;
    }

    /**
     * @param $data
     *
     * @return $this|bool
     */
    public function call($data)
    {
        $appName = $data['app_name'] ?? '';
        if (!$appName) {
            return $this->fail("trunkApi data has not 'app_name' index");
        }

        $className = $this->findAppClass($appName);
        if (!$className) {
            return false;
        }

        $class = new $className();
        if (!method_exists($class, $appName)) {
            return $this->fail("Responsible method for app name not found in '{$className}' ");
        }

        $trunk = $class->$appName($data);
        if (!is_array($trunk)) {
            return $this->fail('Returned data must be type of array');
        }

        $this->response = [
            "ok" => "1",
            "trunk" => $trunk["trunk"],
            "extension" => $trunk["extension"],
            "call_limit" => $trunk["call_limit"],
        ];

        return $this;
    }

    public function __toString()
    {
        return $this->toJson();
    }

    public function toJson()
    {
        return json_encode($this->response);
    }

    public function toArray()
    {
        return $this->response;
    }

    /**
     * @param $appName
     *
     * @return |null
     */
    private function findAppClass($appName)
    {
        if (!isset($this->config['apps'])) {
            return $this->fail("'apps' not defined in config");
        }

        $appClasses = $this->config['apps'];

        if (isset($appClasses[$appName])) {
            return $appClasses[$appName];
        }

        if (isset($appClasses['*'])) {
            return $appClasses['*'];
        }

        return $this->fail('Responsible class for app name not found');
    }

    /**
     * @param null $message
     *
     * @return bool
     */
    private function fail($message = null)
    {
        $this->errorMessage = $message;

        return false;
    }
}
