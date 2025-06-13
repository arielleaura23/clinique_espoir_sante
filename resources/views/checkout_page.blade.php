@extends('layouts.app')

@section('title', 'checkout page')

@section('content')

    <main class="checkout-container">

        <div class="left-section">
                    <!-- Section Méthodes de paiement -->
        <section class="payment-methods">
            <h2 class="section-title">Informations du client</h2>

            <div class="user-group">
                <label for="nom">
                    {{-- <img src="icons/google-pay-icon.svg" alt="Google Pay"> --}}
                    <span class="label_nom">Nom <span style="color: red;">*</span></span>
                </label>
                <input class="payment-option user_info"  placeholder="Entrez votre nom" type="text" id="nom" name="nom">
            </div>

            <div class="user-group">
                <label for="adresse">
                    {{-- <img src="icons/google-pay-icon.svg" alt="Google Pay"> --}}
                    <span class="label_nom">Adresse <span style="color: red;">*</span></span>
                </label>
                <input class="payment-option user_info" type="text" placeholder="Entrez votre adresse" id="adresse" name="adresse">
            </div>

            <div class="user-group">
                <label for="phone">
                    {{-- <img src="icons/google-pay-icon.svg" alt="Google Pay"> --}}
                    <span class="label_nom">Telephone <span style="color: red;">*</span></span>
                </label>
                <input class="payment-option user_info" type="text" id="phone" placeholder="Entrez votre telephone" name="phone">
            </div>
            <div class="user-group">
                <label for="ville">
                    {{-- <img src="icons/google-pay-icon.svg" alt="Google Pay"> --}}
                    <span class="label_nom">Ville <span style="color: red;">*</span></span>
                </label>
                <input class="payment-option user_info" type="text" id="ville" placeholder="Entrez votre ville" name="ville">
            </div>
            <div class="user-group">
                <label for="quartier">
                    {{-- <img src="icons/google-pay-icon.svg" alt="Google Pay"> --}}
                    <span class="label_nom">Quartier <span style="color: red;">*</span></span>
                </label>
                <input class="payment-option user_info" type="text" placeholder="Entrez votre quartier" id="quartier" name="quartier">
            </div>


        </section>


        <!-- Section Méthodes de paiement -->
        <section class="payment-methods">
            <h2 class="section-title">Méthode de paiement</h2>

            <div class="payment-option">
                <input type="radio" id="google-pay" name="payment" checked>
                <label for="google-pay">
                    {{-- <img src="icons/google-pay-icon.svg" alt="Google Pay"> --}}
                    <span>Carte de credit</span>
                </label>
            </div>

            <div class="payment-option">
                <input type="radio" id="debit-card" name="payment">
                <label for="debit-card">
                    {{-- <img src="icons/debit-icon.svg" alt="Carte de débit"> --}}
                    <span>Paiement mobile</span>
                </label>
            </div>

            <div class="saved-cards">
                <h3>Cartes enregistrées</h3>
                <div class="card-item">
                    <input type="radio" name="saved-card" checked>
                    <div class="card-details">
                        <div class="image-bank">
                            <img src="{{ asset('assets/img/mastercard.png') }}" alt="Mastercard">
                            <p class="bank-name">Axim Bank</p>
                        </div>
                        <p class="card-number">**** 4578</p>
                    </div>
                </div>
                <div class="card-item">
                    <input type="radio" name="saved-card">
                    <div class="card-details">
                        <div class="image-bank">
                            <img src="{{ asset('assets/img/visa.png') }}" alt="Visa">
                            <p class="bank-name">HDFC Bank</p>
                        </div>
                        <p class="card-number">**** 4521</p>
                    </div>
                </div>
                <button class="add-card-btn">
                    <span>+ Ajouter une carte</span>
                </button>
            </div>

            {{-- <button class="add-method-btn">
                <span>+ Ajouter une méthode</span>
            </button> --}}
        </section>

        <section class="payment-methods">
            <h2 class="section-title">Méthode de livraison</h2>

            <div class="payment-option">
                <input type="radio" id="google-pay" name="payment" checked>
                <label for="google-pay">
                    {{-- <img src="icons/google-pay-icon.svg" alt="Google Pay"> --}}
                    <span>A la clinique</span>
                </label>
            </div>

            <div class="payment-option">
                <input type="radio" id="debit-card" name="payment">
                <label for="debit-card">
                    {{-- <img src="icons/debit-icon.svg" alt="Carte de débit"> --}}
                    <span>livraison</span>
                </label>
            </div>

        </section>
        </div>

        <!-- Section Résumé de commande -->
        <section class="order-summary">
            <div class="product-preview">
                <img src="{{ asset('assets/img/medoc4.png') }}" alt="Produit" class="product-img">
                <div class="product-details">
                    <p class="product-name">Amoxicilin 500mg</p>
                    <p class="product-price">2000 FCFA</p>
                </div>
            </div>

            {{-- <div class="promo-code">
                <label>Offres</label>
                <button class="add-code-btn">+ Ajouter un code</button>
            </div> --}}

            <div class="payment-breakdown">
                <p><span>Commande</span><span>2000 FCFA</span></p>
                <p><span>Livraison</span><span>1000 FCFA</span></p>
                <hr>
                <p class="total"><span>Total</span><span>3000 FCFA</span></p>
            </div>

            <div class="delivery-address">
                <label>Adresse</label>
                <p>Melen</p>
            </div>

            <button class="pay-now-btn">Payer maintenant</button>
        </section>
    </main>

@endsection
