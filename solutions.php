<?php include 'includes/header.php'; ?>


<style>
    .solutions-ecosystem .observability-products {
        bottom: 35%;
    }

    .solutions-ecosystem .ecosystem-diagram {
        transform: scale(0.65);
    }

    .solutions-ecosystem .observability-products span {
        font-size: 1.5rem;
    }

    .solutions-ecosystem .layer.engagement {
        border-color: var(--color-blue);
    }

    .solutions-ecosystem .layer.integration {
        border-color: #6c9aff;
    }

    .solutions-ecosystem .layer.observability {
        border-color: var(--color-sky);
    }

    .solutions-ecosystem .layer.observability>.layer-label {
        top: -30px;
        color: var(--color-sky);
        border: 2px solid rgba(130, 180, 64, 0.3);
    }

    .solutions-ecosystem .layer.integration>.layer-label {
        top: -30px;
        color: var(--color-blue);
        border: 2px solid rgba(11, 77, 245, 0.3);
    }

    .solutions-ecosystem .layer.engagement .layer-label {
        color: #133A53;
        background-color: var(--color-white);
        border: 2px solid var(--color-blue);
    }

    .solutions-ecosystem .row .col-md-6:first-child .products span,
    .solutions-ecosystem .row .col-md-6:first-child .layer.engagement>.layer-label {
        background: var(--color-blue);
        border-color: var(--color-blue);
        color: #fff;
    }

    .solutions-ecosystem .row .col-md-6:nth-child(2) .products span,
    .solutions-ecosystem .row .col-md-6:nth-child(2) .layer.integration>.layer-label {
        background: #6c9aff;
        color: #292929;
        border-color: #6c9aff;
    }

    .solutions-ecosystem .row .col-md-6:last-child .products span,
    .solutions-ecosystem .row .col-md-6:last-child .layer.observability>.layer-label {
        background: var(--color-sky);
        border-color: var(--color-sky);
        color: #fff;
    }

    .solutions-ecosystem .observability-products {
        justify-content: center;
    }
</style>


<!-- rts about-breadcrumb-area-start -->
<div class="rts-about-breadcrumb-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto">
                <div class="rts-about-breadcrumb-content">
                    <ul class="justify-content-center">
                        <li><a href="index.php">Home</a></li>
                        <li><i class="fa fa-chevron-right"></i></li>
                        <li class="active"><a href="Solutions.php">Solutions</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts about-breadcrumb-area-end -->


<!-- =======================
 Solutions / Services Section
