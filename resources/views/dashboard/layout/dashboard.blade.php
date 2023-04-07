<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') . " | Dashboard" }}</title>

        <link rel="stylesheet" href="resources/css/app.css">
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body>
        <div>
            <aside>

            </aside>

            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
