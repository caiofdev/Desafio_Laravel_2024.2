<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" type="imagex/png" href="{{asset('images/app-logo.ico')}}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-900">
            <div>
                <a class="flex justify-center">
                    <img src="{{asset('images/app-logo.png')}}" class="w-2/6 pb-5 fade-up"/>
                </a>
                <p class="text-white flex justify-center text-sm font-bold fade-up"> Welcome to the bank of the future, welcome to the Vertex Financial. </p>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-slate-600 shadow-md border-2 border-blue-900 overflow-hidden sm:rounded-lg fade-up">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
