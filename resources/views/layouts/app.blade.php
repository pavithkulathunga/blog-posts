<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white shadow dark:bg-gray-800">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $header }}
            </div>


        </header>
        @endisset

        <!-- Page Content -->
        <main class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-100 rounded shadow">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="p-4 mb-4 text-red-800 bg-red-100 rounded shadow">
                {{ session('error') }}
            </div>
            @endif

            {{ $slot }}
        </main>
    </div>

    <script>
    const toggleBtn = document.getElementById('dark-mode-toggle');
    const html = document.documentElement;

    // Load saved theme on page load
    if (localStorage.getItem('theme') === 'dark' || 
        (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        html.classList.add('dark');
    } else {
        html.classList.remove('dark');
    }

    toggleBtn.addEventListener('click', () => {
        html.classList.toggle('dark');
        if (html.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    });
</script>

</body>

</html>