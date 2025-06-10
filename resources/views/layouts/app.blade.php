<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Clinique Espoir Santé')</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    </head>

    <body>
        @include('components.header')
        @include('components.navbar')

        <main>
            @yield('content')
        </main>

        @include('components.footer')

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

        {{-- AOS (Animate on Scroll) --}}
        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 1000,
                once: true,
            });
        </script>

        

        {{-- jQuery (si nécessaire plus tard) --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    </body>

</html>
