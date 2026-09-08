<?php

namespace Laravel\Aura;

use Illuminate\Support\ServiceProvider;
use Laravel\Aura\Console\InstallAuraCommand;

class AuraServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->commands([
            InstallAuraCommand::class,
        ]);
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
