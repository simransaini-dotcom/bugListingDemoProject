/**
 * BURGER PREMIUM — Main JavaScript
 * GSAP · ScrollTrigger · Three.js Particles · Swiper · AOS
 */

/* ── Wait for all scripts (GSAP, Three.js, etc.) ─────────── */
window.addEventListener('load', () => {
  if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
    gsap.registerPlugin(ScrollTrigger);
  }
  initLoader();
  initCursor();
  initNavbar();
  initThreeParticles();
  initBurgerAnimations();
  initScrollReveal();
  initMenuTabs();
  initTestimonialSwiper();
  initMagneticButtons();
  initParallaxIngredients();
});

/* ══════════════════════════════════════════════════════════
   LOADER
══════════════════════════════════════════════════════════ */
function initLoader() {
  const loader = document.getElementById('loader');
  if (!loader) return;

  // Already inside the load event — animate directly
  gsap.to(loader, {
    opacity: 0,
    duration: 0.8,
    delay: 2.0,
    ease: 'power2.inOut',
    onComplete: () => {
      loader.style.display = 'none';
      initHeroEntrance();
    }
  });
}

function initHeroEntrance() {
  const tl = gsap.timeline({ defaults: { ease: 'power3.out', clearProps: 'all' } });

  tl.fromTo('.hero-badge',
      { opacity: 0, y: 30 }, { opacity: 1, y: 0, duration: 0.8 })
    .fromTo('.hero-title .line',
      { opacity: 0, y: 60 }, { opacity: 1, y: 0, duration: 1, stagger: 0.15 }, '-=0.3')
    .fromTo('.hero-subtitle',
      { opacity: 0, y: 30 }, { opacity: 1, y: 0, duration: 0.8 }, '-=0.5')
    .fromTo('.hero-ctas',
      { opacity: 0, y: 30 }, { opacity: 1, y: 0, duration: 0.8 }, '-=0.5')
    .fromTo('.hero-stats',
      { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 0.7 }, '-=0.4')
    .fromTo('.burger-wrapper',
      { opacity: 0, scale: 0.6, y: 60 },
      { opacity: 1, scale: 1, y: 0, duration: 1.2, ease: 'back.out(1.6)' }, '-=1.2')
    .fromTo('.float-ingredient',
      { opacity: 0, scale: 0 },
      { opacity: 0.75, scale: 1, duration: 0.8, stagger: 0.1, ease: 'back.out(2)' }, '-=0.8')
    .call(() => {
      /* Signal journey burger system that hero entrance is complete */
      document.dispatchEvent(new CustomEvent('heroEntranceDone'));
    });
}

/* ══════════════════════════════════════════════════════════
   CUSTOM CURSOR
══════════════════════════════════════════════════════════ */
function initCursor() {
  const dot  = document.querySelector('.cursor-dot');
  const ring = document.querySelector('.cursor-ring');
  if (!dot || !ring) return;

  let mouseX = 0, mouseY = 0;
  let ringX  = 0, ringY  = 0;

  document.addEventListener('mousemove', (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
    gsap.to(dot, { x: mouseX, y: mouseY, duration: 0.1 });
  });

  // Smooth ring lag
  gsap.ticker.add(() => {
    ringX += (mouseX - ringX) * 0.12;
    ringY += (mouseY - ringY) * 0.12;
    gsap.set(ring, { x: ringX, y: ringY });
  });

  // Hover states
  document.querySelectorAll('a, button, .menu-card, .why-card').forEach(el => {
    el.addEventListener('mouseenter', () => {
      gsap.to(ring, { width: 60, height: 60, borderColor: 'rgba(212,160,23,0.8)', duration: 0.3 });
      gsap.to(dot,  { scale: 1.5, duration: 0.2 });
    });
    el.addEventListener('mouseleave', () => {
      gsap.to(ring, { width: 36, height: 36, borderColor: 'rgba(212,160,23,0.6)', duration: 0.3 });
      gsap.to(dot,  { scale: 1, duration: 0.2 });
    });
  });
}

/* ══════════════════════════════════════════════════════════
   NAVBAR
══════════════════════════════════════════════════════════ */
function initNavbar() {
  const nav = document.querySelector('.navbar');
  if (!nav) return;

  ScrollTrigger.create({
    start: 'top -60px',
    onUpdate: (self) => {
      nav.classList.toggle('scrolled', self.scroll() > 60);
    }
  });
}

