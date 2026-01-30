@extends('frontend.layout.layout')

@section('content')
<div class="service-inner container">
    <!-- Hero Section -->
    <section class="hero-section">
        <h2>Data, Reporting &amp; Business Intelligence</h2>
        <p class="tagline">Turn operational data into insight.</p>
        <p class="description">
            Transform raw system data into actionable intelligence with dashboards, reports, and analytics that support better decisions.
            <span class="highlight">No more disconnected reports. One source of truth.</span>
        </p>
    </section>

    <!-- What It Enables Section -->
    <section class="enables-section">
        <h3>What It Enables</h3>
        <div class="enables-grid">
            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <h4>Centralised Reporting</h4>
                <p>Centralised reporting across all platforms to provide a single, trusted view of performance.</p>
            </div>

            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <h4>Custom Dashboards</h4>
                <p>Custom dashboards designed for executives and operational teams with role-based visibility.</p>
            </div>

            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h4>Trends & KPIs</h4>
                <p>Trend analysis, KPIs, and performance metrics that support continuous improvement.</p>
            </div>

            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <h4>Customer & Service Insight</h4>
                <p>Faster insight into customer behaviour, service performance, and revenue drivers.</p>
            </div>

            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <h4>Data-Driven Accountability</h4>
                <p>Enable data-driven planning, accountability, and informed decision-making.</p>
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
        <h2>Connected by Design</h2>
        <p>
            Pulls data from CRM, Contact Centre, Billing, Network, and ITSM platforms to deliver
            a unified, accurate, and always-up-to-date source of operational intelligence.
        </p>

        <div class="integration-logos">
            <div class="integration-item">
                <div class="integration-icon">
                    <i class="fas fa-users-cog"></i>
                </div>
                <span class="integration-label">CRM</span>
            </div>

            <div class="integration-item">
                <div class="integration-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <span class="integration-label">Contact Centre</span>
            </div>

            <div class="integration-item">
                <div class="integration-icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <span class="integration-label">Billing</span>
            </div>

            <div class="integration-item">
                <div class="integration-icon">
                    <i class="fas fa-network-wired"></i>
                </div>
                <span class="integration-label">Network</span>
            </div>

            <div class="integration-item">
                <div class="integration-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <span class="integration-label">ITSM</span>
            </div>
        </div>
    </section>
</div>
@endsection