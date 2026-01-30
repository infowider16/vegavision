@extends('frontend.layout.layout')

@section('content')
<article class="case-study-container">
    <header class="case-study-header">
        <div class="case-category">Network Monitoring</div>
        <h1>Proactive Network Observability</h1>
        <p class="client-description">
            A service provider operating a large, distributed network supporting business-critical
            services across multiple locations.
        </p>
    </header>

    <section class="challenge-section">
        <h2>The Challenge</h2>
        <p class="challenge-intro">
            Network issues were detected reactively, often after customers reported problems.
            The organisation lacked:
        </p>

        <div class="challenge-list">
            <div class="challenge-item">
                <div class="challenge-icon">
                    <i class="fas fa-eye-slash"></i>
                </div>
                <div class="challenge-text">
                    Real-time visibility into network health
                </div>
            </div>

            <div class="challenge-item">
                <div class="challenge-icon">
                    <i class="fas fa-bell-slash"></i>
                </div>
                <div class="challenge-text">
                    Early warning of performance degradation
                </div>
            </div>

            <div class="challenge-item">
                <div class="challenge-icon">
                    <i class="fas fa-chart-area"></i>
                </div>
                <div class="challenge-text">
                    No centralised monitoring and alerting
                </div>
            </div>

            <div class="challenge-item">
                <div class="challenge-icon">
                    <i class="fas fa-history"></i>
                </div>
                <div class="challenge-text">
                    Lack of historical data for trend and capacity planning
                </div>
            </div>
        </div>

        <p class="impact-statement">
            Downtime and slow performance impacted service quality and customer confidence.
        </p>
    </section>

    <section class="solution-section">
        <h2>The Solution</h2>
        <p class="solution-intro">
            VegaVision implemented a Network Monitoring and Observability platform providing:
        </p>

        <div class="solution-grid">
            <div class="solution-item">
                <h3>Real-Time Monitoring</h3>
                <p>Continuous real-time monitoring of network devices and links</p>
            </div>

            <div class="solution-item">
                <h3>Centralised Dashboards</h3>
                <p>Unified dashboards and performance metrics across the network</p>
            </div>

            <div class="solution-item">
                <h3>Intelligent Alerting</h3>
                <p>Intelligent alerting and automated fault detection</p>
            </div>

            <div class="solution-item">
                <h3>Root-Cause Analysis</h3>
                <p>Root-cause analysis with historical trend reporting</p>
            </div>

            <div class="solution-item">
                <h3>ITSM Integration</h3>
                <p>Integration with ITSM platforms for automated incident creation</p>
            </div>
        </div>
    </section>

    <section class="outcome-section">
        <h2>The Outcome</h2>

        <div class="outcome-list">
            <div class="outcome-item">
                <div class="outcome-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="outcome-text">
                    Early detection of network issues before customer impact
                </div>
            </div>

            <div class="outcome-item">
                <div class="outcome-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="outcome-text">
                    Reduced downtime and faster fault resolution
                </div>
            </div>

            <div class="outcome-item">
                <div class="outcome-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="outcome-text">
                    Improved operational confidence and capacity planning
                </div>
            </div>

            <div class="outcome-item">
                <div class="outcome-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="outcome-text">
                    Better collaboration between network and support teams
                </div>
            </div>
        </div>

        <p class="conclusion">
            The organisation shifted from reactive troubleshooting to proactive
            network management with full operational visibility.
        </p>
    </section>
</article>

@endsection