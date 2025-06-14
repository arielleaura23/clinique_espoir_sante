@props([
    'title',
    'subtitle',
    'services' => [],
    'button' => null,
    'button_position' => 'center',
    'background' => false,
])

<div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000" class="services-section  section @if (!empty($background)) services-bg @endif">
    <div class="container">
        <div class="services-header autoDisplay">
            @isset($title)
                <div class="services-title">{{ $title }}</div>
            @endisset
            @isset($subtitle)
                <div class="services-subtitle">{{ $subtitle }}</div>
            @endisset
        </div>
        <div class="services-list">
            @foreach ($services ?? [] as $service)
                <div class="service-card">
                    <div class="service-icon-bg">
                        <img class="service-icon" src="{{ asset($service['icon']) }}" alt="{{ $service['title'] }}" />
                    </div>
                    <div class="service-content">
                        <div class="service-title">{{ $service['title'] }}</div>
                        <div class="service-description">{{ $service['description'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
        @if (!empty($button))
            <div class="services-button ">
                {!! $button !!}
            </div>
        @endif
    </div>
</div>
