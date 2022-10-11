# Laravel Multilingual

[![Latest Version on Packagist](https://img.shields.io/packagist/v/webwhales/laravel-multilingual.svg?style=flat-square)](https://packagist.org/packages/webwhales/laravel-multilingual)
[![run-tests](https://github.com/WebWhales/laravel-multilingual/actions/workflows/run-tests.yml/badge.svg?branch=master)](https://github.com/WebWhales/laravel-multilingual/actions/workflows/run-tests.yml)
[![Fix PHP code style issues](https://github.com/WebWhales/laravel-multilingual/actions/workflows/fix-php-code-style-issues.yml/badge.svg)](https://github.com/WebWhales/laravel-multilingual/actions/workflows/fix-php-code-style-issues.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/webwhales/laravel-multilingual.svg?style=flat-square)](https://packagist.org/packages/webwhales/laravel-multilingual)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require webwhales/laravel-multilingual
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-multilingual-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-multilingual-config"
```

## Usage

```php
$dlfHackaton2022 = new WebWhales\DlfHackaton2022();
echo $dlfHackaton2022->echoPhrase('Hello, WebWhales!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ronald Edelschaap](https://github.com/redelschaap)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
