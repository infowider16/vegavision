@extends('admin.layouts.master')

@section('title', 'User Detail')

@section('content')
<!-- NFTmax Dashboard -->



<style>
  .profile-gallery-item img {
    width: 100%;
    object-fit: contain;
    height: 200px;
}

    .lightbox {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .lightbox.open {
        opacity: 1;
        visibility: visible;
    }

    .lightbox-content {
        max-width: 90%;
        max-height: 90%;
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .lightbox-content img,
    .lightbox-content video {
        max-width: 100%;
        max-height: 80vh;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
    }

    .lightbox-caption {
        color: white;
        font-size: 1.2rem;
        margin-top: 15px;
        text-align: center;
        max-width: 80%;
    }

    .lightbox-close {
        position: absolute;
        top: -40px;
        right: -40px;
        color: white;
        background: rgba(255, 255, 255, 0.2);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.5rem;
        transition: background 0.3s ease;
    }

    .lightbox-close:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    .lightbox-nav {
        position: absolute;
        top: 50%;
        width: 100%;
        display: flex;
        justify-content: space-between;
        padding: 0 20px;
        transform: translateY(-50%);
    }

    .lightbox-prev,
    .lightbox-next {
        color: white;
        background: rgba(255, 255, 255, 0.2);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.5rem;
        transition: background 0.3s ease;
    }

    .lightbox-prev:hover,
    .lightbox-next:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    .instructions {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        margin: 0 auto;
    }

    .instructions h2 {
        color: #2575fc;
        margin-bottom: 20px;
        text-align: center;
    }

    .code-block {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
        margin: 20px 0;
        overflow-x: auto;
        font-family: monospace;
        line-height: 1.5;
    }



    @media (max-width: 768px) {
        .gallery {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        }

        .lightbox-close {
            top: -30px;
            right: 0;
        }

        .lightbox-prev,
        .lightbox-next {
            width: 40px;
            height: 40px;
        }
    }
</style>
<section class="nftmax-adashboard nftmax-show">
    <div class="container-fulid">
        <div class="row">
            <div class="col-lg-12 setting-main">
                <div class="d-flex align-items-start">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <form id="adminProfileForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="personal-informations-head">
                                            <h3>User Details</h3>
                                        </div>

                                        <div class="personal-informations-from">
                                            <div class="personal-informations-from-item-inner">
                                                <div class="row">
                                                    <!-- Basic Information -->
                                                    <div class="col-12 mb-4">
                                                        <h5 class="border-bottom pb-2">Basic Information</h5>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                                                        <label class="form-label mb-0">Username</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->username }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                                                        <label class="form-label mb-0">Email</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->email }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Ip Address</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->ip_address }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Email Verified At</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->email_verified_at ? \Carbon\Carbon::parse($user->email_verified_at)->format('d M Y H:i') : 'Not verified' }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Phone</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">+{{ $user->country_code }} {{ $user->phone }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">WhatsApp</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">+{{ $user->whatsapp_dial_code }} {{ $user->whatsapp_number }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Date of Birth</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->dob ? \Carbon\Carbon::parse($user->dob)->format('d M Y') : '-' }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Gender</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->genderr?->name }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Status</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold text-capitalize">{{ $user->status }}</p>
                                                    </div>
                                                    @if($user->status == 'rejected')
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Rejection Reason</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->reject_reason }}</p>
                                                    </div>
                                                    @endif
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Created At</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y H:i') }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Last Updated</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ \Carbon\Carbon::parse($user->updated_at)->format('d M Y H:i') }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Region</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->regionData->name ?? '-' }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Municipality</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->municipalityData->name ?? '-' }}</p>
                                                    </div>

                                                    <!-- Physical Attributes -->
                                                    <div class="col-12 mb-4 mt-4">
                                                        <h5 class="border-bottom pb-2">Physical Attributes</h5>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Height</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->Height?->name ?? '-' }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Weight</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->weight ?? '-' }} kg</p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Breast Size</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->BreastSize?->name ?? '-'}}</p>
                                                    </div>

                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Hair Type</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->hairType?->name ?? '-' }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Eye Color</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->eyeColor?->name ?? '-'  }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Ethnicity</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->ethnicitydata?->name ?? '-' }}</p>
                                                    </div>

                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Body Type</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->bodyType?->name ?? '-' }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Marital Status</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ ucfirst($user->marital_status) ?? '-' }}</p>
                                                    </div>




                                                    <!-- Location Information -->
                                                    <div class="col-12 mb-4 mt-4">
                                                        <h5 class="border-bottom pb-2">Location Information</h5>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Country</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->country ?? '-' }}</p>
                                                    </div>

                                                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                        <label class="form-label mb-0">Postal Code</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->postal_code ?? '-' }}</p>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label class="form-label mb-0">Address</label>
                                                        <p class="form-control-plaintext pt-0 fw-bold">{{ $user->address ?? '-' }}</p>
                                                    </div>
                                                    <div class="col-12 mb-4 mt-4">
                                                        <h5 class="border-bottom pb-2">Luogo del Servizio</h5>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        @if($user->place_of_service_options->isNotEmpty())
                                                        <div class="d-flex flex-wrap gap-2">
                                                            @foreach($user->place_of_service_options as $pos)
                                                            <span class="badge bg-info">{{ ucfirst($pos->name) }}</span>
                                                            @endforeach
                                                        </div>
                                                        @else
                                                        <p class="form-control-plaintext pt-0 fw-bold">Nessun luogo di servizio</p>
                                                        @endif
                                                    </div>


                                                    <div class="col-12 mb-4 mt-4">
                                                        <h5 class="border-bottom pb-2">Attenzione</h5>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        @if($user->attention_options->isNotEmpty())
                                                        <div class="d-flex flex-wrap gap-2">
                                                            @foreach($user->attention_options as $option)
                                                            <span class="badge bg-success">{{ ucfirst($option->name) }}</span>
                                                            @endforeach
                                                        </div>
                                                        @else
                                                        <p>Nessun Attenzione</p>
                                                        @endif
                                                    </div>

                                                    <div class="col-12 mb-4 mt-4">
                                                        <h5 class="border-bottom pb-2">Categoria</h5>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        @if($user->category_options->isNotEmpty())
                                                        <div class="d-flex flex-wrap gap-2">
                                                            @foreach($user->category_options as $cat)
                                                            <span class="badge bg-primary">{{ ucfirst($cat->category_name) }}</span>
                                                            @endforeach
                                                        </div>
                                                        @else
                                                        <p class="form-control-plaintext pt-0 fw-bold">Nessuna categoria</p>
                                                        @endif
                                                    </div>

                                                    <!-- Services -->
                                                    <div class="col-12 mb-4 mt-4">
                                                        <h5 class="border-bottom pb-2">Services</h5>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        @if($user->service_options->isNotEmpty())
                                                        <div class="d-flex flex-wrap gap-2">
                                                            @foreach($user->service_options as $service)
                                                            <span class="badge bg-warning">{{ ucfirst($service->name) }}</span>
                                                            @endforeach
                                                        </div>
                                                        @else
                                                        <p class="form-control-plaintext pt-0 fw-bold">Nessun servizio</p>
                                                        @endif
                                                    </div>


                                                    <div class="col-12 mb-4 mt-4">
                                                        <h5 class="border-bottom pb-2">Title</h5>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <p class="form-control-plaintext pt-0">{{ $user->title ?? 'No title provided' }}</p>
                                                    </div>

                                                    <!-- About Me -->
                                                    <div class="col-12 mb-4 mt-4">
                                                        <h5 class="border-bottom pb-2">About Me</h5>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <p class="form-control-plaintext pt-0">{{ $user->about_me ?? 'No description provided' }}</p>
                                                    </div>

                                                    <!-- Media -->
                                                    <div class="col-12 mb-4 mt-4">
                                                        <h5 class="border-bottom pb-2">Media</h5>
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-4">
                                                        <label class="form-label mb-2">Profile Image</label>
                                                        <div class="border rounded p-2">

                                                       <div class="profile-gallery-item" data-type="image" data-src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('assets/admin/images/Update-profile.png') }}">
    <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('assets/admin/images/Update-profile.png') }}" alt="Profile Image" class="img-fluid" style="max-height: 200px;">
