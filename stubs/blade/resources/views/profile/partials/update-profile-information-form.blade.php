<section>
    <header>
        {{-- <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2> --}}
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
                {{ __('Profile Information') }}
            </h2>
        </x-slot>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="avatar"
                class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-400">{{ __('Avatar') }}</label>
            @if ($user->avatar)
                <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}"
                    class="w-20 h-20 rounded-full object-cover mt-2" />
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=F0F0FF&size=80"
                    alt="{{ $user->name }}" class="w-20 h-20 rounded-full object-cover mt-2" />
            @endif
            <input type="file" id="avatar" name="avatar"
                class="mt-2 block w-full text-sm text-gray-500 file:me-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-indigo-900/30 dark:file:text-indigo-300 dark:hover:file:bg-indigo-900/50"
                accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" />
            @error('avatar')
                <div class="text-rose-500 text-xs mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <x-input label="Name" type="text" name="name" :value="old('name', $user->name)" required autofocus
                autocomplete="name" />
        </div>

        <div>
            <x-input label="Email" type="email" name="email" :value="old('email', $user->email)" required autocomplete="username" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
