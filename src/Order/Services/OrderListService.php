<?php

namespace Lariele\Order\Services;

use Illuminate\Database\Eloquent\Builder;
use Lariele\Order\Enums\OrderStatus;
use Lariele\Order\Models\Order;
use LaravelIdea\Helper\Lariele\Order\Models\_IH_Order_QB;

class OrderListService {

    public function getOrderListQuery($filter): _IH_Order_QB|Builder
    {
        $ordersQuery = Order::query();

        if($filter) {
            if(isset($filter['search']) && strlen($filter['search']) > 1) {
                $ordersQuery = $ordersQuery->where(function(Builder $qb) use ($filter) {
                    $qb->where('customer_name', 'LIKE', '%' . $filter['search'] . '%')
                        ->orWhere('customer_address', 'LIKE', '%' . $filter['search'] . '%');
                });
            }

            $status = [];
            if(isset($filter['is_active']) && $filter['is_active'] == 1) {
                array_push($status, OrderStatus::new(),OrderStatus::processing());
            }

            if(isset($filter['is_inactive']) && $filter['is_inactive'] == 1) {
                array_push($status, OrderStatus::completed(), OrderStatus::canceled());
            }

            if(isset($filter['is']['new']) && $filter['is']['new'] == 1) {
                $status[] = OrderStatus::new();
            }

            if(isset($filter['is']['processing']) && $filter['is']['processing'] == 1) {
                $status[] = OrderStatus::processing();
            }

            if(isset($filter['is']['completed']) && $filter['is']['completed'] == 1) {
                $status[] = OrderStatus::completed();
            }

            if(isset($filter['is']['canceled']) && $filter['is']['canceled'] == 1) {
                $status[] = OrderStatus::canceled();
            }

            if(isset($filter['is']['deleted']) && $filter['is']['deleted'] == 1) {
                $status[] = OrderStatus::deleted();
            }

            if(!empty($status)) {
                 $ordersQuery->whereIn('status', $status);
            }

            if(isset($filter['price_from'])) {
                $ordersQuery->where('price', '>=', $filter['price_from']);
            }

            if(isset($filter['price_to'])) {
                $ordersQuery->where('price', '<=', $filter['price_to']);
            }
        }

        $ordersQuery->orderBy('ordered_at', 'DESC');

        return $ordersQuery;
    }
}
