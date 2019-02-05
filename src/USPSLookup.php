<?php

namespace Nickcheek\USPSLookup;

class USPSLookup
{
	
	protected static $user;
	
	
	
	public function __construct($user = '') 
	{
		self::$user = $user;
		if($user == ''){
			self::$user = env('USPS');
		}
	}

    public static function Verify($address,$address2,$city,$state,$zip)
    {
	    $Address = new \SimpleXMLElement("<AddressValidateRequest></AddressValidateRequest>");
		$Address->addAttribute('USERID', self::$user);
		$Revision = $Address->addChild('Revision','1');
		$add = $Address->addChild('Address');
		$add->addAttribute('ID', '0');
		$a1 = $add->addChild('Address1',$address);
		$a2 = $add->addChild('Address2',$address2);
		$c = $add->addChild('City',$city);
		$s = $add->addChild('State',$state);
		$z1  = $add->addChild('Zip5',$zip);
		$z2  = $add->addChild('Zip4');
		
		$url = 'http://production.shippingapis.com/ShippingAPITest.dll?API=Verify&XML='.$Address->asXML();
		$response = simplexml_load_file($url);
			
		return $response;		
			
	}
}
