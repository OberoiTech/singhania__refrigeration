<!DOCTYPE html>
<html lang="zxx">
  <head>
    <?php include('head.php'); ?>
    <?php
    $pageTitle = 'Cold Storage Refrigeration Units Manufacturer in India | Singhania Refrigeration';
    $pageDescription = 'Singhania Refrigeration — Cold Storage Refrigeration Units manufacturer in India. Energy-efficient systems for warehouses and cold rooms storing dairy, produce, frozen food & pharma. Delhi NCR based. Call +91 99710 60822.';

  ?>
    <style>
      :root {
        --ink: #0f2442;
        --muted: #667085;
        --soft: #f6f8ff;
        --card: #ffffff;
        --line: #e7ecf5;
        --brand: #0e2344;
        --brand2: #082243;
        --section-y: 72px;
        --section-y-tablet: 60px;
        --section-y-mobile: 48px;
        --content-gap: 28px;
        --card-gap: 30px;
      }

      /* ====== HERO / BREADCRUMB ====== */
    .rs-breadcrumbs.bg-7 {
      position: relative;
      background-image: url("assets/images/products/truck-4.webp");
      background-size: cover;
      background-position: 62% center;
      overflow: hidden;
      isolation: isolate;
    }

    .rs-breadcrumbs.bg-7::before {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(90deg,
          rgba(5, 18, 38, .97) 0%,
          rgba(7, 28, 57, .91) 35%,
          rgba(7, 25, 49, .56) 61%,
          rgba(5, 15, 30, .14) 100%);
      pointer-events: none;
      z-index: -1;
    }

    .rs-breadcrumbs.bg-7::after {
      content: "";
      position: absolute;
      inset: 0;
      background:
        linear-gradient(180deg, rgba(3, 12, 25, .1), rgba(3, 12, 25, .38)),
        radial-gradient(circle at 78% 46%, rgba(239, 92, 32, .16), transparent 25%);
      pointer-events: none;
      z-index: -1;
    }

    .rs-breadcrumbs .container {
      position: relative;
      z-index: 1;
    }

    .rs-breadcrumbs .content-part {
      min-height: clamp(590px, 78vh, 760px);
      padding: 92px 0 80px;
      display: flex;
      align-items: center;
      justify-content: flex-start;
    }

    .hero-card {
      max-width: 700px;
      margin: 0;
      padding: 0;
      color: #fff;
      text-align: left;
      transform-origin: 50% 100%;
      animation: heroIn .8s ease both;
    }

    .hero-card h1 {
      max-width: 660px;
      font-size: clamp(38px, 4.6vw, 64px);
      line-height: 1.08;
      letter-spacing: -.035em;
      margin: 18px 0 20px;
      padding: 0;
      color: #fff;
    }

    .hero-card .lead {
      max-width: 630px;
      margin: 0;
      color: rgba(238, 244, 255, .86);
      line-height: 1.75;
      font-size: clamp(15px, 1.4vw, 17px);
      text-align: justify;
      text-justify: inter-word;
      text-align-last: left;
      -webkit-hyphens: auto;
      hyphens: auto;
      overflow-wrap: break-word;
    }


    @keyframes heroIn {
      from {
        opacity: 0;
        transform: translateY(18px) scale(.985)
      }

      to {
        opacity: 1;
        transform: none
      }
    }

    /* ====== LAYOUT ====== */
    .section-pad,
    .section-padding {
      padding: var(--section-y) 0;
    }

    /* ====== LEFT: PRODUCT CONTENT ====== */
    .prod-media {
      position: relative;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 24px 60px rgba(16, 28, 52, .18);
      background: #0b1530;
    }

    .prod-media img {
      width: 100%;
      height: auto;
      display: block;
      aspect-ratio: 16 / 10;
      object-fit: cover;
      transform: scale(1.001);
      transition: transform .6s ease;
    }

    .prod-media:hover img {
      transform: scale(1.03);
    }

    .h2,
    .section-h2 {
      font-size: clamp(24px, 2.6vw, 32px);
      color: var(--ink);
      font-weight: 800;
      line-height: 1.25;
      margin: 0 0 24px;
    }

    .feature-list {
      list-style: none;
      padding: 0;
      margin: 10px 0 0;
      display: grid;
      gap: 10px;
    }

    .feature-list li {
      position: relative;
      padding-left: 28px;
      color: #2d3c63;
    }

    .feature-list li::before {
      content: "";
      position: absolute;
      left: 0;
      top: 6px;
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background: conic-gradient(from 180deg, #3b5bb7, #2a427f);
      box-shadow: inset 0 0 0 3px #fff;
    }

    /* ====== CTA BAR ====== */
    .cta-bar {

      margin-top: 24px;
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .hero-card .cta-bar {
      justify-content: flex-start;
      gap: 14px;
      margin-top: 32px;
    }

    .hero-card .btn-brand {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 52px;
      padding: 13px 23px;
      color: white;
      border: 1px solid rgba(255, 255, 255, .28);
      background: rgba(255, 255, 255, .08);
      box-shadow: none;
      backdrop-filter: blur(8px);
      border-radius: 9px;
    }
    .hero-card .btn-brand:hover{
      background: rgba(255, 255, 255, .16);
      border-color: rgba(255, 255, 255, .5);
    }

    

    /* ====== MICRO-ANIMATIONS ====== */
    [data-animate] {
      opacity: 0;
      transform: translateY(22px) scale(.985);
      transition: all .7s cubic-bezier(.2, .65, .3, 1);
    }

    [data-animate].active {
      opacity: 1;
      transform: none;
    }

    /* Section-2 Image */
    /* .intro-section {
      background:white
    } */

    /* .intro-section .section-h2 {
      max-width: 700px;
    } */

    .section-eyebrow {
      display: inline-block;
      margin-bottom: 10px;
      color: #0057a8;
      font-size: 12px;
      font-weight: 700;
      letter-spacing: .18em;
      text-transform: uppercase;
    }

    .intro-copy {
      max-width: 720px;
    }

    .intro-copy p {
      margin-bottom: 10px;
      text-align: justify;
      font-size: clamp(15px, 1.4vw, 17px);
      line-height: 1.5;
    }

    .intro-copy p:last-child {
      margin-bottom: 0;
    }

    .TruckImg {
      width: 100%;
      max-width: 520px;
      height: auto;
      aspect-ratio: 4 / 3;
      display: block;
      margin: 0 0 0 auto;
      object-fit: contain;
      object-position: center;
      padding: 18px;
      background: #fff;
      border-radius: 18px 0 34px 0;
      box-shadow: 0 18px 44px rgba(16, 28, 52, .12);
    }

    .intro-section .row>[class*="col-"] {
      margin-bottom: var(--content-gap);
    }

    .intro-section .row>[class*="col-"]:last-child {
      margin-bottom: 0;
    }

    /* section-3 */

    .feature-grid>[class*="col-"] {
      margin-bottom: var(--card-gap);
    }

    .feature-grid>[class*="col-"]:nth-last-child(-n + 3) {
      margin-bottom: 0;
    }

    .feature-card {
      background: #ffffff;
      border: 1px solid #e8e8e8;
      border-radius: 10px;
      padding: 32px 24px;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.10);
    }

    .feature-icon {
      font-size: 2.4rem;
      color: var(--ink);
      margin-bottom: 16px;
    }

    .feature-title {
      font-size: 1.1rem;
      font-weight: 700;
      line-height: 1.35;
      margin: 0 0 10px;
      color: #1a1a1a;
    }

    .feature-desc {
      font-size: 0.95rem;
      color: #555;
      line-height: 1.7;
      margin: 0;
    }

    @media (max-width: 991px) {
      .rs-breadcrumbs.bg-7 {
        background-position: 68% center;
      }

      .rs-breadcrumbs .content-part {
        min-height: 600px;
        padding: 76px 0 68px;
      }

      .intro-copy {
        max-width: 100%;
      }

      .TruckImg {
        margin: 8px auto 0;
        max-width: 560px;
      }

      
      .section-pad,
      .section-padding {
        padding-top: var(--section-y-tablet);
        padding-bottom: var(--section-y-tablet);
      }

      .feature-grid>[class*="col-"]:nth-last-child(-n + 3) {
        margin-bottom: var(--card-gap);
      }

      .feature-grid>[class*="col-"]:nth-last-child(-n + 2) {
        margin-bottom: 0;
      }
    }

    @media (max-width: 767px) {

      
      .section-pad,
      .section-padding {
        padding-top: var(--section-y-mobile);
        padding-bottom: var(--section-y-mobile);
      }

      .hero-card {
        max-width: 100%;
        margin: 0;
        padding: 0 4px;
      }

      .rs-breadcrumbs .content-part {
        min-height: 640px;
        padding: 68px 0 60px;
      }

      .hero-card h1 {
        font-size: clamp(34px, 9vw, 48px);
        margin: 16px 0 18px;
      }

      .hero-card .lead {
        text-align: justify;
        line-height: 1.7;
        font-size: 14px;
      }

      .hero-card .btn-brand {
        min-width: 150px;
        text-align: center;
      }

      .section-h2 {
        font-size: 24px;
        line-height: 1.28;
        margin-bottom: 20px;
      }

      .TruckImg {
        max-width: 100%;
        aspect-ratio: 4 / 3;
        margin-left: auto;
        margin-right: auto;
        margin-top: 12px;
        padding: 12px;
      }

      .feature-grid>[class*="col-"],
      .feature-grid>[class*="col-"]:nth-last-child(-n + 2),
      .feature-grid>[class*="col-"]:nth-last-child(-n + 3) {
        margin-bottom: 20px;
      }

      .feature-grid>[class*="col-"]:last-child {
        margin-bottom: 0;
      }

      .feature-card {
        padding: 26px 18px;
      }

      .feature-icon {
        font-size: 2rem;
        margin-bottom: 12px;
      }

      .feature-title {
        font-size: 1rem;
      }
    }

    @media (max-width: 420px) {
      .hero-card .cta-bar {
        gap: 10px;
      }

      .hero-card .btn-brand {
        width: 100%;
      }

    }
  </style>
  </head>

  <body>
  <?php include('header.php'); ?>
  <?php
  $quoteStatus = $_GET['status'] ?? '';
  $quoteAlerts = [
    'success' => ['class' => 'alert-success', 'text' => 'Thank you! Your quote request has been sent.'],
    'mail-error' => ['class' => 'alert-warning', 'text' => 'Your details were saved, but email delivery failed. Please call us for urgent requests.'],
    'missing' => ['class' => 'alert-danger', 'text' => 'Please fill your name and phone number.'],
    'invalid-email' => ['class' => 'alert-danger', 'text' => 'Please enter a valid email address.'],
  ];
  ?>

  <!-- Main content Start -->
  <div class="main-content">

    <!-- Cold Storage Solution Hero -->
    <div class="rs-breadcrumbs bg-7 heroImage">
      <div class="container">
        <div class="content-part">
          <div class="hero-card">
            <h1>Cold Storage Refrigeration Units Manufacturer in India</h1>
             <h2 class="text-white">Energy-Efficient Refrigeration Systems for Warehouses & Cold Rooms</h2>
            <p class="lead" lang="en">
                Singhania Refrigeration designs and produces Cold Storage Refrigeration Units for
                use in warehouses, cold rooms, and large warehouses, as well as for the safe storage
                of fruits, vegetables, dairies, meats, and pharmaceuticals, throughout all periods of
                time. Our Cold Storage Unit temperature will remain in a stable temperature and are
                able to maintain the optimal environment for consumers.
            </p>
             <p class="lead" lang="en">Designed to continuously operate in an Indian climate, our Cold Storage Units use
              energy-efficient compressors, optimised airflow, and durable materials to provide
              many years of reliable performance.</p>
            <div class="cta-bar">
              <a href="contact.php" class="btn-brand">Get a Free Quote&nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
              <a href="tel:+919971060822" class="btn-brand btn-ghost"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp; Call Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- MAIN CONTENT END  -->

  <!-- ===== What is a Cold Storage Refrigeration Unit? ===== -->
  <section class="intro-section section-padding bg-white" id="what-is-cold-storage-refrigeration-unit">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 col-md-7">
          <div class="intro-copy">
            
            <h2 class="section-h2">What is a Cold Storage Refrigeration Unit?</h2>

            <p class="lead">
               Cold storage systems are located inside a warehouse (or coldroom). They keep
                perishable (temperature-sensitive) products cold, at a constant, controlled
                temperature, for long periods of time.
            </p>
            <p class="lead">
             Unlike transport refrigeration (which cools cargo as it travels), cold storage
            refrigeration units (or systems) are designed to be used at one place for a long
            period (continuous operation) to support the long-term storage of bulk quantities
            of products, as well as support the distribution of those products from a DC
            (distribution centre) or the processing of those products at a plant (processing
            facility).
            </p>
           
          </div>
        </div>

        <div class="col-lg-5 col-md-5">
          <img
            class="TruckImg"
            src="assets/images/products/cold-storage.jpg"
            alt="cold-storage boddy"
            loading="lazy"
          />
        </div>
      </div>
    </div>
  </section>
  <!-- ===== END DEFINITION SECTION ===== -->

  <!-- SECTION 3 -->
  <section class="features-section section-padding" id="key-features" style="background: #f6f9fc;">
    <div class="container">

      <h2 class="section-h2 text-center mb-5">
        Key Features of Our Truck Refrigeration Units
      </h2>

      <?php

       $features = [
        [
          'icon'  => 'fa fa-cogs',
          'title' => 'High-COP Compressors',
          'desc'  => 'High coefficient-of-performance compressors and optimized heat exchangers guarantee maximum energy efficiency for 24/7 operation.'
        ],
        [
          'icon'  => 'fa fa-thermometer-half',
          'title' => 'Wide Temperature Range',
          'desc'  => 'Ideal for use with chillers and deep freezers, from normal cold storage to sub-zero frozen storage.'
        ],
        [
          'icon'  => 'fa fa-bell',
          'title' => 'Smart Monitoring & Alarms',
          'desc'  => 'Data logging and alarm systems provide facility managers with detailed temperature visibility and early warning of deviations.'
        ],
        [
          'icon'  => 'fa fa-wrench',
          'title' => 'Service-Friendly Design',
          'desc'  => 'Components are designed for easy access and quick replacement to minimize downtime for maintenance.'
        ],
        [
          'icon'  => 'fa fa-line-chart',
          'title' => 'Optimised Insulation & Airflow',
          'desc'  => 'Balanced airflow and quality insulation ensure uniform temperatures throughout the whole storage area.'
        ],
        [
          'icon'  => 'fa fa-life-ring',
          'title' => 'Comprehensive AMC Support',
          'desc'  => 'Annual Maintenance Contracts deliver consistent performance and long-term lifecycle dependability.'
        ],
      ];
      ?>

      <div class="row feature-grid">
        <?php foreach ($features as $feature): ?>
          <div class="col-lg-4 col-md-6">
            <div class="feature-card h-100">
              <div class="feature-icon">
                <i class="<?php echo htmlspecialchars($feature['icon']); ?>"></i>
              </div>
              <h3 class="feature-title">
                <?php echo htmlspecialchars($feature['title']); ?>
              </h3>
              <p class="feature-desc">
                <?php echo htmlspecialchars($feature['desc']); ?>
              </p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <!--SECTION 3 END  -->

  <!-- SECTION 4 START -->
  <section class="config-section section-padding bg-white" id="configurations">
    <div class="container">

      <h2 class="section-h2 text-center mb-5">
        Cold Storage Refrigeration Solutions We Offer
      </h2>

      <?php
      // ── Configuration Cards Data Array ──
      $configurations = [
        [
          'number' => '01',
          'title'  => 'Chiller Storage unit',
          'desc'   => 'Standard cold storage temperatures suited to fruits, vegetables, dairy, and general perishables.'
        ],
        [
          'number' => '02',
          'title'  => 'Deep-Freeze Storage Units',
          'desc'   => 'Sub-zero refrigeration for frozen food, meat, and seafood requiring long-term frozen storage.'
        ],
        [
          'number' => '03',
          'title'  => 'Multi-Chamber Cold Rooms',
          'desc'   => 'Partitioned storage with independently controlled zones for mixed-product warehousing.'
        ],
        [
          'number' => '04',
          'title'  => 'Pharma-Grade Cold Storage',
          'desc'   => 'Precision temperature control with monitoring and alarm systems for pharmaceutical and vaccine storage compliance.'
        ],
      ];
      ?>

      <div class="row config-grid">
        <?php foreach ($configurations as $config): ?>
          <div class="col-lg-6">
            <div class="config-card ">
              <span class="config-number">
                <?php echo htmlspecialchars($config['number']); ?>
              </span>
              <div class="config-content">
                <h3 class="config-title">
                  <?php echo htmlspecialchars($config['title']); ?>
                </h3>
                <p class="config-desc">
                  <?php echo htmlspecialchars($config['desc']); ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <style>
    .config-card {
      display: flex;
      align-items: flex-start;
      gap: 20px;
      background: #ffffff;
      border-left: 5px solid #0057a8;
      border-radius: 8px;
      padding: 28px 24px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.07);
      transition: background 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
    }

    .config-card:hover {
      background: var(--ink);
      border-left-color: var(--ink);
      box-shadow: 0 14px 30px rgba(15, 36, 66, .18);
      transform: translateY(-4px);
    }

    .config-number {
      font-size: 2rem;
      font-weight: 800;
      color: var(--ink);
      min-width: 54px;
      line-height: 1;
      transition: color 0.3s ease;
    }

    .config-title {
      font-size: 1.1rem;
      font-weight: 700;
      margin-bottom: 8px;
      color: var(--ink);
      transition: color 0.3s ease;
    }

    .config-desc {
      font-size: 0.95rem;
      color: #555;
      margin: 0;
      line-height: 1.7;
      transition: color 0.3s ease;
    }

    .config-card:hover .config-number,
    .config-card:hover .config-title,
    .config-card:hover .config-desc {
      color: #ffffff;
    }

    .config-grid>[class*="col-"] {
      margin-bottom: var(--content-gap);
    }

    .config-grid>[class*="col-"]:nth-last-child(-n + 2) {
      margin-bottom: 0;
    }

    

    @media (max-width: 991px) {
      .config-grid>[class*="col-"]:nth-last-child(-n + 2) {
        margin-bottom: var(--content-gap);
      }

      .config-grid>[class*="col-"]:last-child {
        margin-bottom: 0;
      }
    }

    @media (max-width: 767px) {
      .config-section .section-h2 {
        margin-bottom: 24px !important;
      }

      .config-grid>[class*="col-"] {
        margin-bottom: 20px;
      }

      .config-card {
        gap: 14px;
        padding: 24px 18px;
      }

      .config-number {
        min-width: 44px;
        font-size: 1.55rem;
      }

      .config-title {
        font-size: 1rem;
        line-height: 1.35;
      }
    }

    @media (max-width: 420px) {
      .config-card {
        display: block;
      }

      .config-number {
        display: inline-block;
        margin-bottom: 12px;
      }
    }
  </style>
  <!-- SECTION-4 end -->

  <!-- SECTION 5 START -->
  <section class="industries-section section-padding" id="industries">
    <div class="container">

      <h2 class="section-h2 text-center  mb-5">
       Industries Using Cold Storage Refrigeration Units 
      </h2>

      <?php
      // ── Industries Data Array ──
      $industries = [
        [
          'image' => 'assets/images/products/diary.png',
          'title' => 'Dairy Processing & Storage',
          'desc'  => 'Maintain consistent chilled conditions for milk, cheese, and dairy products.'
        ],
        [
          'image' => 'assets/images/products/Pharma.png',
          'title' => 'Pharmaceutical Logistics',
          'desc'  => 'Support compliant, temperature-controlled storage for medicines and vaccines.'
        ],
        [
          'image' => 'assets/images/products/frozen-food.png',
          'title' => 'Frozen Food Warehousing',
          'desc'  => 'Hold sub-zero temperatures for frozen food and ice cream distribution centres.'
        ],
        [
          'image' => 'assets/images/products/veg.png',
          'title' => 'Fruits & Vegetables Storage',
          'desc'  => 'Extend shelf life and reduce spoilage for fresh produce in bulk storage.'
        ],
        [
          'image' => 'assets/images/products/meat.png',
          'title' => 'Meat & Seafood Logistics',
          'desc'  => 'Maintain strict food safety temperatures for meat and seafood storage.'
        ],
        [
          'image' => 'assets/images/products/3lp.png',
          'title' => '3PL & Distribution Centres',
          'desc'  => 'Equip third-party logistics warehouses with dependable, scalable cold storage capacity.'
        ],
      ];
      ?>

      <div class="industry-grid">
        <?php foreach ($industries as $industry): ?>
          <div class="industry-card">
            <img
              src="<?php echo htmlspecialchars($industry['image']); ?>"
              alt="<?php echo htmlspecialchars($industry['title']); ?>"
              loading="lazy"
            />
            <h3><?php echo htmlspecialchars($industry['title']); ?></h3>
            <p><?php echo htmlspecialchars($industry['desc']); ?></p>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>
  <!-- section 5 end -->

  <style>
    .industries-section {
      background: #f6f9fc;
    }

    .industry-grid {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 26px;
    }

    .industry-card {
      display: flex;
      flex-direction: column;
      min-width: 0;
      padding: 14px 14px 22px;
      overflow: hidden;
      border: 1px solid rgba(15, 36, 66, .08);
      border-radius: 16px;
      background: #ffffff;
      box-shadow: 0 14px 36px rgba(15, 36, 66, .1);
      transition: transform .3s ease, box-shadow .3s ease;
    }

    .industry-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 28px 65px rgba(15, 36, 66, .17);
    }

    .industry-card img {
      width: 100%;
      height: 220px;
      display: block;
      margin-bottom: 20px;
      border-radius: 11px;
      object-fit: cover;
    }

    .industry-card h3 {
      margin: 0 8px 10px;
      color: var(--ink);
      font-size: 19px;
      line-height: 1.35;
      font-weight: 800;
    }

    .industry-card p {
      margin: 0 8px;
      color: #52617a;
      font-size: 15px;
      line-height: 1.65;
    }

    @media (max-width: 991px) {
      .industry-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 22px;
      }
    }

    @media (max-width: 767px) {
      .industries-section .section-h2 {
        margin-bottom: 24px !important;
      }

      .industry-grid {
        grid-template-columns: 1fr;
        gap: 20px;
      }

      .industry-card {
        padding: 14px;
      }

      .industry-card img {
        height: auto;
        aspect-ratio: 16 / 10;
        border-radius: 12px;
      }

      .industry-card h3 {
        margin: 0 6px 10px;
        font-size: 21px;
      }

      .industry-card p {
        margin: 0 6px 8px;
      }
    }
  </style>
  
