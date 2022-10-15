<?php

namespace Lariele\Order\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Lariele\Order\Models\Order;

class OrderDetail extends Component
{
    public Order $order;

    protected array $rules = [
        'order.customer_name' => 'max:32',
        'order.customer_address' => 'string',
        'order.price' => 'numeric',
        'order.status' => 'string',
        'order.ordered_at' => 'string',
    ];

    public function mount(Order $order)
    {

    }

    public function save()
    {
        $this->validate();
        $this->order->save();
    }

    public function render(): Factory|View|Application
    {
        return view('order::components.order-detail');
    }
}
