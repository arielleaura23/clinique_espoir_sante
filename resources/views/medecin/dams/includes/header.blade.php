<nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
    <div class="container">
        <a class="navbar-brand mx-auto d-lg-none" href="{{ url('/') }}">
            Your Digital
            <strong class="d-block">Health Partner</strong>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item @if(Request::is('/')) active @endif">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>

                <a class="navbar-brand d-none d-lg-block" href="{{ url('/') }}">
                    Your Digital
                    <strong class="d-block">Health Partner</strong>
                </a>

                <li class="nav-item @if(Request::is('check-appointment')) active @endif">
                    <a class="nav-link" href="{{ url('check-appointment') }}">Check Appointment</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#booking">Booking</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item @if(Request::is('doctor/login')) active @endif">
                    <a class="nav-link" href="{{ url('doctor/login') }}">Doctor</a>
                </li>
            </ul>
        </div>
    </div>
</nav>