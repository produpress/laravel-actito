
# Actito for Laravel

A package for the [Laravel Framework](https://laravel.com/) to interact with [Actito API](https://developers.actito.com/api-reference/menu).

> Under heavy development


Currently supporting:
- Profiles (https://developers.actito.com/api-reference/data-v4#tag/Profiles)


## Installation

You may install the package via composer:

```bash
composer require produpress/laravel-actito
```


## Configuration
Setup the environment variables

```
ACTITO_URI=https://api3.actito.com/
ACTITO_KEY=0123456789abcdf0123456789abcdef
#Default entity
ACTITO_ENTITY=EntityName
#Default table
ACTITO_TABLE=6
```

You may also publish the config file with

```bash
php artisan actito:install
```

## Usage

```php
//Display a profile from a table
Actito::profile(1465)->get();

//Display a profile from a table and specify the entity and the table Id
Actito::profile(1465)->entity('YourEntityName')->table('2')->get();
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

## Thanks

Whit the help of:
- [Laravel Package Development](https://laravelpackage.com/)
- [The skeleton package from Spatie](https://github.com/spatie/package-skeleton-laravel)
- [cherrypulp/laravel-actito](https://gitlab.com/cherrypulp/libraries/laravel-actito)


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