======================== -->
<section class="rts-service-area-one rts-section-gap bg_light" aria-labelledby="solutions-title">
    <div class="container-fluid">

        <!-- Section Header -->
        <div class="container">
            <header class="row">
                <div class="col-lg-12">
                    <div class="title-area-between">
                        <div class="title-left-wrapper">
                            <span class="pre">Solutions</span>
                            <h2 id="solutions-title" class="title rts-text-anime-style-1">
                                Enterprise Software <br />& Platforms
                            </h2>
                        </div>

                        <div class="right-area">
                            <p class="disc">
                                VegaVision provides a full suite of enterprise software platforms that power IT service
                                management, customer engagement, billing, network operations, and data-driven
                                decision-making.
                            </p>
                        </div>
                    </div>
                </div>
            </header>
        </div>

        <!-- =======================
            Primary Solutions
        ======================== -->



        <div class="solutions-ecosystem">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-4">
                        <h4 class="text-center mb-2 mb-lg-5">Engagement Layer</h4>
                        <div class="ecosystem-diagram">
                            <!-- Observability Layer -->
                            <div class="layer observability">
                                <span class="layer-label">Observability Layer</span>

                                <!-- Integration Layer -->
                                <div class="layer integration">
                                    <span class="layer-label">Integration Layer</span>

                                    <!-- Engagement Layer -->
                                    <div class="layer engagement" style=" border-width: 20px;">
                                        <span class="layer-label">Engagement Layer</span>

                                        <div class="core-title">
                                            <h3>Services</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="products observability-products">
                                    <span>Contact Center</span>
                                    <span>IT Service Management</span>
                                    <span>Custom Software</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <h4 class="text-center mb-2 mb-lg-5">Integration Layer</h4>
                        <div class="ecosystem-diagram">
                            <!-- Observability Layer -->
                            <div class="layer observability">
                                <span class="layer-label">Observability Layer</span>

                                <!-- Integration Layer -->
                                <div class="layer integration" style=" border-width: 20px;">
                                    <span class="layer-label">Integration Layer</span>

                                    <!-- Engagement Layer -->
                                    <div class="layer engagement">
                                        <span class="layer-label">Engagement Layer</span>

                                        <div class="core-title">
                                            <h3>Services</h3>
                                        </div>

                                    </div>


                                </div>

                                <div class="products observability-products">
                                    <span>Billing & Revenue</span>
                                    <span>CRM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <h4 class="text-center mb-2 mb-lg-5">Observability Layer</h4>
                        <div class="ecosystem-diagram">
                            <!-- Observability Layer -->
                            <div class="layer observability" style=" border-width: 20px;">
                                <span class="layer-label">Observability Layer</span>

                                <!-- Integration Layer -->
                                <div class="layer integration">
                                    <span class="layer-label">Integration Layer</span>

                                    <!-- Engagement Layer -->
                                    <div class="layer engagement">
                                        <span class="layer-label">Engagement Layer</span>

                                        <div class="core-title">
                                            <h3>Services</h3>
                                        </div>

                                    </div>
                                </div>

                                <div class="products observability-products">
                                    <span>ISP & Wi-Fi Management</span>
                                    <span>Monitoring & Observability</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row g-5 mt--10">
                <!-- Engagement -->
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <h3 class="service-heading">Engagement</h3>
                        </div>
                        <!-- Contact & Omnichannel -->
                        <article class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                            <div class="single-service-style-one">
                                <div class="icon" aria-hidden="true">
                                    <i class="fa-sharp fa-solid fa-headset"></i>
                                </div>
                                <a href="contact-centre-omnichannel.php">
                                    <h3 class="title">Contact Center</h3>
                                </a>
                                <p class="disc">
                                    Deliver consistent, high-quality support across voice, email, chat,
                                    social, and messaging channels.
                                </p>
                            </div>
                        </article>
                        <!-- IT Service Management -->
                        <article class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                            <div class="single-service-style-one">
                                <div class="icon" aria-hidden="true">
                                    <i class="fa-sharp fa-solid fa-gears"></i>
                                </div>
                                <a href="itsm.php">
                                    <h3 class="title">IT Service Management</h3>
                                </a>
                                <p class="disc">
                                    Centralise incidents, requests, changes, and assets with configurable,
                                    ITIL-aligned workflows and self-service portals.
                                </p>
                            </div>
                        </article>
                        <!-- Custom Software -->
                        <article class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                            <div class="single-service-style-one">
                                <div class="icon" aria-hidden="true">
                                    <i class="fa-sharp fa-solid fa-code"></i>
                                </div>
                                <a href="custom-software.php">
                                    <h3 class="title">Custom Software</h3>
                                </a>
                                <p class="disc">
                                    Design and build bespoke applications, portals, and workflows
                                    aligned to your specific business processes.
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
                <!-- Integration -->
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <h3 class="service-heading">Integration</h3>
                        </div>
                        <!-- Billing & Revenue -->
                        <article class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                            <div class="single-service-style-one">
                                <div class="icon" aria-hidden="true">
                                    <i class="fa-sharp fa-solid fa-file-invoice-dollar"></i>
                                </div>
                                <a href="billing-revenue-management.php">
                                    <h3 class="title">Billing & Revenue</h3>
                                </a>
                                <p class="disc">
                                    Automate rating, invoicing, and collections with flexible pricing
                                    models for subscriptions and usage-based services.
                                </p>
                            </div>
                        </article>
                        <!-- CRM Platforms -->
                        <article class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                            <div class="single-service-style-one">
                                <div class="icon" aria-hidden="true">
                                    <i class="fa-sharp fa-solid fa-users-gear"></i>
                                </div>
                                <a href="crm-platforms.php">
                                    <h3 class="title">CRM </h3>
                                </a>
                                <p class="disc">
                                    Manage sales, service, and customer engagement through a unified CRM
                                    platform tailored to your organisation.
                                </p>
                            </div>
                        </article>

                    </div>
                </div>
                <!-- Observability -->
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <h3 class="service-heading">Observability</h3>
                        </div>
                        <!-- ISP & Wi-Fi Management -->
                        <article class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                            <div class="single-service-style-one">
                                <div class="icon" aria-hidden="true">
                                    <i class="fa-sharp fa-solid fa-wifi"></i>
                                </div>
                                <a href="isp-wifi-platforms.php">
                                    <h3 class="title">ISP & Wi-Fi Management</h3>
                                </a>
                                <p class="disc">
                                    Operate carrier-grade ISP and Wi-Fi services with provisioning,
                                    policy control, and subscriber management.
                                </p>
                            </div>
                        </article>

                        <!-- Monitoring & Observability -->
                        <article class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                            <div class="single-service-style-one">
                                <div class="icon" aria-hidden="true">
                                    <i class="fa-sharp fa-solid fa-network-wired"></i>
                                </div>
                                <a href="network-monitoring.php">
                                    <h3 class="title">Monitoring & Observability</h3>
                                </a>
                                <p class="disc">
                                    Gain real-time visibility into network performance, uptime, and
                                    security across distributed environments.
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
                <!-- Value Added Services -->
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <h3 class="service-heading">Value Added Services</h3>
                        </div>
                        <!-- Data, Reporting & BI -->
                        <article class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                            <div class="single-service-style-one">
                                <div class="icon" aria-hidden="true">
                                    <i class="fa-sharp fa-solid fa-chart-line"></i>
                                </div>
                                <a href="data-bi.php">
                                    <h3 class="title">Data, Reporting & BI</h3>
                                </a>
                                <p class="disc">
                                    Transform operational data into actionable insights with dashboards,
                                    reporting, and advanced analytics.
                                </p>
                            </div>
                        </article>

                        <!-- Integration & Automation -->
                        <article class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                            <div class="single-service-style-one">
                                <div class="icon" aria-hidden="true">
                                    <i class="fa-sharp fa-solid fa-diagram-project"></i>
                                </div>
                                <a href="systems-integration-automation.php">
                                    <h3 class="title">Integration & Automation</h3>
                                </a>
                                <p class="disc">
                                    Connect legacy and modern systems, automate cross-platform
                                    processes, and orchestrate secure data flows.
                                </p>
                            </div>
                        </article>

                        <!-- Managed Platforms & SaaS -->
                        <article class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                            <div class="single-service-style-one">
                                <div class="icon" aria-hidden="true">
                                    <i class="fa-sharp fa-solid fa-cloud"></i>
                                </div>
                                <a href="managed-saas.php">
                                    <h3 class="title">Managed Platforms & SaaS</h3>
                                </a>
                                <p class="disc">
                                    Deploy and operate Vegavision platform as fully managed services or saas solutions, with defined SLAs and 24/7 enterprise support.
                                </p>
                            </div>
                        </article>

                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Decorative Shape -->
    <div class="shape-img" aria-hidden="true">
        <img src="assets/images/service/13.svg" alt="">
    </div>
