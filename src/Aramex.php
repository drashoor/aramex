<?php

namespace DigitalCloud\Aramex;

use DigitalCloud\Aramex\API\Requests\PickupCreation;
use DigitalCloud\Aramex\API\Requests\Rating;
use DigitalCloud\Aramex\API\Requests\Shipping;
use DigitalCloud\Aramex\API\Requests\Tracking;

class Aramex
{
    public static function ratting()
    {
        return new Rating();
    }

    public static function shipping()
    {
        return new Shipping();
    }

    public static function pickup()
    {
        return new PickupCreation();
    }

    public static function tracking()
    {
        return new Tracking();
    }
}