<?php

use Illuminate\Support\Facades\Route;

use Lariele\Order\Pages\Order;
use Lariele\Order\Pages\Orders;

Route::group(['middleware' => 'web'], function() {
    Route::get('/orders', Orders::class)->name('orders');
    Route::get('/order/{order}-{orderSlug}', Order::class)->name('order');
});
