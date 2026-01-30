@extends('frontend.layout.layout')

@section('content')
<div class="service-inner container">
    <!-- Hero Section -->
    <section class="hero-section">
        <h2>Custom Software</h2>
        <p class="tagline">Software built around how your business actually works.</p>
        <p class="description">
            Sometimes the convenience of off-the-shelf platforms just does not fit — custom software fills the gap.
            <span class="highlight">
                We design and build bespoke applications, portals, and workflows aligned to your specific business processes,
                integration requirements, and operating model.
            </span>
        </p>
    </section>

    <!-- What It Enables Section -->
    <section class="enables-section">
        <h3>What It Enables</h3>
        <div class="enables-grid">
            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-drafting-compass"></i>
                </div>
                <h4>Bespoke Application Design</h4>
                <p>Custom-designed applications and portals built specifically for your business requirements.</p>
            </div>

            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <h4>Process-Aligned Workflows</h4>
                <p>Workflows and logic designed around how your teams actually operate, not generic assumptions.</p>
            </div>

            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-plug"></i>
                </div>
                <h4>Seamless System Integration</h4>
                <p>Integration with existing platforms, APIs, and data sources within your current environment.</p>
            </div>

            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-building"></i>
                </div>
                <h4>Enterprise-Ready Architecture</h4>
                <p>Structured, secure, and scalable software built to enterprise standards and best practices.</p>
            </div>

            <div class="enables-card">
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h4>Clear Business Outcomes</h4>
                <p>Solutions delivered with measurable outcomes that directly support business goals.</p>
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
        <h2>Designed Around Your Business</h2>
        <p>
            Custom software is designed around your rules, not generic assumptions.
            Each solution is built to integrate seamlessly into your existing environment
            while supporting long-term growth and operational efficiency.
        </p>

        <div class="integration-logos">
            <div class="integration-item">
                <div class="integration-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <span class="integration-label">Business Rules</span>
            </div>

            <div class="integration-item">
                <div class="integration-icon">
                    <i class="fas fa-puzzle-piece"></i>
                </div>
                <span class="integration-label">System Integration</span>
            </div>

            <div class="integration-item">
                <div class="integration-icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <span class="integration-label">Scalable Design</span>
            </div>

            <div class="integration-item">
                <div class="integration-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <span class="integration-label">Enterprise Grade</span>
            </div>
        </div>
    </section>
</div>
@endsection