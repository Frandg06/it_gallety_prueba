<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Prueba tecnica</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <x-navbar/>
        <main>
            <header class="header__app">
                <x-error/>
                <x-success/>
                <h1>Gallery Name</h1>
                <h3>Artwork detail</h3>
                <h6>ARTWORKS / ARTWORKS LIST / ARTWORK DETAIL</h6>
            </header>
            <section class="section__app">
                @yield('content')
            </section>
        </main>
    </body>
</html>
