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
        $Address->addChild('Revision','1');
        $add = $Address->addChild('Address');
        $add->addAttribute('ID', '0');
        $add->addChild('Address1',$address);
        $add->addChild('Address2',$address2);
        $add->addChild('City',$city);
        $add->addChild('State',$state);
        $add->addChild('Zip5',$zip);
        $add->addChild('Zip4');
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
        $ZipCode->addChild('Zip5',$zip);
        $url = self::$service . 'CityStateLookup&XML='.$CityState->asXML();
        $response = simplexml_load_file($url);
        return $response;
    }

    public static function CityStateMultiple($zip)
    {
        $CityState = new \SimpleXMLElement("<CityStateLookupRequest></CityStateLookupRequest>");
        $CityState->addAttribute('USERID', self::$user);

        foreach($zip as $k=>$v){
            $ZipCode = $CityState->addChild('ZipCode');
            $ZipCode->addAttribute('ID', $k);
            $ZipCode->addChild('Zip5',$v);
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
        $add->addChild('Address1',$address);
        $add->addChild('Address2',$address2);
        $add->addChild('City',$city);
        $add->addChild('State',$state);
        $url = self::$service . 'ZipCodeLookup&XML='.$Address->asXML();
        $response = simplexml_load_file($url);
        return $response;
    }
}
