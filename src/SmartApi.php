<?php

namespace Hsy\Simotel;

class SmartApi
{
    private $config;
    private $errorMessage;
    private $response;

    public function __construct(array $smartApiConfig = [])
    {
        $this->config = $smartApiConfig;
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
            return $this->fail("SmartApi data has not 'app_name' index");
        }

        $className = $this->findAppClass($appName);
        if (!$className) {
            return false;
        }

        $class = new $className();
        if (!method_exists($class, $appName)) {
            return $this->fail("Responsible method for app name not found in '{$className}' ");
        }

        $response = $class->$appName($data);
        if (!is_array($response)) {
            return $this->fail('Returned data must be array');
        }

        $this->response = $response;

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
        if (!isset($this->config['appClasses'])) {
            return $this->fail("'appClasses' not defined in config");
        }

        $appClasses = $this->config['appClasses'];

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
