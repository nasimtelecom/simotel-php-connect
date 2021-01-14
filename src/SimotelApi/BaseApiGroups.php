<?php

namespace Hsy\Simotel\SimotelApi;

class BaseApiGroups
{
    private $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    public function __call($name, $arguments)
    {
        $config = $arguments[0] ?? $this->config;
        $httpClient = $arguments[1] ?? null;

        $className = $this->namespace.ucfirst($name);
        if (class_exists($className)) {
            return new $className($config, $httpClient);
        } else {
            throw new \Exception("class $className not found");
        }
    }
}
