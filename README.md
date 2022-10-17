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


## Database
#### Run Database migrations
```
php artisan migrate
```
## Seed Database
#### Publish DB migrations & seeders
```
php artisan vendor:publish --provider="Lariele\Order\OrderServiceProvider" --tag=database
```
#### Feed DB with Orders
```
php artisan db:seed OrderSeeder
```

## Development
#### Publish views
```
php artisan vendor:publish --provider="Lariele\Order\OrderServiceProvider" --tag=views
```

#### Dev
```
npm run dev
```

#### Build
```
npm run build
```


## Preview
#### Check online [demo](http://lariele.moon8movie.com/orders)
