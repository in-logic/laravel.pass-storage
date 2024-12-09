@props([
    'style' => 'default',
])

@php
    $styles = [
        'success' => [
            'base' => 'bg-green-600 text-white outline-none active:ring-2 active:ring-green-800',
            'icon' => 'bg-green-700 text-white'
        ],
        'default' => [
            'base' => 'bg-gray-600 text-white',
            'icon' => 'bg-gray-700 text-white'
        ],
    ];
@endphp

<button {{ $attributes }} class="{{ $styles[$style]['base'] }} p-1 rounded-md">
    <span class="{{ $styles[$style]['icon'] }} px-1 rounded-md">{{ $icon ?? '' }}</span>
    {{ $slot }}
</button>
