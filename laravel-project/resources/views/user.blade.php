<x-base-layout>
    <x-form-container-card>

        @if ($errors->any())
            <div class="text-red-600 text-sm">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>  
        @endif

        <x-slot name='title'>
            What do you want to sell today?
        </x-slot>

        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <label for="title" class="text-sm text-gray-500">User Name:</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 w-full">
            </div>
            <div class="mt-2">
                <label for="desc-sm" class="text-sm text-gray-500">Email:</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 w-full">
            </div>
            <div class="mt-2">
                <label for="desc-full" class="text-sm text-gray-500">Password:</label>
                <input type="text" id="password" name="password" value="{{ old('password') }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 w-full">
               
            </div>
            <div class="mt-2">
                <label for="price" class="text-sm text-gray-500">Confirm Password</label>
                <input type="text" id="confirm_pass" name="cpassword" value="{{ old('cpassword') }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 w-full">
                                                        {{-- password_confirmation  --}}
            </div>
            <div class="mt-2">
                <label for="img" class="text-sm text-gray-500">Select an image</label>
                <input type="file" id="img" name="img" value="{{ old('img') }}" class="border-gray-300 focus:border-indigo-300 w-full">
            </div>

            <x-button class="mt-4 w-full justify-center">
                Submit
            </x-button>    
            
        </form>
    </x-form-container-card>
</x-base-layout>