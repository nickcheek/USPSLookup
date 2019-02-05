<?php

namespace Nickcheek\USPSLookup\Tests;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
    
       public function test()
    {
        $lookup = new \Nickcheek\USPSLookup\USPSLookup();
	    $find = $lookup->Verify('3017 Province','','Benton','AR','72019');
	    
	    dd($find);
    }
}
