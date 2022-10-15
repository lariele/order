@if($order->status == 0)
    @include('order::components.list.order-list-row-status-completed')
@elseif($order->status == 1)
    @include('order::components.list.order-list-row-status-processing')
@elseif($order->status == 2)
    @include('order::components.list.order-list-row-status-new')
@elseif($order->status == 3)
    @include('order::components.list.order-list-row-status-canceled')
@endif
