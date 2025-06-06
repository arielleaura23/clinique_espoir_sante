<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registration</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </head>

    <body>
        <form class="registration-form">
            <div class="background-rectangle">
                <header class="header-section">
                    <h1 class="welcome-title">
                        <span class="welcome-text">
                            Welcome to


                        </span>
                        <span class="clinic-register-text">CLINIC CONNECTION</span>
                    </h1>
                    <img class="logo-image" src="{{ asset('assets/img/connect-img.png') }}" />
                </header>
                <section class="form-fields">
                    <div class="name-field">
                        <label class="name-label">
                            <span class="label-text">Nom</span>
                            <span class="required-asterisk">*</span>
                        </label>
                        <input class="input-field" type="text" />
                    </div>
                    <div class="name-field">
                        <label class="password-label">
                            <span class="label-text">Mot de passe</span>
                            <span class="required-asterisk">*</span>
                        </label>
                        <input class="input-field" type="password" />
                    </div>

                    <div class="questions">
                        <div class="remember-section">
                            <input class="remember-checkbox" type="checkbox" />
                            <label class="remember-label">remenber me</label>

                        </div>
                        <p class="login-link">Mot de passe oublié?</p>

                    </div>
                </section>

                <button class="submit-button" type="submit">
                    <div class="button-background"></div>
                    <span class="button-text">Connecter</span>
                </button>
                <div class="divider-section">
                    <hr class="divider-line-left" />
                    <span class="divider-text">Ou</span>
                    <hr class="divider-line-right" />

                </div>
                <div class="btn-connect-social">
                    <button class="google-button" type="button">
                        <div class="google-button-background"></div>
                        <img class="google-icon" src="{{ asset('assets/img/google.png') }}" />
                        <span class="google-button-text">Connectez vous avec google</span>
                    </button>
                    <button class="google-button" type="button">
                        <div class="google-button-background"></div>
                        <img class="google-icon" src="{{ asset('assets/img/facebook.png') }}" />
                        <span class="google-button-text">Connectez vous avec facebook</span>

                    </button>
                </div>

                <div class="questions" style="    justify-content: center;
    margin-top: 20px;">
                    <p style="color: #757575;font-size:14px;" class="login-link">Vous n'avez pas de compte ? <a style="color: blue" href="{{ route('show.register') }}">Inscrivez vous</a>
                        </p>
                </div>

            </div>

        </form>



    </body>

</html>
