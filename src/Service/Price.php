<?php

namespace Nickcheek\USPSLookup\Service;

use Nickcheek\USPSLookup\USPSLookup;

class Price extends USPSLookup
{
    /**
     * Check the price on package delivery depending on method.  Available methods include:
     * First Class,First Class Commercial, First Class  HFP Commercial,Priority,Priority Commercial
     * Priority Cpp,Priority HFP Commercial, Priority HFP CPP,Priority Mail Express,Priority Mail Express Commercial
     * Priority Mail Express CPP,Priority Mail Express Sh, Priority Mail Express Sh Commercial, Priority Mail Express HFP
     * Priority Mail Express HFP Commercial, Priority Mail Express HFP CPP, Priority Mail Cubic, Retail Ground, Media, Library, All, Online,Plus,BPM
     * @param $to
     * @param $from
     * @param $pounds
     * @param $ounces
     * @param $service
     * @return \SimpleXMLElement
     */
    public static function getRate($to,$from,$pounds,$ounces,$service): object
    {
        $rate = new \SimpleXMLElement("<RateV4Request></RateV4Request>");
        $rate->addAttribute('USERID', self::$USPSuser);
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
        $url = self::$service . '&XML=' . $rate->asXML();
        return simplexml_load_file($url);
    }
}
