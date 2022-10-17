<h1 align="center">Lariele Orders TALL</h1>
<p align="center">
<a href="https://packagist.org/packages/lariele/order"><img src="https://img.shields.io/github/v/release/lariele/order" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/lariele/order"><img src="https://img.shields.io/github/v/tag/lariele/order" alt="Latest Tag"></a>
<a href="https://packagist.org/packages/lariele/order"><img src="https://img.shields.io/github/license/lariele/order" alt="License"></a>
</p>

### Manage Orders with Laravel Livewire component builded with TALL

## Installation

```
composer require lariele/order
```

## Vendor views and database publish
#### Publish DB migrations & seeders
```
php artisan vendor:publish --provider="Lariele\Order\OrderServiceProvider" --tag=database
```
#### Publish views to edit blade views
```
php artisan vendor:publish --provider="Lariele\Order\OrderServiceProvider" --tag=views
```


## Database
#### Run Database migrations
```
php artisan migrate
```

#### Seed Orders
```
php artisan db:seed OrderSeeder
```

## Preview
#### Check online [demo](http://lapierre.moon8movie.com/orders)
