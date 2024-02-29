<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('page-title') | Laravel Start 1</title>

        {{-- Stili nell'head --}}
        <link rel="stylesheet" href="css/style.css">

        {{-- <!-- Includiamo gli assets con la direttiva @vite --> --}}
        @vite('resources/js/app.js')

        @yield('head-imports')
    </head>
    <body class="bg-dark text-white">
        <header>
            <h1 class="text-center py-5">
                DC Comics
            </h1>
        </header>
        <main>
            <div class="container">

                @yield('main-content')

            </div>
        </main>

        @include('partials.footer')

        {{-- JS da importare nel body --}}
        @yield('body-imports')
    </body>
</html>
