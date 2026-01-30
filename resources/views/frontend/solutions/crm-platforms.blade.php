@extends('frontend.layout.layout')

@section('content')
<div class="service-inner container">
    <!-- Hero Section -->
    <section class="hero-section">
        <h2>CRM Platform</h2>
        <p class="tagline">One system. One customer view. Better decisions.</p>
        <p class="description">
            Centralise customer data, sales activity, service interactions, and engagement history in a single CRM platform tailored to your organisation.
            <span class="highlight">Eliminate silos. Improve accountability. Enable teams to work from the same information.</span>
        </p>
    </section>

    <!-- What It Enables Section -->
    <section class="enables-section">
        <h3>What It Enables</h3>
        <div class="enables-grid">
            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <h4>Centralised Customer Management</h4>
                <p>Centralised customer, account, and contact management with a complete, unified customer view.</p>
            </div>

            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-funnel-dollar"></i>
                </div>
                <h4>Sales Pipeline Tracking</h4>
                <p>Sales pipeline, opportunity, and deal tracking to improve visibility and conversion rates.</p>
            </div>

            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h4>Service Case Management</h4>
                <p>Service case management, follow-ups, and resolution tracking to improve customer satisfaction.</p>
            </div>

            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-plug"></i>
                </div>
                <h4>System Integrations</h4>
                <p>Seamless integration with Contact Centre, Billing, and Marketing systems.</p>
            </div>

            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h4>Performance Reporting</h4>
                <p>Clear reporting on performance, conversion, and overall customer value.</p>
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
        <h2>Built to Adapt</h2>
        <p>
            Configure workflows, fields, and processes to match how your business actually operates.
            Our CRM adapts to your organisation instead of forcing your teams to change how they work.
        </p>

        <div class="integration-logos">
            <div class="integration-item">
                <div class="integration-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <span class="integration-label">Custom Workflows</span>
            </div>

            <div class="integration-item">
                <div class="integration-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>
                <span class="integration-label">Flexible Fields</span>
            </div>

            <div class="integration-item">
                <div class="integration-icon">
                    <i class="fas fa-random"></i>
                </div>
                <span class="integration-label">Process Automation</span>
            </div>

            <div class="integration-item">
                <div class="integration-icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <span class="integration-label">Scalable Architecture</span>
            </div>
        </div>
    </section>
</div>
@endsection