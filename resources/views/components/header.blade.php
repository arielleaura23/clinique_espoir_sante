<header class="header">
    <div class="container">
        <div class="header-top">
            <a href="{{ route('home') }}" class="header-logo">
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
                        <span class="info-label">{{ __('Emergency:') }}</span>
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
                        <span class="info-label">{{ __('Working hours:') }}</span>
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
                        <span class="info-label">{{ __('Location:') }}</span>
                        <span class="info-value">Mendong</span>
                    </div>
                </div>
            </div>

            <div class="right-icons">
                {{-- Langue --}}
                <div class="header-lang">
                    <div class="lang-switcher">
                        <div class="lang-switcher-selected" id="lang-switcher-selected">
                            <span>
                                <img src="{{ asset('assets/img/chevron_down.png') }}" width="20" height="20" alt="chevron_down">
                            </span>
                            <img class="flag-icon"
                                src="{{ asset('assets/img/drapeau_' . (app()->getLocale() === 'fr' ? 'france' : 'anglais') . '.png') }}"
                                alt="{{ app()->getLocale() === 'fr' ? 'FR' : 'EN' }}">
                            <span class="lang-label">{{ strtoupper(app()->getLocale()) }}</span>
                        </div>
                        <div class="lang-switcher-dropdown" id="lang-switcher-dropdown">
                            <a href="{{ url('lang/fr') }}" class="lang-switcher-option">
                                <img class="flag-icon" src="{{ asset('assets/img/drapeau_france.png') }}" alt="FR">
                                <span class="lang-label">FR</span>
                            </a>
                            <a href="{{ url('lang/en') }}" class="lang-switcher-option">
                                <img class="flag-icon" src="{{ asset('assets/img/drapeau_anglais.png') }}" alt="EN">
                                <span class="lang-label">EN</span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Panier --}}
                <div class="panier">
                    <a href="#" class="panier-link" id="panierToggle">
                        <img src="{{ asset('assets/img/cart-blue.png') }}" alt="Panier">
                        <span class="panier-count">2</span>
                    </a>
                    <div class="panier-dropdown" id="panierDropdown">
                        <h4 class="panier-title">{{ __('My Cart') }}</h4>
                        <div class="panier-items">
                            <a class="panier-item" href="{{ route('product_details') }}">
                                <div class="img-medoc">
                                    <img src="{{ asset('assets/img/medoc4.png') }}" alt="Produit 1">
                                </div>
                                <div class="item-info">
                                    <span class="item-name">Amoxicilin</span>
                                    <span class="item-price">2000 FCFA</span>
                                </div>
                                <div class="item-qty">
                                    <span class="item-price">*2</span>
                                </div>
                            </a>
                            <a class="panier-item" href="{{ route('product_details') }}">
                                <div class="img-medoc">
                                    <img src="{{ asset('assets/img/medoc4.png') }}" alt="Produit 1">
                                </div>
                                <div class="item-info">
                                    <span class="item-name">Amoxicilin</span>
                                    <span class="item-price">2000 FCFA</span>
                                </div>
                                <div class="item-qty">
                                    <span class="item-price">*2</span>
                                </div>
                            </a>
                        </div>
                        <div class="panier-footer">
                            <div class="panier-total">
                                Total : <strong>17 500 FCFA</strong>
                            </div>
                            <a href="{{ route('checkout_page') }}" class="btn-panier">{{ __('Go to checkout') }}</a>
                        </div>
                    </div>
                </div>

                {{-- Mobile menu --}}
                <div class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                    <img src="{{ asset('assets/img/hamburger.png') }}" alt="Menu" width="30" height="30">
                </div>
            </div>
        </div>
    </div>
</header>
