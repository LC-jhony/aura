<?php

namespace Laravel\Aura\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Process\Process;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\select;

class InstallAuraCommand extends Command
{
    protected $signature = 'aura:install';

    protected $description = 'Install Aura authentication scaffolding';

    /**
     * Handle the command.
     */
    public function handle(): int
    {
        if (! file_exists(base_path('artisan'))) {
            $this->error('Could not find artisan file. Are you in a Laravel project directory?');

            return 1;
        }

        $stack = select(
            'Which stack would you like to install?',
            ['blade' => 'Blade + Alpine.js', 'livewire' => 'Livewire + Alpine.js'],
            'blade'
        );

        $pest = confirm('Would you like to install Pest for testing?', true);
        $dark = confirm('Would you like dark mode support?', true);
        $migrate = confirm('Would you like to run the default migrations?', true);

        $this->newLine();
        $this->components->info('Installing Aura authentication scaffolding...');

        match ($stack) {
            'blade' => $this->installBladeStack(),
            'livewire' => $this->installLivewireStack(),
        };

        if (! $dark) {
            $this->removeDarkClasses((new Finder)
                ->in(resource_path('views'))
                ->name('*.blade.php')
            );
        }

        if ($pest) {
            $this->installPestTests($stack);
        }

        if ($migrate) {
            $this->components->info('Running migrations...');
            $this->call('migrate');
        }

        $this->updateNodePackages($stack);
        $this->runNpmInstall();

        $this->components->info('Clearing caches...');
        $this->runCommands(['php artisan route:clear', 'php artisan config:clear', 'php artisan view:clear']);

        $this->newLine();
        $this->components->info('Aura scaffolding installed successfully.');

        return 0;
    }

    /**
     * Install the Blade stack.
     */
    protected function installBladeStack(): void
    {
        $fs = new Filesystem;

        $fs->ensureDirectoryExists(app_path('Http/Controllers'));
        $fs->copyDirectory(__DIR__.'/../../stubs/blade/app/Http/Controllers', app_path('Http/Controllers'));

        $fs->ensureDirectoryExists(app_path('Http/Requests'));
        $fs->copyDirectory(__DIR__.'/../../stubs/blade/app/Http/Requests', app_path('Http/Requests'));

        $fs->copyDirectory(__DIR__.'/../../stubs/blade/resources/views', resource_path('views'));

        $fs->ensureDirectoryExists(app_path('View/Components'));
        $fs->copyDirectory(__DIR__.'/../../stubs/blade/app/View/Components', app_path('View/Components'));

        copy(__DIR__.'/../../stubs/blade/routes/web.php', base_path('routes/web.php'));
        copy(__DIR__.'/../../stubs/blade/routes/auth.php', base_path('routes/auth.php'));

        $fs->copyDirectory(__DIR__.'/../../stubs/common/resources', resource_path(''));
        copy(__DIR__.'/../../stubs/common/vite.config.js', base_path('vite.config.js'));
    }

    /**
     * Install the Livewire stack.
     */
    protected function installLivewireStack(): void
    {
        $fs = new Filesystem;

        $this->components->info('Installing Livewire...');
        $this->runCommands(['composer require livewire/livewire']);

        $fs->ensureDirectoryExists(app_path('Livewire'));
        $fs->copyDirectory(__DIR__.'/../../stubs/livewire/app/Livewire', app_path('Livewire'));

        $fs->copyDirectory(__DIR__.'/../../stubs/livewire/resources/views', resource_path('views'));

        copy(__DIR__.'/../../stubs/livewire/routes/web.php', base_path('routes/web.php'));
        copy(__DIR__.'/../../stubs/livewire/routes/auth.php', base_path('routes/auth.php'));

        $fs->copyDirectory(__DIR__.'/../../stubs/common/resources/css', resource_path('css'));
        copy(__DIR__.'/../../stubs/common/vite.config.js', base_path('vite.config.js'));
    }

    /**
     * Install Pest tests for the selected stack.
     */
    protected function installPestTests(string $stack): void
    {
        $this->components->info('Installing Pest...');

        $this->runCommands([
            'composer require pestphp/pest pestphp/pest-plugin-laravel --dev',
        ]);

        $this->runCommands(['./vendor/bin/pest --init']);

        $fs = new Filesystem;

        if ($fs->exists(base_path('tests/Pest.php'))) {
            $fs->delete(base_path('tests/Pest.php'));
        }

        $fs->copyDirectory(__DIR__.'/../../stubs/'.$stack.'/pest-tests', base_path('tests'));
    }

    /**
     * Remove dark mode classes from the given views.
     */
    protected function removeDarkClasses(Finder $finder): void
    {
        foreach ($finder as $file) {
            $contents = file_get_contents($file->getRealPath());

            $contents = preg_replace('/\s*dark\:(?:bg|text|border|ring|shadow|divide|placeholder|accent|fill|stroke|opacity|blur|grayscale|invert|sepia|saturate|contrast|hue-rotate|backdrop|from|via|to|inset|place)[a-z0-9-]*(?:\[[^\]]+\])?/', '', $contents);

            file_put_contents($file->getRealPath(), $contents);
        }
    }

    /**
     * Update the package.json file with the required Node dependencies.
     */
    protected function updateNodePackages(string $stack): void
    {
        $packages = [
            '@tailwindcss/vite' => '^4.0.0',
            'tailwindcss' => '^4.0.0',
            'vite' => '^8.0.0',
            'laravel-vite-plugin' => '^3.1',
        ];

        if ($stack === 'blade') {
            $packages['alpinejs'] = '^3.4.2';
        }

        if (file_exists(base_path('package.json'))) {
            $json = json_decode(file_get_contents(base_path('package.json')), true);

            $json['devDependencies'] = array_merge($packages, $json['devDependencies'] ?? []);

            file_put_contents(
                base_path('package.json'),
                json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES).PHP_EOL
            );
        }
    }

    /**
     * Run npm install and build based on the detected package manager.
     */
    protected function runNpmInstall(): void
    {
        $this->components->info('Installing and building Node dependencies...');

        if (file_exists(base_path('pnpm-lock.yaml'))) {
            $this->runCommands(['pnpm install', 'pnpm run build']);
        } elseif (file_exists(base_path('yarn.lock'))) {
            $this->runCommands(['yarn install', 'yarn run build']);
        } elseif (file_exists(base_path('bun.lock')) || file_exists(base_path('bun.lockb'))) {
            $this->runCommands(['bun install', 'bun run build']);
        } else {
            $this->runCommands(['npm install', 'npm run build']);
        }
    }

    /**
     * Run the given commands.
     *
     * @param  array<int, string>  $commands
     */
    protected function runCommands(array $commands): void
    {
        $process = Process::fromShellCommandline(implode(' && ', $commands));

        $process->run(function ($type, $buffer) {
            $this->output->write($buffer);
        });

        if (! $process->isSuccessful()) {
            $this->error('The following command failed: '.implode(' && ', $commands));
            $this->newLine();
            $this->error($process->getErrorOutput());
        }
    }

    /**
     * Replace a given string within a given file.
     */
    protected function replaceInFile(string $search, string $replace, string $path): void
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }
}
