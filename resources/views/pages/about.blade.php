@extends('layouts.app')

@section('title', 'About Us — REDS Electromechanical')
@section('meta_desc', 'Learn about REDS Electromechanical Engineering Services — our history, mission, team, and core values.')

@push('styles')
<style>
    .about-intro {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5rem;
        align-items: center;
        padding: 5rem 0;
    }

    .about-intro p {
        font-size: 1rem;
        color: var(--steel-light);
        line-height: 1.85;
        margin-bottom: 1.25rem;
    }

    .gear-graphic {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 360px;
    }

    .gear-graphic svg {
        position: absolute;
    }

    .gear-big {
        width: 280px;
        height: 280px;
        animation: spin 40s linear infinite;
        color: rgba(192,39,45,0.12);
    }

    .gear-small {
        width: 150px;
        height: 150px;
        animation: spin 20s linear infinite reverse;
        color: rgba(61,61,61,0.15);
        transform: translate(100px, 50px);
    }

    .gear-center-text {
        position: absolute;
        text-align: center;
        z-index: 2;
    }

    .gear-center-text .big {
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 3.5rem;
        font-weight: 800;
        color: var(--red);
        line-height: 1;
    }

    .gear-center-text .small {
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: var(--steel-light);
    }

    @keyframes spin { to { transform: rotate(360deg); } }

    /* Values */
    .values-section { background: var(--offwhite); }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 1.5rem;
        margin-top: 3rem;
    }

    .value-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 6px;
        padding: 2rem;
        transition: all 0.3s;
    }

    .value-card:hover {
        border-color: var(--red);
        box-shadow: 0 6px 24px rgba(0,0,0,0.08);
    }

    .value-icon {
        width: 50px;
        height: 50px;
        background: rgba(192,39,45,0.08);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--red);
        margin-bottom: 1.25rem;
    }

    .value-card h3 { font-size: 1.2rem; margin-bottom: 0.5rem; }
    .value-card p { font-size: 0.88rem; color: var(--steel-light); line-height: 1.7; }

    /* Team */
    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 1.5rem;
        margin-top: 3rem;
    }

    .team-card {
        background: var(--charcoal);
        border-radius: 8px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s;
    }

    .team-card:hover { transform: translateY(-4px); }

    .team-avatar {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: rgba(192,39,45,0.2);
        border: 2px solid var(--red);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.25rem;
        color: var(--red-light);
    }

    .team-card h3 { font-size: 1.1rem; color: var(--white); margin-bottom: 0.3rem; }
    .team-card .role {
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--red-light);
        margin-bottom: 0.85rem;
    }
    .team-card p { font-size: 0.85rem; color: rgba(255,255,255,0.5); line-height: 1.7; }

    @media (max-width: 768px) {
        .about-intro { grid-template-columns: 1fr; }
        .gear-graphic { height: 220px; }
    }
</style>
@endpush

@section('content')

<div class="page-hero">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="sep">/</li>
            <li>About Us</li>
        </ul>
        <h1>About <em>REDS</em></h1>
        <p>Over a decade of trusted electromechanical engineering services — built on quality, safety, and reliability.</p>
    </div>
</div>

<!-- INTRO -->
<section>
    <div class="container">
        <div class="about-intro">
            <div>
                <div class="section-label">Our Story</div>
                <h2 class="section-title">Engineering with<br>Purpose Since Day One</h2>
                <div class="red-line"></div>
                <p>REDS Electromechanical Engineering Services was founded on a simple but firm belief: that every client — whether a homeowner or an industrial facility — deserves professional, honest, and quality engineering work.</p>
                <p>From our early days servicing residential aircon units, we have grown into a full-service electromechanical company capable of handling complex industrial systems including HVAC, boilers, chillers, fire protection, and power generation.</p>
                <p>Our team of licensed engineers and certified technicians is committed to upholding the highest standards of workmanship, safety, and customer service on every job we take.</p>
                <a href="{{ route('book') }}" class="btn btn-primary" style="margin-top:1rem;">
                    <i data-lucide="calendar" size="16"></i> Work With Us
                </a>
            </div>
            <div class="gear-graphic">
                <svg class="gear-big" viewBox="0 0 200 200" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M77.7 8.9l-2.6 12.7c-4.7 1.3-9.2 3.2-13.4 5.7L51 21.4l-15.8 15.8 5.9 10.7c-2.5 4.2-4.4 8.7-5.7 13.4L23 63.7v22.3l12.4 2.6c1.3 4.7 3.2 9.2 5.7 13.4L35.2 112l15.8 15.8 10.7-5.9c4.2 2.5 8.7 4.4 13.4 5.7l2.6 12.4h22.3l2.6-12.4c4.7-1.3 9.2-3.2 13.4-5.7l10.7 5.9L142.5 112l-5.9-10.7c2.5-4.2 4.4-8.7 5.7-13.4l12.4-2.6V63l-12.4-2.6c-1.3-4.7-3.2-9.2-5.7-13.4l5.9-10.7L126.7 20.5l-10.7 5.9c-4.2-2.5-8.7-4.4-13.4-5.7L100 8.9H77.7zm11.1 47.3c18.7 0 33.9 15.2 33.9 33.9S107.5 124 88.8 124 55 108.8 55 90.1s15.1-33.9 33.8-33.9z"/>
                </svg>
                <div class="gear-center-text">
                    <div class="big">15+</div>
                    <div class="small">Years of Service</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- VALUES -->
<section class="values-section">
    <div class="container">
        <div class="section-label">What Drives Us</div>
        <h2 class="section-title">Our Core Values</h2>
        <div class="red-line"></div>

        <div class="values-grid">
            @foreach($values as $value)
            <div class="value-card">
                <div class="value-icon">
                    <i data-lucide="{{ $value['icon'] }}" size="22"></i>
                </div>
                <h3>{{ $value['title'] }}</h3>
                <p>{{ $value['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- TEAM -->
<section>
    <div class="container">
        <div class="section-label">The People Behind REDS</div>
        <h2 class="section-title">Meet Our Team</h2>
        <div class="red-line"></div>

        <div class="team-grid">
            @foreach($team as $member)
            <div class="team-card">
                <div class="team-avatar">
                    <i data-lucide="user" size="28"></i>
                </div>
                <h3>{{ $member['name'] }}</h3>
                <div class="role">{{ $member['role'] }}</div>
                <p>{{ $member['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
