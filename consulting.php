<?php
$pageTitle = 'Cold Storage Consulting Services in India | Singhania Refrigeration';
$pageDescription = 'Cold storage consulting, project planning, grant coordination and PMC services for efficient refrigeration and cold chain projects across India.';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('head.php');?>

    <style>
      :root{
        --brand:#0e2344; --ink:#0f2442; --muted:#667085; --line:#e6ecf5;
        --card:#ffffff; --soft:#f7f9ff;
      }

      /* ========= HERO ========= */
      .consult-hero{
        position:relative;
        width:100%;
        min-height:560px;
        display:flex;
        align-items:center;
        background:
          linear-gradient(90deg, rgba(6,18,38,.92) 0%, rgba(8,34,67,.78) 48%, rgba(8,34,67,.34) 100%),
          url('assets/images/consultation/free-consultation.jpg') center/cover no-repeat;
        overflow:hidden;
      }
      .consult-hero::before{
        content:""; position:absolute; inset:0;
        background:linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,0) 42%);
        pointer-events:none;
      }
      .consult-hero::after{
        content:""; position:absolute; left:0; right:0; bottom:0; height:90px;
        /* background:linear-gradient(180deg, rgba(255,255,255,0), #ffffff); */
        pointer-events:none;
      }
      .consult-hero .container{ position:relative; z-index:1; }
      .titlecard{
        max-width: 900px;
        margin: 0;
        padding:110px 0 130px;
        color:#e8eeff;
      }
      .eyebrow{
        display:inline-flex; align-items:center; gap:8px;
        font-size:12px; letter-spacing:.18em; text-transform:uppercase;
        color:#dbe6ff; background:rgba(255,255,255,.10);
        border:1px solid rgba(255,255,255,.16); border-radius:999px;
        padding:7px 11px; margin-bottom:12px;
      }
      .consult-hero h1{ margin:0 0 16px; font-weight:900; color:#fff; font-size:clamp(32px,4.8vw,56px); line-height:1.05; max-width:820px;}
      .consult-hero p{ margin:0; color:#e6ecff; font-size:17px; line-height:1.78; max-width:820px;}
      .hero-cta-actions{ display:flex; flex-wrap:wrap; gap:12px; margin-top:28px; }
      .hero-cta-btn{ display:inline-flex; align-items:center; justify-content:center; min-height:56px; padding:0 20px; border:1px solid rgba(255,255,255,.48); border-radius:8px; background:rgba(255,255,255,.08); color:#fff !important; font-size:15px; font-weight:800; text-decoration:none; transition:background .2s ease,color .2s ease,transform .2s ease; }
      .hero-cta-btn:hover{ background:#fff; color:#0e2344 !important; transform:translateY(-2px); }

      /* ========= BODY ========= */
      .consult-body{ background:#fff; position:relative; padding:92px 0; }
      .consult-body::before{
        content:""; position:absolute; inset:0; pointer-events:none;
        background-image:
          radial-gradient(#cfd7ee 1px, transparent 1px),
          radial-gradient(#dfe5f6 1px, transparent 1px);
        background-size:48px 48px, 64px 64px; background-position:0 0, 12px 18px; opacity:.12;
      }

      .lead-wrap{ max-width:980px; margin:0 auto 22px; }
      .lead{
        color:#2b3e66; margin:0 0 12px;
        text-align: justify; text-justify: inter-word; hyphens: auto;
      }
      @media (max-width: 575.98px){
        .lead{ text-align:left; }
      }

      /* Blocks */
      .block{
        max-width:980px; margin: 22px auto 0;
        background:#fff; border:1px solid var(--line); border-radius:8px;
        box-shadow:0 10px 26px rgba(16,28,52,.06);
        padding:18px 18px 16px;
      }
      .block,
      .block h3,
      .block p,
      .block li,
      .feat,
      .feat h5,
      .feat p{
        font-family: 'Roboto', sans-serif;
      }
      .block + .block{ margin-top:16px; }
      .block h3{ font-size:22px; font-weight:800; color:var(--ink); margin:0 0 6px; }
      .block p{ margin:0 0 10px; color:#2f426b; }

      .ticklist{ list-style:none; margin:8px 0 0; padding:0; display:grid; gap:8px;}
      .ticklist li{ position:relative; padding-left:28px; color:#2c3c66;}
      .ticklist li:before{
        content:""; position:absolute; left:0; top:6px; width:18px; height:18px; border-radius:50%;
        background: conic-gradient(from 180deg,#3b5bb7,#20356b);
        box-shadow: inset 0 0 0 3px #fff;
      }

      /* Feature badges row */
      .features{ max-width:1080px; margin:22px auto 0; }
      .feat{
        height:100%;
        display:flex; gap:12px; align-items:flex-start;
        padding:18px; border:1px solid var(--line); border-radius:8px; background:#fff;
        box-shadow:0 8px 24px rgba(15,25,44,.06), 0 1px 0 rgba(16,24,40,.04) inset;
        transition: transform .15s ease, box-shadow .2s ease;
      }
      .feat:hover{ transform: translateY(-2px); box-shadow:0 16px 34px rgba(15,25,44,.10), 0 1px 0 rgba(16,24,40,.04) inset; }
      .feat .badge{
        min-width:42px; height:42px; border-radius:11px; display:grid; place-items:center;
        background:#eef2ff; color:#20335f; border:1px solid #dfe7ff; font-size:18px;
      }
      .feat h5{ margin:0 0 3px; font-weight:800; color:var(--ink); }
      .feat p{ margin:0; color:#41507a; }

      /* Utility */
      .mt-32{ margin-top:32px; }
      @media (max-width: 991px){
        .consult-hero{ min-height:auto; }
        .titlecard{ padding:92px 0 110px; }
        .consult-body{ padding:72px 0; }
      }
      @media (max-width: 575.98px){
        .titlecard{ padding:76px 0 92px; }
        .consult-hero h1{ font-size:clamp(28px, 8vw, 36px); line-height:1.18; }
        .consult-hero p{ font-size:15px; line-height:1.7; }
        .consult-body{ padding:56px 0; }
        .block{ padding:20px 18px; }
      }

      /* ========= CONSULTING PAGE REDESIGN ========= */
      .consult-section{ padding:86px 0; }
      .consult-section--soft{ background:linear-gradient(180deg,#fafbff 0%,#f3f6ff 100%); }
      .consult-grid{ display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:64px; align-items:center; }
      /* .consult-badge{ display:inline-flex; align-items:center; gap:8px; margin-bottom:22px; padding:7px 13px; border-radius:999px; background:#eef1fb; color:#2a427f; font-size:11px; line-height:1; letter-spacing:.1em; text-transform:uppercase; font-weight:800; }
      .consult-badge::before{ content:""; width:6px; height:6px; border-radius:50%; background:#3b5bb7; } */
      .consult-heading{ margin:0; color:var(--ink); font-size:clamp(34px,3.6vw,46px); line-height:1.14; font-weight:900; letter-spacing:-.02em; }
     
      .consult-copy{ margin-top:22px; }
      .consult-copy p{ margin:0 0 17px; color:#40516b; font-size:15px; line-height:1.72; }
      /* .consult-copy strong{ color:var(--ink); font-weight:900; } */
      .consult-media{ position:relative; padding:0 22px 24px 0; }
      .consult-image{ display:block; width:100%; height:475px; object-fit:cover; border-radius:18px; box-shadow:0 20px 48px rgba(15,36,66,.14); transition:transform .35s ease,box-shadow .35s ease; }
      .consult-media:hover .consult-image{ transform:translateY(-5px); box-shadow:0 28px 58px rgba(15,36,66,.2); }
      .consult-stat{ position:absolute; right:0; bottom:0; width:210px; padding:22px; border:1px solid var(--line); border-radius:16px; background:#fff; box-shadow:0 15px 34px rgba(15,36,66,.15); }
      .consult-stat strong{ display:block; color:#2a427f; font-size:35px; line-height:1; font-weight:900; }
      .consult-stat span{ display:block; margin-top:7px; color:#667085; font-size:12px; line-height:1.45; font-weight:700; }

      .consult-section-head{ max-width:820px; margin:0 auto 52px; text-align:center; }
      .consult-section-head p{ max-width:720px; margin:20px auto 0; color:#40516b; font-size:15px; line-height:1.65; }
      .consult-service-grid{ display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:26px; }
      .consult-service-card{ min-height:320px; padding:31px 28px; border:1px solid var(--line); border-radius:14px; background:#fff; box-shadow:0 8px 24px rgba(15,36,66,.06); transition:transform .28s ease,box-shadow .28s ease,border-color .28s ease; }
      .consult-service-card:hover{ transform:translateY(-7px); border-color:#c9d2ec; box-shadow:0 18px 38px rgba(42,66,127,.13); }
      .consult-service-icon{ width:52px; height:52px; display:grid; place-items:center; margin-bottom:24px; border-radius:13px; color:#fff; background:#0f2442; font-size:22px; box-shadow:0 10px 22px rgba(42,66,127,.2); transition:transform .28s ease; }
      .consult-service-card:hover .consult-service-icon{ transform:translateY(-3px) scale(1.06); }
      .consult-service-card h3{ margin:0 0 13px; color:var(--ink); font-size:19px; line-height:1.35; font-weight:900; }
      .consult-service-card p{ margin:0; color:#52647d; font-size:14px; line-height:1.72; }

      .consult-plan{ padding:86px 0; background:#fff; }
      .consult-plan-card{ padding:38px; border:1px solid var(--line); border-radius:20px; background:linear-gradient(145deg,#fff,var(--soft)); box-shadow:0 14px 36px rgba(15,36,66,.08); }
      .consult-list{ list-style:none; margin:27px 0 0; padding:0; display:grid; gap:15px; }
      .consult-list li{ position:relative; min-height:34px; padding:5px 0 0 47px; color:#40516b; font-size:14px; line-height:1.6; }
      .consult-list li::before{ content:"\f00c"; position:absolute; left:0; top:0; width:34px; height:34px; display:grid; place-items:center; border:1px solid #d8dff1; border-radius:9px; background:#fff; color:#2a427f; font-family:FontAwesome; font-size:13px; box-shadow:0 4px 10px rgba(15,36,66,.06); }
      .consult-plan-image{ display:block; width:100%; height:500px; object-fit:cover; border-radius:20px; box-shadow:0 20px 48px rgba(15,36,66,.14); }

      .consult-expertise{ padding:84px 0 90px; color:#0f2442; background:linear-gradient(180deg, #fafbff 0%, #f3f6ff 100%); }
      .consult-expertise .consult-heading{ color:#0f2442; }
      .consult-expertise .consult-heading span{ color:#0f2442; }
      .consult-expertise .consult-section-head p{ color:#0f2442; }
      .consult-expertise-grid{ display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:22px; }
      .consult-expertise-card{ min-height:270px; padding:29px; border:1px solid rgba(255,255,255,.15); border-radius:14px; background:#fff; transition:transform .28s ease,background .28s ease,box-shadow .28s ease; }
      .consult-expertise-card:hover .consult-expertise-icon{ transform:translateY(-6px) scale(1.06);  box-shadow:0 18px 36px rgba(8,20,43,.22); }
      .consult-expertise-icon{ width:46px; height:46px; display:grid; place-items:center; margin-bottom:22px; border-radius:11px; background:#0f2442; color:#cbd5f7; font-size:20px; }
      .consult-expertise-card h3{ margin:0 0 11px; color:#0f2442; font-size:17px; line-height:1.4; font-weight:900; }
      .consult-expertise-card p{ margin:0; color:#0f2442; font-size:13.5px; line-height:1.7; }

      .consult-cta-section{ padding:80px 0; background:#fff; }
      .consult-cta{ display:flex; align-items:center; justify-content:space-between; gap:32px; padding:44px 48px; border-radius:20px; color:#fff; background:linear-gradient(120deg,#1c2f57,#2a427f); box-shadow:0 20px 45px rgba(28,47,87,.2); }
      .consult-cta h2{ margin:0 0 9px; color:#fff; font-size:clamp(27px,3vw,38px); line-height:1.2; font-weight:900; }
      .consult-cta p{ max-width:680px; margin:0; color:#dce3f5; font-size:14px; line-height:1.65; }
      .consult-cta a{ flex:0 0 auto; display:inline-flex; align-items:center; justify-content:center; min-height:48px; padding:0 23px; border-radius:10px; background:#fff; color:#1c2f57 !important; font-size:14px; font-weight:900; text-decoration:none; transition:transform .25s ease,box-shadow .25s ease; }
      .consult-cta a:hover{ transform:translateY(-3px); box-shadow:0 12px 24px rgba(8,20,43,.22); }

      @media (prefers-reduced-motion:reduce){
        .consult-image,.consult-service-card,.consult-service-icon,.consult-expertise-card,.consult-cta a{ transition:none !important; }
        .consult-media:hover .consult-image,.consult-service-card:hover,.consult-service-card:hover .consult-service-icon,.consult-expertise-card:hover,.consult-cta a:hover{ transform:none !important; }
      }
      @media (max-width:991px){
        .consult-section,.consult-plan{ padding:68px 0; }
        .consult-grid{ grid-template-columns:1fr; gap:46px; }
        .consult-media{ max-width:700px; margin:0 auto; }
        .consult-service-grid,.consult-expertise-grid{ grid-template-columns:repeat(2,minmax(0,1fr)); }
        .consult-cta{ align-items:flex-start; flex-direction:column; }
      }
      @media (max-width:767px){
        .consult-section,.consult-plan{ padding:56px 0; }
        .consult-section-head{ margin-bottom:36px; }
        .consult-heading{ font-size:32px; }
        .consult-service-grid,.consult-expertise-grid{ grid-template-columns:1fr; }
        .consult-service-card,.consult-expertise-card{ min-height:0; }
        .consult-plan-card{ padding:28px 22px; }
        .consult-plan-image{ height:390px; }
        .consult-cta-section{ padding:58px 0; }
        .consult-cta{ padding:34px 28px; }
      }
      @media (max-width:420px){
        .consult-heading{ font-size:29px; }
        .consult-media{ padding:0; }
        .consult-image{ height:340px; }
        .consult-stat{ position:relative; right:auto; bottom:auto; width:200px; margin:-58px 15px 0 auto; }
        .consult-plan-image{ height:320px; }
        .consult-cta a{ width:100%; }
      }
    </style>
  </head>
  <body>
    <?php include('header.php');?>

    <!-- ===== HERO ===== -->
    <section class="consult-hero">
      <div class="container">
        <div class="titlecard" data-aos="fade-up">
          <span class="eyebrow">Consulting</span>
          <h1>End-to-End Integrated Cold Chain Solutions</h1>
          <p>We don’t just build cold rooms—we engineer complete, future-ready cold chain ecosystems.</p>
          <div class="hero-cta-actions">
            <a href="contact" class="hero-cta-btn">Get a Free Quote</a>
            <a href="tel:+919971060822" class="hero-cta-btn">Call Now</a>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== CONSULTING INTRO ===== -->
    <section class="consult-section">
      <div class="container">
        <div class="consult-grid">
          <div class="consult-media" data-aos="fade-right">
            <img class="consult-image" src="assets/images/project/style4/2.webp" alt="Cold chain project strategy and performance planning" loading="lazy" decoding="async">
            <!-- <div class="consult-stat">
              <strong>360°</strong>
              <span>Cold Chain Consulting &amp; Project Support</span>
            </div> -->
          </div>
          <div data-aos="fade-left">
            
            <h2 class="consult-heading">From Initial Concept to<br><span>Reliable Operations</span></h2>
            <div class="consult-copy">
              <p>Singhania Refrigeration develops complete cold chain solutions—not isolated storage rooms. We connect construction, refrigeration, transport, handling systems, and quality monitoring into one scalable operating plan.</p>
              <p>Our data-led approach balances capital investment, energy efficiency, operational uptime, safety, and future capacity. We support food, dairy, pharmaceutical, seafood, agriculture, logistics, and food-service businesses from early feasibility through commissioning.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== CORE SERVICES ===== -->
    <section class="consult-section consult-section--soft">
      <div class="container">
        <div class="consult-section-head" data-aos="fade-up">
          
          <h2 class="consult-heading">Consulting Support Across the<br><span>Entire Project Lifecycle</span></h2>
          <p>One coordinated team helps you make sound technical decisions, prepare documentation, and keep execution aligned with budget, quality, and schedule.</p>
        </div>
        <div class="consult-service-grid">
          <article class="consult-service-card" data-aos="fade-up">
            <div class="consult-service-icon" aria-hidden="true"><i class="fa fa-snowflake-o"></i></div>
            <h3>Cold Storage Consulting</h3>
            <p>Feasibility, concept planning, design, capacity assessment, refrigeration selection, budgeting, and practical recommendations built around your operation.</p>
          </article>
          <article class="consult-service-card" data-aos="fade-up" data-aos-delay="70">
            <div class="consult-service-icon" aria-hidden="true"><i class="fa fa-file-text-o"></i></div>
            <h3>Grant Coordination &amp; Documentation</h3>
            <p>Eligibility review, application packet preparation, supporting documents, and coordination guidance for applicable subsidies and incentive schemes.</p>
          </article>
          <article class="consult-service-card" data-aos="fade-up" data-aos-delay="140">
            <div class="consult-service-icon" aria-hidden="true"><i class="fa fa-tasks"></i></div>
            <h3>Project Management Services</h3>
            <p>Vendor coordination, quality reviews, safety oversight, schedule tracking, commissioning checks, and structured handover support.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- ===== PLANNING DETAIL ===== -->
    <section class="consult-plan">
      <div class="container">
        <div class="consult-grid">
          <div class="consult-plan-card" data-aos="fade-right">
         
            <h2 class="consult-heading">Cold Storage Planning<br><span>Built on Real Data</span></h2>
            <div class="consult-copy"><p>Our consulting process is designed to balance operational reliability, efficiency, investment, and long-term scalability.</p></div>
            <ul class="consult-list">
              <li>Site assessment, thermal-load calculations, and capacity planning</li>
              <li>Insulation, door strategy, optimized layouts, and material flow</li>
              <li>Freon or ammonia equipment sizing, redundancy, and safety review</li>
              <li>Detailed Capex and Opex models with milestone planning</li>
            </ul>
          </div>
          <div data-aos="fade-left">
            <img class="consult-plan-image" src="assets/images/products/ware-house-management.png" alt="Warehouse project operations and performance monitoring" loading="lazy" decoding="async">
          </div>
        </div>
      </div>
    </section>

    <!-- ===== EXPERTISE ===== -->
    <section class="consult-expertise">
      <div class="container">
        <div class="consult-section-head" data-aos="fade-up">
       
          <h2 class="consult-heading">Technical Depth with<br><span>Commercial Clarity</span></h2>
          <p>Recommendations are shaped around performance, maintainability, compliance, and the realities of running a cold chain facility.</p>
        </div>
        <div class="consult-expertise-grid">
          <article class="consult-expertise-card" data-aos="fade-up">
            <div class="consult-expertise-icon" aria-hidden="true"><i class="fa fa-snowflake-o"></i></div>
            <h3>Refrigeration Expertise</h3>
            <p>Practical experience across ripening chambers, blast freezing, IQF, CA/MA storage, and freon and ammonia refrigeration systems.</p>
          </article>
          <article class="consult-expertise-card" data-aos="fade-up" data-aos-delay="70">
            <div class="consult-expertise-icon" aria-hidden="true"><i class="fa fa-bar-chart"></i></div>
            <h3>Energy &amp; Reliability</h3>
            <p>Smart controls, effective insulation, equipment selection, preventive planning, and redundancy strategies focused on stable operations.</p>
          </article>
          <article class="consult-expertise-card" data-aos="fade-up" data-aos-delay="140">
            <div class="consult-expertise-icon" aria-hidden="true"><i class="fa fa-file-text-o"></i></div>
            <h3>Subsidy Guidance</h3>
            <p>Structured documentation and coordination support to help clients navigate applicable Grant-in-Aid schemes and subsidy processes.</p>
          </article>
        </div>
      </div>
    </section>

    
  <!-- CTA -->
  <div class="rs-cta bg21 pt-90 pb-100 md-pt-68 md-pb-80">
    <div class="container">
      <div class="sec-title text-center truck-body-cta">
        <span class="sub-title modify white">Get Started</span>
        <h2 class="title3 white-color">Talk to Us About Your Fleet&rsquo;s Refrigeration Needs</h2>

        <p class="cta-description">
           Whether you need a refrigerated truck, a ripening chamber, a multi-temperature warehouse,
          or a complete cold-chain infrastructure—Singhania Refrigeration is your partner in success.
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

    <?php include('footer.php');?>

    <script>
      // Initialize AOS if present (already included in head.php)
      window.addEventListener('load', function(){
        if (window.AOS && typeof AOS.init === 'function') {
          AOS.init({ duration: 700, once: true, offset: 80 });
        }
      });
    </script>
  </body>
</html>
