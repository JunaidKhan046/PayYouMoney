<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
               <h3>Thank You. Your order status is {{$status}}</h3>
                <h4>Your Transaction ID for this transaction is {{$txnid}}</h4>
                <h4>We have received a payment of Rs. {{$amount}} Your order will soon be shipped.</h4>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
