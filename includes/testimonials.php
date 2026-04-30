<?php
$testimonials = [
  [
    'avatar' => '👩',
    'name'   => 'Sarah Mitchell',
    'role'   => 'Food Blogger · NYC',
    'stars'  => 5,
    'text'   => '"The Inferno Stack is genuinely life-changing. I\'ve eaten at burger joints across 12 countries, and this is the one that broke me. The layers of flavor, the perfect char on the patty — I dream about it."',
  ],
  [
    'avatar' => '👨',
    'name'   => 'James Rodriguez',
    'role'   => 'Chef & Restaurant Owner',
    'stars'  => 5,
    'text'   => '"As a professional chef, I\'m notoriously hard to impress. But the Truffle Noir? The brie melting into that wagyu beef, the fig sweetness cutting through — it\'s technically and sensorially perfect."',
  ],
  [
    'avatar' => '👩‍🦰',
    'name'   => 'Emily Kwan',
    'role'   => 'Verified Customer',
    'stars'  => 5,
    'text'   => '"Ordered for the first time on a Friday night. By Saturday morning I\'d already placed another order. This place has completely ruined every other burger for me. Worth every single penny."',
  ],
  [
    'avatar' => '🧔',
    'name'   => 'Marcus Thompson',
    'role'   => 'Food Critic · The Times',
    'stars'  => 5,
    'text'   => '"In a city full of burger hype, BURGR delivers substance. The Smokehouse reminded me why slow cooking matters — the depth of flavor is extraordinary. Five stars isn\'t enough."',
  ],
  [
    'avatar' => '👩‍🍳',
    'name'   => 'Priya Sharma',
    'role'   => 'Home Cook & Foodie',
    'stars'  => 5,
    'text'   => '"The Vegan Edge converted my meat-loving husband. He doesn\'t even believe it\'s plant-based. The cashew cheese alone deserves its own award. Absolutely phenomenal craftsmanship."',
  ],
];
?>

<section class="section testimonials" id="testimonials">
  <div class="section-inner">

    <div class="testimonials-header" data-aos="fade-up">
      <div class="section-label" style="justify-content:center;">Customer Love</div>
      <h2 class="section-title">Real People,<br /><span class="gold-text">Real Obsession</span></h2>
      <div class="divider center"></div>
      <p class="section-subtitle">
        Don't just take our word for it. Here's what happens when people taste the difference.
      </p>
    </div>

    <!-- Swiper Slider -->
    <div class="swiper swiper-testimonials" data-aos="fade-up" data-aos-delay="150">
      <div class="swiper-wrapper">
        <?php foreach ($testimonials as $t): ?>
        <div class="swiper-slide">
          <div class="testi-card">
            <div class="testi-quote">"</div>
            <div class="testi-stars">
              <?= str_repeat('★', $t['stars']) ?>
            </div>
            <p class="testi-text"><?= $t['text'] ?></p>
            <div class="testi-author">
              <div class="testi-avatar"><?= $t['avatar'] ?></div>
              <div>
                <div class="testi-name"><?= $t['name'] ?></div>
                <div class="testi-role"><?= $t['role'] ?></div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section>
