@extends('layouts.app')

@section('title', 'pharmacie')

@section('content')

    <div class="container section">
        <div class="product-card">
            <div class="product-info">
                <div class="description">
                    <span class="title">TOPICREM MELA Éclaircissant Ultra Hydrat 500ML</span><br /><br />
                    <span class="subtitle">Lait parfumé aux notes de bergamote, violette et bois de santal</span><br /><br />
                    <span class="label">Référence :</span><span class="value">9324228</span><br />
                    <span class="label">Marque :</span><span class="value ">TOPICREM</span><br /><br />
                    <span class="details">
                        Éclaircit et unifie le teint<br />
                        Prévient l’apparition des taches<br />
                        Hydrate 24H<br />
                        Peaux sensibles – Taches pigmentaires
                    </span><br /><br />
                    <span class="stock">Dépêchez-vous, plus que <strong>167</strong> unités restantes</span>

                    <div class="verified">✔ Verified</div>
                </div>
            </div>
            <div class="img-product">
                <img class="product-image" src="{{ asset('assets/img/topicrem.png') }}" alt="Topicrem MELA" />
            </div>
        </div>
    </div>

    <div class="container section">
        <div class="composition-section">
            <h2 class="title">Composition</h2>
            <div class="content">
                <p><strong>Glycérine :</strong> Ingrédient hydratant d'origine naturelle et de qualité pharmacopée. Tous les
                    actifs Topicrem sont d'une haute pureté. Notre glycérine est d'une pureté ≥ 99,5 %.</p>

                <p><strong>Cire d’abeille :</strong> Ingrédient hydratant d'origine naturelle et de qualité pharmacopée.</p>

                <p><strong>Ingrédients (INCI) :</strong></p>
                <ul>
                    <li>Aqua (Water) - Eau</li>
                    <li>Glycerin</li>
                    <li>Ethylhexyl Methoxycinnamate</li>
                    <li>Paraffinum Liquidum (Mineral Oil)</li>
                    <li>Cetearyl Ethylhexanoate</li>
                    <li>Octadecenedioic Acid</li>
                    <li>Dicaprylyl Carbonate</li>
                    <li>Isopropyl Isostearate</li>
                    <li>Ethylhexyl Triazone</li>
                    <li>Diethylamino Hydroxybenzoyl Hexyl Benzoate</li>
                    <li>Acetyl Glucosamine</li>
                    <li>Glyceryl Stearate</li>
                    <li>PEG-100 Stearate</li>
                    <li>Silica</li>
                    <li>Cera Alba (Beeswax)</li>
                    <li>Bisabolol</li>
                    <li>Phenoxyethanol</li>
                    <li>Sorbitan Stearate</li>
                    <li>Polysorbate 60</li>
                    <li>Mica</li>
                    <li>Chlorphenesin</li>
                    <li>Xanthan Gum</li>
                    <li>Carbomer</li>
                    <li>Hydroxyethyl Acrylate/Sodium Acryloyldimethyl Taurate Copolymer</li>
                    <li>Sodium Hydroxide</li>
                    <li>Sorbitan Isostearate</li>
                    <li>Tocopherol</li>
                    <li>BHT</li>
                    <li>Parfum (Fragrance)</li>
                    <li>CI 77891 (Titanium Dioxide)</li>
                </ul>
            </div>
        </div>

    </div>

    <div class="container ">
        <div class="composition-section">
            <h2 class="title">Conseils d'utilisation</h2>
            <div class="content">
                <p>Appliquer matin et/ou soir sur le corps</p>

            </div>
        </div>

    </div>

    <div class="container ">
        <div class="composition-section">
            <h2 class="title">Avis sur le produit</h2>

                        <div class="testimonials-list">
                <div class="testimonial-card">
                    <div class="testimonial-bg"></div>
                    <div class="cotes">''</div>
                    <div class="testimonial-text">
                        J’ai pu réserver mon rendez-vous en ligne en quelques minutes seulement.
                        L’interface est claire et intuitive. Bravo pour ce service moderne et pratique !
                    </div>
                    <div class="temoin">
                        <div class="testimonial-avatar">
                            <img src="{{ asset('assets/img/temoin.png') }}" alt="Arielle Abomo" />
                        </div>
                        <div class="testimonial-name-group">
                            <span class="testimonial-name">Arielle Abomo</span>
                            <div class="stars">
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-bg"></div>
                    <div class="cotes">''</div>
                    <div class="testimonial-text">
                        Le rappel de rendez-vous par e-mail et SMS est un vrai plus. Cela
                        m’évite d’oublier mes consultations, surtout avec mon emploi du temps chargé.
                    </div>
                    <div class="temoin">
                        <div class="testimonial-avatar">
                            <img src="{{ asset('assets/img/temoin.png') }}" alt="Arielle Abomo" />
                        </div>
                        <div class="testimonial-name-group">
                            <span class="testimonial-name">Arielle Abomo</span>
                            <div class="stars">
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-bg"></div>
                    <div class="cotes">''</div>
                    <div class="testimonial-text">
                        Très bon service ! Le personnel est disponible et l'organisation
                        est fluide grâce au système de prise de rendez-vous. Je recommande cette
                        clinique à 100 %
                    </div>
                    <div class="temoin">
                        <div class="testimonial-avatar">
                            <img src="{{ asset('assets/img/temoin.png') }}" alt="Arielle Abomo" />
                        </div>
                        <div class="testimonial-name-group">
                            <span class="testimonial-name">Arielle Abomo</span>
                            <div class="stars">
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                                <img class="testimonial-icon" src="{{ asset('assets/img/Star.png') }}" alt="icon" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>





@endsection
