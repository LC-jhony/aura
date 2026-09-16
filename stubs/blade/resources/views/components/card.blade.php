@props(['color' => 'blue', 'border' => 'blue'])

@php
    $CardColorClass =
        [
            'blue ' => 'bg-blue-50 dark:bg-blue-900/50',
            'orange' => 'bg-orange-50 dark:bg-orange-900/50',
            'red' => 'bg-red-50 dark:bg-red-900/50',
            'indigo' => 'bg-indigo-50 dark:bg-indigo-900/50',
        ][$color] ?? 'bg-blue-50 dark:bg-blue-900/50';
    $IconBorderClass =
        [
            'blue ' => 'border-blue-100 dark:border-blue-800',
            'orange' => 'border-orange-100 dark:border-orange-800',
            'red' => 'border-red-100 dark:border-red-800',
            'indigo' => 'border-indigo-100 dark:border-indigo-800',
        ][$border] ?? 'border-blue-100 dark:border-blue-800';
@endphp
<div class="flex items-start p-4 rounded-xl shadow-lg bg-white dark:bg-gray-900">
    <div
        class="flex items-center justify-center {{ $CardColorClass }} h-12 w-12 rounded-full border {{ $IconBorderClass }} ">
        {{ $icon ?? null }}
    </div>

    <div class="ml-4">
        {{ $slot }}
    </div>
</div>
