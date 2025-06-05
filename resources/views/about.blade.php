@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

    <x-hero title='<span class="hero-title-main">Venez<span class="hero-title-highlight"> consulter chez nous!</span></span>'
        description="Réservez facilement vos rendez-vous médicaux en ligne, avec des médecins qualifiés et disponibles."
        :button="view('components.bouton', [
            'icon' => 'assets/img/rdv.png',
            'slot' => 'Prendre un rdv',
            'href' => '/prise_rdv',
        ])->render()" mask="assets/img/exclude.png" photo="assets/img/medoc1.png" />


    <x-about />


    <div class="container">
        <div class="about-history-section section">

            <div class="history-content">
                <div class="about-history-text">
                    La Clinique Espoir santé est un établissement médical privé, fondé en 2012 dans
                    le but de répondre efficacement aux besoins croissants en soins de santé de
                    qualité dans la ville de Douala. Elle est née d’un partenariat entre des
                    professionnels de santé camerounais et des investisseurs privés engagés dans
                    l’amélioration du système de soins local. La construction de la clinique a
                    été entièrement financée sur fonds propres à hauteur de 2 milliards de
                    francs CFA, avec le soutien technique de partenaires médicaux
                    internationaux.
                    <br />
                    <br />
                    <br />
                    Située dans le quartier Mendong, la clinique a ouvert ses portes au
                    public en janvier 2014, après deux ans de travaux. Elle bénéficie
                    aujourd’hui d’une reconnaissance croissante pour la qualité de ses services,
                    sa rigueur médicale et son approche centrée sur le bien-être du patient.
                    <br />
                    <br />
                    <br />
                    Aujourd’hui, elle poursuit sa mission avec détermination : réduire les
                    évacuations sanitaires à l’étranger en proposant localement des soins de
                    qualité répondant aux standards internationaux.
                </div>
                <div class="history-block">
                    <div class="about-history-title">Notre historique</div>
                    <img class="about-history-image" src="{{ asset('assets/img/historique.png') }}"
                        alt="Photo historique Clinique" />
                </div>
            </div>

        </div>
    </div>



    <div class="container section">
        <div class="qualified-doctors-section">
            <div class="qualified-doctors-header">
                <div class="qualified-doctors-title">Nos médecins qualifiés</div>
                <div class="qualified-doctors-description">
                    Notre équipe médicale est composée de professionnels passionnés,
                    expérimentés et à l’écoute. Chacun de nos médecins est diplômé, spécialisé
                    dans son domaine, et s’engage à offrir des soins de qualité dans le
                    respect, la confidentialité et la bienveillance. Grâce à leur expertise et
                    à leur dévouement, vous êtes entre de bonnes mains pour un suivi
                    personnalisé et efficace.
                </div>
            </div>
            <div class="qualified-doctors-photos">
                <div class="qualified-doctors-row" style="margin-top: -100px;">
                    <img class="doctor-photo" src="{{ asset('assets/img/doctor2.png') }}" alt="Médecin 1" />
                    <img class="doctor-photo" src="{{ asset('assets/img/doctor3.png') }}" alt="Médecin 2" />
                </div>
                <div class="qualified-doctors-row">
                    <img class="doctor-photo" src="{{ asset('assets/img/doctor4.png') }}" alt="Médecin 3" />
                    <img class="doctor-photo" src="{{ asset('assets/img/doctor5.png') }}" alt="Médecin 4" />
                </div>
            </div>
        </div>
    </div>


    <div class="container section">
        <div class="director-message-section">
            <div class="director-message-content">
                <div class="director-message-title">Mot du directeur général</div>
                <div class="director-message-text">
                    <span>
                        Chers collaborateurs, chers partenaires,
                        <br />
                        C’est avec un engagement renouvelé que nous entamons une nouvelle ère pour la Clinique Espoir santé.
                        Depuis
                        sa création, notre mission a toujours été claire : offrir des soins de qualité, accessibles et
                        centrés
                        sur l’humain. Aujourd’hui, nous franchissons une étape décisive pour renforcer notre position en
                        tant
                        que structure de santé de référence au Cameroun.
                        <br />
                        Le 15 mai 2025, j’ai eu l’honneur de lancer officiellement notre programme de modernisation,
                        d’extension
                        et d’amélioration continue de nos services. Cette initiative s’inscrit dans une vision claire :
                        faire de
                        la Clinique Santé+ un pôle d’excellence médicale, reconnu pour la rigueur de ses soins, la qualité
                        de
                        son accueil et l’innovation dans la pratique clinique.
                        <br /><br />
                        Pour y parvenir, nous avons identifié plusieurs axes stratégiques :
                        <ul class="director-message-list">
                            <li>La modernisation de notre plateau technique, pour rester à la pointe des standards
                                internationaux.</li>
                            <li>Le renforcement de la qualité des soins, avec des protocoles actualisés et centrés sur le
                                patient.</li>
                            <li>La valorisation du personnel médical et paramédical, en misant sur la formation continue,
                                l’écoute et la motivation.</li>
                            <li>L’amélioration de nos infrastructures, afin d’offrir un environnement propice au bien-être
                                et à
                                la guérison.</li>
                        </ul>
                        Nous lançons également une réorganisation interne de nos services avec la création de nouvelles
                        unités
                        spécialisées, notamment en gynécologie avancée, cardiologie, endocrinologie et prise en charge des
                        urgences pédiatriques. L’objectif est clair : répondre aux besoins spécifiques de notre population
                        avec
                        expertise et proximité.
                        <br />
                        J’insiste sur un point fondamental : l’hygiène et la propreté de notre établissement sont les
                        fondations
                        d’une médecine sûre. Veillons tous, chaque jour, à respecter et renforcer cet engagement.
                        <br /><br />
                        Je suis convaincue qu’avec votre professionnalisme, votre engagement et votre passion, nous allons
                        bâtir
                        ensemble une clinique exemplaire, au service de la vie et de l’espoir.
                        <br />
                        Je compte sur vous.
                        <br />
                        <strong>Dr. Diane Mbarga</strong>
                        <br />
                        Directrice Générale de la Clinique Espoir santé
                    </span>
                </div>
            </div>
        </div>
    </div>






@endsection
