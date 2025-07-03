<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Espoir sante admin')</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">


        <!-- Fonts et bibliothèques -->
        <link rel="stylesheet" href="{{ asset('assets/assets_medecin/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/assets_medecin/css/core.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/assets_medecin/css/app.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('assets/assets_medecin/css/app.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/assets_medecin/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/assets_medecin/css/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/assets_medecin/css/templatemo-medic-care.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/assets_medecin/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/assets_medecin/css/owl.theme.default.min.css') }}"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">



        <link rel="stylesheet"
            href="{{ asset('assets/assets_medecin/libs_medecin/bower/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet"
            href="{{ asset('assets/assets_medecin/libs_medecin/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css') }}">

        <link rel="stylesheet"
            href="{{ asset('assets/assets_medecin/libs_medecin/bower/animate.css/animate.min.css') }}">
        <link rel="stylesheet"
            href="{{ asset('assets/assets_medecin/libs_medecin/bower/fullcalendar/dist/fullcalendar.min.css') }}">
        <link rel="stylesheet"
            href="{{ asset('assets/assets_medecin/libs_medecin/bower/perfect-scrollbar/css/perfect-scrollbar.css') }}">


        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">

        @stack('styles')

        <script src="{{ asset('assets/assets_medecin/libs_medecin/bower/breakpoints.js/dist/breakpoints.min.js') }}"></script>
        <script>
            Breakpoints();
        </script>
    </head>

    <body class="menubar-left menubar-unfold menubar-light theme-primary">
        @include('medecin.dams.doctor.includes.header')
        @include('medecin.dams.doctor.includes.sidebar')

        <main id="app-main" class="app-main">
            @yield('content')
            @include('medecin.dams.doctor.includes.footer')
        </main>
        @include('medecin.dams.doctor.includes.customizer')







{{-- SCRIPTS JAVASCRIPT --}}


    <script src="{{ asset('assets/assets_medecin/libs_medecin/bower/jquery/dist/jquery.js') }}"></script>


    <script src="{{ asset('assets/assets_medecin/libs_medecin/bower/jQuery-Storage-API/jquery.storageapi.min.js') }}"></script>
    <script src="{{ asset('assets/assets_medecin/libs_medecin/bower/bootstrap-sass/assets/javascripts/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/assets_medecin/libs_medecin/bower/PACE/pace.min.js') }}"></script>


    <script src="{{ asset('assets/assets_medecin/libs_medecin/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}"></script>

    <script src="{{ asset('assets/assets_medecin/libs_medecin/bower/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <script src="{{ asset('assets/assets_medecin/libs_medecin/bower/breakpoints/dist/breakpoints.min.js') }}"></script>

    <script src="{{ asset('assets/assets_medecin/libs_medecin/bower/switchery/dist/switchery.min.js') }}"></script>

    <script src="{{ asset('assets/assets_medecin/libs_medecin/bower/waypoints/lib/jquery.waypoints.min.js') }}"></script> 
    <script src="{{ asset('assets/assets_medecin/libs_medecin/bower/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/assets_medecin/libs_medecin/bower/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>



    <script src="{{ asset('assets/assets_medecin/js/library.js') }}"></script>

    <script src="{{ asset('assets/assets_medecin/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/assets_medecin/js/app.js') }}"></script>

    @stack('scripts')




        @stack('scripts') {{-- Pour les JS spécifiques à une page --}}
    </body>

</html>
