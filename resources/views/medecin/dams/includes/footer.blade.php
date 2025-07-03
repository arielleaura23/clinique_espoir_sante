<footer class="site-footer section-padding" id="contact">
    <div class="container">
        <div class="row">

            <div class="col-lg-5 me-auto col-12">
                @if(isset($contactInfo) && $contactInfo) 
                    <h5 class="mb-lg-4 mb-3">Timing</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex">
                            {{ $contactInfo->Timing }}
                        </li>
                    </ul>
                    <h5 class="mb-lg-4 mb-3">Email</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex">
                            {{ $contactInfo->Email }}
                        </li>
                        <br>
                        <h5 class="mb-lg-4 mb-3">Contact Number</h5>
                        <li class="list-group-item d-flex">
                            {{ $contactInfo->MobileNumber }}
                        </li>
                    </ul>
                @else
                    {{-- Message si les informations de contact ne sont pas disponibles --}}
                    <p>Informations de contact non disponibles.</p>
                @endif
            </div>

            <div class="col-lg-2 col-md-6 col-12 my-4 my-lg-0">
                <h5 class="mb-lg-4 mb-3">Our Clinic</h5>
                @if(isset($contactInfo) && $contactInfo)
                    <p>{{ $contactInfo->PageDescription }}</p>
                @else
                    <p>Description de la clinique non disponible.</p>
                @endif
            </div>

            <div class="col-lg-3 col-md-6 col-12 ms-auto">
                <h5 class="mb-lg-4 mb-2">Socials</h5>
                <ul class="social-icon">
                    <li><a href="#" class="social-icon-link bi-facebook"></a></li>
                    <li><a href="#" class="social-icon-link bi-twitter"></a></li>
                    <li><a href="#" class="social-icon-link bi-instagram"></a></li>
                    <li><a href="#" class="social-icon-link bi-youtube"></a></li>
                </ul>
            </div>

        </div>
    </div>

</footer>