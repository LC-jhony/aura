<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::livewire('register', 'livewire.auth.register')
        ->name('register');

    Route::livewire('login', 'livewire.auth.login')
        ->name('login');

    Route::livewire('forgot-password', 'livewire.auth.forgot-password')
        ->name('password.request');

    Route::livewire('reset-password/{token}', 'livewire.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::livewire('verify-email', 'livewire.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::livewire('confirm-password', 'livewire.auth.confirm-password')
        ->name('password.confirm');
});
