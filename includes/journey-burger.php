<!-- ═══════════════════════════════════════════════════════
     JOURNEY BURGER — Fixed persistent scroll-driven element
     Lives outside any section, travels the full page
═══════════════════════════════════════════════════════ -->
<div class="journey-wrap" id="journeyWrap" aria-hidden="true">
  <div class="journey-inner" id="journeyInner">

    <!-- ── Outer orbit rings ── -->
    <div class="j-ring j-ring-1"></div>
    <div class="j-ring j-ring-2"></div>

    <!-- ── Ambient aura glow ── -->
    <div class="j-aura" id="jAura"></div>

    <!-- ── Steam wisps ── -->
    <div class="j-steam-wrap">
      <span class="j-steam js1"></span>
      <span class="j-steam js2"></span>
      <span class="j-steam js3"></span>
      <span class="j-steam js4"></span>
    </div>

    <!-- ══ THE BURGER (CSS 3D art — mirrors hero burger) ══ -->
    <div class="burger-3d" id="jBurger3d">
      <div class="burger-stack">

        <!-- Bun Top -->
        <div class="b-layer bun-top">
          <div class="sesame-seeds">
            <span class="seed"></span><span class="seed"></span>
            <span class="seed"></span><span class="seed"></span>
            <span class="seed"></span><span class="seed"></span>
            <span class="seed"></span>
          </div>
          <!-- Bun shine sweep -->
          <div class="j-bun-shine"></div>
        </div>

        <!-- Lettuce -->
        <div class="b-layer lettuce-layer" id="jLettuce"></div>

        <!-- Tomato -->
        <div class="b-layer tomato-layer" id="jTomato"></div>

        <!-- Cheese -->
        <div class="b-layer cheese-layer" id="jCheese">
          <div class="cheese-melt left"></div>
          <div class="cheese-melt center"></div>
          <div class="cheese-melt right"></div>
        </div>

        <!-- Sauce -->
        <div class="b-layer sauce-layer" id="jSauce"></div>

        <!-- Patty -->
        <div class="b-layer patty-layer" id="jPatty">
          <div class="grill-marks">
            <span></span><span></span><span></span>
          </div>
          <!-- Heat shimmer -->
          <div class="j-patty-heat"></div>
        </div>

        <!-- Bottom lettuce -->
        <div class="b-layer lettuce-bottom lettuce-layer"></div>

        <!-- Bottom Bun -->
        <div class="b-layer bun-bottom"></div>
      </div>
    </div>
    <!-- ══ END BURGER ══ -->

    <!-- ── Ingredient callout labels (Featured section) ── -->
    <div class="j-labels" id="jLabels">
      <div class="j-label jl-cheese"  id="jlCheese"> <span class="jl-dot"></span>Aged Cheddar </div>
      <div class="j-label jl-lettuce" id="jlLettuce"><span class="jl-dot"></span>Farm Lettuce  </div>
      <div class="j-label jl-sauce"   id="jlSauce">  <span class="jl-dot"></span>Inferno Sauce </div>
      <div class="j-label jl-patty"   id="jlPatty">  <span class="jl-dot"></span>Angus Beef    </div>
    </div>

    <!-- ── Why-Choose floating icons (appear in Why section) ── -->
    <div class="j-why-icons" id="jWhyIcons">
      <span class="j-why-icon jwi-1">🌿</span>
      <span class="j-why-icon jwi-2">🔥</span>
      <span class="j-why-icon jwi-3">👨‍🍳</span>
      <span class="j-why-icon jwi-4">⚡</span>
    </div>

    <!-- ── CTA spotlight ── -->
    <div class="j-spotlight" id="jSpotlight"></div>

    <!-- ── Dynamic shadow ── -->
    <div class="j-shadow"></div>

    <!-- ── Burger base glow ── -->
    <div class="burger-glow-base"></div>

  </div>
</div>
