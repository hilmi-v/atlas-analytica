<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>
    {{-- Cropper.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200" x-data="{ open: false }">

    {{-- NAVBAR mobile only --}}
    <x-nav sticky class="">
        <x-slot:brand>
            <p class="font-bold text-blue-700">
                AtlasAnaltyica
            </p>
        </x-slot:brand>
        <x-slot:middle class="hidden md:flex">
            <x-menu activate-by-route class="!flex flex-row space-x-2" active-bg-color="bg-blue-700/70 text-white">
                <x-menu-item title="Home" link="/" />
                <x-menu-item title="Books" link="/books" />
                {{--
                <x-menu-item title="Category" link="/categories" /> --}}
            </x-menu>
        </x-slot:middle>
        <x-slot:actions>
            @auth
            <x-dropdown>
                <x-slot:trigger>
                    @if (auth()->user()->avatar)
                    <x-button class=" btn-circle">
                        <img class="w-8 h-8 rounded-full" src="{{ asset('storage/'. auth()->user()->avatar) }}"
                            alt="avatar">
                    </x-button>
                    @else
                    <x-button icon="o-user" class="btn-circle btn-outline btn-sm" />
                    @endif
                </x-slot:trigger>
                <x-menu-item title="profile" link="/profile" icon="o-user" />
                @if (Auth::user()->role == 'admin')
                <x-menu-item title="dashboard" icon="o-squares-2x2" link="/dashboard" />
                @endif
                <x-menu-item title="Theme" icon="o-swatch" @click="$dispatch('mary-toggle-theme')" />
                <x-theme-toggle class="hidden" />
            </x-dropdown>


            <x-button icon="o-bars-3" @click="open = !open" class="block btn-ghost md:hidden btn-sm" />
            @endauth
            @guest
            <x-theme-toggle />
            <x-button label="Login" class="btn-ghost" link="/login" />
            @endguest
        </x-slot:actions>
    </x-nav>
    <x-menu x-show="open" activate-by-route class="flex flex-col bg-base-100 md:hidden"
        active-bg-color="bg-blue-700/70 text-white">
        <x-menu-item title="Home" link="/" />
        <x-menu-item title="Books" link="/books" />
        {{--
        <x-menu-item title="Category" link="/categories" /> --}}
    </x-menu>

    {{-- MAIN --}}
    <x-main full-width>
        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
        <x-slot:footer>
            <x-footer />
        </x-slot:footer>
    </x-main>

    {{-- TOAST area --}}
    <x-toast />
</body>

</html>