</div>








                                                            <!-- <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('assets/admin/images/Update-profile.png') }}" alt="Profile Image" class="img-fluid" style="max-height: 200px;"> -->
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-4">
                                                        <label class="form-label mb-2">Photos</label>
                                                        <div class="border rounded p-2">
                                                            @if($user->photos)
                                                            @php $photos = json_decode($user->photos); @endphp
                                                            <div class="d-flex flex-wrap gap-2">
                                                                @foreach($photos as $photo)


                                                               <div class="photo-gallery-item" data-type="image" data-src="{{ asset('storage/' . $photo) }}">
    <img src="{{ asset('storage/' . $photo) }}" alt="User Photo" class="img-fluid img-thumbnail" style="height: 100px; width: 100px;">
</div>





                                                                <!-- <img src="{{ asset('storage/' . $photo) }}" alt="User Photo" class="img-thumbnail" style="height: 100px; width: auto;"> -->
                                                                @endforeach
                                                            </div>
                                                            @else
                                                            <p class="form-control-plaintext pt-0">No photos uploaded</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-4">
                                                        <label class="form-label mb-2">Videos</label>
                                                        <div class="border rounded p-2">
                                                            @if($user->videos)
                                                            @php $videos = json_decode($user->videos); @endphp
                                                            <div class="d-flex flex-wrap gap-2">
                                                                @foreach($videos as $video)


