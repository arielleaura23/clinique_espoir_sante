@extends('layouts.app')

@section('title', 'blog details')

@section('content')

    <x-hero title='<span class="hero-title-main">Suivez <span class="hero-title-highlight"> nos actualites!</span></span>'
        description="Restez informés sur nos activités, innovations et conseils santé." :button="view('components.bouton', [
            'icon' => 'assets/img/rdv.png',
            'slot' => 'Prendre un rdv',
            'href' => '/prise_rdv',
        ])->render()"
        mask="assets/img/exclude.png" />

    <section class="container blog-section section autoblur">

        <div class="card-article">
            <div class="image-container">
                <img src="{{ asset('assets/img/doc.png') }}" alt="Article Image" class="main-image" />
            </div>
            <div class="content">
                <div class="meta">
                    <span class="date">Lundi, 02 nov 2024</span>
                    <span class="author"><img src="{{ asset('assets/img/people.png') }}" alt="" /> By
                        Arie</span>
                    <span class="views"><img src="{{ asset('assets/img/eye.png') }}" alt="" /> 55</span>
                    <span class="likes"><img src="{{ asset('assets/img/heart.png') }}" alt="" /> 23</span>
                </div>

                <h2 class="title">La passion de redonner la santé</h2>
                <p class="description">
                    Lorem ipsum dolor sit amet consectetur. Purus neque dapibus sit viverra et urna bibendum id tellus.
                    Molestie nibh nulla eu ut nec cum viverra. Dictum enim bibendum ultrices in risus turpis accumsan.
                    Felis nunc iaculis imperdiet id quis sem maecenas sodales.
                </p>


                <div class="navigation-btn">

                    <x-bouton href="#"> <img style="width: 20px;" src="{{ asset('assets/img/navigation.png') }}"
                            alt="navigation left"></x-bouton>
                    <x-bouton href="#}"><img style="width: 20px;    transform: rotate(180deg);" src="{{ asset('assets/img/navigation.png') }}"
                            alt="navigation right"></x-bouton>
                </div>

            </div>
        </div>

        <div class="posts">
            <div class="recent-posts-container">
                <h2 class="recent-posts-title">Recent posts</h2>

                <div class="post">
                    <img src="{{ asset('assets/img/do8.png') }}" alt="Post image" class="post-img">
                    <div class="post-content">
                        <div class="post-date">Mercredi, 02 jan 2025</div>
                        <div class="post-text">Le test de VIH/SIDA<br />n’est négligé par certains</div>
                    </div>
                </div>

                <div class="post">
                    <img src="{{ asset('assets/img/do8.png') }}" alt="Post image" class="post-img">
                    <div class="post-content">
                        <div class="post-date">Mercredi, 02 jan 2025</div>
                        <div class="post-text">Le test de VIH/SIDA<br />n’est négligé par certains</div>
                    </div>
                </div>

                <div class="post">
                    <img src="{{ asset('assets/img/do8.png') }}" alt="Post image" class="post-img">
                    <div class="post-content">
                        <div class="post-date">Mercredi, 02 jan 2025</div>
                        <div class="post-text">Le test de VIH/SIDA<br />n’est négligé par certains</div>
                    </div>
                </div>

                <div class="post">
                    <img src="{{ asset('assets/img/do8.png') }}" alt="Post image" class="post-img">
                    <div class="post-content">
                        <div class="post-date">Mercredi, 02 jan 2025</div>
                        <div class="post-text">Le test de VIH/SIDA<br />n’est négligé par certains</div>
                    </div>
                </div>
            </div>

            <div class="categories-container">
                <div class="title">Catégories</div>
                <div class="category-list">
                    <div class="category-item">
                        <span class="name">Chirurgie</span>
                        <div class="badge">4</div>
                    </div>
                    <div class="category-item">
                        <span class="name">Nutrition</span>
                        <div class="badge">2</div>
                    </div>
                    <div class="category-item">
                        <span class="name">Santé</span>
                        <div class="badge">9</div>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <section class="emergency-section">
        <div class="container section">
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




    <div class="contact-section ">
        <div class="container section">
            <div class="contact-header">
                <div class="contact-title" style="width: 100%;font-size:30px;">Laissez nous un message</div>
            </div>
            <div class="contact-content">
                <form class="contact-form">
                    <div class="contact-form-group">
                        <label class="contact-label" for="contact-nom" style="color: #757575;font-size:14px;">Nom <span
                                class="required">*</span></label>
                        <input type="text" id="contact-nom" name="nom" class="contact-input"
                            style="color: #757575;font-size:14px;" required>
                    </div>
                    <div class="contact-form-group">
                        <label class="contact-label" for="contact-email" style="color: #757575;font-size:14px;">Email
                            <span class="required">*</span></label>
                        <input type="email" id="contact-email" name="email" style="color: #757575;font-size:14px;"
                            class="contact-input" required>
                    </div>
                    <div class="contact-form-group">
                        <label class="contact-label" for="contact-message" style="color: #757575;font-size:14px;">Message
                            <span class="required">*</span></label>
                        <textarea id="contact-message" name="message" style="color: #757575;font-size:14px;" class="contact-input"
                            rows="5" required></textarea>
                    </div>
                    <button type="submit" class="contact-submit-btn">Envoyer</button>
                </form>
            </div>
        </div>
    </div>






@endsection
