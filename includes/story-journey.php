<!-- ═══════════════════════════════════════════════════════════
     STORY JOURNEY SECTION
     A cinematic, pinned, 5-phase story told through scroll.
     The journey burger lives here as it travels the page.
     Phase 1 → Fresh Ingredients
     Phase 2 → Every Layer (explode view)
     Phase 3 → Assembled by Artisans
     Phase 4 → The Flame Awakens (cooking)
     Phase 5 → The Flavor is Born (final reveal)
═══════════════════════════════════════════════════════════ -->
<section class="story-section" id="story-journey">

  <!-- The element GSAP will pin -->
  <div class="story-pinned" id="storyPinned">

    <!-- ── Atmospheric background (changes per phase) ── -->
    <div class="story-bg-layer" id="storyBgLayer"></div>

    <!-- ── Top-left: chapter counter + dot tracker ── -->
    <div class="story-nav" id="storyNav">
      <div class="story-step-display">
        <span class="story-step-current" id="storyStepCurrent">01</span>
        <span class="story-step-sep">/</span>
        <span class="story-step-total">05</span>
      </div>
      <div class="story-dot-track">
        <span class="story-dot active" data-phase="1"></span>
        <span class="story-dot"        data-phase="2"></span>
        <span class="story-dot"        data-phase="3"></span>
        <span class="story-dot"        data-phase="4"></span>
        <span class="story-dot"        data-phase="5"></span>
      </div>
    </div>

    <!-- ══════════════════════════════
         LEFT: Narrative Content Column
    ══════════════════════════════ -->
    <div class="story-content-col">

      <div class="story-phases-wrap">

        <!-- ─── Phase 1 · The Ingredients ─── -->
        <div class="story-phase active" data-phase="1" id="sPhase1">
          <p class="story-chapter-label">Chapter 01 &nbsp;·&nbsp; The Ingredients</p>
          <h2 class="story-phase-title">
            It Starts<br />
            with the <span class="gold-text">Best</span>
          </h2>
          <p class="story-phase-desc">
            Every BURGR begins with ingredients hand-selected at absolute peak
            freshness. We source daily from local farms. No shortcuts. No compromise.
            Ever.
          </p>
          <div class="story-ing-grid">
            <div class="s-ing-tag"><span class="sit-icon">🥬</span><span>Farm Lettuce</span></div>
            <div class="s-ing-tag"><span class="sit-icon">🍅</span><span>Vine Tomato</span></div>
            <div class="s-ing-tag"><span class="sit-icon">🧀</span><span>Aged Cheddar</span></div>
            <div class="s-ing-tag"><span class="sit-icon">🥩</span><span>Angus Beef</span></div>
            <div class="s-ing-tag"><span class="sit-icon">🍞</span><span>Brioche Bun</span></div>
            <div class="s-ing-tag"><span class="sit-icon">🔥</span><span>Inferno Sauce</span></div>
          </div>
        </div>

        <!-- ─── Phase 2 · Every Layer ─── -->
        <div class="story-phase" data-phase="2" id="sPhase2">
          <p class="story-chapter-label">Chapter 02 &nbsp;·&nbsp; The Layers</p>
          <h2 class="story-phase-title">
            Every Layer<br />
            <span class="gold-text">Chosen</span> with Care
          </h2>
          <p class="story-phase-desc">
            Six distinct layers. Each one selected not just for flavor, but for the
            perfect textural contrast — crisp, soft, rich, and fresh in every single
            bite.
          </p>
          <div class="story-big-stat">
            <span class="sbs-num">6</span>
            <span class="sbs-label">Layers of&nbsp;Perfection</span>
          </div>
        </div>

        <!-- ─── Phase 3 · Assembly ─── -->
        <div class="story-phase" data-phase="3" id="sPhase3">
          <p class="story-chapter-label">Chapter 03 &nbsp;·&nbsp; The Assembly</p>
          <h2 class="story-phase-title">
            Assembled by<br />
            <span class="gold-text">Artisans</span>
          </h2>
          <p class="story-phase-desc">
            Hand-built with obsessive precision. Every layer placed with intention.
            Every gram measured so you get the perfect bite ratio in every single
            mouthful.
          </p>
          <div class="story-process-steps">
            <div class="sps-item">
              <span class="sps-icon">✋</span>
              <span>Hand-formed patties — never machine-pressed</span>
            </div>
            <div class="sps-item">
              <span class="sps-icon">⚖️</span>
              <span>Precisely measured for the perfect weight</span>
            </div>
            <div class="sps-item">
              <span class="sps-icon">🎯</span>
              <span>Stacked for the ideal bite in every layer</span>
            </div>
          </div>
        </div>

        <!-- ─── Phase 4 · The Flame ─── -->
        <div class="story-phase" data-phase="4" id="sPhase4">
          <p class="story-chapter-label">Chapter 04 &nbsp;·&nbsp; The Flame</p>
          <h2 class="story-phase-title">
            The Flame<br />
            <span class="gold-text">Awakens</span>
          </h2>
          <p class="story-phase-desc">
            Open wood-fire at 700°F. Four minutes of pure alchemy. The Maillard
            reaction works its magic, creating that irreplaceable smoky crust that
            defines a truly exceptional burger.
          </p>
          <div class="story-temp-display">
            <span class="std-num">700</span>
            <span class="std-unit">°F&nbsp; Open Wood Fire</span>
          </div>
        </div>

        <!-- ─── Phase 5 · The Flavor ─── -->
        <div class="story-phase" data-phase="5" id="sPhase5">
          <p class="story-chapter-label">Chapter 05 &nbsp;·&nbsp; The Reveal</p>
          <h2 class="story-phase-title">
            The Flavor<br />
            is <span class="gold-text">Born</span>
          </h2>
          <p class="story-phase-desc">
            Smoke, char, and rich umami converge in a single moment of perfection.
            This is not just a burger — it's the result of a relentless obsession
            with quality.
          </p>
          <div class="story-final-cta">
            <a href="#order" class="btn-primary">Experience It Now</a>
            <p class="sfc-sub">Free delivery on your first order</p>
          </div>
        </div>

      </div><!-- /story-phases-wrap -->
    </div><!-- /story-content-col -->

    <!-- ══════════════════════════════
         RIGHT: Open space — burger floats here
    ══════════════════════════════ -->
    <div class="story-right-col">
      <div class="story-right-glow" id="storyRightGlow"></div>
    </div>

    <!-- ── Bottom progress bar ── -->
    <div class="story-progress-track">
      <div class="story-progress-fill" id="storyProgressFill"></div>
      <div class="story-progress-label" id="storyProgressLabel">Scroll to continue the story</div>
    </div>

    <!-- ── Large decorative phase number (background) ── -->
    <div class="story-big-num" id="storyBigNum">01</div>

  </div><!-- /story-pinned -->
</section>
