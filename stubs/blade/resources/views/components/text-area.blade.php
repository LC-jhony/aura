@props(['disabled' => false])
@php
    $class = $errors->has($attributes->get('name'))
        ? 'py-3 px-4block w-full border-rose-200 rounded-lg text-sm text-rose-500 focus:border-rose-500 focus:ring-rose-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-rose-900 dark:border-rose-700 dark:text-rose-400 dark:placeholder-rose-500 dark:focus:ring-rose-600'
        : 'py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600';
@endphp
<div class="mt-2">
    <textarea {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => $class]) }}>
</textarea>
</div>

@error($attributes->get('name'))
    <div class="text-rose-500 text-sm">
        {{ $message }}
    </div>
@enderror
