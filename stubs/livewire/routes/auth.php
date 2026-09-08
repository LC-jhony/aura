<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', \App\Livewire\Auth\Register::class)
        ->name('register');

    Route::get('login', \App\Livewire\Auth\Login::class)
        ->name('login');

    Route::get('forgot-password', \App\Livewire\Auth\ForgotPassword::class)
        ->name('password.request');

    Route::get('reset-password/{token}', \App\Livewire\Auth\ResetPassword::class)
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', \App\Livewire\Auth\VerifyEmail::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', function () {
        if (request()->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        if (request()->user()->markEmailAsVerified()) {
            event(new \Illuminate\Auth\Events\Verified(request()->user()));
        }

        return redirect()->intended(route('dashboard', absolute: false));
    })->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

    Route::post('email/verification-notification', function () {
        request()->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    })->middleware('throttle:6,1')->name('verification.send');

    Route::get('confirm-password', \App\Livewire\Auth\ConfirmPassword::class)
        ->name('password.confirm');

    Route::post('logout', function () {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    })->name('logout');
});
