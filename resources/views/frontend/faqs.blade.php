@extends('frontend.layout.layout')

@section('content')

<div class="rts-about-breadcrumb-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto">
                <div class="rts-about-breadcrumb-content">
                    <ul class="justify-content-center">
                        <li><a href="index.php">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li class="active"><a href="">FAQ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- rts faq area start -->
<section class="rts-faq-area-start rts-section-gap" aria-label="Frequently Asked Questions and Contact VegaVision">
    <div class="container">
        <div class="row align-items-center">

            <!-- FAQ Left Column -->
            <div class="col-lg-12 pr--50 pr_lg--20 pr_md--10 pr_sm--10">
                <div class="faq-left-area-main">
                    <header class="title-left-wrapper">
                        <span class="pre">FAQ</span>
                        <h2 class="title rts-text-anime-style-1">
                            Everything You Need <br />
                            to Know About VegaVision
                        </h2>
                    </header>
                    <p class="disc">
                        Have questions about VegaVision platforms and services? This section addresses common topics around
                        implementation, integration, and ongoing support.
                    </p>

                    <!-- FAQ Accordion -->
                    <div class="accordion-faq-one" id="faqAccordion">
                        <div class="accordion" id="accordionExample">

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        How long does a typical VegaVision implementation take?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Implementation timelines vary by project scope and integrations. Many organisations
                                        adopt a phased go-live over a few weeks to a few months, guided by our delivery team.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        Can VegaVision integrate with our existing systems?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Yes. VegaVision platforms integrate with popular ERP, CRM, directory, and network systems
                                        using APIs, connectors, and custom integration services.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Do you offer managed or SaaS options?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        VegaVision can be deployed on-premises, in your cloud, or as a fully managed SaaS solution,
                                        providing flexibility for your operations and hosting model.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
 

        </div>
    </div>
</section>
<!-- rts faq area end -->

@endsection