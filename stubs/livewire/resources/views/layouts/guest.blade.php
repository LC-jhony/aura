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

<body class="font-sans text-gray-900 dark:text-gray-100 antialiased dark:bg-gray-900">
    <main class="flex min-h-screen">
        <!-- LEFT PANEL - Branding (Desktop only) -->
        <div
            class="hidden w-1/2 flex-col justify-between bg-gradient-to-br from-indigo-600 via-indigo-700 to-indigo-800 p-12 text-white relative overflow-hidden lg:flex">
            <!-- Decorative background circles -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2">
            </div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2">
            </div>
            <div
                class="absolute top-1/2 left-1/2 w-48 h-48 bg-white/5 rounded-full -translate-x-1/2 -translate-y-1/2">
            </div>

            <!-- Logo -->
            <div class="relative z-10 flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                    <x-application-logo class="w-5 h-5 text-white" />
                </div>
                <span class="text-2xl font-bold tracking-tight">Laravel Aura</span>
            </div>

            <!-- Main content -->
            <div class="relative z-10">
                <h2 class="text-4xl font-bold leading-tight mb-4">Welcome back</h2>
                <p class="text-lg text-indigo-100/90 max-w-md">Access your dashboard and manage your sales
                    intelligently.</p>

                <!-- Features -->
                <div class="mt-8 space-y-3">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-indigo-100/90">Fast and secure access</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-indigo-100/90">Data synced in the cloud</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-indigo-100/90">24/7 dedicated support</span>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="relative z-10 text-sm text-indigo-200/70">&copy; {{ date('Y') }} VentasPro. All rights
                reserved.</div>
        </div>

        <!-- RIGHT PANEL - Login Form -->
        <div class="flex w-full flex-col justify-center px-6 py-12 lg:w-1/2 lg:px-16 xl:px-24 dark:bg-gray-900">
            <div class="mx-auto w-full max-w-md">
                <!-- Mobile logo -->
                <div class="mb-8 lg:hidden flex items-center gap-2">
                    <div class="w-9 h-9 bg-indigo-600 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">VentasPro</span>
                </div>

                <!-- Header -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Log in</h1>
                    <p class="mt-2 text-gray-500 dark:text-gray-400">Enter your credentials to access</p>
                </div>

                {{ $slot }}
            </div>
        </div>
    </main>
</body>

</html>
