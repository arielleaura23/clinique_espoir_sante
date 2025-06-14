        <header class="header">
            <div class="container">
                <div class="header-top">
                    <a href="{{route('home')}}" class="header-logo">
                        <img src="{{ asset('assets/img/logo cercle.png') }}" alt="Logo Clinique Espoir Santé">
                    </a>
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
                    <div class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                        <img src="{{ asset('assets/img/hamburger.png') }}" alt="Menu" width="30" height="30">
                    </div>
                </div>
            </div>
        </header>
