<aside id="menubar" class="menubar light">
    <div class="app-user">
        <div class="media">
            <div class="media-left">
                <div class="avatar avatar-md avatar-circle">
                    <a href="javascript:void(0)">
                        <img class="img-responsive" src="{{ asset('assets/assets_medecin/images/images.png') }}"
                            alt="avatar" />
                    </a>
                </div>
            </div>
            <div class="media-body">
                <div class="foldable">
                    {{-- La logique de récupération des données de l'utilisateur doit être dans le contrôleur --}}
                    {{-- Assumons que vous passez l'utilisateur authentifié à la vue via compact('user') ou Auth::user() --}}
                    <h5>
                        <a href="javascript:void(0)" class="username">
                            {{ Auth::user()->FullName ?? 'Nom Complet' }}
                        </a>
                    </h5>
                    <ul>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <small>{{ Auth::user()->Email ?? 'email@example.com' }}</small>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li>
                                    <a class="text-color" href="{{ url('dashboard') }}">
                                        <span class="m-r-xs"><i class="fa fa-home"></i></span>
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="{{ url('profile') }}">
                                        <span class="m-r-xs"><i class="fa fa-user"></i></span>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-color" href="{{ url('change-password') }}">
                                        <span class="m-r-xs"><i class="fa fa-gear"></i></span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    {{-- Utilisation d'un formulaire pour la déconnexion, car la déconnexion doit être une requête POST --}}
                                    <a class="text-color" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        <span>logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">
                <li class="has-submenu @if (Request::is('dashboard')) active @endif">
                    <a href="{{ route('dashboard_medecin') }}">
                        <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>

                <li @if (Request::is('new-appointment')) class="active" @endif>
                    <a href="{{ route('new_appointment') }}"><span class="menu-text">New Appointment</span></a>
                </li>
                <li @if (Request::is('approved-appointment')) class="active" @endif>
                    <a href="{{ route('approved_appointment') }}"><span class="menu-text">Approved
                            Appointment</span></a>
                </li>
                <li @if (Request::is('cancelled-appointment')) class="active" @endif>
                    <a href="{{ route('cancelled_appointment') }}"><span class="menu-text">Cancelled
                            Appointment</span></a>
                </li>
                <li @if (Request::is('all-appointment')) class="active" @endif>
                    <a href="{{ url('all-appointment') }}"><span class="menu-text">All Appointment</span></a>
                </li>


                {{-- <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle">
                        <i class="menu-icon zmdi zmdi-pages zmdi-hc-lg"></i>
                        <span class="menu-text">Appointment</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                    </a>
                    <ul class="submenu">
                        <li @if (Request::is('new-appointment')) class="active" @endif>
                            <a href="{{ url('new-appointment') }}"><span class="menu-text">New Appointment</span></a>
                        </li>
                        <li @if (Request::is('approved-appointment')) class="active" @endif>
                            <a href="{{ url('approved-appointment') }}"><span class="menu-text">Approved
                                    Appointment</span></a>
                        </li>
                        <li @if (Request::is('cancelled-appointment')) class="active" @endif>
                            <a href="{{ url('cancelled-appointment') }}"><span class="menu-text">Cancelled
                                    Appointment</span></a>
                        </li>
                        <li @if (Request::is('all-appointment')) class="active" @endif>
                            <a href="{{ url('all-appointment') }}"><span class="menu-text">All Appointment</span></a>
                        </li>
                    </ul>
                </li> --}}

                <li @if (Request::is('search')) class="active" @endif>
                    <a href="{{ url('search') }}">
                        <i class="menu-icon zmdi zmdi-search zmdi-hc-lg"></i>
                        <span class="menu-text">Search</span>
                    </a>
                </li>
                <li @if (Request::is('appointment-bwdates')) class="active" @endif>
                    <a href="{{ url('appointment-bwdates') }}">
                        <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                        <span class="menu-text">Report</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
