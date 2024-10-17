<button {{ $attributes->merge(['type'=>'submit', 'class'=>'inline-flex items-center bg-gray-800 py-2 rounded text-white']) }}>
    {{ $slot }}
</button>    