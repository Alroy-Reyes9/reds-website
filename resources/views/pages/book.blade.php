@extends('layouts.app')

@section('title', 'Book a Service — REDS Electromechanical')
@section('meta_desc', 'Schedule a service visit with REDS Electromechanical Engineering Services. Fill in the booking form and we will confirm your appointment.')

@push('styles')
<style>
    .book-layout {
        display: grid;
        grid-template-columns: 1fr 360px;
        gap: 4rem;
        padding: 5rem 0;
        align-items: start;
    }

    .steps-bar {
        display: flex;
        gap: 0;
        margin-bottom: 2.5rem;
    }

    .step {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        flex: 1;
    }

    .step-num {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: var(--red);
        color: var(--white);
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 0.9rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .step-text { font-size: 0.82rem; font-weight: 600; color: var(--steel); }
    .step-line { flex: 1; height: 1px; background: var(--border); margin: 0 0.5rem; }

    .form-section-title {
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--charcoal);
        margin: 2rem 0 1rem;
        padding-bottom: 0.6rem;
        border-bottom: 2px solid var(--border);
    }

    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

    /* Sidebar */
    .booking-sidebar { position: sticky; top: 90px; }

    .why-book-card {
        background: var(--offwhite);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 2rem;
        margin-bottom: 1.25rem;
    }

    .why-book-card h4 {
        font-size: 1.1rem;
        color: var(--charcoal);
        margin-bottom: 1.25rem;
    }

    .why-item {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        margin-bottom: 1rem;
        font-size: 0.88rem;
        color: var(--steel-light);
        line-height: 1.6;
    }

    .why-item i { color: var(--red); flex-shrink: 0; margin-top: 2px; }

    .contact-quick {
        background: var(--charcoal);
        border-radius: 8px;
        padding: 1.75rem;
        text-align: center;
    }

    .contact-quick p {
        font-size: 0.85rem;
        color: rgba(255,255,255,0.55);
        margin-bottom: 1rem;
    }

    .contact-quick a {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.6rem;
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--red-light);
        text-decoration: none;
        padding: 0.6rem;
        border: 1px solid rgba(192,39,45,0.3);
        border-radius: 4px;
        margin-bottom: 0.5rem;
        transition: all 0.2s;
    }

    .contact-quick a:hover {
        background: rgba(192,39,45,0.1);
        border-color: var(--red);
    }

    @media (max-width: 900px) {
        .book-layout { grid-template-columns: 1fr; }
        .booking-sidebar { position: static; }
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
            <li>Book a Service</li>
        </ul>
        <h1>Book a <em>Service Visit</em></h1>
        <p>Fill in the details below and our team will confirm your booking within 24 hours.</p>
    </div>
</div>

<div class="container">
    <div class="book-layout">
        <!-- FORM -->
        <div>
            <div class="steps-bar">
                <div class="step"><div class="step-num">1</div><span class="step-text">Your Info</span></div>
                <div class="step-line"></div>
                <div class="step"><div class="step-num">2</div><span class="step-text">Service</span></div>
                <div class="step-line"></div>
                <div class="step"><div class="step-num">3</div><span class="step-text">Schedule</span></div>
                <div class="step-line"></div>
                <div class="step"><div class="step-num">4</div><span class="step-text">Confirm</span></div>
            </div>

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
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('book.store') }}" method="POST" novalidate>
                @csrf

                <div class="form-section-title">Personal Information</div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="name">Full Name <span style="color:var(--red)">*</span></label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" placeholder="Juan dela Cruz" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone">Phone Number <span style="color:var(--red)">*</span></label>
                        <input type="tel" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"
                               value="{{ old('phone') }}" placeholder="+63 912 345 6789" required>
                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email Address <span style="color:var(--red)">*</span></label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" placeholder="juan@email.com" required>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="address">Service Address <span style="color:var(--red)">*</span></label>
                    <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror"
                              rows="2" placeholder="Full address where the service will be performed" required>{{ old('address') }}</textarea>
                    @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-section-title">Service Details</div>
                <div class="form-group">
                    <label class="form-label" for="service">Service Required <span style="color:var(--red)">*</span></label>
                    <select id="service" name="service" class="form-control @error('service') is-invalid @enderror" required>
                        <option value="">— Select a service —</option>
                        @foreach($services as $key => $label)
                        <option value="{{ $key }}" {{ old('service', request('service')) === $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('service')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="message">Additional Notes</label>
                    <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror"
                              rows="3" placeholder="Describe the problem, unit brand, model, or any other relevant details...">{{ old('message') }}</textarea>
                    @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-section-title">Preferred Schedule</div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="preferred_date">Preferred Date <span style="color:var(--red)">*</span></label>
                        <input type="date" id="preferred_date" name="preferred_date"
                               class="form-control @error('preferred_date') is-invalid @enderror"
                               value="{{ old('preferred_date') }}"
                               min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                        @error('preferred_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="preferred_time">Preferred Time <span style="color:var(--red)">*</span></label>
                        <select id="preferred_time" name="preferred_time" class="form-control @error('preferred_time') is-invalid @enderror" required>
                            <option value="">— Select a time slot —</option>
                            <option value="8:00 AM – 10:00 AM" {{ old('preferred_time') === '8:00 AM – 10:00 AM' ? 'selected' : '' }}>8:00 AM – 10:00 AM</option>
                            <option value="10:00 AM – 12:00 PM" {{ old('preferred_time') === '10:00 AM – 12:00 PM' ? 'selected' : '' }}>10:00 AM – 12:00 PM</option>
                            <option value="1:00 PM – 3:00 PM" {{ old('preferred_time') === '1:00 PM – 3:00 PM' ? 'selected' : '' }}>1:00 PM – 3:00 PM</option>
                            <option value="3:00 PM – 5:00 PM" {{ old('preferred_time') === '3:00 PM – 5:00 PM' ? 'selected' : '' }}>3:00 PM – 5:00 PM</option>
                        </select>
                        @error('preferred_time')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <p style="font-size:0.82rem; color:var(--steel-light); margin-bottom:1.5rem;">
                    <i data-lucide="info" size="13" style="vertical-align:middle; margin-right:0.3rem;"></i>
                    Your preferred schedule is not final. Our team will contact you to confirm availability.
                </p>

                <button type="submit" class="btn btn-primary" style="padding:0.9rem 2.5rem; font-size:1rem;">
                    <i data-lucide="calendar-check" size="17"></i> Submit Booking Request
                </button>
            </form>
        </div>

        <!-- SIDEBAR -->
        <aside class="booking-sidebar">
            <div class="why-book-card">
                <h4>Why Book With REDS?</h4>
                <div class="why-item"><i data-lucide="check-circle" size="16"></i>Licensed engineers on every job</div>
                <div class="why-item"><i data-lucide="check-circle" size="16"></i>Transparent pricing — no hidden charges</div>
                <div class="why-item"><i data-lucide="check-circle" size="16"></i>Service warranty on all completed work</div>
                <div class="why-item"><i data-lucide="check-circle" size="16"></i>Confirmation within 24 hours</div>
                <div class="why-item"><i data-lucide="check-circle" size="16"></i>Flexible scheduling Mon–Sat</div>
            </div>

            <div class="contact-quick">
                <p>Prefer to call or message us directly?</p>
                <a href="tel:+639176710074"><i data-lucide="phone" size="15"></i> Call Us Now</a>
                <a href="{{ route('contact') }}"><i data-lucide="mail" size="15"></i> Send an Inquiry</a>
            </div>
        </aside>
    </div>
</div>

@endsection
