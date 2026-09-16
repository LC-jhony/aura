<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-container>
        Welcome to your dashboard Aura, {{ Auth::user()->name }}!
    </x-container>
</x-app-layout>
