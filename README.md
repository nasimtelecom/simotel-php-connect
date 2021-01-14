

# simotel-php-connect
Keep connected with simotel by php

[![Build Status](https://travis-ci.com/hsyir/simotel-php-connect.svg?branch=master)](https://travis-ci.com/hsyir/simotel-php-connect)
[![StyleCI](https://github.styleci.io/repos/325189235/shield?branch=master)](https://github.styleci.io/repos/325189235?branch=master)

- [Install](#install)
- [Simotel Api](#simotel-api)
- [Simotel Event Api](#simotel-event-api)
- [Smart Api](#smart-api)

## Install

use composer to install and autoload the package
```
composer require hsyir/simotel-php-connect
```

## Simotel Api

Simotel Api help you to manage and organize all you need in simotel server.
with "php simotel api" you can easly connect to simotel server.



#### simotel api connect

```php
use \Hsy\Simotel\Simotel;
use Hsy\Simotel\SimotelApi\Parameters;

$config = Simotel::getDefaultConfig();
$config["simotelApi"]["connect"]=[
    'user'=> 'apiUser',
    'pass'=> 'apiPass',
    'token'=> 'apiToken',
    'server_address' => 'http://simotelServer',
                                 
];

$simotel = new Simotel($config);

$parameters = new Parameters();
$parameters->name = "user name";
$parameters->number = "101";
$parameters->secret = "password";

$simotel->connect()->pbx()->users()->create($parameters);
```



## Simotel Event Api


1.Add listeners for events

```php


$simotel = new Simotel();

$simotel->eventApi()->addListener('Cdr', function ($simotelApiData) {
    var_dump($simotelApiData);
});

```

2.dispatch events after receive request from simotel event api

```php

use \Hsy\Simotel\Simotel;
$simotelEventApiData =  $_POST["api_data"];
$eventName = $_POST["api_data"]["event_name"];
$simotel = new Simotel();
$simotel->eventApi()->dispatch($eventName,$simotelEventApiData);

```



## Simotel Smart Api
```php

use Hsy\Simotel\Simotel;
use Hsy\Simotel\SimotelSmartApi\SmartApiCommands;

$config = [
    'smartApi' => [
        'appClasses' => [
            'playWelcomeMessage' => PlayWelcomeMessage::class,
            '*'      => RestOfApps::class,
        ],
    ],
];

class PlayWelcomeMessage
{
    use SmartApiCommands;
    
    public function playAnnounceApp($appData)
    {
        $this->cmdPlayAnnouncement("announcement file name");
        return $this->okResponse();
    }
}

class RestOfApps
{
    use SmartApiCommands;
    
    public function sayClock($appData)
    {
        $this->cmdSayClock("22:00");
        return $this->okResponse();
    }
}



// place this codes where you want grab income requests
// from simotel smartApi calls     
$simotel = new Simotel($this->config);
$appData = $_POST["app_data"];
$response = $simotel->smartApiCall($appData)->toJson();
echo $response;

// if app_name='playAnnounceApp' 
// response = {'ok':1,'commands':'PlayAnnouncement('announcement file name')'}


// if app_name='sayClock' 
// response = {'ok':1,'commands':'SayClock('14:00')}



```






