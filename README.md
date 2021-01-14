

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

1. create smartApp classes and methods that called by smart api apps
```php

use Hsy\Simotel\SimotelSmartApi\SmartApiCommands;


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

    public function interactiveApp($appData)
    {
        if($appData["data"]=="1")
            return $this->okResponse();

        if($appData["data"]=="2")
            return $this->errorResponse();
            
    }
}

```

2. handle received request from simotel smart api

```php
$config = Simotel::getDefaultConfig();
$config["smartApi"]["appClasses"] = [
  'playWelcomeMessage' => PlayWelcomeMessage::class,
  '*' => RestOfApps::class,
];

// place this codes where you want grab income requests
// from simotel smartApi calls     
$simotel = new Simotel($config);
$appData = $_POST["app_data"];
$jsonResponse = $simotel->smartApiCall($appData)->toJson();
$arrayResponse = $simotel->smartApiCall($appData)->toArray();

echo $jsonResponse;

// if app_name='playAnnounceApp' 
// response = {'ok':1,'commands':'PlayAnnouncement('announcement file name')'}

// if app_name='sayClock' 
// response = {'ok':1,'commands':'SayClock("14:00")'}

// if app_name='interactiveApp' 
// if data=1 
// response = {'ok':1}
// if data=2 
// response = {'ok':0}



```






