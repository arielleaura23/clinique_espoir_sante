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



        {{-- script pour afficher le panier --}}

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const toggle = document.getElementById("panierToggle");
                const dropdown = document.getElementById("panierDropdown");

                toggle.addEventListener("click", function(e) {
                    e.preventDefault();
                    dropdown.classList.toggle("active");
                });

                // Fermer si on clique ailleurs
                document.addEventListener("click", function(e) {
                    if (!toggle.contains(e.target) && !dropdown.contains(e.target)) {
                        dropdown.classList.remove("active");
                    }
                });
            });
        </script>


        {{-- Script pour la recherche de médicaments --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('pharmacy-search-input');
                const cards = document.querySelectorAll('.pharmacy-product-card');

                searchInput.addEventListener('input', function() {
                    const value = this.value.trim().toLowerCase();
                    cards.forEach(card => {
                        const title = card.querySelector('.pharmacy-product-title').textContent
                            .toLowerCase();
                        if (title.includes(value)) {
                            card.style.display = '';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        </script>


        {{-- Script pour la recherche d'événements --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('event-search-input');
                // Récupère tous les événements des deux sections
                const eventCards = document.querySelectorAll('.evenements .evenement');

                searchInput.addEventListener('input', function() {
                    const value = this.value.trim().toLowerCase();
                    eventCards.forEach(card => {
                        // Recherche dans le titre, la date, le lieu, l’horaire et la description
                        const titre = card.querySelector('.titre')?.textContent.toLowerCase() || '';
                        const date = card.querySelector('.date')?.textContent.toLowerCase() || '';
                        const lieu = card.querySelector('.lieu')?.textContent.toLowerCase() || '';
                        const horaire = card.querySelector('.horaire')?.textContent.toLowerCase() || '';
                        const desc = card.querySelector('.description')?.textContent.toLowerCase() ||
                        '';
                        // Affiche si au moins un champ contient la valeur recherchée
                        if (
                            titre.includes(value) ||
                            date.includes(value) ||
                            lieu.includes(value) ||
                            horaire.includes(value) ||
                            desc.includes(value)
                        ) {
                            card.style.display = '';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        </script>





        {{-- AOS (Animate on Scroll) --}}
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                // duration: 800,
                once: false,
            });
        </script>



        {{-- jQuery (si nécessaire plus tard) --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <script src="{{ asset('assets/js/script.js') }}"></script>

    </body>

</html>
