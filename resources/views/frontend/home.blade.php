@extends('frontend.layout.layout')

@section('content')

<!-- ======================= Banner Slider Section ======================== -->
<section class="banner-swiper-main-wrapper-one" aria-label="VegaVision Hero Slider">
    <div class="swiper mySwiper-banner-one">
        <div class="swiper-wrapper">

            <!-- Slide 01 -->
            <div class="swiper-slide">
                <section class="rts-banner-area-one two bg_image">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="banner-style-one-wrapper-inner">
                                    <span class="pre-title">
                                        Enterprise Software & Digital Platforms
                                    </span>

                                    <h1 class="title">
                                        Redevelop Your Operations with VegaVision
                                    </h1>

                                    <p class="disc">
                                        VegaVision is the software and digital platforms arm of the MBV Group,
                                        delivering enterprise-grade solutions ranging from Billing & Revenue, CRM,
                                        Contact Centre Platforms, ISP & Wi-Fi Platforms, ITSM, Network Monitoring &
                                        Observability, and Custom Software Development.
                                    </p>

                                    <div class="button-wrapper">
                                        <a href="solutions.php" class="rts-btn btn-primary btn-white">
                                            View Solutions
                                        </a>
                                        <a href="contact.php" class="rts-btn btn-primary">
                                            Talk to Our Team
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Slide 02 -->
            <div class="swiper-slide">
                <section class="rts-banner-area-one bg_image">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="banner-style-one-wrapper-inner">
                                    <span class="pre-title">
                                        ITSM, CRM, Billing & More
                                    </span>

                                    <h2 class="title rts-text-anime-style-1">
                                        End-to-End Platforms for Modern Enterprises
                                    </h2>

                                    <p class="disc">

                                        VegaVision platforms streamline service delivery, customer engagement, and
                                        billing operations across large enterprises, public sector, financial services,
                                        education institutions, ISPs, and other industries.
                                    </p>

                                    <div class="button-wrapper">
                                        <a href="about.php" class="rts-btn btn-primary btn-white">
                                            About VegaVision
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Slide 03 -->
            <div class="swiper-slide">
                <section class="rts-banner-area-one three bg_image">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="banner-style-one-wrapper-inner">
                                    <span class="pre-title">
                                        Enterprise-Grade • Scalable • Secure
                                    </span>

                                    <h2 class="title rts-text-anime-style-1">
                                        Comprehensive IT Solutions for Every Organisation
                                    </h2>

                                    <p class="disc">
                                        From ITSM and CRM to network observability and ISP management, VegaVision
                                        delivers
                                        integrated platforms that ensure reliability, compliance, and long-term digital
                                        growth.
                                    </p>

                                    <div class="button-wrapper">
                                        <a href="contact.php" class="rts-btn btn-primary btn-white">
                                            Schedule a Consultation
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>

        <!-- Slider Navigation -->
        <button class="swiper-button-prev" aria-label="Previous slide">
            <i class="fa-regular fa-chevron-left"></i>
        </button>
        <button class="swiper-button-next" aria-label="Next slide">
            <i class="fa-regular fa-chevron-right"></i>
        </button>
    </div>
</section>

<!-- ======================= Brand Partners Section ======================== -->
@include('frontend.partials.brand-partners')

<!-- =======================
 solutions ecosystem Section
======================== -->
@include('frontend.partials.solutions-ecosystem')

<!-- =======================
 Solutions / Services Section
======================== -->
@include('frontend.partials.solutions')

<!-- =======================
 About VegaVision Section
======================== -->
@include('frontend.partials.about')
<!-- rts about area end -->

<!-- =======================
 Case Studies Section
======================== -->
@include('frontend.partials.case-studies-slider')
<!-- rts case area end -->

<!-- =======================
 IT Features / Vision Section
======================== -->
@include('frontend.partials.vision')
<!-- what we want to do end -->

<!-- rts testimonials area start -->
@include('frontend.partials.testimonial')
<!-- rts testimonials area end -->

<!-- rts blog area start -->
@include('frontend.partials.blog')
<!-- rts blog area end -->

<!-- rts faq area start -->
@include('frontend.partials.faq-contact')
<!-- rts faq area end -->



@endsection