<div class="video-gallery-item gallery-item" data-type="video" data-src="{{ asset('storage/' . $video) }}">
    <video 
        src="{{ asset('storage/' . $video) }}" 
        class="gallery-video img-thumbnail"  
        style="height: 150px; width: 150px; object-fit: cover;" 
        type="video/mp4"
        autoplay 
        muted 
        loop 
        playsinline>
    </video>
</div>




                                                                

                                                                <!-- <video controls style="height: 150px; width: auto;" class="img-thumbnail">
                                                                    <source src="{{ asset('storage/' . $video) }}" type="video/mp4">
                                                                    Your browser does not support the video tag.
                                                                </video> -->
                                                                @endforeach
                                                            </div>
                                                            @else
                                                            <p class="form-control-plaintext pt-0">No videos uploaded</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-padding-0">
                                        <div class="up-date-profile-main">
                                            <div class="up-date-profile-img">
                                                <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('assets/admin/images/Update-profile.png') }}" alt="Profile Image" class="img-fluid rounded">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div class="lightbox">
    <div class="lightbox-content">
        <div class="lightbox-close">
            <i class="fas fa-times"></i>
        </div>
        <div class="lightbox-media"></div>
        <div class="lightbox-caption"></div>
    </div>
    <div class="lightbox-nav">
                <div class="lightbox-prev">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="lightbox-next">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
</div>
<!-- End NFTmax Dashboard -->
@endsection

@section('scripts')
<script>
    // Theme control script remains the same as in your original code
    let darkMode = false
    if (darkMode) {
        document.getElementById("dark-icon").style.setProperty("display", "block")
        document.getElementById("light-icon").style.setProperty("display", "none")
        document.getElementsByClassName("logo")[0].style.setProperty("display", "none")
        document.getElementsByClassName("logo-dark")[0].style.setProperty("display", "block")
    } else {
        document.getElementById("dark-icon").style.setProperty("display", "none")
        document.getElementById("light-icon").style.setProperty("display", "block")
        document.getElementsByClassName("logo")[0].style.setProperty("display", "block")
        document.getElementsByClassName("logo-dark")[0].style.setProperty("display", "none")
    }

    document.getElementById("theme-controll").addEventListener("click", event => {
        darkMode = !darkMode
        const main = document.querySelector("html")
        main.classList.toggle("dark")

        if (darkMode) {
            document.documentElement.style.setProperty("--headding-color", "#fff")
            document.documentElement.style.setProperty("--paragraph-color", "#E2E8F0")
            document.documentElement.style.setProperty("--primary-color", "#22C55E")
            document.documentElement.style.setProperty("--warning-color", "#FACC15")
            document.documentElement.style.setProperty("--alerts-color", "#FF4747")
            document.documentElement.style.setProperty("--other-color", "#FF784B")
            document.documentElement.style.setProperty("--grey-color", "#2A313C")
            document.documentElement.style.setProperty("--grey-color-border", "#edf2f7")
            document.documentElement.style.setProperty("--body-bg-color", "#23262B")
            document.documentElement.style.setProperty("--bg-color", "#1D1E24")
            document.documentElement.style.setProperty("--greyscale-3", "#191B1F")
            document.documentElement.style.setProperty("--greyscale-4", "#293644")
            document.documentElement.style.setProperty("--greyscale-200", "rgba(226, 232, 240, 0.7)")
            document.documentElement.style.setProperty("--greyscale-1", "#2A313C")
            document.documentElement.style.setProperty("--bg-color-2", "#23262B")
            document.documentElement.style.setProperty("--bg-rgb", "#1D1E24")

            document.getElementById("dark-icon").style.setProperty("display", "block")
            document.getElementById("light-icon").style.setProperty("display", "none")
            document.getElementsByClassName("logo")[0].style.setProperty("display", "none")
            document.getElementsByClassName("logo-dark")[0].style.setProperty("display", "block")
        } else {
            document.documentElement.style.setProperty("--headding-color", "#111827")
            document.documentElement.style.setProperty("--paragraph-color", "#747681")
            document.documentElement.style.setProperty("--primary-color", "#22C55E")
            document.documentElement.style.setProperty("--warning-color", "#FACC15")
            document.documentElement.style.setProperty("--alerts-color", "#FF4747")
            document.documentElement.style.setProperty("--other-color", "#FF784B")
            document.documentElement.style.setProperty("--grey-color", "#F7FAFC")
            document.documentElement.style.setProperty("--grey-color-border", "#edf2f7")
            document.documentElement.style.setProperty("--bg-color", "#FAFAFA")
            document.documentElement.style.setProperty("--body-bg-color", "#F6F6F6")
            document.documentElement.style.setProperty("--greyscale-200", "rgba(42, 49, 60, 0.7)")
            document.documentElement.style.setProperty("--greyscale-1", "#EDF2F7")
            document.documentElement.style.setProperty("--greyscale-3", "#EEEFF2")
            document.documentElement.style.setProperty("--greyscale-4", "#CBD5E0")
            document.documentElement.style.setProperty("--bg-color-2", "#f7fafc")
            document.documentElement.style.setProperty("--bg-rgb", "rgba(237, 242, 247, 0.5)")

            document.getElementById("dark-icon").style.setProperty("display", "none")
            document.getElementById("light-icon").style.setProperty("display", "block")
            document.getElementsByClassName("logo")[0].style.setProperty("display", "block")
            document.getElementsByClassName("logo-dark")[0].style.setProperty("display", "none")
        }
    })
