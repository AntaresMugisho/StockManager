<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') . " | Dashboard" }}</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body>
        <div>
            <header class="app-banner">
                <h1 class="brand"><i class="humburger bi bi-list"></i>&nbsp;&nbsp;<span>AR</span><span>Stock</span></h1>
                <div class="icons-container">
                    <div class="searchbar">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="search" name="search" id="searchbar" placeholder="Chercher dans AR Stock">
                        <i class="arrow-icon fa-solid fa-arrow-right"></i>
                    </div>
                    <div class="cart-icon">
                        <i class="fa-solid fa-cart-arrow-down"></i>
                        <span class="counter">{{ Cart::content()->count() }}</span>
                    </div>
                </div>
            </header>

            <aside>
             @include("dashboard.layout.navigation")   
            </aside>

            <main>
                {{-- <div class="modal">
                    {{ $modal }}
                </div> --}}

                {{ $slot }}
            </main>
        </div>
        @livewireScripts
    </body>
</html>
