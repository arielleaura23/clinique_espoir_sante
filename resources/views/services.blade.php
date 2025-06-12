@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

    <x-hero
        title='<span class="hero-title-main">Venez profiter<span class="hero-title-highlight"> de nos offres!</span></span>'
        description="Réservez facilement vos rendez-vous médicaux en ligne, avec des médecins qualifiés et disponibles."
        :button="view('components.bouton', [
            'icon' => 'assets/img/rdv.png',
            'slot' => 'Prendre un rdv',
            'href' => '/prise_rdv',
        ])->render()" mask="assets/img/exclude.png" photo="assets/img/services.png" />




    <x-services title="Nos services médicaux" subtitle="Nous vous offrons une gamme complète de soins adaptés à vos besoins."
        :services="[
            [
                'icon' => 'assets/img/consultation.png',
                'title' => 'Consultations générales',
                'description' => 'Prenez rendez-vous avec un médecin généraliste pour vos besoins quotidiens en santé.',
            ],
            [
                'icon' => 'assets/img/labo.png',
                'title' => 'Analyses médicales',
                'description' => 'Faites vos analyses sur place et recevez vos résultats rapidement.',
            ],
            [
                'icon' => 'assets/img/enceinte.png',
                'title' => 'Suivi de grossesse',
                'description' =>
                    'Un accompagnement personnalisé pour les futures mamans par nos gynécologues expérimentés.',
            ],
            [
                'icon' => 'assets/img/vaccin.png',
                'title' => 'Vaccination',
                'description' => 'Mise à jour de vos vaccins dans un cadre sécurisé.',
            ],
            [
                'icon' => 'assets/img/soins.png',
                'title' => 'Soins à domicile',
                'description' => 'Un professionnel de santé se déplace chez vous pour certains types de soins.',
            ],
            [
                'icon' => 'assets/img/massage.png',
                'title' => 'Kinésithérapie',
                'description' => 'Soins pour soulager les douleurs ou récupérer après une intervention.',
            ],
                                    [
                'icon' => 'assets/img/labo.png',
                'title' => 'Analyses médicales',
                'description' => 'Faites vos analyses sur place et recevez vos résultats rapidement.',
            ],
                        [
                'icon' => 'assets/img/vaccin.png',
                'title' => 'Vaccination',
                'description' => 'Mise à jour de vos vaccins dans un cadre sécurisé.',
            ],
        ]" />








    <div class="container section autoblur">
        <div class="faq-section">
            <div class="faq-header">
                <div class="faq-title">FAQ</div>
                <div class="faq-subtitle">
                    Les questions qui nous reviennent le<br />plus
                </div>
            </div>
            <div class="faq-list">
                <details class="faq-item" data-aos="fade-down-right">
                    <summary class="faq-question">
                        Est-ce que je peux choisir mon médecin ?
                    </summary>
                    <div class="faq-answer">
                        Oui, lors de la prise de rendez-vous, vous pouvez sélectionner le médecin de votre choix selon ses
                        disponibilités.
                    </div>
                </details>
                <details class="faq-item" data-aos="fade-down-right">
                    <summary class="faq-question">
                        Quels sont les moyens de paiement acceptés ?
                    </summary>
                    <div class="faq-answer">
                        Nous acceptons les paiements en espèces, par carte bancaire, mobile money et virement bancaire.
                    </div>
                </details>
                <details class="faq-item" data-aos="fade-down-right">
                    <summary class="faq-question">
                        Puis-je annuler ou déplacer un rendez-vous ?
                    </summary>
                    <div class="faq-answer">
                        Oui, il est possible d’annuler ou de déplacer un rendez-vous depuis votre espace patient ou en
                        contactant l’accueil.
                    </div>
                </details>
            </div>
        </div>
    </div>


@endsection
