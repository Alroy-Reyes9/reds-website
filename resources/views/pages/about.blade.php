@extends('layouts.app')
@section('title','About Us – REDS EDS')
@section('content')

<section class="page-hero">
  <div class="container">
    <span class="label">Who We Are</span>
    <h1>About <span class="text-red">REDS EDS</span></h1>
    <p>Passionate about engineering excellence and lasting client relationships.</p>
  </div>
</section>

<section class="section">
  <div class="container about-cols">
    <div>
      <span class="label">Our Story</span>
      <h2>Engineering That <span class="text-red">Stands the Test of Time</span></h2>
      <p>REDS Electromechanical Engineering Services was founded with one clear mission: to deliver reliable, high-quality mechanical and electrical services across the Philippines.</p>
      <p>From humble beginnings in residential aircon servicing, REDS EDS has grown into a full-service electromechanical contractor — handling complex HVAC systems, industrial chillers, boilers, compressed air systems, fire pumps, and generator sets.</p>
      <p>Our team of licensed engineers and certified technicians brings deep technical expertise and a commitment to safety, quality, and customer satisfaction to every project.</p>
    </div>
    <div class="values">
      @foreach([['Safety First','Every job planned and executed with strict safety protocols.'],['Quality Work','Only certified materials and proven methods — no shortcuts.'],['Client Focus','Solutions aligned with your budget and operational needs.'],['Integrity','Transparent pricing, honest assessments, no hidden charges.']] as $v)
      <div class="val-card"><strong>{{ $v[0] }}</strong><p>{{ $v[1] }}</p></div>
      @endforeach
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="sec-hdr">
      <span class="label">In the Field</span>
      <h2>Our Team at Work</h2>
      <p>Every project photographed — from delivery to final installation.</p>
    </div>
    <div class="action-grid">
      <div class="ap ap--wide"><img src="{{ asset('images/install-outdoor-unit.jpg') }}" alt="Team lift"><div class="ap-lbl">Team effort — outdoor unit positioning</div></div>
      <div class="ap"><img src="{{ asset('images/indoor-unit-repair.jpg') }}" alt="Indoor service"><div class="ap-lbl">Indoor unit service</div></div>
      <div class="ap"><img src="{{ asset('images/rooftop-repair.jpg') }}" alt="Rooftop"><div class="ap-lbl">Rooftop installation</div></div>
      <div class="ap"><img src="{{ asset('images/bracket-install.jpg') }}" alt="Bracket"><div class="ap-lbl">Precision bracket mounting</div></div>
      <div class="ap"><img src="{{ asset('images/outdoor-unit-welding.jpg') }}" alt="Welding"><div class="ap-lbl">Outdoor unit pipe connection</div></div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="sec-hdr">
      <span class="label">The Team</span>
      <h2>Licensed Professionals, Trusted by Hundreds</h2>
    </div>
    <div class="team-grid">
      @foreach([['⚙','Licensed Mechanical Engineers','PRC-licensed MEs overseeing all projects.'],['❄','Certified HVAC Technicians','Factory-trained on Mitsubishi, Daikin, Carrier, and more.'],['⚡','Electrical Engineers','Licensed EEs handling power and control systems.'],['🛡','Safety Officers','DOLE-accredited SO2 safety officers on every site.']] as $t)
      <div class="team-card"><div class="team-ico">{{ $t[0] }}</div><strong>{{ $t[1] }}</strong><p>{{ $t[2] }}</p></div>
      @endforeach
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="sec-hdr">
      <span class="label">Supply & Inventory</span>
      <h2>Brand New Units, Ready to Deliver</h2>
      <p>In-stock inventory of top aircon brands so your project moves fast.</p>
    </div>
    <div class="supply-grid">
      <div class="sp"><img src="{{ asset('images/warehouse-stock.jpg') }}" alt="Warehouse stock"><div class="sp-lbl">Panasonic, Carrier, LG — ready for deployment</div></div>
      <div class="sp"><img src="{{ asset('images/daikin-delivery.jpg') }}" alt="Daikin delivery"><div class="sp-lbl">Daikin unit delivery to client site</div></div>
      <div class="sp"><img src="{{ asset('images/condura-delivery.jpg') }}" alt="Condura delivery"><div class="sp-lbl">Condura Inverter — delivered to doorstep</div></div>
    </div>
  </div>
</section>

<section class="cta-banner">
  <div class="container cta-inner">
    <div><h2>Work With Us</h2><p>Let's discuss your project requirements today.</p></div>
    <a href="{{ route('contact') }}" class="btn btn-white">Get in Touch →</a>
  </div>
</section>
@endsection
