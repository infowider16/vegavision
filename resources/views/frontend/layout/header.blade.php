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

                                                    <!-- Column 1 -->
                                                    <!-- <div class="col-lg-3">
                                                        <ul class="mega-menu-item with-list parent-nav" role="none">
                                                            <li>
                                                                <a href="about.php">About VegaVision</a>
                                                            </li>
                                                            <li>
                                                                <a href="solutions.php">Enterprise Software Solutions</a>
                                                            </li>
                                                            <li>
                                                                <a href="solutions.php">Industries We Serve</a>
                                                            </li>
                                                            <li>
                                                                <a href="solutions.php">Technology Partners</a>
                                                            </li>
                                                            <li>
                                                                <a href="solutions.php">Case Studies & Use Cases</a>
                                                            </li>
                                                        </ul>
                                                    </div> -->

                                                    <!-- Column 2 -->
                                                    <div class="col-lg-6">
                                                        <ul class="mega-menu-item with-list parent-nav" role="none">
                                                              <li>
                                                                <a href="billing-revenue-management.php">
                                                                    Billing & Revenue Management
                                                                </a>
                                                            </li>
                                                              <li>
                                                                <a href="contact-centre-omnichannel.php">
                                                                Contact Centre
                                                                </a>
                                                            </li>
                                                             <li>
                                                                <a href="crm-platforms.php">CRM </a>
                                                            </li>
                                                              <li>
                                                                <a href="isp-wifi-platforms.php">
                                                                    ISP & Wi-Fi Management Platforms
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="itsm.php">IT Service Management (ITSM)</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <!-- Column 3 -->
                                                    <div class="col-lg-6">
                                                        <ul class="mega-menu-item with-list parent-nav" role="none">
                                                            <li>
                                                                <a href="network-monitoring.php">
                                                                    Network Monitoring & Observability
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="custom-software.php">
                                                                    Custom Software Development
                                                                </a>
                                                            </li>
                                                              <li>
                                                                <a href="data-bi.php">
                                                                    Data, Reporting & Business Intelligence
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="systems-integration-automation.php">
                                                                    Systems Integration & Automation
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="managed-saas.php">
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
