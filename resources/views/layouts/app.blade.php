<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Clinique Espoir Santé')</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">


    </head>

    <body>
        @include('components.header')
        @include('components.navbar')

        <main>
            @yield('content')
        </main>

        @include('components.footer')

            <script src = "{{ asset('assets/js/script.js') }}" >
        <script src="https://code.jquery.com/jquery-3.7.1.min.js">

                <script src = "https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js" >
        <script>
            AOS.init();
        </script>

    </body>

</html>
