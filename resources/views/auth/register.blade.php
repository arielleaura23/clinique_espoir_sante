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
        <div class="registration-form-container">
            <div class="registration-form-background"></div>
            <div class="registration-form-header">
                <div class="welcome-message">
                    <span class="welcome-text">
                        Bienvenue
                        <br />
                        Welcome to
                        <br />
                    </span>
                    <span class="clinic-name">CLINIC REGISTER</span>
                </div>
                <img class="header-image" src="{{ asset('assets/img/connect-img.png') }}" alt="Clinic Image" />
            </div>
            <form class="registration-form" method="POST" action="">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">
                        Nom<span class="required-asterisk">*</span>
                    </label>
                    <input id="name" name="name" type="text" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">
                        Email<span class="required-asterisk">*</span>
                    </label>
                    <input id="email" name="email" type="email" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="dob" class="form-label">
                        Date de naissance<span class="required-asterisk">*</span>
                    </label>
                    <input id="dob" name="dob" type="date" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="gender" class="form-label">
                        Sexe<span class="required-asterisk">*</span>
                    </label>
                    <select id="gender" name="gender" class="form-input" required>
                        <option value="">Sélectionnez</option>
                        <option value="male">Homme</option>
                        <option value="female">Femme</option>
                        <option value="other">Autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">
                        Mot de passe<span class="required-asterisk">*</span>
                    </label>
                    <input id="password" name="password" type="password" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">
                        Confirmer le mot de passe<span class="required-asterisk">*</span>
                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-input"
                        required>
                </div>
                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember" class="checkbox-input">
                        <span class="checkbox-text">Se souvenir de moi</span>
                    </label>
                </div>
                <button type="submit" class="nav-login-btn">
                    <div class="login-bg"></div>
                    <div class="login-text">Enregistrer</div>
                </button>

            </form>
            <div class="alternative-login">
                <div class="divider">
                    <hr class="divider-line">
                    <span class="divider-text">Ou</span>
                    <hr class="divider-line">
                </div>
                <a href="" class="social-login-button google-button">
                    <img src="{{ asset('assets/img/google.png') }}" alt="Google" class="social-icon" />
                    <span>Inscrivez-vous avec Google</span>
                </a>
                <a href="" class="social-login-button facebook-button">
                    <img src="{{ asset('assets/img/facebook.png') }}" alt="Facebook" class="social-icon" />
                    <span>Inscrivez-vous avec Facebook</span>
                </a>
            </div>
            <div class="login-link">
                <a href="">Avez-vous déjà un compte?</a>
            </div>
        </div>
    </body>

</html>
