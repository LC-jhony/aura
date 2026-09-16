<div>
    <form wire:submit="resetPassword">
        <!-- Email Address -->
        <x-input wire:model.live="email" label="Email" type="email" name="email" id="email" required autofocus
            autocomplete="username" />

        <!-- Password -->
        <x-input wire:model.live="password" label="Password" type="password" name="password" id="password" required
            autocomplete="new-password" />

        <!-- Confirm Password -->
        <x-input wire:model.live="password_confirmation" label="Confirm Password" type="password"
            name="password_confirmation" id="password_confirmation" required autocomplete="new-password" />

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</div>
