<div class="main-navbar">
    <div class="container">
        <nav class="navbar-container">
            <a href="{{ route('home') }}" class="nav-link">{{ __('Home') }}</a>
            <a href="{{ route('about') }}" class="nav-link">{{ __('About') }}</a>
            <a href="{{ route('services') }}" class="nav-link">{{ __('Services') }}</a>
            <a href="{{ route('guide_patient') }}" class="nav-link">{{ __('Patient guide') }}</a>
            <a href="{{ route('pharmacie') }}" class="nav-link">{{ __('Pharmacy') }}</a>
            <a href="{{ route('contact') }}" class="nav-link">{{ __('Contact') }}</a>
            <a href="{{ route('medecins') }}" class="nav-link">{{ __('Doctors') }}</a>

            <div class="dropdown-container">
                <a href="#" class="nav-link">
                    {{ __('News') }}
                    <span>
                        <img src="{{ asset('assets/img/chevron_down.png') }}" width="20" height="20"
                            alt="chevron_down">
                    </span>
                </a>
                <div class="dropdown">
                    <a href="{{ route('blog') }}" class="dropdown-item">{{ __('Blog') }}</a>
                    <a href="{{ route('events') }}" class="dropdown-item">{{ __('Events') }}</a>
                </div>
            </div>

            @guest
                <x-bouton href="{{ route('login') }}">{{ __('Log in') }}</x-bouton>
            @else
                <div class="nav-user-dropdown">
                    <input type="checkbox" id="userDropdownToggle" class="nav-user-toggle" hidden>
                    <label for="userDropdownToggle" class="nav-user-btn">
                        <span class="nav-user-name">{{ Auth::user()->name }}</span>
                        <img src="{{ asset('assets/img/chevron_down.png') }}" width="18" height="18"
                            alt="chevron_down">
                    </label>
                    <div class="nav-user-menu">
                        <a href="{{ route('profile.edit') }}" class="nav-user-menu-item">{{ __('Profile') }}</a>
                        <a href="{{ route('discussions') }}" class="nav-user-menu-item">{{ __('Messages') }}</a>
                        <a href="#" class="nav-user-menu-item" style="color: red"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
        </nav>
    </div>
</div>


<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-navbar">
        <nav class="navbar-container">
            <a href="{{ route('home') }}" class="nav-link">{{ __('Home') }}</a>
            <a href="{{ route('about') }}" class="nav-link">{{ __('About') }}</a>
            <a href="{{ route('services') }}" class="nav-link">{{ __('Services') }}</a>
            <a href="{{ route('guide_patient') }}" class="nav-link">{{ __('Patient guide') }}</a>
            <a href="{{ route('pharmacie') }}" class="nav-link">{{ __('Pharmacy') }}</a>
            <a href="{{ route('contact') }}" class="nav-link">{{ __('Contact') }}</a>
            <a href="{{ route('medecins') }}" class="nav-link">{{ __('Doctors') }}</a>

            <div class="dropdown-container">
                <a href="#" class="nav-link">
                    {{ __('News') }}
                    <span>
                        <img src="{{ asset('assets/img/chevron_down.png') }}" width="20" height="20" alt="chevron_down">
                    </span>
                </a>
                <div class="dropdown">
                    <a href="{{ route('blog') }}" class="dropdown-item">{{ __('Blog') }}</a>
                    <a href="{{ route('events') }}" class="dropdown-item">{{ __('Events') }}</a>
                </div>
            </div>

            @guest
                <x-bouton href="{{ route('login') }}">{{ __('Log in') }}</x-bouton>
            @else
                <div class="nav-user-dropdown">
                    <input type="checkbox" id="userDropdownToggle" class="nav-user-toggle" hidden>
                    <label for="userDropdownToggle" class="nav-user-btn">
                        <span class="nav-user-name">{{ Auth::user()->name }}</span>
                        <img src="{{ asset('assets/img/chevron_down.png') }}" width="18" height="18"
                            alt="chevron_down">
                    </label>
                    <div class="nav-user-menu">
                        <a href="{{ route('profile.edit') }}" class="nav-user-menu-item">{{ __('Profile') }}</a>
                        <a href="{{ route('discussions') }}" class="nav-user-menu-item">{{ __('Messages') }}</a>
                        <a href="#" class="nav-user-menu-item" style="color: red"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
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
        </div>
    </div>
</div>

