<x-base-layout>

    @if (session('success'))
    <span class="text-white m-4 p-2 px-4 bg-green-500">
        {{ session('success') }}
    </span>
    @endif
    
    {{-- Main Content --}}
    <div class="grid grid-cols-4 gap-4 p-4">

        {{-- @foreach($products as $product)
            
                 
        @endforeach  --}}

        @each('each_product_on_list',$products,'product')

    </div>
    
    <div class="p-6">{{ $products->links() }}</div>

        
</x-base-layout>