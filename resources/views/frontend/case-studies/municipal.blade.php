@extends('frontend.layout.layout')

@section('content')
<article class="case-study-container">
    <header class="case-study-header">
        <div class="case-category">Municipal ITSM</div>
        <h1>City Service Desk Transformation</h1>
        <p class="client-description">A metropolitan municipality responsible for internal IT services across multiple departments, serving thousands of municipal employees and frontline service teams.</p>
    </header>

    <section class="challenge-section">
        <h2>The Challenge</h2>
        <p class="challenge-intro">The municipality relied on email, spreadsheets, and manual tracking to manage IT incidents and service requests. This resulted in:</p>

        <div class="challenge-list">
            <div class="challenge-item">
                <div class="challenge-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="challenge-text">Poor visibility into service performance</div>
            </div>

            <div class="challenge-item">
                <div class="challenge-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="challenge-text">Inconsistent response times</div>
            </div>

            <div class="challenge-item">
                <div class="challenge-icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="challenge-text">No clear accountability or SLA tracking</div>
            </div>

            <div class="challenge-item">
                <div class="challenge-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="challenge-text">Limited reporting for management and audit purposes</div>
            </div>
        </div>

        <p class="impact-statement">Citizen-facing services were indirectly impacted by slow internal IT support.</p>
    </section>

    <section class="solution-section">
        <h2>The Solution</h2>
        <p class="solution-intro">VegaVision implemented an IT Service Management (ITSM) platform aligned to ITIL practices, providing:</p>

        <div class="solution-grid">
            <div class="solution-item">
                <h3>Centralised Management</h3>
                <p>Centralised incident, request, and change management</p>
            </div>

            <div class="solution-item">
                <h3>SLA Tracking</h3>
                <p>SLA definition, tracking, and escalation</p>
            </div>

            <div class="solution-item">
                <h3>Asset Visibility</h3>
                <p>Asset and configuration visibility</p>
            </div>

            <div class="solution-item">
                <h3>Reporting & Dashboards</h3>
                <p>Management dashboards and audit-ready reporting</p>
            </div>
        </div>

        <p class="solution-intro">The platform was configured to match municipal processes rather than forcing generic workflows.</p>
    </section>

    <section class="outcome-section">
        <h2>The Outcome</h2>

        <div class="outcome-list">
            <div class="outcome-item">
                <div class="outcome-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="outcome-text">Faster incident resolution and improved service consistency</div>
            </div>

            <div class="outcome-item">
                <div class="outcome-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="outcome-text">Clear ownership and accountability across IT teams</div>
            </div>

            <div class="outcome-item">
                <div class="outcome-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="outcome-text">Improved compliance, reporting, and governance</div>
            </div>

            <div class="outcome-item">
                <div class="outcome-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="outcome-text">Reduced reliance on manual tracking and email</div>
            </div>
        </div>

        <p class="conclusion">The municipality gained a structured, transparent IT service operation that supports reliable city services.</p>
    </section>
</article>

@endsection