<?php

namespace Nickcheek\USPSLookup\Tests;

use Nickcheek\USPSLookup\USPSLookup;
use PHPUnit\Framework\TestCase;

class TrackingTest extends TestCase
{
    protected object $usps;
    protected string $tracking;
    protected array $multple;

    protected function setUp(): void
    {
        $this->usps = new USPSLookup('FakeUser');
        $this->tracking = '123455234irDJ123';
        $this->multple = [
            '1238FKS123124351325',
            '9582824029FJE944023'
        ];
    }

    public function test_that_single_tracking_returns_object()
    {
        $this->assertIsObject($this->usps->Tracking()->track($this->tracking));
    }

    public function test_multiple_tracking_also_returns_object()
    {
        $this->assertIsObject($this->usps->Tracking()->trackMultiple($this->multple));
    }
}
