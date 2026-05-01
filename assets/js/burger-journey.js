/**
 * BURGR — Immersive Lane Journey System v4.0
 * ──────────────────────────────────────────────────────────────
 * The burger is the center of gravity of the entire page.
 * It travels a dedicated VERTICAL LANE through every section,
 * starting in the hero and arriving triumphant at the CTA.
 *
 * Scroll Journey:
 *  Hero         → burger starts right-column, full size
 *  Ingredients  → slides to CENTER LANE, ingredient labels appear
 *  Layers       → layers FAN APART then snap back (layer explosion)
 *  Grill        → cooking heat shimmer, orange aura burns bright
 *  Why Choose   → golden, flanked by reason cards
 *  Menu         → anchor reference surrounded by menu cards
 *  Testimonials → recedes, blurs — lets real voices speak
 *  CTA          → triumphant return, full glow, slow spin
 */

(function BurgerLane() {
  'use strict';

  /* ─────────────────────────────────────
     Constants
  ───────────────────────────────────────*/
  const BW    = 340;   // journey-inner width (px)
  const BH    = 380;   // journey-inner height (px)
  const SCRUB = 1.8;   // scrub smoothness — higher = more cinematic lag

  /* Explode offsets: how far each .b-layer moves in the Layers section.
     Order: bun-top, lettuce, tomato, cheese, sauce, patty, lettuce-bottom, bun-bottom */
  const EXPLODE_Y = [-84, -58, -38, -23, -11, 0, 22, 42];

  /* ─────────────────────────────────────
     Module State
  ───────────────────────────────────────*/
  let wrap, inner, aura;
  let vw, vh;
  let idleTl      = null;
  let ctaRotateTl = null;
  let activated   = false;

  /* ─────────────────────────────────────
     BOOT
  ───────────────────────────────────────*/
  window.addEventListener('load', function () {
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;
    gsap.registerPlugin(ScrollTrigger);

    wrap  = document.getElementById('journeyWrap');
    inner = document.getElementById('journeyInner');
    aura  = document.getElementById('jAura');
    if (!wrap || !inner) return;

    measure();

    /* Start hidden at hero position (right column) */
    gsap.set(wrap, {
      x: heroX(),
      y: heroY(),
      scale: mob() ? 0.68 : 1.0,
      rotation: 0,
      opacity: 0,
    });

    /* heroEntranceDone fires from main.js after the hero GSAP entrance completes */
    document.addEventListener('heroEntranceDone', activateJourney, { once: true });

    /* Safety fallback — activate anyway after 4.5 s */
    setTimeout(function () { if (!activated) activateJourney(); }, 4500);

    window.addEventListener('resize', debounce(onResize, 280));
    initHeroMouseTilt();
  });

  /* ─────────────────────────────────────
     Measurement helpers
  ───────────────────────────────────────*/
  function measure() { vw = window.innerWidth; vh = window.innerHeight; }
  function mob()     { return vw < 768; }
  function tab()     { return vw >= 768 && vw < 1100; }

  /* Hero: burger is in the right column of the 50/50 hero grid.
     Right column center ≈ 75% of viewport on desktop. */
  function heroX() {
    if (mob()) return vw * 0.50 - (BW * 0.65) / 2;
    if (tab()) return vw * 0.70 - BW / 2;
    return vw * 0.74 - BW / 2;
  }
  function heroY() {
    return vh * 0.44 - BH / 2;
  }

  /* Alternating lane positions — burger moves LEFT / CENTER / RIGHT across sections.
     Each value approximates the center of the corresponding lane-mid column:
       LEFT   lane-mid = first 360px col inside section-inner (starts ~6% of vw)
       CENTER lane-mid = middle 360px col (at 50% vw)
       RIGHT  lane-mid = last 360px col (ends ~94% of vw) */
  function lanePosLeft()   {
    if (mob()) return vw * 0.50 - (BW * 0.60) / 2;
    if (tab()) return vw * 0.185 - BW / 2;
    return vw * 0.185 - BW / 2;
  }
  function lanePosCenter(xOff) {
    if (mob()) return vw * 0.50 - (BW * 0.60) / 2;
    return vw * 0.50 - BW / 2 + (xOff || 0);
  }
  function lanePosRight()  {
    if (mob()) return vw * 0.50 - (BW * 0.60) / 2;
    if (tab()) return vw * 0.815 - BW / 2;
    return vw * 0.815 - BW / 2;
  }
  /* Keep laneX as alias for center (used nowhere else but kept for safety) */
  function laneX(xOff) { return lanePosCenter(xOff); }
  /* Lane Y: position burger center at yFrac of viewport height */
  function laneY(frac) { return vh * frac - BH / 2; }

  /* ─────────────────────────────────────
     ACTIVATION — cross-fade hero → journey
  ───────────────────────────────────────*/
  function activateJourney() {
    if (activated) return;
    activated = true;

    document.body.classList.add('hero-burger-hidden');
    gsap.to('.hero .burger-wrapper', { opacity: 0, duration: 0.35, ease: 'power2.in' });
    gsap.to(wrap, {
      opacity: 1,
      duration: 0.75,
      delay: 0.22,
      ease: 'power2.out',
      onComplete: function () {
        startIdleFloat();
        buildLaneJourney();
      }
    });
  }

  /* ─────────────────────────────────────
     IDLE FLOAT (active in hero section)
  ───────────────────────────────────────*/
  function startIdleFloat() {
    if (idleTl) idleTl.kill();
    idleTl = gsap.timeline({ repeat: -1, yoyo: true });
    idleTl
      .to(inner, { y: -18, duration: 2.8, ease: 'sine.inOut' })
      .to(inner, { y: -7,  duration: 2.4, ease: 'sine.inOut' });
  }
  function pauseIdle()  { if (idleTl) idleTl.pause();  }
  function resumeIdle() { if (idleTl) idleTl.resume(); }

  /* ═══════════════════════════════════════════════════════════
     THE LANE JOURNEY
     Defines the burger's position at each narrative chapter.
     Consecutive states are connected by scrubbed ScrollTriggers.
  ═══════════════════════════════════════════════════════════ */
  function buildLaneJourney() {
    /* Position keyframes — one per section */
    var states = [
      {
        /* Hero: burger starts in the right column, large */
        el: '#home',
        id: 'hero',
        x: heroX(),
        y: heroY(),
        scale: mob() ? 0.68 : 1.0,
        rot: 0,
        opacity: 1,
        blur: 0,
      },
      {
        /* Ingredients: LEFT — burger on the left, content fills right */
        el: '#ingredients',
        id: 'ingredients',
        x: lanePosLeft(),
        y: laneY(mob() ? 0.40 : 0.38),
        scale: mob() ? 0.58 : 0.92,
        rot: -3,
        opacity: 1,
        blur: 0,
      },
      {
        /* Layers: CENTER — layers explode from the middle */
        el: '#layers',
        id: 'layers',
        x: lanePosCenter(),
        y: laneY(mob() ? 0.42 : 0.44),
        scale: mob() ? 0.55 : 0.87,
        rot: 6,
        opacity: 1,
        blur: 0,
      },
      {
        /* Grill: RIGHT — cooking content on left, burger glows on right */
        el: '#grill',
        id: 'grill',
        x: lanePosRight(),
        y: laneY(mob() ? 0.44 : 0.46),
        scale: mob() ? 0.52 : 0.83,
        rot: -2,
        opacity: 1,
        blur: 0,
      },
      {
        /* Why Choose: LEFT — burger left, reason cards fill right */
        el: '#why',
        id: 'why',
        x: lanePosLeft(),
        y: laneY(mob() ? 0.46 : 0.46),
        scale: mob() ? 0.48 : 0.76,
        rot: 4,
        opacity: 1,
        blur: 0,
      },
      {
        /* Menu: CENTER — the original anchors the middle */
        el: '#menu',
        id: 'menu',
        x: lanePosCenter(),
        y: laneY(mob() ? 0.38 : 0.40),
        scale: mob() ? 0.44 : 0.68,
        rot: 2,
        opacity: mob() ? 0 : 1,
        blur: 0,
      },
      {
        /* Testimonials: RIGHT — recedes to right side, blurs */
        el: '#testimonials',
        id: 'testi',
        x: lanePosRight(),
        y: laneY(mob() ? 0.50 : 0.52),
        scale: mob() ? 0.30 : 0.50,
        rot: 8,
        opacity: mob() ? 0 : 0.42,
        blur: mob() ? 0 : 3,
      },
      {
        /* CTA: returns to center stage, triumphant */
        el: '#order',
        id: 'cta',
        x: laneX(0),
        y: laneY(mob() ? 0.30 : 0.33),
        scale: mob() ? 0.70 : 0.96,
        rot: 0,
        opacity: 1,
        blur: 0,
      },
    ];

    /* Connect consecutive states with scrubbed ScrollTrigger transitions */
    for (var i = 1; i < states.length; i++) {
      (function (from, to) {
        var el = document.querySelector(to.el);
        if (!el) return;

        /* Special handling for CTA section - burger should reach final position at top and stay */
        var endPoint = (to.id === 'cta') ? 'top 20%' : 'center 48%';

        gsap.timeline({
          scrollTrigger: {
            trigger: el,
            start:   'top 90%',
            end:     endPoint,
            scrub:   SCRUB,
            invalidateOnRefresh: true,
            onEnter:     function () { onEnterSection(to.id);   },
            onEnterBack: function () { onEnterSection(to.id);   },
            onLeaveBack: function () { onLeaveSection(to.id, from.id); },
          }
        }).fromTo(wrap,
          {
            x: from.x, y: from.y,
            scale: from.scale, rotation: from.rot,
            opacity: from.opacity,
            filter: from.blur > 0 ? 'blur(' + from.blur + 'px)' : 'none',
          },
          {
            x: to.x, y: to.y,
            scale: to.scale, rotation: to.rot,
            opacity: to.opacity,
            filter: to.blur > 0 ? 'blur(' + to.blur + 'px)' : 'none',
            ease: 'none',
          }
        );
      })(states[i - 1], states[i]);
    }

    /* ── Build section-specific visual effects ── */
    buildIngredientEffects();
    buildLayersExplosion();
    buildGrillEffect();
    buildWhyEffect();
    buildMenuHoverReactions();
    buildCTAEffect();
  }

  /* ─────────────────────────────────────
     Section Enter / Leave Callbacks
  ───────────────────────────────────────*/
  function onEnterSection(id) {
    wrap.dataset.section = id;
    wrap.className = 'journey-wrap in-' + id;
    if (id !== 'hero') pauseIdle();
    if (id === 'ingredients') showIngredientLabels();
    if (id === 'why')         { showWhyIcons(); triggerWobble(); }
    if (id === 'cta')         triggerCTAReveal();
    if (id === 'testi')       { hideIngredientLabels(); hideWhyIcons(); }
  }

  function onLeaveSection(leavingId, prevId) {
    if (leavingId === 'ingredients') { hideIngredientLabels(); clearLitLayers(); }
    if (leavingId === 'layers')      resetLayerExplosion();
    if (leavingId === 'grill')       stopCookingEffect();
    if (leavingId === 'why')         hideWhyIcons();
    if (leavingId === 'cta')         stopCTARotation();
    if (prevId === 'hero')           resumeIdle();
    wrap.dataset.section = prevId;
    wrap.className = 'journey-wrap in-' + prevId;
  }

  /* ═══════════════════════════════════════════════════════════
     INGREDIENTS SECTION
     Ingredient labels float from the burger.
     Burger layers glow one by one as user scrolls through.
  ═══════════════════════════════════════════════════════════ */
  function buildIngredientEffects() {
    var el = document.querySelector('#ingredients');
    if (!el) return;

    /* Layer glow tracks scroll progress through the section */
    ScrollTrigger.create({
      trigger: el,
      start:   'top 55%',
      end:     'bottom 42%',
      scrub:   1.2,
      onUpdate: function (self) {
        var p = self.progress;
        var lit = [
          { id: '#jCheese',  thresh: 0.20 },
          { id: '#jLettuce', thresh: 0.42 },
          { id: '#jSauce',   thresh: 0.62 },
          { id: '#jPatty',   thresh: 0.82 },
        ];
        lit.forEach(function (l) {
          var node = document.querySelector(l.id);
          if (node) node.classList.toggle('lit', p >= l.thresh);
        });
      },
      onLeave:     clearLitLayers,
      onLeaveBack: clearLitLayers,
    });
  }

  /* ═══════════════════════════════════════════════════════════
     LAYERS SECTION
     The burger explodes into its constituent layers, then
     reassembles as the user scrolls through.
  ═══════════════════════════════════════════════════════════ */
  function buildLayersExplosion() {
    var el = document.querySelector('#layers');
    if (!el) return;

    var layers = Array.from(document.querySelectorAll('#jBurger3d .b-layer'));
    if (!layers.length) return;

    /* Build the explosion / reassembly timeline */
    var explosionTl = gsap.timeline({ paused: true });
    explosionTl
      /* Phase A — layers fan apart */
      .to(layers, {
        y: function (i) { return EXPLODE_Y[i] || 0; },
        stagger: { each: 0.016, from: 'start' },
        duration: 0.34,
        ease: 'power2.out',
      }, 0.10)
      /* Phase B — hold exploded */
      .to({}, { duration: 0.26 }, 0.46)
      /* Phase C — snap back together */
      .to(layers, {
        y: 0,
        stagger: { each: 0.013, from: 'end' },
        duration: 0.32,
        ease: 'back.out(1.8)',
      }, 0.72);

    ScrollTrigger.create({
      trigger: el,
      start:     'top 44%',
      end:       'bottom 55%',
      scrub:     1.8,
      animation: explosionTl,
      invalidateOnRefresh: true,
    });

    /* Flash-light layers when first entering */
    ScrollTrigger.create({
      trigger: el,
      start: 'top 60%',
      once: true,
      onEnter: lightLayersSequential,
    });
  }

  function lightLayersSequential() {
    var ids = ['#jCheese', '#jLettuce', '#jTomato', '#jSauce', '#jPatty'];
    ids.forEach(function (id, i) {
      setTimeout(function () {
        var node = document.querySelector(id);
        if (node) node.classList.add('lit');
      }, i * 120);
    });
    setTimeout(clearLitLayers, 3000);
  }

  function resetLayerExplosion() {
    var layers = document.querySelectorAll('#jBurger3d .b-layer');
    gsap.to(layers, { y: 0, duration: 0.5, ease: 'power2.out' });
  }

  /* ═══════════════════════════════════════════════════════════
     GRILL SECTION
     Cooking glow fires up as burger enters this section.
  ═══════════════════════════════════════════════════════════ */
  function buildGrillEffect() {
    var el = document.querySelector('#grill');
    if (!el) return;

    ScrollTrigger.create({
      trigger: el,
      start:       'top 55%',
      end:         'bottom 44%',
      onEnter:     startCookingEffect,
      onEnterBack: startCookingEffect,
      onLeave:     stopCookingEffect,
      onLeaveBack: stopCookingEffect,
    });
  }

  function startCookingEffect() {
    wrap.classList.add('cooking');
    gsap.to('#jBurger3d', {
      filter: 'drop-shadow(0 0 28px rgba(255,107,53,0.72)) ' +
              'drop-shadow(0 0 55px rgba(255,60,0,0.28)) ' +
              'brightness(1.14)',
      duration: 1.0,
      ease: 'power2.out',
    });
    /* Pulsing aura — cooking breath */
    gsap.killTweensOf(aura);
    gsap.to(aura, {
      scale: 1.3, duration: 0.9, yoyo: true,
      repeat: -1, ease: 'sine.inOut',
    });
  }

  function stopCookingEffect() {
    wrap.classList.remove('cooking');
    gsap.killTweensOf(aura);
    gsap.to('#jBurger3d', { filter: 'none', duration: 0.6 });
    gsap.to(aura, { scale: 1.0, duration: 0.8, ease: 'power2.out' });
  }

  /* ═══════════════════════════════════════════════════════════
     WHY CHOOSE SECTION
  ═══════════════════════════════════════════════════════════ */
  function buildWhyEffect() {
    var el = document.querySelector('#why');
    if (!el) return;

    /* Each card that enters the viewport pulses the aura */
    document.querySelectorAll('.why-card').forEach(function (card) {
      ScrollTrigger.create({
        trigger: card,
        start: 'top 78%',
        once: true,
        onEnter: function () {
          gsap.timeline()
            .to(aura, { scale: 1.55, opacity: 0.9, duration: 0.45, ease: 'power2.out' })
            .to(aura, { scale: 1.00, opacity: 0.7, duration: 0.88, ease: 'power2.inOut' });
        }
      });
    });
  }

  function triggerWobble() {
    gsap.timeline()
      .to(inner, { rotation:  5,  duration: 0.22, ease: 'power2.out'    })
      .to(inner, { rotation: -3,  duration: 0.28, ease: 'power2.inOut'  })
      .to(inner, { rotation:  2,  duration: 0.22, ease: 'power2.inOut'  })
      .to(inner, { rotation:  0,  duration: 0.38, ease: 'elastic.out(1, 0.5)' });
  }

  /* ═══════════════════════════════════════════════════════════
     MENU SECTION
     Hovering a card "tempts" the burger — it reacts.
  ═══════════════════════════════════════════════════════════ */
  function buildMenuHoverReactions() {
    var menuScale = mob() ? 0.44 : 0.68;

    document.querySelectorAll('.menu-card').forEach(function (card) {
      card.addEventListener('mouseenter', function () {
        gsap.to(wrap, {
          scale: menuScale * 1.10,
          rotation: 6,
          duration: 0.35,
          ease: 'power2.out',
          overwrite: 'auto',
        });
        gsap.to(aura, { scale: 1.40, opacity: 1, duration: 0.28 });
      });
      card.addEventListener('mouseleave', function () {
        gsap.to(wrap, {
          scale: menuScale,
          rotation: 2,
          duration: 0.65,
          ease: 'elastic.out(1, 0.4)',
          overwrite: 'auto',
        });
        gsap.to(aura, { scale: 1.0, opacity: 0.7, duration: 0.45 });
      });
    });
  }

  /* ═══════════════════════════════════════════════════════════
     CTA SECTION
     The journey is complete. The burger returns to full glory.
  ═══════════════════════════════════════════════════════════ */
  function buildCTAEffect() {
    ScrollTrigger.create({
      trigger: '#order',
      start: 'top 62%',
      once: true,
      onEnter: triggerCTAReveal,
    });
  }

  function triggerCTAReveal() {
    /* Slow majestic rotation — the burger presents itself */
    if (ctaRotateTl) ctaRotateTl.kill();
    ctaRotateTl = gsap.to(inner, {
      rotation: 360,
      duration: 22,
      ease: 'none',
      repeat: -1,
    });
    /* Maximum aura bloom */
    gsap.killTweensOf(aura);
    gsap.to(aura, { scale: 1.80, opacity: 1, duration: 1.6, ease: 'power2.out' });
    /* Golden perfection filter */
    gsap.to('#jBurger3d', {
      filter: 'drop-shadow(0 0 42px rgba(212,160,23,0.65)) ' +
              'drop-shadow(0 0 80px rgba(212,160,23,0.22)) ' +
              'brightness(1.20)',
      duration: 1.6,
      ease: 'power2.out',
    });
  }

  function stopCTARotation() {
    if (ctaRotateTl) { ctaRotateTl.kill(); ctaRotateTl = null; }
    gsap.to(inner, { rotation: 0, duration: 0.6, ease: 'power2.out' });
    gsap.to('#jBurger3d', { filter: 'none', duration: 0.6 });
    gsap.killTweensOf(aura);
    gsap.to(aura, { scale: 1.0, duration: 0.8 });
  }

  /* ─────────────────────────────────────
     Ingredient Label Helpers
  ───────────────────────────────────────*/
  function showIngredientLabels() {
    document.querySelectorAll('.j-label').forEach(function (el, i) {
      setTimeout(function () { el.classList.add('show'); }, i * 165);
    });
  }
  function hideIngredientLabels() {
    document.querySelectorAll('.j-label').forEach(function (el) {
      el.classList.remove('show');
    });
  }
  function clearLitLayers() {
    ['#jCheese', '#jLettuce', '#jSauce', '#jPatty', '#jTomato'].forEach(function (s) {
      var node = document.querySelector(s);
      if (node) node.classList.remove('lit');
    });
  }

  /* ─────────────────────────────────────
     Why Icons Helpers
  ───────────────────────────────────────*/
  function showWhyIcons() {
    document.querySelectorAll('.j-why-icon').forEach(function (el, i) {
      setTimeout(function () { el.classList.add('show'); }, i * 125);
    });
  }
  function hideWhyIcons() {
    document.querySelectorAll('.j-why-icon').forEach(function (el) {
      el.classList.remove('show');
    });
  }

  /* ─────────────────────────────────────
     Hero Mouse Tilt
     Only active while burger is in the hero section.
  ───────────────────────────────────────*/
  function initHeroMouseTilt() {
    var hero = document.querySelector('.hero');
    if (!hero) return;

    hero.addEventListener('mousemove', function (e) {
      if (wrap.dataset.section && wrap.dataset.section !== '' && wrap.dataset.section !== 'hero') return;
      var rect = hero.getBoundingClientRect();
      var dx = (e.clientX - rect.left - rect.width  / 2) / (rect.width  / 2);
      var dy = (e.clientY - rect.top  - rect.height / 2) / (rect.height / 2);
      gsap.to('#jBurger3d', {
        rotateY: dx * 14,
        rotateX: -dy * 9,
        duration: 0.6,
        ease: 'power2.out',
      });
    });
    hero.addEventListener('mouseleave', function () {
      gsap.to('#jBurger3d', {
        rotateY: 0, rotateX: 0,
        duration: 1.1,
        ease: 'elastic.out(1, 0.4)',
      });
    });
  }

  /* ─────────────────────────────────────
     Resize
  ───────────────────────────────────────*/
  function onResize() {
    measure();
    ScrollTrigger.getAll().forEach(function (st) { st.kill(); });
    buildLaneJourney();
    ScrollTrigger.refresh();
  }

  /* ─────────────────────────────────────
     Utility
  ───────────────────────────────────────*/
  function debounce(fn, ms) {
    var t;
    return function () {
      clearTimeout(t);
      t = setTimeout(fn, ms);
    };
  }

})();
