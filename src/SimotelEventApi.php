<?php

namespace Hsy\Simotel;

use Hsy\Simotel\SimotelEventApi\SimotelEvents;

class SimotelEventApi
{
    use SimotelEvents;

    /**
     * @param $event
     * @param callable $callback
     */
    public function addListener($event, callable $callback)
    {
        self::addEventListener($event, $callback);
    }

    /**
     * @param $event
     * @param $data
     */
    public function dispatch($event, $data)
    {
        self::dispatchEvent($event, $data);
    }
}
