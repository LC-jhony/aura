@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'flex items-center gap-2 px-4 py-2 mt-2 text-sm font-semibold text-white bg-white/10 rounded-lg hover:bg-white/15 focus:bg-white/20 focus:text-white focus:outline-none focus:shadow-outline'
            : 'flex items-center gap-2 px-4 py-2 mt-2 text-sm font-semibold text-white/70 bg-transparent rounded-lg hover:bg-white/10 hover:text-white focus:bg-white/20 focus:text-white focus:outline-none focus:shadow-outline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
