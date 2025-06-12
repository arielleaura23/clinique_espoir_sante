<div class="modal-overlay" id="{{ $id ?? 'openCallModal' }}" style="display: none">
    <div class="modal-success" style="gap: 10px;">
        <div class="modal-header">
            <div class="success-title">
                <img class="icon-check" src="{{ asset($icon ?? 'assets/img/check-circle.png') }}" alt="Icone" />
                <h2 class="modal-title">{{ $title ?? 'Information' }}</h2>
            </div>
            <img src="{{ asset('assets/img/fermer.png') }}" alt="Fermer" class="icon-close close-button"
                data-close="{{ $id ?? 'modal' }}" />

        </div>

        <hr class="modal-separator" />

        <div class="modal-body">
            {!! $slot !!}
        </div>

        @isset($buttonText)
            <div class="modal-footer">
                @if (isset($buttonLink))
                    <a href="{{ $buttonLink }}" class="btn-primary">{{ $buttonText }}</a>
                @else
                    <button class="btn-primary close-button" data-close="{{ $id ?? 'modal' }}">{{ $buttonText }}</button>
                @endif
            </div>
        @endisset
    </div>
</div>
