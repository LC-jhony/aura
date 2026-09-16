<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script>
        (function() {
            let isDark = localStorage.theme === 'dark' ||
                (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
            if (isDark) document.documentElement.classList.add('dark');
        })();
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="bg-indigo-700 dark:bg-indigo-800 shadow pb-52 text-white">
            <x-navbar.navigation>
                <x-navbar.nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <x-heroicon-o-home />
                    {{ __('Dashboard') }}
                </x-navbar.nav-link>
            </x-navbar.navigation>
        </div>
        <!-- Page Content -->
        <main class="mx-auto -mt-48 max-w-7xl px-6 pb-24">
            <!-- Page Heading -->
            @isset($header)
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-5">
                    <header class="text-white">
                        <div class="max-w-7xl mx-auto py-3 sm:px-4 lg:px-2">
                            {{ $header }}
                        </div>
                    </header>
                </div>
            @endisset
            <x-container transparent noPadding>
                {{ $slot }}
            </x-container>
        </main>
    </div>
</body>

</html>
