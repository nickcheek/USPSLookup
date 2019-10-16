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

    /**
     * USPSLookup constructor.
     * @param string $user
     */
    public function __construct($user)
    {
        self::$user = $user;
    }

    /**
     * @return Address
     */
    public function Address()
    {
        return new Address(self::$user);
    }

    /**
     * @return Tracking
     */
    public function Tracking()
    {
        return new Tracking(self::$user);
    }

    /**
     * @return Price
     */
    public function Price()
    {
        return new Price(self::$user);
    }

    /**
     * @return Pickup
     */
    public function Pickup()
    {
        return new Pickup(self::$user);
    }

}
