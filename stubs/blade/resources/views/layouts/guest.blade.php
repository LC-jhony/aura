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
    <!-- ============================================
         LOGIN PAGE - Two-panel layout
         Left: Branding panel (hidden on mobile)
         Right: Login form
         ============================================ -->
    <main class="flex min-h-screen">

        <!-- ============================================
             LEFT PANEL - Branding (Desktop only)
             Gradient background matching index.html header
             ============================================ -->
        <div
            class="hidden w-1/2 flex-col justify-between bg-gradient-to-br from-indigo-600 via-indigo-700 to-indigo-800 p-12 text-white relative overflow-hidden lg:flex">
            <!-- Decorative background circles -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2">
            </div>
            <div class="absolute top-1/2 left-1/2 w-48 h-48 bg-white/5 rounded-full -translate-x-1/2 -translate-y-1/2">
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
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-indigo-100/90">Fast and secure access</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-indigo-100/90">Data synced in the cloud</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
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
            <div class="relative z-10 text-sm text-indigo-200/70">© 2026 VentasPro. All rights reserved.</div>
        </div>

        <!-- ============================================
             RIGHT PANEL - Login Form
             ============================================ -->
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

                <!-- Login Form -->
                {{-- <form class="space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                        <div class="mt-2">
                            <input id="email" type="email" name="email" placeholder="tu@empresa.com"
                                autocomplete="email" value="{{ old('email') }}" required
                                class="block w-full rounded-lg bg-white px-4 py-3 text-sm text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-200" />
                        </div>
                        @error('email')
                            <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                            <a href="{{ route('password.request') }}"
                                class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Forgot your password?</a>
                        </div>
                        <div class="mt-2">
                            <input id="password" type="password" name="password" placeholder="••••••••"
                                autocomplete="current-password" required
                                class="block w-full rounded-lg bg-white px-4 py-3 text-sm text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 transition-all duration-200" />
                        </div>
                        @error('password')
                            <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember me -->
                    <div class="flex items-center gap-3">
                        <div class="flex h-5 shrink-0 items-center">
                            <div class="group grid size-5 grid-cols-1">
                                <input id="remember" type="checkbox" name="remember"
                                    {{ old('remember') ? 'checked' : '' }}
                                    class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" />
                                <svg viewBox="0 0 14 14" fill="none"
                                    class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white">
                                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                                </svg>
                            </div>
                        </div>
                        <label for="remember" class="text-sm text-gray-600 cursor-pointer">Remember me</label>
                    </div>

                    <!-- Submit button -->
                    <div>
                        <button type="submit"
                            class="w-full rounded-lg bg-indigo-600 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-colors">
                            Log in
                        </button>
                    </div>
                </form> --}}
                {{ $slot }}

            </div>
        </div>
    </main>
</body>

</html>
