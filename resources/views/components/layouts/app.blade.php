<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-nav sticky class="lg:hidden">
        <x-slot:brand>
            <p class="font-bold text-white">
                AtlasAnaltyica
            </p>
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden me-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-nav>

    {{-- MAIN --}}
    <x-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

            {{-- BRAND --}}
            <x-app-brand class="p-5 pt-3" />
            {{-- MENU --}}
            <x-menu activate-by-route active-bg-color="bg-blue-700/70 text-white">

                {{-- User --}}
                <x-menu-separator />

                <x-list-item :item="auth()->user()" value="username" sub-value="email" no-separator no-hover
                    class="-mx-2 !-my-2 rounded">
                    <x-slot:avatar>
                        @if (auth()->user()->avatar)
                        <x-button class=" btn-circle">
                            <img class="w-8 h-8 rounded-full" src="{{ asset('storage/'. auth()->user()->avatar) }}"
                                alt="avatar">
                        </x-button>
                        @else
                        <x-button icon="o-user" class="btn-circle btn-outline btn-sm" />
                        @endif
                    </x-slot:avatar>
                    <x-slot:actions>
                        <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff"
                            link="{{ route('logout') }}" />
                    </x-slot:actions>
                </x-list-item>

                <x-menu-separator />

                <x-menu-item title="Dashboard" icon="o-squares-2x2" link="/dashboard" />
                <x-menu-item title="Book" icon="o-book-open" link="/admin/books" />
                <x-menu-item title="Category" icon="o-tag" link="/admin/categories" />
                <x-menu-item title="User" icon="o-user" link="/admin/users" />
                <x-menu-item title="Review" icon="o-pencil" link="/admin/reviews" />
                <x-menu-item title="Theme" icon="o-swatch" @click="$dispatch('mary-toggle-theme')" />
                <x-menu-item title="Home Page" icon="o-home" link="/" />
                <x-theme-toggle class="hidden" />
            </x-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>

    {{-- TOAST area --}}
    <x-toast />
</body>

</html>
