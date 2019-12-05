# USPS API Wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nickcheek/uspslookup.svg?style=flat-square)](https://packagist.org/packages/nickcheek/uspslookup)
[![Total Downloads](https://img.shields.io/packagist/dt/nickcheek/uspslookup.svg?style=flat-square)](https://packagist.org/packages/nickcheek/uspslookup)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nickcheek/USPSLookup/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nickcheek/USPSLookup/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/nickcheek/USPSLookup/badges/build.png?b=master)](https://scrutinizer-ci.com/g/nickcheek/USPSLookup/build-status/master)

USPS Verify Address

## About

This was quickly thrown together for a project.  Feel free to add to it as you see fit.  I recently refactored each Service so I can add on as time goes. 

## Installation

You can install the package via composer:

```bash
composer require nickcheek/uspslookup

```

Then add the reference to the top of your controller
```php
use \Nickcheek\USPSLookup\USPSLookup;
```

## Usage

Set the USPS Username while creating the object:

``` php
$lookup = new USPSLookup('XXXXXXXXX');
$response = $lookup->Address()->verify('123 Anystreet','','Little Rock','AR','72204');

var_dump($response);

```


The above returns the following (I replaced the values with ***):
``` php
"Address2": "3017 P****E"
    +"City": "*****"
    +"State": "AR"
    +"Zip5": "7***9"
    +"Zip4": "2140"
    +"DeliveryPoint": "17"
    +"CarrierRoute": "****"
    +"DPVConfirmation": "Y"
    +"DPVCMRA": "N"
    +"DPVFootnotes": "AABB"
    +"Business": "N"
    +"CentralDeliveryPoint": "N"
    +"Vacant": "N"
```

### Available Methods
Verify Address exists

``` php
$lookup = new \Nickcheek\USPSLookup\USPSLookup('XXXXXXXXX');
$find = $lookup->verify($address,$address2,$city,$state,$zip);

```


Track a Package

``` php
$lookup = new \Nickcheek\USPSLookup\USPSLookup('XXXXXXXXX');
$find = $lookup->Tracking()->track('9405511206019825745000');

```

Track Multiple Packages

``` php
$lookup = new \Nickcheek\USPSLookup\USPSLookup('XXXXXXXXX');
$track = array("9405511206019825745000","9405511206019825304382");
$find = $lookup->Tracking()->trackMultiple($track);

```

Find City/State that zip code belongs to

```php
$lookup = new \Nickcheek\USPSLookup\USPSLookup('XXXXXXXXX');
$find = $lookup->Address()->cityState('72019');

```

Find City/State of multiple zip codes

```php
$zips = array('72204','72203');
$lookup = new \Nickcheek\USPSLookup\USPSLookup('XXXXXXXXX');
$find = $lookup->Address()->cityState($zips);

```

Find Zip Code of address

```php 
$lookup = new \Nickcheek\USPSLookup\USPSLookup('XXXXXXXXX');
$find = $lookup->Address()->zipCode('1234 Anystreet','','Little Rock','AR');
	   
```
Get Rate of Package
($to,$from,$pounds,$ounces,$service)
Available services: 
First Class,First Class Commercial,First Class  HFP Commercial,Priority,Priority Commercial,Priority Cpp,Priority HFP Commercial,Retail Ground,etc...

```php
$lookup = new \Nickcheek\USPSLookup\USPSLookup('XXXXXXXXX');
$find = $lookup->Price()->getRate('72204','37501','1','3','Priority');

```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


### Security

If you discover any security related issues, please email nick@nicholascheek.com.

## Credits

- [Nicholas Cheek](https://github.com/nickcheek)
- [All Contributors](../../contributors)



