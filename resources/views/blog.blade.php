@extends('layouts.app')

@section('title', 'blog')

@section('content')

    <x-hero title='<span class="hero-title-main">Suivez <span class="hero-title-highlight"> nos actualites!</span></span>'
        description="Restez informés sur nos activités, innovations et conseils santé." :button="view('components.bouton', [
            'icon' => 'assets/img/rdv.png',
            'slot' => 'Prendre un rdv',
            'href' => '/prise_rdv',
        ])->render()"
        mask="assets/img/exclude.png" />

    <section class="container blog-section section">

        <div class="articles">
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

                    <x-bouton href="{{ route('blog_details') }}">Lire plus</x-bouton>

                </div>
            </div>
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

                    <x-bouton href="{{ route('blog_details') }}">Lire plus</x-bouton>

                </div>
            </div>
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

                    <x-bouton href="{{ route('blog_details') }}">Lire plus</x-bouton>

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






@endsection
