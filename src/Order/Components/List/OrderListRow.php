<?php

namespace Lariele\Order\Components\List;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Lariele\Order\Models\Order;
use Livewire\Component;

class OrderListRow extends Component
{
    public Order $order;

    public $favourite = false;

    public bool $deleted = false;
    public bool $editing = false;

    public function mount(Order $order) {
//        $this->customer_name = $order->customer_name;
//        $this->customer_address = $order->customer_address;
//        $this->order_price = $order->price;
    }

    // TODO Trait Favoritable
    public function toggleFavourite()
    {
        $this->favourite = !$this->favourite;
    }

    // TODO Trait Deletable
    public function orderDelete()
    {
        $this->order->delete();
        $this->deleted = true;
    }

    public function orderEdit()
    {
        $this->editing = true;
    }

    public function orderSave()
    {
        $this->order->update([
            'customer_name'=> $this->customer_name,
            'customer_address'=> $this->customer_address,
            'price'=> $this->order_price
        ]);

        $this->editing = false;
    }

    public function orderCompleted()
    {
        $this->order->update(['status' => 0]);
    }

    public function render(): Factory|View|Application
    {
        return view('order::components.list.order-list-row');
    }
}
