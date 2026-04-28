@extends('layouts.app')

@section('title', 'REDS EDS – Expert Electromechanical Engineering')

@section('content')

{{-- ===== HERO ===== --}}
<section class="hero">
    <div class="hero-bg-pattern"></div>
    <div class="container hero-inner">
        <div class="hero-text">
            <span class="hero-eyebrow">Trusted Since Day One</span>
            <h1 class="hero-title">
                Engineering<br>
                <span class="text-red">Comfort.</span><br>
                Powering<br>
                <span class="text-red">Reliability.</span>
            </h1>
            <p class="hero-sub">From aircon installation to industrial chillers, REDS EDS delivers precision electromechanical solutions for homes, offices, and industrial facilities.</p>
            <div class="hero-ctas">
                <a href="{{ route('contact') }}" class="btn btn-primary">Request a Quote</a>
                <a href="{{ route('services') }}" class="btn btn-outline">Our Services</a>
            </div>
        </div>
        <div class="hero-visual">
            <div class="hero-img-collage">
                <div class="hero-img-main">
                    <img src="{{ asset('images/install-outdoor-unit.jpg') }}" alt="REDS EDS team installing aircon outdoor unit">
                </div>
                <div class="hero-img-side">
                    <img src="{{ asset('images/indoor-unit-repair.jpg') }}" alt="Technician servicing indoor unit">
                    <img src="{{ asset('images/rooftop-repair.jpg') }}" alt="Rooftop aircon repair">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== STATS STRIP ===== --}}
<section class="stats-strip">
    <div class="container stats-grid">
        @foreach([
            ['500+', 'Projects Completed'],
            ['12+', 'Years Experience'],
            ['200+', 'Happy Clients'],
            ['24/7', 'Emergency Support'],
        ] as $stat)
        <div class="stat-item">
            <span class="stat-num">{{ $stat[0] }}</span>
            <span class="stat-label">{{ $stat[1] }}</span>
        </div>
        @endforeach
    </div>
</section>

{{-- ===== SERVICES OVERVIEW ===== --}}
<section class="section services-overview" id="services">
    <div class="container">
        <div class="section-header">
            <span class="section-label">What We Do</span>
            <h2>Complete Electromechanical Solutions</h2>
            <p>We handle the full spectrum — from residential aircon units to heavy industrial systems.</p>
        </div>
        <div class="services-grid">
            @php
            $services = [
                ['icon' => '❄', 'title' => 'Aircon & HVAC', 'desc' => 'Brand new unit supply, installation, and full HVAC system design for any building size.', 'link' => 'aircon'],
                ['icon' => '🔧', 'title' => 'Maintenance & Repair', 'desc' => 'Scheduled preventive maintenance and on-call repair for all types of mechanical equipment.', 'link' => 'maintenance'],
                ['icon' => '🧊', 'title' => 'Chiller Systems', 'desc' => 'Industrial chiller installation, commissioning, and maintenance for large-scale cooling needs.', 'link' => 'chiller'],
                ['icon' => '🔥', 'title' => 'Boiler Services', 'desc' => 'Boiler installation, inspection, and compliance servicing for commercial and industrial use.', 'link' => 'chiller'],
                ['icon' => '🧊', 'title' => 'Ice Machine', 'desc' => 'Commercial ice machine installation and maintenance for food service and industrial use.', 'link' => 'maintenance'],
                ['icon' => '⚡', 'title' => 'Gen Set', 'desc' => 'Generator set supply, installation, load testing, and preventive maintenance contracts.', 'link' => 'genset'],
                ['icon' => '💨', 'title' => 'Compressed Air', 'desc' => 'Compressed air system design, installation, and maintenance for industrial operations.', 'link' => 'maintenance'],
                ['icon' => '🚒', 'title' => 'Fire Pump', 'desc' => 'Fire pump system installation and testing in compliance with fire safety regulations.', 'link' => 'fire'],
            ];
            @endphp
            @foreach($services as $svc)
            <a href="{{ route('services') }}#{{ $svc['link'] }}" class="service-card">
                <div class="svc-icon">{{ $svc['icon'] }}</div>
                <h3>{{ $svc['title'] }}</h3>
                <p>{{ $svc['desc'] }}</p>
                <span class="svc-arrow">→</span>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== PHOTO GALLERY ===== --}}
