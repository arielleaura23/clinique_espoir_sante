@extends('layouts.app')

@section('title', 'guide patient')

@section('content')

    <x-hero title='<span class="hero-title-main">Venez<span class="hero-title-highlight"> consulter chez nous!</span></span>'
        description="Réservez facilement vos rendez-vous médicaux en ligne, avec des médecins qualifiés et disponibles."
        :button="view('components.bouton', [
            'icon' => 'assets/img/rdv.png',
            'slot' => 'Prendre un rdv',
            'href' => '/prise_rdv',
        ])->render()" mask="assets/img/exclude.png" photo="assets/img/guide.png" />




    <div class="container section autoblur">
        <div class="before-consultation-section " data-aos="flip-up" data-aos-easing="linear" data-aos-duration="800">
            <div class="before-consultation-header">
                <div class="before-consultation-title">Avant votre consultation</div>
                <div class="before-consultation-subtitle">
                    Documents à apprêter avant la consultation
                </div>
            </div>
            <div class="before-consultation-list">
                <div class="before-consultation-item">
                    <div class="before-consultation-item-number">1</div>
                    <hr class="before-consultation-item-divider">
                    <div class="before-consultation-item-title">Carte nationale d’identité</div>
                    <div class="before-consultation-item-desc">
                        Pièce requise pour une identification précise. Elle permet la création d’un identifiant personnel et
                        assure une gestion rigoureuse et sécurisée de votre dossier médical.
                    </div>
                </div>
                <div class="before-consultation-item">
                    <div class="before-consultation-item-number">2</div>
                    <hr class="before-consultation-item-divider">
                    <div class="before-consultation-item-title">Vos anciens documents médicaux (si vous en disposez)</div>
                    <div class="before-consultation-item-desc">
                        Ces documents permettent au médecin d’avoir un historique de vos soins et d’optimiser votre prise en
                        charge.
                    </div>
                </div>
                <div class="before-consultation-item">
                    <div class="before-consultation-item-number">3</div>
                    <hr class="before-consultation-item-divider">
                    <div class="before-consultation-item-title">Carnet de santé</div>
                    <div class="before-consultation-item-desc">
                        Document recommandé pour toute visite médicale. Il permet au praticien de suivre l’évolution de
                        votre état de santé et de maintenir une continuité optimale dans vos soins.
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container section autoblur">
        <div class="at-clinic-section">
            <div class="at-clinic-header">
                <div class="at-clinic-title">À la clinique</div>
                <div class="at-clinic-subtitle">
                    À votre arrivée dans notre établissement, voici ce que vous devez faire
                </div>
            </div>
            <div class="at-clinic-steps">
                <div class="at-clinic-step" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                    <div class="at-clinic-step-icon">
                        <img src="{{asset('assets/img/person.png')}}" alt="Arrivée et orientation" />
                    </div>
                    <div class="at-clinic-step-content" >
                        <div class="at-clinic-step-title">Arrivée et orientation</div>
                        <div class="at-clinic-step-desc">
                            Dès votre arrivée à la clinique, notre équipe de sécurité vous accueille et vous oriente vers le
                            point d’accueil principal. Sur place, notre personnel d’orientation vous informe et vous guide
                            vers le service concerné, selon votre motif de visite.
                        </div>
                    </div>
                </div>
                <div class="at-clinic-step" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                    <div class="at-clinic-step-icon">
                        <img src="{{asset('assets/img/enregister.png')}}" alt="Enregistrement" />
                    </div>
                    <div class="at-clinic-step-content" >
                        <div class="at-clinic-step-title">Enregistrement</div>
                        <div class="at-clinic-step-desc">
                            L’enregistrement peut se faire à l’avance en ligne ou directement à la clinique. Si vous vous
                            êtes enregistré en ligne, un numéro d’identification vous aura été attribué à l’avance. À votre
                            arrivée, il vous suffira de vous présenter et d’attendre l’appel de votre numéro pour finaliser
                            les formalités (vérification des informations, paiement éventuel du carnet et des frais de
                            consultation). Si vous vous enregistrez sur place, un numéro de passage vous sera remis. Une
                            fois appelé, vous serez invité à créer votre dossier patient en fournissant les documents
                            nécessaires.
                        </div>
                    </div>
                </div>
                <div class="at-clinic-step" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                    <div class="at-clinic-step-icon">
                        <img src="{{asset('assets/img/temperature.png')}}" alt="Prise des constantes médicales" />
                    </div>
                    <div class="at-clinic-step-content" >
                        <div class="at-clinic-step-title">Prise des constantes médicales</div>
                        <div class="at-clinic-step-desc">
                            Une fois l’enregistrement complété, vous serez dirigé vers l’espace dédié à la prise des
                            paramètres de base : tension artérielle, température corporelle, poids, etc. Ces premières
                            données permettront au professionnel de santé d’avoir une vue d’ensemble de votre état et de
                            mieux orienter la consultation.
                        </div>
                    </div>
                </div>
                <div class="at-clinic-step" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                    <div class="at-clinic-step-icon">
                        <img src="{{asset('assets/img/prise_rdv.png')}}" alt="Consultation médicale" />
                    </div>
                    <div class="at-clinic-step-content" >
                        <div class="at-clinic-step-title">Consultation médicale</div>
                        <div class="at-clinic-step-desc">
                            Dès que vos constantes vitales ont été enregistrées, vous serez invité à rejoindre le cabinet du
                            médecin. Ce dernier prendra en compte les informations recueillies pour mener une évaluation
                            complète de votre état de santé, poser un diagnostic précis et vous proposer une prise en charge
                            personnalisée.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <div class="cot-services section autoblur" data-aos="fade-down-right" data-aos-easing="linear" data-aos-duration="1000">
        <div class="container">
            <div class="cot-services-content">
                <div class="cot-services-header">
                    <div class="cot-services-title">Comment avoir nos services?</div>
                    <div class="cot-services-subtitle">Suivez juste les étapes suivantes</div>
                </div>
                <div class="cot-services-steps">
                    <div class="cot-step">
                        <div class="cot-step-bg">
                            <img class="cot-step-icon" src="{{ asset('assets/img/prise_rdv.png') }}" alt="" />
                            <div class="cot-step-text">Demander un <br> rendez-vous</div>
                        </div>
                    </div>
                    <div class="cot-step">
                        <div class="cot-step-bg">
                            <img class="cot-step-icon" src="{{ asset('assets/img/consultation.png') }}"
                                alt="Caler le rendez-vous" />
                            <div class="cot-step-text">
                                Caler le<br />rendez-vous
                            </div>
                        </div>
                    </div>
                    <div class="cot-step">
                        <div class="cot-step-bg">
                            <img class="cot-step-icon" src="{{ asset('assets/img/consult.png') }}" alt="" />
                            <div class="cot-step-text">
                                Fais toi<br />consulter
                            </div>
                        </div>

                    </div>
                </div>
                {{-- <div class="cot-services-icons">
                        <img class="cot-services-calendar" src="group0.svg" alt="Calendrier" />
                        <img class="cot-services-appointment" src="lsicon-work-order-appointment-filled0.svg"
                            alt="Consultation" />
                    </div> --}}
            </div>
        </div>
    </div>







@endsection
