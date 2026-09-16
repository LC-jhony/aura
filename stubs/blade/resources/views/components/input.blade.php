@props([
    'disabled' => false,
    'label' => 'null',
])
@php
    $isPassword = $attributes->get('type') === 'password';
    $class = $errors->has($attributes->get('name'))
        ? 'block w-full rounded-lg bg-white dark:bg-gray-900 px-2.5 py-2 text-sm text-rose-500 dark:text-rose-400 outline-1 -outline-offset outline-rose-300 dark:outline-rose-700 placeholder:text-rose-400 dark:placeholder:text-rose-500 focus:outline-2 focus:-outline-offset-2 focus:outline-rose-600 dark:focus:outline-rose-500 transition-all duration-200'
        : 'block w-full rounded-lg bg-white dark:bg-gray-900 px-2.5 py-2 text-sm text-gray-900 dark:text-gray-300 outline-1 -outline-offset outline-gray-300 dark:outline-gray-700 placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 dark:focus:outline-indigo-500 transition-all duration-200';
@endphp
<div @if ($isPassword) x-data="{ show: false }" @endif class="mb-4">
    @if ($label !== 'null')
        <label for="{{ $attributes->get('id') }}"
            class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-400">{{ $label }}</label>
    @endif
    <div class="{{ $isPassword ? 'relative' : '' }}">
        <input @disabled($disabled) @if ($isPassword) :type="show ? 'text' : 'password'" @endif
            name="{{ $attributes->get('name') }}" id="{{ $attributes->get('id') }}"
            {{ $attributes->merge(['class' => $class]) }}>
        @if ($isPassword)
            <button type="button" x-cloak
                class="absolute right-2 top-1/2 -translate-y-1/2 p-1 text-neutral-500 hover:text-indigo-600 dark:text-neutral-400 dark:hover:text-indigo-400 focus:outline-none"
                @click="show = !show" :aria-label="show ? 'Ocultar contraseña' : 'Mostrar contraseña'"
                :aria-pressed="show.toString()" tabindex="0">
                <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                </svg>
                <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </button>
        @endif
    </div>
</div>
@error($attributes->get('name'))
    <div class="text-rose-500 text-xs mt-1">
        {{ $message }}
    </div>
@enderror
