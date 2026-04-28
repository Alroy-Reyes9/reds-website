document.addEventListener('DOMContentLoaded', () => {
  const nb = document.getElementById('navbar');
  if (nb) window.addEventListener('scroll', () => {
    nb.style.boxShadow = scrollY > 30 ? '0 4px 32px rgba(0,0,0,.3)' : 'none';
  });
  const burger = document.getElementById('navBurger');
  const links  = document.getElementById('navLinks');
  if (burger && links) {
    burger.addEventListener('click', () => links.classList.toggle('open'));
    links.querySelectorAll('a').forEach(a => a.addEventListener('click', () => links.classList.remove('open')));
  }
  const els = document.querySelectorAll('.svc-card,.why-item,.val-card,.team-card,.stat,.gi,.ap,.sp');
  if (!('IntersectionObserver' in window)) return;
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('vis'); io.unobserve(e.target); } });
  }, { threshold: 0.1 });
  els.forEach((el, i) => {
    el.style.cssText += 'opacity:0;transform:translateY(18px);transition:opacity .5s ease '+((i%6)*.08)+'s,transform .5s ease '+((i%6)*.08)+'s';
    io.observe(el);
  });
  const s = document.createElement('style');
  s.textContent = '.vis{opacity:1!important;transform:none!important}';
  document.head.appendChild(s);
});
