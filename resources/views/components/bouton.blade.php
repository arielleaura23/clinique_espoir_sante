<a class="hero-cta" href="{{ $href ?? '#' }}">
    <div class="cta-bg"></div>
    <div class="cta-content">
        @if (!empty($icon))
            <img class="cta-icon" src="{{ asset($icon) }}" alt="bouton_cta" />
        @endif
        <div class="cta-text">{{ $slot }}</div>
    </div>
</a>
