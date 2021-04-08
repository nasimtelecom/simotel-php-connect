<?php

namespace Hsy\Simotel;

class ExtensionApi
{
    private $config;
    private $errorMessage;

    public function __construct(array $extensionApiConfig = [])
    {
        $this->config = $extensionApiConfig;
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
            return $this->fail("ExtensionApi data has not 'app_name' index");
        }

        $className = $this->findAppClass($appName);
        if (!$className) {
            return false;
        }

        $class = new $className();
        if (!method_exists($class, $appName)) {
            return $this->fail("Responsible method for app name not found in '{$className}' ");
        }

        $case = $class->$appName($data);
        if (!is_string($case)) {
            return $this->fail('Returned data must be type of string');
        }

        $this->response = [
            "ok" => "1",
            "extension" => $case
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
