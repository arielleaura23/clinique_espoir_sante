<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>login</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </head>

    <body>
        <form method="POST" action="{{ route('password.email') }}"  class="registration-form" style="height: 100vh">
            @csrf
            <div class="background-rectangle">
                <header class="header-section">
                    <h1 class="welcome-title">
                        <span class="welcome-text">
                            Welcome to


                        </span>
                        <span class="clinic-register-text">FORGOT PASSWORD</span>
                    </h1>
                    <img class="logo-image" src="{{ asset('assets/img/connect-img.png') }}" />
                </header>

                {{-- errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger" style="color:red;">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <section class="form-fields">
                    <div class="name-field">
                        <label class="name-label">
                            <span class="label-text">Email</span>
                            <span class="required-asterisk">*</span>
                        </label>
                        <input class="input-field" type="email" name="email" required autofocus />
                    </div>

                </section>

                {{-- id="success_register" --}}
                <button class="submit-button" type="submit">
                    <div class="button-background"></div>
                    <span class="button-text">Reinitialiser mon mot de passe</span>
                </button>



            </div>

        </form>


        <x-popup id="successModal" title="Succès" icon="assets/img/check-circle.png" buttonText="Okay">
            <p>
            <h2>Félicitations !</h2>
            <br />
            Vous venez de vous connecter<br />
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
