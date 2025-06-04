        <div class="footer">
            <div class="footer-bg"></div>
            <div class="container">
                <div class="footer-main">
                    <div class="footer-brand">
                        <img class="footer-logo" src="{{ asset('assets/img/logo cercle.png') }}" alt="Logo" />
                        <div class="footer-slogan">
                            Votre meilleur centre de<br />santé
                        </div>
                    </div>
                    <div class="footer-pages">
                        <div class="footer-title">Pages</div>
                        <ul class="footer-links">
                            <li><a href="{{route('home')}}" class="footer-link">Accueil</a></li>
                            <li><a href="{{route('about')}}" class="footer-link">A propos</a></li>
                            <li><a href="{{route('services')}}" class="footer-link">Services</a></li>
                            <li><a href="{{route('medecins')}}" class="footer-link">Médecins</a></li>
                            <li><a href="{{route('guide_patient')}}" class="footer-link">Guide patient</a></li>
                            <li><a href="#" class="footer-link">Actualités</a></li>
                            <li><a href="{{route('contact')}}" class="footer-link">Contact</a></li>
                        </ul>
                    </div>
                    <div class="footer-contact">
                        <div class="footer-title">Contact</div>
                        <div class="footer-contact-list">
                            <div class="footer-contact-item">Appels : (237) 655-41-88-41</div>
                            <div class="footer-contact-item">Email: abomoarielle@gmail.com</div>
                            <div class="footer-contact-item">Adresse: Mendong</div>
                            <div class="footer-contact-item">Cameroun</div>
                        </div>
                    </div>
                    <div class="footer-newsletter">
                        <div class="footer-title">Newsletter</div>
                        <form class="footer-newsletter-form">
                            <div class="footer-newsletter-input-group">
                                <input type="email" class="footer-newsletter-input"
                                    placeholder="Entrez votre email..." />
                                <button type="submit" class="footer-newsletter-btn">
                                    <img src="{{ asset('assets/img/send.png') }}" alt="Envoyer" />
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="footer-copyright">
                        © 2025 Clinic All Rights Reserved
                    </div>
                    <div class="footer-socials">
                        <a href="#" class="footer-social"><img src="{{ asset('assets/img/twitter.png') }}"
                                alt="Twitter" /></a>
                        <a href="#" class="footer-social"><img src="{{ asset('assets/img/facebook.png') }}"
                                alt="Facebook" /></a>
                        <a href="#" class="footer-social"><img src="{{ asset('assets/img/whatsapp.png') }}"
                                alt="Whatsapp" /></a>
                    </div>
                </div>
            </div>
        </div>
