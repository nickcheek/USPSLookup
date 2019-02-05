# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nickcheek/uspslookup.svg?style=flat-square)](https://packagist.org/packages/nickcheek/uspslookup)
[![Build Status](https://img.shields.io/travis/nickcheek/uspslookup/master.svg?style=flat-square)](https://travis-ci.org/nickcheek/uspslookup)
[![Quality Score](https://img.shields.io/scrutinizer/g/nickcheek/uspslookup.svg?style=flat-square)](https://scrutinizer-ci.com/g/nickcheek/uspslookup)
[![Total Downloads](https://img.shields.io/packagist/dt/nickcheek/uspslookup.svg?style=flat-square)](https://packagist.org/packages/nickcheek/uspslookup)

USPS Verify Address

## Installation

You can install the package via composer:

```bash
composer require nickcheek/uspslookup

```
Then add your USPS Username to your env file

```bash

USPS=xxxxxxxxxx
```

## Usage
If you're not using laravel, you can call the lookup with your username instead of using the .env file.

``` php
$lookup = new \Nickcheek\USPSLookup\USPSLookup('XXXXXXXXX');
$response = $lookup->Verify('123 Anystreet','','Little Rock','AR','72204');

var_dump($response);

```
If you are using laravel and set your username in your .env file, you can call the class without it.

``` php

$lookup = new \Nickcheek\USPSLookup\USPSLookup();
$response = $lookup->Verify('123 Anystreet','','Little Rock','AR','72204');

var_dump($response);

```
OR

``` php
$response = \Nickcheek\USPSLookup\USPSLookup::Verify($address,$address2,$city,$state,$zip);

var_dump($respone);

```

### Testing



### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email nick@nicholascheek.com instead of using the issue tracker.

## Credits

- [Nicholas Cheek](https://github.com/nickcheek)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).