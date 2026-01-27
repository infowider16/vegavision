<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Primary SEO -->
    <title>VegaVision | Enterprise ITSM, CRM, Billing & Digital Platforms</title>
    <meta name="description"
        content="VegaVision delivers enterprise-grade ITSM, CRM, billing, network monitoring, and digital platforms for enterprises, ISPs, municipalities, and institutions.">
    <meta name="robots" content="index, follow">

    <!-- Canonical -->
    <link rel="canonical" href="https://www.vegavision.com/">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/favicon.png') }}">

    <!-- Open Graph (Social Sharing) -->
    <meta property="og:title" content="VegaVision | Enterprise Software & Digital Platforms">
    <meta property="og:description"
        content="Enterprise ITSM, CRM, billing, network monitoring, and digital platforms by VegaVision.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.vegavision.com/">
    <meta property="og:image" content="{{ asset('assets/images/og-image.jpg') }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="VegaVision | Enterprise Software & Platforms">
    <meta name="twitter:description"
        content="Enterprise-grade ITSM, CRM, billing, and network platforms built for scale.">
    <meta name="twitter:image" content="{{ asset('assets/images/og-image.jpg') }}">

    <!-- Preload Critical CSS -->
    <link rel="preload" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}" as="style">
    <link rel="preload" href="{{ asset('assets/css/style.css') }}" as="style">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/metismenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnifying-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Responsive.css -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

</head>

<body class="demo-default">

    @include('frontend.layout.header')

    @yield('content')

    @include('frontend.layout.footer')

    <!-- Sidebar / Mobile Menu -->
    <div id="side-bar" class="side-bar header-two">
        <div class="rts-sidebar-menu-desktop">
            <div class="logo-area">
                <a class="logo" href="{{ route('home') }}"><img src="{{ asset('assets/images/vega-logo-white.png') }}"
                        alt="VegaVision Logo" /></a>
                <button class="close-icon-menu" aria-label="Close Sidebar">
                    <i class="far fa-times"></i>
                </button>
            </div>
        </div>

        <div class="mobile-menu-main d-block d-xl-none">
            <nav class="nav-main mainmenu-nav mt--30">
                <ul class="mainmenu metismenu" id="mobile-menu-active">

                    <li>
                        <a href="{{ route('home') }}" aria-current="page">Home</a>
                    </li>

                    <li><a href="{{ route('about') }}">About VegaVision</a></li>

                    <li class="has-droupdown">
                        <a href="{{ route('solutions') }}" class="main">Solutions</a>
                        <ul class="submenu mm-collapse">
                            <li><a href="{{ route('solutions') }}">Billing & Revenue</a></li>
                            <li><a href="{{ route('solutions') }}">Contact Centre</a></li>
                            <li><a href="{{ route('solutions') }}">CRM </a></li>
                            <li><a href="{{ route('solutions') }}">ISP & Wi-Fi Management</a></li>
                            <li><a href="{{ route('solutions') }}">IT Service Management (ITSM)</a></li>
                            <li><a href="{{ route('solutions') }}">Network Monitoring & Observability</a></li>
                            <li><a href="{{ route('solutions') }}">Custom Software Development</a></li>
                            <li><a href="{{ route('solutions') }}">Data, Reporting & BI</a></li>
                            <li><a href="{{ route('solutions') }}">Systems Integration & Automation</a></li>
                            <li><a href="{{ route('solutions') }}">Managed Platforms & SaaS</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('case-studies') }}">Case Studies</a></li>
                    <li><a href="{{ route('insights') }}">Insights</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>

                </ul>
            </nav>

            <!-- Social Sidebar -->
            <div class="rts-social-border-area right-sidebar mt--50">
                <ul>
                    <li><a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div id="anywhere-home" class=""></div>
    <div id="anywhere-home2" class=""></div>

    <!-- Loader -->
    <!-- <div class="loader-wrapper">
        <div class="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div> -->

    <!-- Progress Circle -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>

    <!-- JS Scripts -->
    <script defer src="{{ asset('assets/js/plugins/jquery.js') }}"></script>
    <script defer src="{{ asset('assets/js/plugins/jquery-appear.js') }}"></script>
    <script defer src="{{ asset('assets/js/plugins/odometer.js') }}"></script>
    <script defer src="{{ asset('assets/js/plugins/gsap.js') }}"></script>
    <script defer src="{{ asset('assets/js/plugins/split-text.js') }}"></script>
    <script defer src="{{ asset('assets/js/plugins/scroll-trigger.js') }}"></script>
    <script defer src="{{ asset('assets/js/plugins/smooth-scroll.js') }}"></script>
    <script defer src="{{ asset('assets/js/plugins/metismenu.js') }}"></script>
    <script defer src="{{ asset('assets/js/plugins/popup.js') }}"></script>
    <script defer src="{{ asset('assets/js/plugins/contact.form.js') }}"></script>
    <script defer src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/plugins/swiper.js') }}"></script>
    <script defer src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showSweetAlert(icon, title, text, callback = null) {
            Swal.fire({
                icon: icon,
                title: title,
                text: text
            }).then(function(result) {
                if (callback && result.isConfirmed) {
                    callback();
                }
            });
        }
    </script>

</body>

</html>