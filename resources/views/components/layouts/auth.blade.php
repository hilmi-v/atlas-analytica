<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased bg-black">



    {{-- MAIN --}}
    <x-main full-width>
        {{-- The `$slot` goes here --}}
        <x-slot:content>
            <div class="grid grid-cols-1 md:grid-cols-2 h-dvh">
                <div class="items-center justify-center hidden bg-black md:flex ">
                    <h1 class="text-6xl italic font-bold text-white">
                        Atlas Analytica
                    </h1>
                </div>
                <div class="flex items-center justify-center w-full h-full">
                    {{ $slot }}
                </div>
            </div>
        </x-slot:content>
    </x-main>

    {{-- TOAST area --}}
    <x-toast />
</body>

</html>
