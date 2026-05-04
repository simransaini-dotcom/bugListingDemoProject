<?php
$ingredients_left = [
  ['icon' => '🥬', 'name' => 'Farm Lettuce',  'desc' => 'Crisp romaine, sourced daily'],
  ['icon' => '🍅', 'name' => 'Vine Tomato',   'desc' => 'Sun-ripened, peak freshness'],
  ['icon' => '🧀', 'name' => 'Aged Cheddar',  'desc' => '18-month matured, sharp bite'],
];
$ingredients_right = [
  ['icon' => '🥩', 'name' => 'Angus Beef',    'desc' => 'Grass-fed, 80/20 blend'],
  ['icon' => '🍞', 'name' => 'Brioche Bun',   'desc' => 'Butter-enriched, daily toasted'],
  ['icon' => '🔥', 'name' => 'Inferno Sauce', 'desc' => 'House recipe, 7-chili blend'],
];
?>

<!-- ═══════════════════════════════════════════════════════════
     INGREDIENTS SECTION
     The burger enters its lane here. Ingredient tags appear
     on both sides while the burger's layers glow one by one.
═══════════════════════════════════════════════════════════ -->
<section class="lane-section" id="ingredients">
  <div class="lane-bg-ingredients"></div>

  <div class="section-inner">

    <!-- Full-width heading -->
    <div class="lane-header" data-aos="fade-up">
      <div class="section-label">Chapter 01 &nbsp;·&nbsp; The Ingredients</div>
      <h2 class="section-title">It <span class="gold-text">Starts</span> with<br/>the <span class="gold-text">Best</span></h2>
      <p class="lane-header-sub">
        Every BURGR begins with ingredients hand-selected at absolute peak freshness.
        Sourced daily from local farms. No shortcuts. No compromise. Ever.
      </p>
    </div>

    <!-- LEFT layout: burger travels the LEFT lane, all content fills the right -->
    <div class="lane-body lane-body--left">

      <!-- LEFT: Burger lane (empty — journey burger is positioned here by JS) -->
      <div class="lane-mid"></div>

      <!-- RIGHT: All 6 ingredients + quality block -->
      <div class="lane-right-full">

        <div class="ing-grid">
          <?php foreach (array_merge($ingredients_left, $ingredients_right) as $i => $ing): ?>
          <div class="lane-ing-item" data-aos="fade-left" data-aos-delay="<?= $i * 70 ?>">
            <div class="li-icon"><?= $ing['icon'] ?></div>
            <div class="li-info">
              <strong><?= $ing['name'] ?></strong>
              <span><?= $ing['desc'] ?></span>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

        <div class="ing-quality-block" data-aos="fade-left" data-aos-delay="480">
          <div class="iqb-num">100<span>%</span></div>
          <div class="iqb-label">Fresh · Daily · Local</div>
          <p class="iqb-desc">Zero compromises. Every ingredient passes a chef's quality check before it touches your burger.</p>
        </div>

      </div>

    </div>
  </div>
</section>
