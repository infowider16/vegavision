<header class="header-one header--sticky" role="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-wrapper-main">

                    <!-- Logo -->
                    <div class="logo-area">
                        <a href="{{ route('home') }}" aria-label="VegaVision Home">
                            <img src="{{ asset('assets/images/vega-logo.png') }}"
                                alt="VegaVision Enterprise Software & Digital Platforms Logo"
                                width="180" height="48"
                                loading="eager">
                        </a>
                    </div>

                    <div class="side-bar-icon d-block d-lg-none">
                        <button class="btn burger-btn"><i class="fa-solid fa-bars"></i></button>
                    </div>
                   
                    <!-- Navigation -->
                    <nav class="nav-area" role="navigation" aria-label="Primary Navigation">
                        <ul>
                            <li class="main-nav">
                                <a href="{{ route('home') }}" aria-current="page">Home</a>
                            </li>
                            <li class="main-nav">
                                <a href="{{ route('about') }}">About VegaVision</a>
                            </li>
                            <li class="main-nav has-dropdown mega-menu">
                                <a href="{{ route('solutions') }}"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    Solutions
                                </a>
                          <div class="rts-mega-menu" role="menu">
                                        <div class="wrapper">
                                            <div class="container">
                                                <div class="row g-0">

                                                    <!-- Column 2 -->
                                                    <div class="col-lg-6">
                                                        <ul class="mega-menu-item with-list parent-nav" role="none">
                                                              <li>
                                                                <a href="{{ route('solutions.billing-revenue-management') }}">
                                                                    Billing & Revenue Management
                                                                </a>
                                                            </li>
                                                              <li>
                                                                <a href="{{ route('solutions.contact-centre-omnichannel') }}">
                                                                Contact Centre
                                                                </a>
                                                            </li>
                                                             <li>
                                                                <a href="{{ route('solutions.crm-platforms') }}">CRM </a>
                                                            </li>
                                                              <li>
                                                                <a href="{{ route('solutions.isp-wifi-platforms') }}">
                                                                    ISP & Wi-Fi Management Platforms
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('solutions.it-service-management') }}">IT Service Management (ITSM)</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <!-- Column 3 -->
                                                    <div class="col-lg-6">
                                                        <ul class="mega-menu-item with-list parent-nav" role="none">
                                                            <li>
                                                                <a href="{{ route('solutions.network-monitoring') }}">
                                                                    Network Monitoring & Observability
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('solutions.custom-software') }}">
                                                                    Custom Software Development
                                                                </a>
                                                            </li>
                                                              <li>
                                                                <a href="{{ route('solutions.data-bi') }}">
                                                                    Data, Reporting & Business Intelligence
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('solutions.systems-integration-automation') }}">
                                                                    Systems Integration & Automation
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('solutions.managed-saas') }}">
                                                                    Managed Platforms & SaaS Solutions
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <!-- Column 4 -->
                                                    <!-- <div class="col-lg-3">
                                                        <ul class="mega-menu-item with-list parent-nav" role="none">
                                                            <li>
                                                                <a href="insights.php">Insights & Blog</a>
                                                            </li>
                                                            <li>
                                                                <a href="faq.php">Frequently Asked Questions</a>
                                                            </li>
                                                            <li>
                                                                <a href="contact.php">Contact VegaVision</a>
                                                            </li>
                                                        </ul>
                                                    </div> -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </li>
                            <li class="main-nav">
                                <a href="{{ route('case-studies') }}">Case Studies</a>
                            </li>
                            <li class="main-nav">
                                <a href="{{ route('insights') }}">Insights</a>
                            </li>
                            <li class="main-nav">
                                <a href="{{ route('contact') }}">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
