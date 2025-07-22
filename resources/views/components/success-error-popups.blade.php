@if (session('success') || session('error'))
    <script>
        window.onload = function () {
            const successModal = document.getElementById("successModal");
            const errorModal = document.getElementById("errorModal");

            @if(session('success'))
                if (successModal) successModal.style.display = "flex";
            @endif

            @if(session('error'))
                if (errorModal) errorModal.style.display = "flex";
            @endif

            document.querySelectorAll("#closeModal, #okButton").forEach(btn => {
                btn.onclick = () => {
                    if (successModal) successModal.style.display = "none";
                    if (errorModal) errorModal.style.display = "none";
                };
            });
        }
    </script>
@endif

{{-- SUCCESS MODAL --}}
<div class="modal-overlay" id="successModal" style="display: none;">
    <div class="modal-success">
        <div class="modal-header">
            <div class="success-title">
                <img class="icon-check" src="{{ asset('assets/img/check-circle.png') }}" alt="Succès" />
                <h2 class="modal-title">Succès</h2>
            </div>
            <img class="icon-close" src="{{ asset('assets/img/fermer.png') }}" alt="Fermer" id="closeModal" />
        </div>
        <hr style="margin: 10px 0; border: none; border-top: 1px solid #ccc;" />
        <div class="modal-body">
            <p>{{ session('success') }}</p>
        </div>
        <div class="modal-footer" >
            <button class="btn-primary" id="okButton">Okay</button>
        </div>
    </div>
</div>

{{-- ERROR MODAL --}}
<div class="modal-overlay" id="errorModal" style="display: none">
    <div class="modal-success">
        <div class="modal-header">
            <div class="success-title">
                <img class="icon-check" src="{{ asset('assets/img/error.png') }}" alt="Erreur" />
                <h2 class="modal-title" style="color: red;">Erreur</h2>
            </div>
            <img class="icon-close" src="{{ asset('assets/img/croix_rouge.png') }}" alt="Fermer" id="closeModal" />
        </div>
        {{-- <hr style="margin: 10px 0; border: none; border-top: 1px solid #ccc;" /> --}}
        <div class="modal-body">
            <p>{{ session('error') }}</p>
        </div>
        <div class="modal-footer">
            <button class="btn-danger" id="okButton">Okay</button>
        </div>
    </div>
</div>
