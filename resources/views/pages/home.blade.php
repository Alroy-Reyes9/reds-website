@extends('layouts.app')
@section('title','REDS EDS – Expert Electromechanical Engineering')
@section('content')

{{-- HERO --}}
<section class="hero">
  <div class="hero-inner container">
    <div class="hero-text">
      <span class="hero-eyebrow">Trusted Since Day One</span>
      <h1 class="hero-title">Engineering<br><span class="text-red">Comfort.</span><br>Powering<br><span class="text-red">Reliability.</span></h1>
      <p class="hero-sub">From aircon installation to industrial chillers, REDS EDS delivers precision electromechanical solutions for homes, offices, and industrial facilities.</p>
      <div class="hero-ctas">
        <a href="{{ route('contact') }}" class="btn btn-primary">Request a Quote</a>
        <a href="{{ route('services') }}" class="btn btn-ghost">Our Services</a>
      </div>
    </div>
    <div class="hero-photos">
      <div class="hp hp-main"><img src="{{ asset('images/install-outdoor-unit.jpg') }}" alt="Team installing outdoor unit"></div>
      <div class="hp hp-top"><img src="{{ asset('images/indoor-unit-repair.jpg') }}" alt="Indoor unit service"></div>
      <div class="hp hp-bot"><img src="{{ asset('images/rooftop-repair.jpg') }}" alt="Rooftop repair"></div>
    </div>
  </div>
</section>

{{-- STATS --}}
<section class="stats">
  <div class="container stats-inner">
    @foreach([['500+','Projects Completed'],['12+','Years Experience'],['200+','Happy Clients'],['24/7','Emergency Support']] as $s)
    <div class="stat"><div class="stat-n">{{$s[0]}}</div><div class="stat-l">{{$s[1]}}</div></div>
    @endforeach
  </div>
</section>

{{-- SERVICES OVERVIEW --}}
<section class="section">
  <div class="container">
    <div class="sec-hdr">
      <span class="label">What We Do</span>
      <h2>Complete Electromechanical Solutions</h2>
      <p>We handle the full spectrum — from residential aircon units to heavy industrial systems.</p>
    </div>
    <div class="svc-grid">
      @php $svcs=[
        ['❄','Aircon & HVAC','Brand new unit supply, installation, and full HVAC system design.','aircon'],
        ['🔧','Maintenance & Repair','Scheduled preventive maintenance and on-call repair services.','maintenance'],
        ['🧊','Chiller Systems','Industrial chiller installation, commissioning, and maintenance.','chiller'],
        ['🔥','Boiler Services','Boiler installation, inspection, and compliance servicing.','chiller'],
        ['🧊','Ice Machine','Commercial ice machine installation and maintenance.','maintenance'],
        ['⚡','Gen Set','Generator supply, installation, load testing, and PM contracts.','genset'],
        ['💨','Compressed Air','Compressed air system design, installation, and maintenance.','maintenance'],
        ['🚒','Fire Pump','BFP-compliant fire pump installation and testing.','fire'],
      ]; @endphp
      @foreach($svcs as $s)
      <a href="{{ route('services') }}#{{$s[3]}}" class="svc-card">
        <div class="svc-ico">{{$s[0]}}</div>
        <h3>{{$s[1]}}</h3>
        <p>{{$s[2]}}</p>
        <span class="svc-arrow">→</span>
      </a>
      @endforeach
    </div>
  </div>
</section>

{{-- GALLERY --}}
<section class="section section-alt">
  <div class="container">
    <div class="sec-hdr">
      <span class="label">Our Work</span>
      <h2>Projects by Our Team</h2>
      <p>Real installations and service calls handled by our certified technicians.</p>
    </div>
    <div class="gallery">
      <div class="gi gi--tall"><img src="{{ asset('images/install-outdoor-unit.jpg') }}" alt="Team install"><div class="gi-cap">Outdoor Unit Team Installation</div></div>
      <div class="gi"><img src="{{ asset('images/mitsubishi-indoor-unit.jpg') }}" alt="Mitsubishi unit"><div class="gi-cap">Mitsubishi Heavy Industries Split-Type</div></div>
      <div class="gi"><img src="{{ asset('images/bracket-install.jpg') }}" alt="Bracket install"><div class="gi-cap">Wall Bracket Installation</div></div>
      <div class="gi"><img src="{{ asset('images/indoor-unit-repair.jpg') }}" alt="Indoor repair"><div class="gi-cap">Indoor Unit Service & Repair</div></div>
      <div class="gi"><img src="{{ asset('images/rooftop-repair.jpg') }}" alt="Rooftop repair"><div class="gi-cap">Rooftop Unit Maintenance</div></div>
      <div class="gi"><img src="{{ asset('images/condura-outdoor-installed.jpg') }}" alt="Condura installed"><div class="gi-cap">Condura Inverter – Completed Install</div></div>
      <div class="gi"><img src="{{ asset('images/daikin-delivery.jpg') }}" alt="Daikin delivery"><div class="gi-cap">Daikin Unit Delivery</div></div>
    </div>
  </div>
</section>

{{-- WHY REDS --}}
<section class="section">
  <div class="container why-inner">
    <div class="why-content">
      <span class="label">Why Choose Us</span>
      <h2>Built on Expertise,<br>Driven by <span class="text-red">Results</span></h2>
      <div class="why-list">
        @foreach([
          ['Licensed Engineers','All work performed by PRC-licensed engineers and certified technicians.'],
          ['End-to-End Service','From supply and installation to maintenance and repair — one team.'],
          ['Fast Response','Same-day response for urgent breakdowns. PM contracts available.'],
          ['Quality Equipment','Authorized dealer of Mitsubishi, Daikin, Carrier, Panasonic, Condura.'],
        ] as $p)
        <div class="why-item">
          <div class="why-chk">✓</div>
          <div><strong>{{$p[0]}}</strong><p>{{$p[1]}}</p></div>
        </div>
        @endforeach
      </div>
      <a href="{{ route('about') }}" class="btn btn-primary">Learn More About Us</a>
    </div>
    <div class="why-photos">
      <img src="{{ asset('images/outdoor-unit-welding.jpg') }}" alt="Technician working">
      <img src="{{ asset('images/condura-delivery.jpg') }}" alt="Delivery to client">
    </div>
  </div>
</section>

{{-- BRANDS --}}
<section class="brands">
  <div class="container">
    <div style="text-align:center;margin-bottom:20px;"><span class="label">Brands We Carry &amp; Service</span></div>
    <div class="brands-row">
      @foreach(['Mitsubishi','Daikin','Carrier','Panasonic','Condura','LG'] as $b)
      <div class="brand-pill">{{$b}}</div>
      @endforeach
    </div>
  </div>
</section>

{{-- CTA --}}
<section class="cta-banner">
  <div class="container cta-inner">
    <div><h2>Ready to Get Started?</h2><p>Contact us today for a free site assessment and quotation.</p></div>
    <a href="{{ route('contact') }}" class="btn btn-white">Get a Free Quote →</a>
  </div>
</section>

@endsection
