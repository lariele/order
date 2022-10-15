<?php

namespace Lariele\Order\Pages;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Lariele\Order\Models\Order as ModelOrder;
use Livewire\Component;

class Order extends Component
{
    public ModelOrder $order;

    public function mount(ModelOrder $order) {

    }

    public function render(): Factory|View|Application
    {
        return view('order::pages.order');
    }
}
