# Laravel Helper package that backs up the Mysql database specified in env file and returns it

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nobledsmarts/db-sentry.svg?style=flat-square)](https://packagist.org/packages/nobledsmarts/db-sentry)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/nobledsmarts/db-sentry/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/nobledsmarts/db-sentry/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/nobledsmarts/db-sentry/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/nobledsmarts/db-sentry/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/nobledsmarts/db-sentry.svg?style=flat-square)](https://packagist.org/packages/nobledsmarts/db-sentry)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/db-sentry.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/db-sentry)


## Installation

You can install the package via composer:

```bash
composer require nobledsmarts/db-sentry
```

## Usage

```php
use Illuminate\Support\Facades\Storage

$dbSentry = new Nobledsmarts\DBSentry();
$backupContent = $dbSentry->getBackUp();
$backupFileName = 'backup'. date('Y-m-d=H-i-s') . '.sql';

Storage::put($backupFileName, $backupContent);
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Richard Franklin](https://github.com/Nobledsmarts)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
