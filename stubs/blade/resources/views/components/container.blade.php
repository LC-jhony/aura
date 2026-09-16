@props([
    'noPadding' => false,
    'transparent' => false,
])

<div @class([
    'overflow-hidden sm:rounded-lg',
    'bg-white shadow-sm dark:bg-gray-800' => !$transparent,
    'rounded-2xl bg-gray-100 dark:bg-gray-900 shadow-2xl shadow-indigo-900/10' => $transparent,
])>
    @unless($noPadding)
        <div class="p-6 text-gray-900 dark:text-gray-100">
            {{ $slot }}
        </div>
    @else
        {{ $slot }}
    @endunless
</div>
