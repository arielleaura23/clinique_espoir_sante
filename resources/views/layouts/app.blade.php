<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Clinique Espoir Santé')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    @include('components.header')
    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')
</body>
</html>
