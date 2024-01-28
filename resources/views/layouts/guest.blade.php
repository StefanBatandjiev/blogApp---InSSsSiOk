<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="min-vh-100 d-flex flex-column justify-content-center align-items-center pt-6 pt-sm-0 bg-gray-100">
    <div>
        <a href="/">
            <h1 class="bg-primary">BlogApp</h1>
        </a>
    </div>

    <div class="w-100 max-w-md mt-6 px-4 py-4 bg-white shadow-sm overflow-hidden rounded-lg">
        @yield('content')
    </div>
</div>
</body>
</html>
