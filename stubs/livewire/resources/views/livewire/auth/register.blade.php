<div>
    <form wire:submit="register">
        <!-- Name -->
        <x-input wire:model.live="name" label="Name" type="text" name="name" id="name" required autofocus
            autocomplete="name" />

        <!-- Email Address -->
        <x-input wire:model.live="email" label="Email" type="email" name="email" id="email" required
            autocomplete="username" />

        <!-- Password -->
        <x-input wire:model.live="password" label="Password" type="password" name="password" id="password" required
            autocomplete="new-password" />

        <!-- Confirm Password -->
        <x-input wire:model.live="password_confirmation" label="Confirm Password" type="password"
            name="password_confirmation" id="password_confirmation" required autocomplete="new-password" />

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