<!-- Section 5 end -->

<!-- section-6 start -->

  <section class="local-seo-section section-padding bg-white " id="local-seo">
    <div class="container">
      <div class="row align-items-center local-seo-grid">

        <div class="col-lg-6 local-seo-content">
         
          <h2 class="section-h2">
            Cold Storage Refrigeration Units in Delhi NCR
          </h2>
          <p class="lead">
            Singhania Refrigeration, a Cold Storage Refrigeration Units Manufacturer,
            provides assistance to businesses within India. Our refrigeration systems serve
            as a custom-built solution for warehouses, cold rooms and distribution centres
            operated by food processors, pharmaceutical manufacturers, and logistics companies.
          </p>
          <p class="lead">
           <strong>Our Cold Storage Refrigeration Units are used throughout any of the following cities:</strong>
          </p>
        </div>

        <div class="col-lg-6">
          <div class="city-list-wrapper">
            <div class="service-map-wrap">
  <div class="service-list">
    <h3>SERVICE AREAS</h3>

    <div class="area-item active" data-area="delhi">📍 Delhi</div>
    <div class="area-item" data-area="noida">📍 Noida</div>
    <div class="area-item" data-area="greater-noida">📍 Greater Noida</div>
    <div class="area-item" data-area="gurgaon">📍 Gurgaon</div>
    <div class="area-item" data-area="ghaziabad">📍 Ghaziabad</div>
    <div class="area-item" data-area="faridabad">📍 Faridabad</div>
  </div>

  <div id="serviceMap"></div>
