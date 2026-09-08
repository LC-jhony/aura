# Aura

Minimal Laravel authentication scaffolding with Blade and Tailwind CSS v4. Supports both Blade + Alpine.js and Livewire + Alpine.js stacks with an interactive installer.

## Requirements

- PHP 8.3+
- Laravel 11, 12, or 13
- Node.js 18+ (for frontend assets)

## Installation

```bash
composer require laravel/aura
php artisan aura:install
```

The installer will prompt you to select:

| Option | Description |
|--------|-------------|
| **Stack** | Blade + Alpine.js or Livewire + Alpine.js |
| **Pest** | Install Pest for testing |
| **Dark Mode** | Include dark mode support |
| **Migrations** | Run default migrations |

## Stacks

### Blade + Alpine.js

Traditional server-rendered views with Alpine.js for interactivity.

- 9 auth controllers (login, register, password reset, email verification, etc.)
- Profile management with avatar upload
- Blade components (buttons, inputs, dropdowns, modals)
- Classic form-based authentication

### Livewire + Alpine.js

Reactive components with Livewire for real-time updates.

- Livewire components for all auth flows
- Profile management with Livewire file uploads
- `wire:model` for reactive form binding
- `wire:navigate` for SPA-like navigation

## Features

- User registration and login
- Password reset via email
- Email verification
- Password confirmation
- Profile management with avatar upload
- Dark mode support
- Pest test stubs
- Tailwind CSS v4 with Vite

## File Structure

```
stubs/
  blade/              # Blade stack files
    app/Http/Controllers/Auth/
    app/Http/Controllers/ProfileController.php
    app/Http/Requests/
    app/View/Components/
    resources/views/
    routes/
    pest-tests/

  livewire/           # Livewire stack files
    app/Livewire/
    resources/views/
    routes/
    pest-tests/

  common/             # Shared between stacks
    resources/css/app.css    # Tailwind v4 config
    resources/js/app.js      # Alpine.js
    vite.config.js           # Vite + @tailwindcss/vite
```

## Frontend

Aura uses **Tailwind CSS v4** with the Vite plugin. The configuration is CSS-first:

```css
@import 'tailwindcss';

@theme {
    --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
}
```

No `tailwind.config.js` or `postcss.config.js` needed.

## Avatar Upload

Both stacks include avatar upload support. Avatars are stored in `storage/app/public/avatars/{user_id}/`. After installation, run:

```bash
php artisan storage:link
```

## Testing

If you selected Pest during installation:

```bash
./vendor/bin/pest
```

## License

MIT
