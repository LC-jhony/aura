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
# Componente `<x-input>`

Componente Blade reutilizable para campos de formulario con soporte para errores, contraseñas y modo oscuro.

## Características

- ✅ Soporte completo de modo oscuro (dark mode)
- ✅ Toggle de visibilidad para campos de contraseña
- ✅ Mostrado automático de errores de validación
- ✅ Label opcional
- ✅ Soporte para atributos HTML adicionales

## Props

| Prop       | Tipo     | Default  | Descripción                                   |
| ---------- | -------- | -------- | --------------------------------------------- |
| `disabled` | `bool`   | `false`  | Deshabilita el campo                          |
| `label`    | `string` | `'null'` | Texto del label (no se muestra si es `'null'`) |

## Atributos soportados

- `name` — nombre del campo (requerido para mostrar errores)
- `id` — ID del campo (vinculado al label)
- `type` — tipo de input (`text`, `email`, `password`, `number`, etc.)
- `placeholder` — texto placeholder
- `value` — valor inicial del campo
- `required` — campo requerido
- `autofocus` — autofocus al cargar
- `autocomplete` — atributo de autocompletado
- Cualquier otro atributo HTML válido

---

## Ejemplos de uso

### 1. Campo básico (sin label)

```blade
<x-input name="email" id="email" type="email" />
```

### 2. Campo con label

```blade
<x-input name="email" id="email" type="email" label="Correo electrónico" />
```

### 3. Campo de contraseña (con toggle de visibilidad)

```blade
<x-input name="password" id="password" type="password" label="Contraseña" />
```

### 4. Campo deshabilitado

```blade
<x-input name="email" id="email" type="email" label="Correo" disabled />
```

### 5. Campo con placeholder

```blade
<x-input name="email" id="email" type="email" placeholder="tu@email.com" />
```

### 6. Campo con valor prellenado

```blade
<x-input name="name" type="text" label="Nombre" :value="old('name', $user->name)" />
```

### 7. Campo requerido con autofocus

```blade
<x-input name="email" type="email" label="Correo electrónico" required autofocus />
```

### 8. Campo con autocompletado

```blade
<x-input name="password" type="password" label="Contraseña" autocomplete="current-password" />
```

### 9. Campo con atributos extra

```blade
<x-input 
    name="email" 
    id="email" 
    type="email" 
    label="Correo electrónico" 
    placeholder="tu@email.com" 
    autocomplete="email"
    required
/>
```

---

## Ejemplos reales del proyecto

## Dashboard

```blade
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-container>

        <x-card-container>

            <x-card>
                <x-slot name='icon'>
                    <x-heroicon-o-chat-bubble-left-ellipsis />
                </x-slot>
                <h2 class="font-semibold">574 Messages</h2>
                <p class="mt-2 text-sm text-gray-500">Last opened 4 days ago</p>
            </x-card>
            <x-card color='orange' border='orange'>
                <x-slot name='icon'>
                    <x-heroicon-o-user />
                </x-slot>
                <h2 class="font-semibold">1823 Users</h2>
                <p class="mt-2 text-sm text-gray-500">Last checked 3 days ago</p>
            </x-card>
            <x-card color='red' border='red'>
                <x-slot name='icon'>
                    <x-heroicon-o-inbox-arrow-down />
                </x-slot>
                <h2 class="font-semibold">548 Posts</h2>
                <p class="mt-2 text-sm text-gray-500">Last authored 1 day ago</p>
            </x-card>
            <x-card color='indigo' border='indigo'>
                <x-slot name='icon'>
                    <x-heroicon-o-chat-bubble-oval-left-ellipsis />
                </x-slot>
                <h2 class="font-semibold">129 Comments</h2>
                <p class="mt-2 text-sm text-gray-500">Last commented 8 days ago</p>
            </x-card>
        </x-card-container>
        <x-input label="email" type="email" />
        <x-input label="password" type="password" />
        <x-table :headers="['Name', 'Email', 'Avatar', ['name' => 'accion', 'align' => 'center']]">
            @foreach ($users as $user)
                <tr>
                    <x-td>{{ $user->name }}</x-td>
                    <x-td>{{ $user->email }}</x-td>
                    <x-td>
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar"
                            class="w-10 h-10 rounded-full">
                    </x-td>
                    <x-td>
                        <a href="" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <a href="" class="text-red-500 hover:text-red-700 ml-2">Delete</a>
                    </x-td>
                </tr>
            @endforeach
        </x-table>

    </x-container>
</x-app-layout>
```

### Formulario de Login (`auth/login.blade.php`)

```blade
<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <x-input label="email" type="email" name="email" id="email" />
        <x-input label="password" type="password" name="password" id="password" required
            autocomplete="current-password" />

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
```

### Formulario de Registro (`auth/register.blade.php`)

