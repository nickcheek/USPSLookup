<?php

namespace Nickcheek\USPSLookup\Service;

use Nickcheek\USPSLookup\USPSLookup;

class Tracking extends USPSLookup
{
    public function __construct(){}

    /**
     * Tracking a package by USPS Tracking number
     * @param $trackingnumber
     * @return \SimpleXMLElement
     */
    public static function track($trackingnumber)
    {
        $track = new \SimpleXMLElement("<TrackRequest></TrackRequest>");
        $track->addAttribute('USERID', self::$user);
        $pack = $track->addChild('TrackID');
        $pack->addAttribute('ID', $trackingnumber);
        $url = self::$service . 'TrackV2&XML=' . $track->asXML();
        return simplexml_load_file($url);
    }

    /**
     * Tracking more than one package by USPS Tracking number array
     * @param $trackingarray (Array)
     * @return \SimpleXMLElement
     */
    public static function trackMultiple($trackingarray)
    {
        $track = new \SimpleXMLElement("<TrackRequest></TrackRequest>");
        $track->addAttribute('USERID', self::$user);
        foreach($trackingarray as $trackingnumber){
            $pack = $track->addChild('TrackID');
            $pack->addAttribute('ID', $trackingnumber);
        }
        $url = self::$service . 'TrackV2&XML=' . $track->asXML();
        return simplexml_load_file($url);
    }
}
