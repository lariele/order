<tr class="@if($deleted) hidden @endif bg-white border-b dark:bg-gray-800 dark:border-gray-700">
    <td class="p-4 w-4">
        <div class="flex items-center">
            <input value="{{ $order->id }}" id="checkbox-table-search-1" type="checkbox"
                   class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
        </div>
    </td>
    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <a href="{{ route('order', ['order' => $order->id, 'orderSlug' => Str::slug($order->customer_name)]) }}">{{ $order->customer_name }}</a>
    </th>
    <td class="py-4 px-6">
        {{ $order->customer_address }}
    </td>
    <td class="py-4 px-6">
        {{ $order->price }}&euro;
    </td>
    <td class="py-4 px-6">
        <div class="flex items-center">
            @if($order->status == \Lariele\Order\Enums\OrderStatus::new())
                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> New
            @elseif($order->status == \Lariele\Order\Enums\OrderStatus::processing())
                <div class="h-2.5 w-2.5 rounded-full bg-blue-500 mr-2"></div> Processing
            @elseif($order->status == \Lariele\Order\Enums\OrderStatus::completed())
                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Completed
            @elseif($order->status == \Lariele\Order\Enums\OrderStatus::canceled())
                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Canceled
            @elseif($order->status == \Lariele\Order\Enums\OrderStatus::deleted())
                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Deleted
            @endif
        </div>
    </td>
    <td class="py-4 px-6 text-right">
        <a href="{{ route('order', ['order' => $order->id, 'orderSlug' => Str::slug($order->customer_name)]) }}" class="cursor-pointer font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
        <a wire:click="orderDelete()"
           class="cursor-pointer font-medium text-red-700 dark:text-blue-500 hover:underline">Delete</a>
    </td>
</tr>
{{--<tr class="{{ $deleted ? 'fadeOut' : '' }} {{ $editing ? 'editing' : '' }}"--}}
{{--    x-data="{   customer_name: @entangle('customer_name').defer,--}}
{{--                customer_address: @entangle('customer_address').defer,--}}
{{--                order_price: @entangle('order_price').defer }">--}}
{{--    <td>--}}
{{--        <x-form::editable.text :slug="'customer_name'"--}}
{{--                               :value="$order->customer_name" :editing="$editing"--}}
{{--                               :route="route('order', ['order' => $order->id, 'orderSlug' => Str::slug($order->customer_name)])" />--}}
{{--        <x-form::editable.text :slug="'customer_address'"--}}
{{--                               :value="$order->customer_address" :editing="$editing" :wrapperClass="'mt-1'"--}}
{{--                               :class="'text-slate-500 text-xs whitespace-nowrap mt-0.5'"/>--}}
{{--    </td>--}}
{{--    <td class="text-center w-30 text-slate-500 text-xs">{{ \Carbon\Carbon::parse($order->ordered_at)->format(config('app.date_format')) }}</td>--}}
{{--    <td class="text-center w-30">--}}
{{--        <x-form::editable.text :slug="'order_price'"--}}
{{--                               :value="$order->price" :editing="$editing" :after="'€'" :inputClass="'w-20'"/>--}}
{{--    </td>--}}
{{--    <td class="w-40 @if($deleted) fadeOut @endif">--}}
{{--        <x-order::list.order-list-row-status :order="$order"/>--}}
{{--    </td>--}}
{{--    <td class="table-report__action w-20">--}}
{{--        <div class="flex justify-center items-center">--}}
{{--            <button wire:click="orderCompleted()" class="flex items-center mr-3" href="#">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                     class="w-4 h-4 ml-2">--}}
{{--                    <polyline points="9 11 12 14 22 4"></polyline>--}}
{{--                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>--}}
{{--                </svg>--}}
{{--            </button>--}}
{{--            @if($editing)--}}
{{--                <button wire:click="orderSave()" class="hover-green color-success flex items-center mr-3" href="#">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                         class="w-4 h-4 ml-l">--}}
{{--                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>--}}
{{--                        <polyline points="17 21 17 13 7 13 7 21"></polyline>--}}
{{--                        <polyline points="7 3 7 8 15 8"></polyline>--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--            @else--}}
{{--                <button wire:click="orderEdit()" class="hover-green color-success flex items-center mr-3" href="#">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                         class="w-4 h-4 ml-l">--}}
{{--                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>--}}
{{--                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--            @endif--}}
{{--            <button wire:click="orderDelete()" class="flex items-center text-danger color-warning" href="#">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                     class="w-4 h-4 mr-1">--}}
{{--                    <polyline points="3 6 5 6 21 6"></polyline>--}}
{{--                    <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>--}}
{{--                    <line x1="10" y1="11" x2="10" y2="17"></line>--}}
{{--                    <line x1="14" y1="11" x2="14" y2="17"></line>--}}
{{--                </svg>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </td>--}}
{{--</tr>--}}
