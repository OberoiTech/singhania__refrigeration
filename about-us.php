<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php'); ?>
</head>
<body>
<?php include('header.php'); ?>

<!-- ============== PAGE SCOPED STYLES ============== -->
<style>
  :root{
    --ink:#0f2442; --muted:#667085; --soft:#f6f8ff; --card:#ffffff;
    --line:#e7ecf5; --brand:#0e2344;
  }
  .section-pad{ padding: 80px 0; }
  .section-soft{ background: linear-gradient(180deg, #fafbff 0%, #f3f6ff 100%); }
  .main-content{ max-width:100%; overflow-x:clip; }
  .g-30>[class*="col-"]{ margin-bottom:30px; }
  .g-40>[class*="col-"]{ margin-bottom:40px; }

  .h2{ font-size: clamp(26px, 3.4vw, 36px); line-height:1.5; color: var(--ink); font-weight:800; }
  .lead{ font-size: clamp(15px, 1.7vw, 17px); color:#2c3e68; text-align: justify; }
  .eyebrow{ display:inline-block; font-size:12px; letter-spacing:.18em; text-transform:uppercase; color:#9aa6c3; }

  /* Hero */
  .about-hero{ position: relative; padding: 56px 0 24px; overflow: hidden; }
  .about-hero__bg{
    position:absolute; inset:0 0 auto 0; height:100%;
    background:
      radial-gradient(100% 120% at 10% 0%, rgba(14,35,68,.25) 0%, rgba(14,35,68,0) 55%),
      radial-gradient(120% 100% at 90% -10%, rgba(17,44,92,.18) 0%, rgba(17,44,92,0) 60%),
      linear-gradient(180deg, #0f1a39 0%, #0c1224 100%);
    opacity:.95; z-index:-1;
  }
  .about-hero__card{
    max-width: 900px;
    background: rgba(255,255,255,.10);
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 16px;
    padding: clamp(18px, 4vw, 28px);
    color:#eaf0ff;
    box-shadow: 0 24px 60px rgba(0,0,0,.25);
    backdrop-filter: blur(4px) saturate(120%);
  }
  .about-hero__card h1{ font-size: clamp(28px, 4vw, 44px); line-height:1.08; margin:6px 0 10px; }
  .about-hero__card .brand{ color:#ffffff; }
  .about-hero__card p{ color:#dfe6ff; margin:0; }

  /* Images & cards */
  .about-img{ width:100%; height:auto; border-radius:16px; box-shadow:0 20px 48px rgba(0,0,0,.12); }
  .img-soft{ transition: transform .4s ease, box-shadow .4s ease; }
  .img-soft:hover{ transform: translateY(-3px); box-shadow:0 28px 60px rgba(0,0,0,.18); }

  .card-lite{
    height:100%; border-radius:16px; background: var(--card); border:1px solid var(--line);
    padding: clamp(18px, 3.2vw, 26px); box-shadow: 0 12px 30px rgba(16, 28, 52, .06);
  }

  /* Checklist */
  .checklist{ list-style:none; padding:0; margin:0; display:grid; gap:10px; }
  .checklist li{ position:relative; padding-left:28px; color:#2d3c63; }
  .checklist li::before{
    content:""; position:absolute; left:0; top:5px; width:18px; height:18px; border-radius:50%;
    background: conic-gradient(from 180deg, #3b5bb7, #2a427f); box-shadow: inset 0 0 0 3px #fff;
  }

  .about-cta{
    display:inline-block;
    padding:12px 20px;
    border-radius:10px;
    background:#1c2f57;
    color:#fff !important;
  }

  @media (max-width: 991px){
    .section-pad{ padding: 64px 0; }
    .about-hero{ padding: 40px 0 18px; }
    .about-hero__bg{ height:100%; }
    .about-img{ display:block; max-width:680px; margin:0 auto; }
    .g-30>[class*="col-"]:last-child,
    .g-40>[class*="col-"]:last-child{ margin-bottom:0; }
  }

  @media (max-width: 767px){
    .section-pad{ padding:48px 0; }
    .about-hero{ padding:32px 0 16px; }
    .about-hero__card{ padding:22px 18px; border-radius:14px; }
    .about-hero__card h1{ font-size:clamp(28px, 8vw, 36px); line-height:1.18; }
    .about-hero__card p,
    .lead{ font-size:15px; line-height:1.7; text-align:left; }
    .h2{ font-size:24px; line-height:1.3; overflow-wrap:anywhere; }
    .card-lite{ height:auto; padding:22px 18px; }
    .g-30>[class*="col-"],
    .g-40>[class*="col-"]{ margin-bottom:24px; }
    .g-30>[class*="col-"]:last-child,
    .g-40>[class*="col-"]:last-child{ margin-bottom:0; }
    .checklist{ gap:12px; }
    .checklist li{ padding-left:27px; font-size:15px; line-height:1.55; }
    .about-img{ border-radius:12px; }
  }

  @media (max-width: 420px){
    .about-hero__card{ padding:20px 16px; }
    .section-pad{ padding:42px 0; }
    .about-cta{ width:100%; text-align:center; }
  }
</style>

<!-- ============== PAGE CONTENT ============== -->
<div class="main-content">

  <!-- Hero -->
  <section class="about-hero">
    <div class="container">
      <div class="about-hero__card" data-aos="fade-up">
        <span class="eyebrow">Company</span>
        <h1><span class="brand">About Singhania Refrigeration</span></h1>
        <p>
          Empowering India's cold chain with innovation and trust. We build reliable, energy-efficient
          refrigeration and transport solutions backed by expert consulting, turnkey execution, and
          responsive service across the country.
        </p>
      </div>
    </div>
    <div class="about-hero__bg"></div>
  </section>

  <!-- Legacy of Excellence -->
  <section class="section-pad">
    <div class="container">
      <div class="row align-items-center g-40">
        <div class="col-lg-5 mb-30" data-aos="fade-right">
          <img class="about-img img-soft" src="assets/images/3.jpg" alt="Legacy of Excellence">
        </div>
        <div class="col-lg-7" data-aos="fade-left">
          <h2 class="h2 mb-12">Singhania Refrigeration: Empowering India’s Cold Chain</h2>
          <p class="lead">
            Singhania Refrigeration is one of India’s most trusted suppliers of 
            advanced refrigeration and cold chain solutions. With the legacy of 
            Singhania Logistics for over 25 years, we provide end-to-end cold storage. 
            Singhania Refrigeration is one of the most trusted suppliers of advanced refrigeration and cold chain solutions in India. From concept to commissioning and farm to fork, factory to pharma, we offer precise temperature control, energy efficiency, and reliable performance at every stage of the supply chain. 
          </p>
          <p class="lead">Our solutions include turnkey cold storage projects, blast-freezers, ripening chambers, and refrigerated warehouses designed to meet modern industry demands. Singhania Logistics, with a legacy of 25+ years, backs us, and we provide end-to-end cold storage, industrial refrigeration,
            and cold chain technologies for various industries.</p>
          <p class="lead">
            Designed for every stage of the supply chain from concept to commissioning, from farm to fork, from factory to pharma, we provide precise temperature control, energy efficiency, and reliable performance. We carry out complete cold storage projects, blast-freezers, ripening chambers, and refrigerated warehouses tailored to the needs of modern industry.
          </p>

          <h5 class="mt-20 mb-10">Our Legacy of Excellence</h5>
          <p>
            Rooted in decades of temperature-controlled logistics, we evolved into a specialized
            engineering partner for:
          </p>
          <ul class="checklist">
            <li>Cold rooms, CA/MA chambers, ripening chambers</li>
            <li>Ammonia & freon systems, compressor rack systems</li>
            <li>IQF technology for seafood, fruits, and RTE</li>
            <li>PUFF panels & insulated doors, dock shelters & levelers</li>
            <li>Refrigerated truck ACs & containers, warehouse infrastructure</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Choose Us -->
  <section class="section-pad section-soft">
    <div class="container">
      <div class="row g-30">
        <div class="col-lg-7" data-aos="fade-up">
          <div class="card-lite h-100">
            <h2 class="h2 mb-12">Why Choose Singhania Refrigeration for Cold Chain Solutions?</h2>
            <p class="mb-16">
              Choosing Singhania means investing in trust, innovation, and performance—today and
              for the future. We take ownership from permissions & design to supply, installation,
              commissioning, and AMC.
            </p>
            <ul class="checklist">
              <li><strong>Decades of Reliable Experience:</strong> 25+ years of credibility and deep industry expertise.</li>
              <li><strong>End-to-End Execution:</strong> A single accountable partner for the full lifecycle.</li>
              <li><strong>Energy-Efficient Technology:</strong> Lower operating costs without compromising performance.</li>
              <li><strong>Segment Expertise:</strong> Dairy, pharma, seafood, agriculture, 3PL—compliant and tailored.</li>
              <li><strong>Nationwide Service Network:</strong> Rapid, reliable support across India.</li>
              <li><strong>IoT & Quality Monitoring:</strong> Real-time controls, alerts, and audit trails.</li>
              <li><strong>Customer-First Approach:</strong> Long-term partnerships focused on measurable value.</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-5" data-aos="fade-up" data-aos-delay="120">
          <div class="card-lite h-100">
            <h5 class="mb-12">What you get</h5>
            <ul class="checklist">
              <li>Future-ready, compliant systems</li>
              <li>Optimized uptime & energy savings</li>
              <li>Transparent documentation & BOQs</li>
              <li>Proactive AMC & responsive support</li>
            </ul>
            <p class="mb-0">We don’t just build systems—we build trust.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Vision -->
  <section class="section-pad">
    <div class="container">
      <div class="row align-items-center g-40">
        <div class="col-lg-7 order-2 order-lg-1" data-aos="fade-right">
          <h2 class="h2 mb-12">Our Vision for Cold Chain & Refrigeration Solutions</h2>
          <p class="lead">
            To transform India’s refrigeration & cold-chain landscape with durable, innovative,
            high-performance solutions that ensure safety, preserve freshness, and uphold integrity
            across every link.
          </p>
          <ul class="checklist">
            <li>Distribute state-of-the-art technologies across seafood, dairy, agriculture & food processing.</li>
            <li>Guarantee freshness & compliance from farm to factory to fork.</li>
            <li>Maximize efficiency to reduce costs and environmental impact.</li>
            <li>Provide 360° lifecycle support—advisory, installation, commissioning, service & AMC.</li>
            <li>Build trust and long-term partnerships that scale with our customers.</li>
          </ul>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 mb-30" data-aos="fade-left">
          <img class="about-img img-soft" src="assets/images/2.jpg" alt="Vision">
        </div>
      </div>
    </div>
  </section>

  <!-- Towards Tomorrow -->
  <section class="section-pad section-soft">
    <div class="container" data-aos="fade-up">
      <h2 class="h2 mb-12">Future of Cold Chain & Refrigeration in India</h2>
      <p class="lead">
        We envision a future where every Indian business—small, medium, or large—has access to
        world-class, sustainable refrigeration.
      </p>
      <ul class="checklist">
        <li>Next-generation technology engineered for performance and efficiency</li>
        <li>Eco-conscious practices that minimize environmental impact</li>
        <li>Integrated systems that ensure safety, freshness, and quality end-to-end</li>
        <li>Customer-focused services that enable risk-free scaling</li>
      </ul>
      <p class="mb-0">Our goal: be India’s most trusted partner in refrigeration—synonymous with quality, dependability, and trust.</p>
    </div>
  </section>

  <!-- Innovation That Drives Trust -->
  <section class="section-pad">
    <div class="container" data-aos="fade-up">
      <h2 class="h2 mb-12">Advanced Refrigeration Solutions for Efficient Cold Storage</h2>
      <p class="lead">
        Innovation is our DNA. Every system blends precise engineering, smart controls, and
        sustainable design—so you get measurable outcomes:
      </p>
      <ul class="checklist">
        <li>Reduced wastage & losses</li>
        <li>Lower energy consumption</li>
        <li>Improved operational uptime</li>
        <li>Guaranteed product safety & compliance</li>
      </ul>
    </div>
  </section>

  <!-- Sustainable Future -->
  <section class="section-pad section-soft">
    <div class="container" data-aos="fade-up">
      <h2 class="h2 mb-12">Building a Sustainable Future</h2>
      <p>
        As India grows, so does the need for safe, efficient, and eco-friendly cold-chain
        infrastructure. Singhania Refrigeration is proud to help reduce food waste, keep medicines
        potent, and improve logistics with future-ready green systems. Every project we deliver is
        built for reliability, longevity, and long-term value.
      </p>
      <p class="mb-0"><strong>Best cold chain company in India – Where Technology Meets Trust.</strong></p>
    </div>
  </section>

  <!-- CTA -->
  <section class="section-pad">
    <div class="container" data-aos="fade-up">
      <div class="card-lite">
        <h2 class="h2 mb-12">Let’s power your growth</h2>
        <p class="lead">
          Whether you need a refrigerated truck, a ripening chamber, a multi-temperature warehouse,
          or a complete cold-chain infrastructure—Singhania Refrigeration is your partner in success.
        </p>
        <a href="contact.php" class="readon banner-style about-cta">
          Contact Us
        </a>
      </div>
    </div>
  </section>

</div>
<!-- /main-content -->

<?php include('footer.php'); ?>

<!-- AOS init (safe if already present) -->
<script>
  window.addEventListener('load', function(){
    if (window.AOS && typeof AOS.init === 'function') {
      AOS.init({ duration: 750, once: true, offset: 80, easing: 'ease-out' });
    }
  });
</script>
</body>
</html>
