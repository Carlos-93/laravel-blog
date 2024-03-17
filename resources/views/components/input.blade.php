@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:ring-orange-500 focus:border-transparent focus:ring-2 rounded-md shadow-sm placeholder-gray-400']) !!}>