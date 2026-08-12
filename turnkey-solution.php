<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    $pageTitle ='Turnkey Cold Storage Solutions | Singhania Refrigeration';
    $pageDescription ='End-to-end turnkey cold storage projects — design, PUF construction, refrigeration, racking and commissioning under one contract. Plan your project now.';
    ?>
    <?php include('head.php'); ?>
    <style>
      :root{
        --ink:#0f2442; --muted:#667085; --soft:#f6f8ff; --card:#ffffff; --line:#e7ecf5;
        --brand:#0e2344; --brand2:#082243;
      }

      /* ====== HERO / BREADCRUMB ====== */
      .rs-breadcrumbs.bg-7{
        position:relative; overflow:hidden;
        min-height:560px;
        display:flex;
        align-items:center;
        background:
          linear-gradient(90deg, rgba(6,18,38,.92) 0%, rgba(8,34,67,.78) 48%, rgba(8,34,67,.34) 100%),
          url('assets/images/breadcrumbs/7.jpg') center/cover no-repeat;
      }
      .rs-breadcrumbs.bg-7::before{
        content:""; position:absolute; inset:0;
        background:linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,0) 42%);
        pointer-events:none;
      }
      .rs-breadcrumbs .content-part{ padding:110px 0 130px; position:relative; z-index:1; }
      .hero-card{
        max-width:900px;
        padding:34px 32px;
        /* border-radius:18px;
        background:rgba(6,18,38,.62);
        border:1px solid rgba(255,255,255,.16);
        box-shadow:0 24px 70px rgba(0,0,0,.30);
        backdrop-filter:blur(8px) saturate(120%); */
      }
      .hero-eyebrow{
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
      .hero-card h1{
        font-size:clamp(32px,4.8vw,56px);
        line-height:1.05;
        margin:0 0 16px;
        color:#fff;
        font-weight:900;
        max-width:820px;
      }
      .hero-card p{ margin:0; color:#e6ecff; font-size:17px; line-height:1.78; max-width:820px; }
      .hero-points{
        display:flex;
        flex-wrap:wrap;
        gap:10px;
        margin-top:18px;
      }
      .hero-point{
        color:#eef4ff;
        background:rgba(255,255,255,.10);
        border:1px solid rgba(255,255,255,.14);
        border-radius:999px;
        padding:8px 12px;
        font-weight:700;
        font-size:13px;
      }
      @keyframes heroIn{ from{opacity:0; transform:translateY(18px) scale(.985)} to{opacity:1; transform:none} }

      /* ====== SECTIONS ====== */
      .section-pad{ padding:64px 0 90px; }
      .h2{ font-size:clamp(22px,2.6vw,28px); color:var(--ink); font-weight:800; margin:20px 0 10px; }
      .lead{ color:#2c3e68; font-size:clamp(15px,1.6vw,17px); }

      /* ====== OVERVIEW ====== */
      .overview-section{ padding:72px 0 84px; }
      .overview-row{ align-items:center; row-gap:34px; margin-left:-22px; margin-right:-22px; }
      .overview-row > [class*="col-"]{ padding-left:22px; padding-right:22px; }
      .overview-eyebrow{
        display:inline-block;
        color:#44516c;
        font-size:13px;
        font-weight:700;
        letter-spacing:.08em;
        text-transform:uppercase;
        margin-bottom:8px;
      }
      .overview-title{
        color:#1f1f23;
        font-size:clamp(30px,4vw,44px);
        line-height:1.05;
        font-weight:900;
        margin:0 0 26px;
        max-width:720px;
      }
      .overview-copy p{
        color:#3f3f46;
        font-size:17px;
        line-height:1.76;
        margin:0 0 24px;
        text-align:justify;
      }
      .overview-visual-wrap{
        height:100%;
        display:flex;
        align-items:center;
        justify-content:center;
      }
      .overview-visual{
        width:100%;
        max-width:520px;
        border-radius:14px;
        overflow:hidden;
        background:#eef3fb;
        box-shadow:0 20px 50px rgba(16,28,52,.16);
      }
      .overview-visual img{
        width:100%;
        aspect-ratio:16 / 10.5;
        object-fit:cover;
        display:block;
      }

      /* ====== SCOPE TIMELINE ====== */
      .scope-section{
        padding:76px 0 96px;
        background:#ffffff;
        overflow:hidden;
      }
      .scope-head{
        max-width:860px;
        margin:0 auto 42px;
        text-align:center;
      }
      .scope-eyebrow{
        display:inline-block;
        color:#44516c;
        font-size:13px;
        font-weight:800;
        letter-spacing:.08em;
        text-transform:uppercase;
        margin-bottom:8px;
      }
      .scope-title{
        color:#071735;
        font-size:clamp(34px,4vw,44px);
        line-height:1.08;
        font-weight:900;
        margin:0 0 18px;
      }
      .scope-lead{
        color:#52617d;
        font-size:16px;
        line-height:1.65;
        margin:0;
      }
      .scope-grid{
        display:grid;
        gap:28px;
        max-width:850px;
        margin:0 auto;
      }
      .scope-card{
        --scope-accent:#4169ff;
        position:relative;
        display:grid;
        grid-template-columns:88px minmax(0, 1fr);
        gap:18px;
        align-items:start;
      }
      .scope-card:not(:last-child)::before{
        content:"";
        position:absolute;
        left:43px;
        top:60px;
        bottom:-30px;
        width:2px;
        background:linear-gradient(180deg, #4169ff 0%, rgba(65,105,255,.64) 100%);
        z-index:0;
      }
      .scope-card-top{
        position:relative;
        z-index:1;
        min-height:56px;
        display:flex;
        align-items:center;
        justify-content:center;
      }
      .scope-card-top i{
        display:none;
      }
      .scope-num{
        width:48px;
        height:48px;
        border-radius:50%;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        background:#082243;
        color:#ffffff;
        font-size:18px;
        font-weight:900;
        letter-spacing:0;
        box-shadow:0 0 0 7px #ffffff;
      }
      .scope-card:first-child .scope-num{
        box-shadow:0 0 0 7px #ffffff, 0 0 0 14px rgba(65,105,255,.14);
      }
      .scope-card-body{
        background:#ffffff;
        border:1px solid rgba(65,105,255,.22);
        border-radius:12px;
        padding:18px 22px;
        box-shadow:0 12px 34px rgba(16,28,52,.04);
        transition:transform .25s ease, box-shadow .25s ease, border-color .25s ease;
      }
      .scope-card:hover .scope-card-body{
        transform:translateY(-3px);
        border-color:rgba(65,105,255,.36);
        box-shadow:0 18px 42px rgba(16,28,52,.08);
      }
      .scope-card h3{
        color:#071735;
        font-size:19px;
        line-height:1.35;
        font-weight:900;
        margin:0 0 6px;
      }
      .scope-card p{
        color:#52617d;
        text-align:left;
        font-size:15px;
        line-height:1.6;
        margin:0;
      }
      .scope-card ul{
        padding-left:18px;
        margin:0;
        color:#405070;
        font-size:14px;
        line-height:1.6;
      }

      /* ====== INDUSTRIES ====== */
      .industries-section{
        padding:76px 0 88px;
        background:#ffffff;
      }
      .industries-head{
        max-width:850px;
        margin:0 auto 54px;
        text-align:center;
      }
      .industries-title{
        color:#071735;
        font-size:clamp(30px,4vw,42px);
        line-height:1.08;
        font-weight:900;
        margin:0 0 18px;
      }
      .industries-lead{
        color:#293858;
        font-size:17px;
        line-height:1.7;
        margin:0;
      }
      .industries-grid{
        display:grid;
        grid-template-columns:repeat(3, minmax(0, 1fr));
        gap:24px;
      }
      .industry-card{
        --industry-accent:#2878ff;
        background:#ffffff;
        border:1px solid #dfe5ef;
        border-radius:10px;
        padding:24px 24px 26px;
        min-height:254px;
        box-shadow:0 10px 24px rgba(16,28,52,.04);
        transition:transform .25s ease, box-shadow .25s ease, border-color .25s ease;
      }
      .industry-card:hover{
        transform: translateY(-7px);
        border-color: rgba(0, 27, 104, .42);
        background: linear-gradient(180deg, #ffffff 0%, #f7f9ff 100%);
        box-shadow: 0 22px 48px rgba(0, 27, 104, .16);
      }
      .industry-card-head{
        display:flex;
        align-items:center;
        gap:16px;
        margin-bottom:20px;
      }
      .industry-icon{
        width:56px;
        height:56px;
        border-radius:10px;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        flex:0 0 56px;
        background:#071735;
        color:white ;
        font-size:24px;
      }
      .industry-card h3{
        color:#071735;
        font-size:18px;
        line-height:1.3;
        font-weight:900;
        margin:0;
      }
      /* .industry-card h3:after{
        content:"";
        display:block;
        width:32px;
        height:2px;
        background:#e56b16;
        margin-top:8px;
      } */
      .industry-card ul{
        list-style:none;
        padding:0;
        margin:0;
        display:grid;
        gap:10px;
      }
      .industry-card li{
        position:relative;
        color:#071735;
        font-size:14px;
        line-height:1.45;
        padding-left:14px;
      }
      .industry-card li:before{
        content:"";
        position:absolute;
        left:0;
        top:.62em;
        width:6px;
        height:6px;
        border-radius:50%;
        background:#071735;
      }

      /* ====== WHY TURNKEY ====== */
      .why-turnkey-section{
        padding:82px 0 92px;
        background:linear-gradient(180deg,#f8fafc 0%,#eef3fb 100%);
      }
      .why-turnkey-shell{
        display:grid;
        grid-template-columns:minmax(0,.92fr) minmax(0,1.08fr);
        gap:34px;
        align-items:stretch;
      }
      .why-turnkey-intro{
        background:#082243;
        color:#ffffff;
        border-radius:16px;
        padding:34px 32px;
        box-shadow:0 22px 50px rgba(8,34,67,.18);
      }
      .why-eyebrow{
        display:inline-block;
        font-size:12px;
        font-weight:800;
        letter-spacing:.12em;
        text-transform:uppercase;
        color:#cdd9f4;
        margin-bottom:12px;
      }
      .why-title{
        color:#ffffff;
        font-size:clamp(28px,3.6vw,42px);
        line-height:1.08;
        font-weight:900;
        margin:0 0 18px;
      }
      .why-turnkey-intro p{
        color:#e6ecff;
        font-size:16px;
        line-height:1.75;
        margin:0 0 16px;
      }
      .why-risk-box{
        margin-top:22px;
        padding:16px 18px;
        border-radius:12px;
        background:rgba(255,255,255,.10);
        border:1px solid rgba(255,255,255,.16);
        color:#ffffff;
        font-weight:800;
      }
      .why-benefits{
        display:grid;
        grid-template-columns:repeat(2, minmax(0,1fr));
        gap:16px;
      }
      .why-card{
        background:#ffffff;
        border:1px solid #dfe5ef;
        border-radius:12px;
        padding:20px 20px 22px;
        box-shadow:0 10px 24px rgba(16,28,52,.06);
        transition:transform .25s ease, box-shadow .25s ease, border-color .25s ease;
      }
      .why-card:hover{
        transform: translateY(-7px);
        border-color: rgba(0, 27, 104, .42);
        background: linear-gradient(180deg, #ffffff 0%, #f7f9ff 100%);
        box-shadow: 0 22px 48px rgba(0, 27, 104, .16);
      }
      .why-icon{
        width:42px;
        height:42px;
        border-radius:10px;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        background:#082243;
        color:#ffffff;
        font-size:18px;
        margin-bottom:14px;
      }
      .why-card h3{
        color:#071735;
        font-size:17px;
        line-height:1.35;
        font-weight:900;
        margin:0 0 8px;
      }
      .why-card p{
        color:#405070;
        font-size:14px;
        line-height:1.62;
        margin:0;
      }

      /* ====== PROCESS ====== */
      .process-section{
        padding:78px 0 90px;
        background:#ffffff;
      }
      .process-head{
        max-width:860px;
        margin:0 auto 42px;
        text-align:center;
      }
      .process-eyebrow{
        display:inline-block;
        color:#44516c;
        font-size:13px;
        font-weight:800;
        letter-spacing:.08em;
        text-transform:uppercase;
        margin-bottom:8px;
      }
      .process-title{
        color:#071735;
        font-size:clamp(30px,4vw,42px);
        line-height:1.08;
        font-weight:900;
        margin:0 0 16px;
      }
      .process-lead{
        color:#293858;
        font-size:17px;
        line-height:1.7;
        margin:0;
      }
      .process-steps{
        display:grid;
        gap:18px;
        position:relative;
      }
      .process-step{
        display:grid;
        grid-template-columns:86px minmax(0, 1fr);
        gap:18px;
        align-items:stretch;
      }
      .process-stage{
        background:#082243;
        color:#ffffff;
        border-radius:50%;
        /* min-height:118px; */
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
        box-shadow:0 14px 30px rgba(8,34,67,.18);
        opacity:0;
        transform:translateX(46px);
        transition:opacity .55s ease, transform .55s ease;
      }
      .process-stage strong{
        font-size:34px;
        line-height:1;
        margin-top:6px;
        transition:transform .25s ease, box-shadow .25s ease, border-color .25s ease;
      }
      .process-card{
        background:#ffffff;
        border:1px solid #dfe5ef;
        border-radius:14px;
        padding:22px 24px;
        box-shadow:0 10px 24px rgba(16,28,52,.06);
        opacity:0;
        transform:translateX(-46px);
        transition:opacity .55s ease .08s, transform .55s ease .08s, box-shadow .25s ease, border-color .25s ease;
      }
      .process-step.active .process-stage,
      .process-step.active .process-card{
        opacity:1;
        transform:none;
      }
      .process-card:hover{
        transform:translateY(-4px);
        border-color:rgba(8,34,67,.18);
        box-shadow:0 18px 38px rgba(16,28,52,.12);
      }
      .process-card h3{
        color:#071735;
        font-size:19px;
        font-weight:900;
        line-height:1.3;
        margin:0 0 8px;
      }
      .process-card p{
        color:#405070;
        font-size:15px;
        line-height:1.7;
        margin:0;
      }

      /* ====== WHY SINGHANIA ====== */
      .why-singhania-section{
        padding:78px 0 90px;
        background:#f8fafc;
      }
      .why-singhania-head{
        max-width:900px;
        margin:0 auto 40px;
        text-align:center;
      }
      .why-singhania-eyebrow{
        display:inline-block;
        color:#44516c;
        font-size:13px;
        font-weight:800;
        letter-spacing:.08em;
        text-transform:uppercase;
        margin-bottom:8px;
      }
      .why-singhania-title{
        color:#071735;
        font-size:clamp(30px,4vw,42px);
        line-height:1.08;
        font-weight:900;
        margin:0 0 16px;
      }
      .why-singhania-lead{
        color:#293858;
        font-size:17px;
        line-height:1.7;
        margin:0;
      }
      .why-singhania-grid{
        display:grid;
        grid-template-columns:repeat(2, minmax(0,1fr));
        gap:20px;
      }
      .singhania-card{
        background:#ffffff;
        border:1px solid #dfe5ef;
        border-radius:14px;
        padding:24px;
        display:grid;
        grid-template-columns:56px minmax(0,1fr);
        gap:18px;
        box-shadow:0 10px 24px rgba(16,28,52,.06);
        transition:transform .25s ease, box-shadow .25s ease, border-color .25s ease;
      }
      .singhania-card:hover{
        transform: translateY(-7px);
        border-color: rgba(0, 27, 104, .42);
        background: linear-gradient(180deg, #ffffff 0%, #f7f9ff 100%);
        box-shadow: 0 22px 48px rgba(0, 27, 104, .16);
      }
      .singhania-icon{
        width:56px;
        height:56px;
        border-radius:12px;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        background:#082243;
        color:#ffffff;
        font-size:22px;
      }
      .singhania-card h3{
        color:#071735;
        font-size:18px;
        line-height:1.35;
        font-weight:900;
        margin:0 0 8px;
      }
      .singhania-card p{
        color:#405070;
        font-size:14px;
        line-height:1.68;
        margin:0;
      }

      /* ====== MEDIA ====== */
      .turnkey-media{
        position:relative; border-radius:16px; overflow:hidden;
        background:#0b1530; box-shadow:0 24px 60px rgba(16,28,52,.18);
      }
      .turnkey-media img{
        width:100%; height:auto; display:block; aspect-ratio:16/10; object-fit:cover;
        transform:scale(1.001); transition:transform .6s ease;
      }
      .turnkey-media:hover img{ transform:scale(1.03); }

      /* ====== CARDS / LISTS ====== */
      .card-lite{
        background:var(--card); border:1px solid var(--line); border-radius:16px;
        padding:clamp(18px,3vw,24px); box-shadow:0 12px 30px rgba(16,28,52,.08);
      }
      .checklist{ list-style:none; padding:0; margin:10px 0 0; display:grid; gap:10px; }
      .checklist li{ position:relative; padding-left:28px; color:#2d3c63; }
      .checklist li::before{
        content:""; position:absolute; left:0; top:6px; width:18px; height:18px; border-radius:50%;
        background:conic-gradient(from 180deg,#3b5bb7,#2a427f); box-shadow:inset 0 0 0 3px #fff;
      }

      /* ====== CTA ====== */
      .cta-bar{ margin-top:24px; display:flex; gap:12px; flex-wrap:wrap; }
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
      /* .btn-brand. {
        background:transparent;
        color:#ffffff;
        border-color:rgba(255,255,255,.32);
        box-shadow:none;
      }
      .btn-brand. :hover{ background:rgba(255,255,255,.10); color:#ffffff; } */

      /* ====== Reveal-on-scroll ====== */
      [data-animate]{ opacity:0; transform:translateY(22px) scale(.985); transition:all .7s cubic-bezier(.2,.65,.3,1); }
      [data-animate].active{ opacity:1; transform:none; }
      .scope-card[data-animate]:nth-child(1){ transition-delay:.04s; }
      .scope-card[data-animate]:nth-child(2){ transition-delay:.12s; }
      .scope-card[data-animate]:nth-child(3){ transition-delay:.20s; }
      .scope-card[data-animate]:nth-child(4){ transition-delay:.28s; }
      .scope-card[data-animate]:nth-child(5){ transition-delay:.36s; }
      .scope-card[data-animate]:nth-child(6){ transition-delay:.44s; }
      .scope-card[data-animate]:nth-child(7){ transition-delay:.52s; }
      .scope-card[data-animate]:nth-child(8){ transition-delay:.60s; }

      @media (max-width: 991px){
        .rs-breadcrumbs.bg-7{ min-height:auto; }
        .rs-breadcrumbs .content-part{ padding:92px 0 110px; }
        .hero-card{ padding:26px 22px; }
        .overview-section{ padding:56px 0 66px; }
        .overview-row{ margin-left:-15px; margin-right:-15px; }
        .overview-row > [class*="col-"]{ padding-left:15px; padding-right:15px; }
        .overview-title{ max-width:100%; }
        .overview-visual{ max-width:100%; }
        .scope-section{ padding:60px 0 76px; }
        .scope-grid{ max-width:760px; gap:24px; }
        .industries-section{ padding:60px 0 70px; }
        .industries-head{ margin-bottom:34px; }
        .industries-grid{ grid-template-columns:repeat(2, minmax(0, 1fr)); gap:18px; }
        .why-turnkey-section{ padding:60px 0 70px; }
        .why-turnkey-shell{ grid-template-columns:1fr; }
        .process-section{ padding:60px 0 70px; }
        .why-singhania-section{ padding:60px 0 70px; }
        .why-singhania-grid{ grid-template-columns:1fr; }
      }
      @media (max-width: 767px){
        .overview-copy{ order:1; }
        .overview-visual-col{ order:2; }
        .overview-copy p{ font-size:16px; line-height:1.68; }
        .scope-head{ margin-bottom:30px; text-align:left; }
        .scope-card{ grid-template-columns:58px minmax(0, 1fr); gap:14px; }
        .scope-card:not(:last-child)::before{ left:28px; top:52px; bottom:-26px; }
        .scope-card-top{ min-height:48px; }
        .scope-num{ width:40px; height:40px; font-size:16px; box-shadow:0 0 0 5px #ffffff; }
        .scope-card:first-child .scope-num{ box-shadow:0 0 0 5px #ffffff, 0 0 0 10px rgba(65,105,255,.14); }
        .scope-card-body{ padding:16px 17px; border-radius:10px; }
        .scope-card h3{ font-size:17px; }
        .scope-card p{ font-size:14px; }
        .industries-grid{ grid-template-columns:1fr; }
        .industry-card{ min-height:auto; }
        .why-benefits{ grid-template-columns:1fr; }
        .why-turnkey-intro{ padding:26px 22px; }
        .process-head{ text-align:left; margin-bottom:30px; }
        .process-step{ grid-template-columns:1fr; gap:10px; }
        .process-stage{ min-height:auto; flex-direction:row; justify-content:flex-start; gap:10px; padding:14px 16px; }
        .process-stage strong{ font-size:24px; margin-top:0; }
        .singhania-card{ grid-template-columns:1fr; }
      }
    </style>
  </head>

  <body>
    <?php include('header.php'); ?>

    <!-- Main content Start -->
    <div class="main-content">

      <!-- Hero / Breadcrumb -->
      <div class="rs-breadcrumbs bg-7">
        <div class="container">
          <div class="content-part">
            <div class="hero-card">
              <span class="hero-eyebrow">Service</span>
              <h1 class="mb-10">End-to-End Turnkey Cold Storage Solutions in India</h1>
              <p>  From the first feasibility study to commissioning, validation and continuous
                    AMC &mdash; Singhania Refrigeration takes care of your entire cold storage
                    project under one contract. As your Cold Storage EPC Contractor we take care
                    of end to end design &amp; build, civil &amp; refrigeration execution and cold
                    chain infrastructure development. You receive a complete, performance-tested cold chain facility.</p>
              <div class="hero-points">
                <span class="hero-point">Design &amp; BOQ</span>
                <span class="hero-point">Civil + Refrigeration</span>
                <span class="hero-point">Commissioning &amp; AMC</span>
              </div>
              <!-- CTA buttons -->
              <div class="cta-bar">
                <a href="contact" class="btn-brand">Get a Free Quote </a>
                <a href="tel:+919971060822" class="btn-brand"> Call Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- Hero End -->

      <!-- Section 2 Start -->
      <!-- Turnkey Overview -->
      <!-- ===== WHAT IS A TURNKEY COLD STORAGE SOLUTION ===== -->
<section id="what-is-turnkey-cold-storage" class="overview-section">
  <div class="container">
    <div class="row overview-row">
      <div class="col-lg-7 overview-copy">
        <span class="overview-eyebrow">Overview</span>
        <h2 class="overview-title">What Is a Turnkey Cold Storage Solution?</h2>

        <p>
          A turnkey cold storage solution is a comprehensive, single-contract method
          for building <a href="/">industrial refrigeration and cold storage solutions</a>. One company &mdash; Singhania
          Refrigeration &mdash; handles every aspect of the project, from site assessment
          and heat load calculation to civil and PEB construction, refrigeration
          engineering, insulated panel installation, electrical and automation works,
          commissioning, validation and post-handover AMC.
        </p>
        <p>
          You manage one team, one contract, one accountability &mdash; rather than
          trying to coordinate a civil contractor, refrigeration vendor, panel supplier
          and automation firm separately, who could be working against each other&rsquo;s
          timelines.
        </p>
        <p>
          This delivery model is also referred to as cold storage EPC (Engineering,
          Procurement and Construction) &mdash; and the company executing it may be
          referred to as an EPC turnkey cold storage contractor, cold storage
          construction company, or industrial refrigeration turnkey contractor. The
          model remains the same: one responsible partner from blueprint to handover.
          The terminology varies by industry and region.
        </p>
      </div>
      <div class="col-lg-5 overview-visual-col">
        <div class="overview-visual-wrap">
          <div class="overview-visual">
            <img src="assets\images\solutions\life-cycle.png"
                 alt="Turnkey cold storage project life cycle"
                 loading="lazy"
                 decoding="async">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ===== END DEFINITION SECTION ===== -->

<!-- ===== SCOPE OF WORK — 8 SUB-SECTIONS ===== -->
<section id="turnkey-scope-of-work" class="scope-section">
  <div class="container">

    <div class="scope-head">
      <span class="scope-eyebrow">Scope of Work</span>
      <h2 class="scope-title">What Our Turnkey Projects Include</h2>
      <p class="scope-lead">
      Singhania Refrigeration&rsquo;s turnkey cold storage projects cover the entire
      infrastructure stack &mdash; from foundation slab to IoT monitoring &mdash;
      under a single project manager. Whether you&rsquo;re starting from scratch with
      a brand new cold storage plant, or doing a design-and-build renovation of an
      existing facility, the scope and accountability are the same.
      </p>
    </div>

    <div class="scope-grid">
      <article class="scope-card" style="--scope-accent:#2878ff;" data-animate>
        <div class="scope-card-top"><i class="fa fa-clipboard" aria-hidden="true"></i><span class="scope-num">1</span></div>
        <div class="scope-card-body"><h3>Consulting, Feasibility &amp; Design</h3><p>Site visit, product profiling, heat-load calculation, layout design, BOQ, cost estimate, energy modelling and compliance documentation.</p></div>
      </article>
      <article class="scope-card" style="--scope-accent:#5b6f8c;" data-animate>
        <div class="scope-card-top"><i class="fa fa-building" aria-hidden="true"></i><span class="scope-num">2</span></div>
        <div class="scope-card-body"><h3>Civil Works &amp; PEB Structures</h3><p>Foundations, anti-skid insulated flooring, drainage, utilities and pre-engineered steel structures scaled to your capacity requirements.</p></div>
      </article>
      <article class="scope-card" style="--scope-accent:#10aeca;" data-animate>
        <div class="scope-card-top"><i class="fa fa-snowflake-o" aria-hidden="true"></i><span class="scope-num">3</span></div>
        <div class="scope-card-body"><h3>Refrigeration Systems</h3><p>Freon and Ammonia systems including compressor racks, evaporators, condensers and chillers sized for product type and tonnage.</p></div>
      </article>
      <article class="scope-card" style="--scope-accent:#ad3cff;" data-animate>
        <div class="scope-card-top"><i class="fa fa-thermometer-full" aria-hidden="true"></i><span class="scope-num">4</span></div>
        <div class="scope-card-body"><h3>Specialised Environments</h3><p>IQF tunnels, blast freezers, CA/MA storage, ripening rooms and pre-cooling systems for diverse product requirements.</p></div>
      </article>
      <article class="scope-card" style="--scope-accent:#f28a00;" data-animate>
        <div class="scope-card-top"><i class="fa fa-cube" aria-hidden="true"></i><span class="scope-num">5</span></div>
        <div class="scope-card-body"><h3>Building Envelope</h3><p>PUF insulated panels, cold storage doors, CA doors, dock shelters and dock levelers to reduce temperature ingress.</p></div>
      </article>
      <article class="scope-card" style="--scope-accent:#e4a600;" data-animate>
        <div class="scope-card-top"><i class="fa fa-bolt" aria-hidden="true"></i><span class="scope-num">6</span></div>
        <div class="scope-card-body"><h3>Electrical &amp; Automation</h3><p>MCC/PLC control panels, cabling, lighting and automation for compressor status, temperature zones, defrost cycles and alarms.</p></div>
      </article>
      <article class="scope-card" style="--scope-accent:#09b37d;" data-animate>
        <div class="scope-card-top"><i class="fa fa-archive" aria-hidden="true"></i><span class="scope-num">7</span></div>
        <div class="scope-card-body"><h3>Process Equipment</h3><p>Packing and grading lines, conveyor systems and heavy-duty pallet racking from receiving dock to dispatch bay.</p></div>
      </article>
      <article class="scope-card" style="--scope-accent:#f40b52;" data-animate>
        <div class="scope-card-top"><i class="fa fa-line-chart" aria-hidden="true"></i><span class="scope-num">8</span></div>
        <div class="scope-card-body"><h3>IoT &amp; AMC Support</h3><p>Temperature and humidity sensors, real-time data logging, remote alarms, audit trails and preventive maintenance support.</p></div>
      </article>
    </div>

    <div class="scope-legacy" style="display:none;">

    <!-- Sub-section 1 -->
    <h3>1. Consulting, Feasibility &amp; Design</h3>
    <p>
      Each project starts with a thorough site visit, product profiling and heat
      load calculation. This leads into a full cold storage feasibility study
      including layout, BOQ, capital cost estimate, energy modelling and regulatory
      compliance documentation. Our cold storage project consultants are aligned
      with you on scope before construction starts &mdash; no surprises when work
      begins.
    </p>

    <!-- Sub-section 2 -->
    <h3>2. Civil Works &amp; Pre-Engineered Buildings (PEB)</h3>
    <p>
      Our team handles all civil works: foundations, anti-skid insulated flooring,
      drainage and utilities. We provide pre-engineered cold storage construction for
      improved and faster thermal performance. PEB steel structures are custom-scaled
      to meet your capacity requirements.
    </p>

    <!-- Sub-section 3 -->
    <h3>3. Refrigeration Systems &mdash; Freon &amp; Ammonia</h3>
    <p>
      We supply, install and design Freon and Ammonia refrigeration systems. This
      includes multi-zone compressor racks, evaporators, condensers and chiller
      packages &mdash; all sized to match your product type, temperature range and
      storage tonnage. Our systems are designed for energy efficiency and minimum
      downtime.
    </p>

    <!-- Sub-section 4 -->
    <h3>4. Specialised Temperature-Controlled Environments</h3>
    <p>In addition to standard cold storage facilities, we also design and build:</p>
    <ul>
      <li>Individual Quick Freezing (IQF) tunnels for food processing lines</li>
      <li>Blast freezers and blast chillers for rapid product pull-down</li>
      <li>Controlled/Modified Atmosphere (CA/MA) Storage for extended shelf life of produce</li>
      <li>Ripening rooms for bananas, mangoes and other tropical fruits</li>
      <li>Pre-cooling systems for post-harvest handling</li>
    </ul>

    <!-- Sub-section 5 -->
    <h3>5. Building Envelope &mdash; PUF Panels, Doors &amp; Dock Systems</h3>
    <p>
      Your facility&rsquo;s thermal envelope is made of high-performance PUF
      (Polyurethane Foam) insulated sandwich panels. We supply and install insulated
      cold storage doors, CA doors with hermetic seals, dock shelters and dock
      levellers &mdash; preventing temperature ingress during loading and unloading.
    </p>

    <!-- Sub-section 6 -->
    <h3>6. Electrical Works, Control Panels &amp; Automation</h3>
    <p>
      All projects include complete electrical infrastructure: MCC/PLC industrial
      control panels, cabling, lighting and refrigeration automation. Our control
      systems centralise monitoring of compressor status, temperature zones, defrost
      cycles and alarm triggers &mdash; reducing manual intervention and improving
      uptime.
    </p>

    <!-- Sub-section 7 -->
    <h3>7. Process Equipment &amp; Material Handling</h3>
    <p>
      We integrate packing and grading lines, conveyor systems and heavy-duty pallet
      racking to complete your facility&rsquo;s operational flow &mdash; from the
      receiving dock to the dispatch bay.
    </p>

    <!-- Sub-section 8 -->
    <h3>8. IoT Monitoring, AMC &amp; After-Sales Support</h3>
    <p>
      After commissioning, we install IoT temperature and humidity sensors with
      real-time data logging, remote alarms and audit trails for regulatory
      compliance. Our Annual Maintenance Contract (AMC) guarantees your facility
      operates at peak efficiency with scheduled preventive maintenance and priority
      breakdown response &mdash; 365 days a year.
    </p>

    </div>
  </div>
</section>
<!-- ===== END SCOPE OF WORK ===== -->

<!-- ===== INDUSTRIES WE SERVE ===== -->
<section id="turnkey-industries" class="industries-section">
  <div class="container">

    <div class="industries-head">
      <h2 class="industries-title">Industries &amp; Segments We Serve</h2>

      <p class="industries-lead">
      Our cold chain solutions and turnkey cold storage projects help clients in
      temperature-sensitive industries &mdash; from food and agriculture to
      pharmaceuticals and 3PL logistics.
      </p>
    </div>

    <div class="industries-grid">
      <article class="industry-card" style="--industry-accent:#ff3b3b;">
        <div class="industry-card-head"><span class="industry-icon"><i class="fa fa-apple" aria-hidden="true"></i></span><h3>Food &amp; Beverage</h3></div>
        <ul><li>Potato &amp; onion storage</li><li>Vegetables &amp; fruits</li><li>Dairy products</li><li>Frozen foods</li><li>Ready-to-eat</li></ul>
      </article>
      <article class="industry-card">
        <div class="industry-card-head"><span class="industry-icon"><i class="fa fa-medkit" aria-hidden="true"></i></span><h3>Pharmaceuticals</h3></div>
        <ul><li>GDP-compliant cold rooms</li><li>Vaccine storage</li><li>Temperature-sensitive APIs</li><li>Medical supplies</li></ul>
      </article>
      <article class="industry-card">
        <div class="industry-card-head"><span class="industry-icon"><i class="fa fa-anchor" aria-hidden="true"></i></span><h3>Seafood &amp; Meat</h3></div>
        <ul><li>Blast freezing</li><li>IQF processing lines</li><li>Frozen storage</li><li>Poultry processing</li></ul>
      </article>
      <article class="industry-card">
        <div class="industry-card-head"><span class="industry-icon"><i class="fa fa-leaf" aria-hidden="true"></i></span><h3>Horticulture &amp; Agri</h3></div>
        <ul><li>CA stores</li><li>Ripening rooms</li><li>Pre-cooling systems</li><li>FPO and exporter projects</li></ul>
      </article>
      <article class="industry-card">
        <div class="industry-card-head"><span class="industry-icon"><i class="fa fa-truck" aria-hidden="true"></i></span><h3>Logistics &amp; 3PL</h3></div>
        <ul><li>Multi-temperature warehouses</li><li>Refrigerated distribution hubs</li><li>Cold chain logistics facilities</li><li>3PL infrastructure</li></ul>
      </article>
      <article class="industry-card">
        <div class="industry-card-head"><span class="industry-icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span><h3>Retail &amp; FMCG</h3></div>
        <ul><li>Back-of-store cold rooms</li><li>Supermarket chillers</li><li>Distribution cold rooms</li><li>Chain store infrastructure</li></ul>
      </article>
    </div>    
  </div>
</section>
<!-- ===== END INDUSTRIES ===== -->

<!-- ===== WHY CHOOSE TURNKEY ===== -->
<section id="why-choose-turnkey" class="why-turnkey-section">
  <div class="container">
    <div class="why-turnkey-shell">
      <div class="why-turnkey-intro">
        <span class="why-eyebrow">Why Turnkey</span>
        <h2 class="why-title">One partner is easier to trust than five vendors to chase.</h2>
        <p>
          The main reason for failure in most cold storage projects is poor coordination between vendors.
          If your civil contractor, refrigeration supplier and panel manufacturer are not aligned, you can
          end up with thermal bridges, undersized compressors and costly commissioning delays.
        </p>
        <p>
          As your cold storage EPC contractor, Singhania Refrigeration keeps scope, engineering, execution
          and after-sales ownership under one accountable team.
        </p>
        <div class="why-risk-box">One contract. One project manager. One performance-tested facility.</div>
      </div>

      <div class="why-benefits">
        <article class="why-card">
          <span class="why-icon"><i class="fa fa-check" aria-hidden="true"></i></span>
          <h3>Single Point of Responsibility</h3>
          <p>One team, one contract and one ultimate accountability from initial scope through commissioning.</p>
        </article>
        <article class="why-card">
          <span class="why-icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
          <h3>Faster Project Delivery</h3>
          <p>No interdependency delays between trades. Integrated project management keeps timelines tight.</p>
        </article>
        <article class="why-card">
          <span class="why-icon"><i class="fa fa-cogs" aria-hidden="true"></i></span>
          <h3>Engineering-Led Design</h3>
          <p>The refrigeration system defines the building envelope, reducing over-engineering and energy waste.</p>
        </article>
        <article class="why-card">
          <span class="why-icon"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
          <h3>Transparent BOQ</h3>
          <p>A detailed Bill of Quantities from day one helps avoid hidden cost escalations after construction starts.</p>
        </article>
        <article class="why-card">
          <span class="why-icon"><i class="fa fa-refresh" aria-hidden="true"></i></span>
          <h3>Lifecycle Ownership</h3>
          <p>We commission what we design and maintain what we build, so the performance guarantee does not end at handover.</p>
        </article>
        <article class="why-card">
          <span class="why-icon"><i class="fa fa-shield" aria-hidden="true"></i></span>
          <h3>Lower Execution Risk</h3>
          <p>Design, civil, refrigeration, controls and AMC stay aligned under one delivery plan and one escalation path.</p>
        </article>
      </div>
    </div>
  </div>
</section>
<!-- ===== END WHY CHOOSE TURNKEY ===== -->
<!-- ===== 5-STAGE PROCESS ===== -->
<section id="turnkey-process" class="process-section">
  <div class="container">

    <div class="process-head">
      <span class="process-eyebrow">Our Process</span>
      <h2 class="process-title">Our 5-Stage Turnkey Project Process</h2>
      <p class="process-lead">
        Every turnkey cold storage project follows a defined, milestone-driven process, so you always know what is happening and where you are in the project cycle.
      </p>
    </div>

    <div class="process-steps">
      <div class="process-step" data-animate>
        <div class="process-stage"><strong>1</strong></div>
        <div class="process-card">
          <h3>Discovery &amp; Feasibility</h3>
          <p>Site visit, product profiling, heat load calculation, capacity planning, ROI modelling and regulatory mapping.</p>
        </div>
      </div>

      <div class="process-step" data-animate>
        <div class="process-stage"><strong>2</strong></div>
        <div class="process-card">
          <h3>Engineering &amp; Approvals</h3>
          <p>Detailed design drawings, structural engineering, equipment specifications, energy modelling, compliance submissions and master project schedule.</p>
        </div>
      </div>

      <div class="process-step" data-animate>
        <div class="process-stage"><strong>3</strong></div>
        <div class="process-card">
          <h3>Procurement &amp; Civil Execution</h3>
          <p>PEB structure erection, civil works, PUF panel fabrication and installation, and electrical infrastructure coordinated under a single project manager.</p>
        </div>
      </div>

      <div class="process-step" data-animate>
        <div class="process-stage"><strong>4</strong></div>
        <div class="process-card">
          <h3>Refrigeration Installation &amp; Commissioning</h3>
          <p>Equipment erection, refrigerant piping, controls integration, cold pull-down, temperature mapping, validation testing and handover documentation.</p>
        </div>
      </div>

      <div class="process-step" data-animate>
        <div class="process-stage"><strong>5</strong></div>
        <div class="process-card">
          <h3>AMC &amp; Performance Monitoring</h3>
          <p>Scheduled preventive maintenance, IoT-based performance monitoring, energy audits, 24/7 breakdown response and annual compliance reporting.</p>
        </div>
      </div>
    </div>

  </div>
</section>
<!-- ===== END PROCESS TABLE ===== -->

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
          <h3>Delhi NCR - Pan-India Reach</h3>
          <p>Located in Okhla Industrial Area, New Delhi, with project execution experience across Delhi NCR, North India and pan-India cold chain clusters.</p>
        </div>
      </article>

      <article class="singhania-card">
        <span class="singhania-icon"><i class="fa fa-snowflake-o" aria-hidden="true"></i></span>
        <div>
          <h3>Deep Cold Chain Domain Knowledge</h3>
          <p>From ammonia plant engineering and PUF panels to dock systems, CA stores and IoT monitoring, every decision is grounded in project experience.</p>
        </div>
      </article>

      <article class="singhania-card">
        <span class="singhania-icon"><i class="fa fa-bolt" aria-hidden="true"></i></span>
        <div>
          <h3>Energy-Efficient by Default</h3>
          <p>Systems are sized precisely against heat load and product requirements, reducing power bills and improving operational ROI.</p>
        </div>
      </article>

      <article class="singhania-card">
        <span class="singhania-icon"><i class="fa fa-handshake-o" aria-hidden="true"></i></span>
        <div>
          <h3>One Partner, Full Lifecycle</h3>
          <p>We stay with your project from the first site visit to annual AMC, so accountability gaps do not get passed to you.</p>
        </div>
      </article>

      <article class="singhania-card">
        <span class="singhania-icon"><i class="fa fa-cubes" aria-hidden="true"></i></span>
        <div>
          <h3>Proven Across Product Verticals</h3>
          <p>Potato and onion stores, pharma cold rooms, IQF lines, CA stores and refrigerated logistics hubs are all within our execution experience.</p>
        </div>
      </article>

      <article class="singhania-card">
        <span class="singhania-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
        <div>
          <h3>Regulatory &amp; Compliance Ready</h3>
          <p>Facilities are designed for FSSAI, APEDA and GDP/GMP cold room requirements, with temperature mapping and audit trails built in.</p>
        </div>
      </article>
    </div>

  </div>
</section>
<!-- ===== END WHY SINGHANIA ===== -->

<!--FAQ SECTION-->
  <section class="faq-section section-padding bg-white" id="faq">
    <div class="container">

      <h2 class="section-h2 text-center mb-5">
        Frequently Asked Questions
      </h2>

      <?php

      $faqs = [
        [
          'q' => 'What does a turnkey cold storage solution include?',
          'a' => 'A turnkey cold storage solution covers the entire project lifecycle under a single contract: site assessment and heat load calculation, civil and PEB construction, PUF panel installation, refrigeration system design and installation, electrical and control panel works, IoT monitoring setup, commissioning, temperature mapping and post-handover AMC.'
        ],
        [
          'q' => 'What is the difference between a turnkey cold storage contractor and a regular cold storage builder?',
          'a' => 'A regular cold storage builder may handle only construction or refrigeration, leaving you to coordinate multiple vendors. A turnkey cold storage contractor like Singhania Refrigeration covers design, civil works, refrigeration, electrical, automation, commissioning and AMC under one contract with single-point accountability.'
        ],
        [
          'q' => 'Can I hire a single EPC contractor for a cold storage warehouse instead of separate vendors?',
          'a' => 'Yes. Singhania Refrigeration acts as a single EPC contractor for cold storage warehouse projects, covering design, civil execution, refrigeration, electrical works, automation and commissioning under one contract. This removes the coordination risk of managing civil, refrigeration and panel vendors separately.'
        ],
        [
          'q' => 'What is the typical timeline for a turnkey cold storage project in India?',
          'a' => 'Timelines depend on capacity and complexity. A modular cold room project up to 500 MT typically takes 8 to 14 weeks from design sign-off to commissioning. Larger multi-temperature warehouses of 1,000 to 5,000 MT generally require 16 to 26 weeks. We provide a detailed milestone schedule at the start of every project.'
        ],
        [
          'q' => 'What is the approximate cost of a turnkey cold storage project in India?',
          'a' => 'Cost depends on storage capacity, temperature range, product type, site conditions and location. As a broad reference, total project cost begins from around Rs. 40 to 60 lakh for small-capacity cold rooms and scales to Rs. 5 crore and above for large multi-temperature facilities. We provide a detailed BOQ after site assessment.'
        ],
        [
          'q' => 'Can Singhania Refrigeration build a pharmaceutical cold room that meets GDP compliance?',
          'a' => 'Yes. We design and build GDP-compliant pharmaceutical cold rooms with validated temperature mapping, redundant refrigeration backup, alarm monitoring and complete audit trail documentation aligned with WHO and Indian regulatory requirements.'
        ],
        [
          'q' => 'Do you provide Annual Maintenance Contracts after project handover?',
          'a' => 'Yes. We offer structured AMC plans covering scheduled preventive maintenance, IoT performance monitoring, priority breakdown response, energy efficiency audits and annual compliance reporting to keep your cold storage facility operational throughout its lifecycle.'
        ],
        [
          'q' => 'Does Singhania Refrigeration handle turnkey cold storage projects outside Delhi NCR?',
          'a' => 'Yes. We are based in Okhla, Delhi NCR, but execute turnkey cold storage projects across India. Contact us to discuss your project location, product type and capacity requirements.'
        ],
        [
          'q' => 'Are there government subsidies available for cold storage projects in India?',
          'a' => 'Yes. NABARD and NHB have capital subsidy schemes that may assist with construction and upgrade of cold storage capacity in India. Subsidy eligibility, levels and capacity tiers vary by project, so project-specific requirements should be verified against the latest scheme guidance before finalising design.'
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
      padding: 76px 0 88px;
      overflow: hidden;
    }

    .faq-section .section-h2 {
      color: #071735;
      font-size: clamp(30px, 4vw, 42px);
      line-height: 1.1;
      font-weight: 900;
      margin: 0 0 48px !important;
      padding: 0;
    }

    .faq-accordion {
      max-width: 1012px;
      margin: 0 auto;
    }

    .faq-accordion-item {
      border: 1px solid #dde6f0;
      border-radius: 8px !important;
      margin-bottom: 16px;
      overflow: hidden;
      background: #ffffff;
      box-shadow: 0 12px 30px rgba(16, 28, 52, 0.05);
    }

    .faq-accordion-item .accordion-button {
      position: relative;
      width: 100%;
      border: 0;
      padding: 22px 72px 22px 26px;
      text-align: left;
      font-weight: 800;
      font-size: 18px;
      line-height: 1.45;
      color: #071735;
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
      right: 25px;
      top: 50%;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: #eef6ff;
      color: #071735;
      font-size: 22px;
      font-weight: 800;
      line-height: 31px;
      text-align: center;
      transform: translateY(-50%);
      transition: background .2s ease, color .2s ease;
    }

    .faq-accordion-item .accordion-button:not(.collapsed) {
      color: #071735;
      background: #eef4fb;
      box-shadow: none;
    }

    .faq-accordion-item .accordion-button:not(.collapsed)::after {
      content: "-";
      background: #0057a8;
      color: #ffffff;
    }

    .faq-answer {
      font-size: 16px;
      color: #22304a;
      line-height: 1.75;
      background: #ffffff;
      padding: 4px 26px 26px;
    }

    @media (max-width: 767px) {
      .faq-section {
        padding: 54px 0 64px;
      }

      .faq-section .section-h2 {
        margin-bottom: 28px !important;
      }

      .faq-accordion-item {
        margin-bottom: 12px;
        border-radius: 8px !important;
      }

      .faq-accordion-item .accordion-button {
        padding: 17px 52px 17px 16px;
        font-size: 15px;
      }

      .faq-accordion-item .accordion-button::after {
        right: 16px;
        width: 26px;
        height: 26px;
        line-height: 26px;
        font-size: 18px;
      }

      .faq-answer {
        padding: 18px 16px 20px;
        font-size: 14px;
        line-height: 1.7;
      }
    }
  </style>
  <!-- section 8 End -->
  
    <!-- Section-9 -->

  <div class="rs-cta bg21 pt-90 pb-100 md-pt-68 md-pb-80">
    <div class="container">
      <div class="sec-title text-center truck-body-cta">
        <span class="sub-title modify white">Get Started</span>
        <h2 class="title3 white-color">Ready to Start Your Cold Storage Project?</h2>

        <p class="cta-description">
            Tell us about your product, storage capacity, temperature range and
      location &mdash; we will visit the site, assess requirements and provide
      a detailed BOQ within 5 working days. No obligation. No pressure.
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


    <?php include('footer.php'); ?>

    <!-- Reveal-on-scroll (no deps) -->
    <script>
      (function(){
        const els = document.querySelectorAll('[data-animate]');
        if(!('IntersectionObserver' in window)){ els.forEach(el=>el.classList.add('active')); return; }
        const io = new IntersectionObserver((entries)=>{
          entries.forEach(e=>{
            if(e.isIntersecting){
              e.target.classList.add('active');
              io.unobserve(e.target);
            }
          });
        }, {threshold:.18});
        els.forEach(el=>io.observe(el));
      })();
    </script>
  </body>
</html>
