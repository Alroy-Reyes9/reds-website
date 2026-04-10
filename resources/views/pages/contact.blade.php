@extends('layouts.app')

@section('title', 'Contact Us — REDS Electromechanical')
@section('meta_desc', 'Get in touch with REDS Electromechanical Engineering Services for inquiries, quotes, or emergency support.')

@push('styles')
<style>
    .contact-layout {
        display: grid;
        grid-template-columns: 1fr 420px;
        gap: 4rem;
        padding: 5rem 0;
        align-items: start;
    }

    .contact-form-wrap h2 { font-size: 2rem; margin-bottom: 0.5rem; }
    .contact-form-wrap > p { color: var(--steel-light); font-size: 0.95rem; margin-bottom: 2rem; line-height: 1.7; }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .contact-info-panel { position: sticky; top: 90px; }

    .info-card {
        background: var(--charcoal);
        border-radius: 8px;
        padding: 2.5rem;
        margin-bottom: 1.25rem;
    }

    .info-card h3 {
        font-size: 1.4rem;
        color: var(--white);
        margin-bottom: 0.5rem;
    }

    .info-card > p {
        font-size: 0.88rem;
        color: rgba(255,255,255,0.5);
        margin-bottom: 2rem;
        line-height: 1.7;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .info-icon {
        width: 40px;
        height: 40px;
        background: rgba(192,39,45,0.2);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--red-light);
        flex-shrink: 0;
    }

    .info-item h4 {
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: rgba(255,255,255,0.4);
        font-family: 'Barlow Condensed', sans-serif;
        margin-bottom: 0.3rem;
    }

    .info-item p {
        font-size: 0.9rem;
        color: rgba(255,255,255,0.8);
        line-height: 1.5;
    }

    .emergency-card {
        background: var(--red);
        border-radius: 8px;
        padding: 1.75rem;
        text-align: center;
    }

    .emergency-card h4 {
        font-size: 1.1rem;
        color: var(--white);
        margin-bottom: 0.5rem;
    }

    .emergency-card p {
        font-size: 0.85rem;
        color: rgba(255,255,255,0.75);
        margin-bottom: 1.25rem;
    }

    .emergency-card .btn {
        background: var(--white);
        color: var(--red);
        font-weight: 800;
        width: 100%;
        justify-content: center;
    }

    @media (max-width: 900px) {
        .contact-layout { grid-template-columns: 1fr; }
        .contact-info-panel { position: static; }
        .form-row { grid-template-columns: 1fr; }
    }
</style>
@endpush

@section('content')

<div class="page-hero">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="sep">/</li>
            <li>Contact Us</li>
        </ul>
        <h1>Get in <em>Touch</em></h1>
        <p>Have a question or need a quote? Send us a message and we'll get back to you promptly.</p>
    </div>
</div>

<div class="container">
    <div class="contact-layout">
        <!-- FORM -->
        <div class="contact-form-wrap">
            <div class="section-label">Send Us a Message</div>
            <h2>We'd Love to Hear<br>From You</h2>
            <div class="red-line"></div>
            <p>Fill in the form below and our team will respond within one business day. For urgent matters, please call us directly.</p>

            @if(session('success'))
            <div class="alert alert-success">
                <i data-lucide="check-circle" size="18" style="vertical-align:middle; margin-right:0.5rem;"></i>
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-error">
                <strong>Please fix the following errors:</strong>
                <ul style="margin-top:0.5rem; padding-left:1.2rem;">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" novalidate>
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="name">Full Name <span style="color:var(--red)">*</span></label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" placeholder="Juan dela Cruz" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Email Address <span style="color:var(--red)">*</span></label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" placeholder="juan@email.com" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"
                               value="{{ old('phone') }}" placeholder="+63 912 345 6789">
                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="service">Service Interested In</label>
                        <select id="service" name="service" class="form-control @error('service') is-invalid @enderror">
                            <option value="">— Select a service —</option>
                            @foreach($services as $key => $label)
                            <option value="{{ $key }}" {{ old('service') === $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('service')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="message">Message <span style="color:var(--red)">*</span></label>
                    <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror"
                              rows="5" placeholder="Tell us about your concern or what you need..." required>{{ old('message') }}</textarea>
                    @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <button type="submit" class="btn btn-primary" style="padding: 0.9rem 2.5rem;">
                    <i data-lucide="send" size="16"></i> Send Message
                </button>
            </form>
        </div>

        <!-- INFO PANEL -->
        <div class="contact-info-panel">
            <div class="info-card">
                <h3>Contact Information</h3>
                <p>Reach out through any of these channels. We're always ready to assist.</p>

                <div class="info-item">
                    <div class="info-icon"><i data-lucide="map-pin" size="18"></i></div>
                    <div>
                        <h4>Service Area</h4>
                        <p>Metro Manila and surrounding provinces, Philippines</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i data-lucide="phone" size="18"></i></div>
                    <div>
                        <h4>Phone</h4>
                        <p>+63 XXX XXX XXXX</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i data-lucide="mail" size="18"></i></div>
                    <div>
                        <h4>Email</h4>
                        <p>info@redsengineering.com</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i data-lucide="clock" size="18"></i></div>
                    <div>
                        <h4>Office Hours</h4>
                        <p>Monday – Saturday<br>8:00 AM – 6:00 PM</p>
                    </div>
                </div>
            </div>

            <div class="emergency-card">
                <h4>Emergency Service?</h4>
                <p>Our technicians are on standby 24/7 for urgent calls.</p>
                <a href="tel:+63XXXXXXXXXX" class="btn">
                    <i data-lucide="phone-call" size="16"></i> Call Emergency Line
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
