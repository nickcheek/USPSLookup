<?php

namespace Nickcheek\USPSLookup\Service;

use Nickcheek\USPSLookup\USPSLookup;

class Address extends USPSLookup
{
    public function __construct(){}

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
        $url = self::$service . 'Verify&XML='.$Address->asXML();
        $response = simplexml_load_file($url);
        return $response;
    }

    public static function CityState($zip)
    {
        $CityState = new \SimpleXMLElement("<CityStateLookupRequest></CityStateLookupRequest>");
        $CityState->addAttribute('USERID', self::$user);
        $ZipCode = $CityState->addChild('ZipCode');
        $ZipCode->addAttribute('ID', '0');
        $Zip  = $ZipCode->addChild('Zip5',$zip);
        $url = self::$service.'CityStateLookup&XML='.$CityState->asXML();
        $response = simplexml_load_file($url);
        return $response;
    }

    public static function CityStateMultiple($zip)
    {
        $CityState = new \SimpleXMLElement("<CityStateLookupRequest></CityStateLookupRequest>");
        $CityState->addAttribute('USERID', self::$user);

        foreach($zip as $k=>$z){
            $ZipCode = $CityState->addChild('ZipCode');
            $ZipCode->addAttribute('ID', $k);
            $Zip  = $ZipCode->addChild('Zip5',$z);
        }

        $url = self::$service . 'CityStateLookup&XML='.$CityState->asXML();
        $response = simplexml_load_file($url);
        return $response;
    }

    public static function ZipCode($address,$address2,$city,$state)
    {
        $Address = new \SimpleXMLElement("<ZipCodeLookupRequest></ZipCodeLookupRequest>");
        $Address->addAttribute('USERID', self::$user);
        $add = $Address->addChild('Address');
        $add->addAttribute('ID', '0');
        $a1 = $add->addChild('Address1',$address);
        $a2 = $add->addChild('Address2',$address2);
        $c = $add->addChild('City',$city);
        $s = $add->addChild('State',$state);
        $url = self::$service . 'ZipCodeLookup&XML='.$Address->asXML();
        $response = simplexml_load_file($url);
        return $response;
    }
}