<section class="section section--gray gallery-section">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Our Work</span>
            <h2>Projects by Our Team</h2>
            <p>Real installations and service calls handled by our certified technicians.</p>
        </div>
        <div class="gallery-grid">
            <div class="gallery-item gallery-item--tall">
                <img src="{{ asset('images/install-outdoor-unit.jpg') }}" alt="Team installing outdoor aircon unit">
                <div class="gallery-caption">Outdoor Unit Team Installation</div>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('images/mitsubishi-indoor-unit.jpg') }}" alt="Mitsubishi indoor unit installed">
                <div class="gallery-caption">Mitsubishi Heavy Industries Split-Type</div>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('images/bracket-install.jpg') }}" alt="Technician drilling wall bracket">
                <div class="gallery-caption">Wall Bracket Installation</div>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('images/indoor-unit-repair.jpg') }}" alt="Indoor unit service on ladder">
                <div class="gallery-caption">Indoor Unit Service & Repair</div>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('images/rooftop-repair.jpg') }}" alt="Rooftop aircon repair">
                <div class="gallery-caption">Rooftop Unit Maintenance</div>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('images/condura-outdoor-installed.jpg') }}" alt="Condura outdoor unit installed">
                <div class="gallery-caption">Condura Inverter – Completed Install</div>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('images/daikin-delivery.jpg') }}" alt="Daikin unit delivery">
                <div class="gallery-caption">Daikin Unit Delivery & Supply</div>
            </div>
            <div class="gallery-item">
                <img src="{{ asset('images/warehouse-stock.jpg') }}" alt="Brand new units in warehouse">
                <div class="gallery-caption">Brand New Units – Ready for Delivery</div>
            </div>
        </div>
    </div>
</section>

{{-- ===== WHY REDS ===== --}}
<section class="section why-reds">
    <div class="container why-inner">
        <div class="why-content">
            <span class="section-label">Why Choose Us</span>
            <h2>Built on Expertise,<br>Driven by <span class="text-red">Results</span></h2>
            <div class="why-points">
                @foreach([
                    ['Licensed Engineers', 'All work performed by certified electromechanical engineers and licensed technicians.'],
                    ['End-to-End Service', 'From supply and installation to maintenance and emergency repair — one team, full accountability.'],
                    ['Fast Response Time', 'Same-day response for urgent breakdowns. Preventive maintenance contracts available.'],
                    ['Quality Equipment', 'Authorized dealer of top-brand aircon units — Mitsubishi, Daikin, Carrier, Panasonic, Condura.'],
                ] as $pt)
                <div class="why-point">
                    <div class="why-check">✓</div>
                    <div>
                        <strong>{{ $pt[0] }}</strong>
                        <p>{{ $pt[1] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <a href="{{ route('about') }}" class="btn btn-primary">Learn More About Us</a>
        </div>
        <div class="why-visual">
            <div class="why-photo-stack">
                <img src="{{ asset('images/outdoor-unit-welding.jpg') }}" alt="Technician working on outdoor unit" class="why-photo why-photo--back">
                <img src="{{ asset('images/condura-delivery.jpg') }}" alt="Condura delivery to client" class="why-photo why-photo--front">
            </div>
        </div>
    </div>
</section>

{{-- ===== BRANDS WE CARRY ===== --}}
<section class="brands-strip">
    <div class="container">
        <span class="section-label" style="display:block;text-align:center;margin-bottom:20px;">Brands We Carry &amp; Service</span>
        <div class="brands-row">
            @foreach(['Mitsubishi', 'Daikin', 'Carrier', 'Panasonic', 'Condura', 'LG'] as $brand)
            <div class="brand-pill">{{ $brand }}</div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== CTA BANNER ===== --}}
<section class="cta-banner">
    <div class="container cta-inner">
        <div>
            <h2>Ready to Get Started?</h2>
            <p>Contact us today for a free site assessment and quotation.</p>
        </div>
        <a href="{{ route('contact') }}" class="btn btn-white">Get a Free Quote →</a>
    </div>
</section>

@endsection
