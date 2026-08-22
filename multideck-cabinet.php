<!DOCTYPE html>
<html lang="en">
  <head>
     <?php
  $pageTitle = 'Multideck Cabinet Manufacturer in India | Singhania Refrigeration';
  $pageDescription = 'Singhania Refrigeration manufactures Multideck Cabinets for supermarkets, convenience stores & food retail &mdash; energy-efficient airflow, even shelf temperatures, glass-door & frozen configurations. Pan-India AMC. Call +91 99710 60822.';

  ?>
  <?php include('head.php'); ?>
  <style>
    /*Main content */
    .rs-breadcrumbs.bg-7 {
      position: relative;
      background-image: url("assets/images/products/multideck-cabinet.webp");
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



    /* ====== MICRO-ANIMATIONS ====== */
    /* Section-2 Image */
    .intro-section {
      background: white
    }

    /* .intro-section .section-h2 {
      max-width: 700px;
    } */

    .intro-copy p {
      text-align: justify;
      font-size: clamp(15px, 1.4vw, 17px);
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
      color:#0f2442
    }

    .feature-desc {
      font-size: 0.95rem;
      color: #555;
      line-height: 1.7;
      margin: 0;
    }

    /* ====== KEY FEATURE CARD ====== */
    .features-section {
      background: #f6f9fc;
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 26px;
    }

    .features-card {
      position: relative;
      display: flex;
      flex-direction: column;
      width: 100%;
      min-width: 0;
      padding: 14px 14px 22px;
      overflow: hidden;
      border: 1px solid rgba(15, 36, 66, .08);
      border-radius: 16px;
      background: #fff;
      box-shadow: 0 14px 36px rgba(15, 36, 66, .1);
      transition: transform .3s ease, box-shadow .3s ease;
    }

    .features-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 28px 65px rgba(15, 36, 66, .17);
    }

    .features-card img {
      width: 100%;
      height: 220px;
      display: block;
      margin-bottom: 20px;
      border-radius: 11px;
      object-fit: cover;
    }

    .features-card h5 {
      margin: 0 8px 10px;
      color: var(--ink);
      font-size: 19px;
      line-height: 1.35;
      font-weight: 800;
    }

    .features-card p {
      margin: 0 8px;
      color: #52617a;
      font-size: 15px;
      line-height: 1.65;
    }

    @media (max-width: 991px) {
      .features-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 22px;
      }

      .rs-breadcrumbs.bg-7 {
        background-position: 68% center;
      }

      .rs-breadcrumbs .content-part {
        min-height: 600px;
        padding: 76px 0 68px;
      }

      .feature-grid>[class*="col-"]:nth-last-child(-n + 3) {
        margin-bottom: var(--card-gap);
      }

      .feature-grid>[class*="col-"]:nth-last-child(-n + 2) {
        margin-bottom: 0;
      }
    }

    @media (max-width: 767px) {

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

      .features-card {
        padding: 14px;
        border-radius: 16px;
      }

      .features-card img {
        height: auto;
        aspect-ratio: 16 / 10;
        margin-bottom: 20px;
        border-radius: 12px;
      }

      .features-card h5 {
        margin: 0 6px 10px;
        font-size: 21px;
      }

      .features-card p {
        margin: 0 6px 8px;
        font-size: 15px;
        line-height: 1.65;
      }

      .features-grid {
        grid-template-columns: 1fr;
        gap: 20px;
      }
    }
  </style>
  <link rel="stylesheet" href="assets/css/product-pages.css">
</head>

