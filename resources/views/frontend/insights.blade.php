@extends('frontend.layout.layout')

@section('content')
<!-- rts about-breadcrumb-area-start -->
<div class="rts-about-breadcrumb-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto">
                <div class="rts-about-breadcrumb-content">
                    <ul class="justify-content-center">
                        <li><a href="index.php">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li class="active"><a href="Insights.php">Insights</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts about-breadcrumb-area-end -->

<!-- rts blog area start -->
<div class="rts-blog-area rts-section-gap bg_light">
    <div class="container">

        <!-- Section Title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="title-center-wrapper">
                    <span class="pre">Insights & Resources</span>
                    <h2 class="title rts-text-anime-style-1">
                        Practical Knowledge for <br /> Modern IT Teams
                    </h2>
                    <p class="disc">
                        Explore expert insights, real-world use cases, and best practices across IT service management,
                        customer experience, billing, and network operations.
                    </p>
                </div>
            </div>
        </div>

        <!-- Blog Cards -->
        <div class="row g-5 mt--30">

            <!-- Blog 1 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <article class="single-blog-style-one">
                    <a href="service-management.php" class="thumbnail-blog">
                        <img src="assets/images/blog/1.webp" alt="Enterprise IT Service Management" />
                    </a>
                    <div class="inner-content-blog">
                        <span class="category">IT Service Management</span>
                        <a href="service-management.php">
                            <h5 class="title">
                                Why Enterprise IT Service Management Is No Longer Optional
                            </h5>
                        </a>
                        <a href="service-management.php" class="btn-line">
                            <span>Read Article</span>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- Blog 2 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <article class="single-blog-style-one">
                    <a href="isp-billing-blog.php" class="thumbnail-blog">
                        <img src="assets/images/blog/02.webp" alt="ISP Billing and Revenue Management" />
                    </a>
                    <div class="inner-content-blog">
                        <span class="category">ISP & Billing</span>
                        <a href="isp-billing-blog.php">
                            <h5 class="title">
                                Simplifying ISP Billing and Revenue Management with Purpose-Built Platforms
                            </h5>
                        </a>
                        <a href="isp-billing-blog.php" class="btn-line">
                            <span>Read Article</span>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- Blog 3 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <article class="single-blog-style-one">
                    <a href="omni-channel-blog.php" class="thumbnail-blog">
                        <img src="assets/images/blog/03.webp" alt="Omnichannel Contact Centre" />
                    </a>
                    <div class="inner-content-blog">
                        <span class="category">Customer Experience</span>
                        <a href="omni-channel-blog.php">
                            <h5 class="title">
                                Building Scalable Omnichannel Contact Centre Experiences
                            </h5>
                        </a>
                        <a href="omni-channel-blog.php" class="btn-line">
                            <span>Read Article</span>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </div>
                </article>
            </div>

        </div>
    </div>
</div>
<!-- rts blog area end -->
@include('frontend.partials.testimonial')

@include('frontend.partials.faq-contact')

@endsection
