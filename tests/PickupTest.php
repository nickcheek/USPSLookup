<?php

namespace Nickcheek\USPSLookup\Tests;

use Nickcheek\USPSLookup\USPSLookup;
use PHPUnit\Framework\TestCase;

class PickupTest extends TestCase
{
    protected object $usps;
    protected string $firm;
    protected string $address;
    protected ?string $apt;
    protected string $city;
    protected string $state;
    protected int $zip4;
    protected int $zip5;

    protected function setUp(): void
    {
        $this->firm = 'My Firm Name';
        $this->address = '123 Main Street';
        $this->apt = '4a';
        $this->city = 'Beverly Hills';
        $this->state = 'CA';
        $this->zip4 = 1234;
        $this->zip5 = 90210;
        $this->usps = new USPSLookup('Username');
    }

    public function test_carrier_pickup_availability_returns_object(): void
    {
        $pickup = $this->usps->Pickup()->carrierPickupAvailability($this->firm,$this->address,$this->apt,$this->city,$this->state,$this->zip5,$this->zip4);
        $this->assertIsObject($pickup);
    }
}
