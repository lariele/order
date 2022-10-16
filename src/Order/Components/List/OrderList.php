<?php

namespace Lariele\Order\Components\List;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Lariele\Order\Services\OrderListService;
use Livewire\Component;

class OrderList extends Component
{
    protected $listeners = ['refreshList' => '$refresh'];

    protected OrderListService $service;

    public ?Collection $orders = null;

    public array $filter = [];
    public array $selected = [];

    public int $perPage = 15;

    public bool $loadedAll = false;

    public function boot(OrderListService $service)
    {
        $this->service = $service;
    }

    public function mount($category)
    {
        $this->getOrders();
    }

    public function updatedFilter($value)
    {
        $this->loadedAll = false;
        $this->perPage = 20;
        $this->getOrders();
    }

    /**
     * Autoload next orders
     *
     * @return void
     */
    public function loadMore(): void
    {
        $countStart = $this->orders ? count($this->orders) : null;

        $this->perPage += 20;
        $this->getOrders();

        if ($countStart === count($this->orders)) {
            $this->loadedAll = true;
        }
    }

    /**
     * Get filtered Orders
     *
     * @return void
     */
    public function getOrders(): void
    {
        $this->orders = $this->service->getOrderListQuery($this->filter)->limit($this->perPage)->get();
    }

    public function render(): Factory|View|Application
    {
        return view('order::components.list.order-list');
    }
}
