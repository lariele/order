<?php

namespace Lariele\Order;

use Illuminate\Support\ServiceProvider;
use Lariele\Order\Components\List\OrderList;
use Lariele\Order\Components\List\OrderListFilter;
use Lariele\Order\Components\List\OrderListRow;
use Lariele\Order\Components\OrderDetail;
use Lariele\Order\Components\OrderTest;
use Lariele\Order\Pages\Order;
use Livewire\Livewire;
use Lariele\Order\Pages\Orders;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadViewsFrom(__DIR__.'/Resources/views', 'order');
        $this->publishes([
            __DIR__.'/Resources/views' => resource_path('views/vendor/lariele/order'),
            __DIR__.'/Database/Factories' => database_path('factories'),
            __DIR__.'/Database/Migrations' => database_path('migrations'),
            __DIR__.'/Database/Seeders' => database_path('seeders'),
        ]);

        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');

        Livewire::component('order', Order::class);
        Livewire::component('orders', Orders::class);
        Livewire::component('order-detail', OrderDetail::class);
        Livewire::component('order-list', OrderList::class);
        Livewire::component('order-list-row', OrderListRow::class);

        Livewire::component('order-test', OrderTest::class);

        #Livewire::component('order-list-filter', OrderListFilter::class);
//        Livewire::component('order-search', Search::class);
        //
    }
}
