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

                    @guest
                        <x-bouton href="{{ route('login') }}">Se connecter</x-bouton>
                    @else
                        <div class="nav-user-dropdown">
                            <input type="checkbox" id="userDropdownToggle" class="nav-user-toggle" hidden>
                            <label for="userDropdownToggle" class="nav-user-btn">
                                {{-- <span class="nav-user-avatar">
                                    <img src="{{ asset('assets/img/chat-contact.png') }}" alt="Avatar" width="32"
                                        height="32" style="border-radius:50%;">
                                </span> --}}
                                <span class="nav-user-name">{{ Auth::user()->name }}</span>
                                <img src="{{ asset('assets/img/chevron_down.png') }}" width="18" height="18"
                                    alt="chevron_down">
                            </label>
                            <div class="nav-user-menu">
                                <a href="{{ route('profile.edit') }}" class="nav-user-menu-item">Profil</a>
                                <a href="{{ route('discussions') }}" class="nav-user-menu-item">Messages</a>
                                <a href="#" class="nav-user-menu-item" style="color: red"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Déconnexion
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </div>
                    @endguest
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
                    @guest
                        <x-bouton href="{{ route('login') }}">Se connecter</x-bouton>
                    @else
                        <div class="nav-user-dropdown">
                            <button class="nav-user-btn" id="userDropdownBtn">
                                <span class="nav-user-avatar">
                                    <img src="{{ asset('assets/img/chat-contact.png') }}" alt="Avatar" width="32"
                                        height="32" style="border-radius:50%;">
                                </span>
                                <span class="nav-user-name">{{ Auth::user()->name }}</span>
                                <img src="{{ asset('assets/img/chevron_down.png') }}" width="18" height="18"
                                    alt="chevron_down">
                            </button>
                            <div class="nav-user-menu" id="userDropdownMenu">
                                <a href="{{ route('profile.edit') }}" class="nav-user-menu-item">Profil</a>
                                <a href="{{ route('discussions') }}" class="nav-user-menu-item">Messages</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="nav-user-menu-item logout-btn">Déconnexion</button>
                                </form>
                            </div>
                        </div>
                    @endguest
                    {{-- <a href="{{ route('login') }}" class="nav-login-btn">
                        <div class="login-bg"></div>
                        <div class="login-text">Se connecter</div>
                    </a> --}}
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
                {{-- <div class="mobile-header-lang">
                    <div class="right-icons">
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

                        <div class="panier">
                            <a href="#" class="panier-link">
                                <img src="{{ asset('assets/img/cart-blue.png') }}" alt="Panier">
                                <span class="panier-count">0</span>
                            </a>
                        </div>
                    </div>
            </div> --}}
            </div>
        </div>
