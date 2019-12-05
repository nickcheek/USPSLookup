<?php

namespace Nickcheek\USPSLookup;

use Nickcheek\USPSLookup\Service\Price;
use Nickcheek\USPSLookup\Service\Pickup;
use Nickcheek\USPSLookup\Service\Address;
use Nickcheek\USPSLookup\Service\Tracking;


class USPSLookup
{
    protected static string $USPSuser;
    protected static string $service = 'http://production.shippingapis.com/ShippingAPI.dll?API=';

    /**
     * USPSLookup constructor.
     * @param string self::$$USPSuser
     */
    public function __construct($USPSuser)
    {
        self::$USPSuser = $USPSuser;
    }

    /**
     * @return Address
     */
    public function Address(): object
    {
        return new Address(self::$USPSuser);
    }

    /**
     * @return Tracking
     */
    public function Tracking(): object
    {
        return new Tracking(self::$USPSuser);
    }

    /**
     * @return Price
     */
    public function Price(): object
    {
        return new Price(self::$USPSuser);
    }

    /**
     * @return Pickup
     */
    public function Pickup(): object
    {
        return new Pickup(self::$USPSuser);
    }

}
