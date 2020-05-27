# 
[![Latest Stable Version](https://poser.pugx.org/sr-expert/ypersdk-php/v/)](//packagist.org/packages/sr-expert/ypersdk-php)
[![Latest Unstable Version](https://poser.pugx.org/sr-expert/ypersdk-php/v/unstable)](//packagist.org/packages/sr-expert/ypersdk-php)
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]](https://travis-ci.com/github/sr-expert/ypersdk-php)
[![Coverage Status](https://scrutinizer-ci.com/g/sr-expert/ypersdk-php/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/g/sr-expert/ypersdk-php/badges/code-intelligence.svg?b=master)
[![Quality Score](https://scrutinizer-ci.com/g/sr-expert/ypersdk-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sr-expert/ypersdk-php/badges/quality-score.png?b=master)
[![Total Downloads](https://poser.pugx.org/sr-expert/ypersdk-php/downloads)](//packagist.org/packages/sr-expert/ypersdk-php)

Yper SDK php to connect with yper api shipping methode.
for all information check this link
https://docs.yper.io/


## Install

Via Composer

``` bash
$ composer require sr-expert/ypersdk-php
```

## Usage

``` php
require "../vendor/autoload.php";

$api=new Yper\SDK\ApiClient(
               "base_url",
               "client_id",
               "client_secret",
               "scope",
               "grant_type",
               "pro_id",
               "pro_secret_token",
               "retail_point_id"
    );
$sevice = new Yper\SDK\Service\Mission($api);
$result = $sevice->getMissionTemplates();
print_r($result);

#for other service you can use 

$sevice = new Yper\SDK\Service\xxx($api);

#if path or methode not in service you ca use directly 

$api->requestApi("GET|POST", $path, paramGet = array(), $paramPost = array());

```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email @example.com instead of using the issue tracker.

## Credits

- rajafallah@gmailcom 
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://poser.pugx.org/sr-expert/ypersdk-php/v/
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://travis-ci.com/sr-expert/ypersdk-php.svg?branch=master
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/sr-expert/.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/sr-expert/.svg?style=flat-square
[ico-downloads]: https://poser.pugx.org/sr-expert/ypersdk-php/downloads

[link-packagist]: https://packagist.org/packages/sr-expert/ypersdk-php
[link-travis]: https://travis-ci.com/github/sr-expert/ypersdk-php
[link-scrutinizer]: https://scrutinizer-ci.com/g/sr-expert//code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/sr-expert/
[link-downloads]: https://packagist.org/packages/sr-expert/
[link-author]: https://github.com/
[link-contributors]: ../../contributors
