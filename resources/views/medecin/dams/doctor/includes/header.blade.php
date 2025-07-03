<nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">
    <div class="navbar-header">
        <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
        </button>

        <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="zmdi zmdi-hc-lg zmdi-more"></span>
        </button>

        <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="zmdi zmdi-hc-lg zmdi-search"></span>
        </button>

        <a href="{{ url('dashboard') }}" class="navbar-brand">
            <span class="brand-icon"><i class="fa fa-gg"></i></span>
            <span class="brand-name">YDHP</span>
        </a>
    </div><div class="navbar-container container-fluid">
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-toolbar navbar-toolbar-left navbar-left">
                <li class="hidden-float hidden-menubar-top">
                    <a href="javascript:void(0)" role="button" id="menubar-fold-btn" class="hamburger hamburger--arrowalt is-active js-hamburger">
                        <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                    </a>
                </li>
                <li>
                    <h5 class="page-title hidden-menubar-top hidden-float">Dashboard</h5>
                </li>
            </ul>

            <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-hc-lg zmdi-notifications"></i></a>

                    <div class="media-group dropdown-menu animated flipInY">
                        {{-- La logique de récupération des notifications doit être dans le contrôleur ou un View Composer --}}
                        @if(isset($newAppointments) && $newAppointments->count() > 0)
                            @foreach($newAppointments as $appointment)
                                <a href="{{ url('view-appointment-detail', ['editid' => $appointment->ID, 'aptid' => $appointment->AppointmentNumber]) }}" class="media-group-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="avatar avatar-xs avatar-circle">
                                                <img src="{{ asset('assets/images/images.png') }}" alt="">
                                                <i class="status status-online"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading">New Appointment</h5>
                                            <small class="media-meta">{{ $appointment->AppointmentNumber }} at ({{ $appointment->ApplyDate }})</small>
                                        </div>
                                    </div>
                                </a>@endforeach
                        @else
                            <div class="media-group-item">
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="media-heading">No New Appointments</h5>
                                        <small class="media-meta">You are all caught up!</small>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </li>

                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-hc-lg zmdi-settings"></i></a>
                    <ul class="dropdown-menu animated flipInY">
                        <li><a href="{{ url('profile') }}"><i class="zmdi m-r-md zmdi-hc-lg zmdi-account-box"></i>My Profile</a></li>
                        <li><a href="{{ url('change-password') }}"><i class="zmdi m-r-md zmdi-hc-lg zmdi-balance-wallet"></i>Change Password</a></li>
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();">
                                <i class="zmdi m-r-md zmdi-hc-lg zmdi-sign-in"></i>Logout
                            </a>
                            <form id="logout-form-header" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div></nav>
