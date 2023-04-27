<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css'])
    </head>
    <body class="antialiased">
        <div class="text-red-500 text-2xl font-bold w-full h-full">HELLO it's bwapp written on laravel</div>
        @vite(['resources/js/app.js'])
    </body>
</html>
