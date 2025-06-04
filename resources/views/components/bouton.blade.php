<a class="hero-cta" href="{{ $href ?? '#' }}">
    <div class="cta-bg"></div>
    <div class="cta-text">{{ $slot }}</div>
    @if(!empty($icon))
        <img class="cta-icon" src="{{ asset($icon) }}" alt="bouton_cta" />
    @endif
</a>
