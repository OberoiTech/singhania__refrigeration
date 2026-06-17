<!DOCTYPE html>
<html lang="zxx">
  <?php include('head.php'); ?>
  <body>
    <?php include('header.php'); ?>

    <style>
      :root{
        --ink:#0f2442; --muted:#667085; --soft:#f6f8ff; --card:#ffffff; --line:#e7ecf5;
        --brand:#0e2344; --brand2:#082243;
      }

      /* ===== HERO / BREADCRUMB (brand-consistent) ===== */
      .rs-breadcrumbs.bg-3,
      .rs-breadcrumbs.bg-7{
        position:relative; overflow:hidden;
        background: linear-gradient(180deg, #0f1a39 0%, #0c1224 100%);
      }
      .rs-breadcrumbs.bg-3::before,
      .rs-breadcrumbs.bg-7::before{
        content:""; position:absolute; inset:-30% -10% auto -10%; height:120%;
        background:
          radial-gradient(110% 120% at 8% 0%, rgba(14,35,68,.30) 0%, rgba(14,35,68,0) 60%),
          radial-gradient(120% 130% at 92% -10%, rgba(19,46,95,.22) 0%, rgba(19,46,95,0) 60%);
        pointer-events:none;
      }
      .rs-breadcrumbs .content-part{ padding:80px 0; }
      .hero-card{
        max-width:860px; padding:28px; border-radius:16px;
        background:rgba(255,255,255,.10); border:1px solid rgba(255,255,255,.18);
        color:#eaf0ff; box-shadow:0 24px 60px rgba(0,0,0,.25);
        backdrop-filter:blur(4px) saturate(120%); animation:heroIn .8s ease both;
      }
      .hero-card h1{ font-size:clamp(28px,4vw,44px); line-height:1.08; margin:6px 0 10px; color:#fff; font-weight:800; }
      .hero-card p{ margin:0; color:#dfe6ff; }
      @keyframes heroIn{ from{opacity:0; transform:translateY(18px) scale(.985)} to{opacity:1; transform:none} }

      /* ===== PAGE INTRO ===== */
      .rs-page-intro{
        background: linear-gradient(180deg, #fafbff 0%, #f3f6ff 100%);
        padding: 64px 0;
        text-align:center;
      }
      .rs-page-intro .eyebrow{
        display:inline-block; font-size:12px; letter-spacing:.18em; text-transform:uppercase; color:#9aa6c3;
      }
      .rs-page-intro .main-heading{
        font-size: clamp(26px, 3.4vw, 36px); line-height:1.15; color:var(--ink); font-weight:800; margin:8px 0 8px;
      }
      .rs-page-intro .lead-text{
        font-size: clamp(15px,1.7vw,17px); color:#2c3e68; max-width:780px; margin:0 auto;
      }

      /* ===== SECTION WRAPPER ===== */
      .seg-section{ padding: 40px 0 64px; }
      .seg-row{ align-items:center; }
      .seg-title{ font-size:clamp(20px, 2.5vw, 26px); color:var(--ink); font-weight:800; margin:8px 0 10px; }
      .seg-desc{ color:#2c3e68; margin-bottom:14px; }

      /* ===== IMAGE ===== */
      .seg-media{
        position:relative; border-radius:16px; overflow:hidden;
        background:#0b1530; box-shadow:0 24px 60px rgba(16,28,52,.14);
      }
      .seg-img{
        width:100%; height:auto; display:block; aspect-ratio:16/10; object-fit:cover;
        transform:scale(1.001); transition:transform .6s ease, box-shadow .4s ease;
      }
      .seg-media:hover .seg-img{ transform:scale(1.03); }

      /* ===== TEXT CARD ===== */
      .seg-card{
        background:var(--card); border:1px solid var(--line); border-radius:16px;
        padding: clamp(18px, 3vw, 24px);
        box-shadow:0 12px 30px rgba(16,28,52,.08);
        height:100%;
      }
      .seg-list{
        list-style:none; padding:0; margin:8px 0 0; display:grid; gap:10px;
        color:#2d3c63;
      }
      .seg-list li{ position:relative; padding-left:28px; }
      .seg-list li::before{
        content:""; position:absolute; left:0; top:6px; width:18px; height:18px; border-radius:50%;
        background: conic-gradient(from 180deg, #3b5bb7, #2a427f);
        box-shadow: inset 0 0 0 3px #fff;
      }

      /* ===== ANIMATIONS ===== */
      [data-animate]{ opacity:0; transform:translateY(22px) scale(.985); transition:all .7s cubic-bezier(.2,.65,.3,1); }
      [data-animate].active{ opacity:1; transform:none; }

      @media (max-width:991px){
        .rs-breadcrumbs .content-part{ padding:90px 0; }
        .md-mb-20 { margin-bottom: 20px !important; }
        .md-mb-40 { margin-bottom: 40px !important; }
        .md-pr-15 { padding-right: 15px !important; }
      }
    </style>

    <!-- Main content Start -->
    <div class="main-content">

      <!-- Brand hero -->
      <div class="rs-breadcrumbs bg-7">
        <div class="container">
          <div class="content-part text-center">
            <div class="hero-card">
              <span class="eyebrow">Solutions</span>
              <h1 class="breadcrumbs-title white-color mb-0">Segment Wise Solutions</h1>
              <p>Tailored refrigeration & cold-chain designs for every industry we serve.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Page intro -->
      <!-- <section class="rs-page-intro">
        <div class="container">
          <span class="eyebrow">Overview</span>
          <h2 class="main-heading">Segments</h2>
          <p class="lead-text">Explore our tailored cold chain and refrigeration solutions, customized for diverse industries and applications.</p>
        </div>
      </section> -->

      <!-- Segments -->
      <section class="seg-section">
        <!-- Ice Cream & Milk -->
        <div class="container mb-40" data-animate>
          <div class="row seg-row">
            <div class="col-lg-5 md-mb-40">
              <div class="seg-media">
                <img class="seg-img" src="assets/images/products/milk.webp" alt="Ice Cream & Milk Products">
              </div>
            </div>
            <div class="col-lg-7">
              <div class="seg-card">
                <h3 class="seg-title">Ice Cream &amp; Milk Products</h3>
                <ul class="seg-list">
                  <li>Rack type refrigeration for varied load consumption</li>
                  <li>Customized for swift temperature pull-down needs</li>
                  <li>Dairy-grade construction; eco-friendly, CFC-free</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Banana Ripening -->
        <div class="container mb-40" data-animate>
          <div class="row seg-row">
            <div class="col-lg-7 md-mb-40">
              <div class="seg-card">
                <h3 class="seg-title">Banana Ripening</h3>
                <p class="seg-desc">We provide cold room products &amp; solutions to segments requiring temperature &amp; humidity control for preservation.</p>
                <ul class="seg-list">
                  <li>Airtight chambers with specially designed doors</li>
                  <li>High-CFM indoor units specialized for high humidity</li>
                  <li>Web-based monitoring of Temperature, Humidity, Ethylene &amp; CO<sub>2</sub></li>
                  <li>Manual / semi-automatic / automatic ripening systems</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="seg-media">
                <img class="seg-img" src="assets/images/products/banana-ripening-chambers.webp" alt="Banana Ripening">
              </div>
            </div>
          </div>
        </div>

        <!-- Pharma -->
        <div class="container mb-40" data-animate>
          <div class="row seg-row">
            <div class="col-lg-5 md-mb-40">
              <div class="seg-media">
                <img class="seg-img" src="assets/images/products/cold-room-for-pharma.webp" alt="Pharma">
              </div>
            </div>
            <div class="col-lg-7">
              <div class="seg-card">
                <h3 class="seg-title">Pharma</h3>
                <ul class="seg-list">
                  <li>Pharma-grade, CFC-free PUF panel construction</li>
                  <li>Thermally efficient materials; chutes to prevent cargo exposure</li>
                  <li>Customized water-chiller packages</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Meat Processing -->
        <div class="container mb-40" data-animate>
          <div class="row seg-row">
            <div class="col-lg-7 md-mb-40">
              <div class="seg-card">
                <h3 class="seg-title">Meat Processing</h3>
                <p class="seg-desc">We provide cold room products &amp; solutions to segments requiring temperature &amp; humidity control for preservation.</p>
                <ul class="seg-list">
                  <li>High-efficiency refrigeration units with low power consumption</li>
                  <li>Food-grade panels</li>
                  <li>Blast freezers</li>
                  <li>Pre-cooling chambers &amp; cold storage facilities</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="seg-media">
                <img class="seg-img" src="assets/images/products/meat-processing.webp" alt="Meat Processing">
              </div>
            </div>
          </div>
        </div>

        <!-- Hospitality -->
        <div class="container mb-40" data-animate>
          <div class="row seg-row">
            <div class="col-lg-5 md-mb-40">
              <div class="seg-media">
                <img class="seg-img" src="assets/images/products/cold-room-for-hospitality (1).webp" alt="Hospitality">
              </div>
            </div>
            <div class="col-lg-7">
              <div class="seg-card">
                <h3 class="seg-title">Hospitality</h3>
                <p class="seg-desc">We provide cold room products &amp; solutions to segments requiring temperature &amp; humidity control for preservation.</p>
                <ul class="seg-list">
                  <li>Store pre-cooked / semi-cooked food, fruits, vegetables, meat, poultry, dairy, seeds &amp; even garbage</li>
                  <li>Designed to be safe &amp; user-friendly</li>
                  <li>High performance and energy efficient</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Blast Freezers / IQF -->
        <div class="container mb-40" data-animate>
          <div class="row seg-row">
            <div class="col-lg-7 md-mb-40">
              <div class="seg-card">
                <h3 class="seg-title">Blast Freezers / IQF Facilities</h3>
                <p class="seg-desc">We provide cold room products &amp; solutions to segments requiring temperature &amp; humidity control for preservation.</p>
                <ul class="seg-list">
                  <li>Ideal for seafood</li>
                  <li>Peas / corn processing</li>
                  <li>Cut fruit &amp; vegetable IQF</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="seg-media">
                <img class="seg-img" src="assets/images/products/blast.webp" alt="Blast Freezers / IQF">
              </div>
            </div>
          </div>
        </div>

        <!-- Sea Food & Fisheries -->
        <div class="container mb-40" data-animate>
          <div class="row seg-row">
            <div class="col-lg-5 md-mb-40">
              <div class="seg-media">
                <img class="seg-img" src="assets/images/products/seafood.webp" alt="Sea Food & Fisheries">
              </div>
            </div>
            <div class="col-lg-7">
              <div class="seg-card">
                <h3 class="seg-title">Sea Food &amp; Fisheries</h3>
                <p class="seg-desc">We provide cold room products &amp; solutions to segments requiring temperature &amp; humidity control for preservation.</p>
                <ul class="seg-list">
                  <li>CFC-free food-grade PUF panels</li>
                  <li>Blast freezers</li>
                  <li>Pre-cooling chambers</li>
                  <li>Cold storage facilities</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Warehousing & Logistics -->
        <div class="container mb-40" data-animate>
          <div class="row seg-row">
            <div class="col-lg-7 md-mb-40">
              <div class="seg-card">
                <h3 class="seg-title">Warehousing &amp; Logistics</h3>
                <p class="seg-desc">We provide cold room products &amp; solutions to segments requiring temperature &amp; humidity control for preservation.</p>
                <ul class="seg-list">
                  <li>Double-deep or drive-in racking for logistics &amp; warehouses</li>
                  <li>High-CFM units; compressor rack systems to manage variable loads</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="seg-media">
                <img class="seg-img" src="assets/images/products/ware-house-cold-room.webp" alt="Warehousing & Logistics">
              </div>
            </div>
          </div>
        </div>

        <!-- Pack House & Multi Purpose -->
        <div class="container mb-40" data-animate>
          <div class="row seg-row">
            <div class="col-lg-5 md-mb-40">
              <div class="seg-media">
                <img class="seg-img" src="assets/images/products/pack.webp" alt="Pack House & Multi Purpose">
              </div>
            </div>
            <div class="col-lg-7">
              <div class="seg-card">
                <h3 class="seg-title">Pack House &amp; Multi Purpose</h3>
                <p class="seg-desc">We provide cold room products &amp; solutions to segments requiring temperature &amp; humidity control for preservation.</p>
                <ul class="seg-list">
                  <li>Pre-cooling, packing &amp; grading lines</li>
                  <li>Washing area; cold stores for various products</li>
                  <li>Reliable &amp; easy to use</li>
                  <li>Stainless steel body for longer life</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Floriculture -->
        <div class="container mb-40" data-animate>
          <div class="row seg-row">
            <div class="col-lg-7 md-mb-40">
              <div class="seg-card">
                <h3 class="seg-title">Floriculture</h3>
                <p class="seg-desc">We provide cold room products &amp; solutions to segments requiring temperature &amp; humidity control for preservation.</p>
                <ul class="seg-list">
                  <li>Reduces respiration &amp; internal enzyme breakdown</li>
                  <li>Minimizes water loss / wilting; slows disease growth</li>
                  <li>Provides time for proper handling, packaging &amp; marketing</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="seg-media">
                <img class="seg-img" src="assets/images/products/Floriculture.webp" alt="Floriculture">
              </div>
            </div>
          </div>
        </div>

        <!-- Agro Products -->
        <div class="container mb-40" data-animate>
          <div class="row seg-row">
            <div class="col-lg-5 md-mb-40">
              <div class="seg-media">
                <img class="seg-img" src="assets/images/products/agro.webp" alt="Agro Products">
              </div>
            </div>
            <div class="col-lg-7">
              <div class="seg-card">
                <h3 class="seg-title">Agro Products</h3>
                <p class="seg-desc">We provide cold room products &amp; solutions to segments requiring temperature &amp; humidity control for preservation.</p>
                <ul class="seg-list">
                  <li>Maintain humidity &amp; freshness</li>
                  <li>Energy-efficient, CFC-free panels</li>
                  <li>Lower power consumption</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Horticulture -->
        <div class="container mb-40" data-animate>
          <div class="row seg-row">
            <div class="col-lg-7 md-mb-40">
              <div class="seg-card">
                <h3 class="seg-title">Horticulture</h3>
                <p class="seg-desc">We provide cold room products &amp; solutions to segments requiring temperature &amp; humidity control for preservation.</p>
                <ul class="seg-list">
                  <li>Atmosphere-specialized cold rooms</li>
                  <li>Natural-like atmosphere with appropriate humidity</li>
                  <li>Supports proper &amp; healthy growth and preserving</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="seg-media">
                <img class="seg-img" src="assets/images/products/horticulture.webp" alt="Horticulture">
              </div>
            </div>
          </div>
        </div>

        <!-- Transport Refrigeration Products -->
        <div class="container mb-10" data-animate>
          <div class="row seg-row">
            <div class="col-lg-5 md-mb-40">
              <div class="seg-media">
                <img class="seg-img" src="assets/images/products/refrigeration-van (1).webp" alt="Transport Refrigeration Products">
              </div>
            </div>
            <div class="col-lg-7">
              <div class="seg-card">
                <h3 class="seg-title">Transport Refrigeration Products</h3>
                <p class="seg-desc">We provide cold room products &amp; solutions to segments requiring temperature &amp; humidity control for preservation.</p>
                <ul class="seg-list">
                  <li>Compact design with reliability in extreme climates</li>
                  <li>Lowest fuel consumption; reduced noise levels</li>
                  <li>Lower service costs &amp; CO<sub>2</sub> emissions</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Controlled Atmosphere -->
        <div class="container" data-animate>
          <div class="row seg-row">
            <div class="col-lg-7 md-mb-40">
              <div class="seg-card">
                <h3 class="seg-title">Controlled Atmosphere (CA) Solution</h3>
                <p class="seg-desc">We provide cold room products &amp; solutions to segments requiring temperature &amp; humidity control for preservation.</p>
                <ul class="seg-list">
                  <li>Innovative CA storage to control &amp; generate desired atmosphere</li>
                  <li>Lower temperature &amp; oxygen slow fruit/vegetable metabolism to extend shelf life</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="seg-media">
                <img class="seg-img" src="assets/images/products/apple-cold-room (1).webp" alt="Controlled Atmosphere Solution">
              </div>
            </div>
          </div>
        </div>

      </section>
      <!-- /Segments -->
    </div>
    <!-- Main content End -->

    <?php include('footer.php'); ?>

    <!-- Reveal-on-scroll (no deps) -->
    <script>
      (function(){
        const els = document.querySelectorAll('[data-animate]');
        if(!('IntersectionObserver' in window)){ els.forEach(el=>el.classList.add('active')); return; }
        const io = new IntersectionObserver((entries)=>{
          entries.forEach(e=>{ if(e.isIntersecting){ e.target.classList.add('active'); io.unobserve(e.target);} });
        }, {threshold:.18});
        els.forEach(el=>io.observe(el));
      })();
    </script>
  </body>
</html>
