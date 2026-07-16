<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      $pageTitle = 'Cold Chain Quality Monitoring Solutions | Singhania Refrigeration';
      $pageDescription = 'Cold chain quality monitoring solutions for warehouse and transport networks. Track temperature, humidity, shelf life, spoilage risk, excursions and root cause across the cold chain.';
    ?>
    <?php include('head.php'); ?>
    <style>
      :root {
        --qm-ink: #0f2442;
        --qm-muted: #667085;
        --qm-soft: #f6f9fc;
        --qm-card: #ffffff;
        --qm-line: #e4ebf5;
        --qm-brand: #0e2344;
        --qm-accent: #001b68;
      }

      .rs-breadcrumbs.bg-7 {
        position: relative;
        min-height: 560px;
        display: flex;
        align-items: center;
        background-image: url("assets/images/products/cold-chain-monitoring.png");
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

      .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 14px;
        color: #dce6ff;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .18em;
        text-transform: uppercase;
      }

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

      .hero-points {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 18px;
      }

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
      .cta-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 28px;
      }

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

      .section-padding { padding: 78px 0; }
      .bg-soft { background: var(--qm-soft); }

      .section-kicker {
        display: inline-block;
        margin-bottom: 10px;
        color: var(--qm-accent);
        font-size: 12px;
        font-weight: 900;
        letter-spacing: .16em;
        text-transform: uppercase;
      }

      .section-h2 {
        margin: 0 0 18px;
        color: var(--qm-ink);
        font-size: clamp(26px, 3vw, 38px);
        line-height: 1.18;
        font-weight: 900;
      }

      .lead-text {
        color: #314467;
        font-size: 17px;
        line-height: 1.8;
      }

      .feature-media {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        background: #0b1530;
        box-shadow: 0 22px 54px rgba(16, 28, 52, .16);
      }

      .feature-media img {
        display: block;
        width: 100%;
        height: auto;
        object-fit: cover;
        transition: transform .6s ease;
      }

      .feature-media:hover img { transform: scale(1.03); }

      .monitoring-figure {
        overflow: hidden;
        height: 100%;
        min-height: 320px;
        border-radius: 8px;
        background: #eef3fb;
        box-shadow: 0 20px 50px rgba(16, 28, 52, .14);
      }

      .monitoring-figure img {
        width: 100%;
        height: 100%;
        min-height: 320px;
        display: block;
        object-fit: cover;
      }

      .callout-box,
      .feature-card,
      .trust-card {
        height: 100%;
        border: 1px solid var(--qm-line);
        border-radius: 8px;
        background: var(--qm-card);
        box-shadow: 0 12px 32px rgba(16, 28, 52, .07);
      }

      .callout-box {
        margin-top: 24px;
        padding: 22px 24px;
        border-left: 4px solid var(--qm-accent);
        background: #f2f5ff;
        color: #1e293b;
        font-weight: 700;
        line-height: 1.7;
      }

      .feature-card,
      .trust-card {
        position: relative;
        overflow: hidden;
        padding: 26px 24px;
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

      .scope-grid {
        display: grid;
        gap: 28px;
      }

      .scope-card {
        position: relative;
        display: grid;
        grid-template-columns: 88px minmax(0, 1fr);
        gap: 18px;
        align-items: start;
      }

      .scope-card:not(:last-child)::before {
        content: "";
        position: absolute;
        left: 43px;
        top: 60px;
        bottom: -30px;
        width: 2px;
        background: linear-gradient(180deg, #001b68 0%, rgba(0, 27, 104, .48) 100%);
      }

      .scope-num {
        position: relative;
        z-index: 1;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #001b68;
        color: #ffffff;
        font-size: 18px;
        font-weight: 900;
        box-shadow: 0 0 0 7px #ffffff;
      }

      .scope-card:first-child .scope-num {
        box-shadow: 0 0 0 7px #ffffff, 0 0 0 14px rgba(0, 27, 104, .12);
      }

      .scope-card-body {
        background: #ffffff;
        border: 1px solid rgba(0, 27, 104, .18);
        border-radius: 12px;
        padding: 18px 22px;
        box-shadow: 0 12px 34px rgba(16, 28, 52, .04);
        transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
      }

      .scope-card:hover .scope-card-body {
        transform: translateY(-5px);
        border-color: rgba(0, 27, 104, .42);
        box-shadow: 0 20px 46px rgba(0, 27, 104, .13);
      }

      .scope-card:hover .scope-num {
        transform: scale(1.08);
        box-shadow: 0 0 0 7px #ffffff, 0 0 0 14px rgba(0, 27, 104, .12);
      }

      .scope-card h3 {
        color: #071735;
        font-size: 19px;
        line-height: 1.35;
        font-weight: 900;
        margin: 0 0 6px;
      }

      .scope-card p {
        color: #52617d;
        font-size: 15px;
        line-height: 1.6;
        margin: 0;
      }

      .insight-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
        margin-top: 34px;
      }

      .insight-card {
        overflow: hidden;
        border: 1px solid var(--qm-line);
        border-radius: 8px;
        background: #ffffff;
        box-shadow: 0 10px 24px rgba(16, 28, 52, .05);
        transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
      }

      .insight-card:hover {
        transform: translateY(-7px);
        border-color: rgba(0, 27, 104, .42);
        box-shadow: 0 22px 48px rgba(0, 27, 104, .15);
      }

      .insight-card img {
        width: 100%;
        aspect-ratio: 16 / 10;
        display: block;
        object-fit: cover;
        transition: transform .45s ease;
      }

      .insight-card:hover img {
        transform: scale(1.05);
      }

      .insight-card h3 {
        margin: 0;
        padding: 16px 18px 4px;
        color: var(--qm-ink);
        font-size: 17px;
        font-weight: 900;
      }

      .insight-card p {
        margin: 0;
        padding: 0 18px 18px;
        color: #52627a;
        font-size: 14px;
        line-height: 1.6;
      }

      .benefit-list {
        margin: 26px 0 0;
        padding: 0;
        list-style: none;
        border-top: 1px solid var(--qm-line);
      }

      .benefit-list li {
        position: relative;
        padding: 18px 0 18px 34px;
        border-bottom: 1px solid var(--qm-line);
        color: #33445f;
        line-height: 1.7;
      }

      .benefit-list li::before {
        content: "\f00c";
        position: absolute;
        left: 0;
        top: 19px;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: #eaf7ef;
        color: #1f8f4d;
        font-family: FontAwesome;
        font-size: 12px;
        line-height: 22px;
        text-align: center;
      }

      .faq-list {
        max-width: 920px;
        margin: 28px auto 0;
      }

      .faq-list details {
        border-bottom: 1px solid var(--qm-line);
        background: #fff;
      }

      .faq-list summary {
        position: relative;
        padding: 20px 42px 20px 0;
        color: var(--qm-ink);
        font-weight: 800;
        cursor: pointer;
        list-style: none;
      }

      .faq-list summary::-webkit-details-marker { display: none; }

      .faq-list summary::after {
        content: "+";
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--qm-accent);
        font-size: 24px;
        font-weight: 500;
      }

      .faq-list details[open] summary::after { content: "-"; }

      .faq-list p {
        margin: 0;
        padding: 0 42px 20px 0;
        color: #52627a;
        line-height: 1.75;
      }

      .cta-section {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #0e2344 0%, #07182f 100%);
        color: #fff;
      }

      .cta-section h2 {
        color: #fff;
        margin-bottom: 12px;
      }

      .cta-section p {
        max-width: 780px;
        color: #e5edff;
        font-size: 17px;
        line-height: 1.8;
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
        .insight-grid { grid-template-columns: 1fr; }
      }

      @media (max-width: 575px) {
        .hero-actions,
        .cta-actions { flex-direction: column; }
        .btn-brand { width: 100%; }
        .hero-content h1 { font-size: 32px; }
        .scope-card { grid-template-columns: 58px minmax(0, 1fr); }
        .scope-card:not(:last-child)::before { left: 23px; }
      }
    </style>
  </head>

  <body>
    <?php include('header.php'); ?>

    <div class="main-content">
      <div class="rs-breadcrumbs bg-7">
        <div class="container">
          <div class="content-part">
            <div class="hero-content" data-animate>
              <span class="eyebrow">Solutions</span>
              <h1>Cold Chain Quality Monitoring Solutions</h1>
              <p>
                A cold room or reefer truck that is holding the wrong temperature, even for a few hours, can ruin a shipment before anyone realises it. Singhania Refrigeration's quality monitoring solution continuously monitors temperature, humidity, shelf life and spoilage risk throughout your warehouse and transport network, raises excursions in real time and traces every issue to its root cause.
              </p>
              <div class="hero-actions">
                <a href="contact" class="btn-brand">Request a Demo</a>
                <a href="tel:+919971060822" class="btn-brand "> Call Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <section class="section-padding bg-soft" id="what-is-quality-monitoring">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-5 md-mb-40" data-animate>
              <div class="feature-media">
                <img src="assets/images/products/cold-chain-monitoring.png" alt="Cold chain quality monitoring dashboard workflow" width="1200" height="800" loading="lazy" decoding="async">
              </div>
            </div>
            <div class="col-lg-7 pl-45 md-pl-15" data-animate>
              <span class="section-kicker">Definition</span>
              <h2 class="section-h2">What Is a Cold Chain Quality Monitoring Solution?</h2>
              <p class="lead-text">
                A cold chain quality monitoring solution is a system of sensors, software and reporting that tracks the actual condition of products across storage, handling and distribution inside <a href="/">reliable cold storage systems</a>. By monitoring continuously, any deviation is detected early instead of being discovered after stock has already been damaged.
              </p>
              <p class="lead-text">
                In Singhania Refrigeration projects, quality monitoring connects with cold rooms, refrigeration systems, transport refrigeration, warehouse processes and packing or grading lines, so monitoring data becomes part of the operating workflow.
              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="section-padding" id="solution-coverage">
        <div class="container">
          <div class="text-center mb-45" data-animate>
            <span class="section-kicker">Coverage</span>
            <h2 class="section-h2">Quality Monitoring Scope</h2>
            <p class="lead-text mb-0">Singhania Refrigeration's quality monitoring scope covers the following operational checkpoints.</p>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 mb-30" data-animate>
              <div class="feature-card">
                <span class="feature-number">1</span>
                <h3>Product Quality Identification</h3>
                <p>Identify product quality through objective checks, condition logging and traceability across cold storage, staging and dispatch points.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-30" data-animate>
              <div class="feature-card">
                <span class="feature-number">2</span>
                <h3>Early Spoilage Detection</h3>
                <p>Detect spoilage risk early by connecting excursion events, product condition and handling history before losses become larger.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-30" data-animate>
              <div class="feature-card">
                <span class="feature-number">3</span>
                <h3>Environmental Tracking</h3>
                <p>Monitor temperature and humidity continuously across rooms, docks, staging zones and reefer vehicles with time-stamped logs.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-30" data-animate>
              <div class="feature-card">
                <span class="feature-number">4</span>
                <h3>Shelf-Life Visibility</h3>
                <p>Track remaining shelf life at every stage and support better FIFO, dispatch decisions and customer-facing quality assurance.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-30" data-animate>
              <div class="feature-card">
                <span class="feature-number">5</span>
                <h3>Warehouse Coverage</h3>
                <p>Use monitoring data with warehouse touchpoints so QA, operations and inventory teams work from the same product-condition view.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-30" data-animate>
              <div class="feature-card">
                <span class="feature-number">6</span>
                <h3>Transport Coverage</h3>
                <p>The same monitoring continues through reefer movement, so visibility is not lost when product leaves the facility.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section-padding bg-soft" id="monitoring-benefits">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 md-mb-40" data-animate>
              <span class="section-kicker">Benefits</span>
              <h2 class="section-h2">Why Quality Monitoring Matters</h2>
              <p class="lead-text">
                Cold chain performance is not only about installing refrigeration equipment. The real test is whether every product remains within the required condition window from receipt to dispatch and delivery.
              </p>
            </div>
            <div class="col-lg-6" data-animate>
              <ul class="benefit-list">
                <li><strong>Reduce product loss:</strong> Detect temperature abuse, humidity drift and spoilage risk before they damage larger batches.</li>
                <li><strong>Improve accountability:</strong> Trace every exception back to location, time, process stage and likely root cause.</li>
                <li><strong>Support compliance:</strong> Maintain digital logs and audit-ready reports for internal QA and customer requirements.</li>
                <li><strong>Protect shelf life:</strong> Use monitoring insights to make better dispatch, handling and rotation decisions.</li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <section class="section-padding" id="why-singhania">
        <div class="container">
          <div class="text-center mb-45" data-animate>
            <span class="section-kicker">Why Singhania</span>
            <h2 class="section-h2">One Partner for Cold Rooms, Refrigeration, Transport and Monitoring</h2>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 mb-30" data-animate>
              <div class="trust-card">
                <h3>End-to-End Cold Chain Experience</h3>
                <p>Quality monitoring is planned around real storage, handling and movement conditions, not as a separate afterthought.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-30" data-animate>
              <div class="trust-card">
                <h3>Warehouse to Reefer Visibility</h3>
                <p>The same monitoring approach is maintained from the cold room to the reefer truck for connected operational visibility.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-30" data-animate>
              <div class="trust-card">
                <h3>Integrated Project Delivery</h3>
                <p>Monitoring can be included with turnkey construction, refrigeration systems and transport refrigeration under one project team.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

     <!--Section-8  -->
  <section class="faq-section section-padding bg-white" id="faq">
    <div class="container">

      <h2 class="section-h2 text-center mb-5">
        Frequently Asked Questions
      </h2>

      <?php
      
      $faqs = [
        [
          'q' => 'What is a cold chain quality monitoring solution?',
          'a' => 'Sensors, software and reporting combine to create a system for monitoring the actual state of your product, including temperature, humidity, shelf-life and the risk of spoilage, at every point in the cold chain: from cold room to transportation and distribution. The system notifies you in real time if any of the monitored conditions has gone outside its normal limits.'
        ],
        [
          'q' => 'What does quality monitoring track, exactly?',
          'a' => 'Continuous temperature and humidity, shelf-life remaining at each stage and early spoilage indicators, with each reading logged for root cause analysis and audit purposes.'
        ],
        [
          'q' => 'Does quality monitoring cover transport as well as storage?',
          'a' => 'Yes. Coverage is available at both Warehouse Management System (WMS) and Transport Management System (TMS) touchpoints, so visibility does not drop once product leaves the facility.'
        ],
        [
          'q' => 'How are spoilage and temperature excursions detected?',
          'a' => 'Real-time alerts compare continuous sensor readings against the safe range for your product and any excursions trigger an alert, instead of waiting for the next manual stock check to surface the problem.'
        ],
        [
          'q' => 'Can quality monitoring be added to an existing cold storage facility, or only new builds?',
          'a' => 'It can be added to an existing facility. We take a look at your current site layout and equipment and then design the sensor placement and coverage around what is already there.'
        ],
        [
          'q' => 'Who receives the alerts and reports, operations, QA, or both?',
          'a' => 'Both. Alerts and reports are configured for the decisions each team needs to make: operational response for excursions and documentation and trend analysis for QA and compliance.'
        ],
        [
          'q' => 'Does this help with compliance audits?',
          'a' => 'Yes. Instead of having to piece together temperature and humidity history when an audit comes up, it is already documented and available through continuous end-to-end audit trails.'
        ],
        [
          'q' => 'Do you provide this as a standalone service, or only as part of a full cold chain project?',
          'a' => 'We can provide quality monitoring either as part of our End-to-End Integrated Cold Chain Solution or as a stand-alone add-on to an existing facility. Just let us know about your current set-up and we will scope accordingly.'
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

  <div class="rs-cta bg21 pt-90 pb-100 md-pt-68 md-pb-80">
    <div class="container">
      <div class="sec-title text-center truck-body-cta">
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
    </div>

    <?php include('footer.php'); ?>

    <script>
      (function () {
        var els = document.querySelectorAll('[data-animate]');
        if (!('IntersectionObserver' in window)) {
          els.forEach(function (el) { el.classList.add('active'); });
          return;
        }
        var io = new IntersectionObserver(function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              entry.target.classList.add('active');
              io.unobserve(entry.target);
            }
          });
        }, { threshold: .16 });
        els.forEach(function (el) { io.observe(el); });
      })();
    </script>
  </body>
</html>
