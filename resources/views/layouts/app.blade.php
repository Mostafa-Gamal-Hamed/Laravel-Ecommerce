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
        <!-- CSS -->
        <link href="{{asset("vendor")}}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset("assets")}}/css/owl.css">
        <link rel="stylesheet" href="{{asset("assets")}}/css/styl.css">
        <link rel="stylesheet" href="{{asset("assets")}}/css/animate.css">
        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <link rel="stylesheet" href="{{asset('build')}}/assets/app-6f0186ea.css">
        <script src="{{asset('build')}}/assets/app-b1941ff8.js"></script>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow  animate__animated animate__fadeInRight animate__slow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ Auth::user()->name }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{$slot}}
            </main>
        </div>
        {{-- Js --}}
        <script src="{{asset("vendor")}}/jquery/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel();
        });
        </script>
        <script src="{{asset("assets")}}/js/bootstrap.js"></script>
        <script src="{{asset("assets")}}/js/owl.js"></script>
    </body>
</html>
