<?php

namespace Hsy\Simotel\SimotelApi;

class Response
{
    public $success;
    public $message;
    public $data;

    public function __construct($respons)
    {
        $responseBodyContent = json_decode($respons->getBody()->getContents());
        $this->success = $responseBodyContent->success;
        $this->message = $responseBodyContent->message;
        $this->data = $responseBodyContent->data;
    }
}
