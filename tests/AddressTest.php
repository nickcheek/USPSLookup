<?php


namespace Nickcheek\USPSLookup\Tests;

use Nickcheek\USPSLookup\USPSLookup;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    protected object $usps;
    protected string $address;
    protected ?string $address2;
    protected string $city;
    protected string $state;
    protected int $zip;

    protected function setUp(): void
    {
        $this->address = '123 Main Street';
        $this->address2 = '';
        $this->city = 'Beverly Hills';
        $this->state = 'CA';
        $this->zip = 90210;
        $this->usps = new USPSLookup('Username');
    }

    public function test_verify_returns_object(): void
    {
        $verify = $this->usps->Address()->verify($this->address,$this->address2,$this->city,$this->state,$this->zip);
        $this->assertIsObject($verify);
    }

    public function test_citystate_returns_object(): void
    {
        $cityState = $this->usps->Address()->cityState($this->zip);
        $this->assertIsObject($cityState);
    }

    public function test_city_state_multiple_returns_object(): void
    {
        $multiple = $this->usps->Address()->cityStateMultiple([$this->zip,$this->zip]);
        $this->assertIsObject($multiple);
    }

    public function test_zip_code_lookup_returns_object(): void
    {
        $zipcode = $this->usps->Address()->zipCode($this->address,$this->address2,$this->city,$this->state);
        $this->assertIsObject($zipcode);
    }
}
