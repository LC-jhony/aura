<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form wire:submit="updatePassword" class="mt-6 space-y-6">
        <!-- Current Password -->
        <x-input wire:model.live="current_password" label="Current Password" type="password"
            name="current_password" id="update_password_current_password" autocomplete="current-password" />

        <!-- New Password -->
        <x-input wire:model.live="password" label="New Password" type="password" name="password"
            id="update_password_password" autocomplete="new-password" />

        <!-- Confirm Password -->
        <x-input wire:model.live="password_confirmation" label="Confirm Password" type="password"
            name="password_confirmation" id="update_password_password_confirmation" autocomplete="new-password" />

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="password-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
