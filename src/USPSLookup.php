<?php

namespace Nickcheek\USPSLookup;

class USPSLookup
{
	
	protected  $user;
	
	public function __construct($user = '') 
	{
		$this->user = $user;
		if($user == ''){
			$this->user = env('USPS');
		}
	}

    public function Verify($address,$address2,$city,$state,$zip)
    {
	    $Address = new \SimpleXMLElement("<AddressValidateRequest></AddressValidateRequest>");
		$Address->addAttribute('USERID', $this->user);
		$Address->addChild('Revision','1');
		$add = $Address->addChild('Address');
		$add->addAttribute('ID', '0');
		$add->addChild('Address1',$address);
		$add->addChild('Address2',$address2);
		$add->addChild('City',$city);
		$add->addChild('State',$state);
		$add->addChild('Zip5',$zip);
		$add->addChild('Zip4');
		$url = 'http://production.shippingapis.com/ShippingAPITest.dll?API=Verify&XML='.$Address->asXML();
		$response = simplexml_load_file($url);
			
		return $response;		
	}
	
	public function CityState($zip)
    {
	    $CityState = new \SimpleXMLElement("<CityStateLookupRequest></CityStateLookupRequest>");
		$CityState->addAttribute('USERID', $this->user);
		$ZipCode = $CityState->addChild('ZipCode');
		$ZipCode->addAttribute('ID', '0');
		$ZipCode->addChild('Zip5',$zip);
		$url = 'http://production.shippingapis.com/ShippingAPITest.dll?API=CityStateLookup&XML='.$CityState->asXML();
		$response = simplexml_load_file($url);
			
		return $response;		
	}

	public function CityStateMultiple($zip)
    {
	    $CityState = new \SimpleXMLElement("<CityStateLookupRequest></CityStateLookupRequest>");
		$CityState->addAttribute('USERID', $this->user);
		
		foreach($zip as $k=>$z){
			$ZipCode = $CityState->addChild('ZipCode');
			$ZipCode->addAttribute('ID', $k);
			$ZipCode->addChild('Zip5',$z);
		}
		
		$url = 'http://production.shippingapis.com/ShippingAPITest.dll?API=CityStateLookup&XML='.$CityState->asXML();
		$response = simplexml_load_file($url);
			
		return $response;		
	}
	
	public function ZipCode($address,$address2,$city,$state)
	{
		$Address = new \SimpleXMLElement("<ZipCodeLookupRequest></ZipCodeLookupRequest>");
		$Address->addAttribute('USERID', $this->user);
		$add = $Address->addChild('Address');
		$add->addAttribute('ID', '0');
		$add->addChild('Address1',$address);
		$add->addChild('Address2',$address2);
		$add->addChild('City',$city);
		$add->addChild('State',$state);
		$url = 'http://production.shippingapis.com/ShippingAPITest.dll?API=ZipCodeLookup&XML='.$Address->asXML();
		$response = simplexml_load_file($url);
			
		return $response;		
	}
	
	public function Track($trackingnumber)
	{
		$track = new \SimpleXMLElement("<TrackRequest></TrackRequest>");
		$track->addAttribute('USERID', $this->user);
		$pack = $track->addChild('TrackID');
		$pack->addAttribute('ID', $trackingnumber);
		$url = 'https://secure.shippingapis.com/ShippingAPI.dll?API=TrackV2&XML='.$track->asXML();
		$response = simplexml_load_file($url);
			
		return $response;		
	}
	
	public function TrackMultiple($trackingarray)
	{
		$mtrack = new \SimpleXMLElement("<TrackRequest></TrackRequest>");
		$mtrack->addAttribute('USERID', $this->user);
		foreach($trackingarray as $trackingnumber){
			$pack = $mtrack->addChild('TrackID');
			$pack->addAttribute('ID', $trackingnumber);
		}
		$url = 'https://secure.shippingapis.com/ShippingAPI.dll?API=TrackV2&XML='.$mtrack->asXML();
		$response = simplexml_load_file($url);
			
		return $response;		
	}
	
	public  function GetRate($to,$from,$pounds,$ounces,$service)
	{
		$rate = new \SimpleXMLElement("<RateV4Request></RateV4Request>");
		$rate->addAttribute('USERID', $this->user);
		$rate->addChild("Revision",'2');
		$pack = $rate->addChild('Package');
		$pack->addAttribute('ID','0');
		$pack->addChild('Service',$service);
		$pack->addChild('ZipOrigination',$from);
		$pack->addChild('ZipDestination',$to);
		$pack->addChild('Pounds',$pounds);
		$pack->addChild('Ounces',$ounces);
		$pack->addChild('Container','VARIABLE');
		$pack->addChild('Size','Regular');
		
		$url = 'https://secure.shippingapis.com/ShippingAPI.dll?API=RateV4&XML='.$rate->asXML();
		$response = simplexml_load_file($url);
			
		return $response;		
	}
	
}
