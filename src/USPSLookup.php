<?php

namespace Nickcheek\USPSLookup;

use Nickcheek\USPSLookup\Service\Price;
use Nickcheek\USPSLookup\Service\Pickup;
use Nickcheek\USPSLookup\Service\Address;
use Nickcheek\USPSLookup\Service\Tracking;


class USPSLookup
{
    protected static $user;
    protected static $service = 'http://production.shippingapis.com/ShippingAPI.dll?API=';

    public function __construct($user = '')
    {
        self::$user = $user;
        if($user == ''){
            self::$user = env('USPS');
        }
    }

    public function Address()
    {
        return new Address();
    }

    public function Tracking()
    {
        return new Tracking();
    }

    public function Price()
    {
        return new Price();
    }

    public function Pickup()
    {
        return new Pickup();
    }

}
