
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

### Data
```php
//Get a specific profile by Id from the default table (see config)
Actito::profile()->get(123);

//Get a profile from another table and entity.
Actito::profile(8)->entity('AnotherEntity')->get(456);

//Create or update a profile and get the profile Id
$profileId = Actito::profile()->save($profileData);
```

### DataModel
```php
//Get list of profile tables
Actito::profile()->tables();

//Get the schema of a profile table with the profile table id
Actito::profile(8)->schema();

//Get list of custom tables
Actito::customTable()->tables();

//Get the schema of a custom table witht he custome table id
Actito::customTable('109675e9-429e-954d-a50f-9e806d70a6ca')->schema();
```

More in [Documentation](doc/)

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

With the help of:

- [Laravel Package Development](https://laravelpackage.com/)
- [The skeleton package from Spatie](https://github.com/spatie/package-skeleton-laravel)
- [cherrypulp/laravel-actito](https://gitlab.com/cherrypulp/libraries/laravel-actito)


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
