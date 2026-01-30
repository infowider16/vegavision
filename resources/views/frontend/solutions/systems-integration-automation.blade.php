@extends('frontend.layout.layout')

@section('content')

<div class="service-inner container">
    <!-- Hero Section -->
    <section class="hero-section">
        <h2>Integration &amp; Automation</h2>
        <p class="tagline">Connect systems. Remove manual work.</p>
        <p class="description">
            Integrate legacy and modern systems while automating cross-platform workflows and data exchange.
            <span class="highlight">This is the backbone that keeps your digital ecosystem aligned.</span>
        </p>
    </section>

    <!-- What It Enables Section -->
    <section class="enables-section">
        <h3>What It Enables</h3>
        <div class="enables-grid">
            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-plug"></i>
                </div>
                <h4>API-Based Integrations</h4>
                <p>API-based system integrations connecting legacy and modern platforms seamlessly.</p>
            </div>

            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <h4>Automated Workflows</h4>
                <p>Automated workflows across platforms to eliminate manual handoffs and delays.</p>
            </div>

            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h4>Secure Data Synchronisation</h4>
                <p>Secure data synchronisation ensuring consistency, accuracy, and compliance.</p>
            </div>

            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-check-double"></i>
                </div>
                <h4>Reduced Errors</h4>
                <p>Reduced manual processing and errors through automation and validation.</p>
            </div>

            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h4>Scalable Execution</h4>
                <p>Faster process execution and scalability as transaction volumes grow.</p>
            </div>
        </div>
        <div class="button-wrapper-flex mt-5">
            <a href="contact.php"
                class="rts-btn btn-primary m-auto"
                title="Contact VegaVision">
                Get Started
            </a>
        </div>
    </section>

    <!-- Built for Growth Section -->
    <section class="growth-section">
        <h2>Enterprise-Grade</h2>
        <p>
            Supports complex environments with multiple systems, vendors, and data sources
            while maintaining reliability, security, and performance at scale.
        </p>

        <div class="integration-logos">
            <div class="integration-item">
                <div class="integration-icon">
                    <i class="fas fa-server"></i>
                </div>
                <span class="integration-label">Multiple Systems</span>
            </div>

            <div class="integration-item">
                <div class="integration-icon">
                    <i class="fas fa-industry"></i>
                </div>
                <span class="integration-label">Vendor Neutral</span>
            </div>

            <div class="integration-item">
                <div class="integration-icon">
                    <i class="fas fa-database"></i>
                </div>
                <span class="integration-label">Data Sources</span>
            </div>

            <div class="integration-item">
                <div class="integration-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <span class="integration-label">Secure by Design</span>
            </div>
        </div>
    </section>
</div>

@endsection