/* ══════════════════════════════════════════════════════════
   THREE.JS — HERO PARTICLES
══════════════════════════════════════════════════════════ */
function initThreeParticles() {
  const canvas = document.getElementById('heroCanvas');
  if (!canvas || typeof THREE === 'undefined') return;

  const renderer = new THREE.WebGLRenderer({ canvas, alpha: true, antialias: true });
  renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
  renderer.setSize(window.innerWidth, window.innerHeight);

  const scene  = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 0.1, 100);
  camera.position.z = 5;

  /* ── Particle geometry ── */
  const COUNT = 220;
  const geo   = new THREE.BufferGeometry();
  const positions = new Float32Array(COUNT * 3);
  const colors    = new Float32Array(COUNT * 3);
  const sizes     = new Float32Array(COUNT);

  const colorPalette = [
    new THREE.Color(0xD4A017), // gold
    new THREE.Color(0xF0C840), // light gold
    new THREE.Color(0xFF6B35), // accent orange
    new THREE.Color(0xFFB800), // cheese yellow
    new THREE.Color(0xFFFFFF), // white
  ];

  for (let i = 0; i < COUNT; i++) {
    positions[i * 3]     = (Math.random() - 0.5) * 22;
    positions[i * 3 + 1] = (Math.random() - 0.5) * 14;
    positions[i * 3 + 2] = (Math.random() - 0.5) * 8;

    const c = colorPalette[Math.floor(Math.random() * colorPalette.length)];
    colors[i * 3]     = c.r;
    colors[i * 3 + 1] = c.g;
    colors[i * 3 + 2] = c.b;

    sizes[i] = Math.random() * 3 + 1;
  }

  geo.setAttribute('position', new THREE.BufferAttribute(positions, 3));
  geo.setAttribute('color',    new THREE.BufferAttribute(colors, 3));
  geo.setAttribute('size',     new THREE.BufferAttribute(sizes, 1));

  /* ── Shader material for glowing particles ── */
  const mat = new THREE.PointsMaterial({
    size: 0.06,
    vertexColors: true,
    transparent: true,
    opacity: 0.65,
    sizeAttenuation: true,
    blending: THREE.AdditiveBlending,
    depthWrite: false,
  });

  const particles = new THREE.Points(geo, mat);
  scene.add(particles);

  /* ── Mouse parallax ── */
  let targetX = 0, targetY = 0;
  document.addEventListener('mousemove', (e) => {
    targetX = (e.clientX / window.innerWidth  - 0.5) * 0.4;
    targetY = (e.clientY / window.innerHeight - 0.5) * 0.25;
  });

  /* ── Render loop ── */
  let frame = 0;
  function animate() {
    requestAnimationFrame(animate);
    frame += 0.004;

    particles.rotation.y += (targetX * 0.5 - particles.rotation.y) * 0.04;
    particles.rotation.x += (-targetY * 0.3 - particles.rotation.x) * 0.04;
    particles.rotation.z  = Math.sin(frame) * 0.05;

    // Drift particles upward very slowly
    const pos = geo.attributes.position.array;
    for (let i = 1; i < COUNT * 3; i += 3) {
      pos[i] += 0.004;
      if (pos[i] > 7) pos[i] = -7;
    }
    geo.attributes.position.needsUpdate = true;

    renderer.render(scene, camera);
  }
  animate();

  /* ── Resize ── */
  window.addEventListener('resize', () => {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
  });
}

/* ══════════════════════════════════════════════════════════
   BURGER — FLOAT + CINEMATIC SCROLL ANIMATION
══════════════════════════════════════════════════════════ */
function initBurgerAnimations() {
  const burgerWrapper = document.querySelector('.burger-wrapper');
  if (!burgerWrapper) return;

  /* ── Idle floating animation ── */
  const floatTl = gsap.timeline({ repeat: -1, yoyo: true });
  floatTl
    .to(burgerWrapper, {
      y: -22,
      rotation: 2.5,
      duration: 2.8,
      ease: 'sine.inOut'
    })
    .to(burgerWrapper, {
      y: -8,
      rotation: -1.5,
      duration: 2.4,
      ease: 'sine.inOut'
    });

  /* ── Subtle burger layer breathing ── */
  gsap.to('.bun-top', {
    scaleX: 1.015,
    duration: 3.5,
    ease: 'sine.inOut',
    yoyo: true,
    repeat: -1
  });
  gsap.to('.patty-layer', {
    scaleX: 0.995,
    duration: 4,
    delay: 0.5,
    ease: 'sine.inOut',
    yoyo: true,
    repeat: -1
  });

  /* Scroll journey is handled entirely by burger-journey.js
     The hero burger fades out once the journey burger activates. */

  /* ── Cheese drip animation ── */
  gsap.to('.cheese-melt', {
    scaleY: 1.25,
    y: 4,
    duration: 2,
    stagger: 0.3,
    ease: 'sine.inOut',
    yoyo: true,
    repeat: -1
  });
}

