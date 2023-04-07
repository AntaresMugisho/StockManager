<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') . " | Dashboard" }}</title>

        <link rel="stylesheet" href="/css/app.css">
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body>
        <div>
            <header class="banner">
                <h1 class="brand"><span>AR</span> <span>Stock</span></h1>
                <div class="">
                    <input type="search" name="search" id="search" placeholder="Chercher dans AR Stock">
                </div>
            </header>

            <aside>
             @include("dashboard.layout.navigation")   
            </aside>


            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
