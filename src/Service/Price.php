<?php

namespace Nickcheek\USPSLookup\Service;

use Nickcheek\USPSLookup\USPSLookup;

class Price extends USPSLookup
{
    public function __construct(){}

    public static function getRate($to,$from,$pounds,$ounces,$service)
    {
        $rate = new \SimpleXMLElement("<RateV4Request></RateV4Request>");
        $rate->addAttribute('USERID', self::$user);
        $revision = $rate->addChild("Revision",'2');
        $pack = $rate->addChild('Package');
        $pack->addAttribute('ID','0');
        $pack->addChild('Service',$service);
        $pack->addChild('ZipOrigination',$from);
        $pack->addChild('ZipDestination',$to);
        $pack->addChild('Pounds',$pounds);
        $pack->addChild('Ounces',$ounces);
        $pack->addChild('Container','VARIABLE');
        $pack->addChild('Size','Regular');
        $url = self::$service . '&XML='.$rate->asXML();
        return simplexml_load_file($url);
    }
}
