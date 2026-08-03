<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      $pageTitle = 'Cold Chain Transport Management Solutions India | Singhania Refrigeration';
      $pageDescription = 'Singhania Refrigeration\'s transport management solution tracks reefer vehicles, in-transit temperature, route sequencing and delivery proof across your cold chain dispatch network. One system. Full visibility. Request a free demo.';
      $pageKeywords = 'cold chain transport management solution, reefer fleet tracking, in-transit temperature monitoring, TMS WMS integration cold chain, cold chain transport management India';
      $ogDescription = 'Singhania Refrigeration\'s transport management solution tracks reefer vehicles, in-transit temperature, route sequencing and delivery proof across your cold chain dispatch network. One system. Full visibility.';

      $transportFaqs = [
        [
          'question' => 'What is a cold chain transport management solution?',
          'answer' => 'A system of sensors, software and process design that monitors every reefer vehicle, route and delivery &mdash; from the moment a vehicle leaves the dock to delivery confirmation &mdash; covering in-transit temperature, location, multi-drop sequencing and proof of delivery.'
        ],
        [
          'question' => 'What does transport management track, exactly?',
          'answer' => 'Temperature and humidity in transit, vehicle location, route and drop sequence, delivery confirmation and any exceptions or rejections, with fleet and vendor performance monitored over time.'
        ],
        [
          'question' => 'Does transport management cover third-party transporters, or only owned fleet?',
          'answer' => 'Both. Sensors and tracking can be installed on owned reefer vehicles or extended to third-party carriers, so performance and temperature compliance are tracked consistently regardless of who is driving the vehicle.'
        ],
        [
          'question' => 'How are in-transit temperature excursions detected?',
          'answer' => 'Sensor readings inside the reefer unit are continuously compared against the safe range for the product being shipped, and any excursion triggers a real-time alert to dispatch rather than being discovered on arrival.'
        ],
        [
          'question' => 'Can transport management be added to an existing fleet, or only new vehicles?',
          'answer' => 'It can be added to an existing fleet. We evaluate your existing fleet, routes and dispatch process, then determine sensor placement and system configuration based on what you already have in place.'
        ],
        [
          'question' => 'What is the typical rollout timeline for adding transport management to an existing fleet?',
          'answer' => 'Timelines vary based on fleet size, number of routes and access to each vehicle for sensor installation. The rollout schedule is defined following the initial fleet assessment, with a parallel run before full cutover to ensure no disruption to deliveries.'
        ],
        [
          'question' => 'Does this integrate with our existing warehouse management system?',
          'answer' => 'Yes. Transport management is designed to link up with Warehouse Management System (WMS) touchpoints so the stock and despatch record remains intact from storage to delivery.'
        ],
        [
          'question' => 'Does this help with compliance audits?',
          'answer' => 'Yes. In-transit temperature history, route data and delivery records are logged continuously, so audit and customer compliance checks are based on existing records rather than being reconstructed after the fact.'
        ],
        [
          'question' => 'Do you provide this as a standalone service, or only as part of a full cold chain project?',
          'answer' => 'We can provide transport management as part of our End-to-End Integrated Cold Chain Solution, or as a stand-alone add-on to an existing fleet &mdash; just tell us about your current set-up and we\'ll scope accordingly.'
        ],
      ];

      $transportServiceSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => 'End-to-End Cold Chain Transport Management Solutions',
        'description' => 'Singhania Refrigeration\'s transport management solution tracks reefer vehicles, in-transit temperature, route sequencing and delivery proof across your cold chain dispatch network.',
        'provider' => [
          '@type' => 'Organization',
          'name' => 'Singhania Refrigeration',
          'url' => 'https://singhaniarefrigeration.com/'
        ],
        'areaServed' => 'IN',
        'serviceType' => 'Cold Chain Transport Management',
        'hasOfferCatalog' => [
          '@type' => 'OfferCatalog',
          'name' => 'Transport Management Services',
          'itemListElement' => [
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Reefer Vehicle & Route Assignment']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Loading Sequence Against Dispatch Priority']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'In-Transit Temperature & Location Tracking']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Multi-Drop Delivery Sequencing']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Proof of Delivery & Exception Capture']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'TMS-WMS Integration']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Fleet & Vendor Performance Reporting']],
          ]
        ]
      ];

      $transportFaqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array_map(function ($faq) {
          return [
            '@type' => 'Question',
            'name' => $faq['question'],
            'acceptedAnswer' => [
              '@type' => 'Answer',
              'text' => html_entity_decode($faq['answer'], ENT_QUOTES, 'UTF-8')
            ]
          ];
        }, $transportFaqs)
      ];

      $transportBreadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
          ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => 'https://singhaniarefrigeration.com/'],
          ['@type' => 'ListItem', 'position' => 2, 'name' => 'End-to-End Cold Chain Transport Management', 'item' => 'https://singhaniarefrigeration.com/transport-management.php']
        ]
      ];
    ?>
    <?php include('head.php'); ?>
    <script type="application/ld+json">
