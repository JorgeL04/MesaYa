<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- Flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite/dist/flowbite.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div id="app">
        <nav class="bg-white border-b border-gray-200 shadow">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center h-16">
                    <a href="{{ url('/') }}" class="text-xl font-semibold text-gray-800">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <div class="flex items-center">
                        @guest
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800 mr-4">Login</a>
                            <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-800">Register</a>
                        @else
                            <div class="relative">
                                <button class="text-gray-600 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-600" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }}
                                </button>
                                <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg py-1" id="user-menu">
                                    <a href="{{ route('logout') }}" 
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                                       class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
        <main class="py-6">
            @yield('content')
        </main>
    </div>

    <!-- Flowbite Script -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite/dist/flowbite.min.js"></script>
</body>
</html>
