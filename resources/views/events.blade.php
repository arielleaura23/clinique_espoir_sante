@extends('layouts.app')

@section('title', 'events')

@section('content')

    <x-hero
        title='<span class="hero-title-main">Vivez avec <span class="hero-title-highlight"> nous nos evenements!</span></span>'
        description="Réservez facilement vos rendez-vous médicaux en ligne, avec des médecins qualifiés et disponibles."
        mask="assets/img/exclude.png" />


    <div class="events container section">
        <div class="futur-events  ">
            <div class="pharmacy-search-bar">
                <input type="text" class="pharmacy-search-input"
                    placeholder="Rechercher des evenements par nom, mois, lieu ou jour ....">
                <button class="pharmacy-search-btn">
                    <img src="{{ asset('assets/img/search.png') }}" alt="Rechercher" />
                </button>
            </div>


            <div class="before-consultation-header">
                <div class="before-consultation-title">A venir</div>
                <div class="before-consultation-subtitle">
                    Consultez nos futurs evenements et prenez y part
                </div>
            </div>


            <div class="evenements">
                <!-- Événement 1 -->
                <div class="evenement">
                    <img src="{{ asset('assets/img/doc8.png') }}" alt="Journée mondiale du SIDA" class="image-evenement" />
                    <h2 class="titre">Journée mondiale du SIDA</h2>
                    <div class="details">
                        <p class="date">Mardi, 04 septembre 2025</p>
                        <p class="lieu">CHU</p>
                        <p class="horaire">08:00 - 15:00</p>
                    </div>
                    <p class="description">
                        Sensibilisation sur le VIH/SIDA avec des séances d'information, des dépistages gratuits et des
                        témoignages
                        de personnes vivant avec le VIH.
                    </p>
                    <p class="description-secondaire">
                        Rejoignez-nous pour briser les tabous, s'informer et agir ensemble pour une société plus solidaire.
                    </p>
                </div>

                <!-- Événement 2 -->
                <div class="evenement">
                    <img src="{{ asset('assets/img/doc9.png') }}" alt="Vaccination contre la rougeole"
                        class="image-evenement" />
                    <h2 class="titre">Campagne de vaccination contre la rougeole</h2>
                    <div class="details">
                        <p class="date">Mardi, 04 septembre 2025</p>
                        <p class="lieu">CHU</p>
                        <p class="horaire">08:00 - 15:00</p>
                    </div>
                    <p class="description">
                        Une journée dédiée à la vaccination des enfants de 9 mois à 5 ans, encadrée par des professionnels
                        de la
                        santé.
                    </p>
                    <p class="description-secondaire">
                        Protégez votre enfant contre la rougeole en participant à cette campagne gratuite.
                    </p>
                </div>
            </div>
        </div>

        <div class="futur-events  section">


            <div class="before-consultation-header">
                <div class="before-consultation-title">Evenements passés</div>
                <div class="before-consultation-subtitle">
                    Consultez nos derniers evenements
                </div>
            </div>


            <div class="evenements">
                <!-- Événement 1 -->
                <div class="evenement">
                    <img src="{{ asset('assets/img/doc8.png') }}" alt="Journée mondiale du SIDA" class="image-evenement" />
                    <h2 class="titre">Journée mondiale du SIDA</h2>
                    <div class="details">
                        <p class="date">Mardi, 04 septembre 2025</p>
                        <p class="lieu">CHU</p>
                        <p class="horaire">08:00 - 15:00</p>
                    </div>
                    <p class="description">
                        Sensibilisation sur le VIH/SIDA avec des séances d'information, des dépistages gratuits et des
                        témoignages
                        de personnes vivant avec le VIH.
                    </p>
                    <p class="description-secondaire">
                        Rejoignez-nous pour briser les tabous, s'informer et agir ensemble pour une société plus solidaire.
                    </p>
                </div>

                <!-- Événement 2 -->
                <div class="evenement">
                    <img src="{{ asset('assets/img/doc9.png') }}" alt="Vaccination contre la rougeole"
                        class="image-evenement" />
                    <h2 class="titre">Campagne de vaccination contre la rougeole</h2>
                    <div class="details">
                        <p class="date">Mardi, 04 septembre 2025</p>
                        <p class="lieu">CHU</p>
                        <p class="horaire">08:00 - 15:00</p>
                    </div>
                    <p class="description">
                        Une journée dédiée à la vaccination des enfants de 9 mois à 5 ans, encadrée par des professionnels
                        de la
                        santé.
                    </p>
                    <p class="description-secondaire">
                        Protégez votre enfant contre la rougeole en participant à cette campagne gratuite.
                    </p>
                </div>
                <!-- Événement 1 -->
                <div class="evenement">
                    <img src="{{ asset('assets/img/doc8.png') }}" alt="Journée mondiale du SIDA" class="image-evenement" />
                    <h2 class="titre">Journée mondiale du SIDA</h2>
                    <div class="details">
                        <p class="date">Mardi, 04 septembre 2025</p>
                        <p class="lieu">CHU</p>
                        <p class="horaire">08:00 - 15:00</p>
                    </div>
                    <p class="description">
                        Sensibilisation sur le VIH/SIDA avec des séances d'information, des dépistages gratuits et des
                        témoignages
                        de personnes vivant avec le VIH.
                    </p>
                    <p class="description-secondaire">
                        Rejoignez-nous pour briser les tabous, s'informer et agir ensemble pour une société plus solidaire.
                    </p>
                </div>

                <!-- Événement 2 -->
                <div class="evenement">
                    <img src="{{ asset('assets/img/doc9.png') }}" alt="Vaccination contre la rougeole"
                        class="image-evenement" />
                    <h2 class="titre">Campagne de vaccination contre la rougeole</h2>
                    <div class="details">
                        <p class="date">Mardi, 04 septembre 2025</p>
                        <p class="lieu">CHU</p>
                        <p class="horaire">08:00 - 15:00</p>
                    </div>
                    <p class="description">
                        Une journée dédiée à la vaccination des enfants de 9 mois à 5 ans, encadrée par des professionnels
                        de la
                        santé.
                    </p>
                    <p class="description-secondaire">
                        Protégez votre enfant contre la rougeole en participant à cette campagne gratuite.
                    </p>
                </div>
            </div>
        </div>
    </div>


@endsection
