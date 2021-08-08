<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        
        <title>@yield('title', config('app.name', 'Laravel'))</title>
        <meta property="og:title" content="@yield('title', config('app.name', 'Laravel'))">
        <meta property="og:description" content="@yield('description', 'Welcome To ' . config('app.name', 'Laravel'))">
        <meta property="og:image" content="@yield('image', asset('img/header.svg'))">
        <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/dda3bee8fa.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            <header>
                <x-navbar />
            </header>
            
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <footer>
                <x-footer />
            </footer>
        </div>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
        @stack('custom-script')
    </body>
</html>
