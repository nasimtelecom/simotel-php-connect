<?php

namespace Hsy\Simotel\SimotelApi;

use GuzzleHttp\Client;
use Hsy\Simotel\Simotel;
use Hsy\Simotel\SimotelApi\Exceptions\SimotelApiConfigException;

class SimotelApiCenter extends Simotel
{
    protected $config;

    /**
     * @var Client
     */
    private $client;

    /**
     * SimotelApiCenter constructor.
     *
     * @param array|null  $config
     * @param Client|null $client
     */
    public function __construct(array $config = null, Client $client = null)
    {
        $this->setConfig($config);
        $this->client = $client ?: $this->makeHttpClient();

        parent::__construct();
    }

    /**
     * @param array|null $config
     */
    public function setConfig(array $config = null)
    {
        $this->config = $config ?: $this->loadDefaultConfig()['simotelApi'];
    }

    /**
     * @return array
     */
    public function makeHttpRequestOptions()
    {
        return [
            'auth' => [
                $this->config['connect']['user'] ?? '', //basic auth username
                $this->config['connect']['pass'] ?? '',  //basic auth password
            ],
            'headers' => [
                'X-APIKEY' => $this->config['connect']['token'],
            ],
        ];
    }

    /**
     * @param $uri
     * @param array  $requestBody
     * @param string $method
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return bool|string
     */
    protected function sendRequest($uri, $requestBody = [], $method = 'POST')
    {
        $options = $this->makeHttpRequestOptions();
        $options['json'] = $requestBody;

        $response = $this->client->request($method, $uri, $options);

        return new Response($response);
    }

    /**
     * @return Client
     */
    protected function makeHttpClient()
    {
        return new Client([
            'base_uri' => $this->config['connect']['server_address'],
        ]);
    }

    /**
     * @param $methodName
     * @param $arguments
     *
     * @throws SimotelApiConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function __call($methodName, $arguments)
    {
        if (!isset($this->config['methods'][$this->makeConfigKey($methodName)])) {
            throw new SimotelApiConfigException("method '$methodName' not defined in simotel api config");
        }

        $parameters = $arguments[0] ?? [];
        $userDataInput = $parameters instanceof Parameters ? $parameters->toArray() : $parameters;

        $config = $this->config['methods'][$this->makeConfigKey($methodName)];

        $apiDataMaker = new ApiRequestData($config, $methodName, $userDataInput);

        return $this->sendRequest($apiDataMaker->uri, $apiDataMaker->data, $apiDataMaker->requestMethod);
    }

    /**
     * @param $methodName
     *
     * @return string
     */
    protected function makeConfigKey($methodName)
    {
        return $this->apiAddressConfigPrefix.$methodName;
    }
}
