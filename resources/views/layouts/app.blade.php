<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Task 2') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
    @livewireStyles
</head>
<body class="bg-dark text-light">
    <div id="app" >
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm tabardi-app">
            <div class="container">
                <a class="navbar-brand" href="{{ route('homepage') }}">
                    <i class="fa-solid fa-house-chimney"></i>
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('homepage') }}">Homepage</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('documentation') ? 'active' : '' }}" href="{{ route('docs') }}">Documentation</a>
                        </li>



                    </ul>

                </div>
            </div>
        </nav>

        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
    @yield('js')
    @livewireScripts

</body>
</html>
