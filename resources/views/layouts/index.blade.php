<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html {
            font-family: 'Inconsolata', monospace;
        }
    </style>
</head>

<body class="antialiased bg-[#212529] text-white p-6 flex flex-col items-center">
    <main class="md:max-w-3xl">
        <nav>
            <a href="/posts" class="text-[18px]">Home</a>
        </nav>
        @yield('main')
    </main>
</body>

</html>
