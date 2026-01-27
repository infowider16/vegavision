@extends('frontend.layout.layout')

@section('content')
<!-- ======================= About VegaVision Section ======================== -->
<section class="rts-about-area rts-section-gap" aria-labelledby="about-vega-title">
    <div class="container">
        <div class="row align-items-center">

            <!-- About Images -->
            <div class="col-lg-6">
                <div class="about-area-inner-wrapper-thumbnail">
                    <figure class="left-image">
                        <img src="{{ asset('assets/images/about/01.webp') }}" alt="VegaVision enterprise software platforms dashboard" loading="lazy" />
                    </figure>
                    <figure class="left-image last">
                        <img src="{{ asset('assets/images/about/about-2.jpg') }}" alt="VegaVision digital platform solutions for enterprises" loading="lazy" />
                    </figure>
                    <div class="experience" aria-hidden="true">
                        <img src="{{ asset('assets/images/banner/04.png') }}" alt="" loading="lazy" />
                    </div>
                </div>
            </div>

            <!-- About Content -->
            <div class="col-lg-6 pl--50 pl_md--10 pl_sm--10 pt_md--50 pt_sm--50">
                <div class="about-content-style-one">
                    <header class="title-left-wrapper">
                        <span class="pre">About VegaVision</span>
                        <h2 id="about-vega-title" class="title rts-text-anime-style-1">
                            Software & Platforms by MBV Group
                        </h2>
                    </header>
                    <p class="disc">
                        VegaVision is the dedicated software and digital platforms arm of the MBV Group,
                        focused on delivering secure, scalable, and enterprise-grade solutions for
                        IT operations, billing, customer experience, and network services.
                    </p>
                    <p class="disc">
                        Our platforms support large enterprises, public sectors, financial services, educational institutions,
                        ISPs and growing businesses through local expertise, deep domain knowledge,
                        and long-term technology partnerships.
                    </p>
                    <div class="quote-and-review-area py-4">
                        <blockquote class="quote-area">
                            <p class="quote">
                                Smart, scalable, and trusted by organisations across multiple industries.
                            </p>
                        </blockquote>
                        <div class="review-area">
                            <h3 class="title">2K+</h3>
                            <p>Users supported across VegaVision platforms</p>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="rts-btn btn-primary" aria-label="Contact VegaVision">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================= Our Mission Section ======================== -->
<section class="rts-section-gap bg_light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
                <img src="{{ asset('assets/images/about/mission.jpg') }}" alt="Our Mission" class="img-fluid rounded" loading="lazy">
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="about-content-style-one">
                    <header class="title-left-wrapper">
                        <span class="pre">Our Mission</span>
                        <h2 class="title rts-text-anime-style-1">
                            Empowering Digital Transformation
                        </h2>
                    </header>
                    <p class="disc">
                        Our mission is to empower organisations with innovative digital platforms that drive operational excellence, customer engagement, and business growth. We believe in building technology that adapts to your needs and scales with your ambitions.
                    </p>
                    <ul class="check-main-wrapper ps-0" role="list">
                        <li class="single-check">
                            <i class="fa-regular fa-check" aria-hidden="true"></i>
                            <p>Enterprise-grade security and compliance</p>
                        </li>
                        <li class="single-check">
                            <i class="fa-regular fa-check" aria-hidden="true"></i>
                            <p>Customisable solutions for every industry</p>
                        </li>
                        <li class="single-check">
                            <i class="fa-regular fa-check" aria-hidden="true"></i>
                            <p>Dedicated support and partnership</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================= Leadership Section ======================== -->
<section class="rts-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-center-wrapper mb-5">
                    <span class="pre">Leadership</span>
                    <h2 class="title rts-text-anime-style-1">
                        Meet Our Team
                    </h2>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="team-member text-center">
                    <img src="{{ asset('assets/images/team/ceo.jpg') }}" alt="CEO" class="img-fluid rounded-circle mb-3" loading="lazy">
                    <h5>Jane Doe</h5>
                    <p class="text-muted">Chief Executive Officer</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-member text-center">
                    <img src="{{ asset('assets/images/team/cto.jpg') }}" alt="CTO" class="img-fluid rounded-circle mb-3" loading="lazy">
                    <h5>John Smith</h5>
                    <p class="text-muted">Chief Technology Officer</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-member text-center">
                    <img src="{{ asset('assets/images/team/cso.jpg') }}" alt="CSO" class="img-fluid rounded-circle mb-3" loading="lazy">
                    <h5>Priya Patel</h5>
                    <p class="text-muted">Chief Solutions Officer</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
