<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <x-input label="Email" type="email" name="email" id="email"
            value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />

        <!-- Password -->
        <x-input label="Password" type="password" name="password" id="password" required
            autocomplete="new-password" />

        <!-- Confirm Password -->
        <x-input label="Confirm Password" type="password" name="password_confirmation"
            id="password_confirmation" required autocomplete="new-password" />

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
