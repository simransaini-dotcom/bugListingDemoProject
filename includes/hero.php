<section class="hero" id="home">
  <!-- Three.js canvas background -->
  <canvas id="heroCanvas"></canvas>

  <!-- Ambient glows -->
  <div class="hero-bg-glow"></div>
  <div class="hero-bg-glow-2"></div>

  <div class="hero-inner">
    <!-- LEFT: Copy -->
    <div class="hero-content">
      <div class="hero-badge">
        <span class="hero-badge-dot"></span>
        Premium Handcrafted Burgers
      </div>

      <h1 class="hero-title">
        <span class="line">Taste The</span>
        <span class="line highlight">Art of</span>
        <span class="line">Perfection.</span>
      </h1>

      <p class="hero-subtitle">
        Handcrafted with the finest ingredients, flame-grilled to smoky perfection.
        Every bite is a journey — bold, juicy, and utterly irresistible.
      </p>

      <div class="hero-ctas">
        <a href="#order" class="btn-primary">Order Now</a>
        <a href="#menu" class="btn-secondary">
          View Menu <span class="btn-arrow">→</span>
        </a>
      </div>

      <div class="hero-stats">
        <div class="stat-item">
          <div class="stat-num" data-target="50K+">0+</div>
          <div class="stat-label">Happy Customers</div>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
          <div class="stat-num" data-target="4.9★">0★</div>
          <div class="stat-label">Average Rating</div>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
          <div class="stat-num" data-target="12+">0+</div>
          <div class="stat-label">Signature Burgers</div>
        </div>
      </div>
    </div>

    <!-- RIGHT: 3D Burger -->
    <div class="hero-burger-col">
      <div class="burger-scene">
        <!-- Floating ingredient particles -->
        <div class="float-ingredient">🥬</div>
        <div class="float-ingredient">🧅</div>
        <div class="float-ingredient">🧀</div>
        <div class="float-ingredient">🍅</div>
        <div class="float-ingredient">🥒</div>
        <div class="float-ingredient">🌶️</div>

        <!-- Main Burger -->
        <div class="burger-wrapper" id="burgerWrapper">
          <div class="burger-3d">
            <div class="burger-stack">
              <!-- Top Bun -->
              <div class="b-layer bun-top">
                <div class="sesame-seeds">
                  <span class="seed"></span>
                  <span class="seed"></span>
                  <span class="seed"></span>
                  <span class="seed"></span>
                  <span class="seed"></span>
                  <span class="seed"></span>
                  <span class="seed"></span>
                </div>
              </div>

              <!-- Lettuce -->
              <div class="b-layer lettuce-layer"></div>

              <!-- Tomato -->
              <div class="b-layer tomato-layer"></div>

              <!-- Cheese with melted drips -->
              <div class="b-layer cheese-layer">
                <div class="cheese-melt left"></div>
                <div class="cheese-melt center"></div>
                <div class="cheese-melt right"></div>
              </div>

              <!-- Sauce peek -->
              <div class="b-layer sauce-layer"></div>

              <!-- Beef Patty -->
              <div class="b-layer patty-layer">
                <div class="grill-marks">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              </div>

              <!-- Bottom Lettuce -->
              <div class="b-layer lettuce-bottom lettuce-layer"></div>

              <!-- Bottom Bun -->
              <div class="b-layer bun-bottom"></div>
            </div>

            <!-- Glow & Shadow -->
            <div class="burger-glow-base"></div>
            <div class="burger-plate-shadow"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scroll Hint -->
  <div class="scroll-hint">
    <div class="scroll-mouse"><div class="scroll-wheel"></div></div>
    <span>Scroll</span>
  </div>
</section>
