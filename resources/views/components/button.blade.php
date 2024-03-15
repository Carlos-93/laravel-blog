<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded cursor-pointer transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110']) }}>
    {{ $slot }}
</button>