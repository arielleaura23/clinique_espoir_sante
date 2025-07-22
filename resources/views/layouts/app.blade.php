<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Clinique Espoir Santé')</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="icon" href="{{ asset('assets/img/logo cercle bleu.png') }}" type="image/x-icon">
        {{-- <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet"> --}}
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="user-id" content="{{ auth()->id() }}">


    </head>

    <body>
        <div class="page">
            @include('components.header')
            @include('components.navbar')
            @include('components.success-error-popups')


            <main>
                @yield('content')
            </main>

            @include('components.footer')
        </div>







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

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const creditRadio = document.getElementById('credit-card');
                const mobileRadio = document.getElementById('mobile-money');
                const cardFields = document.querySelector('.card-fields');
                const cardTypeFields = document.querySelector('.card-type-fields');
                const mobileFields = document.querySelector('.mobile-money-fields');
                const cardType = document.getElementById('card-type');
                const cardDetailsFields = document.querySelector('.card-details-fields');

                function togglePaymentFields() {
                    if (creditRadio.checked) {
                        cardFields.style.display = 'block';
                        cardTypeFields.style.display = 'block';
                        mobileFields.style.display = 'none';
                        // Affiche ou non les détails selon le type déjà choisi
                        if (cardType.value) {
                            cardDetailsFields.style.display = 'block';
                        } else {
                            cardDetailsFields.style.display = 'none';
                        }
                    } else if (mobileRadio.checked) {
                        cardFields.style.display = 'none';
                        cardTypeFields.style.display = 'none';
                        cardDetailsFields.style.display = 'none';
                        mobileFields.style.display = 'block';
                    }
                }

                creditRadio.addEventListener('change', togglePaymentFields);
                mobileRadio.addEventListener('change', togglePaymentFields);

                // Affiche les champs détails carte seulement si un type est choisi
                cardType.addEventListener('change', function() {
                    if (this.value) {
                        cardDetailsFields.style.display = 'block';
                    } else {
                        cardDetailsFields.style.display = 'none';
                    }
                });

                // Initial state
                togglePaymentFields();
            });
        </script>






    </body>


</html>
