<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registration</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    </head>

    <body>
        <form class="registration-form" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="background-rectangle">
                <header class="header-section">
                    <h1 class="welcome-title">
                        <span class="welcome-text">
                            {{ __('Welcome to') }}


                        </span>
                        <span class="clinic-register-text">{{ __('CLINIC REGISTER') }}</span>
                    </h1>
                    <img class="logo-image" src="{{ asset('assets/img/connect-img.png') }}" />
                </header>

                {{-- errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger" style="margin-top: 20px;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <section class="form-fields">
                    <div class="name-field">
                        <label class="name-label">
                            <span class="label-text">{{ __('Nom') }}</span>
                            <span class="required-asterisk">*</span>
                        </label>
                        <input class="input-field" type="text" name="name" required autofocus />
                    </div>
                    <div class="name-field">
                        <label class="email-label">
                            <span class="label-text">{{ __('Email') }}</span>
                            <span class="required-asterisk">*</span>
                        </label>
                        <input class="input-field" type="email" name="email" required />
                    </div>
                    <div class="name-field">
                        <label class="dob-label">
                            <span class="label-text">{{ __('Date de naissance') }}</span>
                            <span class="required-asterisk">*</span>
                        </label>
                        <input class="input-field" type="date" name="dob" required />
                    </div>
                    <div class="name-field">
                        <label class="gender-label">
                            <span class="label-text">{{ __('Sexe') }}</span>
                            <span class="required-asterisk">*</span>
                        </label>
                        <select class="input-field" name="sexe" required>
                            <option value="">{{ __('Sélectionner') }}</option>
                            <option value="homme">{{ __('Homme') }}</option>
                            <option value="femme">{{ __('Femme') }}</option>
                        </select>
                    </div>
                    <div class="name-field">
                        <label class="password-label">
                            <span class="label-text">{{ __('Mot de passe') }}</span>
                            <span class="required-asterisk">*</span>
                        </label>
                        <input class="input-field" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>

                    <div class="name-field">
                        <label class="password-label">
                            <span class="label-text">{{ __('Confirmez votre mot de passe') }}</span>
                            <span class="required-asterisk">*</span>
                        </label>
                        <input class="input-field" type="password" name="password_confirmation" required />
                    </div>

                    <div class="questions">
                        <div class="remember-section">
                            <input class="remember-checkbox" type="checkbox" name="remember" />
                            <label class="remember-label">{{ __('Se souvenir de moi') }}</label>

                        </div>
                        <p class="login-link"><a href="{{ route('login') }}" style="color: blue;font-size:14px;">{{ __('Avez vous deja un compte?') }}</a> </p>

                    </div>
                </section>

                {{-- id="success_register" --}}
                <button style="cursor: pointer" class="submit-button" type="submit">
                    <div class="button-background"></div>
                    <span class="button-text">{{ __('Enregistrer') }}</span>
                </button>
                <div class="divider-section">
                    <hr class="divider-line-left" />
                    <span class="divider-text">{{ __('Ou') }}</span>
                    <hr class="divider-line-right" />

                </div>
                <div class="btn-connect-social">
                    <a href="{{ route('google.login') }}" class="google-button">
                        <div class="google-button-background"></div>
                        <img class="google-icon" src="{{ asset('assets/img/google.png') }}" />
                        <span class="google-button-text">{{ __('Inscrivez vous avec google') }}</span>
                    </a>
                    <a href="{{route('facebook.login')}}" class="google-button" type="button">
                        <div class="google-button-background"></div>
                        <img class="google-icon" src="{{ asset('assets/img/facebook.png') }}" />
                        <span class="google-button-text">{{ __('Inscrivez vous avec facebook') }}</span>

                    </a>
                </div>

            </div>

        </form>



        <x-popup id="successModal" title="Succès " icon="assets/img/check-circle.png" buttonText="Okay">
            <p>
            <h2>{{ __('Félicitations !') }}</h2>
            <br />
            {{ __('Vous avez bien été enregistré') }}<br />
            </p>
        </x-popup>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const success_register = document.getElementById('success_register');
                const successModal = document.getElementById('successModal');

                if (success_register && successModal) {
                    success_register.addEventListener('click', function(e) {
                        e.preventDefault();
                        console.log('Enregistrement réussi');
                        successModal.style.display = 'flex';
                    });
                } else {
                    console.log('Bouton ou modal non trouvés');
                }


                // Fermer les modales avec les boutons "Fermer" ou la croix
                const closeButtons = document.querySelectorAll('.close-button');
                closeButtons.forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        const modalId = btn.dataset.close;
                        const modalToClose = document.getElementById(modalId);
                        if (modalToClose) {
                            modalToClose.style.display = 'none'; // Ferme la modale
                        }
                    });
                });
            });
        </script>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


    </body>

</html>
