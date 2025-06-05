@extends('layouts.app')

@section('title', 'contact')

@section('content')

    <x-hero title='<span class="hero-title-main">Contactez<span class="hero-title-highlight"> - nous!</span></span>'
        description="Une question ? Un besoin ? Nous sommes à votre écoute." :button="view('components.bouton', [
            'icon' => 'assets/img/phone_white.png',
            'slot' => 'Appeler la clinique',
            'href' => '#',
        ])->render()"
        mask="assets/img/exclude.png" />

    <div class="contact-section ">
        <div class="container section">
            <div class="contact-header">
                <div class="contact-title">Formulaire de contact</div>
                <div class="contact-desc">
                    Un formulaire simple et accessible pour envoyer un message directement à la clinique.
                </div>
            </div>
            <div class="contact-content">
                <div class="image-contact">
                    <img class="contact-bg-img" src="{{ asset('assets/img/doc6.png') }}" alt="doctor" />
                </div>
                <form class="contact-form">
                    <div class="contact-form-group">
                        <label class="contact-label" for="contact-nom">Nom <span class="required">*</span></label>
                        <input type="text" id="contact-nom" name="nom" class="contact-input" required>
                    </div>
                    <div class="contact-form-group">
                        <label class="contact-label" for="contact-email">Email <span class="required">*</span></label>
                        <input type="email" id="contact-email" name="email" class="contact-input" required>
                    </div>
                    <div class="contact-form-group">
                        <label class="contact-label" for="contact-message">Message <span class="required">*</span></label>
                        <textarea id="contact-message" name="message" class="contact-input" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="contact-submit-btn">Envoyer</button>
                </form>
            </div>
        </div>
    </div>

@endsection
