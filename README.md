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

## Usage

``` php
add your USPS username to your .env file

USPS=xxxxxxxxxx

$response = \Nickcheek\USPSLookup\USPSLookup::Verify($address,$address2,$city,$state,$zip);

var_dump($response);

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