<body>
  <?php include('header.php'); ?>

  <!-- Main content Start -->
  <div class="main-content">
    <div class="rs-breadcrumbs bg-7 heroImage">
      <div class="container">
        <div class="content-part">
          <div class="hero-card">
            <h1>Multideck Cabinet Manufacturer in India</h1>
            <h2 class="text-white">Energy-Efficient Retail Display Refrigeration for Supermarkets & Food Outlets</h2>
            <p class="lead" lang="en">
               Singhania Refrigeration manufactures Multideck Cabinets that offer the
                right balance of product visibility and uniform, energy-efficient cooling
                for supermarket chains, convenience stores and food retail outlets that
                need their dairy, beverage, deli and frozen displays to look good and stay
                cold all day long.
            </p>
            <p class="lead" lang="en"> Our multideck cabinets are designed to maintain an even temperature across
                      all shelves, not just the easy ones, and built for Indian retail
                      conditions &mdash; high footfall, frequent restocking and warm ambient
                      store temperatures.
            </p>
            <div class="cta-bar">
              <a href="contact" class="btn-brand">Get a Free Quote&nbsp; </a>
              <a href="tel:+919971060822" class="btn-brand  "><i class="fa fa-phone" aria-hidden="true"></i>&nbsp; Call Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- MAIN CONTENT END  -->

  <!-- ===== WHAT IS A REFRIGERATED TRUCK BODY ===== -->
  <section class="intro-section section-padding">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 col-md-7">
          <div class="intro-copy">
            <!--  <span class="section-eyebrow">Overview</span> -->
            <h2 class="section-h2">What is a Multideck Cabinet?</h2>

            <p class="lead">
              A multideck cabinet is part of <a href="/">refrigeration solutions for retail</a>, built as an open-front or glass-door retail refrigeration
              display unit with multiple shelves, or &ldquo;decks,&rdquo; used to
              display chilled or frozen products &mdash; dairy, beverages, deli
              items, fresh produce, and frozen food &mdash; at the point of sale
              while keeping them within food-safe temperature limits.
            </p>
            <p class="lead">
              An open multideck is built around an air curtain, which circulates cold
              air across the open front so shoppers can grab products directly
              without opening a door &mdash; at the expense of higher energy use
              than a sealed cabinet. That&rsquo;s why insulated night curtains, and
              increasingly glass-door arrangements, are used to cut down on that
              energy loss.
            </p>
            <p class="lead">
              Multideck cabinets are widely used in supermarkets, hypermarkets,
              convenience stores, quick-commerce dark stores, and standalone food
              retail outlets for the display of dairy products, beverages, deli
              items, fresh produce, and frozen food.
            </p>
          </div>
        </div>

        <div class="col-lg-5 col-md-5">
          <img
            class="TruckImg"
            src="assets/images/products/multideck-cabinet.webp"
            alt="multideck-cabinet"
            loading="lazy" />
        </div>
      </div>
    </div>
  </section>
  <!-- ===== END DEFINITION SECTION ===== -->
  
   <!-- SECTION 3 -->
  <section class="features-section section-padding" id="key-features" style="background: #f6f9fc;">
    <div class="container">

      <h2 class="section-h2 text-center mb-5">
        Key Features of Our Multideck Cabinets
      </h2>

      <?php

       $features = [
        [
          'icon'  => 'fa fa-cogs',
          'title' => 'Optimized Airflow Across All Shelves',
          'desc'  => 'The engineered air curtain holds temperature on every deck, not just the middle shelves.'
        ],
        [
          'icon'  => 'fa fa-thermometer-half',
          'title' => 'LED Display Lighting',
          'desc'  => 'Bright, even product lighting that runs cool, adding no heat load to the cabinet.'
        ],
        [
          'icon'  => 'fa fa-bell',
          'title' => ' Energy-Efficient Compressors & Fans',
          'desc'  => 'Lower running costs and power usage with no compromise on holding temperature.'
        ],
        [
          'icon'  => 'fa fa-wrench',
          'title' => 'Adjustable Shelving',
          'desc'  => 'Adjust deck height and spacing as your product mix changes.'
        ],
        [
          'icon'  => 'fa fa-line-chart',
          'title' => 'Night Curtain Option',
          'desc'  => 'A roll-down insulated curtain cuts energy loss outside trading hours.'
        ],
        [
          'icon'  => 'fa fa-life-ring',
          'title' => 'Service-Friendly Design & Nationwide AMC',
          'desc'  => 'Components and AMC support are available to keep cabinets running during trading hours.'
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

   <section class="config-section section-padding " id="configurations">
    <div class="container">

      <h2 class="section-h2 text-center mb-5">
        Multideck Cabinet Solutions We Offer
      </h2>

      <?php
      // ── Configuration Cards Data Array ──
      $configurations = [
        [
          'number' => '01',
          'title'  => 'Open-Front Chilled Multidecks',
          'desc'   => 'Standard chilled retail temperatures for dairy, beverage and deli display.'
        ],
        [
          'number' => '02',
          'title'  => 'Glass-Door Multidecks',
          'desc'   => 'A closed-door design for reduced energy consumption and improved temperature stability.'
        ],
        [
          'number' => '03',
          'title'  => 'Frozen Multideck Cabinets',
          'desc'   => 'A lower temperature range for ice cream and frozen food display.'
        ],
        [
          'number' => '04',
          'title'  => 'Remote / Plug-In Configurations',
          'desc'   => 'Remote condensing units for larger store layouts, or self-contained
  plug-in units for standalone outlets.'
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
    .config-section {
      background:white
    }

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
        Industries Using Truck Refrigeration Units
      </h2>

      <?php
      // ── Industries Data Array ──
      $industries = [
        [
          'icon'  => 'fa fa-shopping-cart',
          'title' => 'Supermarkets & Hypermarkets',
          'desc'  => 'Multi-aisle chilled and frozen display across dairy, beverage, and deli sections.'
        ],
        [
          'icon'  => 'fa fa-shopping-basket',
          'title' => 'Convenience Stores',
          'desc'  => 'A compact display footprint suited to smaller-format retail.'
        ],
        [
          'icon'  => 'fa fa-bolt',
          'title' => 'Quick Commerce Dark Stores',
          'desc'  => 'Display-grade cooling for fast-moving SKUs in micro-fulfilment formats.'
        ],
        [
          'icon'  => 'fa fa-home',
          'title' => 'Standalone Food Retail Outlets',
          'desc'  => 'Bakeries, dairy parlours, and grocery shops that need reliable display cooling.'
        ],
        [
          'icon'  => 'fa fa-glass',
          'title' => 'Beverage & Dairy Retail',
          'desc'  => 'Dedicated chilled display for milk, juices, and packaged beverages.'
        ],
        [
          'icon'  => 'fa fa-snowflake-o',
          'title' => 'Frozen Food & QSR Chains',
          'desc'  => 'Frozen multideck display for ice cream, ready meals, and packaged frozen items.'
        ],
      ];
      ?>

      <div class="row industry-grid">
        <?php foreach ($industries as $industry): ?>
          <div class="col-lg-4 col-md-6">
            <div class="industry-card h-100">
              <i class="<?php echo htmlspecialchars($industry['icon']); ?>
                               industry-icon"></i>
              <h3 class="industry-title">
                <?php echo htmlspecialchars($industry['title']); ?>
              </h3>
              <p class="industry-desc">
                <?php echo htmlspecialchars($industry['desc']); ?>
              </p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <style>
    /* ── INDUSTRIES SECTION ── */
    .industries-section {
      background: #f6f9fc;
    }

    .industry-grid>[class*="col-"] {
      margin-bottom: var(--card-gap);
    }

    .industry-grid>[class*="col-"]:nth-last-child(-n + 3) {
      margin-bottom: 0;
    }

    .industry-card {
      background: #ffffff;
      border: 1px solid #e8e8e8;
      border-radius: 10px;
      padding: 32px 24px;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .industry-card:hover {
      /* background: rgba(255, 255, 255, 0.15); */
      transform: translateY(-4px);
    }

    .industry-icon {
      font-size: 2.5rem;
      color: var(--ink);
      display: block;
      margin-bottom: 16px;
    }

    .industry-title {
      font-size: 1.05rem;
      font-weight: 700;
      color: var(--ink);
      margin-bottom: 10px;
    }

    .industry-desc {
      font-size: 0.92rem;
      color: black;
      line-height: 1.7;
      margin: 0;
    }

    @media (max-width: 991px) {
      .industry-grid>[class*="col-"]:nth-last-child(-n + 3) {
        margin-bottom: var(--card-gap);
      }

      .industry-grid>[class*="col-"]:nth-last-child(-n + 2) {
        margin-bottom: 0;
      }
    }

    @media (max-width: 767px) {
      .industries-section .section-h2 {
        margin-bottom: 24px !important;
      }

      .industry-grid>[class*="col-"],
      .industry-grid>[class*="col-"]:nth-last-child(-n + 2),
      .industry-grid>[class*="col-"]:nth-last-child(-n + 3) {
        margin-bottom: 20px;
      }

      .industry-grid>[class*="col-"]:last-child {
        margin-bottom: 0;
      }

      .industry-card {
        padding: 26px 18px;
      }

      .industry-icon {
        font-size: 2rem;
        margin-bottom: 12px;
      }

      .industry-title {
        font-size: 1rem;
        line-height: 1.35;
      }
    }
  </style>
  <!-- SECTION-5 end -->

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
       Why Retailers Choose Singhania Refrigeration
      </h2>

      <?php
      // ── Why Choose Us Cards Data ──
      $reasons = [
        [
          'icon'  => 'fa fa-trophy',
          'title' => 'Retail-Specific Cabinet Engineering',
          'desc'  => 'Shelving and airflow are engineered for what you are displaying, not for a generic refrigerated box.'
        ],
        [
          'icon'  => 'fa fa-cogs',
          'title' => 'Consistent Temperature Across Every Deck',
          'desc'  => 'Engineered air curtains solve the &ldquo;warm top shelf, cold bottom shelf-problem.'
        ],
        [
          'icon'  => 'fa fa-industry',
          'title' => 'Energy-Conscious Design Options',
          'desc'  => 'Night curtains and glass-door configurations are available when energy
  cost is a priority.'
        ],
        [
          'icon'  => 'fa fa-map-marker',
          'title' => 'Fast Turnaround for Multi-Store Rollouts',
          'desc'  => 'Supermarket chains expanding their outlet count get the same cabinet
  specification at every site, with fast turnaround on repeat orders.'
        ],
        [
          'icon'  => 'fa fa-phone',
          'title' => 'Pan-India AMC for Retail Operators',
          'desc'  => 'Service coverage that keeps cabinets running during trading hours, not just business hours.'
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
          'q' => 'What’s the difference between an open multideck and a glass-door multideck?',
          'a' => 'An open multideck uses an air curtain to hold cold air across the front, so shoppers can pick up products directly — it’s more accessible but uses more energy. A glass-door multideck encloses the display behind glass, which is more efficient at holding temperature and reduces running costs, but sacrifices some of that “grab and go” shopping feel.'
        ],
        [
          'q' => 'How much energy does a multideck cabinet use, and does a night curtain actually help?',
          'a' => 'Running cost depends on the size of the cabinet, the ambient temperature of the store, and how often the air curtain is disturbed by shoppers and restocking. A night curtain seals the open front overnight, greatly reducing the energy lost to mixing between room air and the cold air curtain.'
        ],
        [
          'q' => 'What temperature range do multideck cabinets hold?',
          'a' => 'Chilled multidecks typically maintain standard retail refrigeration temperatures for dairy, beverage, and deli products. Frozen multideck cabinets operate at lower temperatures for ice cream and frozen food display, which require different cabinet and compressor specifications.'
        ],
        [
          'q' => 'Can a multideck cabinet be customized for our store layout?',
          'a' => 'Yes. Shelving height, spacing, and cabinet length can be tailored to your aisle layout and product mix. Remote condensing units are available for larger stores, along with self-contained plug-in units for standalone outlets.'
        ],
        [
          'q' => 'How is temperature kept even across the top, middle, and bottom shelves?',
          'a' => 'Airflow is engineered so cold air is spread evenly across all decks, preventing the top shelf from running warm while the bottom shelves over-cool — a common issue in poorly designed multidecks.'
        ],
        [
          'q' => 'Do you provide AMC support for supermarket chains with multiple stores?',
          'a' => 'Yes. Our nationwide AMC support handles multi-store rollouts so that chains receive a consistent service response at every location, not just their flagship store.'
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
        <h2 class="title3 white-color">Specify Multideck Cabinets for Your Store With Singhania Refrigeration</h2>

        <p class="cta-description">
            Whether you are fitting out one outlet or rolling out a chain-wide store format, our team can configure multideck cabinets around your product
  mix, layout and energy budget.
        </p>

        <div class="btn-part">
          <a class="readon banner-style" href="contact">Request a Quote &rarr;</a>
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
        ['title' => 'Freon Refrigeration Units', 'icon' => 'fa fa-flask', 'url' => 'freon-refrigeration-units.php'],
        ['title' => 'Ripening Systems', 'icon' => 'fa fa-leaf', 'url' => 'ripening-systems.php'],
        ['title' => 'Multideck Cabinet', 'icon' => 'fa fa-th-large', 'url' => 'multideck-cabinet.php'],
        ['title' => 'IQF (Individual Quick Freeze)', 'icon' => 'fa fa-asterisk', 'url' => 'iqf.php'],
        ['title' => 'Doors & CA Doors', 'icon' => 'fa fa-sign-in', 'url' => 'doors-ca-doors.php'],
        ['title' => 'PUF Panels', 'icon' => 'fa fa-columns', 'url' => 'panels.php'],
        ['title' => 'Dock Shelter & Dock Leveler', 'icon' => 'fa fa-building', 'url' => 'dock-shelter-dock-leveler.php'],
        ['title' => 'Heavy Duty Racks', 'icon' => 'fa fa-archive', 'url' => 'heavy-duty-racks.php'],
      ];
      ?>

      <div class="row related-grid">
        <?php foreach ($related_products as $index => $product):
          $isActiveProduct = basename($product['url']) === basename($_SERVER['SCRIPT_NAME'] ?? 'truck-ac.php');
        ?>
          <div class="col-lg-3 col-md-4 col-sm-6" data-animate>
            <a href="<?php echo htmlspecialchars(publicPageUrl($product['url'])); ?>"
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

    <?php include('footer.php'); ?>
    <script>
      (function(){
        const els = document.querySelectorAll('[data-animate]');
        if(!('IntersectionObserver' in window)){
          els.forEach(el=>el.classList.add('active')); return;
        }
        const io = new IntersectionObserver((entries)=>{
          entries.forEach(e=>{ if(e.isIntersecting){ e.target.classList.add('active'); io.unobserve(e.target);} });
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

