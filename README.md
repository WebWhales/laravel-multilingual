# This is my package dlf-hackaton-2022

[![Latest Version on Packagist](https://img.shields.io/packagist/v/webwhales/dlf-hackaton-2022.svg?style=flat-square)](https://packagist.org/packages/webwhales/dlf-hackaton-2022)
[![run-tests](https://github.com/WebWhales/dlf-hackaton-2022/actions/workflows/run-tests.yml/badge.svg?branch=master)](https://github.com/WebWhales/dlf-hackaton-2022/actions/workflows/run-tests.yml)
[![Fix PHP code style issues](https://github.com/WebWhales/dlf-hackaton-2022/actions/workflows/fix-php-code-style-issues.yml/badge.svg)](https://github.com/WebWhales/dlf-hackaton-2022/actions/workflows/fix-php-code-style-issues.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/webwhales/dlf-hackaton-2022.svg?style=flat-square)](https://packagist.org/packages/webwhales/dlf-hackaton-2022)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require webwhales/dlf-hackaton-2022
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="dlf-hackaton-2022-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="dlf-hackaton-2022-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="dlf-hackaton-2022-views"
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
