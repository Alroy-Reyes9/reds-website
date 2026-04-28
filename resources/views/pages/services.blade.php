@extends('layouts.app')
@section('title','Services – REDS EDS')
@section('content')

<section class="page-hero">
  <div class="container">
    <span class="label">What We Offer</span>
    <h1>Our <span class="text-red">Services</span></h1>
    <p>Comprehensive electromechanical solutions for residential, commercial, and industrial clients.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    @php $blocks=[
      ['aircon','Aircon & HVAC','We supply brand-new aircon units and handle full HVAC system design and installation.',['Brand new unit supply (window, split, cassette, ducted)','HVAC system design and installation','Home service and tune-up','Cleaning and filter maintenance','Freon recharging and leak detection','Annual maintenance contracts']],
      ['maintenance','Maintenance & Repair','Preventive maintenance programs and rapid-response repair services to minimize downtime.',['Scheduled preventive maintenance (PM)','Emergency on-call repair','Inspection and diagnostics','Spare parts sourcing and replacement','Maintenance log and reporting']],
      ['chiller','Chiller, Boiler & Ice Machine','Industrial-grade cooling and heating systems — from water-cooled chillers to steam boilers and commercial ice machines.',['Chiller installation and commissioning','Chiller chemical cleaning and tube brushing','Boiler installation, inspection, and compliance','Commercial ice machine supply and installation','System balancing and performance testing']],
      ['genset','Generator Sets (Gen Set)','Generator sets for backup and prime power applications, including load testing and PM contracts.',['Generator set supply and installation','Automatic transfer switch (ATS) installation','Load bank testing','Scheduled PM and fuel management','Emergency repair and parts replacement']],
      ['compressed-air','Compressed Air Systems','Compressed air systems for manufacturing, automotive, and general industrial use.',['Air compressor supply and installation','Compressed air piping and distribution','Air dryer and filtration systems','Compressor maintenance and overhaul']],
      ['fire','Fire Pump Systems','Fire pump systems in compliance with BFP and NFPA standards.',['Fire pump selection and installation','Jockey pump and controller installation','Annual fire pump flow testing','BFP compliance documentation','System inspection and certification']],
    ]; @endphp

    @foreach($blocks as $i => $b)
    <div class="svc-block {{ $i%2!==0 ? 'svc-block--alt' : '' }}" id="{{ $b[0] }}">
      <div class="svc-block-content">
        <h2>{{ $b[1] }}</h2>
        <p>{{ $b[2] }}</p>
        <ul class="svc-items">@foreach($b[3] as $item)<li>{{ $item }}</li>@endforeach</ul>
        <a href="{{ route('contact') }}" class="btn btn-primary">Request This Service</a>
      </div>
      <div class="svc-num-wrap"><span class="svc-num">{{ str_pad($i+1,2,'0',STR_PAD_LEFT) }}</span></div>
    </div>
    @endforeach
  </div>
</section>

<section class="cta-banner">
  <div class="container cta-inner">
    <div><h2>Need a Custom Solution?</h2><p>Our engineers will assess your site and provide a tailored proposal.</p></div>
    <a href="{{ route('contact') }}" class="btn btn-white">Contact Us →</a>
  </div>
</section>
@endsection
