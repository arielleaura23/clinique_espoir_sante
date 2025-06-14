@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

    @props([
        'title',
        'subtitle',
        'services' => [],
        'button' => null,
        'button_position' => 'center',
        'background' => false,
    ])

    <x-hero title='<span class="hero-title-main">Venez<span class="hero-title-highlight"> consulter chez nous!</span></span>'
        description="Réservez facilement vos rendez-vous médicaux en ligne, avec des médecins qualifiés et disponibles."
        :button="view('components.bouton', [
            'icon' => 'assets/img/rdv.png',
            'slot' => 'Prendre un rdv',
            'href' => '/prise_rdv',
        ])->render()" mask="assets/img/exclude.png" photo="assets/img/doctor1.png" />


    <x-about  />

    <x-services   title="Nos services médicaux" subtitle="Nous vous offrons une gamme complète de soins adaptés à vos besoins."
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
        ]" background="1" {{-- retire cette ligne si tu ne veux pas de bg --}} />




    <div class="count-section section " data-aos="fade-up">
        <div class="count-bg">
            <div class="container">
                <div class="count-list">
                    <div class="count-item">
                        <span class="count-number" data-target="10000">10<span class="count-k">K</span><span
                                class="count-plus">+</span></span>
                        <div class="count-label">Clients satisfaits</div>
                    </div>
                    <div class="count-item">
                        <span class="count-number" data-target="100">100<span class="count-plus">+</span></span>
                        <div class="count-label">Membres de l’équipe</div>
                    </div>
                    <div class="count-item">
                        <span class="count-number" data-target="500">500<span class="count-plus">+</span></span>
                        <div class="count-label">Témoignages</div>
                    </div>
                    <div class="count-item">
                        <span class="count-number" data-target="3">3<span class="count-plus">+</span></span>
                        <div class="count-label">Années d’expérience</div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="testimonials-section section " data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
        <div class="container">
            <div class="testimonials-header">
                <div class="testimonials-title">Ce que nos clients disent</div>
                <div class="testimonials-subtitle">
                    Nous vous offrons une gamme complète de soins adaptés à vos besoins.
                </div>
            </div>
            <div class="testimonials-list">
                <div class="testimonial-card">
                    <div class="testimonial-bg"></div>
                    <div class="cotes">''</div>
                    <div class="testimonial-text">
                        J’ai pu réserver mon rendez-vous en ligne en quelques minutes seulement.
                        L’interface est claire et intuitive. Bravo pour ce service moderne et pratique !
                    </div>
                    <div class="temoin">
                        <div class="testimonial-avatar">
                            <img src="{{ asset('assets/img/temoin.png') }}" alt="Arielle Abomo" />
                        </div>
                        <div class="testimonial-name-group">
                            <span class="testimonial-name">Arielle Abomo</span>
                            <div class="stars">
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-bg"></div>
                    <div class="cotes">''</div>
                    <div class="testimonial-text">
                        Le rappel de rendez-vous par e-mail et SMS est un vrai plus. Cela
                        m’évite d’oublier mes consultations, surtout avec mon emploi du temps chargé.
                    </div>
                    <div class="temoin">
                        <div class="testimonial-avatar">
                            <img src="{{ asset('assets/img/temoin.png') }}" alt="Arielle Abomo" />
                        </div>
                        <div class="testimonial-name-group">
                            <span class="testimonial-name">Arielle Abomo</span>
                            <div class="stars">
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-bg"></div>
                    <div class="cotes">''</div>
                    <div class="testimonial-text">
                        Très bon service ! Le personnel est disponible et l'organisation
                        est fluide grâce au système de prise de rendez-vous. Je recommande cette
                        clinique à 100 %
                    </div>
                    <div class="temoin">
                        <div class="testimonial-avatar">
                            <img src="{{ asset('assets/img/temoin.png') }}" alt="Arielle Abomo" />
                        </div>
                        <div class="testimonial-name-group">
                            <span class="testimonial-name">Arielle Abomo</span>
                            <div class="stars">
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="cot-services section " data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
        <div class="container">
            <div class="cot-services-content">
                <div class="cot-services-header">
                    <div class="cot-services-title">Comment avoir nos services?</div>
                    <div class="cot-services-subtitle">Suivez juste les étapes suivantes</div>
                </div>
                <div class="cot-services-steps">
                    <div class="cot-step">
                        <a href="{{route('prise_rdv')}}" class="cot-step-bg">
                            <img class="cot-step-icon" src="{{ asset('assets/img/prise_rdv.png') }}" alt="" />
                            <div class="cot-step-text">Demander un <br> rendez-vous</div>
                        </a>
                    </div>
                    <a href="{{route('prise_rdv')}}" class="cot-step">
                        <div class="cot-step-bg">
                            <img class="cot-step-icon" src="{{ asset('assets/img/consultation.png') }}"
                                alt="Caler le rendez-vous" />
                            <div class="cot-step-text">
                                Caler le<br />rendez-vous
                            </div>
                        </div>
                    </a>
                    <a href="{{route('visio_consulting')}}" class="cot-step">
                        <div class="cot-step-bg">
                            <img class="cot-step-icon" src="{{ asset('assets/img/consult.png') }}" alt="" />
                            <div class="cot-step-text">
                                Fais toi<br />consulter
                            </div>
                        </div>

                    </a>
                </div>
                {{-- <div class="cot-services-icons">
                        <img class="cot-services-calendar" src="group0.svg" alt="Calendrier" />
                        <img class="cot-services-appointment" src="lsicon-work-order-appointment-filled0.svg"
                            alt="Consultation" />
                    </div> --}}
            </div>
        </div>
    </div>




    <div class="newsletter-section section " data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000">

        <div class="newsletter-bg">
            <div class="container">
                <div class="news">
                    <div class="news-info">
                        <div class="newsletter-title">Abonnez-vous à notre newsletter</div>
                        <div class="newsletter-description">
                            Restez informé<br />
                            Notre Newsletter<br />
                            Recevez en exclusivité les dernières nouvelles sur nos services, des conseils santé, et des
                            informations sur les événements à venir.
                        </div>
                    </div>
                    <form class="newsletter-form">
                        <div class="newsletter-input-group">
                            <span class="newsletter-input-icon">
                                <img src="{{ asset('assets/img/email.png') }}" alt="Email" />
                            </span>
                            <input class="newsletter-input" type="email" placeholder="Votre adresse email ..." />
                            <button class="newsletter-btn" type="submit">
                                <img src="{{ asset('assets/img/send.png') }}" alt="Envoyer" />
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



    <div class="partenaires-section section " data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000" style="    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);">

        <div class="partenaires-bg">
            <div class="container">
                <div class="partenaires-list">
                    <img class="partenaire-logo" src="{{ asset('assets/img/logo_minesup.webp') }}" alt="Minesup" />
                    <img class="partenaire-logo" src="{{ asset('assets/img/logo_minsante-2.webp') }}" alt="Minsanté" />
                    <img class="partenaire-logo" src="{{ asset('assets/img/logo_minfi.webp') }}" alt="Minfi" />
                </div>
            </div>
        </div>


    </div>

@endsection
