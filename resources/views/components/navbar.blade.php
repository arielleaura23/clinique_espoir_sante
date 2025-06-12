        <div class="main-navbar">
            <div class="container">
                <nav class="navbar-container">
                    <a href="{{ route('home') }}" class="nav-link">Accueil</a>
                    <a href="{{ route('about') }}" class="nav-link">A propos</a>
                    <a href="{{ route('services') }}" class="nav-link">Services</a>
                    <a href="{{ route('guide_patient') }}" class="nav-link">Guide patient</a>
                    <a href="{{ route('pharmacie') }}" class="nav-link">Pharmacie</a>
                    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                    <a href="{{ route('medecins') }}" class="nav-link">Médecins</a>
                    <div class="dropdown-container">
                        <a href="#" class="nav-link">Actualités <span><img
                                    src="{{ asset('assets/img/chevron_down.png') }}" width="20" height="20"
                                    alt="chevron_down"></span></a>
                        <div class="dropdown">
                            <a href="{{ route('blog') }}" class="dropdown-item">Blog</a>
                            <a href="{{ route('events') }}" class="dropdown-item">Événements</a>

                        </div>
                    </div>
                    {{-- <div class="nav-dropdown"></div> --}}
                    <x-bouton href="{{ route('show.login') }}" >Se connecter</x-bouton>
                    {{-- <a href="{{ route('show.login') }}" class="nav-login-btn">
                        <div class="login-bg"></div>
                        <div class="login-text">Se connecter</div>
                    </a> --}}
                </nav>
            </div>
        </div>



        <div class="mobile-menu" id="mobileMenu">
            <div class="mobile-navbar">
                <nav class="navbar-container">
                    <a href="{{ route('home') }}" class="nav-link">Accueil</a>
                    <a href="{{ route('about') }}" class="nav-link">A propos</a>
                    <a href="{{ route('services') }}" class="nav-link">Services</a>
                    <a href="{{ route('guide_patient') }}" class="nav-link">Guide patient</a>
                    <a href="{{ route('pharmacie') }}" class="nav-link">Pharmacie</a>
                    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                    <a href="{{ route('medecins') }}" class="nav-link">Médecins</a>
                    <div class="dropdown-container">
                        <a href="#" class="nav-link">Actualités <span><img
                                    src="{{ asset('assets/img/chevron_down.png') }}" width="20" height="20"
                                    alt="chevron_down"></span></a>
                        <div class="dropdown">
                            <a href="{{ route('blog') }}" class="dropdown-item">Blog</a>
                            <a href="{{ route('events') }}" class="dropdown-item">Événements</a>

                        </div>
                    </div>
                    {{-- <div class="nav-dropdown"></div> --}}
                    <a href="{{ route('show.login') }}" class="nav-login-btn">
                        <div class="login-bg"></div>
                        <div class="login-text">Se connecter</div>
                    </a>
                </nav>
            </div>

            <div class="infos">
                            <div class="mobile-header-info">
                <div class="header-info">
                    <div class="info-block">
                        <div class="icon-block">
                            <span class="info-icon">
                                <img src="{{ asset('assets/img/phone.png') }}" alt="Téléphone">
                            </span>
                        </div>
                        <div class="block-content">
                            <span class="info-label">Urgences :</span>
                            <span class="info-value">(+237) 690-11-80-10</span>
                        </div>
                    </div>
                    <div class="info-block">
                        <div class="icon-block">
                            <span class="info-icon">
                                <img src="{{ asset('assets/img/montre.png') }}" alt="Horaires">
                            </span>
                        </div>
                        <div class="block-content">
                            <span class="info-label">Période de travail :</span>
                            <span class="info-value">8h00-20h00 chaque jour</span>
                        </div>
                    </div>
                    <div class="info-block">
                        <div class="icon-block">
                            <span class="info-icon">
                                <img src="{{ asset('assets/img/localisation.png') }}" alt="Localisation">
                            </span>
                        </div>
                        <div class="block-content">
                            <span class="info-label">Localisation :</span>
                            <span class="info-value">Mendong</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-header-lang">
                    <div class="header-lang">
                        <div class="lang-switcher">
                            <div class="lang-switcher-selected" id="lang-switcher-selected">
                                <span><img src="{{ asset('assets/img/chevron_down.png') }}" width="20"
                                        height="20" alt="chevron_down"></span>
                                <img class="flag-icon" src="{{ asset('assets/img/drapeau_france.png') }}"
                                    alt="FR">
                                <span class="lang-label">FR</span>
                            </div>
                            <div class="lang-switcher-dropdown" id="lang-switcher-dropdown">
                                <div class="lang-switcher-option">
                                    <img class="flag-icon" src="{{ asset('assets/img/drapeau_anglais.png') }}"
                                        alt="FR">
                                    <span class="lang-label">EN</span>
                                </div>
                                <div class="lang-switcher-option">
                                    <img class="flag-icon" src="{{ asset('assets/img/drapeau_france.png') }}"
                                        alt="FR">
                                    <span class="lang-label">FR</span>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
        </div>
