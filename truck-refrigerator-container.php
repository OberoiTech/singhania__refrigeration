<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    $pageTitle = 'Refrigerated Truck Body & Container Manufacturer in India | Singhania Refrigeration';
    $pageDescription = 'Singhania Refrigeration — Refrigerated Truck Body & Reefer Container manufacturer in India. PUF insulated, temperature-controlled truck bodies for dairy, pharma, frozen food & cold chain transport. Delhi NCR based. Call +91 99710 60822.';

  ?>
  <?php include('head.php'); ?>
  <style>
    /*Main content */
    .rs-breadcrumbs.bg-7 {
      position: relative;
      background-image: url("assets/images/products/truck_refrigeration_singhania.webp");
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
      background:white
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
    <div class="rs-breadcrumbs bg-7 heroImage">
      <div class="container">
        <div class="content-part">
          <div class="hero-card">
            <h1>Refrigerated Truck Body Manufacturer in India</h1>
            <p class="lead" lang="en">
                Singhania Refrigeration is one of the reputed Refrigerated Truck Body Manufacturer in
                India manufacturing insulated cargo bodies and reefer containers for companies that
                ship temperature sensitive products. High-density PUF insulation is used in the
                construction of our refrigerated truck containers to maintain consistent temperatures
                and safeguard dairy, medications, frozen food, fruits, vegetables, and seafood
                throughout transportation.
            </p>
             <p class="lead" lang="en">Our truck bodies are designed for Indian roads and Indian climates and are therefore
                built to last, with leak-proof insulation and a long service life during normal fleet
                usage.</p>
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

  <!-- ===== WHAT IS A REFRIGERATED TRUCK BODY ===== -->
  <section class="intro-section section-padding">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7 col-md-7">
          <div class="intro-copy">
            <!--  <span class="section-eyebrow">Overview</span> -->
            <h2 class="section-h2">What is a Refrigerated Truck Body?</h2>

            <p class="lead">
              A refrigerated truck body (reefer truck body or cold chain transport vehicle body)
              is an insulated cargo enclosure mounted on a commercial vehicle chassis, that holds
              commodities at a regulated temperature during transport.
            </p>
            <p class="lead">
              Unlike a regular truck body, a refrigerated truck body is constructed with
              insulated PUF (polyurethane foam) panels that prevent heat transfer and a sealed
              structure that holds cold air after a refrigeration unit cools the cargo space.
            </p>
            <p class="lead">
              Refrigerated truck bodies and reefer containers are widely used in dairy
              distribution, pharmaceutical logistics, frozen food transportation, fruit and
              vegetable distribution, and meat and seafood delivery.
              They support <a href="index.php">end-to-end cold chain solutions</a> from loading to delivery.
            </p>
          </div>
        </div>

        <div class="col-lg-5 col-md-5">
          <img
            class="TruckImg"
            src="assets/images/products/truck_refrigeration_singhania.webp"
            alt="Refrigerated truck body manufactured by Singhania Refrigeration"
            loading="lazy"
          />
        </div>
      </div>
    </div>
  </section>
  <!-- ===== END DEFINITION SECTION ===== -->


  <!-- SECTION 3 -->
  <section class="features-section section-padding" id="key-features">
    <div class="container">
      <h2 class="section-h2 text-center mb-5">
        Key Features of Our Refrigerated Truck Bodies
      </h2>
      <div class="features-grid">
        <div class="features-card">
          <img src="assets/images/products/truck-1.jpeg" alt="Heavy-duty insulated exterior of refrigerated truck body" />
          <h5>Heavy-Duty Insulated Exterior</h5>
          <p>Tighter insulating panels keep heat out and help the cargo space maintain temperature for longer.</p>
        </div>

        <div class="features-card">
          <img src="assets/images/products/truck-2.jpeg" alt="PUF insulated hygienic interior of truck body" />
          <h5>PUF insulated hygienic interior</h5>
          <p>Reinforced joints and sealing protect the cargo and insulation from moisture and outside air.</p>
        </div>

        <div class="features-card">
          <img src="assets/images/products/truck-3.jpeg" alt="Optimized airflow and structure inside refrigerated truck body" />
          <h5>Optimized Airflow & Structure</h5>
          <p>Designed for daily loading, rough roads and long-term use without losing structural strength.</p>
        </div>

        <div class="features-card">
          <img src="assets/images/products/truck-4.jpeg" alt="Custom-sized refrigerated truck body" />
          <h5>Advanced cooling distribution</h5>
          <p>Body dimensions can be customized for your vehicle, cargo volume and operating requirements.</p>
        </div>

        <div class="features-card">
          <img src="assets/images/products/truck-5.jpeg" alt="Freezer and chiller refrigerated truck configuration" />
          <h5>Carrier Refrigeration Unit</h5>
          <p>Choose temperature configurations suited to frozen, chilled or multi-temperature cargo movement.</p>
        </div>

        <div class="features-card">
          <img src="assets/images/products/truck-ac-re.jpeg" alt="Nationwide refrigerated truck maintenance support" />
          <h5>Reliable Cold Chain Transportation</h5>
          <p>Dependable maintenance support helps protect uptime and cooling performance across your fleet.</p>
        </div>
      </div>

    </div>
  </section>

  <!--SECTION  END  -->

  <!-- SECTION 4 START -->
  <section class="config-section section-padding " id="configurations">
    <div class="container">

      <h2 class="section-h2 text-center mb-5">
        Refrigerated Truck Body Solutions We Offer
      </h2>

      <?php
      // ── Configuration Cards Data Array ──
      $configurations = [
        [
          'number' => '01',
          'title'  => 'PUF Insulated Truck Bodies',
          'desc'   => 'Integrated body structure high-density polyurethane foam panels for consistent
                       thermal performance.'
        ],
        [
          'number' => '02',
          'title'  => 'Reefer Truck Containers',
          'desc'   => 'Self-contained insulated containers suitable for swappable or inter-modal cold chain
                       transport requirements.'
        ],
        [
          'number' => '03',
          'title'  => 'Freezer Truck Bodies',
          'desc'   => 'Heavier insulation and sealing designed for sub-zero, deep-freeze cargo requirements.'
        ],
        [
          'number' => '04',
          'title'  => 'Temperature-Controlled Truck Bodies',
          'desc'   => 'Configured for chilled, mid-range temperature cargo such as dairy, produce, and
                        fresh food.'
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

  <!-- section-6 start -->

  <section class="local-seo-section section-padding " id="local-seo">
    <div class="container">
      <div class="row align-items-center local-seo-grid">

        <div class="col-lg-6 local-seo-content">
         
          <h2 class="section-h2">
            Refrigerated Truck Body Manufacturer in Delhi NCR
          </h2>
          <p class="lead">
            A reputable manufacturer of refrigerated truck bodies, Singhania Refrigeration
            serves companies in Delhi NCR and beyond India. For logistics firms, fleet managers,
            food distributors, pharmaceutical suppliers, and cold chain service providers, we
            construct PUF insulated truck bodies and reefer containers.
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
      background: #ffffff;
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
  <section class="faq-section section-padding" id="faq">
    <div class="container">

      <h2 class="section-h2 text-center mb-5">
        Frequently Asked Questions
      </h2>

      <?php
      
      $faqs = [
        [
          'q' => 'What is a refrigerated truck body?',
          'a' => 'A refrigerated truck body is an insulated cargo compartment mounted on a
                  commercial vehicle to maintain a controlled temperature for cargo during
                  transportation.'
        ],
        [
          'q' => 'What is the difference between a refrigerated truck body and a reefer container?',
          'a' => 'The vehicle chassis has a refrigerated truck body attached. A reefer container
                  is a free standing insulated container that can be moved from one vehicle or mode
                  of transport to another.'
        ],
        [
          'q' => 'What industries use refrigerated truck bodies?',
          'a' => 'Dairy, pharmaceuticals, frozen food, agriculture, meat processing, seafood
                  logistics, and cold chain transportation.'
        ],
        [
          'q' => 'Do you provide maintenance services?',
          'a' => 'Yes. We offer AMC programs, preventive maintenance, and
                        after-sales support.'
        ],
        [
          'q' => 'How much does a refrigerated truck body cost?',
          'a' => 'Pricing varies based on vehicle size, insulation thickness, body configuration,
                  and cargo temperature requirements.'
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
    .faq-section {
      background: #f6f9fc;
    }

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
        <h2 class="title3 white-color">Get a Customized Refrigerated Truck Body Solution</h2>

        <p class="cta-description">
          Whether you operate a single refrigerated vehicle or a large transportation fleet,
          Singhania Refrigeration can help you find the right truck body solution for your business.
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
  <section class="related-section section-padding bg-white" id="related-products">
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
