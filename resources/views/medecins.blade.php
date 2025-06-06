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
        ])->render()" mask="assets/img/exclude.png" />




    <section class="nos-medecins">
        <div class="container section">
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



    <div class="container section">
        <section class="emergency-section">
            <div class="emergency-box">
                <div class="blue-box"></div>

                <div class="emergency-title">
                    Interventions d’urgence médicales
                </div>

                <div class="emergency-description">
                    Appelez-nous sans hésiter si vous avez besoin d&#039;assistance immédiate
                    ou si vous êtes témoin d&#039;une situation urgente.
                </div>

                <div class="emergency-phone">(237) 655-41-88-41</div>

                <div class="call-icon-group">
                    <div class="white-circle"></div>
                    <img class="call-icon" src="{{asset('assets/img/phone.png')}}" alt="Appel d'urgence" />
                </div>
            </div>

            <div class="priority-title">
                Votre santé est notre priorité
            </div>

            <div class="priority-text">
                En cas d&#039;urgence, chaque seconde compte. Notre équipe médicale est
                disponible 24h/24 et 7j/7 pour vous apporter une prise en charge rapide,
                efficace et humaine, dans les moments où vous en avez le plus besoin.
            </div>
        </section>

    </div>


{{-- <div class="contact-section">
  <div class="contact-header">
    <div class="contact-title">Contact</div>
  </div>

  <div class="contact-cards">
    <!-- Carte Emergency -->
    <div class="contact-card">
      <div class="card-bg-blue"></div>
      <div class="contact-info">
        <div class="contact-label">Emergency</div>
        <div class="contact-text">(237) 655-41-88=41</div>
      </div>
    </div>

    <!-- Carte Adresse -->
    <div class="contact-card">
      <div class="card-bg-darkblue"></div>
      <div class="contact-info">
        <div class="contact-label">Address</div>
        <div class="contact-text">Menndong</div>
        <div class="contact-text">Yaounde,Cameroun</div>
      </div>
    </div>

    <!-- Carte Email -->
    <div class="contact-card">
      <div class="card-bg-blue"></div>
      <div class="contact-info">
        <div class="contact-label">Email</div>
        <div class="contact-text">abomoarielle@gmail.com</div>
        <img class="contact-icon" src="component0.svg" />
      </div>
    </div>

    <!-- Carte Emploi du temps -->
    <div class="contact-card">
      <div class="card-bg-blue"></div>
      <div class="contact-info">
        <div class="contact-label">Emploi de temps</div>
        <div class="contact-text">08:00-20:00</div>
        <div class="contact-text">Tous les jours</div>
      </div>
    </div>

    <!-- Icônes -->
    <img class="icon-phone" src="tdesign-call-10.svg" />

    <div class="icon-time">
      <img class="icon-inner" src="group0.svg" />
    </div>

    <div class="icon-location">
      <img class="icon-inner" src="group1.svg" />
    </div>
  </div>
</div> --}}








@endsection
