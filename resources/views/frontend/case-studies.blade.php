@extends('frontend.layout.layout')

@section('content')
<!-- rts about-breadcrumb-area-start -->

<!-- rts about-breadcrumb-area-start -->
<div class="rts-about-breadcrumb-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto">
                <div class="rts-about-breadcrumb-content">
                    <ul class="justify-content-center">
                        <li><a href="index.php">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li class="active"><a href="case-studies.php">Case Studies</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts about-breadcrumb-area-end -->


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



<!-- rts faq area end -->
@endsection
