<div class="footer section">
    <div class="footer-bg">
        <div class="container">
            <div class="footer-main">
                <div class="footer-brand">
                    <img class="footer-logo" src="{{ asset('assets/img/logo cercle.png') }}" alt="Logo" />
                    <div class="footer-slogan">
                        {{ __('Your best health center') }}
                    </div>
                </div>

                <div class="footer-pages">
                    <div class="footer-title">{{ __('Pages') }}</div>
                    <ul class="footer-links">
                        <li><a href="{{route('home')}}" class="footer-link">{{ __('Home') }}</a></li>
                        <li><a href="{{route('about')}}" class="footer-link">{{ __('About') }}</a></li>
                        <li><a href="{{route('services')}}" class="footer-link">{{ __('Services') }}</a></li>
                        <li><a href="{{route('medecins')}}" class="footer-link">{{ __('Doctors') }}</a></li>
                        <li><a href="{{route('guide_patient')}}" class="footer-link">{{ __('Patient guide') }}</a></li>
                        <li><a href="#" class="footer-link">{{ __('News') }}</a></li>
                        <li><a href="{{route('contact')}}" class="footer-link">{{ __('Contact') }}</a></li>
                    </ul>
                </div>

                <div class="footer-contact">
                    <div class="footer-title">{{ __('Contact us') }}</div>
                    <div class="footer-contact-list">
                        <div class="footer-contact-item">{{ __('Calls: (237) 655-41-88-41') }}</div>
                        <div class="footer-contact-item">{{ __('Email: abomoarielle@gmail.com') }}</div>
                        <div class="footer-contact-item">{{ __('Address: Mendong') }}</div>
                        <div class="footer-contact-item">{{ __('Cameroon') }}</div>
                    </div>
                </div>

                <div class="footer-newsletter">
                    <div class="footer-title">{{ __('Newsletter') }}</div>
                    <form class="footer-newsletter-form">
                        <div class="footer-newsletter-input-group">
                            <input type="email" class="footer-newsletter-input" placeholder="{{ __('Enter your email...') }}" />
                            <button type="submit" class="footer-newsletter-btn">
                                <img src="{{ asset('assets/img/send.png') }}" alt="Envoyer" />
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="footer-copyright">
                    {{ __('© 2025 Clinic All Rights Reserved') }}
                </div>
                <div class="footer-socials">
                    <a href="#" class="footer-social">
                        <img src="{{ asset('assets/img/twitter.png') }}" alt="Twitter" />
                    </a>
                    <a href="#" class="footer-social">
                        <img src="{{ asset('assets/img/facebook.png') }}" alt="Facebook" />
                    </a>
                    <a href="#" class="footer-social">
                        <img src="{{ asset('assets/img/whatsapp.png') }}" alt="Whatsapp" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
