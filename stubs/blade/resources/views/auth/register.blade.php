<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <x-input label="name" type="text" name="name" />
        <x-input label="email" type="email" name="email" />
        <x-input label="password" type="password" name="password" />
        <x-input label="password_confirmation" type="password" name="password_confirmation" />
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
