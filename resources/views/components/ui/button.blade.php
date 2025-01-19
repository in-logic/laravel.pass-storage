@props([
    'style' => 'default',
])

@php
    $styles = [
        'success' => [
            'base' => 'bg-green-600 text-white outline-none active:ring-2 active:ring-green-800',
            'icon' => 'bg-green-700 text-white outline-none active:ring-2 active:ring-green-800'
        ],
        'default' => [
            'base' => 'bg-gray-600 text-white outline-none active:ring-2 active:ring-gray-800',
            'icon' => 'bg-gray-700 text-white outline-none active:ring-2 active:ring-gray-800'
        ],
    ];
@endphp

<button {{ $attributes }} class="{{ $styles[$style]['base'] }} p-1 rounded-md">
    @isset($icon)
        <span class="{{ $styles[$style]['icon'] }} px-1 rounded-md">{{ $icon ?? '' }}</span>
    @endisset
    {{ $slot }}
</button>
