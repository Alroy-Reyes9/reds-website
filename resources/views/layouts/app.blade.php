<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="REDS Electromechanical Engineering Services – Aircon, HVAC, Chiller, Boiler, Gen Set and more.">
<title>@yield('title', 'REDS – Electromechanical Engineering Services')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow+Condensed:wght@500;700&family=Barlow:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@yield('head')
</head>
<body>

<header class="navbar" id="navbar">
  <div class="container nav-inner">
    <a href="{{ route('home') }}" class="nav-logo">
      <img src="{{ asset('images/reds-logo.jpg') }}" alt="REDS">
    </a>
    <nav class="nav-links" id="navLinks">
      <a href="{{ route('home') }}"     class="{{ request()->routeIs('home')     ? 'active' : '' }}">Home</a>
      <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
      <a href="{{ route('about') }}"    class="{{ request()->routeIs('about')    ? 'active' : '' }}">About</a>
      <a href="{{ route('contact') }}"  class="{{ request()->routeIs('contact')  ? 'active' : '' }}">Contact</a>
      <a href="{{ route('contact') }}"  class="nav-cta">Get a Quote</a>
    </nav>
    <button class="nav-burger" id="navBurger" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<main>@yield('content')</main>

<footer class="footer">
  <div class="container footer-grid">
    <div>
      <img src="{{ asset('images/reds-logo.jpg') }}" alt="REDS" class="footer-logo">
      <p class="footer-tag">Powering comfort and reliability through expert electromechanical engineering.</p>
      <div class="footer-socials">
        <a href="#" aria-label="Facebook">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
        </a>
        <a href="#" aria-label="Instagram">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
        </a>
      </div>
    </div>
    <div class="footer-col">
      <h4>Services</h4>
      <ul>
        <li><a href="{{ route('services') }}#aircon">Aircon Installation</a></li>
        <li><a href="{{ route('services') }}#hvac">HVAC Systems</a></li>
        <li><a href="{{ route('services') }}#chiller">Chiller &amp; Boiler</a></li>
        <li><a href="{{ route('services') }}#genset">Generator Sets</a></li>
        <li><a href="{{ route('services') }}#maintenance">Maintenance &amp; Repair</a></li>
        <li><a href="{{ route('services') }}#fire">Fire Pump</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Company</h4>
      <ul>
        <li><a href="{{ route('about') }}">About Us</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="#">Privacy Policy</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Contact</h4>
      <address>
        <p>📍 91 Doña Nieves St, San Isidro, Angono, Rizal</p>
        <p>📞 <a href="tel:+639176710074">+63 917 671 0074</a></p>
        <p>✉️ <a href="mailto:roland26fuentes@gmail.com">roland26fuentes@gmail.com</a></p>
        <p>🕐 Mon–Sat 8AM–6PM · Emergency 24/7</p>
      </address>
    </div>
  </div>
  <div class="footer-btm">
    <div class="container">
      <p>&copy; {{ date('Y') }} REDS Electromechanical Engineering Services. All rights reserved.</p>
    </div>
  </div>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
