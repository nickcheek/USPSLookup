<?php

namespace Nickcheek\USPSLookup\Tests;

use Nickcheek\USPSLookup\Service\Address;
use Nickcheek\USPSLookup\Service\Pickup;
use Nickcheek\USPSLookup\Service\Price;
use Nickcheek\USPSLookup\Service\Tracking;
use Nickcheek\USPSLookup\USPSLookup;
use PHPUnit\Framework\TestCase;

class USPSLookupTest extends TestCase
{

    /** @test */
    public function address_returns_address_object()
    {
        $address = new Address('FakeUser');
        $this->assertIsObject($address);
    }

    /** @test */
    public function test_pickup_returns_pickup_object()
    {
        $pickup = new Pickup('FakeUser');
        $this->assertIsObject($pickup);
    }

    /** @test */
    public function test_price_returns_price_object()
    {
        $price = new Price('FakeUser');
        $this->assertIsObject($price);
    }

    /** @test */
    public function test_tracking_returns_tracking_object()
    {
        $tracking = new Tracking('FakeUser');
        $this->assertIsObject($tracking);
    }

    public function test_main_class_passes_username_to_subclass()
    {
        $usps = new USPSLookup('FakeUser');
        $this->assertObjectHasAttribute('USPSuser', $usps->Address());
    }

}
