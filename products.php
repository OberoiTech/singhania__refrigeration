<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
<body>
<?php include('header.php'); ?>

<style>
  :root{
    --ink:#0f2442; --muted:#4b587c; --line:#e7ecf5; --brand:#0e2344;
    --card:#ffffff; --soft:#f6f8ff;
  }

  /* ===== Hero ===== */
  .about-hero{
    position:relative;
    min-height:560px;
    display:flex;
    align-items:center;
    overflow:hidden;
    background:
      linear-gradient(90deg, rgba(6,18,38,.92) 0%, rgba(8,34,67,.78) 48%, rgba(8,34,67,.34) 100%),
      url('assets/images/products/cold-storage.jpg') center/cover no-repeat;
  }
  .about-hero::before{
    content:""; position:absolute; inset:0;
    background:linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,0) 42%);
    pointer-events:none;
  }
  /* .about-hero::after{
    content:""; position:absolute; left:0; right:0; bottom:0; height:90px;
    background:linear-gradient(180deg, rgba(255,255,255,0), #ffffff);
    pointer-events:none;
  } */
  .about-hero__bg{
    display:none;
  }
  .about-hero__card{
    position:relative;
    z-index:1;
    max-width:900px;
    padding:110px 0 130px;
    color:#eaf0ff;
  }
  .about-hero__card h1{
    font-size:clamp(32px,4.8vw,56px);
    line-height:1.05;
    margin:0 0 16px;
    color:#fff;
    font-weight:900;
    max-width:820px;
  }
  .about-hero__card p{
    color:#e6ecff;
    margin:0;
    font-size:17px;
    line-height:1.78;
    max-width:820px;
  }
  .eyebrow{
    display:inline-flex;
    align-items:center;
    gap:8px;
    font-size:12px;
    letter-spacing:.18em;
    text-transform:uppercase;
    color:#dbe6ff;
    background:rgba(255,255,255,.10);
    border:1px solid rgba(255,255,255,.16);
    border-radius:999px;
    padding:7px 11px;
    margin-bottom:12px;
  }

  /* ===== Section header ===== */
  .section-head{ display:grid; gap:10px; margin-bottom:36px; }
  .section-head .title{ color:var(--ink); font-weight:800; margin:0; line-height:1.12; }
  .section-head .lead{ color:#2c3e68; margin:0 auto; max-width:860px; }
  .section-head .dash{
    width:72px; height:4px; border-radius:8px; margin:10px auto 0;
    background: linear-gradient(90deg, #8aa4ff, #3a55b6);
  }

  /* ===== Product cards ===== */
  .products-grid{ --gap:22px; }
  .products-grid .col{ margin-bottom:var(--gap); }

  .card-prod{
    position:relative; height:100%;
    border:1px solid var(--line); border-radius:18px; overflow:hidden;
    background: var(--card);
    box-shadow: 0 10px 28px rgba(16,28,52,.06);
    transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
  }
  .card-prod-link{
    display:block;
    height:100%;
    color:inherit;
    text-decoration:none;
    border-radius:18px;
  }
  .card-prod-link:hover,
  .card-prod-link:focus{
    color:inherit;
    text-decoration:none;
    outline:none;
  }
  .card-prod-link:focus-visible .card-prod{
    outline:3px solid #6a8df4;
    outline-offset:3px;
  }
  .card-prod:focus-within,
  .card-prod:hover{ transform: translateY(-4px); box-shadow:0 18px 42px rgba(16,28,52,.12); border-color:#dfe6f4; }

  .card-prod__img{ position:relative; overflow:hidden; }
  .card-prod__img img{
    width:100%; height:220px; object-fit:cover; display:block;
    transform: scale(1); transition: transform .45s ease;
  }
  .card-prod:hover .card-prod__img img{ transform: scale(1.05); }
  .shine::after{
    content:""; position:absolute; inset:0; background:
      linear-gradient(120deg, rgba(255,255,255,0) 30%, rgba(255,255,255,.18) 45%, rgba(255,255,255,0) 60%);
    transform: translateX(-120%); transition: transform .7s ease;
  }
  .card-prod:hover .shine::after{ transform: translateX(120%); }

  .badge-float{
    position:absolute; top:12px; left:12px; z-index:2;
    background:linear-gradient(90deg,#2f4ea1,#6a8df4); color:#fff;
    padding:6px 10px; border-radius:999px; font-size:12px; font-weight:600; letter-spacing:.02em;
    box-shadow:0 6px 16px rgba(40,60,110,.25);
  }

  .card-prod__body{ padding:18px 16px 16px; text-align:center; }
  .card-prod__title{ font-size:18px; line-height:1.22; margin:0 0 6px; color:#0f2442; font-weight:700; }
  .card-prod__desc{ color:var(--muted); font-size:16px; min-height:44px; margin-top: 15px;text-align: justify; }
  .card-prod__cta{ padding:14px 16px 18px; text-align:center; }
  .btn-ghost{
    display:inline-block; padding:10px 14px; border-radius:10px;
    border:1px solid #cfd8ee; color:#22345f; font-weight:600; font-size:14px;
    transition: background .2s ease, border-color .2s ease, color .2s ease;
  }
  .btn-ghost:hover{ background:#1c2f57; color:#fff; border-color:#1c2f57; text-decoration:none; }

  /* spacing helpers */
  .pt-100{ padding-top:100px; } .pb-70{ padding-bottom:70px; }
  @media (max-width: 991px){
    .about-hero{ min-height:auto; }
    .about-hero__card{ padding:92px 0 110px; }
    .card-prod__img img{ height:200px; }
  }
  @media (max-width: 767px){
    .about-hero__card{ padding:76px 0 92px; }
    .about-hero__card h1{ font-size:clamp(28px, 8vw, 36px); line-height:1.18; }
    .about-hero__card p{ font-size:15px; line-height:1.7; }
  }
  @media (max-width: 420px){
    .about-hero__card{ padding:64px 0 78px; }
  }
</style>

<div class="main-content">

  <!-- Hero -->
  <section class="about-hero">
    <div class="container">
      <div class="about-hero__card" data-aos="fade-up">
        <span class="eyebrow">Our Catalog</span>
        <h1><span class="brand" style="color:#fff">Products and Services</span></h1>
        <p>Explore Singhania Refrigeration’s product range—engineered for performance, efficiency, and reliability across India’s cold chain.</p>
      </div>
    </div>
    <div class="about-hero__bg"></div>
  </section>

  <?php
  // Product list with 2–3 line descriptions
  $products = [
    [
      'title' => "Truck's AC",
      'slug'  => 'truck-ac.php',
      'img'   => 'assets/images/products/truck-ac.webp',
      'desc'  => "Cabin and cargo AC units designed for India’s heat and stop-go traffic.\nStable temperatures, quick pull-down, and rugged components for long routes.",
      'badge' => 'Transport'
    ],
    [
      'title' => "Truck's Refrigerator Container",
      'slug'  => 'truck-refrigerator-container.php',
      'img'   => 'assets/images/products/truck-ac-re.jpg',
      'desc'  => "Insulated reefer containers with food-grade interiors and precise controls.\nIdeal for dairy, pharma, seafood, and multi-drop distribution.",
      'badge' => 'Transport'
    ],
    [
      'title' => 'Cold Storage Refrigeration Units',
      'slug'  => 'cold-storage-refrigeration-units.php',
      'img'   => 'assets/images/products/cold-storage.jpg',
      'desc'  => "High-efficiency chillers, freezers, and multi-temp systems for warehouses.\nSmart control logic reduces energy while safeguarding product quality.",
      'badge' => 'Storage'
    ],
    [
      'title' => 'Compressor Rack System',
      'slug'  => 'compressor-rack-system.php',
      'img'   => 'assets/images/products/compressor-rack-system-e1600420693281.webp',
      'desc'  => "Centralized racks with variable staging and heat recovery options.\nBuilt for uptime, easy serviceability, and lower lifecycle costs.",
      'badge' => 'Efficiency'
    ],
    [
      'title' => 'Ammonia Refrigeration Units',
      'slug'  => 'ammonia-refrigeration-units.php',
      'img'   => 'assets/images/products/ammonia-refrigeration.webp',
      'desc'  => "Industrial NH₃ systems delivering superior efficiency for large facilities.\nEngineered with safety interlocks, redundancy, and robust metallurgy."
    ],
    [
      'title' => 'Freon Refrigeration Units',
      'slug'  => 'freon-refrigeration-in-india',
      'img'   => 'assets/images/products/compressor-rack-system-e1600420693281.webp',
      'desc'  => "Compact HFC/HFO systems for cold rooms, retail, pharma and food businesses.\nModular configurations with precise controls and Pan-India support.",
      'badge' => 'New'
    ],
    [
      'title' => 'Ripening Systems',
      'slug'  => 'ripening-systems.php',
      'img'   => 'assets/images/products/banana-ripening-cold-room.webp',
      'desc'  => "Ethylene-controlled chambers for uniform color and texture every cycle.\nAccurate temperature, humidity, and ventilation ensure consistent results.",
      'badge' => 'Popular'
    ],
    [
      'title' => 'Multideck Cabinet',
      'slug'  => 'multideck-cabinet.php',
      'img'   => 'assets/images/products/multideck-cabinet.webp',
      'desc'  => "Retail display cabinets with high visibility and low energy draw.\nNight blinds and advanced airflow reduce frost and product dehydration."
    ],
    [
      'title' => 'IQF (Individual Quick Freeze)',
      'slug'  => 'iqf.php',
      'img'   => 'assets/images/products/seafood-storage-facility.webp',
      'desc'  => "Rapid freezing preserves cell structure, taste, and appearance.\nPerfect for seafood, fruits, and ready-to-eat lines with strict throughput."
    ],
    [
      'title' => 'Doors & CA Doors',
      'slug'  => 'doors-ca-doors.php',
      'img'   => 'assets/images/products/coldroom-door.webp',
      'desc'  => "Insulated sliding/hinged doors with heated frames and tight sealing.\nControlled Atmosphere options maintain pressure and gas integrity."
    ],
    [
      'title' => 'Puff Panels',
      'slug'  => 'panels.php',
      'img'   => 'assets/images/products/panel.webp',
      'desc'  => "Modular PUFF panels for fast builds and high thermal resistance.\nFood-safe finishes, cam-lock joints, and long-term dimensional stability."
    ],
    [
      'title' => 'Dock Shelter & Dock Leveler',
      'slug'  => 'dock-shelter-dock-leveler.php',
      'img'   => 'assets/images/products/docking-system-facility.webp',
      'desc'  => "Seals and levelers that cut heat ingress during loading cycles.\nSafer, faster dock operations with reduced energy losses."
    ],
    [
      'title' => 'Heavy Duty Racks',
      'slug'  => 'heavy-duty-racks.php',
      'img'   => 'assets/images/products/packing-and-grading-line.webp',
      'desc'  => "Cold-room compatible racking for high loads and dense storage.\nCompatible with FIFO/LIFO strategies, seismic compliance on request."
    ],
  ];
  function imgOrFallback($path){
    return (is_file($path) ? $path : 'assets/images/products/placeholder.jpg');
  }
  ?>

  <!-- Products Grid -->
  <section class="pt-100 pb-70">
    <div class="container">

      <div class="section-head text-center">
        <h2 class="title">Featured Products</h2>
        <div class="dash"></div>
        <p class="lead">From truck refrigeration to cold rooms, compressor racks, and insulated doors—choose the solution that fits your operations.</p>
      </div>

      <div class="row products-grid">
        <?php foreach ($products as $p): ?>
          <div class="col-lg-4 col-md-6 col-sm-12 col mb-4" data-aos="fade-up">
            <a class="card-prod-link" href="<?php echo htmlspecialchars(publicPageUrl($p['slug'])); ?>" aria-label="View <?php echo htmlspecialchars($p['title'], ENT_QUOTES); ?>">
            <article class="card-prod">
              <div class="card-prod__img shine">
                <?php if (!empty($p['badge'])): ?>
                  <span class="badge-float"><?php echo htmlspecialchars($p['badge']); ?></span>
                <?php endif; ?>
                <img
                  src="<?php echo htmlspecialchars(imgOrFallback($p['img']), ENT_QUOTES); ?>"
                  alt="<?php echo htmlspecialchars($p['title'], ENT_QUOTES); ?>"
                  loading="lazy">
              </div>
              <div class="card-prod__body">
                <h3 class="card-prod__title">
                  <?php echo htmlspecialchars($p['title']); ?>
                </h3>
                <p class="card-prod__desc"><?php echo nl2br(htmlspecialchars($p['desc'])); ?></p>
              </div>
              <!-- <div class="">
                <a class="btn-ghost" href="<?php echo htmlspecialchars(publicPageUrl($p['slug'])); ?>">View details</a>
              </div> -->
            </article>
            </a>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <!-- CTA -->
  <div class="rs-cta bg21 pt-90 pb-100 md-pt-68 md-pb-80">
    <div class="container">
      <div class="sec-title text-center">
        <div class="sub-title modify white">Plan a project?</div>
        <h2 class="title3 white-color">Our experts are ready to help.</h2>
        <div class="btn-part">
          <a class="readon banner-style" href="contact.php">Contact Us</a>
        </div>
      </div>
    </div>
  </div>

</div>

<?php include('footer.php'); ?>

<script>
  // AOS init (safe if present)
  window.addEventListener('load', function(){
    if (window.AOS && typeof AOS.init === 'function') {
      AOS.init({ duration: 750, once: true, offset: 80, easing: 'ease-out' });
    }
  });
</script>
</body>
</html>
