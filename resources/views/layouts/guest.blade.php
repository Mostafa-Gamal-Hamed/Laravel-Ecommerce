<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Registrtion</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="{{asset("vendor")}}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset("assets")}}/css/animate.css">

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <link rel="stylesheet" href="{{asset('build')}}/assets/app-6f0186ea.css">
        <script src="{{asset('build')}}/assets/app-b1941ff8.js"></script>

    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="text-center animate__animated animate__fadeInRight animate__slow " style="background-color:#f3f4f6;">
                <a href="/" class="nav-link" style="color:red;font-size:xxx-large;font-weight: bold;"><span style="color:black;">RESTING</span> CLOTHES</a>
            </div>
            {{-- <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div> --}}

            <div class="animate__animated animate__fadeInLeft animate__slow w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        {{-- Bootstrap js --}}
        <script src="{{asset("assets")}}/js/bootstrap.js"></script>
    </body>
</html>
