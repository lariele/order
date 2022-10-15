<div class="grid col-span-12">
    <h2 class="mt-4 text-2xl font-bold dark:text-white">Orders</h2>

    <x-order::list.order-list-filter/>
{{--    <livewire:order-list-filter />--}}
    <div class="my-4 overflow-x-auto relative">
        <table class="w-full text-xs text-left text-gray-500 dark:text-gray-400"
               x-data="{ selected: @entangle('selected').defer }">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="py-3 px-6 rounded-l-lg">
                    Customer name
                </th>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        Address
                    </div>
                </th>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        Price
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true"
                                 fill="currentColor" viewBox="0 0 320 512">
                                <path
                                    d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path>
                            </svg>
                        </a>
                    </div>
                </th>
                <th scope="col" class="py-3 px-6">
                    Status
                </th>
                <th scope="col" class="py-3 px-6 rounded-r-lg">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($orders))
                @foreach($orders as $order)
                    <livewire:order-list-row :order="$order" :filter="$filter"
                                             :wire:key="'order-list-'.$order->id ?? $order['id']"/>
                @endforeach
            @endif
            </tbody>
        </table>
        @if($loadedAll == false)
            <div
                x-data="{
        observe () {
            let observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        @this.call('loadMore')
                    }
                })
            }, {
                root: null
            })

            observer.observe(this.$el)
        }
    }"
                x-init="observe"
                class="my-4"
            >
                <x-order::ui.spinner/>
            </div>
        @endif
    </div>


    {{--    @if(!empty($orders))--}}
    {{--        <div class="overflow-auto lg:overflow-visible mt-8 sm:mt-0">--}}
    {{--            <table class="table table-report sm:mt-2 w-full">--}}
    {{--                <thead>--}}
    {{--                <tr>--}}
    {{--                    <th class="text-left whitespace-nowrap">Customer</th>--}}
    {{--                    <th class="text-center whitespace-nowrap">Date</th>--}}
    {{--                    <th class="text-center whitespace-nowrap">Price</th>--}}
    {{--                    <th class="text-right whitespace-nowrap">Status</th>--}}
    {{--                    <th class="text-center whitespace-nowrap">Actions</th>--}}
    {{--                </tr>--}}
    {{--                </thead>--}}
    {{--                <tbody>--}}
    {{--                @foreach ($orders as $order)--}}
    {{--                    <livewire:order-list-row :order="$order" :filter="$filter" :param="$param"--}}
    {{--                                             :wire:key="'order-list-'.$order->id ?? $order['id']"/>--}}
    {{--                @endforeach--}}
    {{--                </tbody>--}}
    {{--            </table>--}}
    {{--        </div>--}}
    {{--        <div--}}
    {{--            x-data="{--}}
    {{--            observe () {--}}
    {{--                let observer = new IntersectionObserver((entries) => {--}}
    {{--                    entries.forEach(entry => {--}}
    {{--                        if (entry.isIntersecting) {--}}
    {{--                            @this.call('loadMore')--}}
    {{--                        }--}}
    {{--                    })--}}
    {{--                }, {--}}
    {{--                    root: null--}}
    {{--                })--}}

    {{--                observer.observe(this.$el)--}}
    {{--            }--}}
    {{--        }"--}}
    {{--            x-init="observe"--}}
    {{--        ></div>--}}
    {{--    @endif--}}


</div>
{{--<div class="col-span-12 p-4">--}}
{{--    <div class="block sm:flex items-center">--}}
{{--        <h2 class="text-lg font-medium truncate mr-5">Orders</h2>--}}
{{--    </div>--}}

{{--    @include('order::components.list.order-list-filter')--}}

{{--    @if(!empty($orders))--}}
{{--        <div class="overflow-auto lg:overflow-visible mt-8 sm:mt-0">--}}
{{--            <table class="table table-report sm:mt-2 w-full">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th class="text-left whitespace-nowrap">Customer</th>--}}
{{--                    <th class="text-center whitespace-nowrap">Date</th>--}}
{{--                    <th class="text-center whitespace-nowrap">Price</th>--}}
{{--                    <th class="text-right whitespace-nowrap">Status</th>--}}
{{--                    <th class="text-center whitespace-nowrap">Actions</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach ($orders as $order)--}}
{{--                    <livewire:order-list-row :order="$order" :filter="$filter" :param="$param"--}}
{{--                                             :wire:key="'order-list-'.$order->id ?? $order['id']"/>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--        <div--}}
{{--            x-data="{--}}
{{--        observe () {--}}
{{--            let observer = new IntersectionObserver((entries) => {--}}
{{--                entries.forEach(entry => {--}}
{{--                    if (entry.isIntersecting) {--}}
{{--                        @this.call('loadMore')--}}
{{--                    }--}}
{{--                })--}}
{{--            }, {--}}
{{--                root: null--}}
{{--            })--}}

{{--            observer.observe(this.$el)--}}
{{--        }--}}
{{--    }"--}}
{{--            x-init="observe"--}}
{{--        ></div>--}}
{{--    @endif--}}
{{--</div>--}}
