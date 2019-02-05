# USPS API Wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nickcheek/uspslookup.svg?style=flat-square)](https://packagist.org/packages/nickcheek/uspslookup)
[![Total Downloads](https://img.shields.io/packagist/dt/nickcheek/uspslookup.svg?style=flat-square)](https://packagist.org/packages/nickcheek/uspslookup)

USPS Verify Address

## About

This was quickly thrown together for a project.  Feel free to add to it as you see fit.  

## Installation

You can install the package via composer:

```bash
composer require nickcheek/uspslookup

```
If you're using laravel, add the service provider to config/app.php
```php
Nickcheek\USPSLookup\USPSLookupServiceProvider::class,
```
Then the facade
```php
'USPSLookup' =>  Nickcheek\USPSLookup\Facades\USPSLookup::class
```
Then add it to the top of your controller
```php
use \Nickcheek\USPSLookup\USPSLookup;
'''

Then add your USPS Username to your env file

```bash

USPS=xxxxxxxxxx
```

## Usage
If you're not using laravel, you can set the USPS username instead of using the .env file.

``` php
$lookup = new \Nickcheek\USPSLookup\USPSLookup('XXXXXXXXX');
$response = $lookup->Verify('123 Anystreet','','Little Rock','AR','72204');

var_dump($response);

```
If you are using laravel and set your username in your .env file, you can call the class without it.

``` php

$lookup = new USPSLookup();
$response = $lookup->Verify('123 Anystreet','','Little Rock','AR','72204');

var_dump($response);

```
OR

``` php
$response = \Nickcheek\USPSLookup\USPSLookup::Verify($address,$address2,$city,$state,$zip);

var_dump($respone);

```

### Available Methods
Verify Address exists

``` php
$lookup = new \Nickcheek\USPSLookup\USPSLookup();
$find = $lookup->Verify($address,$address2,$city,$state,$zip);

```


Track a Package

``` php
$lookup = new \Nickcheek\USPSLookup\USPSLookup();
$find = $lookup->Track('9405511206019825745000');

```

Track Multiple Packages

``` php
$lookup = new \Nickcheek\USPSLookup\USPSLookup();
$track = array("9405511206019825745000","9405511206019825304382");
$find = $lookup->TrackMultiple($track);

```

Find City/State that zip code belongs to

```php
$lookup = new \Nickcheek\USPSLookup\USPSLookup();
$find = $lookup->CityState('72019');

```
Find Zip Code of address

```php 
$lookup = new \Nickcheek\USPSLookup\USPSLookup();
$find = $lookup->ZipCode('1234 Anystreet','','Little Rock','AR');
	   
```
Get Rate of Package
($to,$from,$pounds,$ounces,$service)
Available services: 
First Class,First Class Commercial,First Class  HFP Commercial,Priority,Priority Commercial,Priority Cpp,Priority HFP Commercial,Retail Ground,etc...

```php
$lookup = new \Nickcheek\USPSLookup\USPSLookup();
$find = $lookup->GetRate('72204','37501','1','3','LETTER');

```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


### Security

If you discover any security related issues, please email nick@nicholascheek.com.

## Credits

- [Nicholas Cheek](https://github.com/nickcheek)
- [All Contributors](../../contributors)