</section>

<script>
    // Tab functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs and contents
                tabs.forEach(t => t.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                // Add active class to clicked tab
                tab.classList.add('active');

                // Show corresponding content
                const tabId = tab.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });

        // Highlight popular plans
        const popularPlans = document.querySelectorAll('.highlighted');
        popularPlans.forEach(plan => {
            const badge = document.createElement('div');
            badge.className = 'product-badge';
            badge.style.position = 'absolute';
            badge.style.top = '10px';
            badge.style.right = '10px';
            badge.style.backgroundColor = 'var(--color-sky)';
            badge.textContent = 'POPULAR';
            plan.style.position = 'relative';
            plan.appendChild(badge);
        });
    });
</script>

<!-- =======================
 Case Studies Section
======================== -->
<section class="rts-case-area rts-section-gap bg_light" aria-labelledby="case-studies-title">
    <div class="container">

        <!-- Section Header -->
        <header class="row">
            <div class="col-lg-12">
                <div class="title-area-between">
                    <div class="title-left-wrapper">
                        <span class="pre">Case Studies</span>
                        <h2 id="case-studies-title" class="title rts-text-anime-style-1">
                            Transforming Organisations <br />
                            with VegaVision Platforms
                        </h2>
                    </div>

                    <div class="right-area">
                        <p class="disc">
                            Explore how enterprises, municipalities, education institutions,
                            and ISPs use VegaVision to modernise services, optimise operations,
                            and deliver better digital experiences.
                        </p>
                        <!--a
                            href="case-studies.php"
                            class="btn-line"
                            aria-label="View all VegaVision case studies">
                            <span>View all Projects</span>
                            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                        </a-->
                    </div>
                </div>
            </div>
        </header>

        <!-- Case Studies Slider -->
        <div class="row row-cols-md-5 row-cols-1">
            <div class="col-lg-12">
                <div class="swiper mySwiper-case-one" role="region" aria-label="VegaVision case studies carousel">
                    <div class="swiper-wrapper">

                        <!-- Case Study 1 -->
                        <article class="swiper-slide">
                            <div class="single-case-style-one">

                                <a href="Municipal-ITSM.php" class="thumbnail-case"
                                    aria-label="Municipal IT Service Management case study">
                                    <img src="assets/images/case/01.webp"
                                        alt="Municipal IT service desk transformation using VegaVision ITSM platform"
                                        loading="lazy" />
                                </a>

                                <a href="Municipal-ITSM.php" class="inner-content">
                                    <span>Municipal ITSM</span>
                                    <h3 class="title">
                                        City Service Desk Transformation
                                    </h3>
                                </a>

                            </div>
                        </article>

                        <!-- Case Study 2 -->
                        <article class="swiper-slide">
                            <div class="single-case-style-one">

                                <a href="isp-billing.php" class="thumbnail-case"
                                    aria-label="ISP billing and revenue management case study">
                                    <img src="assets/images/case/02.webp"
                                        alt="ISP usage-based billing modernisation with VegaVision revenue management platform"
                                        loading="lazy" />
                                </a>

                                <a href="isp-billing.php" class="inner-content">
                                    <span>ISP Billing</span>
                                    <h3 class="title">
                                        Usage-Based Billing Modernisation
                                    </h3>
                                </a>

                            </div>
                        </article>

                        <!-- Case Study 3 -->
                        <article class="swiper-slide">
                            <div class="single-case-style-one">

                                <a href="network-monitoring-study.php" class="thumbnail-case"
                                    aria-label="Network monitoring and observability case study">
                                    <img src="assets/images/case/03.webp"
                                        alt="Proactive network monitoring and observability powered by VegaVision"
                                        loading="lazy" />
                                </a>

                                <a href="network-monitoring-study.php" class="inner-content">
                                    <span>Network Monitoring</span>
                                    <h3 class="title">
                                        Proactive Network Observability
                                    </h3>
                                </a>

                            </div>
                        </article>

                        <!-- Case Study 4 -->
                        <article class="swiper-slide">
                            <div class="single-case-style-one">

                                <a href="omnichannel-CX.php" class="thumbnail-case"
                                    aria-label="Omnichannel contact centre transformation case study">
                                    <img src="assets/images/case/04.webp"
                                        alt="Unified omnichannel contact centre experience using VegaVision platforms"
                                        loading="lazy" />
                                </a>

                                <a href="omnichannel-CX.php" class="inner-content">
                                    <span>Omnichannel CX</span>
                                    <h3 class="title">
                                        Unified Contact Centre Experience
                                    </h3>
                                </a>

                            </div>
                        </article>

                        <!-- Duplicate slides as needed -->

                    </div>

                    <!-- Pagination -->
                    <div class="swiper-pagination" aria-hidden="true"></div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- rts case area end -->

