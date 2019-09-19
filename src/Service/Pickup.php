<?php

namespace Nickcheek\USPSLookup\Service;

use Nickcheek\USPSLookup\USPSLookup;

class Pickup extends USPSLookup
{
    public function __construct(){}

    public function carrierPickupAvailability($firm,$address,$apt,$city,$state,$zip5,$zip4)
    {
        $carrier = new \SimpleXMLElement('<CarrierPickupAvailabilityRequest></CarrierPickupAvailabilityRequest>');
        $carrier->addAttribute('USERID', self::$user);
        $carrier->addChild('FirmName' , $firm);
        $carrier->addChild('SuiteOrApt' , $apt);
        $carrier->addChild('Address2', $address);
        $carrier->addChild('Urbanization');
        $carrier->addChild('City',$city);
        $carrier->addChild('State',$state);
        $carrier->addChild('ZIP5',$zip5);
        $carrier->addChild('ZIP4',$zip4);
        $url = self::$service . 'CarrierPickupAvailability&XML='.$carrier->asXML();
        return simplexml_load_file($url);

    }
}
