<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      $pageTitle = 'Transport Refrigeration Solutions India - Reefer Truck & Insulated Vehicle Body Fabrication | Singhania Refrigeration';
      $pageDescription = 'Singhania Refrigeration designs, fabricates and installs insulated vehicle bodies and refrigeration units for reefer trucks, vans and trailers - sized to your product, route and temperature requirement. Request a free assessment.';
      $pageKeywords = 'transport refrigeration solutions, reefer truck body fabrication, insulated vehicle body PUF panels, refrigeration unit installation vehicle, multi-temperature reefer truck, reefer truck conversion existing vehicle';
      $ogDescription = 'Insulated vehicle bodies and refrigeration units for reefer trucks, vans and trailers - sized to your product, route and temperature requirement.';

      $refrigerationFaqs = [
        [
          'question' => 'What is a transport refrigeration solution?',
          'answer' => 'The integrated design, fabrication and installation of an insulated vehicle body and refrigeration unit, sized in concert with the vehicle\'s product, route and required temperature range &mdash; everything from PUF panel fabrication to unit commissioning.'
        ],
        [
          'question' => 'What is the difference between transport refrigeration and a standard insulated truck?',
          'answer' => 'A typical insulated truck is insulated but does not have a refrigeration unit, so it depends on the insulation alone to slow down the rate at which the temperature changes. Transport refrigeration is an active refrigeration unit sized to actively maintain a target temperature range through the course of the route, regardless of ambient conditions.'
        ],
        [
          'question' => 'Can transport refrigeration be fitted to an existing vehicle, or only new builds?',
          'answer' => 'Both. Based on your existing fleet and future plans, we manufacture new reefer vehicles on new chassis and convert existing dry vans and trucks into insulated, refrigerated vehicles.'
        ],
        [
          'question' => 'Can one vehicle carry more than one temperature zone?',
          'answer' => 'Yes. Within our normal scope are multi-compartment, multi-temperature configurations allowing a single vehicle to carry frozen, chilled and ambient product on the same run via partitioned, independently controlled zones.'
        ],
        [
          'question' => 'What is the typical timeline for a transport refrigeration build?',
          'answer' => 'Timelines vary based on the type of vehicle, whether it\'s a new build or conversion, and whether single or multi-temperature compartments are needed. We confirm a defined schedule following the initial vehicle and route assessment.'
        ],
        [
          'question' => 'Do you provide AMC and breakdown support after the vehicle is on the road?',
          'answer' => 'Yes. We have AMC plans including scheduled unit servicing, insulation checks and breakdown response so that a refrigeration unit problem doesn\'t become a stranded load.'
        ],
        [
          'question' => 'Can transport refrigeration meet pharmaceutical or GDP-aligned temperature requirements?',
          'answer' => 'Yes. We build insulated vehicles and fit refrigeration units designed to maintain validated temperature ranges with monitoring and documentation suitable for pharmaceutical and other regulated cold chain requirements.'
        ],
        [
          'question' => 'Do you provide this as a standalone service, or only as part of a full cold chain project?',
          'answer' => 'We can offer transport refrigeration as a standalone vehicle build or conversion, or as part of a larger cold chain project alongside facility construction and refrigeration systems &mdash; just tell us about your current set-up and we\'ll scope accordingly.'
        ],
      ];

      $refrigerationServiceSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => 'Transport Refrigeration Solutions',
        'description' => 'Singhania Refrigeration designs, fabricates and installs insulated vehicle bodies and refrigeration units for reefer trucks, vans and trailers, sized to your product, route and temperature requirement.',
        'url' => 'https://singhaniarefrigeration.com/transport-refrigeration.php',
        'provider' => [
          '@type' => 'LocalBusiness',
          'name' => 'Singhania Refrigeration',
          'url' => 'https://singhaniarefrigeration.com',
          'telephone' => '+919971060822',
          'email' => 'singhaniarefrigeration@gmail.com',
          'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'C-19, Okhla Phase I',
            'addressLocality' => 'New Delhi',
            'addressRegion' => 'Delhi',
            'postalCode' => '110020',
            'addressCountry' => 'IN'
          ]
        ],
        'areaServed' => ['@type' => 'Country', 'name' => 'India'],
        'serviceType' => 'Transport Refrigeration',
        'hasOfferCatalog' => [
          '@type' => 'OfferCatalog',
          'name' => 'Transport Refrigeration Services',
          'itemListElement' => [
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Insulated Body Fabrication (PUF Panels)']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Refrigeration Unit Selection & Installation']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Multi-Temperature & Multi-Compartment Configurations']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Insulated Doors, Curtains & Partitions']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'New Vehicle Builds & Existing Vehicle Conversion']],
            ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Controls, Monitoring & AMC']],
          ]
        ]
      ];

      $refrigerationFaqSchema = [
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
        }, $refrigerationFaqs)
      ];

      $refrigerationBreadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
          ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => 'https://singhaniarefrigeration.com/'],
          ['@type' => 'ListItem', 'position' => 2, 'name' => 'Solutions', 'item' => 'https://singhaniarefrigeration.com/solutions.php'],
          ['@type' => 'ListItem', 'position' => 3, 'name' => 'Transport Refrigeration Solutions', 'item' => 'https://singhaniarefrigeration.com/transport-refrigeration.php']
        ]
      ];
    ?>
    <?php include('head.php'); ?>
    <script type="application/ld+json">
