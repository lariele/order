<div class="grid col-span-12">
    <h2 class="mt-4 text-2xl font-bold dark:text-white">Order detail</h2>
    <div class="mt-4">
        <x-form::text label="Customer name" key="customer_name" model="order.customer_name"/>
        <x-form::text label="Customer address" key="customer_address" model="order.customer_address"/>
        <x-form::text label="Price" key="price" model="order.price"/>
        <x-form::select label="Status" key="status" model="order.status" :options="\Lariele\Order\Enums\OrderStatus::cases()" selected="$order.selected" />

        <x-form::text label="Ordered at" key="ordered_at" model="order.ordered_at"/>

        <button wire:click="save()"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Save
        </button>
    </div>
</div>
