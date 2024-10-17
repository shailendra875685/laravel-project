<x-base-layout>

    {{-- Main Content --}}
    <div class="flex m-4">

        {{-- Left half --}}
        <div class="w-1/2 rounded shadow overflow-hidden">
            <img class="object-cover w-full h-96" src="{{ asset($product->image_url) }}" alt="This is image"/>
        </div>
        
        {{-- Right half --}}
        <div class="w-1/2 rounded bg-white ml-2 p-4 shadow relative">

            {{-- @if (Auth::id() == $product->user->id)
                <div class="flex">
                    <a href="{{ route('product.update',$product->id) }}">
                        <div class="bg-blue-500 rounded-full px-4 py-2 shadow text-sm text-white">Edit</div>
                    </a>

                    <a href="{{ route('product.delete',$product->id) }}">
                        <div class="bg-red-300 ml-1 rounded-full px-4 py-2 shadow text-sm text-white" onclick="return confirm('do you want to delete item ?')">Delete</div>         
                    </a>
                </div>
            @endif --}}

            <div class="font-semibold">{{ $product->title }}</div>
            <div class="text-sm">{{ $product->short_desc }}</div>
            <div class="text-xs text-gray-500 mt-2">{!! $product->long_desc !!}</div>
            
            {{-- Seller infomation --}}
            <div class="mt-4">
                <div class="text-xs font-semibold text-gray">Sold by:</div>
                @auth
                <div class="text-sm text-gray-500">{{ $product->user->name }}</div>
                @else
                <div class="text-sm text-gray-500">********<a href="{{ url('/login') }}" class="text-xs text-blue-500">Login to view</a></div>    
                @endauth
                
            </div>
            <div class="mt-2">
                <div class="text-xs font-semibold text-gray">Phone number:</div>
                @auth
                <div class="text-sm text-gray-500">{{ $product->user->phone }}</div>
                @else
                <div class="text-sm text-gray-500">**********<a href="{{ url('/login') }}" class="text-xs text-blue-500">Login to view</a></div>    
                @endauth
            </div>
            <div class="mt-2">
                <div class="text-xs font-semibold text-gray">Email address:</div>
                @auth
                <div class="text-sm text-gray-500">{{ $product->user->email }}</div>  
                @else
                <div class="text-sm text-gray-500">**********<a href="{{ url('/login') }}" class="text-xs text-blue-500">Login to view</a></div>
                @endauth
                
            </div>

             {{-- Product delete --}}
            <div class="mt-5">
                @auth
                <a href="{{ route('product.delete',$product->id) }}" onclick="return confirm('do you want to delete item ?')" class="bg-red-500 rounded-full px-4 py-2 shadow text-sm text-white">Delete</a>                 
                <a href="{{ route('product.update',$product->id) }}"  class="bg-green-500 px-4 py-2 rounded-full shadow text-sm text-white">Edit</a>                 
                @endauth
            </div>

       
            {{-- Product Price --}}
            <div class="absolute bottom-0 right-0 m-6 rounded-full px-4 py-2 bg-green-500">
                <div class="text-white font-bold text-sm cursor-pointer">₹{{ $product->price }}</div>
            </div>
    

        </div>

        
    </div>

</x-base-layout>