<?php

namespace Nickcheek\USPSLookup\Tests;

use Nickcheek\USPSLookup\USPSLookup;
use PHPUnit\Framework\TestCase;

class PriceTest extends TestCase
{
    protected object $usps;
    protected int $to;
    protected int $from;
    protected int $pounds;
    protected int $ounces;
    protected string $service;

    protected function setUp(): void
    {
        $this->to = 90210;
        $this->from = 28543;
        $this->pounds = 3;
        $this->ounces = 4;
        $this->service = 'First Class';
        $this->usps = new USPSLookup('FakeUser');
    }

    public function test_get_rate_price_is_object(): void
    {
        $rate = $this->usps->Price()->getRate($this->to,$this->from,$this->pounds,$this->ounces,$this->service);
        $this->assertIsObject($rate);
    }

}