<!-- =======================
 IT Features / Vision Section
======================== -->
<section class="rts-section-gap our-vission" aria-labelledby="vision-title">
    <div class="container">
        <div class="row align-items-center">

            <!-- Vision Images -->
            <div class="col-lg-5">
                <div class="vision-left-main-image">

                    <figure class="thumbnail-vision">
                        <img src="https://media.istockphoto.com/id/1947499362/photo/happy-group-of-business-people-discussing-strategy-during-team-meeting-at-the-office-desk.jpg?s=612x612&w=0&k=20&c=UXPrlQx09d8EP4_kTdAa-vC2LxD_ppY1tiG7eTPGVbE="
                            alt="Integrated enterprise IT platforms and digital transformation concept"
                            loading="lazy" />
                    </figure>

                    <img class="board" src="assets/images/it-services.jpg" alt="" aria-hidden="true" loading="lazy" />
                </div>
            </div>

            <!-- Vision Content -->
            <div class="offset-lg-1 col-lg-6 pl--50 pl_sm--10 pl_md--10 mt_md--50 mt_sm--50">
                <div class="our-vision-right-content">

                    <!-- Section Title -->
                    <header class="title-left-wrapper">
                        <span class="pre">IT Features</span>
                        <h2 id="vision-title" class="title rts-text-anime-style-1">
                            Empowering Business with <br />
                            Cutting-Edge Technology
                        </h2>
                    </header>

                    <!-- Description -->
                    <p class="disc">
                        VegaVision platforms are built to handle real-world complexity while
                        keeping teams productive and connected. Organisations gain the tools
                        they need to manage services, networks, and customers within a single
                        integrated digital ecosystem.
                    </p>

                    <!-- Feature List -->
                    <ul class="check-main-wrapper ps-0" role="list">
                        <li class="single-check">
                            <i class="fa-regular fa-check" aria-hidden="true"></i>
                            <p>Multichannel ticketing and case management</p>
                        </li>
                        <li class="single-check">
                            <i class="fa-regular fa-check" aria-hidden="true"></i>
                            <p>Automation of routine and approval workflows</p>
                        </li>
                        <li class="single-check">
                            <i class="fa-regular fa-check" aria-hidden="true"></i>
                            <p>Real-time dashboards and operational insights</p>
                        </li>
                    </ul>

                    <!-- CTA -->
                    <a href="solutions.php" class="rts-btn btn-primary"
                        aria-label="Explore VegaVision enterprise software platforms">
                        Explore Platforms
                    </a>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- what we want to do end -->

