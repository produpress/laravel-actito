
# Actito for Laravel

Actito (v4) for Laravel


## Installation

You can install the package via composer:

```bash
composer require produpress/laravel-actito
```

## Usage

```php
//Display a profile from a table
Actito::entity('YourEntityName')->table('2')->profile(1465)->show();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Maxime Nokin](https://github.com/mnokin)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
