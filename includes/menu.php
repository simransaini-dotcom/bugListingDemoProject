<?php
$menu_items = [
  /* Left column — 3 items */
  [
    'emoji'    => '🍔',
    'name'     => 'The Classic Crown',
    'desc'     => 'Single Angus patty, American cheese, house sauce, fresh lettuce & tomato on a toasted sesame bun.',
    'price'    => '$12.99',
    'badge'    => ['label' => 'Classic',   'class' => 'badge-best'],
    'category' => 'classic',
    'side'     => 'left',
  ],
  [
    'emoji'    => '🖤',
    'name'     => 'Truffle Noir',
    'desc'     => 'Wagyu patty, black truffle aioli, brie cheese, rocket salad, and caramelized figs.',
    'price'    => '$22.99',
    'badge'    => ['label' => '★ Premium', 'class' => 'badge-new'],
    'category' => 'premium',
    'side'     => 'left',
  ],
  [
    'emoji'    => '⚡',
    'name'     => 'Crispy Crunch',
    'desc'     => 'Double crispy fried chicken thighs, spicy sriracha mayo, coleslaw, and bread-and-butter pickles.',
    'price'    => '$14.99',
    'badge'    => ['label' => 'New',       'class' => 'badge-new'],
    'category' => 'classic',
    'side'     => 'left',
  ],
  /* Right column — 3 items */
  [
    'emoji'    => '🔥',
    'name'     => 'The Inferno Stack',
    'desc'     => 'Triple patty tower with aged cheddar, caramelized onions, and our legendary inferno sauce.',
    'price'    => '$18.99',
    'badge'    => ['label' => '🔥 Hot',    'class' => 'badge-hot'],
    'category' => 'signature',
    'side'     => 'right',
  ],
  [
    'emoji'    => '🤠',
    'name'     => 'The Smokehouse',
    'desc'     => 'Slow-smoked pulled pork, smoked Gouda, crispy onion rings, and chipotle BBQ on a brioche bun.',
    'price'    => '$16.99',
    'badge'    => ['label' => 'Popular',   'class' => 'badge-best'],
    'category' => 'signature',
    'side'     => 'right',
  ],
  [
    'emoji'    => '🌱',
    'name'     => 'The Vegan Edge',
    'desc'     => 'House-made beetroot & black bean patty, cashew cheese, avocado smash, and sprouts.',
    'price'    => '$13.99',
    'badge'    => ['label' => 'Vegan',     'class' => 'badge-best'],
    'category' => 'premium',
    'side'     => 'right',
  ],
];
$left_items  = array_filter($menu_items, fn($i) => $i['side'] === 'left');
$right_items = array_filter($menu_items, fn($i) => $i['side'] === 'right');
?>

<!-- ═══════════════════════════════════════════════════════════
     MENU SECTION — LANE LAYOUT
     The original burger occupies the center lane.
     3 variations flank it on each side — all inspired by it.
═══════════════════════════════════════════════════════════ -->
<section class="section menu-section" id="menu">
  <div class="section-inner">

    <div class="menu-header" data-aos="fade-up">
      <div>
        <div class="section-label">Chapter 05 &nbsp;·&nbsp; The Variations</div>
        <h2 class="section-title">Choose Your <span class="gold-text">Obsession</span></h2>
      </div>
      <div class="menu-tabs">
        <button class="menu-tab active">All</button>
        <button class="menu-tab">Classic</button>
        <button class="menu-tab">Signature</button>
        <button class="menu-tab">Premium</button>
      </div>
    </div>

    <!-- Lane grid: 3 cards left | burger center | 3 cards right -->
    <div class="menu-lane-body">

      <!-- LEFT column: 3 cards stacked -->
      <div class="menu-lane-col">
        <?php foreach (array_values($left_items) as $i => $item): ?>
        <div class="menu-card" data-category="<?= $item['category'] ?>"
             data-aos="fade-right" data-aos-delay="<?= $i * 80 ?>">
          <div class="menu-card-img">
            <?php if (!empty($item['badge'])): ?>
            <span class="menu-badge <?= $item['badge']['class'] ?>"><?= $item['badge']['label'] ?></span>
            <?php endif; ?>
            <div class="menu-card-emoji"><?= $item['emoji'] ?></div>
          </div>
          <div class="menu-card-body">
            <h3 class="menu-card-name"><?= $item['name'] ?></h3>
            <p class="menu-card-desc"><?= $item['desc'] ?></p>
            <div class="menu-card-footer">
              <span class="menu-card-price"><?= $item['price'] ?></span>
              <button class="menu-card-btn" aria-label="Add to order">+</button>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- CENTER: Empty burger lane + label -->
      <div class="menu-lane-mid">
        <div class="menu-lane-label">THE ORIGINAL</div>
      </div>

      <!-- RIGHT column: 3 cards stacked -->
      <div class="menu-lane-col">
        <?php foreach (array_values($right_items) as $i => $item): ?>
        <div class="menu-card" data-category="<?= $item['category'] ?>"
             data-aos="fade-left" data-aos-delay="<?= $i * 80 ?>">
          <div class="menu-card-img">
            <?php if (!empty($item['badge'])): ?>
            <span class="menu-badge <?= $item['badge']['class'] ?>"><?= $item['badge']['label'] ?></span>
            <?php endif; ?>
            <div class="menu-card-emoji"><?= $item['emoji'] ?></div>
          </div>
          <div class="menu-card-body">
            <h3 class="menu-card-name"><?= $item['name'] ?></h3>
            <p class="menu-card-desc"><?= $item['desc'] ?></p>
            <div class="menu-card-footer">
              <span class="menu-card-price"><?= $item['price'] ?></span>
              <button class="menu-card-btn" aria-label="Add to order">+</button>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

    </div><!-- /menu-lane-body -->

    <div class="menu-cta-row">
      <a href="#order" class="btn-secondary" style="display:inline-flex;">
        View Full Menu &nbsp;<span class="btn-arrow">→</span>
      </a>
    </div>

  </div>
</section>
