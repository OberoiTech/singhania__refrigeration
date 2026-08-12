<!DOCTYPE html>
<html lang="en">
<?php
  $pageTitle = 'Cold Storage Solutions in Delhi NCR | Singhania Refrigeration';
  $pageDescription = 'Explore Singhania Refrigeration\'s cold storage solutions - turnkey construction, segment-wise cold rooms, CA/ammonia/freon systems, quality monitoring, warehouse and transport management for Delhi NCR and pan-India.';
  $pageKeywords = 'cold storage solutions Delhi NCR, turnkey cold storage, cold chain solutions India, warehouse management cold chain, transport management system, transport refrigeration';
  $ogDescription = 'Explore turnkey construction, segment-wise cold rooms, refrigeration systems, monitoring, warehouse management and transport solutions from Singhania Refrigeration.';
$canonicalUrl = 'https://singhaniarefrigeration.com/solutions';
?>
<?php include('head.php'); ?>
<body>
<?php include('header.php'); ?>

<style>
  :root{
    --ink:#0f2442; --muted:#4b587c; --line:#e7ecf5; --brand:#0e2344;
    --card:#ffffff; --soft:#f6f8ff;
  }

  .solutions-hero{
    position:relative;
    min-height:560px;
    display:flex;
    align-items:center;
    overflow:hidden;
    background:
      linear-gradient(90deg, rgba(6,18,38,.95) 0%, rgba(8,34,67,.78) 52%, rgba(8,34,67,.28) 100%),
      url('assets/images/products/cold-storage.jpg') center/cover no-repeat;
  }
  /* .solutions-hero:after{
    content:"";
    position:absolute;
    left:0;
    right:0;
    bottom:0;
    height:90px;
    background:linear-gradient(180deg, rgba(255,255,255,0), #fff);
    pointer-events:none;
  } */
  .solutions-hero__content{
    position:relative;
    z-index:1;
    max-width:900px;
    padding:110px 0 130px;
  }
  .solutions-hero__eyebrow{
    display:inline-block;
    margin-bottom:14px;
    padding:7px 12px;
    border:1px solid rgba(255,255,255,.20);
    border-radius:999px;
    background:rgba(255,255,255,.12);
    color:#dbe6ff;
    font-size:13px;
    line-height:1;
    font-weight:800;
    letter-spacing:.08em;
    text-transform:uppercase;
    box-shadow:0 8px 22px rgba(0,0,0,.16);
  }
  .solutions-hero h1{
    max-width:880px;
    margin:0 0 20px;
    color:#fff;
    font-size:clamp(34px,4.8vw,58px);
    line-height:1.03;
    font-weight:900;
  }
  .solutions-hero p{
    max-width:860px;
    margin:0;
    color:#e6ecff;
    font-size:17px;
    line-height:1.78;
    font-weight:600;
  }
  .solutions-hero__actions{
    display:flex;
    flex-wrap:wrap;
    gap:12px;
    margin-top:28px;
  }
  .solutions-hero__btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-height:54px;
    padding:14px 21px;
    border:1px solid rgba(255,255,255,.36);
    border-radius:8px;
    background:rgba(255,255,255,.10);
    color:#fff;
    font-weight:900;
    text-decoration:none;
    backdrop-filter:blur(8px) saturate(120%);
    transition:background .2s ease, transform .2s ease, border-color .2s ease;
  }
  .solutions-hero__btn:hover{
    background:rgba(255,255,255,.18);
    border-color:rgba(255,255,255,.52);
    color:#fff;
    transform:translateY(-1px);
    text-decoration:none;
  }

  .section-head{ display:grid; gap:10px; margin-bottom:36px; }
  .section-head .title{ color:var(--ink); font-weight:800; margin:0; line-height:1.12; }
  .section-head .lead{ color:#2c3e68; margin:0 auto; max-width:860px; }
  .section-head .dash{
    width:72px; height:4px; border-radius:8px; margin:10px auto 0;
    background: linear-gradient(90deg, #8aa4ff, #3a55b6);
  }

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

  .pt-100{ padding-top:100px; } .pb-70{ padding-bottom:70px; }
  @media (max-width: 991px){
    .solutions-hero{ min-height:auto; }
    .solutions-hero__content{ padding:92px 0 110px; }
    .card-prod__img img{ height:200px; }
  }
  @media (max-width: 575px){
    .solutions-hero h1{ font-size:34px; }
    .solutions-hero p{ font-size:15px; line-height:1.7; }
    .solutions-hero__actions{ gap:10px; }
    .solutions-hero__btn{ min-height:48px; padding:12px 16px; }
  }
</style>

<div class="main-content">

  <section class="solutions-hero">
    <div class="container">
      <div class="solutions-hero__content" data-aos="fade-up">
        <span class="solutions-hero__eyebrow">Our Solutions</span>
        <h1>Cold Storage Solutions</h1>
        <p>From turnkey construction to warehouse and transport management&mdash;explore
          Singhania Refrigeration&rsquo;s complete range of cold chain solutions for
          Delhi NCR and pan-India operations.</p>
        <div class="solutions-hero__actions">
          <a href="contact" class="solutions-hero__btn">Get a Free Quote</a>
          <a href="tel:+919971060822" class="solutions-hero__btn">Call Now</a>
        </div>
      </div>
    </div>
  </section>

  <?php
  $solutions = [
    [
      'title' => 'Turnkey Solution',
      'slug'  => 'turnkey-solution.php',
      'img'   => 'assets/images/products/turnkey-cold-storage-project.webp',
      'desc'  => "End-to-end integrated cold chain projects - from concept and design to commissioning and AMC.",
      'badge' => 'Planning & Build'
    ],
    [
      'title' => 'Segment Wise Solutions',
      'slug'  => 'segments-wise.php',
      'img'   => 'assets/images/products/ware-house-cold-room.webp',
      'desc'  => "Tailored refrigeration and cold-chain designs for every industry we serve.",
      'badge' => 'By Industry'
    ],
    [
      'title' => 'Cold Chain Refrigeration, CA Store, Freon/Ammonia',
      'slug'  => 'cold-chain-refrigeration-ca-store-freon-ammonia.php',
      'img'   => 'assets/images/products/cold-room-doors.webp',
      'desc'  => "Turnkey construction, refrigeration systems, consulting, transport refrigeration, packing and grading lines, and quality monitoring.",
      'badge' => 'Refrigeration'
    ],
    [
      'title' => 'Quality Monitoring Solution',
      'slug'  => 'quality-monitoring-solution.php',
      'img'   => 'assets/images/products/cold-chain-monitoring.png',
      'desc'  => "End-to-end monitoring across warehouse and transport - temperature, humidity, shelf life and spoilage detection.",
      'badge' => 'Monitoring'
    ],
    [
      'title' => 'Ware House Management System',
      'slug'  => 'ware-house-management.php',
      'img'   => 'assets/images/products/palletized-cold-storage.webp',
      'desc'  => "End-to-end WMS for cold chain - online bookings, inventory and pallet tracking, environment monitoring and analytics.",
      'badge' => 'Software'
    ],
    [
      'title' => 'Transport Management System',
      'slug'  => 'transport-management.php',
      'img'   => 'assets/images/products/transport-management.png',
      'desc'  => "Plan routes, monitor environment, alert on deviations, and measure delivery performance end-to-end.",
      'badge' => 'Software'
    ],
    [
      'title' => 'Transport Refrigeration',
      'slug'  => 'transport-refrigeration.php',
      'img'   => 'assets/images/products/truck_refrigeration_singhania.webp',
      'desc'  => "Refrigeration for small and medium trucks and vans - fresh and frozen logistics, direct-drive, battery, split and monoblock options.",
      'badge' => 'Transport'
    ],
  ];
  function imgOrFallback($path){
    return (is_file($path) ? $path : 'assets/images/products/placeholder.jpg');
  }
  ?>

  <section class="pt-100 pb-70">
    <div class="container">

      <div class="section-head text-center">
        <h2 class="title">All Cold Storage Solutions</h2>
        <div class="dash"></div>
        <p class="lead">Whether you need a full turnkey build, segment-specific cold rooms, or ongoing monitoring across your warehouse and transport fleet, choose the solution that fits your operation.</p>
      </div>

      <div class="row products-grid">
        <?php foreach ($solutions as $solution): ?>
          <div class="col-lg-4 col-md-6 col-sm-12 col mb-4" data-aos="fade-up">
            <a class="card-prod-link" href="<?php echo htmlspecialchars(publicPageUrl($solution['slug'])); ?>" aria-label="View <?php echo htmlspecialchars($solution['title'], ENT_QUOTES); ?>">
            <article class="card-prod">
              <div class="card-prod__img shine">
                <?php if (!empty($solution['badge'])): ?>
                  <span class="badge-float"><?php echo htmlspecialchars($solution['badge']); ?></span>
                <?php endif; ?>
                <img
                  src="<?php echo htmlspecialchars(imgOrFallback($solution['img']), ENT_QUOTES); ?>"
                  alt="<?php echo htmlspecialchars($solution['title'], ENT_QUOTES); ?>"
                  loading="lazy">
              </div>
              <div class="card-prod__body">
                <h3 class="card-prod__title">
                  <?php echo htmlspecialchars($solution['title']); ?>
                </h3>
                <p class="card-prod__desc"><?php echo nl2br(htmlspecialchars($solution['desc'])); ?></p>
              </div>
            </article>
            </a>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <div class="rs-cta bg21 pt-90 pb-100 md-pt-68 md-pb-80">
    <div class="container">
      <div class="sec-title text-center">
        <div class="sub-title modify white">Plan a project?</div>
        <h2 class="title3 white-color">Our experts are ready to help.</h2>
        <div class="btn-part">
          <a class="readon banner-style" href="contact">Contact Us</a>
        </div>
        <p class="cta-phone-numbers" style="margin-top: 10px; color:var(--card)">
          Call: <a style="color: white;" href="tel:+919971060822"><strong>+91 99710 60822</strong></a>
          <span aria-hidden="true">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
          Call: <a style="color: white;" href="tel:+919718097170"><strong>+91 97180 97170</strong></a>
        </p>
      </div>
    </div>
  </div>

</div>

<?php include('footer.php'); ?>

<script>
  window.addEventListener('load', function(){
    if (window.AOS && typeof AOS.init === 'function') {
      AOS.init({ duration: 750, once: true, offset: 80, easing: 'ease-out' });
    }
  });
</script>
</body>
</html>
