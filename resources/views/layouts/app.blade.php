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
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen">
            
            {{-- 🌐 Navigasi --}}
            <nav class="bg-white border-b border-gray-200 shadow dark:bg-gray-800">
                <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
                    <div class="space-x-6">
                        <a href="{{ route('dashboard') }}" class="text-gray-800 dark:text-white hover:underline">Dashboard</a>
                        <a href="{{ route('karyawan.index') }}" class="text-gray-800 dark:text-white hover:underline">Karyawan</a>
                        <a href="{{ route('gaji.index') }}" class="text-gray-800 dark:text-white hover:underline">Gaji</a>
                    </div>
                    <div>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-red-600 hover:underline dark:text-red-400">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </nav>

            {{-- Optional: Header --}}
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            {{-- Main content slot --}}
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>