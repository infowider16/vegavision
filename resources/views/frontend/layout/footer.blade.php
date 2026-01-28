<!-- rts footer area start -->
<footer class="rts-footer-one pt--100">
    <div class="container pb--80">
        <div class="row">
            <div class="col-lg-3">
                <div class="left-wiget">
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ asset('assets/images/vega-logo-white.png') }}" alt="VegaVision Logo" />
                    </a>
                    <div class="footer-contact mt-4">
                        @if(!empty($site_settings['address']))
                            <div><i class="fas fa-map-marker-alt"></i> {{ $site_settings['address'] }}</div>
                        @endif
                        @if(!empty($site_settings['phone']))
                            <div><i class="fas fa-phone"></i> {{ $site_settings['phone'] }}</div>
                        @endif
                        @if(!empty($site_settings['email']))
                            <div><i class="fas fa-envelope"></i> {{ $site_settings['email'] }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="ms-auto col-lg-8 mt_md--50 mt_sm--50">
                <div class="footer-wized-wrapper">

                    <!-- Company Links -->
                    <div class="single">
                        <h6 class="title">Company</h6>
                        <ul>
                            <li><a href="{{ route('about') }}">About VegaVision</a></li>
                            <li><a href="{{ route('insights') }}">Insights</a></li> 
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>

                    <!-- Services Links -->
                    <div class="single">
                        <h6 class="title">Services</h6>
                        <ul>
                            <li><a href="{{ route('solutions') }}">Engagement Layer</a></li>
                            <li><a href="{{ route('solutions') }}">Integration Layer</a></li>
                            <li><a href="{{ route('solutions') }}">Observability Layer</a></li> 
                        </ul>
                    </div>

                    <!-- Resources Links -->
                    <div class="single">
                        <h6 class="title">Resources</h6>
                        <ul>
                            <li><a href="{{ route('case-studies') }}">Case Studies</a></li>  
                            <li><a href="#">FAQ</a></li>
                            <li><a href="{{ route('contact') }}">Help Center</a></li>
                        </ul>
                    </div>

                    <!-- Social Links -->
                    <div class="single">
                        <h6 class="title">Social Media</h6>
                        <ul>
                            @if(!empty($site_settings['facebook']))
                                <li><a href="{{ $site_settings['facebook'] }}" target="_blank" aria-label="Facebook">Facebook</a></li>
                            @endif
                            @if(!empty($site_settings['twitter']))
                                <li><a href="{{ $site_settings['twitter'] }}" target="_blank" aria-label="Twitter">Twitter</a></li>
                            @endif
                            @if(!empty($site_settings['linkedin']))
                                <li><a href="{{ $site_settings['linkedin'] }}" target="_blank" aria-label="LinkedIn">LinkedIn</a></li>
                            @endif
                            @if(!empty($site_settings['instagram']))
                                <li><a href="{{ $site_settings['instagram'] }}" target="_blank" aria-label="Instagram">Instagram</a></li>
                            @endif
                            @if(!empty($site_settings['pinterest']))
                                <li><a href="{{ $site_settings['pinterest'] }}" target="_blank" aria-label="Pinterest">Pinterest</a></li>
                            @endif
                            @if(!empty($site_settings['google']))
                                <li><a href="{{ $site_settings['google'] }}" target="_blank" aria-label="Google">Google</a></li>
                            @endif
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Copyright -->
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-1">
                        <p class="disc">
                            &copy; <script>
                                document.write(new Date().getFullYear());
                            </script> VegaVision. All Rights Reserved.
                        </p>
                        <ul>
                            <li><a href="{{ route('about') }}">About Company</a></li>
                            <li><a href="{{ route('insights') }}">Blog</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- rts footer area end -->

<!-- Sidebar / Mobile Menu -->
<div id="side-bar" class="side-bar header-two">
    <div class="rts-sidebar-menu-desktop">
        <div class="logo-area">
            <a class="logo" href="{{ route('home') }}"><img src="{{ asset('assets/images/vega-logo-white.png') }}" alt="VegaVision Logo" /></a>
            <button class="close-icon-menu" aria-label="Close Sidebar">
                <i class="far fa-times"></i>
            </button>
        </div>
    </div>
    <div class="mobile-menu-main d-block d-xl-none">
        <nav class="nav-main mainmenu-nav mt--30">
            <ul class="mainmenu metismenu" id="mobile-menu-active">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About VegaVision</a></li>
                <li class="has-droupdown">
                    <a href="{{ route('solutions') }}" class="main">Solutions</a>
                    <ul class="submenu mm-collapse">
                        <li><a href="{{ route('solutions') }}">Billing & Revenue</a></li>
                        <li><a href="{{ route('solutions') }}">Contact Centre</a></li>
                        <li><a href="{{ route('solutions') }}">CRM</a></li>
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
