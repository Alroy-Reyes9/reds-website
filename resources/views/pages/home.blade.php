@extends('layouts.app')

@section('title', 'REDS Electromechanical Engineering Services — Home')
@section('meta_desc', 'Professional electromechanical services: aircon, HVAC, boilers, chillers, fire pumps, gen sets, and more. Serving Metro Manila and nearby provinces.')

@push('styles')
<style>
    /* ===== HERO ===== */
    .hero {
        min-height: 100vh;
        background: var(--charcoal);
        background-image:
            linear-gradient(135deg, rgba(192,39,45,0.18) 0%, transparent 55%),
            repeating-linear-gradient(45deg, transparent, transparent 40px, rgba(255,255,255,0.012) 40px, rgba(255,255,255,0.012) 41px);
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
        margin-top: 70px;
    }

    .hero::before {
        content: '';
        position: absolute;
        right: -10%;
        top: 50%;
        transform: translateY(-50%);
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(192,39,45,0.14) 0%, transparent 65%);
        pointer-events: none;
    }

    /* Large decorative gear */
    .hero-gear {
        position: absolute;
        right: 5%;
        top: 50%;
        transform: translateY(-50%);
        width: 420px;
        height: 420px;
        opacity: 0.06;
        animation: spin 60s linear infinite;
    }

    @keyframes spin { to { transform: translateY(-50%) rotate(360deg); } }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 680px;
    }

    .hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        background: rgba(192,39,45,0.15);
        border: 1px solid rgba(192,39,45,0.3);
        border-radius: 2px;
        padding: 0.4rem 1rem;
        margin-bottom: 1.5rem;
    }

    .hero-eyebrow span {
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: var(--red-light);
    }

    .hero h1 {
        font-size: clamp(3rem, 8vw, 5.5rem);
        color: var(--white);
        line-height: 1.0;
        margin-bottom: 1.5rem;
    }

    .hero h1 em {
        color: var(--red-light);
        font-style: normal;
        display: block;
    }

    .hero p {
        font-size: 1.1rem;
        color: rgba(255,255,255,0.65);
        max-width: 520px;
        margin-bottom: 2.5rem;
        line-height: 1.8;
    }

    .hero-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .hero-badges {
        display: flex;
        gap: 2rem;
        margin-top: 3.5rem;
        padding-top: 2.5rem;
        border-top: 1px solid rgba(255,255,255,0.1);
    }

    .hero-badge {
        text-align: left;
    }

    .hero-badge .num {
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--white);
        line-height: 1;
    }

    .hero-badge .lbl {
        font-size: 0.8rem;
        color: rgba(255,255,255,0.45);
        margin-top: 0.2rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    /* ===== MARQUEE ===== */
    .marquee-bar {
        background: var(--red);
        padding: 0.85rem 0;
        overflow: hidden;
        white-space: nowrap;
    }

    .marquee-track {
        display: inline-flex;
        animation: marquee 30s linear infinite;
        gap: 0;
    }

    .marquee-item {
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: rgba(255,255,255,0.85);
        padding: 0 2.5rem;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
    }

    .marquee-dot {
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: rgba(255,255,255,0.5);
        display: inline-block;
    }

    @keyframes marquee {
        from { transform: translateX(0); }
        to { transform: translateX(-50%); }
    }

    /* ===== SERVICES SECTION ===== */
    .services-section { background: var(--offwhite); }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 1.25rem;
        margin-top: 3rem;
    }

    .service-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 6px;
        padding: 1.75rem;
        text-decoration: none;
        color: inherit;
        display: block;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .service-card::before {
        content: '';
        position: absolute;
        bottom: 0; left: 0;
        width: 0;
        height: 3px;
        background: var(--red);
        transition: width 0.3s ease;
    }

    .service-card:hover::before { width: 100%; }
    .service-card:hover {
        border-color: rgba(192,39,45,0.3);
        box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        transform: translateY(-4px);
    }

    .service-icon {
        width: 48px;
        height: 48px;
        background: rgba(192,39,45,0.08);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.1rem;
        color: var(--red);
    }

    .service-card h3 {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--charcoal);
        margin-bottom: 0.5rem;
    }

    .service-card p {
        font-size: 0.88rem;
        color: var(--steel-light);
        line-height: 1.65;
    }

    .service-card .arrow {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--red);
        margin-top: 1rem;
        transition: gap 0.2s;
    }

    .service-card:hover .arrow { gap: 0.7rem; }

    /* ===== WHY US ===== */
    .why-section { background: var(--charcoal); }

    .why-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
    }

    .why-text .section-title { color: var(--white); }

    .why-list { list-style: none; margin-top: 2rem; }
    .why-list li {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(255,255,255,0.08);
        color: rgba(255,255,255,0.75);
        font-size: 0.95rem;
    }

    .why-list li:last-child { border-bottom: none; }

    .why-icon {
        width: 36px;
        height: 36px;
        background: rgba(192,39,45,0.2);
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--red-light);
        flex-shrink: 0;
    }

    .why-list strong {
        display: block;
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 1.05rem;
        color: var(--white);
        margin-bottom: 0.2rem;
    }

    .stats-panel {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 8px;
        padding: 2.5rem;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
    }

    .stat-item { text-align: center; }

    .stat-item .num {
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 3rem;
        font-weight: 800;
        color: var(--red-light);
        line-height: 1;
    }

    .stat-item .lbl {
        font-size: 0.85rem;
        color: rgba(255,255,255,0.5);
        margin-top: 0.4rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    /* ===== CTA BAND ===== */
    .cta-band {
        background: var(--red);
        padding: 4rem 0;
        text-align: center;
    }

    .cta-band h2 {
        font-size: clamp(2rem, 5vw, 3rem);
        color: var(--white);
        margin-bottom: 0.75rem;
    }

    .cta-band p {
        color: rgba(255,255,255,0.8);
        font-size: 1rem;
        max-width: 480px;
        margin: 0 auto 2rem;
    }

    .cta-band .btn-outline {
        border-color: rgba(255,255,255,0.7);
    }

    @media (max-width: 768px) {
        .hero-gear { display: none; }
        .hero-badges { gap: 1.5rem; flex-wrap: wrap; }
        .why-grid { grid-template-columns: 1fr; }
        .services-grid { grid-template-columns: 1fr 1fr; }
    }

    @media (max-width: 480px) {
        .services-grid { grid-template-columns: 1fr; }
        .stats-grid { grid-template-columns: 1fr 1fr; }
    }
</style>
@endpush

@section('content')

<!-- HERO -->
<section class="hero">
    <!-- Decorative gear SVG -->
    <svg class="hero-gear" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 20 L108 10 L120 12 L126 23 L138 20 L146 29 L142 41 L152 48 L152 60 L141 65 L144 77 L136 84 L124 80 L118 90 L120 102 L110 108 L100 105 L90 108 L80 102 L82 90 L76 80 L64 84 L56 77 L59 65 L48 60 L48 48 L58 41 L54 29 L62 20 L74 23 L80 12 L92 10 Z" fill="white"/>
        <circle cx="100" cy="100" r="30" fill="white"/>
        <circle cx="100" cy="100" r="18" fill="transparent" stroke="black" stroke-width="4"/>
    </svg>

    <div class="container">
        <div class="hero-content">
            <div class="hero-eyebrow">
                <i data-lucide="settings" size="14" style="color:var(--red-light)"></i>
                <span>Certified Electromechanical Services</span>
            </div>
            <h1>
                Engineering<br>
                <em>Built to Last</em>
            </h1>
            <p>From aircon installation to industrial boilers and fire pump systems — REDS delivers expert electromechanical services for homes, offices, and industrial facilities.</p>
            <div class="hero-actions">
                <a href="{{ route('book') }}" class="btn btn-primary">
                    <i data-lucide="calendar" size="16"></i> Book a Service
                </a>
                <a href="{{ route('services') }}" class="btn btn-outline">
                    <i data-lucide="grid" size="16"></i> Our Services
                </a>
            </div>
            <div class="hero-badges">
                @foreach($stats as $stat)
                <div class="hero-badge">
                    <div class="num">{{ $stat['number'] }}</div>
                    <div class="lbl">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- MARQUEE -->
<div class="marquee-bar">
    <div class="marquee-track">
        @php $items = ['Aircon Installation', 'HVAC Systems', 'Boiler Services', 'Chiller Systems', 'Fire Pump', 'Gen Set', 'Ice Machine', 'Compressed Air', 'Preventive Maintenance', 'Emergency Repair', '24/7 Support']; @endphp
        @foreach(array_merge($items, $items) as $item)
            <span class="marquee-item"><span class="marquee-dot"></span>{{ $item }}</span>
        @endforeach
    </div>
</div>

<!-- SERVICES -->
<section class="services-section">
    <div class="container">
        <div class="section-label">What We Do</div>
        <h2 class="section-title">Complete Electromechanical<br>Service Solutions</h2>
        <div class="red-line"></div>

        <div class="services-grid">
            @foreach($services as $svc)
            <a href="{{ route('services.show', $svc['slug']) }}" class="service-card">
                <div class="service-icon">
                    <i data-lucide="{{ $svc['icon'] }}" size="22"></i>
                </div>
                <h3>{{ $svc['title'] }}</h3>
                <p>{{ $svc['desc'] }}</p>
                <span class="arrow">Learn more <i data-lucide="arrow-right" size="13"></i></span>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- WHY REDS -->
<section class="why-section">
    <div class="container">
        <div class="why-grid">
            <div class="why-text">
                <div class="section-label">Why Choose Us</div>
                <h2 class="section-title">The REDS<br>Difference</h2>
                <div class="red-line"></div>

                <ul class="why-list">
                    <li>
                        <div class="why-icon"><i data-lucide="shield-check" size="18"></i></div>
                        <div>
                            <strong>Licensed &amp; Certified Engineers</strong>
                            All work is supervised by licensed mechanical and electrical engineers.
                        </div>
                    </li>
                    <li>
                        <div class="why-icon"><i data-lucide="clock" size="18"></i></div>
                        <div>
                            <strong>Fast Response Time</strong>
                            Emergency services available 24/7. We show up when it matters most.
                        </div>
                    </li>
                    <li>
                        <div class="why-icon"><i data-lucide="package" size="18"></i></div>
                        <div>
                            <strong>Genuine Parts Only</strong>
                            We use OEM and certified replacement parts — no shortcuts.
                        </div>
                    </li>
                    <li>
                        <div class="why-icon"><i data-lucide="file-text" size="18"></i></div>
                        <div>
                            <strong>Documented &amp; Compliant</strong>
                            Every job comes with a service report and meets relevant PEC/NFPA/DOLE standards.
                        </div>
                    </li>
                </ul>

                <a href="{{ route('about') }}" class="btn btn-primary" style="margin-top:2rem">
                    <i data-lucide="info" size="16"></i> About Our Company
                </a>
            </div>

            <div class="stats-panel">
                <div class="stats-grid">
                    @foreach($stats as $stat)
                    <div class="stat-item">
                        <div class="num">{{ $stat['number'] }}</div>
                        <div class="lbl">{{ $stat['label'] }}</div>
                    </div>
                    @endforeach
                </div>

                <div style="margin-top:2.5rem; padding-top:2rem; border-top:1px solid rgba(255,255,255,0.1);">
                    <div class="section-label" style="color:var(--red-light); margin-bottom:0.75rem;">Ready to get started?</div>
                    <p style="color:rgba(255,255,255,0.6); font-size:0.9rem; margin-bottom:1.25rem;">Book a service or send us an inquiry. Our team responds within 24 hours.</p>
                    <a href="{{ route('book') }}" class="btn btn-primary" style="width:100%; justify-content:center;">
                        <i data-lucide="calendar-plus" size="16"></i> Schedule a Visit
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA BAND -->
<div class="cta-band">
    <div class="container">
        <h2>Need Emergency Service?</h2>
        <p>Equipment down? Our technicians are on standby 24/7 for emergency calls.</p>
        <div style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
            <a href="tel:+63XXXXXXXXXX" class="btn" style="background:var(--white); color:var(--red); font-weight:800;">
                <i data-lucide="phone" size="16"></i> Call Us Now
            </a>
            <a href="{{ route('contact') }}" class="btn btn-outline">
                <i data-lucide="mail" size="16"></i> Send a Message
            </a>
        </div>
    </div>
</div>

@endsection
