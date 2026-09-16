@props([
    'color' => 'blue',
    'size' => 'small',
    'value',
    'icon',
    'href',
    'type' => 'button',
])
@php
    $buttonColorClass =
        [
            'dark' => 'bg-gray-800 hover:bg-gray-900 dark:bg-gray-700 dark:hover:bg-gray-600',
            'gray' => 'bg-gray-500 hover:bg-gray-600 dark:bg-gray-400 dark:hover:bg-gray-500',
            'teal' => 'bg-teal-500 hover:bg-teal-600 dark:bg-teal-400 dark:hover:bg-teal-500',
            'blue' => 'bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600',
            'red' => 'bg-red-500 hover:bg-red-600 dark:bg-red-400 dark:hover:bg-red-500',
            'rose' => 'bg-rose-500 hover:bg-rose-600 dark:bg-rose-400 dark:hover:bg-rose-500',
            'yellow' => 'bg-yellow-500 hover:bg-yellow-600 dark:bg-yellow-400 dark:hover:bg-yellow-500',
            'amber' => 'bg-amber-500 hover:bg-amber-600 dark:bg-amber-400 dark:hover:bg-amber-500',
            'green' => 'bg-green-500 hover:bg-green-600 dark:bg-green-400 dark:hover:bg-green-500',
        ][$color] ?? 'bg-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700';

    $buttonSizeClass =
        [
            'full' => 'w-full py-1.5',
            'extrasmall' => 'px-3 py-2 text-sm ',
            'small' => 'px-3 py-2 text-xs',
            'base' => 'px-4 py-2.5 text-sm',
            'large' => 'px-4 py-2.5 text-base',
            'extralarge' => 'px-5 py-2.5 text-base',
        ][$size] ?? 'px-3 py-2 text-xs';
@endphp
<div {{ $attributes->merge(['class' => 'text-white font-medium']) }}>
    @isset($href)
        <a href="{{ $href }}"
            class="{{ $buttonSizeClass }} text-white font-semibold {{ $buttonColorClass }} rounded-md">
            {{ $value ?? $slot }}
        </a>
    @else
        <button type="{{ $type }}"
            class="flex item gap-3 {{ $buttonSizeClass }} text-white font-semibold {{ $buttonColorClass }} rounded-md">
            {{ $value ?? $slot }}
        </button>
    @endisset

</div>
