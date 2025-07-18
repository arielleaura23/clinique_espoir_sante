@extends('layouts.app')

@section('title', 'Profile')
<link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

@section('content')

    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">Paramètres du compte</h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">Général</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password"
                            id="password-tab">
                            Changer le mot de passe
                        </a>

                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Informations</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            {{-- Formulaire de mise à jour du profil --}}
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body media align-items-center">
                                    <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('assets/img/user.png') }}"
                                        alt="Avatar" style="width: 100px; height: 100px; object-fit: cover;"
                                        class="d-block  rounded-circle" id="avatar-preview">

                                    <div class="media-body ml-4">
                                        <label class="btn btn-outline-primary">
                                            Télécharger une nouvelle photo
                                            <input type="file" name="avatar" id="avatar-input"
                                                class="account-settings-fileinput" onchange="previewImage(event)">
                                        </label>


                                        {{-- Le bouton Réinitialiser est en dehors du formulaire principal --}}
                                        <button type="button"
                                            onclick="document.getElementById('reset-avatar-form').submit();"
                                            class="btn btn-default md-btn-flat">Réinitialiser</button>

                                        <div class="small mt-1">
                                            Formats autorisés : JPG, GIF ou PNG. Taille maximale de 800 Ko
                                        </div>
                                    </div>
                                </div>

                                <hr class="border-light m-0">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Nom d'utilisateur</label>
                                        <input type="text" class="form-control mb-1" name="name"
                                            value="{{ old('name', auth()->user()->name) }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Adresse e-mail</label>
                                        <input type="text" class="form-control mb-1" name="email"
                                            value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                                </div>

                                <div class="text-right px-4 pb-4">
                                    <button type="submit" class="btn btn-primary">Enregistrer les
                                        modifications</button>&nbsp;
                                    <button type="reset" class="btn btn-default">Annuler</button>
                                </div>
                            </form>

                            {{-- Formulaire séparé pour la réinitialisation de l’avatar --}}
                            <form action="{{ route('profile.avatar.reset') }}" method="POST" id="reset-avatar-form"
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>

                        </div>
                        <div class="tab-pane fade" id="account-change-password">

                            <div class="card-body pb-2">
                                <form method="POST"
                                    action="{{ route('profile.password.update') }}#account-change-password">

                                    @csrf
                                    @method('PUT')
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif



                                    <div class="form-group">
                                        <label class="form-label">Mot de passe actuel</label>
                                        <input type="password" class="form-control" name="current_password" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Nouveau mot de passe</label>
                                        <input type="password" class="form-control" name="new_password" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Répéter le nouveau mot de passe</label>
                                        <input type="password" class="form-control" name="new_password_confirmation"
                                            required>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Mettre à jour le mot de
                                            passe</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <form method="POST" action="{{ route('profile.update.info') }}#account-info">

                                    @csrf
                                    @if (auth()->user()->role === 'medecin')
                                        <div class="form-group">
                                            <label class="form-label">Biographie</label>
                                            <textarea class="form-control" name="bio" rows="5">{{ old('bio', auth()->user()->bio ?? '') }}</textarea>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label class="form-label">Date de naissance</label>
                                        <input type="date" name="dob" class="form-control"
                                            value="{{ old('dob', auth()->user()->dob ? \Carbon\Carbon::parse(auth()->user()->dob)->format('Y-m-d') : '') }}">

                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Sexe</label>
                                        <select class="custom-select" name="sexe">
                                            <option value="homme"
                                                {{ auth()->user()->sexe === 'homme' ? 'selected' : '' }}>Homme</option>
                                            <option value="femme"
                                                {{ auth()->user()->sexe === 'femme' ? 'selected' : '' }}>Femme</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Téléphone</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ old('phone', auth()->user()->phone) }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Adresse</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ old('address', auth()->user()->address) }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Ville</label>
                                        <input type="text" class="form-control" name="city"
                                            value="{{ old('city', auth()->user()->city) }}">
                                    </div>
                                    @if (auth()->user()->role === 'medecin' || auth()->user()->role === 'admin')
                                        <div class="form-group">
                                            <label class="form-label">Spécialisation</label>
                                            <input type="text" class="form-control" name="specialization"
                                                value="{{ old('specialization', auth()->user()->specialization) }}"
                                                {{ auth()->user()->role === 'admin' ? '' : 'readonly' }}>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Frais de consultation</label>
                                            <input type="number" class="form-control" name="consultancy_fees"
                                                step="0.01"
                                                value="{{ old('consultancy_fees', auth()->user()->consultancy_fees) }}"
                                                {{ auth()->user()->role === 'admin' ? '' : 'readonly' }}>
                                        </div>
                                    @endif

                                    @if (auth()->user()->role === 'admin')
                                        <div class="form-group">
                                            <label class="form-label">Rôle</label>
                                            <select name="role" class="custom-select">
                                                <option value="admin"
                                                    {{ auth()->user()->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="medecin"
                                                    {{ auth()->user()->role === 'medecin' ? 'selected' : '' }}>Médecin
                                                </option>
                                                <option value="patient"
                                                    {{ auth()->user()->role === 'patient' ? 'selected' : '' }}>Patient
                                                </option>
                                            </select>
                                        </div>
                                    @endif
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Mettre à jour les
                                            informations</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-notifications">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Activité</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">M'envoyer un email lorsqu'on commente mon
                                            article</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">M'envoyer un email lorsqu'on répond à ma
                                            discussion</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">M'envoyer un email lorsqu'on me suit</span>
                                    </label>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Application</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Nouveautés et annonces</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Mises à jour hebdomadaires des produits</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Résumé hebdomadaire du blog</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fonction pour prévisualiser l'image de l'avatar
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('avatar-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Script pour gérer l'activation des onglets à partir de l'URL(changer le mot de passe)
        document.addEventListener("DOMContentLoaded", function() {
            const hash = window.location.hash;

            if (hash) {
                const tabLink = document.querySelector(`a[href="${hash}"]`);
                const tabPane = document.querySelector(`${hash}`);

                if (tabLink && tabPane) {
                    // Retire les classes actives des onglets
                    document.querySelectorAll('.list-group-item').forEach(link => link.classList.remove('active'));
                    document.querySelectorAll('.tab-pane').forEach(pane => {
                        pane.classList.remove('show', 'active');
                    });

                    // Active le bon onglet
                    tabLink.classList.add('active');
                    tabPane.classList.add('show', 'active');
                }
            }
        });

        // Script pour gérer l'activation des onglets à partir de l'URL (pour les informations)
        document.addEventListener("DOMContentLoaded", function() {
            const hash = window.location.hash;

            if (hash) {
                const tabLink = document.querySelector(`a[href="${hash}"]`);
                const tabPane = document.querySelector(`${hash}`);

                if (tabLink && tabPane) {
                    // Désactive tous les onglets et contenus
                    document.querySelectorAll('.list-group-item').forEach(link => link.classList.remove('active'));
                    document.querySelectorAll('.tab-pane').forEach(pane => {
                        pane.classList.remove('show', 'active');
                    });

                    // Active l'onglet et le contenu ciblés
                    tabLink.classList.add('active');
                    tabPane.classList.add('show', 'active');
                }
            }
        });
    </script>




    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>

@endsection
