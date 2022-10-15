<?php

namespace Lariele\Order\Pages;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Orders extends Component
{
    public function render(): Factory|View|Application
    {
        return view('order::pages.orders');
    }
}
