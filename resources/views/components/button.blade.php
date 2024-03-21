<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-orange-500 hover:bg-orange-400 text-white font-bold py-1.5 px-2.5 rounded cursor-pointer transition duration-300 ease-in-out']) }}>
    {{ $slot }}
</button>