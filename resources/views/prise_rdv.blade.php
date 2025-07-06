<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prise de rendez-vous</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </head>

    <body>
        <div class="appointment-form-container">
            <div class="appointment-form-header">
                <img class="appointment-form-close" src="{{ asset('assets/img/croix.png') }}" alt="Fermer" />
                <div class="header-content">
                    <img class="appointment-form-image" src="{{ asset('assets/img/stetoscope.png') }}" alt="Clinique" />
                    <div class="appointment-form-clinic">CLINIQUE ESPOIR<br>SANTE</div>
                </div>
            </div>
            <form class="appointment-form-fields" method="POST" action="{{ route('appointment.store') }}">
                @csrf
                <div class="appointment-form-title">Formulaire de prise de rendez-vous</div>
                <hr class="before-consultation-item-divider-rdv">
                <div class="blocks_rdv">
                    <div class="block1">
                        <div class="form-group">
                            <label class="form-label" for="date">Date du rdv <span class="required">*</span></label>
                            <div class="form-input-icon">
                                <input type="date" id="date" name="date" class="form-input" required>
                                {{-- <img class="input-icon" src="uiw-date0.svg" alt="Date"> --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="heure">Heure du rdv <span
                                    class="required">*</span></label>
                            <div class="form-input-icon">
                                <input type="time" id="heure" name="heure" class="form-input" required>
                                {{-- <img class="input-icon" src="group0.svg" alt="Heure"> --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="nom">Nom <span class="required">*</span></label>
                            <input type="text" id="nom" name="nom" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="prenom">Prénom <span class="required">*</span></label>
                            <input type="text" id="prenom" name="prenom" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="sexe">Sexe <span class="required">*</span></label>
                            <select id="sexe" name="sexe" class="form-input" required>
                                <option value="">Sélectionner</option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                            </select>
                        </div>
                    </div>

                    <div class="block2">
                        <div class="form-group">
                            <label class="form-label" for="telephone">Téléphone <span class="required">*</span></label>
                            <input type="tel" id="telephone" name="telephone" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email <span class="required">*</span></label>
                            <input type="email" id="email" name="email" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="specialite">Spécialité médicale <span
                                    class="required">*</span></label>
                            <select id="specialite" name="specialite" class="form-input" required>
                                <option value="">Sélectionner</option>
                                @foreach ($specialites as $spec)
                                    <option value="{{ $spec->specilization }}">{{ $spec->specilization }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="medecin">Médecin souhaité <span
                                    class="required">*</span></label>
                            <select id="medecin" name="medecin" class="form-input" required>
                                <option value="">Sélectionner</option>
                                @foreach ($medecins as $medecin)
                                    <option value="{{ $medecin->FullName }}">{{ $medecin->FullName }}
                                        ({{ $medecin->Specialization }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="motif">Motif du rdv <span
                                    class="required">*</span></label>
                            <textarea id="motif" name="motif" class="form-input" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="form-submit-btn">Envoyer</button>
            </form>
            <img class="appointment-form-bg" src="unsplash-t-nj-uk-pnl-00-removebg-preview0.png" alt="Décor" />
        </div>

        <div class="modal-overlay" id="successModal" style="display: none;">
            <div class="modal-success">
                <div class="modal-header">
                    <div class="success-title">
                        <img class="icon-check" src="{{ asset('assets/img/check-circle.png') }}" alt="Succès" />
                        <h2 class="modal-title">Succès</h2>
                    </div>
                    <img class="icon-close" src="{{ asset('assets/img/fermer.png') }}" alt="Fermer"
                        id="closeModal" />
                </div>

                <hr style="margin: 10px 0; border: none; border-top: 1px solid #ccc;" />

                <div class="modal-body">
                    <p>
                        Votre rendez-vous a été enregistré avec succès.
                        <br />
                        Nous analysons votre demande et vous contacterons bientôt pour confirmer votre rendez-vous.
                    </p>
                </div>
                <br />
                </p>

                <div class="modal-footer">
                    <button class="btn-primary" id="okButton">Okay</button>
                </div>
            </div>


        </div>
        </div>


        {{-- modale error --}}
        <div class="modal-overlay" id="errorModal" style="display: none">
            <div class="modal-success">
                <div class="modal-header">
                    <div class="success-title">
                        <img class="icon-check" src="{{ asset('assets/img/error.png') }}" alt="Succès" />
                        <h2 class="modal-title" style="color: red;">Erreur d’enregistrement</h2>
                    </div>
                    <img class="icon-close" src="{{ asset('assets/img/croix_rouge.png') }}" alt="Fermer"
                        id="closeModal" />
                </div>

                <hr style="margin: 10px 0; border: none; border-top: 1px solid #ccc;" />

                <div class="modal-body">
                    <p>
                        Votre rendez-vous n’a pas pu être enregistré.
                        <br />
                        Veuillez vérifier les informations saisies.
                        <br />
                    </p>
                </div>

                <div class="modal-footer">
                    <button class="btn-danger" id="okButton">Okay</button>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        {{-- ouvrir la modale en fonction du résultat de la requête --}}
        <script>
            $(document).ready(function() {
                @if (session('success'))
                    $('#successModal').show();
                @endif

                @if (session('error'))
                    $('#errorModal').show();
                @endif

                // Fermer la modale au clic sur le bouton ou la croix
                $('#successModal #okButton, #successModal #closeModal').on('click', function() {
                    $('#successModal').hide();
                });
                $('#errorModal #okButton, #errorModal #closeModal').on('click', function() {
                    $('#errorModal').hide();
                });
            });
        </script>



        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const closeBtn = document.querySelector('.appointment-form-close');
                if (closeBtn) {
                    closeBtn.addEventListener('click', function() {
                        window.history.back();
                    });
                }
            });
        </script>


        <script src="{{ asset('assets/js/script.js') }}"></script>
    </body>

</html>
