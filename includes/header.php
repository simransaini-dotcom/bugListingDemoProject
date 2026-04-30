<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="BURGR — Premium handcrafted burgers. Flame-grilled to perfection with the finest ingredients." />
  <title>BURGR — Taste The Art of Perfection</title>

  <!-- Favicon -->
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🍔</text></svg>" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,900;1,400;1,700&family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;600;700;800;900&display=swap" rel="stylesheet" />

  <!-- AOS Animate On Scroll -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

  <!-- Swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css" />
  <!-- Journey Burger System -->
  <link rel="stylesheet" href="assets/css/burger-journey.css" />

  <!-- GSAP -->
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>

  <!-- Three.js -->
  <script src="https://cdn.jsdelivr.net/npm/three@0.163.0/build/three.min.js" defer></script>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>

  <!-- AOS JS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js" defer></script>

  <!-- GSAP plugin registration + Main JS (must run after GSAP loads) -->
  <script>
    window.addEventListener('load', function() {
      if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);
      }
    });
  </script>
  <script src="assets/js/main.js" defer></script>
  <!-- Journey Burger — loads after main.js -->
  <script src="assets/js/burger-journey.js" defer></script>
</head>
<body>

<!-- Loading Screen -->
<div id="loader">
  <div class="loader-burger">🍔</div>
  <div class="loader-bar"><div class="loader-fill"></div></div>
  <div class="loader-text">Crafting Perfection</div>
</div>

<!-- Custom Cursor -->
<div class="cursor-dot"></div>
<div class="cursor-ring"></div>
