<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'REDS Electromechanical Engineering Services')</title>
    <meta name="description" content="@yield('meta_desc', 'Professional electromechanical engineering services — aircon, HVAC, boilers, chillers, fire pumps, gen sets, and more.')">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700;800&family=Barlow:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <style>
        /* ============================================================
           REDS — DESIGN SYSTEM
           Color: Crimson Red #C0272D  |  Steel #3D3D3D  |  Charcoal #1A1A1A
        ============================================================ */
        :root {
            --red:        #C0272D;
            --red-dark:   #9A1F24;
            --red-light:  #E8383E;
            --steel:      #3D3D3D;
            --steel-light:#5A5A5A;
            --charcoal:   #1A1A1A;
            --offwhite:   #F5F4F2;
            --white:      #FFFFFF;
            --border:     #E0DEDD;
            --shadow:     rgba(0,0,0,0.12);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Barlow', sans-serif;
            background: var(--white);
            color: var(--charcoal);
            font-size: 16px;
            line-height: 1.6;
        }

        /* ---- TYPOGRAPHY ---- */
        h1, h2, h3, h4, h5 {
            font-family: 'Barlow Condensed', sans-serif;
            font-weight: 700;
            line-height: 1.15;
            letter-spacing: 0.01em;
        }

        .section-label {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--red);
        }

        .section-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: clamp(2rem, 5vw, 3.2rem);
            font-weight: 800;
            color: var(--charcoal);
            margin-top: 0.3rem;
        }

        /* ---- LAYOUT ---- */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        section { padding: 5rem 0; }

        /* ---- NAVBAR ---- */
        .navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            background: rgba(26, 26, 26, 0.96);
            backdrop-filter: blur(12px);
            border-bottom: 2px solid var(--red);
            transition: all 0.3s ease;
        }

        .navbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 70px;
            padding: 0 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }

        .navbar-brand img {
            height: 44px;
            width: auto;
            
        }

        .brand-text {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            color: var(--white);
            line-height: 1.2;
        }

        .brand-text span {
            display: block;
            font-size: 0.65rem;
            font-weight: 400;
            letter-spacing: 0.12em;
            color: var(--red-light);
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            list-style: none;
        }

        .nav-links a {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            padding: 0.5rem 0.9rem;
            border-radius: 3px;
            transition: all 0.2s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--white);
            background: rgba(192, 39, 45, 0.15);
        }

        .nav-cta {
            background: var(--red) !important;
            color: var(--white) !important;
            padding: 0.5rem 1.2rem !important;
        }

        .nav-cta:hover {
            background: var(--red-dark) !important;
        }

        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 0.5rem;
            background: none;
            border: none;
        }

        .hamburger span {
            display: block;
            width: 24px;
            height: 2px;
            background: var(--white);
            transition: all 0.3s;
        }

        /* ---- BUTTONS ---- */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            text-decoration: none;
            padding: 0.8rem 2rem;
            border-radius: 3px;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .btn-primary {
            background: var(--red);
            color: var(--white);
            border-color: var(--red);
        }

        .btn-primary:hover {
            background: var(--red-dark);
            border-color: var(--red-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(192,39,45,0.35);
        }

        .btn-outline {
            background: transparent;
            color: var(--white);
            border-color: rgba(255,255,255,0.5);
        }

        .btn-outline:hover {
            border-color: var(--white);
            background: rgba(255,255,255,0.1);
        }

        .btn-outline-dark {
            background: transparent;
            color: var(--charcoal);
            border-color: var(--steel);
        }

        .btn-outline-dark:hover {
            background: var(--charcoal);
            color: var(--white);
        }

        /* ---- CARDS ---- */
        .card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 6px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .card:hover {
            border-color: var(--red);
            box-shadow: 0 8px 30px var(--shadow);
            transform: translateY(-4px);
        }

        /* ---- FORMS ---- */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--steel);
            margin-bottom: 0.4rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            font-family: 'Barlow', sans-serif;
            font-size: 0.95rem;
            color: var(--charcoal);
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 4px;
            transition: border-color 0.2s;
            outline: none;
        }

        .form-control:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px rgba(192,39,45,0.1);
        }

        select.form-control { appearance: none; cursor: pointer; }

        .form-control.is-invalid { border-color: #dc3545; }
        .invalid-feedback { color: #dc3545; font-size: 0.8rem; margin-top: 0.25rem; }

        /* ---- ALERTS ---- */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .alert-success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .alert-error {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        /* ---- PAGE HERO (INNER PAGES) ---- */
        .page-hero {
            background: var(--charcoal);
            background-image:
                linear-gradient(135deg, rgba(192,39,45,0.15) 0%, transparent 60%),
                repeating-linear-gradient(45deg, transparent, transparent 30px, rgba(255,255,255,0.015) 30px, rgba(255,255,255,0.015) 31px);
            padding: 7rem 0 4rem;
            margin-top: 70px;
            position: relative;
            overflow: hidden;
        }

        .page-hero::before {
            content: '';
            position: absolute;
            right: -5%;
            top: -20%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(192,39,45,0.12) 0%, transparent 65%);
            pointer-events: none;
        }

        .page-hero h1 {
            font-size: clamp(2.5rem, 6vw, 4rem);
            color: var(--white);
        }

        .page-hero h1 em {
            color: var(--red-light);
            font-style: normal;
        }

        .page-hero p {
            color: rgba(255,255,255,0.65);
            font-size: 1.05rem;
            max-width: 550px;
            margin-top: 0.75rem;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            list-style: none;
            margin-bottom: 1.5rem;
            font-size: 0.8rem;
        }

        .breadcrumb li { color: rgba(255,255,255,0.45); }
        .breadcrumb a { color: rgba(255,255,255,0.65); text-decoration: none; }
        .breadcrumb a:hover { color: var(--red-light); }
        .breadcrumb .sep { color: rgba(255,255,255,0.25); }

        /* ---- FOOTER ---- */
        footer {
            background: var(--charcoal);
            color: rgba(255,255,255,0.7);
            padding: 4rem 0 1.5rem;
            border-top: 3px solid var(--red);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-brand img {
            height: 50px;
            filter: brightness(0) invert(1) sepia(1) saturate(5) hue-rotate(315deg);
            margin-bottom: 1rem;
        }

        .footer-brand p {
            font-size: 0.9rem;
            line-height: 1.7;
            color: rgba(255,255,255,0.55);
            max-width: 280px;
        }

        .footer-col h4 {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--red-light);
            margin-bottom: 1.2rem;
        }

        .footer-links { list-style: none; }
        .footer-links li { margin-bottom: 0.6rem; }
        .footer-links a {
            color: rgba(255,255,255,0.55);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.2s;
        }
        .footer-links a:hover { color: var(--white); }

        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 0.9rem;
            font-size: 0.9rem;
            color: rgba(255,255,255,0.55);
        }

        .footer-contact-item i { color: var(--red-light); margin-top: 2px; flex-shrink: 0; }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.35);
        }

        /* ---- DIVIDER ---- */
        .red-line {
            width: 50px;
            height: 4px;
            background: var(--red);
            margin: 1rem 0 1.5rem;
        }

        /* ---- MOBILE ---- */
        @media (max-width: 768px) {
            .hamburger { display: flex; }

            .nav-links {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 70px; left: 0; right: 0;
                background: rgba(26,26,26,0.98);
                padding: 1rem 0 1.5rem;
                border-bottom: 2px solid var(--red);
                gap: 0;
            }

            .nav-links.open { display: flex; }

            .nav-links a {
                padding: 0.8rem 1.5rem;
                border-radius: 0;
                width: 100%;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 0.5rem;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .footer-grid { grid-template-columns: 1fr; }
        }
    </style>

    @stack('styles')
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="navbar-inner">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ asset('images/reds-logo.jpg') }}" alt="REDS Logo">
            <div class="brand-text">
                REDS
                <span>Electromechanical Engineering</span>
            </div>
        </a>

        <ul class="nav-links" id="navLinks">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services*') ? 'active' : '' }}">Services</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Us</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
            <li><a href="{{ route('book') }}" class="nav-cta">Book a Service</a></li>
        </ul>

        <button class="hamburger" id="hamburger" aria-label="Menu">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>

