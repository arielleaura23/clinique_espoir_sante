<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <title>login admin</title>
    </head>

    <body>
            <div class="row">
        <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="logo margin-top-30">
                <img src="{{ asset('assets/img/logo cercle bleu.png') }}" alt="Logo" />
            </div>
            <div class="box-login">
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    <fieldset>
                        <legend>Admin Login</legend>
                        <p>Please enter your email and password:</p>

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="form-group">
                            <span class="input-icon">
                                <input type="email" class="form-control" name="email" placeholder="Email" required
                                    value="{{ old('email') }}">
                                <i class="fa fa-user"></i>
                            </span>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <span class="input-icon">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                <i class="fa fa-lock"></i>
                            </span>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary pull-right">
                                Login <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>

                    </fieldset>
                </form>
                <div class="copyright">
                    &copy; <span class="current-year"></span> <span class="text-bold text-uppercase">Clinique Espoir</span>.
                    All rights reserved.
                </div>
            </div>
        </div>
    </div>
    </body>

</html>


