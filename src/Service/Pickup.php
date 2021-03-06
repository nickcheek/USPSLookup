<?php

namespace Nickcheek\USPSLookup\Service;

use Nickcheek\USPSLookup\USPSLookup;

class Pickup extends USPSLookup
{
    /**
     * USPS Carrier pickup availability by location.
     * @param $firm
     * @param $address
     * @param $apt
     * @param $city
     * @param $state
     * @param $zip5
     * @param $zip4
     * @return \SimpleXMLElement
     */
    public function carrierPickupAvailability(string $firm,string $address,string $apt,string $city,string $state,int $zip5,int $zip4): object
    {
        $carrier = new \SimpleXMLElement('<CarrierPickupAvailabilityRequest></CarrierPickupAvailabilityRequest>');
        $carrier->addAttribute('USERID', self::$USPSuser);
        $carrier->addChild('FirmName' , $firm);
        $carrier->addChild('SuiteOrApt' , $apt);
        $carrier->addChild('Address2', $address);
        $carrier->addChild('Urbanization');
        $carrier->addChild('City',$city);
        $carrier->addChild('State',$state);
        $carrier->addChild('ZIP5',$zip5);
        $carrier->addChild('ZIP4',$zip4);
        $url = self::$service . 'CarrierPickupAvailability&XML=' . $carrier->asXML();
        return simplexml_load_file($url);

    }
}
