<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Clinique Espoir Santé')</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        {{-- <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet"> --}}
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>

    <body>
        <div class="page">
            @include('components.header')
            @include('components.navbar')

            <main>
                @yield('content')
            </main>

            @include('components.footer')
        </div>

        {{-- Animation des compteurs --}}
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const counters = document.querySelectorAll('.count-number');

                const animateCount = (el, target) => {
                    let start = 0;
                    const duration = 2000;
                    const step = Math.ceil(target / (duration / 20));

                    const counter = setInterval(() => {
                        start += step;
                        if (start >= target) {
                            start = target;
                            clearInterval(counter);
                        }

                        if (target >= 1000) {
                            el.childNodes[0].nodeValue = Math.floor(start / 1000);
                        } else {
                            el.childNodes[0].nodeValue = start;
                        }
                    }, 20);
                };

                const observer = new IntersectionObserver((entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const el = entry.target;
                            const target = parseInt(el.getAttribute('data-target'));
                            animateCount(el, target);
                            obs.unobserve(el);
                        }
                    });
                }, {
                    threshold: 0.6
                });

                counters.forEach(counter => {
                    observer.observe(counter);
                });
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                // Ouvrir le popup lorsque l'on clique sur le bouton "Appeler la clinique"
                const openCallBtn = document.getElementById('openCallModal');
                const callModal = document.getElementById('callClinicModal');

                if (openCallBtn && callModal) {
                    openCallBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        console.log('Appeler la clinique');
                        callModal.style.display = 'flex';
                    });
                } else {
                    console.log('Bouton ou modal non trouvés');
                }


                // Fermer les popups dynamiques lorsqu'on clique sur une croix
                const closeButtons = document.querySelectorAll('.close-button');
                closeButtons.forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        const modalId = btn.dataset.close;
                        const modalToClose = document.getElementById(modalId);
                        if (modalToClose) {
                            modalToClose.style.display = 'none';
                        }
                    });
                });
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const links = document.querySelectorAll('a.nav-link');
                const page = document.querySelector('.page');

                links.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        const target = this.href;

                        // Lance l'animation de disparition
                        page.classList.add('fade-out');

                        // Attend que l'animation se termine avant de changer de page
                        setTimeout(() => {
                            window.location.href = target;
                        }, 500); // correspond à transition: 0.5s
                    });
                });
            });
        </script>







        {{-- AOS (Animate on Scroll) --}}
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 800,
                once: false,
            });
        </script>



        {{-- jQuery (si nécessaire plus tard) --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <script src="{{ asset('assets/js/script.js') }}"></script>

    </body>

</html>
