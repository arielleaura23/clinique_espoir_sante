<div class="hero-section ">
    @if (!empty($bg))
        <div class="hero-bg" style="background-image: url('{{ asset($bg) }}')">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-text-group">
                        @isset($title)
                            <div class="hero-title">{!! $title !!}</div>
                        @endisset

                        @isset($description)
                            <div class="hero-description">{!! $description !!}</div>
                        @endisset

                        @if (!empty($button))
                            <div class="services-button ">
                                {!! $button !!}
                            </div>
                        @endif
                    </div>
                </div>
                @if (!empty($mask) || !empty($photo))



                    <div class="hero-image">
                        @if (!empty($mask))
                            <img class="hero-mask" src="{{ asset($mask) }}" alt="Décor" />
                        @endif
                        @if (!empty($photo))
                            <img class="hero-photo" src="{{ asset($photo) }}" alt="Clinique" />
                        @endif
                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="hero-bg">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-text-group">
                        @isset($title)
                            <div class="hero-title">{!! $title !!}</div>
                        @endisset

                        @isset($description)
                            <div class="hero-description">{!! $description !!}</div>
                        @endisset

                        @if (!empty($button))
                            <div class="services-button ">
                                {!! $button !!}
                            </div>
                        @endif
                    </div>
                </div>
                @if (!empty($mask) || !empty($photo))



                    <div class="hero-image">
                        @if (!empty($mask))
                            <img class="hero-mask" src="{{ asset($mask) }}" alt="Décor" />
                        @endif
                        @if (!empty($photo))
                            <img class="hero-photo" src="{{ asset($photo) }}" alt="Clinique" />
                        @endif
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
