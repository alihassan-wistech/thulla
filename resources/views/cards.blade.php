<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>

        <div class="container mx-auto">
            <div class="grid grid-cols-8">
                @foreach ($cards as $card)
                    <div>
                        <img class="w-full" src="{{ asset($card['image']) }}" alt="{{ $card['name'] }}">
                        <p>{{ $card["name"] }}</p>
                        <p>{{ $card["suit"] }}</p>
                        <p>{{ $card["color"] }}</p>
                        <p>{{ $card["rank"] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
