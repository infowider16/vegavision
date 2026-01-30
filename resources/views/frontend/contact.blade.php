@extends('frontend.layout.layout')

@section('content')
<!-- rts about-breadcrumb-area-start -->
<div class="rts-about-breadcrumb-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto">
                <div class="rts-about-breadcrumb-content">
                    <ul class="justify-content-center">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li class="active"><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts about-breadcrumb-area-end -->

@include('frontend.partials.faq-contact')
@endsection