<!-- PAGE CONTENT -->
@yield('content')

<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <img src="{{ asset('images/reds-logo.jpg') }}" alt="REDS Logo">
                <p>REDS Electromechanical Engineering Services provides professional, reliable, and code-compliant mechanical and electrical services for residential, commercial, and industrial clients.</p>
            </div>

            <div class="footer-col">
                <h4>Navigation</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    <li><a href="{{ route('book') }}">Book a Service</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Services</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('services.show', 'aircon') }}">Aircon Units</a></li>
                    <li><a href="{{ route('services.show', 'hvac') }}">HVAC Systems</a></li>
                    <li><a href="{{ route('services.show', 'boiler') }}">Boiler Services</a></li>
                    <li><a href="{{ route('services.show', 'chiller') }}">Chiller Systems</a></li>
                    <li><a href="{{ route('services.show', 'fire-pump') }}">Fire Pump</a></li>
                    <li><a href="{{ route('services.show', 'gen-set') }}">Generator Set</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Get in Touch</h4>
                <div class="footer-contact-item">
                    <i data-lucide="map-pin" size="16"></i>
                    <span>Metro Manila &amp; surrounding provinces, Philippines</span>
                </div>
                <div class="footer-contact-item">
                    <i data-lucide="phone" size="16"></i>
                    <span>+63 XXX XXX XXXX</span>
                </div>
                <div class="footer-contact-item">
                    <i data-lucide="mail" size="16"></i>
                    <span>info@redsengineering.com</span>
                </div>
                <div class="footer-contact-item">
                    <i data-lucide="clock" size="16"></i>
                    <span>Mon–Sat: 8:00 AM – 6:00 PM<br>Emergency: 24/7</span>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} REDS Electromechanical Engineering Services. All rights reserved.</p>
            <p>Built with Laravel &amp; MySQL</p>
        </div>
    </div>
</footer>

<script>
    // Init Lucide icons
    lucide.createIcons();

    // Mobile nav toggle
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('navLinks');
    hamburger.addEventListener('click', () => navLinks.classList.toggle('open'));

    // Navbar scroll effect
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        navbar.style.boxShadow = window.scrollY > 50 ? '0 4px 20px rgba(0,0,0,0.3)' : 'none';
    });
</script>

@stack('scripts')
</body>
</html>
