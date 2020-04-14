# Purdia

[![GitHub Workflow Status](https://github.com/anggagewor/purdia/workflows/Run%20tests/badge.svg)](https://github.com/anggagewor/purdia/actions)
[![styleci](https://styleci.io/repos/CHANGEME/shield)](https://styleci.io/repos/CHANGEME)

[![Packagist](https://img.shields.io/packagist/v/anggagewor/purdia.svg)](https://packagist.org/packages/anggagewor/purdia)
[![Packagist](https://poser.pugx.org/anggagewor/purdia/d/total.svg)](https://packagist.org/packages/anggagewor/purdia)
[![Packagist](https://img.shields.io/packagist/l/anggagewor/purdia.svg)](https://packagist.org/packages/anggagewor/purdia)



## Installation

Install via composer
```bash
composer require anggagewor/purdia
```

### Publish package assets

```bash
php artisan vendor:publish --provider="Anggagewor\Purdia\ServiceProvider"
```

## Usage

Create model
```php
<?php
namespace App;

class TestDatatype extends \Anggagewor\Purdia\Model
{
    protected $primaryKey = 'td_id';
    public $timestamps = false;
    public function showable()
    {
        return [
        'td_id',
        'sku',
        'EAN',
        'huge_quantity',
        // 'quantity',
        // 'med_quantity',
        // 'small_quantity',
        // 'tiny_quantity',
        // 'negative_quantity',
        // 'price',
        // 'val_float',
        // 'val_double',
        // 'enumerator',
        // 'flag',
        // 'code',
        // 'notes',
        // 'tinytxt',
        // 'added_date',
        // 'added_dtime',
        // 'added_time',
        'ts',
        ];
    }
}
```

Create Controller

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestDatatype;

class HomeController extends \Anggagewor\Purdia\Http\Controllers\Controller
{
    public $modelName = TestDatatype::class;
}


```

add routes

```php

Route::prefix(config('purdia.path'))->group(function () {
    Route::prefix('test_datatypes')->group(function () {
        Route::get('/', 'HomeController@index');
            Route::get('/create', 'HomeController@create');
            Route::post('/create', 'HomeController@store');
            Route::prefix('resources')->group(function () {
                Route::prefix('{id}')->group(function () {
                    Route::get('/edit', 'HomeController@edit');
                    Route::post('/edit', 'HomeController@update');
                });
            });
    });
});

```


## Security

If you discover any security related issues, please email anggagewor@gmail.com
instead of using the issue tracker.

## Credits

- [Angga Purnama](https://github.com/anggagewor/purdia)
- [All contributors](https://github.com/anggagewor/purdia/graphs/contributors)

This package is bootstrapped with the help of
[melihovv/laravel-package-generator](https://github.com/melihovv/laravel-package-generator).
