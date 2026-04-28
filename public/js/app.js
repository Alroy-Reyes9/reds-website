// REDS EDS – Main JS

document.addEventListener('DOMContentLoaded', () => {

    // --- Navbar scroll effect ---
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            navbar.style.boxShadow = window.scrollY > 40 ? '0 4px 32px rgba(0,0,0,0.3)' : 'none';
        });
    }

    // --- Mobile hamburger ---
    const navToggle = document.getElementById('navToggle');
    const navLinks = document.getElementById('navLinks');
    if (navToggle && navLinks) {
        navToggle.addEventListener('click', () => navLinks.classList.toggle('open'));
        navLinks.querySelectorAll('a').forEach(a => {
            a.addEventListener('click', () => navLinks.classList.remove('open'));
        });
    }

    // --- Scroll-reveal animation ---
    const revealItems = document.querySelectorAll(
        '.service-card, .why-point, .value-card, .team-badge, .stat-item, .service-block, .gallery-item, .about-photo, .supply-photo'
    );

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        revealItems.forEach((el, i) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = `opacity 0.5s ease ${(i % 8) * 0.07}s, transform 0.5s ease ${(i % 8) * 0.07}s`;
            observer.observe(el);
        });
    }

    // Add revealed style
    const style = document.createElement('style');
    style.textContent = '.revealed { opacity: 1 !important; transform: none !important; }';
    document.head.appendChild(style);

});