```blade
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <x-input label="name" type="text" name="name" />
        <x-input label="email" type="email" name="email" />
        <x-input label="password" type="password" name="password" />
        <x-input label="password_confirmation" type="password" name="password_confirmation" />

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
```

### Actualizar Perfil (`profile/partials/update-profile-information-form.blade.php`)

```blade
<x-input label="Name" type="text" name="name" :value="old('name', $user->name)" required autofocus
    autocomplete="name" />
<x-input label="Email" type="email" name="email" :value="old('email', $user->email)" required autocomplete="username" />
```

### Cambiar Contraseña (`profile/partials/update-password-form.blade.php`)

```blade
<x-input label="Current Password" id="update_password_current_password" type="password" name="current_password"
    autocomplete="current-password" />
<x-input label="New Password" id="update_password_password" type="password" name="password"
    autocomplete="new-password" />
<x-input label="Confirm Password" id="update_password_password_confirmation" type="password"
    name="password_confirmation" autocomplete="new-password" />
```

### Eliminar Cuenta (`profile/partials/delete-user-form.blade.php`)

```blade
<x-input label="Password" id="password" name="password" type="password"
    autocomplete="current-password" />
```

### Contraseña de Confirmación (`auth/confirm-password.blade.php`)

```blade
<x-input for="password" type="password" name="password" required autocomplete="current-password" />
```

### Recuperar Contraseña (`auth/forgot-password.blade.php`)

```blade
<x-input for="email" type="email" name="email" :value="old('email')" required autofocus />
```

---

## Comportamiento con errores de validación

El componente muestra automáticamente errores debajo del campo si existen en la sesión de errores:

```php
// En el controlador
use Illuminate\Support\Facades\Validator;

Validator::make($request->all(), [
    'email' => 'required|email',
    'password' => 'required|min:8',
]);
```

```blade
<x-input name="email" type="email" label="Correo electrónico" />
{{-- Si hay error de validación en 'email', se muestra automáticamente debajo del campo --}}
```

El error se renderiza con estilos de Tailwind CSS:
```html
<div class="text-rose-500 text-xs mt-1">
    El campo email es obligatorio.
</div>
```

---

## Soporte de Modo Oscuro

El componente tiene soporte completo de dark mode con las siguientes clases:

| Elemento | Light Mode | Dark Mode |
|----------|------------|-----------|
| Fondo input | `bg-white` | `dark:bg-gray-900` |
| Texto input | `text-gray-900` | `dark:text-gray-300` |
| Borde input | `outline-gray-300` | `dark:outline-gray-700` |
| Placeholder | `placeholder:text-gray-400` | `dark:placeholder:text-gray-500` |
| Foco input | `focus:outline-indigo-600` | `dark:focus:outline-indigo-500` |
| Texto label | `text-gray-700` | `dark:text-gray-400` |
| Texto error | `text-rose-500` | `dark:text-rose-400` |
| Borde error | `outline-rose-300` | `dark:outline-rose-700` |
| Foco error | `focus:outline-rose-600` | `dark:focus:outline-rose-500` |
| Botón toggle password | `text-neutral-500` | `dark:text-neutral-400` |
| Hover toggle | `hover:text-indigo-600` | `dark:hover:text-indigo-400` |

---

## Estructura del componente

```blade
@props([
    'disabled' => false,
    'label' => 'null',
])
@php
    $isPassword = $attributes->get('type') === 'password';
    $class = $errors->has($attributes->get('name'))
        ? 'block w-full rounded-lg bg-white dark:bg-gray-900 px-2.5 py-2 text-sm text-rose-500 dark:text-rose-400 ...'
        : 'block w-full rounded-lg bg-white dark:bg-gray-900 px-2.5 py-2 text-sm text-gray-900 dark:text-gray-300 ...';
@endphp
<div @if ($isPassword) x-data="{ show: false }" @endif class="mb-4">
    @if ($label !== 'null')
        <label for="{{ $attributes->get('id') }}"
            class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-400">{{ $label }}</label>
    @endif
    <div class="{{ $isPassword ? 'relative' : '' }}">
        <input @disabled($disabled) @if ($isPassword) :type="show ? 'text' : 'password'" @endif
            name="{{ $attributes->get('name') }}" id="{{ $attributes->get('id') }}"
            {{ $attributes->merge(['class' => $class]) }}>
        @if ($isPassword)
            <!-- Botón toggle de visibilidad -->
        @endif
    </div>
</div>
@error($attributes->get('name'))
    <div class="text-rose-500 text-xs mt-1">
        {{ $message }}
    </div>
@enderror
```

---

## Notas importantes

1. **El campo `name` es requerido** para que el componente pueda mostrar errores de validación automáticamente.

2. **El campo `label` tiene un default de `'null'`** (string), no `null` (nulo). Si no se pasa el label, no se renderiza el elemento `<label>`.

3. **Para campos de contraseña**, el componente usa Alpine.js para el toggle de visibilidad. Asegúrate de que Alpine.js esté cargado en tu proyecto.