<?php echo json_encode($refrigerationServiceSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
    </script>
    <script type="application/ld+json">
<?php echo json_encode($refrigerationFaqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
    </script>
    <script type="application/ld+json">
<?php echo json_encode($refrigerationBreadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
    </script>
    <style>
      :root {
        --tr-ink: #0f2442;
        --tr-soft: #f6f9fc;
        --tr-card: #ffffff;
        --tr-line: #e3ebf5;
        --tr-accent: #001b68;
      }

      .rs-breadcrumbs.bg-7 {
        position: relative;
        min-height: 560px;
        display: flex;
        align-items: center;
        background-image: url("assets/images/products/truck_refrigeration_singhania.webp");
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
        color: var(--tr-accent);
        font-size: 12px;
        font-weight: 900;
        letter-spacing: .16em;
        text-transform: uppercase;
      }

      .hero-content .eyebrow {
        margin-bottom: 14px;
        color: #dce6ff;
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


      .section-padding { padding: 76px 0; }
      .bg-soft { background: var(--tr-soft); }

      .section-h2 {
        margin: 8px 0 18px;
        color: var(--tr-ink);
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
        border: 1px solid var(--tr-line);
        border-radius: 8px;
        background: var(--tr-card);
        box-shadow: 0 12px 32px rgba(16, 28, 52, .07);
      }

      .callout-box {
        margin-top: 24px;
        padding: 22px 24px;
        border-left: 4px solid var(--tr-accent);
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
        transform: translateY(-6px);
        border-color: rgba(0, 27, 104, .28);
        background: linear-gradient(180deg, #ffffff 0%, #f7f9ff 100%);
        box-shadow: 0 20px 42px rgba(16, 28, 52, .13);
      }

      .feature-card:hover::before,
      .trust-card:hover::before { transform: scaleX(1); }

      .feature-card h3,
      .trust-card h3 {
        margin: 0 0 10px;
        color: var(--tr-ink);
        font-size: 19px;
        line-height: 1.35;
        font-weight: 900;
      }

      .feature-card p,
      .trust-card p { margin: 0; }

      .coverage-list,
      .trust-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
        margin-top: 30px;
      }

      .industry-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
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
        border: 1px solid var(--tr-line);
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
        background: var(--tr-accent);
        box-shadow: inset 0 0 0 4px #dce6ff;
      }

      .process-table-wrap {
        margin: 30px 0 10px;
        overflow-x: auto;
        border: 1px solid var(--tr-line);
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
        border-bottom: 1px solid var(--tr-line);
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
      .process-table td:nth-child(2) { width: 270px; color: var(--tr-ink); font-weight: 800; }
      .process-table td + td,
      .process-table th + th { border-left: 1px solid var(--tr-line); }

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
        color: var(--tr-ink);
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
        color: var(--tr-ink);
        font-size: 20px;
        line-height: 28px;
        text-align: center;
        transform: translateY(-50%);
        transition: background .2s ease, color .2s ease;
      }

      .faq-accordion-item .accordion-button:not(.collapsed) {
        color: var(--tr-ink);
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

      .truck-body-cta .cta-description {
        max-width: 760px;
        margin: 16px auto 24px;
        color: #fff;
        font-size: 16px;
        line-height: 1.6;
        text-align: center;
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

      .truck-body-cta .cta-phone-numbers a { color: #fff; }
      .truck-body-cta .cta-phone-numbers a:hover { text-decoration: underline; }

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
      <div class="rs-breadcrumbs bg-7">
        <div class="container">
          <div class="content-part">
            <div class="hero-content" data-animate>
              <span class="eyebrow">Solutions</span>
              <h1>Transport Refrigeration Solutions &ndash; Reefer Trucks &amp; Insulated Vehicle Bodies</h1>
              <p style="color: white;">
                A reefer vehicle is only as good as the insulation and refrigeration unit built into it. Singhania Refrigeration designs, fabricates and installs insulated vehicle bodies and refrigeration units for trucks, vans, trailers and containers &mdash; sized correctly for your product, route length and temperature range, instead of a generic reefer box bolted onto whatever chassis is available.
              </p>
              <div class="hero-actions">
                <a href="contact" class="btn-brand"> Request a Demo</a>
                <a href="tel:+919971060822" class="btn-brand "> Call Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <section id="what-is-transport-refrigeration" class="section-padding bg-soft">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-7" data-animate>
              <span class="section-kicker">Definition</span>
              <h2 class="section-h2">What Is a Transport Refrigeration Solution?</h2>
              <p class="lead-text">
                Transport refrigeration is the engineering and fabrication work that converts a standard vehicle chassis into a temperature-controlled vehicle that can hold perishable or temperature-sensitive product for the duration of a delivery route as part of broader <a href="/">industrial refrigeration and cold chain solutions</a>. This covers the insulated body itself &mdash; PUF panel construction, flooring, doors and partitions &mdash; along with the refrigeration unit, controls and monitoring fitted to it.
              </p>
              <p>
                Sizing matters more here than in almost any other part of the cold chain: a unit that's undersized for the route length or product load will lose pull-down capacity exactly when it's needed most, while an oversized one wastes fuel and payload space. We size the insulation and refrigeration unit together, against your actual route, product and load profile, rather than fitting a standard reefer kit regardless of what it's carrying.
              </p>
             
            </div>
            <div class="col-lg-5" data-animate>
              <div class="feature-media">
                <img src="assets/images/products/truck_refrigeration_singhania.webp" alt="Reefer truck transport refrigeration build" width="900" height="650" loading="lazy" decoding="async">
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="solution-coverage" class="section-padding">
        <div class="container">
          <div data-animate>
            <span class="section-kicker">Coverage</span>
            <h2 class="section-h2">What Our Transport Refrigeration Solutions Cover</h2>
            <p class="lead-text">
              Whether you are commissioning a new reefer vehicle or converting an existing one, Singhania Refrigeration's transport refrigeration scope covers your vehicle from chassis to refrigeration unit.
            </p>
          </div>

          <div class="coverage-list">
            <div class="feature-card" data-animate><h3>1. Insulated Body Fabrication (PUF Panels)</h3><p>We fabricate and fit PUF (Polyurethane Foam) insulated panels to the vehicle body, sized for the temperature range the vehicle needs to hold and built to withstand the vibration and load stress of regular road use.</p></div>
            <div class="feature-card" data-animate><h3>2. Refrigeration Unit Selection &amp; Installation</h3><p>Refrigeration units are selected and installed based on vehicle size, product type, route length and ambient conditions &mdash; so pull-down time and temperature hold match what the route actually demands, not a one-size unit fitted regardless of load.</p></div>
            <div class="feature-card" data-animate><h3>3. Multi-Temperature &amp; Multi-Compartment Configurations</h3><p>For vehicles carrying more than one product category on a single run, we build partitioned compartments holding different temperature zones in the same vehicle, so a single delivery run can serve frozen, chilled and ambient stops without separate vehicles.</p></div>
            <div class="feature-card" data-animate><h3>4. Insulated Doors, Curtains &amp; Partitions</h3><p>Insulated doors, strip curtains and internal partitions are fitted to minimise temperature loss during loading, unloading and multi-drop stops &mdash; the points where most in-transit temperature loss actually happens.</p></div>
            <div class="feature-card" data-animate><h3>5. New Vehicle Builds &amp; Existing Vehicle Conversion</h3><p>We fabricate new reefer vehicles on fresh chassis as well as convert existing dry vans and trucks into insulated, refrigerated vehicles &mdash; the approach depends on your fleet plan, not a fixed format we apply regardless.</p></div>
            <div class="feature-card" data-animate><h3>6. Controls, Monitoring &amp; AMC</h3><p>Refrigeration units are fitted with temperature controls and monitoring that connect into your broader transport tracking, with AMC covering unit servicing, insulation checks and on-road breakdown support after commissioning.</p></div>
          </div>
        </div>
      </section>

      <section id="industries-served" class="section-padding bg-soft">
        <div class="container">
          <div data-animate>
            <span class="section-kicker">Industries</span>
            <h2 class="section-h2">Industries &amp; Segments We Serve</h2>
            <p class="lead-text">
              Our transport refrigeration builds support clients across temperature-sensitive distribution networks &mdash; wherever the vehicle itself needs to hold the cold chain, not just the warehouse:
            </p>
          </div>
          <div class="industry-grid">
            <div class="feature-card" data-animate><h3>Food &amp; Beverage</h3><p>Dairy, frozen foods, fruits, vegetables and ready-to-eat products on retail and HoReCa delivery routes by reefer trucks and vans.</p></div>
            <div class="feature-card" data-animate><h3>Pharmaceuticals</h3><p>Insulated vehicles that sustain validated temperature ranges for medicines, vaccines and temperature-sensitive APIs in transit.</p></div>
            <div class="feature-card" data-animate><h3>Seafood &amp; Meat</h3><p>Frozen-rated reefer bodies and units for seafood and poultry travelling from processing facilities to distribution locations.</p></div>
            <div class="feature-card" data-animate><h3>Horticulture &amp; Agri</h3><p>Insulated vans transporting fruit and vegetable shipments from farm-gate and CA stores to mandis and exporters.</p></div>
            <div class="feature-card" data-animate><h3>Logistics &amp; 3PL</h3><p>Fleets of multi-temperature reefers serving a variety of customers and product categories along a shared distribution network.</p></div>
            <div class="feature-card" data-animate><h3>Retail &amp; FMCG</h3><p>Multi-drop reefer vehicles built for scheduled delivery into the back-of-store cold rooms of supermarkets and retail chains.</p></div>
          </div>
        </div>
      </section>

      <section id="transport-refrigeration-benefits" class="section-padding">
        <div class="container">
          <div data-animate>
            <span class="section-kicker">Benefits</span>
            <h2 class="section-h2">Why Engineered Transport Refrigeration Over a Standard Reefer Kit?</h2>
            <p class="lead-text">
              The leading cause of in-transit temperature failures is a refrigeration unit and insulation that were never sized for the actual route, load or product &mdash; a standard kit fitted to a chassis without first checking whether it can hold the required temperature over the route length or the number of door openings on a multi-drop run.
            </p>
            <p>With Singhania Refrigeration's transport refrigeration builds, you get:</p>
          </div>
          <ul class="benefit-list">
            <li data-animate><strong>Sizing Matched to Route &amp; Load</strong> &mdash; Insulation and refrigeration capacity are calculated against your actual route length, stop count and product load, not a standard kit applied regardless of use case.</li>
            <li data-animate><strong>Lower Fuel &amp; Maintenance Cost Over Time</strong> &mdash; Correctly sized units run more efficiently than oversized or undersized ones, reducing fuel draw and unit wear across the vehicle's working life.</li>
            <li data-animate><strong>Multi-Temperature Flexibility</strong> &mdash; Partitioned compartments let a single vehicle serve mixed-temperature delivery runs, instead of requiring a separate vehicle per temperature zone.</li>
            <li data-animate><strong>Built for Indian Road &amp; Climate Conditions</strong> &mdash; Insulation, fabrication and unit selection account for ambient heat load and road conditions typical of Indian delivery routes, not a spec sheet built for a different climate.</li>
            <li data-animate><strong>AMC &amp; On-Road Support</strong> &mdash; Servicing and breakdown support continue after the vehicle is on the road, so a unit issue doesn't turn into a stranded load.</li>
          </ul>
        </div>
      </section>

      <section id="build-process" class="section-padding bg-soft">
        <div class="container">
          <div data-animate>
            <span class="section-kicker">Process</span>
            <h2 class="section-h2">Our 5-Stage Transport Refrigeration Build Process</h2>
            <p class="lead-text">
              Every Singhania Refrigeration transport refrigeration project follows a structured process &mdash; so you always know what is happening and when.
            </p>
          </div>
          <div class="process-table-wrap" data-animate>
            <table class="process-table">
              <thead>
                <tr><th>Stage</th><th>Phase</th><th>What Happens</th></tr>
              </thead>
              <tbody>
                <tr><td>1</td><td>Discovery &amp; Vehicle Assessment</td><td>Temperature range requirement, chassis evaluation (new build or existing conversion), route length and stop-count review, product profiling</td></tr>
                <tr><td>2</td><td>Design &amp; Engineering</td><td>Insulation thickness and refrigeration unit sizing calculated together, compartment layout finalised for single or multi-temperature configurations</td></tr>
                <tr><td>3</td><td>Fabrication &amp; Panel Installation</td><td>PUF insulated body fabrication, flooring, doors, curtains and partitions fitted to the vehicle</td></tr>
                <tr><td>4</td><td>Refrigeration Unit Installation &amp; Commissioning</td><td>Refrigeration unit fitted, controls and monitoring connected, pull-down and temperature hold tested before handover</td></tr>
                <tr><td>5</td><td>AMC &amp; On-Road Support</td><td>Scheduled unit servicing, insulation checks and breakdown response to keep the vehicle running through its working life</td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <section id="why-singhania" class="section-padding">
        <div class="container">
          <div data-animate>
            <span class="section-kicker">Why Singhania</span>
            <h2 class="section-h2">Why Choose Singhania Refrigeration for Transport Refrigeration?</h2>
          </div>
          <div class="trust-grid">
            <div class="trust-card" data-animate><h3>Insulation &amp; Unit Sized Together, Not Fitted Separately</h3><p>Insulation thickness and refrigeration unit capacity are calculated as one engineering decision, so the finished vehicle holds temperature across the full route rather than falling short on longer runs.</p></div>
            <div class="trust-card" data-animate><h3>Multi-Temperature &amp; Multi-Compartment Expertise</h3><p>Partitioned, multi-zone vehicle builds are a regular part of our scope, not a one-off request &mdash; useful for fleets serving mixed-temperature delivery runs.</p></div>
            <div class="trust-card" data-animate><h3>New Builds &amp; Existing Vehicle Conversion</h3><p>We work on fresh chassis builds as well as converting existing dry vans and trucks, so your fleet plan &mdash; not our fixed format &mdash; decides the approach.</p></div>
            <div class="trust-card" data-animate><h3>Deep Cold Chain Domain Knowledge</h3><p>Our team also covers refrigeration engineering, cold room construction and IoT-based monitoring, so vehicle builds are informed by the same cold chain experience as our facility projects.</p></div>
            <div class="trust-card" data-animate><h3>Delhi NCR-Based, Pan-India Reach</h3><p>Located in Okhla Industrial Area, New Delhi with project execution experience in food processing clusters and pharma parks outside Delhi NCR.</p></div>
            <div class="trust-card" data-animate><h3>Proven Across Multiple Vehicle Types</h3><p>From single-temperature LCVs and delivery vans to multi-compartment trucks and trailers &mdash; we've built for the full range of reefer vehicle formats.</p></div>
            <div class="trust-card" data-animate><h3>Energy-Efficient by Default</h3><p>Refrigeration units are sized against actual load and route, never over-specified, which directly reduces fuel draw and running cost over the vehicle's life.</p></div>
            <div class="trust-card" data-animate><h3>AMC &amp; Ongoing Support</h3><p>Unit servicing, insulation checks and breakdown response continue after the vehicle is on the road, not only during fabrication.</p></div>
          </div>
        </div>
      </section>

      <section id="faq" class="section-padding bg-soft">
        <div class="container">
          <div class="faq-title" data-animate>
            <span class="section-kicker">FAQ</span>
            <h2 class="section-h2">Frequently Asked Questions</h2>
          </div>
          <div class="accordion faq-accordion" id="refrigerationFaqAccordion" data-animate>
            <?php foreach ($refrigerationFaqs as $index => $faq):
              $collapseId = 'refrigeration-faq-collapse-' . $index;
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
                  data-parent="#refrigerationFaqAccordion">
                  <div class="accordion-body faq-answer">
                    <?php echo $faq['answer']; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <div class="rs-cta bg21 pt-90 pb-100 md-pt-68 md-pb-80">
        <div class="container">
          <div class="sec-title text-center truck-body-cta" data-animate>
            <span class="sub-title modify white">Get Started</span>
            <h2 class="title3 white-color">Ready to Build or Convert Your Reefer Fleet?</h2>
            <p class="cta-description">
              Tell us your vehicle type, route length and product range &mdash; and we'll assess your need and propose a defined build scope and timeline. No obligation. No pressure.
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
