@extends('layouts.app')
@section('title','Contact Us – REDS EDS')
@section('content')

<section class="page-hero">
  <div class="container">
    <span class="label">Get In Touch</span>
    <h1>Contact <span class="text-red">REDS</span></h1>
    <p>Request a quote, book a site visit, or ask us anything about your project.</p>
  </div>
</section>

<section class="section">
  <div class="container contact-cols">
    <div class="contact-info">
      <h3>Reach Us Directly</h3>
      <div class="c-item"><div class="c-ico">📍</div><div><strong>Office Address</strong><p>Metro Manila, Philippines</p></div></div>
      <div class="c-item"><div class="c-ico">📞</div><div><strong>Phone / Viber</strong><p><a href="tel:+630000000000">+63 900 000 0000</a></p></div></div>
      <div class="c-item"><div class="c-ico">✉️</div><div><strong>Email</strong><p><a href="mailto:info@redseds.com">info@redseds.com</a></p></div></div>
      <div class="c-item"><div class="c-ico">🕐</div><div><strong>Business Hours</strong><p>Mon–Sat: 8:00 AM – 6:00 PM<br>Emergency: 24/7</p></div></div>
    </div>
    <div class="contact-form-wrap">
      <h3>Send Us a Message</h3>
      @if(session('success'))<div class="alert alert-ok">{{ session('success') }}</div>@endif
      @if($errors->any())<div class="alert alert-err"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
      <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
        @csrf
        <div class="row2">
          <div class="form-group"><label>Full Name <span class="req">*</span></label><input type="text" name="name" value="{{ old('name') }}" placeholder="Juan dela Cruz" required></div>
          <div class="form-group"><label>Phone / Viber <span class="req">*</span></label><input type="text" name="phone" value="{{ old('phone') }}" placeholder="+63 900 000 0000" required></div>
        </div>
        <div class="form-group"><label>Email Address</label><input type="email" name="email" value="{{ old('email') }}" placeholder="you@email.com"></div>
        <div class="form-group">
          <label>Service Needed <span class="req">*</span></label>
          <select name="service" required>
            <option value="">-- Select a service --</option>
            @foreach(['aircon_supply'=>'Brand New Aircon Supply','home_service'=>'Home Service','maintenance'=>'Maintenance','repair'=>'Repair','cleaning'=>'Cleaning','hvac'=>'HVAC Installation','ice_machine'=>'Ice Machine','boiler'=>'Boiler','chiller'=>'Chiller','compressed_air'=>'Compressed Air','genset'=>'Generator Set','fire_pump'=>'Fire Pump','other'=>'Other'] as $v=>$l)
            <option value="{{ $v }}" {{ old('service')===$v?'selected':'' }}>{{ $l }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group"><label>Message / Details <span class="req">*</span></label><textarea name="message" rows="5" placeholder="Describe your project or concern..." required>{{ old('message') }}</textarea></div>
        <button type="submit" class="btn btn-primary btn-full">Send Message →</button>
      </form>
    </div>
  </div>
</section>
@endsection
