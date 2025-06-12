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
                        <span class="clinic-register-text">CLINIC REGISTER</span>
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
                        <label class="email-label">
                            <span class="label-text">Email</span>
                            <span class="required-asterisk">*</span>
                        </label>
                        <input class="input-field" type="email" />
                    </div>
                    <div class="name-field">
                        <label class="dob-label">
                            <span class="label-text">Date de naissance</span>
                            <span class="required-asterisk">*</span>
                        </label>
                        <input class="input-field" type="date" />
                    </div>
                    <div class="name-field">
                        <label class="gender-label">
                            <span class="label-text">Sexe</span>
                            <span class="required-asterisk">*</span>
                        </label>
                        <select class="input-field">
                            <option value="">Sélectionner</option>
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                        </select>
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
                        <p class="login-link"><a href="{{ route('show.login') }}"
                                style="color: blue;font-size:14px;">Avez vous deja un compte?</a> </p>

                    </div>
                </section>

                <button style="cursor: pointer" id="success_register" class="submit-button" type="submit">
                    <div class="button-background"></div>
                    <span class="button-text">Enregistrer</span>
                </button>
                <div class="divider-section">
                    <hr class="divider-line-left" />
                    <span class="divider-text">Ou</span>
                    <hr class="divider-line-right" />

                </div>
                <div class="btn-connect-social">
                    <a href="#" class="google-button">
                        <div class="google-button-background"></div>
                        <img class="google-icon" src="{{ asset('assets/img/google.png') }}" />
                        <span class="google-button-text">Inscrivez vous avec google</span>
                    </a>
                    <a href="#" class="google-button" type="button">
                        <div class="google-button-background"></div>
                        <img class="google-icon" src="{{ asset('assets/img/facebook.png') }}" />
                        <span class="google-button-text">Inscrivez vous avec facebook</span>

                    </a>
                </div>

            </div>

        </form>



        <x-popup id="successModal" title="Succès " icon="assets/img/check-circle.png" buttonText="Okay"
            >
            <p>
            <h2>Félicitations !</h2>
            <br />
            Vous avez bien été enregistré<br />
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


    </body>

</html>
