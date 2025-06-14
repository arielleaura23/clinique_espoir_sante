@extends('layouts.app')

@section('title', 'checkout page')

@section('content')

    <div class="container">
        <div class="checkout-container">
            <div class="left-section">
                <!-- Section Informations du client -->
                <section class="payment-methods">
                    <h2 class="section-title">Informations du client</h2>

                    <form class="checkout-form-grid">
                        <div class="form-group">
                            <label for="nom" class="form-label">
                                Nom <span class="required">*</span>
                            </label>
                            <input class="form-input" placeholder="Entrez votre nom" type="text" id="nom"
                                name="nom">
                        </div>
                        <div class="form-group">
                            <label for="adresse" class="form-label">
                                Adresse <span class="required">*</span>
                            </label>
                            <input class="form-input" type="text" placeholder="Entrez votre adresse" id="adresse"
                                name="adresse">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-label">
                                Téléphone <span class="required">*</span>
                            </label>
                            <input class="form-input" type="text" id="phone" placeholder="Entrez votre téléphone"
                                name="phone">
                        </div>
                        <div class="form-group">
                            <label for="ville" class="form-label">
                                Ville <span class="required">*</span>
                            </label>
                            <input class="form-input" type="text" id="ville" placeholder="Entrez votre ville"
                                name="ville">
                        </div>
                        <div class="form-group">
                            <label for="quartier" class="form-label">
                                Quartier <span class="required">*</span>
                            </label>
                            <input class="form-input" type="text" placeholder="Entrez votre quartier" id="quartier"
                                name="quartier">
                        </div>
                    </form>


                </section>

                <!-- Section Méthodes de paiement -->
                <section class="payment-methods">
                    <h2 class="section-title">Méthode de paiement</h2>
                    <div class="payment-option">
                        <input type="radio" id="credit-card" name="payment" >
                        <label for="credit-card">
                            <img src="{{ asset('assets/img/credit_card.png') }}" alt="Carte de crédit" style="width:24px;">
                            <span>Carte de crédit</span>
                        </label>


                    </div>

<!-- Champs carte bancaire affichés seulement si carte cochée -->
<div class="card-fields" style="display:block;">
    <!-- Bloc type de carte à cacher/afficher -->
    <div class="card-type-fields" style="display:none;">
        <div class="user-group">
            <label for="card-type"><span class="label_nom">Type de carte <span style="color: red;">*</span></span></label>
            <select class="payment-option user_info" id="card-type">
                <option value="">Sélectionnez</option>
                <option value="visa">Visa</option>
                <option value="mastercard">Mastercard</option>
                <option value="amex">American Express</option>
            </select>
        </div>
    </div>
    <!-- Champs détails carte, cachés tant qu'aucun type n'est choisi -->
    <div class="card-details-fields" style="display:none;">
        <div class="user-group">
            <label for="card-number"><span class="label_nom">Numéro de carte <span style="color: red;">*</span></span></label>
            <input class="payment-option user_info" type="text" id="card-number" placeholder="Numéro de carte">
        </div>
        <div class="user-group" style="display:flex;gap:10px;">
            <div>
                <label for="card-expiry"><span class="label_nom">Expiration *</span></label>
                <input class="payment-option user_info" type="text" id="card-expiry" placeholder="MM/AA">
            </div>
            <div>
                <label for="card-cvv"><span class="label_nom">CVV *</span></label>
                <input class="payment-option user_info" type="text" id="card-cvv" placeholder="CVV">
            </div>
        </div>
    </div>
</div>


                    <div class="payment-option">
                        <input type="radio" id="mobile-money" name="payment" checked>
                        <label for="mobile-money">
                            <img src="{{ asset('assets/img/mobile_payment.png') }}" alt="Mobile Money"
                                style="width:24px;">
                            <span>Paiement mobile</span>
                        </label>
                    </div>

                    <!-- Champs mobile money affichés seulement si paiement mobile -->
                    <div class="mobile-money-fields" style="display:none; margin-left:24px;">
                        <div class="options">
                            <div class="payment-option">
                                <input type="radio" id="orange-money" name="mobile-operator" checked>
                                <label for="orange-money">
                                    <img src="{{ asset('assets/img/om.jpeg') }}" alt="Orange Money" style="width:24px;">
                                    <span>Orange Money</span>
                                </label>
                            </div>
                            <div class="payment-option">
                                <input type="radio" id="mtn-money" name="mobile-operator">
                                <label for="mtn-money">
                                    <img src="{{ asset('assets/img/momo.jpeg') }}" alt="MTN Money" style="width:24px;">
                                    <span>MTN Money</span>
                                </label>
                            </div>
                        </div>
                        <div class="user-group">
                            <label for="mobile-number"><span class="label_nom">Numéro Mobile <span
                                        style="color: red;">*</span></span></label>
                            <input class="payment-option user_info" type="text" id="mobile-number"
                                placeholder="Numéro Orange/MTN">
                        </div>
                    </div>
                    <!-- ...cartes enregistrées comme avant... -->
                    {{-- <button class="add-card-btn" type="button">+ Ajouter une carte</button> --}}
                </section>

                <!-- Méthode de livraison -->
                <section class="payment-methods delivery-methods">
                    <h2 class="section-title">Méthode de livraison</h2>
                    <div class="delivery-option">
                        <div class="payment-option">
                            <input type="radio" id="delivery-clinic" name="delivery" checked>
                            <label for="delivery-clinic">
                                <img src="{{ asset('assets/img/package.png') }}" alt="Pick up" style="width:20px;">
                                <span>À la clinique</span>
                            </label>
                        </div>
                        <div class="payment-option">
                            <input type="radio" id="delivery-home" name="delivery">
                            <label for="delivery-home">
                                <img src="{{ asset('assets/img/delivery.png') }}" alt="Livraison" style="width:20px;">
                                <span>Livraison</span>
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
                <div class="promo-code">
                    <label>Code promo</label>
                    <input type="text" class="payment-option user_info" placeholder="Entrez un code">
                    <button class="add-code-btn">Appliquer</button>
                </div>
                <div class="payment-breakdown">
                    <p><span>Commande</span><span>2000 FCFA</span></p>
                    <p><span>Livraison</span><span>1000 FCFA</span></p>
                    <hr>
                    <p class="total"><span>Total</span><span>3000 FCFA</span></p>
                </div>
                <div class="delivery-address">
                    <label>Adresse</label>
                    <p id="summary-address">Melen</p>
                </div>
                <button class="pay-now-btn">Payer maintenant</button>
            </section>


        </div>
    </div>






@endsection
