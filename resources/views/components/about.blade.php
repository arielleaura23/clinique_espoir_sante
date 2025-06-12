    <div  class="container autoblur">
        <div class="about-section section">

            <div class="about-content">
                <img class="about-image " data-aos="zoom-in" src="{{ asset('assets/img/about_img.png') }}" alt="À propos" />
                <div class="about-container" data-aos="fade-left">
                    <div class="about-title-en">About Us</div>
                    <div class="about-title-fr">Qui sommes-nous ?</div>
                    <div class="about-description">
                        Nous sommes une clinique moderne qui met le patient au centre de ses
                        priorités. Notre équipe de professionnels qualifiés veille à offrir des
                        soins de qualité, dans un environnement chaleureux, sécurisé et
                        respectueux. À l’écoute de vos besoins, nous combinons expertise médicale
                        et approche humaine pour garantir votre bien-être au quotidien.
                    </div>

                    <x-bouton href="{{route('contact')}}">Contactez nous</x-bouton>
                </div>
            </div>

            {{-- <div class="chat">
                    <div class="chat-bg"></div>
                    <div class="chat-text">Besoin d'aide ?</div>
                    <div class="chat-icon">
                        <img src="{{ asset('assets/img/chat.png') }}" alt="Chat" />
                    </div>
                    <div class="chat-message">Envoyez-nous un message</div>
                </div> --}}
            <a href="{{route('chat')}}" class="chat">
                <div class="chat-bg"></div>
                <div class="chat-icon">
                    <img src="{{ asset('assets/img/chat.png') }}" alt="Chat" />
                </div>
            </a>
        </div>
    </div>
