@extends('layouts.app')

@section('title', 'Our Services — REDS Electromechanical')
@section('meta_desc', 'Explore all electromechanical services offered by REDS: aircon, HVAC, boilers, chillers, fire pumps, generator sets, ice machines, and more.')

@push('styles')
<style>
    .services-filter {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        margin-bottom: 2.5rem;
    }

    .filter-btn {
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        padding: 0.45rem 1.1rem;
        border: 1.5px solid var(--border);
        border-radius: 3px;
        background: var(--white);
        color: var(--steel);
        cursor: pointer;
        transition: all 0.2s;
    }

    .filter-btn.active,
    .filter-btn:hover {
        background: var(--red);
        border-color: var(--red);
        color: var(--white);
    }

    .services-all-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
    }

    .svc-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 6px;
        padding: 2rem;
        text-decoration: none;
        color: inherit;
        display: block;
        transition: all 0.3s;
        position: relative;
    }

    .svc-card::after {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 4px;
        height: 0;
        background: var(--red);
        border-radius: 6px 0 0 6px;
        transition: height 0.3s;
    }

    .svc-card:hover::after { height: 100%; }
    .svc-card:hover {
        border-color: rgba(192,39,45,0.2);
        box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        transform: translateX(4px);
    }

    .svc-category-tag {
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--red);
        background: rgba(192,39,45,0.08);
        padding: 0.2rem 0.6rem;
        border-radius: 2px;
        display: inline-block;
        margin-bottom: 1rem;
    }

    .svc-card .svc-icon {
        width: 52px;
        height: 52px;
        background: var(--offwhite);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--steel);
        margin-bottom: 1.25rem;
        transition: all 0.3s;
    }

    .svc-card:hover .svc-icon {
        background: rgba(192,39,45,0.1);
        color: var(--red);
    }

    .svc-card h3 {
        font-size: 1.25rem;
        color: var(--charcoal);
        margin-bottom: 0.6rem;
    }

    .svc-card p {
        font-size: 0.88rem;
        color: var(--steel-light);
        line-height: 1.65;
        margin-bottom: 1.25rem;
    }

    .svc-link {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--red);
        transition: gap 0.2s;
    }

    .svc-card:hover .svc-link { gap: 0.8rem; }

    @media (max-width: 600px) {
        .services-all-grid { grid-template-columns: 1fr; }
    }
</style>
@endpush

@section('content')

<div class="page-hero">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="sep">/</li>
            <li>Services</li>
        </ul>
        <h1>Our <em>Services</em></h1>
        <p>Comprehensive electromechanical engineering solutions for residential, commercial, and industrial clients.</p>
    </div>
</div>

<section>
    <div class="container">
        <!-- Filter -->
        <div class="services-filter" id="filterBar">
            <button class="filter-btn active" data-cat="all">All Services</button>
            @foreach($categories as $cat)
            <button class="filter-btn" data-cat="{{ $cat }}">{{ $cat }}</button>
            @endforeach
        </div>

        <div class="services-all-grid" id="servicesGrid">
            @foreach($services as $svc)
            <a href="{{ route('services.show', $svc['slug']) }}" class="svc-card" data-cat="{{ $svc['category'] }}">
                <span class="svc-category-tag">{{ $svc['category'] }}</span>
                <div class="svc-icon">
                    <i data-lucide="{{ $svc['icon'] }}" size="24"></i>
                </div>
                <h3>{{ $svc['title'] }}</h3>
                <p>{{ $svc['short'] }}</p>
                <span class="svc-link">View details <i data-lucide="arrow-right" size="13"></i></span>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section style="background:var(--offwhite); padding:4rem 0; text-align:center;">
    <div class="container">
        <div class="section-label">Ready to proceed?</div>
        <h2 class="section-title" style="margin-bottom:1rem;">Not sure what service you need?</h2>
        <p style="color:var(--steel-light); max-width:440px; margin:0 auto 2rem;">Contact us and we'll assess your needs and recommend the right solution.</p>
        <div style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
            <a href="{{ route('book') }}" class="btn btn-primary"><i data-lucide="calendar" size="16"></i> Book a Service</a>
            <a href="{{ route('contact') }}" class="btn btn-outline-dark"><i data-lucide="mail" size="16"></i> Send Inquiry</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const cat = btn.dataset.cat;
        document.querySelectorAll('.svc-card').forEach(card => {
            card.style.display = (cat === 'all' || card.dataset.cat === cat) ? 'block' : 'none';
        });
    });
});
</script>
@endpush
