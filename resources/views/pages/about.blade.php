@extends('layouts.app')

@section('title', 'About Us – REDS EDS')

@section('content')

<section class="page-hero">
    <div class="container">
        <span class="section-label">Who We Are</span>
        <h1>About <span class="text-red">REDS EDS</span></h1>
        <p>Passionate about engineering excellence and lasting client relationships.</p>
    </div>
</section>

<section class="section">
    <div class="container about-story">
        <div class="about-text">
            <span class="section-label">Our Story</span>
            <h2>Engineering That<br><span class="text-red">Stands the Test of Time</span></h2>
            <p>REDS Electromechanical Engineering Services was founded with one clear mission: to deliver reliable, high-quality mechanical and electrical services to clients across the Philippines.</p>
            <p>From humble beginnings in residential aircon servicing, REDS EDS has grown into a full-service electromechanical contractor handling complex HVAC systems, industrial chillers, boilers, compressed air systems, fire pumps, and generator sets.</p>
            <p>Our team of licensed engineers and certified technicians brings deep technical expertise and a commitment to safety, quality, and customer satisfaction to every project.</p>
        </div>
        <div class="about-values">
            @foreach([
                ['Safety First', 'Every job is planned and executed with strict safety protocols and compliance.'],
                ['Quality Work', 'We don\'t cut corners — only certified materials and proven methods.'],
                ['Client Focus', 'We listen, advise, and deliver solutions aligned with your budget and needs.'],
                ['Integrity', 'Transparent pricing, honest assessments, no hidden charges.'],
            ] as $val)
            <div class="value-card">
                <div class="value-dot"></div>
                <strong>{{ $val[0] }}</strong>
                <p>{{ $val[1] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== ACTION SHOTS ===== --}}
<section class="section section--gray">
    <div class="container">
        <div class="section-header">
            <span class="section-label">In the Field</span>
            <h2>Our Team at Work</h2>
            <p>Every project photographed — from delivery to final installation.</p>
        </div>
        <div class="about-photo-grid">
            <div class="about-photo about-photo--wide">
                <img src="{{ asset('images/install-outdoor-unit.jpg') }}" alt="Team lifting outdoor unit into position">
                <div class="about-photo-label">Team effort — outdoor unit positioning</div>
            </div>
            <div class="about-photo">
                <img src="{{ asset('images/indoor-unit-repair.jpg') }}" alt="Technician on ladder servicing indoor unit">
                <div class="about-photo-label">Indoor unit service</div>
            </div>
            <div class="about-photo">
                <img src="{{ asset('images/rooftop-repair.jpg') }}" alt="Rooftop aircon maintenance">
                <div class="about-photo-label">Rooftop installation</div>
            </div>
            <div class="about-photo">
                <img src="{{ asset('images/bracket-install.jpg') }}" alt="Drilling wall bracket for aircon">
                <div class="about-photo-label">Precision bracket mounting</div>
            </div>
            <div class="about-photo">
                <img src="{{ asset('images/outdoor-unit-welding.jpg') }}" alt="Welding outdoor unit connections">
                <div class="about-photo-label">Outdoor unit pipe connection</div>
            </div>
        </div>
    </div>
</section>

<section class="section team-section">
    <div class="container">
        <div class="section-header">
            <span class="section-label">The Team</span>
            <h2>Licensed Professionals,<br>Trusted by Hundreds</h2>
        </div>
        <div class="team-badges">
            @foreach([
                ['⚙', 'Licensed Mechanical Engineers', 'PRC-licensed MEs overseeing all projects.'],
                ['❄', 'Certified HVAC Technicians', 'Factory-trained on Mitsubishi, Daikin, Carrier, and more.'],
                ['⚡', 'Electrical Engineers', 'Licensed EEs handling all power and control systems.'],
                ['🛡', 'Safety Officers', 'DOLE-accredited SO2 safety officers on every site.'],
            ] as $badge)
            <div class="team-badge">
                <div class="team-badge-icon">{{ $badge[0] }}</div>
                <strong>{{ $badge[1] }}</strong>
                <p>{{ $badge[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== SUPPLY / BRANDS ===== --}}
<section class="section section--gray">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Supply & Inventory</span>
            <h2>Brand New Units, Ready to Deliver</h2>
            <p>We maintain in-stock inventory of the top aircon brands so your project moves fast.</p>
        </div>
        <div class="supply-photos">
            <div class="supply-photo">
                <img src="{{ asset('images/warehouse-stock.jpg') }}" alt="Warehouse with brand new aircon stock">
                <div class="supply-photo-label">Panasonic, Carrier, LG — ready for deployment</div>
            </div>
            <div class="supply-photo">
                <img src="{{ asset('images/daikin-delivery.jpg') }}" alt="Daikin units ready for delivery">
                <div class="supply-photo-label">Daikin unit delivery to client site</div>
            </div>
            <div class="supply-photo">
                <img src="{{ asset('images/condura-delivery.jpg') }}" alt="Condura inverter units delivered">
                <div class="supply-photo-label">Condura Inverter supply — delivered to doorstep</div>
            </div>
        </div>
    </div>
</section>

<section class="cta-banner">
    <div class="container cta-inner">
        <div>
            <h2>Work With Us</h2>
            <p>Let's discuss your project requirements today.</p>
        </div>
        <a href="{{ route('contact') }}" class="btn btn-white">Get in Touch →</a>
    </div>
</section>

@endsection
