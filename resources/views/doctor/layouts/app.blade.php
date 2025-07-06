<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Admin | Dashboard')</title>
        <link rel="stylesheet" href="{{ asset('assets/assets_admin/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/assets_admin/vendor/fontawesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/assets_admin/vendor/themify-icons/themify-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/assets_admin/css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/assets_admin/css/themes/theme-1.css') }}" id="skin_color" />

        <link
            href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
            rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="{{ asset('assets/assets_admin/vendor/animate.css/animate.min.css') }}"
            media="screen">
        <link rel="stylesheet"
            href="{{ asset('assets/assets_admin/vendor/perfect-scrollbar/perfect-scrollbar.min.css') }}" media="screen">
        <link rel="stylesheet" href="{{ asset('assets/assets_admin/vendor/switchery/switchery.min.css') }}"
            media="screen">
        <link rel="stylesheet"
            href="{{ asset('assets/assets_admin/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}"
            media="screen">
        <link rel="stylesheet" href="{{ asset('assets/assets_admin/vendor/select2/select2.min.css') }}" media="screen">
        <link rel="stylesheet"
            href="{{ asset('assets/assets_admin/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css') }}"
            media="screen">
        <link rel="stylesheet"
            href="{{ asset('assets/assets_admin/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css') }}"
            media="screen">

        <style>
            header {
                position: fixed !important;
                top: 0;
                left: 0;
                right: 0;
                z-index: 1030;
                width: 100%;
            }


            .sidebar {
                position: fixed;
                top: 65px;
                left: 0;
                bottom: 0;
                z-index: 1020;
                overflow-y: auto;
                margin-top: 0!important;
            }
            .item-content{
                padding:17px!important;
            }
        </style>


    </head>

    <body>
        {{-- Header --}}
        @include('doctor.doctor.include.header')

        {{-- Sidebar --}}
        @include('doctor.doctor.include.sidebar')

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>

        {{-- Footer --}}
        @include('doctor.doctor.include.footer')

        {{-- JS scripts --}}

        <!-- start: MAIN JAVASCRIPTS -->
        <script src="{{ asset('assets/assets_admin/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/assets_admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/assets_admin/vendor/modernizr/modernizr.js') }}"></script>
        <script src="{{ asset('assets/assets_admin/vendor/jquery-cookie/jquery.cookie.js') }}"></script>
        <script src="{{ asset('assets/assets_admin/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/assets_admin/vendor/switchery/switchery.min.js') }}"></script>
        <!-- end: MAIN JAVASCRIPTS -->

        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="{{ asset('assets/assets_admin/vendor/maskedinput/jquery.maskedinput.min.js') }}"></script>
        <script src="{{ asset('assets/assets_admin/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
        <script src="{{ asset('assets/assets_admin/vendor/autosize/autosize.min.js') }}"></script>
        <script src="{{ asset('assets/assets_admin/vendor/selectFx/classie.js') }}"></script>
        <script src="{{ asset('assets/assets_admin/vendor/selectFx/selectFx.js') }}"></script>
        <script src="{{ asset('assets/assets_admin/vendor/select2/select2.min.js') }}"></script>
        <script src="{{ asset('assets/assets_admin/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('assets/assets_admin/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

        <!-- start: CLIP-TWO JAVASCRIPTS -->
        <script src="{{ asset('assets/assets_admin/js/main.js') }}"></script>
        <!-- start: JavaScript Event Handlers for this page -->
        <script src="{{ asset('assets/assets_admin/js/form-elements.js') }}"></script>
        <script>
            jQuery(document).ready(function() {
                Main.init();
                FormElements.init();
            });
        </script>
    </body>

</html>