4. **Los atributos se fusionan** con `$attributes->merge()`, lo que permite sobreescribir clases CSS si es necesario:

```blade
<x-input name="email" type="email" class="max-w-md" />
```

---

# Componente `<x-container>`

Componente Blade para envolver contenido con estilos de card o contenedor transparente. Soporta modo oscuro.

## Características

- ✅ Soporte completo de modo oscuro (dark mode)
- ✅ Dos modos: card (blanca) o transparente
- ✅ Padding opcional
- ✅ Bordes redondeados y sombras adaptables

## Props

| Prop          | Tipo     | Default | Descripción                                    |
| ------------- | -------- | ------- | ---------------------------------------------- |
| `noPadding`   | `bool`   | `false` | Elimina el padding interno del contenedor       |
| `transparent` | `bool`   | `false` | Usa fondo transparente en vez de card blanca    |

---

## Modos de uso

### 1. Card blanca (por defecto)

```blade
<x-container>
    <p>Contenido con fondo blanco y padding.</p>
</x-container>
```

**Resultado:**
- Fondo blanco (`bg-white`)
- Padding `p-6`
- Sombra pequeña (`shadow-sm`)
- Bordes redondeados (`sm:rounded-lg`)

---

### 2. Contenedor transparente (sin fondo)

```blade
<x-container transparent>
    <p>Contenido sin fondo propio, hereda del padre.</p>
</x-container>
```

**Resultado:**
- Sin fondo (transparente)
- Padding `p-6`
- Sombra grande (`shadow-2xl shadow-indigo-900/10`)
- Bordes redondeados grandes (`rounded-2xl`)

---

### 3. Card blanca sin padding

```blade
<x-container noPadding>
    <p>Contenido con fondo blanco pero sin padding.</p>
</x-container>
```

**Resultado:**
- Fondo blanco (`bg-white`)
- Sin padding
- Sombra pequeña (`shadow-sm`)

---

### 4. Contenedor transparente sin padding

```blade
<x-container transparent noPadding>
    <p>Solo wrapper con bordes redondeados.</p>
</x-container>
```

**Resultado:**
- Sin fondo
- Sin padding
- Bordes redondeados grandes (`rounded-2xl`)
- Sombra grande

**Uso:** En el layout `app.blade.php` para envolver el contenido de la página.

---

## Resumen de estilos

| Props | Fondo | Padding | Sombra | Bordes |
|-------|-------|---------|--------|--------|
| `<x-container>` | `bg-white dark:bg-gray-800` | `p-6` | `shadow-sm` | `sm:rounded-lg` |
| `<x-container transparent>` | Transparente | `p-6` | `shadow-2xl` | `rounded-2xl` |
| `<x-container noPadding>` | `bg-white dark:bg-gray-800` | Ninguno | `shadow-sm` | `sm:rounded-lg` |
| `<x-container transparent noPadding>` | Transparente | Ninguno | `shadow-2xl` | `rounded-2xl` |

---

## Ejemplo real: Dashboard

```blade
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Card blanca con padding (modo por defecto) --}}
    <x-container>
        <x-card-container>
            <x-card>
                <x-slot name='icon'>
                    <x-heroicon-o-chat-bubble-left-ellipsis />
                </x-slot>
                <h2 class="font-semibold">574 Messages</h2>
                <p class="mt-2 text-sm text-gray-500">Last opened 4 days ago</p>
            </x-card>
            <x-card color='orange' border='orange'>
                <x-slot name='icon'>
                    <x-heroicon-o-user />
                </x-slot>
                <h2 class="font-semibold">1823 Users</h2>
                <p class="mt-2 text-sm text-gray-500">Last checked 3 days ago</p>
            </x-card>
        </x-card-container>

        <x-input label="email" type="email" />
        <x-input label="password" type="password" />
    </x-container>
</x-app-layout>
```

---

## Ejemplo real: Layout principal (`app.blade.php`)

```blade
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        {{-- Navbar --}}
        <div class="bg-indigo-700 dark:bg-indigo-800 shadow pb-52 text-white">
            <x-navbar.navigation>
                <x-navbar.nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <x-heroicon-o-home />
                    {{ __('Dashboard') }}
                </x-navbar.nav-link>
            </x-navbar.navigation>
        </div>

        {{-- Contenido de la página --}}
        <main class="mx-auto -mt-48 max-w-7xl px-6 pb-24">
            @isset($header)
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-5">
                    <header class="text-white">
                        <div class="max-w-7xl mx-auto py-3 sm:px-4 lg:px-2">
                            {{ $header }}
                        </div>
                    </header>
                </div>
            @endisset

            {{-- Contenedor transparente sin padding (envuelve todo el contenido) --}}
            <x-container transparent noPadding>
                {{ $slot }}
            </x-container>
        </main>
    </div>
</body>
```

## License

MIT
