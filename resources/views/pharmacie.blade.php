@extends('layouts.app')

@section('title', 'pharmacie')

@section('content')

<x-hero
    title='<span class="hero-title-main">Votre santé<span class="hero-title-highlight"> notre priorité au quotidien!</span></span>'
    description="Réservez facilement vos rendez-vous médicaux en ligne, avec des médecins qualifiés et disponibles."
    mask="assets/img/exclude.png" photo="assets/img/medoc2.png" />

<div class="pharmacy-section">
    <div class="pharmacy-header">
        <div class="pharmacy-header-title">Tous nos médicaments</div>
        <div class="pharmacy-header-desc">
            Nous vous offrons une large gamme de médicaments
        </div>
        <div class="pharmacy-search-bar">
            <input type="text" class="pharmacy-search-input" placeholder="Rechercher un médicament">
            <button class="pharmacy-search-btn">
                <img src="material-symbols-search0.svg" alt="Rechercher" />
            </button>
        </div>
    </div>
    <div class="pharmacy-products-grid">
        <div class="pharmacy-product-card">
            <img class="pharmacy-product-img" src="{{asset('assets/img/medoc3.png')}}" alt="Amoxicilin 500 mg" />
            <div class="pharmacy-product-info">
                <div class="pharmacy-product-title">Amoxicilin 500 mg</div>
                <div class="pharmacy-product-status in-stock">En stock</div>
                <div class="pharmacy-product-price">2000 FCFA</div>
                <button class="pharmacy-product-buy-btn">Acheter</button>
            </div>
        </div>
        <div class="pharmacy-product-card">
            <img class="pharmacy-product-img" src="{{asset('assets/img/medoc4.png')}}" alt="Amoxicilin 500 mg" />
            <div class="pharmacy-product-info">
                <div class="pharmacy-product-title">Amoxicilin 500 mg</div>
                <div class="pharmacy-product-status out-of-stock">En rupture</div>
                <div class="pharmacy-product-price">2000 FCFA</div>
                <button class="pharmacy-product-buy-btn">Acheter</button>
            </div>
        </div>
        <div class="pharmacy-product-card">
            <img class="pharmacy-product-img" src="{{asset('assets/img/medoc5.png')}}" alt="Amoxicilin 500 mg" />
            <div class="pharmacy-product-info">
                <div class="pharmacy-product-title">Amoxicilin 500 mg</div>
                <div class="pharmacy-product-status in-stock">En stock</div>
                <div class="pharmacy-product-price">2000 FCFA</div>
                <button class="pharmacy-product-buy-btn">Acheter</button>
            </div>
        </div>
        <div class="pharmacy-product-card">
            <img class="pharmacy-product-img" src="{{asset('assets/img/medoc3.png')}}" alt="Amoxicilin 500 mg" />
            <div class="pharmacy-product-info">
                <div class="pharmacy-product-title">Amoxicilin 500 mg</div>
                <div class="pharmacy-product-status in-stock">En stock</div>
                <div class="pharmacy-product-price">2000 FCFA</div>
                <button class="pharmacy-product-buy-btn">Acheter</button>
            </div>
        </div>
        <div class="pharmacy-product-card">
            <img class="pharmacy-product-img" src="{{asset('assets/img/medoc4.png')}}" alt="Amoxicilin 500 mg" />
            <div class="pharmacy-product-info">
                <div class="pharmacy-product-title">Amoxicilin 500 mg</div>
                <div class="pharmacy-product-status out-of-stock">En rupture</div>
                <div class="pharmacy-product-price">2000 FCFA</div>
                <button class="pharmacy-product-buy-btn">Acheter</button>
            </div>
        </div>
        <div class="pharmacy-product-card">
            <img class="pharmacy-product-img" src="{{asset('assets/img/medoc5.png')}}" alt="Amoxicilin 500 mg" />
            <div class="pharmacy-product-info">
                <div class="pharmacy-product-title">Amoxicilin 500 mg</div>
                <div class="pharmacy-product-status in-stock">En stock</div>
                <div class="pharmacy-product-price">2000 FCFA</div>
                <button class="pharmacy-product-buy-btn">Acheter</button>
            </div>
        </div>


    </div>
</div>

@endsection
