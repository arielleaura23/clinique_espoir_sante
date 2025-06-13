@extends('layouts.app')

@section('title', 'pharmacie')

@section('content')

    <x-hero
        title='<span class="hero-title-main">Votre santé<span class="hero-title-highlight"> notre priorité au quotidien!</span></span>'
        description="Réservez facilement vos rendez-vous médicaux en ligne, avec des médecins qualifiés et disponibles."
        mask="assets/img/exclude.png" photo="assets/img/medoc2.png" />


    <div class="pharmacy-section section autoblur" data-aos="fade-up">
        <div class="container">
            <div class="pharmacy-header">
                <div class="pharmacy-header-title">Tous nos médicaments</div>
                <div class="pharmacy-header-desc">
                    Nous vous offrons une large gamme de médicaments
                </div>
                <div class="pharmacy-search-bar">
                    <input type="text" class="pharmacy-search-input" placeholder="Rechercher un médicament">
                    <button class="pharmacy-search-btn">
                        <img src="{{ asset('assets/img/search.png') }}" alt="Rechercher" />
                    </button>
                </div>
            </div>
            <div class="pharmacy-products-grid">
                <div class="pharmacy-product-card">
                    <div class="pharmacy-product-img-wrapper">
                        <a href="{{ route('product_details') }}" class="pharmacy-img-link">
                            <img class="pharmacy-product-img" src="{{ asset('assets/img/medoc3.png') }}"
                                alt="Amoxicilin 500 mg" />
                            <div class="pharmacy-overlay">
                                <span>Voir produit</span>
                            </div>
                        </a>
                    </div>
                    <div class="pharmacy-product-info">
                        <div class="pharmacy-product-title">Amoxicilin 500 mg</div>
                        <div class="pharmacy-product-status in-stock">En stock</div>
                        <div class="pharmacy-product-price">2000 FCFA</div>
                        <x-bouton icon="{{asset('assets/img/cart-add.png')}}">Ajouter</x-bouton>
                    </div>
                </div>

                <div class="pharmacy-product-card">
                                        <div class="pharmacy-product-img-wrapper">
                        <a href="{{ route('product_details') }}" class="pharmacy-img-link">
                            <img class="pharmacy-product-img" src="{{ asset('assets/img/medoc4.png') }}"
                                alt="Amoxicilin 500 mg" />
                            <div class="pharmacy-overlay">
                                <span>Voir produit</span>
                            </div>
                        </a>
                    </div>
                    <div class="pharmacy-product-info">
                        <div class="pharmacy-product-title">Amoxicilin 500 mg</div>
                        <div class="stock">
                            <div class="pharmacy-product-status out-of-stock">
                                En rupture
                            </div>
                            <img src="{{ asset('assets/img/bell.png') }}" alt="Prévenir du restockage"
                                class="pharmacy-bell-icon" title="Prévenir du restockage" />
                        </div>
                        <div class="pharmacy-product-price">2000 FCFA</div>
                        <x-bouton icon="{{asset('assets/img/cart-add.png')}}">Ajouter</x-bouton>
                    </div>
                </div>
                <div class="pharmacy-product-card">
                    <div class="pharmacy-product-img-wrapper">
                        <a href="{{ route('product_details') }}" class="pharmacy-img-link">
                            <img class="pharmacy-product-img" src="{{ asset('assets/img/medoc5.png') }}"
                                alt="Amoxicilin 500 mg" />
                            <div class="pharmacy-overlay">
                                <span>Voir produit</span>
                            </div>
                        </a>
                    </div>
                    <div class="pharmacy-product-info">
                        <div class="pharmacy-product-title">Amoxicilin 500 mg</div>
                        <div class="pharmacy-product-status in-stock">En stock</div>
                        <div class="pharmacy-product-price">2000 FCFA</div>
                        <x-bouton icon="{{asset('assets/img/cart-add.png')}}">Ajouter</x-bouton>
                    </div>
                </div>
                <div class="pharmacy-product-card">
                    <div class="pharmacy-product-img-wrapper">
                        <a href="{{ route('product_details') }}" class="pharmacy-img-link">
                            <img class="pharmacy-product-img" src="{{ asset('assets/img/medoc3.png') }}"
                                alt="Amoxicilin 500 mg" />
                            <div class="pharmacy-overlay">
                                <span>Voir produit</span>
                            </div>
                        </a>
                    </div>
                    <div class="pharmacy-product-info">
                        <div class="pharmacy-product-title">Amoxicilin 500 mg</div>
                        <div class="pharmacy-product-status in-stock">En stock</div>
                        <div class="pharmacy-product-price">2000 FCFA</div>
                        <x-bouton icon="{{asset('assets/img/cart-add.png')}}">Ajouter</x-bouton>
                    </div>
                </div>
                <div class="pharmacy-product-card">
                    <div class="pharmacy-product-img-wrapper">
                        <a href="{{ route('product_details') }}" class="pharmacy-img-link">
                            <img class="pharmacy-product-img" src="{{ asset('assets/img/medoc4.png') }}"
                                alt="Amoxicilin 500 mg" />
                            <div class="pharmacy-overlay">
                                <span>Voir produit</span>
                            </div>
                        </a>
                    </div>
                    <div class="pharmacy-product-info">
                        <div class="pharmacy-product-title">Amoxicilin 500 mg</div>
                        <div class="stock">
                            <div class="pharmacy-product-status out-of-stock">
                                En rupture
                            </div>
                            <img src="{{ asset('assets/img/bell.png') }}" alt="Prévenir du restockage"
                                class="pharmacy-bell-icon" title="Prévenir du restockage" />
                        </div>
                        <div class="pharmacy-product-price">2000 FCFA</div>
                        <x-bouton icon="{{asset('assets/img/cart-add.png')}}">Ajouter</x-bouton>
                    </div>
                </div>
                <div class="pharmacy-product-card">
                    <div class="pharmacy-product-img-wrapper">
                        <a href="{{ route('product_details') }}" class="pharmacy-img-link">
                            <img class="pharmacy-product-img" src="{{ asset('assets/img/medoc5.png') }}"
                                alt="Amoxicilin 500 mg" />
                            <div class="pharmacy-overlay">
                                <span>Voir produit</span>
                            </div>
                        </a>
                    </div>
                    <div class="pharmacy-product-info">
                        <div class="pharmacy-product-title">Amoxicilin 500 mg</div>
                        <div class="pharmacy-product-status in-stock">En stock</div>
                        <div class="pharmacy-product-price">2000 FCFA</div>
                        <x-bouton icon="{{asset('assets/img/cart-add.png')}}">Ajouter</x-bouton>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection
