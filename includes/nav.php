<nav class="navbar" id="navbar">
  <a href="#home" class="nav-logo">
    <span class="nav-logo-icon">🍔</span>
    <span class="nav-logo-text">BURGR</span>
  </a>

  <ul class="nav-links">
    <li><a href="#home">Home</a></li>
    <li><a href="#featured">Signature</a></li>
    <li><a href="#menu">Menu</a></li>
    <li><a href="#testimonials">Reviews</a></li>
    <li><a href="#order" class="nav-cta">Order Now</a></li>
  </ul>

  <div class="nav-hamburger" id="hamburger" aria-label="Menu">
    <span></span>
    <span></span>
    <span></span>
  </div>
</nav>

<script>
  document.getElementById('hamburger').addEventListener('click', function() {
    document.querySelector('.nav-links').classList.toggle('nav-open');
    this.classList.toggle('open');
  });
</script>

<style>
  @media (max-width: 900px) {
    .nav-links.nav-open {
      display: flex;
      flex-direction: column;
      position: fixed;
      top: 76px; left: 0; right: 0;
      background: rgba(7,7,7,0.97);
      backdrop-filter: blur(24px);
      padding: 32px 24px 40px;
      gap: 24px;
      border-bottom: 1px solid rgba(255,255,255,0.06);
      animation: slideNav 0.35s cubic-bezier(0.25,0.46,0.45,0.94) both;
      z-index: 8999;
    }
    .nav-links.nav-open a {
      font-size: 16px;
      padding: 4px 0;
    }
    @keyframes slideNav {
      from { opacity: 0; transform: translateY(-12px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .nav-hamburger.open span:nth-child(1) { transform: rotate(45deg) translate(5px,5px); }
    .nav-hamburger.open span:nth-child(2) { opacity: 0; }
    .nav-hamburger.open span:nth-child(3) { transform: rotate(-45deg) translate(5px,-5px); }
  }
</style>
