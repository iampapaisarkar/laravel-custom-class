# Laravel Custom Class
Easily can create custom classes by artisan command (Service, Trait and Factory Class)

[![N|Solid](https://www.iampapaisarkar.in/powered-by.svg)](https://www.iampapaisarkar.in)

[![N|Solid](https://www.iampapaisarkar.in/hire-me.svg)](https://www.upwork.com/freelancers/~01b68508e481c72291)

## Version
```php
    Laravel 8 >=
```

## installation
```sh
composer install iampapaisarkar/laravel-custom-class
```

## Usage
```sh
    // in your application app.php file add service provider

    go to 
        config/app.php

    scroll down to providers array and set this Iampapaisarkar\LaravelCustomClass\LaravelCustomClassServiceProvider::class,

        'providers' => ServiceProvider::defaultProviders()->merge([
        
            Iampapaisarkar\LaravelCustomClass\LaravelCustomClassServiceProvider::class,
        
        ])->toArray(),

```

## Usage

```php
    Open you project terminal and run following commands:

    // Create Service
    php artisan make:service YouClassName

    // Create Trait
    php artisan make:trait YouClassName

    // Create Factory
    php artisan make:custom-factory YouClassName

```

## License

[MIT](https://choosealicense.com/licenses/mit/)