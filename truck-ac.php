<!DOCTYPE html>
<html lang="en">

<head>
  <?php
$pageTitle = 'Truck AC Installation in India | Commercial Vehicle AC Systems | Singhania Refrigeration';

$pageDescription = 'Get professional truck AC installation in India with reliable commercial vehicle air conditioning systems for logistics, transport, and fleet operators. Singhania Refrigeration provides expert design, supply, installation, and support for truck cabin AC and transport cooling solutions.';

$pageKeywords = 'truck ac manufacturer, transport refrigeration units, refrigerated truck ac systems, reefer truck refrigeration, cold chain transport solutions, truck ac manufacturer in india';

$canonicalUrl = 'https://singhaniarefrigeration.com/truck-ac-installation-india';

$ogTitle = $pageTitle;

$ogDescription = $pageDescription;

$shareImage = 'https://singhaniarefrigeration.com/assets/images/products/truck-ac.webp';

$shareImageAlt = 'Truck AC installation in India by Singhania Refrigeration';

$twitterTitle = $pageTitle;

$twitterDescription = $pageDescription;
?>
  <?php include('head.php'); ?>
  <style>
    /* ====== TRUCK AC HERO ====== */
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
    /* .intro-section {
      background:white
    } */

    /* .intro-section .section-h2 {
      max-width: 700px;
    } */

    .intro-copy p {
      font-size: clamp(15px, 1.4vw, 17px);
    }

    /* ====== PREMIUM TRANSPORT REFRIGERATION INTRO ====== */
    .truck-intro {
      position: relative;
      overflow: hidden;
      background:
        radial-gradient(circle at 8% 12%, rgba(39, 91, 151, .08), transparent 25%),
        linear-gradient(180deg, #f8fbff 0%, #ffffff 100%) !important;
    }

    .truck-intro::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 34%;
      height: 4px;
      background: linear-gradient(90deg, #0f2442, #e95b25);
    }

    .truck-intro .intro-shell {
      position: relative;
      z-index: 1;
    }

    .truck-intro .intro-frame {
      position: relative;
      padding: clamp(28px, 4vw, 58px);
      border: 1px solid rgba(15, 36, 66, .09);
      border-radius: 28px;
      background: rgba(255, 255, 255, .94);
      box-shadow: 0 28px 80px rgba(15, 36, 66, .10);
    }

    .truck-intro .intro-frame::before {
      content: "";
      position: absolute;
      top: -1px;
      left: 54px;
      width: 92px;
      height: 4px;
      border-radius: 0 0 6px 6px;
      background: #e95b25;
    }

    .truck-intro .intro-row {
      row-gap: 42px;
    }

    .truck-intro .intro-copy {
      position: relative;
      max-width: 760px;
      padding-left: 26px;
    }

    .truck-intro .intro-copy::before {
      content: "";
      position: absolute;
      top: 8px;
      bottom: 8px;
      left: 0;
      width: 3px;
      border-radius: 6px;
      background: linear-gradient(180deg, #e95b25 0%, rgba(233, 91, 37, .08) 100%);
    }

    .truck-intro .intro-copy .lead {
      margin: 0 0 17px;
      color: #34465c;
      font-size: clamp(15px, 1.15vw, 17px);
      font-weight: 500;
      line-height: 1.78;
      text-align: left;
    }

    .truck-intro .intro-copy .lead:last-child {
      margin-bottom: 0;
    }

    .truck-intro .intro-visual {
      position: relative;
      max-width: 500px;
      margin-left: auto;
      padding: 20px 0 22px 20px;
    }

    .truck-intro .intro-visual::before {
      content: "";
      position: absolute;
      inset: 0 22px 22px 0;
      border-radius: 24px 8px 42px 8px;
      background: linear-gradient(145deg, #0f2442, #183e68);
      box-shadow: 0 24px 48px rgba(15, 36, 66, .2);
    }

    .truck-intro .intro-visual::after {
      content: "";
      position: absolute;
      z-index: 2;
      right: 7px;
      bottom: 7px;
      width: 54px;
      height: 54px;
      border-right: 4px solid #e95b25;
      border-bottom: 4px solid #e95b25;
      border-radius: 0 0 18px 0;
    }

    .truck-intro .TruckImg {
      position: relative;
      z-index: 1;
      width: calc(100% - 20px);
      max-width: none;
      margin: 0 0 0 auto;
      padding: 14px;
      border: 1px solid #edf1f6;
      border-radius: 20px 6px 34px 6px;
      background: #fff;
      box-shadow: 0 18px 42px rgba(5, 20, 42, .18);
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

    @media (max-width: 991px) {
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

      .truck-intro .intro-copy .lead {
        font-size: 15px;
        line-height: 1.7;
      }

      .truck-intro .intro-frame {
        padding: 28px 20px 32px;
        border-radius: 20px;
      }

      .truck-intro .intro-frame::before {
        left: 30px;
        width: 72px;
      }

      .truck-intro .intro-copy {
        padding-left: 18px;
      }

      .truck-intro .intro-visual {
        margin: 0 auto;
        padding: 14px 0 16px 14px;
      }
    }

  </style>
  <link rel="stylesheet" href="assets/css/product-pages.css">
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

    <!-- Truck AC Hero -->
    <div class="rs-breadcrumbs bg-7 heroImage">
      <div class="container">
        <div class="content-part">
          <div class="hero-card">
            <!-- <span class="hero-eyebrow">Made for Indian roads</span> -->
            <h1>Truck AC Installation in India</h1>
            <p class="lead" lang="en">
                    We specialize in the design, supply, and installation of truck air conditioning
                  and transport refrigeration systems. These Truck AC systems are tailored to the
                  particular needs of your vehicle, cargo, and route. We operate out of Delhi NCR
                  and provide services throughout India.
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
  <section class="intro-section truck-intro section-padding bg-white" id="what-is-truck-ac">
    <div class="container intro-shell">
      <div class="intro-frame">
        <div class="row intro-row align-items-center">
          <div class="col-lg-7 col-md-7">
            <div class="intro-copy">
              <p class="lead">
                Temperature-sensitive goods such as dairy products, pharmaceuticals, frozen goods,
                meat and seafood depend on just one thing during the entire delivery process: the cold
                chain. The air conditioning in a truck or the Transport Refrigeration Unit (TRU) is
                responsible for maintaining the temperature of the freight container and is unaffected
                by outside temperatures, length of transport or frequency of door opening. The process
                takes place separately from the air conditioning meant for the cabin and is referred to
                as TRU because it works to cool and keep the load space at the right temperature instead
                of making the driver comfortable.
              </p>
              <p class="lead">
                In the transportation industry, cold chain logistics companies as well as dairy truck
                operators and distributors must pay special attention to the installation of a cold
                chain. Singhania Refrigeration helps to develop, provide and install transport
                refrigeration units that are suitable for the type of vehicle, route and the type of
                cargo carried.
              </p>
            </div>
          </div>

          <div class="col-lg-5 col-md-5">
            <div class="intro-visual">
              <img
                class="TruckImg"
                src="assets/images/products/truck-ac.webp"
                alt="Truck's ac boddy"
                loading="lazy"
              />
            </div>
          </div>
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
          'icon'  => 'fa fa-bolt',
          'title' => 'Fast Cooling Performance',
          'desc'  => 'Quickly reach target temperatures and then maintain stable
                            cooling during transport.'
        ],
        [
          'icon'  => 'fa fa-leaf',
          'title' => 'Energy-Efficient Operation',
          'desc'  => 'Optimized refrigeration systems can reduce operating costs
                            and ensure reliable performance.'
        ],
        [
          'icon'  => 'fa fa-thermometer-half',
          'title' => 'Digital Temperature Control',
          'desc'  => 'Monitor and manage cargo temperatures accurately using
                            advanced control systems.'
        ],
        [
          'icon'  => 'fa fa-shield',
          'title' => 'Reliable Cold Chain Protection',
          'desc'  => 'Protect temperature-sensitive products from spoilage and
                            quality degradation during transit.'
        ],
        [
          'icon'  => 'fa fa-truck',
          'title' => 'Custom Vehicle Integration',
          'desc'  => 'Solutions available for light commercial vehicles,
                            medium-duty trucks, and large refrigerated transport fleets.'
        ],
        [
          'icon'  => 'fa fa-wrench',
          'title' => 'Nationwide AMC Support',
          'desc'  => 'Comprehensive maintenance and support services designed
                            to maximize equipment uptime.'
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
  <section class="config-section section-padding bg-white " id="configurations">
    <div class="container">

      <h2 class="section-h2 text-center mb-5">
        Truck Refrigeration Solutions We Offer
      </h2>

      <?php
      // ── Configuration Cards Data Array ──
      $configurations = [
        [
          'number' => '01',
          'title'  => 'Direct Drive Refrigeration Units',
          'desc'   => 'Engine-powered refrigeration systems designed for long-distance
                             transportation and continuous cooling requirements.'
        ],
        [
          'number' => '02',
          'title'  => 'Battery-Powered Refrigeration Units',
          'desc'   => 'Efficient cooling solutions for urban delivery operations,
                             electric vehicles, and last-mile logistics.'
        ],
        [
          'number' => '03',
          'title'  => 'Single Temperature Systems',
          'desc'   => 'Ideal for transporting products that require one consistent
                             temperature throughout the cargo compartment.'
        ],
        [
          'number' => '04',
          'title'  => 'Multi-Temperature Refrigeration Systems',
          'desc'   => 'Designed for mixed-load transportation where different products
                             require different temperature zones.'
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
    /* .config-section {
      background: #f6f9fc;
    } */

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
          'icon'  => 'fa fa-tint',
          'title' => 'Dairy Transportation',
          'desc'  => 'Maintain optimal temperatures for milk, cheese, yogurt,
                            and other dairy products.'
        ],
        [
          'icon'  => 'fa fa-medkit',
          'title' => 'Pharmaceutical Logistics',
          'desc'  => 'Support safe transportation of medicines, vaccines,
                            and healthcare products.'
        ],
        [
          'icon'  => 'fa fa-snowflake-o',
          'title' => 'Frozen Food Transportation',
          'desc'  => 'Reliable refrigeration for frozen foods, ice cream,
                            and processed food products.'
        ],
        [
          'icon'  => 'fa fa-leaf',
          'title' => 'Fruits & Vegetables Distribution',
          'desc'  => 'Reduce spoilage and preserve freshness throughout
                            transportation.'
        ],
        [
          'icon'  => 'fa fa-cutlery',
          'title' => 'Meat & Seafood Logistics',
          'desc'  => 'Maintain food safety standards through precise
                            temperature control.'
        ],
        [
          'icon'  => 'fa fa-motorcycle',
          'title' => 'Quick Commerce Delivery',
          'desc'  => 'Support modern grocery and temperature-controlled
                            last-mile delivery operations.'
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
            Multideck Cabinet Manufacturer in Delhi NCR
          </h2>
          <p>
              Singhania Refrigeration is one of the leading Multideck Cabinet
      manufacturers serving supermarket chains, retail shops, and food
      outlets in Delhi NCR and across India. We develop display cabinets
      that combine product visibility and energy-efficient cooling.
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

    .local-seo-section p {
      color: #2c3e68;
      font-size: clamp(15px, 1.6vw, 17px);
      line-height: 1.75;
      margin: 0 0 16px;
      text-align: justify;
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
          'icon'  => 'fa fa-trophy',
          'title' => 'Industry Expertise',
          'desc'  => 'Extensive experience in transport refrigeration
                            and cold chain infrastructure.'
        ],
        [
          'icon'  => 'fa fa-cogs',
          'title' => 'Customized Solutions',
          'desc'  => 'Refrigeration systems tailored to your vehicle,
                            cargo, and operational requirements.'
        ],
        [
          'icon'  => 'fa fa-industry',
          'title' => 'Quality Manufacturing',
          'desc'  => 'Built using proven refrigeration technologies
                            for reliable performance.'
        ],
        [
          'icon'  => 'fa fa-map-marker',
          'title' => 'Pan India Service Network',
          'desc'  => 'Technical support and maintenance assistance
                            available across India.'
        ],
        [
          'icon'  => 'fa fa-phone',
          'title' => 'AMC & After-Sales Support',
          'desc'  => 'Preventive maintenance programs designed to
                            maximize equipment lifespan and uptime.'
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
       background: #f6f9fc;
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
          'q' => 'What is a Truck AC?',
          'a' => 'A Truck AC is a refrigeration system installed on commercial
                        vehicles to maintain controlled temperatures for cargo during
                        transportation.'
        ],
        [
          'q' => 'Which industries use Truck Refrigeration Units?',
          'a' => 'Dairy, pharmaceuticals, frozen food, agriculture, meat processing,
                        seafood logistics, and cold chain transportation.'
        ],
        [
          'q' => 'What temperature range can truck refrigeration units maintain?',
          'a' => 'The exact range depends on the refrigeration system and cargo
                        requirements. Solutions are available for chilled and frozen
                        transportation applications.'
        ],
        [
          'q' => 'Do you provide maintenance services?',
          'a' => 'Yes. We offer AMC programs, preventive maintenance, and
                        after-sales support.'
        ],
        [
          'q' => 'How much does a Truck AC unit cost?',
          'a' => 'Pricing varies based on vehicle size, cooling capacity, temperature
                        requirements, and system configuration.'
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
    /* .faq-section {
      background: #f6f9fc;
    } */

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
  <!-- Section-9 -->

  <div class="rs-cta bg21 pt-90 pb-100 md-pt-68 md-pb-80">
    <div class="container">
      <div class="sec-title text-center truck-body-cta">
        <span class="sub-title modify white">Get Started</span>
        <h2 class="title3 white-color">Talk to Us About Your Fleet&rsquo;s Refrigeration Needs</h2>

        <p class="cta-description">
           Whether you&rsquo;re fitting out one vehicle or a multi-truck fleet, our team can
          recommend a transport refrigeration configuration suited to your cargo, your
          routes, and your budget.
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
  <section class="related-section section-padding"id="related-products" style=" background: #f6f9fc;">
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
  <!-- section 10 end -->
  <?php include('footer.php'); ?>

  <!-- Tiny reveal-on-scroll (no external deps) -->
  <script>
    (function() {
      const els = document.querySelectorAll('[data-animate]');
      if (!('IntersectionObserver' in window)) {
        els.forEach(el => el.classList.add('active'));
        return;
      }
      const io = new IntersectionObserver((entries) => {
        entries.forEach(e => {
          if (e.isIntersecting) {
            e.target.classList.add('active');
            io.unobserve(e.target);
          }
        });
      }, {
        threshold: .18
      });
      els.forEach(el => io.observe(el));
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
