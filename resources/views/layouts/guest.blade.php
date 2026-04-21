<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-900 to-blue-700">
        <div class="w-full max-w-md mx-4">
            <div class="mb-6 text-center text-white">
                <p class="text-xs uppercase tracking-[0.18em] text-blue-100">St. George's College Aruvithura</p>
                <h1 class="mt-2 text-2xl font-semibold">College Portal Login</h1>
            </div>
            <div class="w-full rounded-2xl bg-white p-8 shadow-2xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