</div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <style>
    .service-map-wrap {
      display: grid;
      grid-template-columns: minmax(190px, .8fr) minmax(0, 1.2fr);
      gap: 16px;
      padding: 16px;
      background: #eef3f8;
      border: 1px solid rgba(6, 38, 74, .06);
      border-radius: 18px;
    }

    .service-list {
      padding: 22px 18px;
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 8px 24px rgba(6, 38, 74, .08);
    }

    .service-list h3 {
      margin: 0 0 18px;
      color: #06264a;
      font-size: clamp(1.25rem, 2vw, 1.65rem);
      line-height: 1.2;
      font-weight: 700;
    }

    .area-item {
      padding: 13px 10px;
      border-bottom: 1px solid #e8edf3;
      border-radius: 8px;
      color: #06264a;
      font-weight: 600;
      cursor: pointer;
      transition: background-color .2s ease, color .2s ease, transform .2s ease;
    }

    .area-item:hover {
      background: #f1f6fc;
      transform: translateX(2px);
    }

    .area-item.active {
      background: #e3efff;
      color: #1268d7;
    }

    .area-item:last-child {
      border-bottom: 0;
    }

    #serviceMap {
      width: 100%;
      min-width: 0;
      height: 440px;
      border-radius: 14px;
      box-shadow: 0 8px 24px rgba(6, 38, 74, .08);
      overflow: hidden;
    }
    /* ── LOCAL SEO / CITY LIST ── */
    .local-seo-section {
      background: #f6f9fc;
    }

    .city-list-wrapper {
      width: 100%;
    }

    .local-seo-content {
      padding-right: clamp(20px, 3vw, 42px);
    }

    .local-seo-content .section-h2 {
      margin-bottom: 18px;
      text-align: left;
    }

    .local-seo-content p {
      color: #2c3e68;
      font-size:clamp(15px, 1.4vw, 17px);
      line-height: 1.55;
      margin: 0 0 12px;
      text-align: justify;
    }

    .local-seo-content p:last-child {
      margin-bottom: 0;
    }

    .local-seo-grid>[class*="col-"] {
      margin-bottom: var(--content-gap);
    }

    .local-seo-grid>[class*="col-"]:last-child {
      margin-bottom: 0;
    }

    @media (max-width: 991px) {
      .local-seo-content {
        padding-right: 15px;
      }
    }

    @media (max-width: 767px) {
      .service-map-wrap {
        grid-template-columns: 1fr;
        padding: 12px;
      }

      #serviceMap {
        height: 330px;
      }

      .local-seo-section .section-h2 {
        margin-bottom: 20px !important;
      }

      .city-list-wrapper {
        padding: 0;
      }

    }
  </style>
  <!-- section-6 end -->

  <!-- Section-7 Start -->
  <section class="why-choose-section section-padding" id="why-choose-us">
    <div class="container">

      <h2 class="section-h2 text-center mb-5">
        Why Choose Singhania Refrigeration?
      </h2>

      <?php
      // ── Why Choose Us Cards Data ──
      $reasons = [
        [
          'icon'  => 'fa fa-industry',
          'title' => 'In-House Panel & Unit Fabrication',
          'desc'  => 'PUF panels, refrigeration units, and control panels are manufactured at our own facility, so quality is controlled at every stage instead of being outsourced to third parties'
        ],
        [
          'icon'  => 'fa fa-calculator',
          'title' => 'Load Calculation Before Quoting',
          'desc'  => 'Every project starts with a heat-load study based on room size, product type, door traffic, and ambient conditions &mdash; so the system isn&rsquo;t oversized (wasted cost) or undersized (unreliable cooling).'
        ],
        [
          'icon'  => 'fa fa-headphones',
          'title' => 'Single Point of Contact, Start to Finish',
          'desc'  => 'Site survey, design, civil coordination, panel erection, refrigeration installation, and commissioning are handled by one team instead of being split across multiple vendors.'
        ],
        [
          'icon'  => 'fa fa-cubes',
          'title' => 'PSpare Parts Kept in Stock',
          'desc'  => 'Compressors, condensers, evaporator fans, and electronic controllers are stocked, so breakdowns are typically repaired in hours rather than weeks of waiting on imports.'
        ],
        [
          'icon'  => 'fa fa-trophy',
          'title' => 'A Track Record Across Cold Chain Segments',
          'desc'  => 'Cold rooms running today for fruit and vegetable traders, dairy units, pharma distributors, and 3PL warehouses across Delhi NCR, many still on active AMC contracts.'
        ],
      ];
      ?>

      <div class="row why-grid justify-content-center">
        <?php foreach ($reasons as $reason): ?>
          <div class="col-lg-4 col-md-6">
            <div class="why-card h-100">
              <i class="<?php echo htmlspecialchars($reason['icon']); ?>
                               why-icon"></i>
              <h3 class="why-title">
                <?php echo htmlspecialchars($reason['title']); ?>
              </h3>
              <p class="why-desc">
                <?php echo htmlspecialchars($reason['desc']); ?>
              </p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <style>
    .why-choose-section {
      background: #f6f9fc;;
    }

    .why-grid {
      justify-content: center;
    }

    .why-grid>[class*="col-"] {
      margin-bottom: var(--card-gap);
    }

    .why-grid>[class*="col-"]:nth-last-child(-n + 2) {
      margin-bottom: 0;
    }

    .why-card {
      background: #ffffff;
      border: 1px solid #dce8f8;
      border-radius: 10px;
      padding: 34px 26px;
      text-align: center;
      box-shadow: 0 10px 26px rgba(16, 28, 52, 0.07);
      transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .why-card:hover {
      box-shadow: 0 10px 28px rgba(0, 87, 168, 0.12);
      transform: translateY(-4px);
    }

    .why-icon {
      width: 64px;
      height: 64px;
      border-radius: 50%;
      background: #eef6ff;
      font-size: 2rem;
      color: var(--ink);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 18px;
    }

    .why-title {
      font-size: 1.08rem;
      font-weight: 700;
      color: var(--ink);
      line-height: 1.35;
      margin: 0 0 10px;
    }

    .why-desc {
      font-size: 0.93rem;
      color: #555;
      line-height: 1.7;
      margin: 0;
    }

    @media (max-width: 991px) {
      .why-grid>[class*="col-"]:nth-last-child(-n + 2) {
        margin-bottom: var(--card-gap);
      }

      .why-grid>[class*="col-"]:last-child {
        margin-bottom: 0;
      }
    }

    @media (max-width: 767px) {
      .why-choose-section .section-h2 {
        margin-bottom: 24px !important;
      }

      .why-grid>[class*="col-"],
      .why-grid>[class*="col-"]:nth-last-child(-n + 2) {
        margin-bottom: 20px;
      }

      .why-grid>[class*="col-"]:last-child {
        margin-bottom: 0;
      }

      .why-card {
        padding: 28px 18px;
      }

      .why-icon {
        width: 58px;
        height: 58px;
        font-size: 1.8rem;
        margin-bottom: 14px;
      }

      .why-title {
        font-size: 1rem;
        line-height: 1.35;
      }
    }
  </style>
  <!-- Section-7 END -->

   <!--Section-8  -->
  <section class="faq-section section-padding bg-white" id="faq">
    <div class="container">

      <h2 class="section-h2 text-center mb-5">
        Frequently Asked Questions
      </h2>

      <?php
      
      $faqs = [
        [
          'q' => 'What temperature should a cold storage room be set to?',
          'a' => 'It depends on what&rsquo;s being stored. Fresh fruits and vegetables are
                  typically held between 2 & deg;C and 8&deg;C, dairy products around 2&deg;C to
                  4&deg;C, and frozen items such as meat, seafood, and ice cream need -18&deg;C
                  to -25&deg;C. We set the exact range based on your product.'
        ],
        [
          'q' => 'How is the cost of a cold storage unit calculated?',
          'a' => 'Cost depends on chamber size, the temperature range required, insulation panel thickness, compressor capacity, and the number of doors or access points. We
                  provide a detailed quote once we understand your storage volume and product type.'
        ],
        [
          'q' => 'What size or capacity of cold storage do I need?',
          'a' => 'Capacity is based on how much stock you plan to hold at any given time, how it packed (crates, cartons, or pallets), and how often stock turns over.
                  We carry out a sizing exercise as part of every quotation.'
        ],
        [
          'q' => 'How much electricity does a cold storage unit consume?',
          'a' => 'Running cost depends on insulation quality, ambient temperature, how often doors are opened, and compressor efficiency. High-COP compressors and properly sealed PUF panels are used to keep consumption as low as possible for the temperature you need.'
        ],
        [
          'q' => 'What is the difference between a chiller room and a deep-freeze room?',
          'a' => 'A chiller room holds products above freezing, commonly 2&deg;C to 8&deg;C, for fresh produce and dairy. A deep-freeze room runs below 0&deg;C, often -18&deg;C or lower, for long-term storage of frozen meat, seafood, and
                  ready-to-eat food.'
        ],
        [
          'q' => 'Do you provide installation and after-sales service outside Delhi NCR?',
          'a' => 'Yes. While we&rsquo;re based in Delhi NCR, our technical team and AMC support extend across India for both new installations and ongoing servicing.'
        ],
      ];
      ?>

      <div class="accordion faq-accordion" id="faqAccordion">
        <?php foreach ($faqs as $index => $faq):
          $itemId    = 'faq-item-' . $index;
          $collapseId = 'faq-collapse-' . $index;
          $isFirst   = ($index === 0);
        ?>
          <div class="accordion-item faq-accordion-item" id="<?php echo $itemId; ?>">
            <h3 class="accordion-header">
              <button class="accordion-button <?php echo $isFirst ? '' : 'collapsed'; ?>"
                type="button"
                data-toggle="collapse"
                data-target="#<?php echo $collapseId; ?>"
                aria-expanded="<?php echo $isFirst ? 'true' : 'false'; ?>"
                aria-controls="<?php echo $collapseId; ?>">
                <?php echo htmlspecialchars($faq['q']); ?>
              </button>
            </h3>
            <div id="<?php echo $collapseId; ?>"
              class="accordion-collapse collapse <?php echo $isFirst ? 'show' : ''; ?>"
              data-parent="#faqAccordion">
              <div class="accordion-body faq-answer">
                <?php echo htmlspecialchars($faq['a']); ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>
  <style>
    /* ── FAQ ACCORDION ── */


    .faq-accordion {
      max-width: 920px;
      margin: 0 auto;
    }

    .faq-accordion-item {
      border: 1px solid #dde6f0;
      border-radius: 10px !important;
      margin-bottom: 14px;
      overflow: hidden;
      background: #ffffff;
      box-shadow: 0 10px 26px rgba(16, 28, 52, 0.06);
    }

    .faq-accordion-item .accordion-button {
      position: relative;
      width: 100%;
      border: 0;
      padding: 20px 56px 20px 22px;
      text-align: left;
      font-weight: 600;
      font-size: 1rem;
      line-height: 1.45;
      color: var(--ink);
      background: #ffffff;
      cursor: pointer;
      transition: color .2s ease, background .2s ease;
    }

    .faq-accordion-item .accordion-button:focus {
      outline: none;
      box-shadow: inset 0 0 0 2px rgba(0, 87, 168, .16);
    }

    .faq-accordion-item .accordion-button::after {
      content: "+";
      position: absolute;
      right: 22px;
      top: 50%;
      width: 28px;
      height: 28px;
      border-radius: 50%;
      background: #eef6ff;
      color: var(--ink);
      font-size: 20px;
      line-height: 28px;
      text-align: center;
      transform: translateY(-50%);
      transition: background .2s ease, color .2s ease;
    }

    .faq-accordion-item .accordion-button:not(.collapsed) {
      color: var(--ink);
      background: #eef4fb;
      box-shadow: none;
    }

    .faq-accordion-item .accordion-button:not(.collapsed)::after {
      content: "-";
      background: #0057a8;
      color: #ffffff;
    }

    .faq-answer {
      font-size: 0.95rem;
      color: #444;
      line-height: 1.75;
      background: #ffffff;
      padding: 0 22px 22px;
    }

    @media (max-width: 767px) {
      .faq-section .section-h2 {
        margin-bottom: 24px !important;
      }

      .faq-accordion-item {
        margin-bottom: 12px;
        border-radius: 8px !important;
      }

      .faq-accordion-item .accordion-button {
        padding: 17px 48px 17px 16px;
        font-size: .98rem;
      }

      .faq-accordion-item .accordion-button::after {
        right: 16px;
        width: 26px;
        height: 26px;
        line-height: 26px;
        font-size: 18px;
      }

      .faq-answer {
        padding: 0 16px 18px;
        font-size: .94rem;
        line-height: 1.7;
      }
    }
  </style>
  <!-- section 8 -->

  <!-- Section-9 -->

  <div class="rs-cta bg21 pt-90 pb-100 md-pt-68 md-pb-80">
    <div class="container">
      <div class="sec-title text-center truck-body-cta">
        <span class="sub-title modify white">Get Started</span>
        <h2 class="title3 white-color">Plan Your Cold Storage Project With Singhania Refrigeration</h2>

        <p class="cta-description">
          From a single cold room to a multi-chamber distribution warehouse, our team can
          review your storage requirement and recommend a refrigeration system that fits
          your product, your budget, and your facility.
        </p>

        <div class="btn-part">
          <a class="readon banner-style" href="contact.php">Request a Quote &rarr;</a>
        </div>

        <p class="cta-phone-numbers">
          Call: <a href="tel:+919971060822"><strong>+91 99710 60822</strong></a>
          <span aria-hidden="true">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
          Call: <a href="tel:+919718097170"><strong>+91 97180 97170</strong></a>
        </p>
      </div>
    </div>
  </div>

  <style>
    .truck-body-cta .cta-description {
      max-width: 760px;
      margin: 16px auto 24px;
      color: #fff;
      font-size: 16px;
      line-height: 1.6;
    }

    .truck-body-cta .cta-phone-numbers {
      margin: 20px 0 0;
      color: #fff;
      font-size: 15px;
      line-height: 1.6;
    }

    .truck-body-cta .cta-phone-numbers a {
      color: #fff;
    }

    .truck-body-cta .cta-phone-numbers a:hover {
      text-decoration: underline;
    }
  </style>

  <!-- Section-9 end -->

  <!-- section 10 -->
  <section class="related-section section-padding" id="related-products" style="background: #f6f9fc;">
    <div class="container">

      <h3 class="section-h3 text-center mb-5">
        Related Solutions
      </h3>

      <?php
      // ── Related Products Data ──
      
      $related_products = [
        ['title' => 'Truck AC', 'icon' => 'fa fa-truck', 'url' => 'truck-ac.php'],
        ['title' => 'Truck Refrigerator Container', 'icon' => 'fa fa-cube', 'url' => 'truck-refrigerator-container.php'],
        ['title' => 'Cold Storage Refrigeration Units', 'icon' => 'fa fa-snowflake-o', 'url' => 'cold-storage-refrigeration-units.php'],
        ['title' => 'Compressor Rack System', 'icon' => 'fa fa-cogs', 'url' => 'compressor-rack-system.php'],
        ['title' => 'Ammonia Refrigeration Units', 'icon' => 'fa fa-industry', 'url' => 'ammonia-refrigeration-units.php'],
        ['title' => 'Ripening Systems', 'icon' => 'fa fa-leaf', 'url' => 'ripening-systems.php'],
        ['title' => 'Multideck Cabinet', 'icon' => 'fa fa-th-large', 'url' => 'multideck-cabinet.php'],
        ['title' => 'IQF (Individual Quick Freeze)', 'icon' => 'fa fa-asterisk', 'url' => 'iqf.php'],
        ['title' => 'Doors & CA Doors', 'icon' => 'fa fa-sign-in', 'url' => 'doors-ca-doors.php'],
        ['title' => 'PUF Panels', 'icon' => 'fa fa-columns', 'url' => 'panels.php'],
        ['title' => 'Dock Shelter & Dock Leveler', 'icon' => 'fa fa-building', 'url' => 'dock-shelter-dock-leveler.php'],
        ['title' => 'Heavy Duty Racks', 'icon' => 'fa fa-archive', 'url' => 'heavy-duty-racks.php'],
      ];
      ?>

      <div class="row related-grid justify-content-center">
        <?php foreach ($related_products as $index => $product):
          $isActiveProduct = basename($product['url']) === basename($_SERVER['SCRIPT_NAME'] ?? 'truck-ac.php');
        ?>
          <div class="col-lg-3 col-md-4 col-sm-6" data-animate>
            <a href="<?php echo htmlspecialchars($product['url']); ?>"
              class="related-card text-decoration-none <?php echo $isActiveProduct ? 'active' : ''; ?>">
              <span class="related-number"><?php echo str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT); ?></span>
              <i class="<?php echo htmlspecialchars($product['icon']); ?>
                               related-icon"></i>
              <span class="related-title">
                <?php echo htmlspecialchars($product['title']); ?>
              </span>
              <i class="fa fa-arrow-right related-arrow"></i>
            </a>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>


  <style>
    /* ── RELATED PRODUCTS ── */
    .section-h3 {
      font-size: 1.4rem;
      font-weight: 700;
      color: #1a1a1a;
    }

    .related-grid>[class*="col-"] {
      margin-bottom: 20px;
    }

    .related-grid>[class*="col-"]:nth-last-child(-n + 4) {
      margin-bottom: 0;
    }

    .related-card {
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      justify-content: center;
      text-align: left;
      background: #ffffff;
      border: 1px solid #dde6f0;
      border-radius: 12px;
      padding: 32px 24px;
      transition: all 0.3s ease;
      height: 100%;
      min-height: 190px;
      overflow: hidden;
    }

    .related-card:hover,
    .related-card.active {
      background: var(--ink);
      border-color: var(--ink);
      transform: translateY(-4px);
      box-shadow: 0 14px 30px rgba(15, 36, 66, .18);
    }

    .related-number {
      position: absolute;
      top: 18px;
      right: 22px;
      color: rgba(15, 36, 66, .08);
      font-size: 46px;
      font-weight: 800;
      line-height: 1;
      transition: color .3s ease;
    }

    .related-icon {
      width: 56px;
      height: 56px;
      border-radius: 12px;
      background: #eef6ff;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 1.6rem;
      color: var(--ink);
      margin-bottom: 20px;
      transition: color 0.3s, background 0.3s;
    }

    .related-title {
      font-size: 1rem;
      font-weight: 700;
      color: var(--ink);
      line-height: 1.35;
      margin-bottom: 16px;
      transition: color 0.3s;
    }

    .related-arrow {
      font-size: 0.8rem;
      color: var(--ink);
      transition: color 0.3s;
    }

    .related-card:hover .related-number,
    .related-card.active .related-number {
      color: rgba(255, 255, 255, .16);
    }

    .related-card:hover .related-icon,
    .related-card.active .related-icon {
      color: #ffffff;
      background: rgba(255, 255, 255, .16);
    }

    .related-card:hover .related-title,
    .related-card:hover .related-arrow,
    .related-card.active .related-title,
    .related-card.active .related-arrow {
      color: #ffffff;
    }

    @media (max-width: 991px) {
      .related-grid>[class*="col-"]:nth-last-child(-n + 4) {
        margin-bottom: 20px;
      }

      .related-grid>[class*="col-"]:nth-last-child(-n + 3) {
        margin-bottom: 0;
      }
    }

    @media (max-width: 767px) {
      .related-section .section-h3 {
        margin-bottom: 24px !important;
      }

      .related-grid>[class*="col-"],
      .related-grid>[class*="col-"]:nth-last-child(-n + 3) {
        margin-bottom: 16px;
      }

      .related-grid>[class*="col-"]:last-child {
        margin-bottom: 0;
      }

      .related-card {
        min-height: 170px;
        padding: 28px 20px;
      }

      .related-number {
        font-size: 40px;
        top: 16px;
        right: 18px;
      }

      .related-icon {
        width: 50px;
        height: 50px;
        margin-bottom: 16px;
      }

      .related-title {
        font-size: .96rem;
      }
    }
  </style>
  <!-- section 10 end -->
  <?php include('footer.php'); ?>


    <!-- Reveal-on-scroll -->
    <script>
      (function(){
        const els = document.querySelectorAll('[data-animate]');
        if (!('IntersectionObserver' in window)){
          els.forEach(el=>el.classList.add('active'));
          return;
        }
        const io = new IntersectionObserver((entries)=>{
          entries.forEach(e=>{
            if(e.isIntersecting){ e.target.classList.add('active'); io.unobserve(e.target); }
          });
        }, {threshold:.18});
        els.forEach(el=>io.observe(el));
      })();
    </script>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
