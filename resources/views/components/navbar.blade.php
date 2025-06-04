        <div class="main-navbar">
            <div class="container">
                <nav class="navbar-container">
                    <a href="{{route('home')}}" class="nav-link">Accueil</a>
                    <a href="{{route('about')}}" class="nav-link">A propos</a>
                    <a href="{{route('services')}}" class="nav-link">Services</a>
                    <a href="{{route('guide_patient')}}" class="nav-link">Guide patient</a>
                    <a href="{{route('pharmacie')}}" class="nav-link">Pharmacie</a>
                    <a href="{{route('contact')}}" class="nav-link">Contact</a>
                    <a href="{{route('medecins')}}" class="nav-link">Médecins</a>
                    <a href="#" class="nav-link">Actualités <span><img
                                src="{{ asset('assets/img/chevron_down.png') }}" width="20" height="20"
                                alt="chevron_down"></span></a>
                    {{-- <div class="nav-dropdown"></div> --}}
                    <a class="nav-login-btn">
                        <div class="login-bg"></div>
                        <div class="login-text">Se connecter</div>
                    </a>
                </nav>
            </div>
        </div>
