<?php
$reasons = [
  [
    'icon'  => '🌿',
    'title' => 'Farm-Fresh Only',
    'desc'  => 'Every ingredient sourced daily from local farms. No frozen patties, no compromise — only the freshest produce on your plate.',
    'num'   => '01',
    'color' => '#56B83A',
  ],
  [
    'icon'  => '🔥',
    'title' => 'Flame Grilled',
    'desc'  => 'Open wood-fire at 700°F sears in the juices and creates that irreplaceable smoky char that defines a truly great burger.',
    'num'   => '02',
    'color' => '#FF6B35',
  ],
  [
    'icon'  => '👨‍🍳',
    'title' => 'Handcrafted',
    'desc'  => 'Each burger is hand-formed, individually assembled, never mass-produced. Artisan quality in every single order, every single time.',
    'num'   => '03',
    'color' => '#D4A017',
  ],
  [
    'icon'  => '⚡',
    'title' => '30-Min Delivery',
    'desc'  => 'Hot, fresh, and at your door in under 30 minutes — guaranteed. Because great burgers should never arrive cold.',
    'num'   => '04',
    'color' => '#FFB800',
  ],
];
?>

<!-- ═══════════════════════════════════════════════════════════
     WHY CHOOSE — LANE LAYOUT
     2 reason cards left | burger lane center | 2 reason cards right
     The burger is flanked by the reasons it deserves to be chosen.
═══════════════════════════════════════════════════════════ -->
<section class="section why-choose" id="why">
  <div class="section-inner">

    <div class="why-choose-header" data-aos="fade-up">
      <div class="section-label" style="justify-content:center;">Chapter 04 &nbsp;·&nbsp; The Obsession</div>
      <h2 class="section-title">Built on <span class="gold-text">Obsession</span>,<br/>Served with Pride</h2>
      <div class="divider center"></div>
      <p class="section-subtitle" style="margin:0 auto;">
        We don't just make burgers. We perfect them — from the sourcing of every leaf
        of lettuce to the last drop of our signature sauce.
      </p>
    </div>

    <!-- LEFT layout: burger travels the LEFT lane, all 4 cards fill a 2x2 grid on the right -->
    <div class="lane-body lane-body--left why-lane-body">

      <!-- LEFT: Empty burger lane -->
      <div class="lane-mid why-lane-mid"></div>

      <!-- RIGHT: 2×2 card grid -->
      <div class="why-cards-full">
        <?php foreach ($reasons as $i => $r): ?>
        <div class="why-card" data-aos="fade-left" data-aos-delay="<?= $i * 100 ?>">
          <span class="why-num"><?= $r['num'] ?></span>
          <span class="why-icon"><?= $r['icon'] ?></span>
          <h3 class="why-title" style="color:<?= $r['color'] ?>"><?= $r['title'] ?></h3>
          <p class="why-desc"><?= $r['desc'] ?></p>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>
