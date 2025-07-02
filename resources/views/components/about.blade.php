<div class="container ">
    <div class="about-section section">

        <div class="about-content">
            <img class="about-image"
                 data-aos="zoom-in"
                 data-aos-easing="linear"
                 data-aos-duration="1000"
                 src="{{ asset('assets/img/about_img.png') }}"
                 alt="{{ __('About Us') }}" />

            <div class="about-container"
                 data-aos="fade-left"
                 data-aos-easing="linear"
                 data-aos-duration="1000">

                <div class="about-title-en">{{ __('About Us') }}</div>
                <div class="about-title-fr">{{ __('Qui sommes-nous ?') }}</div>

                <div class="about-description">
                    {{ __('We are a modern clinic that places the patient at the center of our priorities.') }}
                    {{ __('Our team of qualified professionals ensures quality care in a warm, safe, and respectful environment.') }}
                    {{ __('Listening to your needs, we combine medical expertise and human approach to guarantee your well-being on a daily basis.') }}
                </div>

                <x-bouton href="{{ route('contact') }}">{{ __('Contact us') }}</x-bouton>
            </div>
        </div>

        <a href="{{ route('chat') }}" class="chat">
            <div class="chat-bg"></div>
            <div class="chat-icon">
                <img src="{{ asset('assets/img/chat.png') }}" alt="Chat" />
            </div>
        </a>

    </div>
</div>
