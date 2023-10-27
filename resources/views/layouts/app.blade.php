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

        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="/css/color.css">
        @if( isset($script) )
            {{ $script }}
        @endif
    </head>
    <body class="font-sans antialiased background-color">
        <div class="min-h-screen">
            <!-- ここに共通ヘッダーのコンポーネントを読み込む -->
            @include('layouts.announce-header')
            @include('layouts.global-header')
            @include('flash::message')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="container mx-auto py-8">
                {{ $slot }}
            </main>
        </div>
        @include('layouts.footer')
    </body>
</html>
