
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

### Environment variables

```
ACTITO_URI=https://api3.actito.com/
ACTITO_KEY=0123456789abcdf0123456789abcdef
ACTITO_ENTITY=DefaultEntity
ACTITO_TABLE=1
```

You may also publish a config file with

```bash
php artisan actito:install
```

## Usage

```php
//Display a specific profile by Id from the default table (see config)
Actito::profile()->get(123);

//Display a profile from another table and entity.
Actito::profile(8)->entity('AnotherEntity')->get(456);

//Create or update a profile and get the profile Id
$profileId = Actito::profile()->save($profileData);
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
