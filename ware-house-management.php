<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $pageTitle = 'Cold Storage Warehouse Management Solutions India | Singhania Refrigeration';
  $pageDescription = 'Singhania Refrigeration&rsquo;s warehouse management solution organizes inventory, stock rotation, space planning and dispatch across your cold storage facility — from receiving to despatch. One system. Zero guesswork. Request a free demo.';
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
      background-image: url("assets/images/products/ware-house-management.png");
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

    .rs-breadcrumbs .container {
      position: relative;
      z-index: 1;
    }

    .rs-breadcrumbs .content-part {
      padding: 110px 0 130px;
    }

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

    .section-padding {
      padding: 78px 0;
    }

    .bg-soft {
      background: var(--qm-soft);
    }

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

    .feature-media:hover img {
      transform: scale(1.03);
    }

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
    .industry-card::before,
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

    /* ====== INDUSTRIES ====== */
    .industries-section {
      padding: 76px 0 88px;
      background: #f6f9fc;
    }

    .industries-head {
      max-width: 850px;
      margin: 0 auto 54px;
      text-align: center;
    }

    .industries-title {
      color: #071735;
      font-size: clamp(30px, 4vw, 42px);
      line-height: 1.08;
      font-weight: 900;
      margin: 0 0 18px;
    }

    .industries-lead {
      color: #293858;
      font-size: 17px;
      line-height: 1.7;
      margin: 0;
    }

    .industries-grid {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 24px;
    }

    .industry-card {
      --industry-accent: #2878ff;
      position: relative;
      overflow: hidden;
      background: #ffffff;
      border: 1px solid #dfe5ef;
      border-radius: 10px;
      padding: 24px 24px 26px;
      min-height: 254px;
      box-shadow: 0 10px 24px rgba(16, 28, 52, .04);
      transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
    }

    .industry-card:hover {
      transform: translateY(-7px);
    border-color: rgba(0, 27, 104, .42);
    background: linear-gradient(180deg, #ffffff 0%, #f7f9ff 100%);
    box-shadow: 0 22px 48px rgba(0, 27, 104, .16);
    }

    .industry-card:hover::before {
      transform: scaleX(1);
    }

    .industry-card-head {
      display: flex;
      align-items: center;
      gap: 16px;
      margin-bottom: 20px;
    }

    .industry-icon {
      width: 56px;
      height: 56px;
      border-radius: 10px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      flex: 0 0 56px;
      background: #071735;
      color: white;
      font-size: 24px;
    }

    .industry-card h3 {
      color: #071735;
      font-size: 18px;
      line-height: 1.3;
      font-weight: 900;
      margin: 0;
    }

    .industry-card ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      gap: 10px;
    }

    .industry-card li {
      position: relative;
      color: #071735;
      font-size: 14px;
      line-height: 1.45;
      padding-left: 14px;
    }

    .industry-card li:before {
      content: "";
      position: absolute;
      left: 0;
      top: .62em;
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: #071735;
    }

    /* ================================
   Warehouse Rollout Process
================================ */

    #rollout-process {
      padding: 60px 0;
      background: #f8fafc;
    }

    #rollout-process h2 {
      font-size: 38px;
      font-weight: 700;
      color: #1d3557;
      text-align: center;
      margin-bottom: 15px;
      line-height: 1.3;
    }

    #rollout-process p {
      max-width: 850px;
      margin: 0 auto 45px;
      text-align: center;
      color: #666;
      font-size: 17px;
      line-height: 1.8;
    }

    /* Table */

    #rollout-process .table-wrap {
      overflow-x: auto;
      margin: 24px 0 10px;
      border: 1px solid #e3e9f2;
      border-radius: 8px;
      background: #fff;
      box-shadow: 0 16px 36px rgba(16, 28, 52, .08);
    }

    #rollout-process .compare-table {
      width: 100%;
      min-width: 760px;
      border-collapse: separate;
      border-spacing: 0;
    }

    #rollout-process .compare-table th,
    #rollout-process .compare-table td {
      padding: 16px 18px;
      border-bottom: 1px solid #e3e9f2;
      text-align: left;
      vertical-align: top;
      line-height: 1.55;
      transition: background .22s ease, color .22s ease, box-shadow .22s ease;
    }

    #rollout-process .compare-table th {
      background: #001b68;
      color: #fff;
      font-weight: 900;
      border-bottom-color: #001b68;
    }

    #rollout-process .compare-table th:first-child {
      border-top-left-radius: 8px;
    }

    #rollout-process .compare-table th:last-child {
      border-top-right-radius: 8px;
    }

    #rollout-process .compare-table td {
      color: #405070;
      background: #fff;
    }

    #rollout-process .compare-table tr:last-child td {
      border-bottom: 0;
    }

    #rollout-process .compare-table tbody tr:hover td {
      background: #f8fbff;
    }

    /* Stage Number */

    #rollout-process .compare-table td:first-child {
      width: 70px;
      text-align: center;
      color: #001b68;
      font-size: 20px;
      font-weight: 900;
      background: #f7f9ff;
    }

    /* Phase */

    #rollout-process .compare-table td:nth-child(2) {
      width: 280px;
      color: #0f2442;
      font-weight: 800;
    }

    #rollout-process .compare-table td + td,
    #rollout-process .compare-table th + th {
      border-left: 1px solid #e3e9f2;
    }

    /* ====== WHY SINGHANIA ====== */
    .why-singhania-section {
      padding: 78px 0 90px;

    }

    .why-singhania-head {
      max-width: 900px;
      margin: 0 auto 40px;
      text-align: center;
    }

    .why-singhania-eyebrow {
      display: inline-block;
      color: #44516c;
      font-size: 13px;
      font-weight: 800;
      letter-spacing: .08em;
      text-transform: uppercase;
      margin-bottom: 8px;
    }

    .why-singhania-title {
      color: #071735;
      font-size: clamp(30px, 4vw, 42px);
      line-height: 1.08;
      font-weight: 900;
      margin: 0 0 16px;
    }

    .why-singhania-lead {
      color: #293858;
      font-size: 17px;
      line-height: 1.7;
      margin: 0;
    }

    .why-singhania-grid {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 20px;
    }

    .singhania-card {
      position: relative;
      overflow: hidden;
      background: #ffffff;
      border: 1px solid #dfe5ef;
      border-radius: 14px;
      padding: 24px;
      display: grid;
      grid-template-columns: 56px minmax(0, 1fr);
      gap: 18px;
      box-shadow: 0 10px 24px rgba(16, 28, 52, .06);
      transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
    }

    .singhania-card::before {
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

    .singhania-card:hover {
      transform: translateY(-7px);
    border-color: rgba(0, 27, 104, .42);
    background: linear-gradient(180deg, #ffffff 0%, #f7f9ff 100%);
    box-shadow: 0 22px 48px rgba(0, 27, 104, .16);
    }

    .singhania-card:hover::before {
      transform: scaleX(1);
    }

    .singhania-icon {
      width: 56px;
      height: 56px;
      border-radius: 12px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: #082243;
      color: #ffffff;
      font-size: 22px;
    }

    .singhania-card h3 {
      color: #071735;
      font-size: 18px;
      line-height: 1.35;
      font-weight: 900;
      margin: 0 0 8px;
    }

    .singhania-card p {
      color: #405070;
      font-size: 14px;
      line-height: 1.68;
      margin: 0;
    }

    /* Responsive */

    @media (max-width:991px) {

      #rollout-process h2 {
        font-size: 30px;
      }

      #rollout-process p {
        font-size: 16px;
      }

      #rollout-process .compare-table {
        min-width: 760px;
      }
    }

    @media (max-width:767px) {

      #rollout-process {
        padding: 50px 0;
      }

      #rollout-process h2 {
        font-size: 26px;
      }

      #rollout-process p {
        margin-bottom: 30px;
        font-size: 15px;
      }

      #rollout-process .compare-table th,
      #rollout-process .compare-table td {
        padding: 15px;
        font-size: 14px;
      }

      #rollout-process .compare-table td:first-child {
        font-size: 18px;
      }
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

    .faq-list summary::-webkit-details-marker {
      display: none;
    }

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

    .faq-list details[open] summary::after {
      content: "-";
    }

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
      .rs-breadcrumbs .content-part {
        padding: 96px 0 86px;
      }

      .section-padding {
        padding: 62px 0;
      }

      .hero-content h1 {
        font-size: 38px;
      }

      .insight-grid {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 575px) {

      .hero-actions,
      .cta-actions {
        flex-direction: column;
      }

      .btn-brand {
        width: 100%;
      }

      .hero-content h1 {
        font-size: 32px;
      }

      .scope-card {
        grid-template-columns: 58px minmax(0, 1fr);
      }

      .scope-card:not(:last-child)::before {
        left: 23px;
      }
    }
  </style>
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5XNG3TQC" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <?php include('header.php'); ?>

  <div class="main-content">
    <div class="rs-breadcrumbs bg-7">
      <div class="container">
        <div class="content-part">
          <div class="hero-content" data-animate>
            <span class="eyebrow">Solutions</span>
            <h1>End-to-End Cold Storage Warehouse Management Solutions in India</h1>
            <p>
              From the first pallet arriving at the dock until it is despatched,
              through audit reporting and ongoing system support &mdash; Singhania
              Refrigeration manages your warehouse operations under one integrated
              system. We are your cold storage warehouse management partner, handling
              everything from inventory tracking and stock rotation to space planning,
              dispatch sequencing and reporting, all from end to end. The result is a
              fully organised, audit-ready cold storage facility &mdash; not a stack
              of registers and spreadsheets that only one person knows how to read.
            </p>

            <div class="hero-actions">
              <a href="contact" class="btn-brand">Request a Demo</a>
              <a href="tel:+919971060822" class="btn-brand"> Call Now</a>
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
              <img src="assets/images/products/ware-house-management.png" alt="Cold chain quality monitoring dashboard workflow" width="1200" height="800" loading="lazy" decoding="async">
            </div>
          </div>
          <div class="col-lg-7 pl-45 md-pl-15" data-animate>
            <span class="section-kicker">Definition</span>
            <h2 class="section-h2">What Is a Cold Storage Wharehouse management Solution?</h2>
            <p class="lead-text">
              A cold storage warehouse management solution is a comprehensive,
              system-driven approach to managing inventory operations inside
              <a href="/">end-to-end cold chain solutions</a>.
              Singhania Refrigeration manages all facets of warehouse operations
              including receiving, put-away, batch and location tracking, stock
              rotation (FIFO/FEFO), space and slot allocation, dispatch sequencing,
              and integration with your Transport Management System (TMS).
            </p>
            <p class="lead-text">
              Instead of trying to coordinate manual stock registers, disconnected
              spreadsheets and verbal handovers between receiving, floor and dispatch
              teams &mdash; all of whom may be working off a different version of
              what&rsquo;s actually in the cold room &mdash; you run on one system,
              one stock record and one point of accountability.
            </p>

            <p class="lead-text">
              This delivery model is also known as a Warehouse Management System
              (WMS) for cold storage, and is sometimes described as cold storage
              inventory management, cold chain stock control, or cold room WMS
              integration. The terminology varies by operation, but the model stays
              the same: one accountable system from the receiving dock to the
              dispatch bay.
            </p>

          </div>
        </div>
      </div>
    </section>

    <section class="section-padding" id="solution-coverage">
      <div class="container">
        <div class="text-center mb-45" data-animate>
          <span class="section-kicker">Coverage</span>
          <h2 class="section-h2">What Our Warehouse Management Solution Covers</h2>
          <p class="lead-text mb-0"> Singhania Refrigeration&rsquo;s warehouse management scope includes all
            of the operational stack, from the receiving dock to dispatch reporting,
            in one system. No matter if you&rsquo;re setting up warehouse management
            for a new cold storage facility or adding it to an existing one, the
            scope and accountability remain the same.
          </p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-30" data-animate>
            <div class="feature-card">
              <span class="feature-number">1</span>
              <h3>Receiving &amp; Put-Away</h3>
              <p>
                Incoming stock is logged against location, batch and quantity at the
                point of receiving, checked against the purchase order or inbound
                manifest before it&rsquo;s put away, rather than put on the floor and
                logged from memory later.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-30" data-animate>
            <div class="feature-card">
              <span class="feature-number">2</span>
              <h3>Stock Rotation (FIFO/FEFO)</h3>
              <p>
                Stock is sequenced according to first-in-first-out or first-expiry-first-out
                rules, which are set based on the actual shelf life of your product. The
                stock is automatically flagged for movement as it comes up to its
                rotation window, so the choice of what goes out next is determined by
                the system and not a guess as to which pallet is the oldest.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-30" data-animate>
            <div class="feature-card">
              <span class="feature-number">3</span>
              <h3>Space &amp; Slot Utilization</h3>
              <p>
                Storage locations are assigned based on product type, temperature zone
                and available space at the time of put-away &mdash; so cold room space
                is used to its real capacity and not filled wherever happens to be a
                gap, and high-turnover SKUs are not buried behind slow-moving stock.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-30" data-animate>
            <div class="feature-card">
              <span class="feature-number">4</span>
              <h3>Dispatch Planning &amp; Sequencing</h3>
              <p>
                Inbound orders are matched to the correct batch and location before
                loading. The system produces pick lists, rather than having them
                manually assembled, so dispatch teams pick stock by plan, rather than
                by searching the floor against the clock.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-30" data-animate>
            <div class="feature-card">
              <span class="feature-number">5</span>
              <h3>Batch &amp; Lot Traceability</h3>
              <p>
                Every batch is traced from receipt to the order it is shipped against,
                so if there is a quality issue, recall or customer query, it can be
                traced back to the exact lot and location rather than leading to a
                full facility search.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-30" data-animate>
            <div class="feature-card">
              <span class="feature-number">6</span>
              <h3>WMS&ndash;TMS Integration</h3>
              <p>
                Warehouse data flows through to the TMS touchpoints, so as goods move
                from storage to transport the one stock record is maintained and a new
                record is not created at the loading bay.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== INDUSTRIES WE SERVE ===== -->
    <section id="turnkey-industries" class="industries-section">
      <div class="container">

        <div class="industries-head">
          <h2 class="industries-title">Industries &amp; Segments We Serve</h2>

          <p class="industries-lead">
            Our warehouse management solutions support clients in temperature-sensitive
            industries &mdash; wherever stock accuracy, rotation and dispatch speed
            matter:
          </p>
        </div>

        <div class="industries-grid">
          <article class="industry-card" style="--industry-accent:#ff3b3b;">
            <div class="industry-card-head"><span class="industry-icon"><i class="fa fa-cutlery" aria-hidden="true"></i></span>
              <h3>Food &amp; Beverage</h3>
            </div>
            <ul>
              <li>Potato &amp; onion storage</li>
              <li>Vegetables &amp; fruits</li>
              <li>Dairy products</li>
              <li>Frozen foods</li>
              <li>Ready-to-eat</li>
            </ul>
          </article>
          <article class="industry-card">
            <div class="industry-card-head"><span class="industry-icon"><i class="fa fa-medkit" aria-hidden="true"></i></span>
              <h3>Pharmaceuticals</h3>
            </div>
            <ul>
              <li>GDP-compliant cold rooms</li>
              <li>Vaccine storage</li>
              <li>Temperature-sensitive APIs</li>
              <li>Medical supplies</li>
            </ul>
          </article>
          <article class="industry-card">
            <div class="industry-card-head"><span class="industry-icon"><i class="fa fa-anchor" aria-hidden="true"></i></span>
              <h3>Seafood &amp; Meat</h3>
            </div>
            <ul>
              <li>Blast freezing</li>
              <li>IQF processing lines</li>
              <li>Frozen storage</li>
              <li>Poultry processing</li>
            </ul>
          </article>
          <article class="industry-card">
            <div class="industry-card-head"><span class="industry-icon"><i class="fa fa-leaf" aria-hidden="true"></i></span>
              <h3>Horticulture &amp; Agri</h3>
            </div>
            <ul>
              <li>CA stores</li>
              <li>Ripening rooms</li>
              <li>Pre-cooling systems</li>
              <li>FPO and exporter projects</li>
            </ul>
          </article>
          <article class="industry-card">
            <div class="industry-card-head"><span class="industry-icon"><i class="fa fa-truck" aria-hidden="true"></i></span>
              <h3>Logistics &amp; 3PL</h3>
            </div>
            <ul>
              <li>Multi-temperature warehouses</li>
              <li>Refrigerated distribution hubs</li>
              <li>Cold chain logistics facilities</li>
              <li>3PL infrastructure</li>
            </ul>
          </article>
          <article class="industry-card">
            <div class="industry-card-head"><span class="industry-icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
              <h3>Retail &amp; FMCG</h3>
            </div>
            <ul>
              <li>Back-of-store cold rooms</li>
              <li>Supermarket chillers</li>
              <li>Distribution cold rooms</li>
              <li>Chain store infrastructure</li>
            </ul>
          </article>
        </div>
      </div>
    </section>
    <!-- ===== END INDUSTRIES ===== -->

    <section class="section-padding" id="why-singhania">
      <div class="container">
        <div class="text-center mb-45" data-animate>
          <span class="section-kicker">Why Singhania</span>
          <h2 class="section-h2">Why Choose Warehouse Management Over Manual or Spreadsheet-Based Tracking?</h2>
          <p>Most warehouse stock losses can be put down to a discrepancy between
            what the system says and what is actually on the floor. When receiving,
            rotation and dispatch are tracked on paper or in disconnected
            spreadsheets, ageing stock is missed, slots are double-booked and
            dispatch teams spend time searching instead of picking.</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-30" data-animate>
            <div class="trust-card">
              <h3>Single Source of Stock Truth</h3>
              <p> One system shows where each pallet is, the batch and the age, so the
                receiving team, floor team and dispatch team are all working from the
                same record rather than three different ones.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-30" data-animate>
            <div class="trust-card">
              <h3>Faster Receiving &amp; Dispatch</h3>
              <p>The system produces put-away and pick lists that are not manually
                compiled, which reduces the time stock waits to be logged or picked.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-30" data-animate>
            <div class="trust-card">
              <h3>Proactive Stock Rotation</h3>
              <p>FIFO/FEFO flags identify stock that is ageing before it becomes a
                write-off, rather than during a manual stock check.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-30" data-animate>
            <div class="trust-card">
              <h3>Optimized Space Utilization</h3>
              <p>Slot allocation is decided by real capacity and product type,
                allowing the facility to stock more usable inventory without
                over-crowding.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-30" data-animate>
            <div class="trust-card">
              <h3>Audit-Ready Records Without Reconstruction</h3>
              <p>Every movement is logged as it happens, so compliance and customer
                audits draw on existing records instead of being pieced together
                after the fact.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== ROLLOUT PROCESS ===== -->
    <section id="rollout-process" style="padding: 60px 0; background: #f8fafc;">
      <div class="container">

        <h2>Our 5-Stage Warehouse Management Rollout Process</h2>
        <p>
          Every Singhania Refrigeration warehouse management rollout follows a
          structured, milestone-driven process &mdash; so you always know what
          is happening and when.
        </p>

        <div class="table-wrap">
          <table class="compare-table">
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
                <td>Discovery &amp; Assessment</td>
                <td>Site visit, current process review, SKU and stock-volume profiling, gap analysis against existing registers or spreadsheets</td>
              </tr>
              <tr>
                <td>2</td>
                <td>System Design &amp; Configuration</td>
                <td>Slotting logic, rotation rules (FIFO/FEFO), user roles, and reporting formats configured to your product mix and facility layout</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Data Migration &amp; Integration</td>
                <td>Existing stock records migrated into the system; warehouse management linked to TMS touchpoints and any existing refrigeration monitoring</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Go-Live, Training &amp; Validation</td>
                <td>Led system training for receiving, floor and dispatch teams; run in parallel with the existing process to validate system accuracy before full cutover</td>
              </tr>
              <tr>
                <td>5</td>
                <td>Ongoing Support &amp; Optimization</td>
                <td>System maintenance planning, configuration changes based on your stock profile evolution, reporting support after go-live</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </section>
    <!-- ===== END ROLLOUT PROCESS ===== -->

    <!-- ===== WHY SINGHANIA REFRIGERATION ===== -->
    <section id="why-singhania" class="why-singhania-section">
      <div class="container">

        <div class="why-singhania-head">
          <span class="why-singhania-eyebrow">Why Choose Us</span>
          <h2 class="why-singhania-title">Why Singhania Refrigeration for Your Turnkey Cold Storage Project?</h2>
          <p class="why-singhania-lead">
            Choosing the right turnkey contractor is critical to the long-term operational performance of your facility.
          </p>
        </div>

        <div class="why-singhania-grid">
          <article class="singhania-card">
            <span class="singhania-icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
            <div>
              <h3>Warehouse Management Built Into the Facility, Not Bolted On</h3>
              <p>
                Instead of using a generic template, we customize the storage
                architecture and slotting logic to match your refrigeration system
                and product mix.</p>
            </div>
          </article>

          <article class="singhania-card">
            <span class="singhania-icon"><i class="fa fa-snowflake-o" aria-hidden="true"></i></span>
            <div>
              <h3>Coverage Across Warehouse &amp; Transport</h3>
              <p>
                The same stock record is kept from the cold room to the reefer
                truck thanks to WMS&ndash;TMS connectivity, preventing the handover
                to transport from creating a new paper trail.</p>
            </div>
          </article>

          <article class="singhania-card">
            <span class="singhania-icon"><i class="fa fa-bolt" aria-hidden="true"></i></span>
            <div>
              <h3>Built Around Your Stock Rotation Rules, Not a Fixed Template</h3>
              <p>
                FIFO and FEFO sequencing is configured around your product&rsquo;s
                shelf life and rotation requirements rather than a single guideline
                applied to every SKU.</p>
            </div>
          </article>

          <article class="singhania-card">
            <span class="singhania-icon"><i class="fa fa-handshake-o" aria-hidden="true"></i></span>
            <div>
              <h3>Deep Cold Chain Domain Knowledge</h3>
              <p>
                We are the complete cold chain &mdash; refrigeration engineering,
                facility layout, dock systems and IoT-based monitoring, all based
                on project experience, not a generic software rollout.</p>
            </div>
          </article>

          <article class="singhania-card">
            <span class="singhania-icon"><i class="fa fa-cubes" aria-hidden="true"></i></span>
            <div>
              <h3>Delhi NCR&ndash;Based, Pan-India Reach</h3>
              <p>
                Experience executing projects in food processing clusters and
                pharma parks outside Delhi NCR. Located in Okhla Industrial Area,
                New Delhi.</p>
            </div>
          </article>

          <article class="singhania-card">
            <span class="singhania-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
            <div>
              <h3>Part of a Full Cold Chain Offering</h3>
              <p>
                Warehouse management includes turnkey construction, refrigeration
                systems and transport refrigeration &mdash; one partner instead of
                an additional WMS vendor.</p>
            </div>
          </article>
          <article class="singhania-card">
            <span class="singhania-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
            <div>
              <h3>Proven Across Multiple Product Verticals</h3>
              <p>
                We have developed stock rotation and dispatch flow across the full
                range of cold chain applications, from potato and onion cold stores
                to pharmaceutical cold rooms, IQF processing lines and refrigerated
                logistics hubs.</p>
            </div>
          </article>
          <article class="singhania-card">
            <span class="singhania-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
            <div>
              <h3>AMC &amp; Ongoing Support</h3>
              <p>
                Not just during installation but after go-live &mdash; system
                upkeep, configuration changes and reporting support continues.
            </div>
          </article>
        </div>

      </div>
    </section>
    <!-- ===== END WHY SINGHANIA ===== -->
    <!--Section-8  -->
    <section class="faq-section section-padding " id="faq" style="background: #f8fafc;">
      <div class="container">

        <h2 class="section-h2 text-center mb-5">
          Frequently Asked Questions
        </h2>

        <?php

        $faqs = [
          [
            'q' => ' What is a cold storage warehouse management solution?',
            'a' => ' Process design and tracking software tracks every pallet, lot and SKU
        by location, batch and age inside your cold storage facility, from
        receiving through to despatch, so stock rotation and space planning
        happen by design.'
          ],
          [
            'q' => ' What does warehouse management track, exactly?',
            'a' => 'Stock location, batch age, receiving and dispatch movement, slot or
        space utilization, and rotation sequencing (FIFO/FEFO) at each stage.'
          ],
          [
            'q' => ' Does warehouse management cover dispatch and transport handover too?',
            'a' => 'Yes. Coverage extends to the Warehouse Management System (WMS) and
        Transport Management System (TMS) touchpoints, so the stock record
        follows the product out of the facility. '
          ],
          [
            'q' => ' How is stock rotation enforced &mdash; manually or by the system?',
            'a' => 'Systematically. FIFO/FEFO rules are compared against your product&rsquo;s
        shelf life, and stock due to move is flagged before pick and dispatch,
        not after in a manual check.'
          ],
          [
            'q' => '  Can warehouse management be added to an existing cold storage facility, or only new builds?',
            'a' => 'It can be added to an existing facility. We review your current
        layout, racking and operations, then design the slotting and
        rotation logic around what is already there.'
          ],
          [
            'q' => '  What is the typical rollout timeline for adding warehouse management to an existing facility?',
            'a' => 'Timelines vary depending on the size of the facility, the number of
        SKUs and stock currently on site, and the volume of data to be
        migrated from current registers or spreadsheets. After the initial
        assessment, we set a schedule for the rollout, including a parallel
        run prior to full cutover so operations are not disrupted.'
          ],
          [
            'q' => 'Does this help with compliance audits?',
            'a' => ' Yes. Stock movement, batch and location history is logged
        continuously, so audit and customer compliance checks can refer to
        existing records instead of having to be reconstructed after the
        event.'
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
    (function() {
      var els = document.querySelectorAll('[data-animate]');
      if (!('IntersectionObserver' in window)) {
        els.forEach(function(el) {
          el.classList.add('active');
        });
        return;
      }
      var io = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('active');
            io.unobserve(entry.target);
          }
        });
      }, {
        threshold: .16
      });
      els.forEach(function(el) {
        io.observe(el);
      });
    })();
  </script>
</body>

</html>