/* ══════════════════════════════════════════════════════════
   SCROLL REVEAL — AOS only (no GSAP opacity conflicts)
══════════════════════════════════════════════════════════ */
function initScrollReveal() {
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 850,
      easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)',
      once: true,
      offset: 60,
      delay: 0,
    });
  }

  /* Stat counters — trigger once when hero-stats enters viewport */
  if (typeof ScrollTrigger !== 'undefined') {
    ScrollTrigger.create({
      trigger: '.hero-stats',
      start: 'top 95%',
      once: true,
      onEnter: animateCounters,
    });
  }
}

function animateCounters() {
  document.querySelectorAll('.stat-num').forEach(el => {
    const target = el.dataset.target || el.textContent;
    const isDecimal = target.includes('.');
    const numericPart = parseFloat(target.replace(/[^0-9.]/g, ''));
    const suffix = target.replace(/[0-9.]/g, '');
    const counter = { val: 0 };

    gsap.to(counter, {
      val: numericPart,
      duration: 2,
      ease: 'power2.out',
      onUpdate() {
        el.textContent = (isDecimal
          ? counter.val.toFixed(1)
          : Math.floor(counter.val)
        ) + suffix;
      }
    });
  });
}

/* ══════════════════════════════════════════════════════════
   MENU TABS
══════════════════════════════════════════════════════════ */
function initMenuTabs() {
  document.querySelectorAll('.menu-tab').forEach(tab => {
    tab.addEventListener('click', () => {
      document.querySelectorAll('.menu-tab').forEach(t => t.classList.remove('active'));
      tab.classList.add('active');

      // Animate cards out then back in
      gsap.to('.menu-card', {
        opacity: 0, y: 20, scale: 0.96,
        duration: 0.25, stagger: 0.04,
        onComplete: () => {
          gsap.to('.menu-card', {
            opacity: 1, y: 0, scale: 1,
            duration: 0.45, stagger: 0.07,
            ease: 'back.out(1.3)'
          });
        }
      });
    });
  });
}

/* ══════════════════════════════════════════════════════════
   SWIPER — TESTIMONIALS
══════════════════════════════════════════════════════════ */
function initTestimonialSwiper() {
  if (typeof Swiper === 'undefined') return;

  new Swiper('.swiper-testimonials', {
    slidesPerView: 1,
    spaceBetween: 28,
    loop: true,
    autoplay: { delay: 5000, disableOnInteraction: false },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    breakpoints: {
      640:  { slidesPerView: 2 },
      1024: { slidesPerView: 3 },
    },
    effect: 'slide',
  });
}

/* ══════════════════════════════════════════════════════════
   MAGNETIC BUTTONS
══════════════════════════════════════════════════════════ */
function initMagneticButtons() {
  document.querySelectorAll('.btn-primary, .btn-secondary, .menu-card-btn').forEach(btn => {
    btn.addEventListener('mousemove', (e) => {
      const rect = btn.getBoundingClientRect();
      const cx = rect.left + rect.width  / 2;
      const cy = rect.top  + rect.height / 2;
      const dx = (e.clientX - cx) * 0.25;
      const dy = (e.clientY - cy) * 0.25;

      gsap.to(btn, { x: dx, y: dy, duration: 0.3, ease: 'power2.out' });
    });
    btn.addEventListener('mouseleave', () => {
      gsap.to(btn, { x: 0, y: 0, duration: 0.5, ease: 'elastic.out(1, 0.4)' });
    });
  });
}

/* ══════════════════════════════════════════════════════════
   PARALLAX FLOATING INGREDIENTS (mouse move)
══════════════════════════════════════════════════════════ */
function initParallaxIngredients() {
  const hero = document.querySelector('.hero');
  if (!hero) return;

  const ingredients = document.querySelectorAll('.float-ingredient');

  hero.addEventListener('mousemove', (e) => {
    const rect = hero.getBoundingClientRect();
    const cx = rect.width  / 2;
    const cy = rect.height / 2;
    const dx = (e.clientX - rect.left - cx) / cx;
    const dy = (e.clientY - rect.top  - cy) / cy;

    ingredients.forEach((el, i) => {
      const depth = (i % 3 + 1) * 0.35;
      gsap.to(el, {
        x: dx * depth * 28,
        y: dy * depth * 18,
        duration: 0.8,
        ease: 'power2.out',
      });
    });
  });

  hero.addEventListener('mouseleave', () => {
    ingredients.forEach(el => {
      gsap.to(el, { x: 0, y: 0, duration: 1.2, ease: 'elastic.out(1, 0.4)' });
    });
  });
}
