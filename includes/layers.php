<!-- ═══════════════════════════════════════════════════════════
     LAYERS SECTION
     The burger's anatomy revealed. As the user scrolls,
     the layers EXPLODE apart and then snap back together.
     Content describes each layer from both sides of the lane.
═══════════════════════════════════════════════════════════ -->
<section class="lane-section" id="layers">
  <div class="lane-bg-layers"></div>

  <div class="section-inner">

    <div class="lane-header" data-aos="fade-up">
      <div class="section-label">Chapter 02 &nbsp;·&nbsp; The Architecture</div>
      <h2 class="section-title">Every Layer <span class="gold-text">Chosen</span><br/>with Care</h2>
      <p class="lane-header-sub">
        Six distinct layers. Each selected not just for flavour, but for the perfect
        textural contrast — crisp, soft, rich, and fresh in every single bite.
      </p>
    </div>

    <div class="lane-body lane-body--tall">

      <!-- LEFT: Top three layers (top-down) -->
      <div class="lane-left">
        <div class="layer-list">

          <div class="layer-item" data-aos="fade-right" data-aos-delay="0">
            <div class="layer-dot" style="background:#FBBF24; box-shadow:0 0 10px 3px rgba(251,191,36,0.55);"></div>
            <div class="layer-item-info">
              <strong>Brioche Crown</strong>
              <span>Buttery dome, toasted golden — the first impression</span>
            </div>
          </div>

          <div class="layer-item" data-aos="fade-right" data-aos-delay="100">
            <div class="layer-dot" style="background:#6EE75A; box-shadow:0 0 10px 3px rgba(110,231,90,0.55);"></div>
            <div class="layer-item-info">
              <strong>Farm Greens</strong>
              <span>The crisp contrast that cuts through richness</span>
            </div>
          </div>

          <div class="layer-item" data-aos="fade-right" data-aos-delay="200">
            <div class="layer-dot" style="background:#F44336; box-shadow:0 0 10px 3px rgba(244,67,54,0.55);"></div>
            <div class="layer-item-info">
              <strong>Vine Tomato</strong>
              <span>Bright acidity — the flavour balance layer</span>
            </div>
          </div>

        </div>

        <!-- Scroll hint for explosion -->
        <div class="layer-scroll-hint" data-aos="fade-up" data-aos-delay="400">
          <div class="lsh-line"></div>
          <span>Scroll to see it come apart</span>
        </div>
      </div>

      <!-- CENTER: Burger lane (GSAP drives explosion here) -->
      <div class="lane-mid lane-mid--tall"></div>

      <!-- RIGHT: Bottom three layers + stat -->
      <div class="lane-right">
        <div class="layer-list layer-list--right">

          <div class="layer-item layer-item--right" data-aos="fade-left" data-aos-delay="0">
            <div class="layer-item-info layer-item-info--right">
              <strong>Aged Cheddar</strong>
              <span>Creamy melt, sharp finish — the flavour anchor</span>
            </div>
            <div class="layer-dot" style="background:#FFB300; box-shadow:0 0 10px 3px rgba(255,179,0,0.55);"></div>
          </div>

          <div class="layer-item layer-item--right" data-aos="fade-left" data-aos-delay="100">
            <div class="layer-item-info layer-item-info--right">
              <strong>Angus Patty</strong>
              <span>Hand-formed, flame-seared — the heart of it all</span>
            </div>
            <div class="layer-dot" style="background:#6D4C41; box-shadow:0 0 10px 3px rgba(109,76,65,0.55);"></div>
          </div>

          <div class="layer-item layer-item--right" data-aos="fade-left" data-aos-delay="200">
            <div class="layer-item-info layer-item-info--right">
              <strong>Brioche Base</strong>
              <span>The foundation — crisped outside, pillowy within</span>
            </div>
            <div class="layer-dot" style="background:#FBBF24; box-shadow:0 0 10px 3px rgba(251,191,36,0.55);"></div>
          </div>

        </div>

        <div class="layers-big-stat" data-aos="fade-left" data-aos-delay="360">
          <span class="lbs-num">6</span>
          <div class="lbs-text">
            <strong>Layers of</strong>
            <span>Perfection</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
