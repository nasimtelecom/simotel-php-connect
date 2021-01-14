<?php

namespace Hsy\Simotel\SimotelApi;

class ApiRequestData
{
    private $config;
    private $method;
    private $userDataInput;

    public $uri;
    public $data;
    public $requestMethod;

    public function __construct($config, $method, $userDataInput)
    {
        $this->config = $config;
        $this->method = $method;
        $this->userDataInput = $userDataInput;

        $this->prepareData();
    }

    private function prepareData()
    {
        $this->data = $this->makeRequestBody(
            $this->userDataInput,
            $this->method
        );

        $this->uri = $this->config['address'];
        $this->requestMethod = $this->config['request_method'];
    }

    private function makeRequestBody(array $inputs, string $defaultKey)
    {
        return array_merge($inputs, $this->getDefaultRequestBody($defaultKey));
    }

    private function getDefaultRequestBody(string $methodName)
    {
        return $this->config['default_request_data'] ?? [];
    }

    private function makeUriAddress($methodName)
    {
        return $this->config['api_addresses'][$this->makeConfigKey($methodName)];
    }
}