<!-- rts testimonials area start -->
<?php include 'includes/testimonials.php'; ?>
<!-- rts testimonials area end -->

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

<!-- rts faq area start -->
<section class="rts-faq-area-start rts-section-gap" aria-label="Frequently Asked Questions and Contact VegaVision">
    <div class="container">
        <div class="row align-items-center">

            <!-- FAQ Left Column -->
            <div class="col-lg-5 pr--50 pr_lg--20 pr_md--10 pr_sm--10">
                <div class="faq-left-area-main">
                    <header class="title-left-wrapper">
                        <span class="pre">FAQ</span>
                        <h2 class="title rts-text-anime-style-1">
                            Everything You Need <br />
                            to Know About VegaVision
                        </h2>
                    </header>
                    <p class="disc">
                        Have questions about VegaVision platforms and services? This section addresses common topics
                        around
                        implementation, integration, and ongoing support.
                    </p>

                    <!-- FAQ Accordion -->
                    <div class="accordion-faq-one" id="faqAccordion">
                        <div class="accordion" id="accordionExample">

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        How long does a typical VegaVision implementation take?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Implementation timelines vary by project scope and integrations. Many
                                        organisations
                                        adopt a phased go-live over a few weeks to a few months, guided by our delivery
                                        team.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Can VegaVision integrate with our existing systems?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Yes. VegaVision platforms integrate with popular ERP, CRM, directory, and
                                        network systems
                                        using APIs, connectors, and custom integration services.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Do you offer managed or SaaS options?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        VegaVision can be deployed on-premises, in your cloud, or as a fully managed
                                        SaaS solution,
                                        providing flexibility for your operations and hosting model.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form Right Column -->
            <div class="offset-lg-1 col-lg-6">
                <div class="contact-form-style-one mt--30">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="title mb-0">Let’s Talk</h3>
                        <a href="#">+27 (0)10 313-0090</a>
                    </div>
                    <form action="#" method="post" aria-label="Contact Form to discuss IT solutions">
                        <div class="single-input-wrapper">
                            <div class="single-input">
                                <label for="name" class="visually-hidden">Full Name</label>
                                <input type="text" id="name" name="name" placeholder="Full Name" required />
                            </div>
                            <div class="single-input">
                                <label for="organization" class="visually-hidden">Organisation</label>
                                <input type="text" id="organization" name="organization" placeholder="Organisation" />
                            </div>
                        </div>

                        <div class="single-input-wrapper">
                            <div class="single-input">
                                <label for="email" class="visually-hidden">Work Email</label>
                                <input type="email" id="email" name="email" placeholder="Work Email" required />
                            </div>
                            <div class="single-input">
                                <label for="phone" class="visually-hidden">Phone Number</label>
                                <input type="tel" id="phone" name="phone" placeholder="Phone Number" />
                            </div>
                        </div>

                        <div class="single-input">
                            <label for="message" class="visually-hidden">Message</label>
                            <textarea id="message" name="message" placeholder="Tell us about your business requirements"
                                required></textarea>
                        </div>

                        <button class="rts-btn btn-primary" type="submit">Send Message</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- rts faq area end -->



<?php include 'includes/footer.php'; ?>