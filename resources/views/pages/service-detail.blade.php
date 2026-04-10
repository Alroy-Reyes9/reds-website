@extends('layouts.app')

@section('title', $service['title'] . ' — REDS Electromechanical')
@section('meta_desc', $service['desc'])

@push('styles')
<style>
    .detail-layout {
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 3rem;
        align-items: start;
        padding: 5rem 0;
    }

    .detail-main h2 {
        font-size: clamp(2rem, 5vw, 3rem);
        color: var(--charcoal);
        margin-bottom: 0.75rem;
    }

    .detail-main p {
        font-size: 1rem;
        color: var(--steel-light);
        line-height: 1.8;
        margin-bottom: 2rem;
        max-width: 580px;
    }

    .features-list {
        list-style: none;
        margin-top: 1.5rem;
    }

    .features-list li {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.85rem 0;
        border-bottom: 1px solid var(--border);
        font-size: 0.95rem;
        color: var(--steel);
    }

    .features-list li:last-child { border-bottom: none; }

    .features-list i { color: var(--red); flex-shrink: 0; }

    /* Sidebar */
    .detail-sidebar {
        position: sticky;
        top: 90px;
    }

    .sidebar-card {
        background: var(--charcoal);
        border-radius: 8px;
        padding: 2rem;
        margin-bottom: 1.5rem;
    }

    .sidebar-card h4 {
        font-size: 1.3rem;
        color: var(--white);
        margin-bottom: 0.5rem;
    }

    .sidebar-card p {
        font-size: 0.88rem;
        color: rgba(255,255,255,0.55);
        margin-bottom: 1.5rem;
        line-height: 1.7;
    }

    .sidebar-card .btn {
        width: 100%;
        justify-content: center;
        margin-bottom: 0.75rem;
    }

    .sidebar-contact {
        background: var(--offwhite);
        border-radius: 8px;
        padding: 1.5rem;
    }

    .sidebar-contact h5 {
        font-size: 0.8rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--red);
        font-family: 'Barlow Condensed', sans-serif;
        margin-bottom: 1rem;
    }

    .contact-row {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.9rem;
        color: var(--steel);
        margin-bottom: 0.75rem;
    }

    .contact-row i { color: var(--red); }

    /* Other services */
    .other-services { padding: 4rem 0; background: var(--offwhite); }

    .other-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 1rem;
        margin-top: 2rem;
    }

    .other-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 6px;
        padding: 1.25rem;
        text-decoration: none;
        color: inherit;
        transition: all 0.25s;
        display: flex;
        align-items: center;
        gap: 0.85rem;
    }

    .other-card:hover {
        border-color: var(--red);
        transform: translateY(-2px);
    }

    .other-card i { color: var(--red); flex-shrink: 0; }
    .other-card span { font-size: 0.88rem; font-weight: 600; color: var(--charcoal); }

    @media (max-width: 900px) {
        .detail-layout { grid-template-columns: 1fr; }
        .detail-sidebar { position: static; }
    }
</style>
@endpush

@section('content')

<div class="page-hero">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="sep">/</li>
            <li><a href="{{ route('services') }}">Services</a></li>
            <li class="sep">/</li>
            <li>{{ $service['title'] }}</li>
        </ul>
        <h1><em>{{ $service['title'] }}</em></h1>
        <p>{{ $service['short'] }}</p>
    </div>
</div>

<div class="container">
    <div class="detail-layout">
        <!-- Main -->
        <div class="detail-main">
            <div class="section-label">Service Details</div>
            <h2>About This Service</h2>
            <div class="red-line"></div>
            <p>{{ $service['desc'] }}</p>

            <div class="section-label">What's Included</div>
            <ul class="features-list">
                @foreach($service['features'] as $feature)
                <li>
                    <i data-lucide="check-circle" size="18"></i>
                    {{ $feature }}
                </li>
                @endforeach
            </ul>
        </div>

        <!-- Sidebar -->
        <aside class="detail-sidebar">
            <div class="sidebar-card">
                <h4>Book This Service</h4>
                <p>Schedule a site visit or consultation. We'll confirm your booking within 24 hours.</p>
                <a href="{{ route('book') }}?service={{ $service['slug'] }}" class="btn btn-primary">
                    <i data-lucide="calendar" size="16"></i> Book Now
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline" style="width:100%; justify-content:center;">
                    <i data-lucide="mail" size="16"></i> Send Inquiry
                </a>
            </div>

            <div class="sidebar-contact">
                <h5>Contact Us Directly</h5>
                <div class="contact-row"><i data-lucide="phone" size="16"></i> +63 XXX XXX XXXX</div>
                <div class="contact-row"><i data-lucide="mail" size="16"></i> info@redsengineering.com</div>
                <div class="contact-row"><i data-lucide="clock" size="16"></i> Mon–Sat 8AM–6PM | 24/7 Emergency</div>
            </div>
        </aside>
    </div>
</div>

<!-- Other services -->
<section class="other-services">
    <div class="container">
        <div class="section-label">Explore More</div>
        <h2 class="section-title">Other Services</h2>
        <div class="other-grid">
            @foreach(array_slice($others, 0, 8) as $other)
            <a href="{{ route('services.show', $other['slug']) }}" class="other-card">
                <i data-lucide="{{ $other['icon'] }}" size="20"></i>
                <span>{{ $other['title'] }}</span>
            </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