<?php echo json_encode($transportServiceSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
    </script>
    <script type="application/ld+json">
<?php echo json_encode($transportFaqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
    </script>
    <script type="application/ld+json">
<?php echo json_encode($transportBreadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
    </script>
    <style>
      :root {
        --tm-ink: #0f2442;
        --tm-muted: #5f6f89;
        --tm-soft: #f6f9fc;
        --tm-card: #ffffff;
        --tm-line: #e3ebf5;
        --tm-accent: #001b68;
        --tm-deep: #061a3a;
      }

      .rs-breadcrumbs.bg-7 {
        position: relative;
        min-height: 560px;
        display: flex;
        align-items: center;
        background-image: url("assets/images/products/transport-management.png");
        background-size: cover;
        background-position: center;
        overflow: hidden;
        isolation: isolate;
      }

      .rs-breadcrumbs.bg-7::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg,
          rgba(5, 18, 38, .97) 0%,
          rgba(7, 28, 57, .9) 38%,
          rgba(7, 25, 49, .68) 68%,
          rgba(5, 15, 30, .24) 100%);
        pointer-events: none;
        z-index: -1;
      }

      .rs-breadcrumbs.bg-7::after {
        content: "";
        position: absolute;
        inset: 0;
        background:
          linear-gradient(180deg, rgba(3, 12, 25, .08), rgba(3, 12, 25, .42)),
          radial-gradient(circle at 78% 45%, rgba(0, 27, 104, .22), transparent 25%);
        pointer-events: none;
        z-index: -1;
      }

      .rs-breadcrumbs .container { position: relative; z-index: 1; }
      .rs-breadcrumbs .content-part { padding: 110px 0 130px; }

      .hero-content {
        max-width: 820px;
        color: #fff;
      }

      .eyebrow,
      .section-kicker {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--tm-accent);
        font-size: 12px;
        font-weight: 900;
        letter-spacing: .16em;
        text-transform: uppercase;
      }

      .hero-content .eyebrow { color: #dbe7ff; margin-bottom: 14px; }

      .hero-content h1 {
        margin: 0 0 18px;
        color: #fff;
        font-size: clamp(34px, 5vw, 58px);
        line-height: 1.04;
        font-weight: 900;
      }

      .hero-content p {
        max-width: 760px;
        margin: 0;
        color: #e5edff;
        font-size: clamp(16px, 1.7vw, 19px);
        line-height: 1.75;
      }

      .hero-points,
      .hero-actions,
      .cta-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
      }

      .hero-points { margin-top: 20px; }

      .hero-point {
        color: #eef4ff;
        background: rgba(255, 255, 255, .10);
        border: 1px solid rgba(255, 255, 255, .14);
        border-radius: 999px;
        padding: 8px 12px;
        font-size: 13px;
        font-weight: 700;
      }

      .hero-actions,
      .cta-actions { margin-top: 28px; }

      .btn-brand {
        display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 48px;
    padding: 13px 20px;
    border-radius: 8px;
    font-weight: 800;
    border: 1px solid rgba(255, 255, 255, .34);
    color: #fff;
    background: rgba(255, 255, 255, .10);
      }

      .btn-brand:hover {
        transform: translateY(-1px);
        background: rgba(255, 255, 255, .2);
        color: #fff;
        box-shadow: 0 18px 36px rgba(0, 27, 104, .34);
      }

      /* .  {
        background: rgba(255, 255, 255, .12);
        border-color: rgba(255, 255, 255, .32);
        box-shadow: none;
      } */

      /* . :hover { background: rgba(255, 255, 255, .2); } */

      .section-padding { padding: 76px 0; }
      .bg-soft { background: var(--tm-soft); }

      .section-h2 {
        margin: 8px 0 18px;
        color: var(--tm-ink);
        font-size: clamp(26px, 3vw, 38px);
        line-height: 1.18;
        font-weight: 900;
      }

      .faq-title {
        text-align: center;
      }

      .lead-text,
      .main-content p,
      .main-content li {
        color: #314467;
        font-size: 16px;
        line-height: 1.78;
      }

      .lead-text,
      .main-content p {
        text-align: justify;
        text-justify: inter-word;
        text-align-last: left;
      }

      .feature-media {
        position: relative;
        overflow: hidden;
        height: 100%;
        min-height: 360px;
        border-radius: 8px;
        background: #eef3fb;
        box-shadow: 0 22px 54px rgba(16, 28, 52, .16);
      }

      .feature-media img {
        width: 100%;
        height: 100%;
        min-height: 360px;
        display: block;
        object-fit: cover;
        transition: transform .6s ease;
      }

      .feature-media:hover img { transform: scale(1.03); }

      .callout-box,
      .feature-card,
      .trust-card {
        height: 100%;
        border: 1px solid var(--tm-line);
        border-radius: 8px;
        background: var(--tm-card);
        box-shadow: 0 12px 32px rgba(16, 28, 52, .07);
      }

      .callout-box {
        margin-top: 24px;
        padding: 22px 24px;
        border-left: 4px solid var(--tm-accent);
        background: #f2f5ff;
        color: #1e293b;
        font-weight: 700;
        line-height: 1.7;
      }

      .feature-card,
      .trust-card {
        position: relative;
        overflow: hidden;
        padding: 25px 24px;
        transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease, background .25s ease;
      }

      .feature-card::before,
      .trust-card::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 4px;
        background: #001b68;
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .25s ease;
      }

      .feature-card:hover,
      .trust-card:hover {
        transform: translateY(-7px);
        border-color: rgba(0, 27, 104, .42);
        background: linear-gradient(180deg, #ffffff 0%, #f7f9ff 100%);
        box-shadow: 0 22px 48px rgba(0, 27, 104, .16);
      }

      .feature-card:hover::before,
      .trust-card:hover::before {
        transform: scaleX(1);
      }

      .feature-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        margin-bottom: 16px;
        border-radius: 50%;
        background: #eaf0fb;
        color: var(--qm-brand);
        font-weight: 900;
        transition: background .25s ease, color .25s ease, transform .25s ease;
      }

      .feature-card:hover .feature-number {
        background: #001b68;
        color: #ffffff;
        transform: scale(1.08);
      }

      .feature-card h3,
      .trust-card h3 {
        margin: 0 0 10px;
        color: var(--qm-ink);
        font-size: 20px;
        line-height: 1.35;
        font-weight: 900;
      }

      .feature-card p,
      .trust-card p {
        margin: 0;
        color: #52627a;
        line-height: 1.75;
      }

      .coverage-list {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
        margin-top: 30px;
      }

      .industry-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
        margin-top: 30px;
      }

      .trust-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
        margin-top: 30px;
      }

      .benefit-list {
        display: grid;
        gap: 14px;
        margin: 26px 0 0;
        padding: 0;
        list-style: none;
      }

      .benefit-list li {
        position: relative;
        padding: 18px 20px 18px 52px;
        border: 1px solid var(--tm-line);
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 10px 26px rgba(16, 28, 52, .06);
      }

      .benefit-list li::before {
        content: "";
        position: absolute;
        left: 20px;
        top: 24px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: var(--tm-accent);
        box-shadow: inset 0 0 0 4px #dce6ff;
      }

      .process-table-wrap {
        margin: 30px 0 10px;
        overflow-x: auto;
        border: 1px solid var(--tm-line);
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 16px 36px rgba(16, 28, 52, .08);
      }

      .process-table {
        width: 100%;
        min-width: 760px;
        border-collapse: separate;
        border-spacing: 0;
      }

      .process-table th,
      .process-table td {
        padding: 16px 18px;
        border-bottom: 1px solid var(--tm-line);
        vertical-align: top;
        text-align: left;
        line-height: 1.55;
        transition: background .22s ease, color .22s ease, box-shadow .22s ease;
      }

      .process-table th {
        background: #001b68;
        color: #fff;
        font-weight: 900;
        border-bottom-color: #001b68;
      }

      .process-table th:first-child { border-top-left-radius: 8px; }
      .process-table th:last-child { border-top-right-radius: 8px; }
      .process-table td { color: #405070; background: #fff; }
      .process-table tr:last-child td { border-bottom: 0; }
      .process-table tbody tr:hover td { background: #f8fbff; }
      .process-table td:first-child { width: 90px; color: #001b68; font-weight: 900; background: #f7f9ff; text-align: center; }
      .process-table td:nth-child(2) { width: 250px; color: var(--tm-ink); font-weight: 800; }
      .process-table td + td,
      .process-table th + th { border-left: 1px solid var(--tm-line); }

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
        color: var(--tm-ink);
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
        color: var(--tm-ink);
        font-size: 20px;
        line-height: 28px;
        text-align: center;
        transform: translateY(-50%);
        transition: background .2s ease, color .2s ease;
      }

      .faq-accordion-item .accordion-button:not(.collapsed) {
        color: var(--tm-ink);
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

      .cta-section {
        position: relative;
        background: linear-gradient(135deg, var(--tm-deep), var(--tm-accent));
        color: #fff;
        overflow: hidden;
      }

      .cta-section::before {
        content: "";
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 80% 20%, rgba(255, 255, 255, .16), transparent 24%);
        pointer-events: none;
      }

      .cta-box {
        position: relative;
        max-width: 900px;
      }

      .cta-box h2 {
        margin: 0 0 14px;
        color: #fff;
        font-size: clamp(28px, 3.5vw, 42px);
        font-weight: 900;
      }

      .cta-box p {
        max-width: 780px;
        color: #edf4ff;
        font-size: 17px;
      }

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
        text-align: center !important;
        text-align-last: center !important;
        width: 100%;
      }

      .truck-body-cta .cta-phone-numbers a {
        color: #fff;
      }

      .truck-body-cta .cta-phone-numbers a:hover {
        text-decoration: underline;
      }

      [data-animate] {
        opacity: 0;
        transform: translateY(22px);
        transition: opacity .7s ease, transform .7s ease;
      }

      [data-animate].active {
        opacity: 1;
        transform: none;
      }

      @media (max-width: 991px) {
        .rs-breadcrumbs .content-part { padding: 96px 0 86px; }
        .section-padding { padding: 62px 0; }
        .hero-content h1 { font-size: 38px; }
        .coverage-list,
        .industry-grid,
        .trust-grid { grid-template-columns: 1fr; }
        .feature-media { min-height: 300px; margin-top: 30px; }
        .feature-media img { min-height: 300px; }
      }

      @media (max-width: 575px) {
        .hero-actions,
        .cta-actions { flex-direction: column; }
        .btn-brand { width: 100%; }
        .hero-content h1 { font-size: 32px; }
        .benefit-list li { padding-left: 46px; }
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
  </head>

  <body>
    <?php include('header.php'); ?>

    <div class="main-content">

      <!-- ===== HERO / H1 SECTION ===== -->
      <div class="rs-breadcrumbs bg-7">
        <div class="container">
          <div class="content-part">
            <div class="hero-content" data-animate>
              <span class="eyebrow">Solutions</span>
              <h1>End-to-End Cold Chain Transport Management Solutions in India</h1>
              <p style="color: #e6ecff;">
                Singhania Refrigeration controls your transport operations from the moment a reefer truck leaves the dock to the moment the final drop is verified, all in one integrated system. As your cold chain transport management partner, we manage reefer fleet tracking, in-transit temperature monitoring, route and dispatch sequencing and end-to-end delivery documentation. You get a fully visible, audit-ready distribution network instead of a fleet of vehicles that can only be tracked by phone call.
              </p>
              <div class="hero-actions">
                <a href="contact" class="btn-brand">Request a Demo</a>
                <a href="tel:+919971060822" class="btn-brand"> Call Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ===== END HERO ===== -->

      <!-- ===== WHAT IS A COLD CHAIN TRANSPORT MANAGEMENT SOLUTION ===== -->
      <section id="what-is-transport-management" class="section-padding bg-soft">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-7" data-animate>
              <span class="section-kicker">Definition</span>
              <h2 class="section-h2">What Is a Cold Chain Transport Management Solution?</h2>
              <p class="lead-text">
                A cold chain transport management solution is a complete, system-based method of operating refrigerated transport operations from a <a href="/">cold chain solutions provider in Delhi NCR</a>. Singhania Refrigeration owns every step of the transport leg: vehicle and route assignment, loading order as per dispatch priority, in-transit temperature and location monitoring, multi-drop delivery sequencing, proof-of-delivery capture and reporting back into your Warehouse Management System (WMS).
              </p>
              <p>
                You don't coordinate dispatch through phone calls, track reefer units through driver check-ins, and find out about a temperature excursion only when a customer complains; you run on one system, one transport record and one point of accountability for everything between the dock and the delivery point.
              </p>
              <p>
                This delivery model is also called a Transport Management System (TMS) for cold chain, and is sometimes referred to as reefer fleet monitoring, cold chain logistics tracking, or in-transit temperature management. The terminology varies by operation, but the model stays the same: one system responsible for everything from dispatch to confirmation of delivery.
              </p>
            </div>
            <div class="col-lg-5" data-animate>
              <div class="feature-media">
                <img src="assets/images/products/transport-management.png" alt="Refrigerated transport vehicle for cold chain delivery tracking" width="900" height="650" loading="lazy" decoding="async">
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== END WHAT IS SECTION ===== -->

      <!-- ===== WHAT OUR SOLUTION COVERS ===== -->
      <section id="solution-coverage" class="section-padding">
        <div class="container">
          <div data-animate>
            <span class="section-kicker">Coverage</span>
            <h2 class="section-h2">What Our Transport Management Solution Covers</h2>
            <p class="lead-text">
              Singhania Refrigeration's end-to-end transport management covers the entire distribution chain from the loading dock to delivery confirmation on a single platform. Whether you have your own reefer fleet or use third-party transporters, the scope and accountability is the same.
            </p>
          </div>

          <div class="coverage-list">
            <div class="feature-card" data-animate>
              <h3>1. Reefer Vehicle &amp; Route Assignment</h3>
              <p>Rather than being determined at the dock on the day, outbound loads are planned ahead of loading and allocated to the correct reefer vehicle and route according to capacity, temperature zone and delivery sequence.</p>
            </div>
            <div class="feature-card" data-animate>
              <h3>2. Loading Sequence Against Dispatch Priority</h3>
              <p>Vehicles are loaded based on the order stock needs to leave, taking directly from the batch and rotation information in your warehouse management system so the load plan accurately reflects what needs to move out first.</p>
            </div>
            <div class="feature-card" data-animate>
              <h3>3. In-Transit Temperature &amp; Location Tracking</h3>
              <p>Temperature, humidity and location of reefer units are monitored constantly during transit, with excursions flagged in real time &mdash; rather than only being discovered when the vehicle arrives or the customer complains.</p>
            </div>
            <div class="feature-card" data-animate>
              <h3>4. Multi-Drop Delivery Sequencing</h3>
              <p>Routes with multiple drop points are sequenced for drop order and timing, so vehicles aren't backtracking across the city and shorter-shelf-life stock reaches its drop point earlier in the run.</p>
            </div>
            <div class="feature-card" data-animate>
              <h3>5. Proof of Delivery &amp; Exception Capture</h3>
              <p>Delivery confirmation, temperature at drop-off and any discrepancies or rejections are captured at the point of delivery rather than being reconstructed from driver memory when the vehicle returns.</p>
            </div>
            <div class="feature-card" data-animate>
              <h3>6. TMS-WMS Integration</h3>
              <p>Transport data is linked back to touchpoints in the Warehouse Management System (WMS), so the stock record that begins at receiving continues all the way through to delivery rather than starting again as a vehicle departs the dock.</p>
            </div>
            <div class="feature-card" data-animate>
              <h3>7. Fleet &amp; Vendor Performance Reporting</h3>
              <p>Vehicle utilization, on-time delivery rates, temperature compliance and vendor performance are tracked over time, giving operations a basis to manage your own fleet or hold third-party transporters accountable with data, not impressions.</p>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== END SOLUTION COVERAGE ===== -->

      <!-- ===== INDUSTRIES & SEGMENTS WE SERVE ===== -->
      <section id="industries-served" class="section-padding bg-soft">
        <div class="container">
          <div data-animate>
            <span class="section-kicker">Industries</span>
            <h2 class="section-h2">Industries &amp; Segments We Serve</h2>
            <p class="lead-text">
              Our transport management solutions support clients across temperature-sensitive distribution networks &mdash; wherever in-transit visibility and delivery reliability matter:
            </p>
          </div>

          <div class="industry-grid">
            <div class="feature-card" data-animate><h3>Food &amp; Beverage</h3><p>Multi-drop distribution of dairy, frozen foods, fruits, vegetables and ready-to-eat products through retail and HoReCa networks.</p></div>
            <div class="feature-card" data-animate><h3>Pharmaceuticals</h3><p>In-transit temperature monitoring for medicines, vaccines and temperature-sensitive APIs across distribution routes, aligned to GDP requirements.</p></div>
            <div class="feature-card" data-animate><h3>Seafood &amp; Meat</h3><p>Continuous cold chain monitoring of frozen seafood and poultry from processing plants to distribution centres.</p></div>
            <div class="feature-card" data-animate><h3>Horticulture &amp; Agri</h3><p>Route sequencing and transit monitoring of fruit and vegetable consignments from farm-gate and CA stores to mandis and exporters.</p></div>
            <div class="feature-card" data-animate><h3>Logistics &amp; 3PL</h3><p>Fleet and vendor performance monitoring in multi-client, multi-temperature refrigerated distribution networks.</p></div>
            <div class="feature-card" data-animate><h3>Retail &amp; FMCG</h3><p>Multi-drop, scheduled delivery tracking to supermarket and retail chain back-of-store cold rooms.</p></div>
          </div>
        </div>
      </section>
      <!-- ===== END INDUSTRIES SERVED ===== -->

      <!-- ===== BENEFITS SECTION ===== -->
      <section id="benefits" class="section-padding">
        <div class="container">
          <div data-animate>
            <span class="section-kicker">Benefits</span>
            <h2 class="section-h2">Why Choose Transport Management Over Phone-Call Dispatch Tracking?</h2>
            <p class="lead-text">With Singhania Refrigeration's transport management solution, you get:</p>
          </div>
          <ul class="benefit-list">
            <li data-animate><strong>Real-Time Visibility</strong> &mdash; Dispatch, QA and operations teams can see vehicle movement, temperature condition and delivery status without waiting for driver updates.</li>
            <li data-animate><strong>Faster, Tighter Routes</strong> &mdash; Route and drop sequencing reduces backtracking, avoidable delays and wasted reefer runtime across daily distribution rounds.</li>
            <li data-animate><strong>Lower Product Risk</strong> &mdash; In-transit excursions are flagged while the product is still moving, so corrective action can happen before a delivery turns into a complaint or rejection.</li>
            <li data-animate><strong>Better Fleet &amp; Vendor Accountability</strong> &mdash; Delivery and temperature compliance are tracked over time, so fleet teams and third-party transporters are measured on actual performance.</li>
            <li data-animate><strong>Audit-Ready Delivery Records</strong> &mdash; Temperature history, route data, delivery confirmation and exceptions stay documented for customer review, QA and compliance audits.</li>
          </ul>
        </div>
      </section>
      <!-- ===== END BENEFITS SECTION ===== -->

      <!-- ===== ROLLOUT PROCESS ===== -->
      <section id="rollout-process" class="section-padding bg-soft">
        <div class="container">
          <div data-animate>
            <span class="section-kicker">Process</span>
            <h2 class="section-h2">Our 5-Stage Transport Management Rollout Process</h2>
            <p class="lead-text">
              Every Singhania Refrigeration transport management rollout follows a practical implementation process that begins with your existing fleet, routes and dispatch workflow.
            </p>
          </div>
          <div class="process-table-wrap" data-animate>
            <table class="process-table">
              <thead>
                <tr>
                  <th>Stage</th>
                  <th>Phase</th>
                  <th>What Happens</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Assessment &amp; Route Mapping</td>
                  <td>Fleet and route review, audit of current dispatch process, reefer vehicle and sensor compatibility check, delivery network mapping</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>System Design &amp; Configuration</td>
                  <td>Configured temperature thresholds, route templates, alert rules and reporting formats for your product range and delivery network</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Sensor Installation &amp; Integration</td>
                  <td>In-transit temperature and location sensors fitted on reefer vehicles; transport management connected to WMS touchpoints and existing dispatch tools</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Go-Live, Training &amp; Validation</td>
                  <td>Trained dispatch and driver teams on the system; run in parallel with existing dispatch tracking to validate alerts and reporting prior to full cutover</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Ongoing Support &amp; Optimization</td>
                  <td>Ongoing system maintenance, route and threshold modifications as your delivery network evolves, and reporting assistance post go-live</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>
      <!-- ===== END ROLLOUT PROCESS ===== -->

      <!-- ===== WHY CHOOSE SINGHANIA ===== -->
      <section id="why-singhania" class="section-padding">
        <div class="container">
          <div data-animate>
            <span class="section-kicker">Why Singhania</span>
            <h2 class="section-h2">Why Choose Singhania Refrigeration for Cold Chain Transport Management?</h2>
          </div>
          <div class="trust-grid">
            <div class="trust-card" data-animate><h3>Transport Management Built Into the Cold Chain, Not Bolted On</h3><p>We tailor route and sensor coverage to your real product range, vehicle fleet and delivery network so the system reflects your actual distribution, not a generic fleet-tracking template.</p></div>
            <div class="trust-card" data-animate><h3>Coverage Across Warehouse &amp; Transport</h3><p>TMS-WMS integration carries the stock and dispatch record through from cold room to reefer truck, so visibility doesn't drop the moment a vehicle leaves the dock.</p></div>
            <div class="trust-card" data-animate><h3>Built Around Your Routes &amp; Fleet, Not a Fixed Template</h3><p>Temperature thresholds, alert rules and route templates are dictated by your product's shelf life and delivery network rather than a one-size-fits-all rule for every route.</p></div>
            <div class="trust-card" data-animate><h3>Deep Cold Chain Domain Knowledge</h3><p>Our team handles the complete cold chain &mdash; refrigeration engineering, reefer systems, facility layout and IoT-based monitoring &mdash; each setup informed by project experience, not a one-size-fits-all fleet software implementation.</p></div>
            <div class="trust-card" data-animate><h3>Delhi NCR-Based, Pan-India Reach</h3><p>Located in Okhla Industrial Area, New Delhi with project execution experience in food processing clusters and pharma parks outside Delhi NCR.</p></div>
            <div class="trust-card" data-animate><h3>Part of a Full Cold Chain Offering</h3><p>Turnkey construction, refrigeration systems and warehouse management &mdash; transport management is included, one partner instead of a separate fleet-tracking vendor on top.</p></div>
            <div class="trust-card" data-animate><h3>Proven Across Multiple Product Verticals</h3><p>From potato and onion distribution to pharmaceutical cold chain delivery, frozen seafood logistics and retail multi-drop networks &mdash; we've built route and temperature tracking for the full spectrum of cold chain applications.</p></div>
            <div class="trust-card" data-animate><h3>AMC &amp; Ongoing Support</h3><p>Not just during installation but afterwards as well &mdash; system upkeep, sensor calibration, route adjustments and reporting support continue.</p></div>
          </div>
        </div>
      </section>
      <!-- ===== END WHY CHOOSE SINGHANIA ===== -->

      <!-- ===== FAQ SECTION ===== -->
      <section id="faq" class="section-padding bg-soft">
        <div class="container">
          <div class="faq-title" data-animate>
            <span class="section-kicker">FAQ</span>
            <h2 class="section-h2">Frequently Asked Questions</h2>
          </div>
          <div class="accordion faq-accordion" id="transportFaqAccordion" data-animate>
            <?php foreach ($transportFaqs as $index => $faq):
              $collapseId = 'transport-faq-collapse-' . $index;
              $isFirst = ($index === 0);
            ?>
              <div class="accordion-item faq-accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button <?php echo $isFirst ? '' : 'collapsed'; ?>"
                    type="button"
                    data-toggle="collapse"
                    data-target="#<?php echo $collapseId; ?>"
                    aria-expanded="<?php echo $isFirst ? 'true' : 'false'; ?>"
                    aria-controls="<?php echo $collapseId; ?>">
                    <?php echo htmlspecialchars($faq['question'], ENT_QUOTES, 'UTF-8'); ?>
                  </button>
                </h3>
                <div id="<?php echo $collapseId; ?>"
                  class="accordion-collapse collapse <?php echo $isFirst ? 'show' : ''; ?>"
                  data-parent="#transportFaqAccordion">
                  <div class="accordion-body faq-answer">
                    <?php echo $faq['answer']; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
      <!-- ===== END FAQ SECTION ===== -->

      <!-- Section-9 -->
      <div class="rs-cta bg21 pt-90 pb-100 md-pt-68 md-pb-80">
        <div class="container">
          <div class="sec-title text-center truck-body-cta" data-animate>
            <span class="sub-title modify white">Get Started</span>
            <h2 class="title3 white-color">Ready to Add Quality Monitoring to Your Cold Chain?</h2>

            <p class="cta-description">
              Share with us your current facility, transport network and product type
              &mdash; we will evaluate where monitoring delivers the most value and
              guide you through a live demo.
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

    </div>

    <?php include('footer.php'); ?>

    <script>
      (function(){
        const els = document.querySelectorAll('[data-animate]');
        if (!('IntersectionObserver' in window)) {
          els.forEach(el => el.classList.add('active'));
          return;
        }
        const io = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              entry.target.classList.add('active');
              io.unobserve(entry.target);
            }
          });
        }, { threshold: .16 });
        els.forEach(el => io.observe(el));
      })();
    </script>
  </body>
</html>