const map = L.map('serviceMap').setView([28.6139, 77.2090], 10);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: ''
}).addTo(map);

const areas = {
  delhi: {
    name: "Delhi",
    coords: [28.6139, 77.2090],
    color: "#1f78ff"
  },
  noida: {
    name: "Noida",
    coords: [28.5355, 77.3910],
    color: "#22aa55"
  },
  "greater-noida": {
    name: "Greater Noida",
    coords: [28.4744, 77.5040],
    color: "#9b51e0"
  },
  gurgaon: {
    name: "Gurgaon",
    coords: [28.4595, 77.0266],
    color: "#ff7a1a"
  },
  ghaziabad: {
    name: "Ghaziabad",
    coords: [28.6692, 77.4538],
    color: "#e63946"
  },
  faridabad: {
    name: "Faridabad",
    coords: [28.4089, 77.3178],
    color: "#27c2c7"
  }
};

let markers = {};
let circles = {};

Object.keys(areas).forEach(key => {
  const area = areas[key];

  circles[key] = L.circle(area.coords, {
    radius: 9000,
    color: area.color,
    fillColor: area.color,
    fillOpacity: 0.15,
    weight: 2
  }).addTo(map);

  markers[key] = L.marker(area.coords)
    .addTo(map)
    .bindPopup(`<b>${area.name}</b><br>Our services are available across ${area.name}.`);
});

function highlightArea(key){
  Object.keys(circles).forEach(k => {
    circles[k].setStyle({
      fillOpacity: 0.08,
      weight: 1
    });
  });

  circles[key].setStyle({
    fillOpacity: 0.35,
    weight: 4
  });

  map.setView(areas[key].coords, 11);
  markers[key].openPopup();

  document.querySelectorAll('.area-item').forEach(item => {
    item.classList.remove('active');
  });

  document.querySelector(`[data-area="${key}"]`).classList.add('active');
}

document.querySelectorAll('.area-item').forEach(item => {
  item.addEventListener('click', function(){
    highlightArea(this.dataset.area);
  });
});

highlightArea('delhi');
</script>
  </body>
</html>
