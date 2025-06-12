@extends('layouts.app')

@section('title', 'medecins')

@section('content')

    <x-hero
        title='<span class="hero-title-main">Rencontre <span class="hero-title-highlight"> nos specialistes!</span></span>'
        description="Notre équipe de spécialistes vous accompagne tout au long de votre parcours de santé, en vous proposant une écoute attentive, des conseils sur mesure et des traitements parfaitement adaptés à vos besoins."
        :button="view('components.bouton', [
            'icon' => 'assets/img/rdv.png',
            'slot' => 'Prendre un rdv',
            'href' => '/prise_rdv',
        ])->render()" mask="assets/img/exclude.png" photo="assets/img/medecin.png" />




    <section class="nos-medecins section autoblur" data-aos="fade-down">
        <div class="container">
            <div class="doctors-content">
                <div class="before-consultation-header">
                    <div class="before-consultation-title">Un accompagnement médical personnalisé</div>
                    <div class="before-consultation-subtitle">
                        Parce que chaque patient est unique, nous adaptons nos soins à vos besoins.
                    </div>
                </div>
                <div class="doctors">

                    <div class="doctor-card">
                        <img src="{{ asset('assets/img/doctor7.png') }}" alt="Dr Tetio">
                        <h3>Dr Tetio</h3>
                        <p class="specialty">Pédiatre</p>
                    </div>

                    <div class="doctor-card">
                        <img src="{{ asset('assets/img/doctor7.png') }}" alt="Dr Tankeu">
                        <h3>Dr Tankeu</h3>
                        <p class="specialty">Cardiologue</p>
                    </div>

                    <div class="doctor-card">
                        <img src="{{ asset('assets/img/doctor7.png') }}" alt="Dr Tchienkoua">
                        <h3>Dr Tchienkoua</h3>
                        <p class="specialty">Généraliste</p>
                    </div>
                    <div class="doctor-card">
                        <img src="{{ asset('assets/img/doctor7.png') }}" alt="Dr Tetio">
                        <h3>Dr Tetio</h3>
                        <p class="specialty">Pédiatre</p>
                    </div>

                    <div class="doctor-card">
                        <img src="{{ asset('assets/img/doctor7.png') }}" alt="Dr Tankeu">
                        <h3>Dr Tankeu</h3>
                        <p class="specialty">Cardiologue</p>
                    </div>

                    <div class="doctor-card">
                        <img src="{{ asset('assets/img/doctor7.png') }}" alt="Dr Tchienkoua">
                        <h3>Dr Tchienkoua</h3>
                        <p class="specialty">Généraliste</p>
                    </div>

                </div>
            </div>

        </div>
    </section>




    <section class="emergency-section section">
        <div class="container">
            <div class="emergency-box">
                <div class="white-box">
                    <div class="priority-title">
                        Votre santé est notre priorité
                    </div>

                    <div class="priority-text">
                        En cas d&#039;urgence, chaque seconde compte. Notre équipe médicale est
                        disponible 24h/24 et 7j/7 pour vous apporter une prise en charge rapide,
                        efficace et humaine, dans les moments où vous en avez le plus besoin.
                    </div>
                </div>
                <div class="blue-box">
                    <div class="emergency-title">
                        Interventions d’urgence médicales
                    </div>

                    <div class="emergency-description">
                        Appelez-nous sans hésiter si vous avez besoin d&#039;assistance immédiate
                        ou si vous êtes témoin d&#039;une situation urgente.
                    </div>



                    <div class="call-icon-group">
                        <div class="white-circle">
                            <img class="call-icon" src="{{ asset('assets/img/phone.png') }}" alt="Appel d'urgence" />
                        </div>

                        <div class="call-number">
                            <div class="emergency-phone">(237) 655-41-88-41</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </section>


    <section class="partners section">
        <div class="before-consultation-header">
            <div class="before-consultation-title">Partenaires</div>
        </div>
        <div class="partenaires-section" style="    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);">

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
    </section>


    <div class="container section">
        <div class="contact-section">
            <div class="before-consultation-header">
                <div class="before-consultation-title">Contact</div>
            </div>

            <div class="contact-cards">
                <!-- Carte Emergency -->
                <div class="contact-card">
                    <div class="card-bg-blue">
                        <div class="contact-info">
                            <img class="contact-icon" src="{{ asset('assets/img/phone_sky_blue.png') }}" />
                            <div class="contact-label">Emergency</div>
                            <div class="contact-text">(237) 655-41-88-41</div>

                        </div>
                    </div>
                </div>

                <!-- Carte Adresse -->
                <div class="contact-card">
                    <div class="card-bg-blue card-bg-darkblue">
                        <div class="contact-info">
                            <img class="contact-icon" src="{{ asset('assets/img/location_blue.png') }}" />
                            <div class="contact-label">Address</div>
                            <div class="contact-text">Mendong</div>
                            <div class="contact-text">Yaounde,Cameroun</div>
                        </div>
                    </div>

                </div>

                <!-- Carte Email -->
                <div class="contact-card">
                    <div class="card-bg-blue">
                        <div class="contact-info">
                            <img class="contact-icon" src="{{ asset('assets/img/email_sky_blue.png') }}" />
                            <div class="contact-label">Email</div>
                            <div class="contact-text">abomoarielle@gmail.com</div>

                        </div>
                    </div>

                </div>

                <!-- Carte Emploi du temps -->
                <div class="contact-card">
                    <div class="card-bg-blue">
                        <div class="contact-info">
                            <img class="contact-icon" src="{{ asset('assets/img/time_sky_blue.png') }}" />
                            <div class="contact-label">Emploi de temps</div>
                            <div class="contact-text">08:00-20:00</div>
                            <div class="contact-text">Tous les jours</div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>









@endsection