</script>




<script>
    // Reusable open function
    function openLightbox(type, src, caption, galleryItems, index) {
        const lightbox = document.querySelector('.lightbox');
        const mediaContainer = document.querySelector('.lightbox-media');
        const captionContainer = document.querySelector('.lightbox-caption');

        // Clear old content
        mediaContainer.innerHTML = '';

        if (type === 'image') {
            mediaContainer.innerHTML = `<img src="${src}" alt="${caption}">`;
        } else if (type === 'video') {
            mediaContainer.innerHTML = `<video controls autoplay>
                                            <source src="${src}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>`;
        }

        captionContainer.textContent = caption || '';
        lightbox.classList.add('open');
        document.body.style.overflow = 'hidden';

        updateNavVisibility(galleryItems);
    }

    // Close lightbox
    function closeLightbox() {
        document.querySelector('.lightbox').classList.remove('open');
        document.body.style.overflow = 'auto';
    }

    document.querySelector('.lightbox-close').addEventListener('click', closeLightbox);
    document.querySelector('.lightbox').addEventListener('click', (e) => {
        if (e.target === document.querySelector('.lightbox')) {
            closeLightbox();
        }
    });

    // Navigation handler with looping
    function setupGallery(selector) {
        const items = Array.from(document.querySelectorAll(selector));
        let currentIndex = -1;

        items.forEach((item, index) => {
            item.addEventListener('click', () => {
                currentIndex = index;
                openLightbox(item.dataset.type, item.dataset.src, item.dataset.caption, items, currentIndex);

                // Prev button (looping)
                document.querySelector('.lightbox-prev').onclick = () => {
                    currentIndex = (currentIndex - 1 + items.length) % items.length;
                    const prevItem = items[currentIndex];
                    openLightbox(prevItem.dataset.type, prevItem.dataset.src, prevItem.dataset.caption, items, currentIndex);
                };

                // Next button (looping)
                document.querySelector('.lightbox-next').onclick = () => {
                    currentIndex = (currentIndex + 1) % items.length;
                    const nextItem = items[currentIndex];
                    openLightbox(nextItem.dataset.type, nextItem.dataset.src, nextItem.dataset.caption, items, currentIndex);
                };
            });
        });
    }

    // Show/hide nav buttons
    function updateNavVisibility(items) {
        const nav = document.querySelector('.lightbox-nav');
        if (items.length <= 1) {
            nav.style.display = 'none'; // hide if only 1 item
        } else {
            nav.style.display = 'flex'; // always visible in looping mode
        }
    }

    // Init for each group
    setupGallery('.profile-gallery-item'); // profile image gallery
    setupGallery('.photo-gallery-item');   // photos gallery
    setupGallery('.video-gallery-item');   // videos gallery
</script>


@endsection