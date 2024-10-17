<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (sizeof($products))
                        {{ sizeof($products) }} products, that you are selling.(<a href="{{ route('sell.store') }}" class="text-blue-500 font-bold">Sell more</a>)
                    @else
                        Currently you are not selling anything.(<a href="{{ route('sell.store') }}" class="text-blue-500 font-bold">Sell something</a>)    
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-4 gap-4 p-4">
        @each('each_product_on_list',$products,'product')
    </div>

    <div class="p-6">{{ $products->links() }}</div>

</x-app-layout>
