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


    <x-hero
        {{-- title='<span class="hero-title-main">{{ __('Come') }} <span class="hero-title-highlight">{{ __('and consult with us!') }}</span></span>' --}}
            :title="__('Come') . ' <span class=\'hero-title-highlight\'>' . __('and consult with us!') . '</span>'"
        description="{{ __('Easily book your medical appointments online with qualified and available doctors.') }}"
        :button="view('components.bouton', [
            'icon' => 'assets/img/rdv.png',
            'slot' => __('Book an appointment'),
            'href' => '/prise_rdv',
        ])->render()" mask="assets/img/exclude.png" photo="assets/img/doctor1.png" />





    <x-about />

    <x-services title="{{ __('Our Medical Services') }}"
        subtitle="{{ __('We offer a full range of care tailored to your needs.') }}" :services="[
            [
                'icon' => 'assets/img/consultation.png',
                'title' => __('General Consultations'),
                'description' => __('Book an appointment with a general practitioner for your daily health needs.'),
            ],
            [
                'icon' => 'assets/img/labo.png',
                'title' => __('Medical Tests'),
                'description' => __('Get your lab work done on-site and receive your results quickly.'),
            ],
            [
                'icon' => 'assets/img/enceinte.png',
                'title' => __('Pregnancy Follow-up'),
                'description' => __('Personalized support for future mothers from our experienced gynecologists.'),
            ],
            [
                'icon' => 'assets/img/vaccin.png',
                'title' => __('Vaccination'),
                'description' => __('Keep your vaccines up to date in a safe environment.'),
            ],
            [
                'icon' => 'assets/img/soins.png',
                'title' => __('Home Care'),
                'description' => __('A healthcare professional comes to your home for specific treatments.'),
            ],
            [
                'icon' => 'assets/img/massage.png',
                'title' => __('Physiotherapy'),
                'description' => __('Treatments to ease pain or help recover after an intervention.'),
            ],
            [
                'icon' => 'assets/img/labo.png',
                'title' => __('Medical Tests'),
                'description' => __('Get your lab work done on-site and receive your results quickly.'),
            ],
            [
                'icon' => 'assets/img/vaccin.png',
                'title' => __('Vaccination'),
                'description' => __('Keep your vaccines up to date in a safe environment.'),
            ],
        ]" background="1" />




    <div class="count-section section" data-aos="fade-up">
        <div class="count-bg">
            <div class="container">
                <div class="count-list">
                    <div class="count-item">
                        <span class="count-number" data-target="10000">10<span class="count-k">K</span><span
                                class="count-plus">+</span></span>
                        <div class="count-label">{{ __('Satisfied clients') }}</div>
                    </div>
                    <div class="count-item">
                        <span class="count-number" data-target="100">100<span class="count-plus">+</span></span>
                        <div class="count-label">{{ __('Team members') }}</div>
                    </div>
                    <div class="count-item">
                        <span class="count-number" data-target="500">500<span class="count-plus">+</span></span>
                        <div class="count-label">{{ __('Testimonials') }}</div>
                    </div>
                    <div class="count-item">
                        <span class="count-number" data-target="3">3<span class="count-plus">+</span></span>
                        <div class="count-label">{{ __('Years of experience') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="testimonials-section section" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
        <div class="container">
            <div class="testimonials-header">
                <div class="testimonials-title">{{ __('What our clients say') }}</div>
                <div class="testimonials-subtitle">
                    {{ __('We offer a full range of care tailored to your needs.') }}
                </div>
            </div>
            <div class="testimonials-list">
                <div class="testimonial-card">
                    <div class="testimonial-bg"></div>
                    <div class="cotes">''</div>
                    <div class="testimonial-text">
                        {{ __('I was able to book my appointment online in just a few minutes.') }}
                        {{ __('The interface is clear and intuitive. Bravo for this modern and practical service!') }}
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
                        {{ __('The appointment reminders by email and SMS are a real plus.') }}
                        {{ __('It prevents me from missing my consultations, especially with my busy schedule.') }}
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
                        {{ __('Very good service! The staff is available and the organization is smooth thanks to the booking system.') }}
                        {{ __('I 100% recommend this clinic.') }}
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





    <div class="cot-services section" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
        <div class="container">
            <div class="cot-services-content">
                <div class="cot-services-header">
                    <div class="cot-services-title">{{ __('How to get our services?') }}</div>
                    <div class="cot-services-subtitle">{{ __('Just follow the steps below') }}</div>
                </div>
                <div class="cot-services-steps">
                    <div class="cot-step">
                        <a href="{{ route('prise_rdv') }}" class="cot-step-bg">
                            <img class="cot-step-icon" src="{{ asset('assets/img/prise_rdv.png') }}" alt="" />
                            <div class="cot-step-text">{{ __('Request an appointment') }}</div>
                        </a>
                    </div>
                    <a href="{{ route('prise_rdv') }}" class="cot-step">
                        <div class="cot-step-bg">
                            <img class="cot-step-icon" src="{{ asset('assets/img/consultation.png') }}"
                                alt="{{ __('Schedule the appointment') }}" />
                            <div class="cot-step-text">{{ __('Schedule the appointment') }}</div>
                        </div>
                    </a>
                    <a href="{{ route('discussions') }}" class="cot-step">
                        <div class="cot-step-bg">
                            <img class="cot-step-icon" src="{{ asset('assets/img/consult.png') }}"
                                alt="{{ __('Get yourself consulted') }}" />
                            <div class="cot-step-text">{{ __('Get yourself consulted') }}</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>




    <div class="newsletter-section section" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000">
        <div class="newsletter-bg">
            <div class="container">
                <div class="news">
                    <div class="news-info">
                        <div class="newsletter-title">{{ __('Subscribe to our newsletter') }}</div>
                        <div class="newsletter-description">
                            {{ __('Stay informed') }}<br />
                            {{ __('Our Newsletter') }}<br />
                            {{ __('Receive exclusive updates on our services, health tips, and upcoming events.') }}
                        </div>
                    </div>
                    <form class="newsletter-form" method="POST" action="{{ route('newsletter.subscribe') }}">
                        @csrf
                        <div class="newsletter-input-group">
                            <span class="newsletter-input-icon">
                                <img src="{{ asset('assets/img/email.png') }}" alt="Email" />
                            </span>
                            <input class="newsletter-input" type="email" name="email"
                                placeholder="{{ __('Your email address...') }}" required />
                            <button class="newsletter-btn" type="submit">
                                <img src="{{ asset('assets/img/send.png') }}" alt="Envoyer" />
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="partenaires-section section " data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000"
        style="    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);">

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

    <x-popup id="successModal" title="Succès " icon="assets/img/check-circle.png" buttonText="Okay">
        <p>
        <h2>Félicitations !</h2>
        <br />
        Vous avez bien été enregistré<br />
        </p>
    </x-popup>

    <x-popup id="success_deconnexion_Modal" title="Deconnexion " icon="assets/img/check-circle.png" buttonText="Okay">
        <p>
            <br />
            A très bientot !<br />
        </p>
    </x-popup>


    <x-popup id="success_connexion_Modal" title="Succès" icon="assets/img/check-circle.png" buttonText="Okay">
        <p>
        <h2>Félicitations !</h2>
        <br />
        Vous venez de vous connecter<br />
        </p>
    </x-popup>


    @if (session('registration_success'))
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                const modal = document.getElementById('successModal');
                if (modal) {
                    modal.style.display = 'flex';
                }
            });
        </script>
    @endif

    {{-- Affichage du modal de succès de déconnexion --}}
    @if (session('deconnexion_success'))
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                const modal = document.getElementById('success_deconnexion_Modal');
                if (modal) {
                    modal.style.display = 'flex';
                }
            });
        </script>
    @endif

    {{-- Affichage du modal de succès de connexion --}}

    @if (session('connexion_success'))
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                const modal = document.getElementById('success_connexion_Modal');
                if (modal) {
                    modal.style.display = 'flex';
                }
            });
        </script>
    @endif

@endsection
