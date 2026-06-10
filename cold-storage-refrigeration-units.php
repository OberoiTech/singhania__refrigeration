<!DOCTYPE html>
<html lang="zxx">
  <head>
    <?php include('head.php'); ?>
    <style>
      :root{
        --ink:#0f2442;
        --muted:#667085;
        --soft:#f6f8ff;
        --card:#ffffff;
        --line:#e7ecf5;
        --brand:#0e2344;
        --brand2:#082243;
      }

      /* ====== HERO / BREADCRUMB ====== */
      .rs-breadcrumbs.bg-7{
        position: relative;
        background: linear-gradient(180deg, #0f1a39 0%, #0c1224 100%);
        overflow:hidden;
      }
      .rs-breadcrumbs.bg-7::before{
        content:"";
        position:absolute; inset:-30% -10% auto -10%; height:120%;
        background:
          radial-gradient(110% 120% at 8% 0%, rgba(14,35,68,.30) 0%, rgba(14,35,68,0) 60%),
          radial-gradient(120% 130% at 92% -10%, rgba(19,46,95,.22) 0%, rgba(19,46,95,0) 60%);
        pointer-events:none;
      }
      .rs-breadcrumbs .content-part{ padding: 80px 0; }
      .hero-card{
        max-width: 760px;
        background: rgba(255,255,255,.10);
        border: 1px solid rgba(255,255,255,.18);
        border-radius: 16px;
        padding: 28px;
        color:#eaf0ff;
        box-shadow: 0 24px 60px rgba(0,0,0,.25);
        backdrop-filter: blur(4px) saturate(120%);
        animation: heroIn .8s ease both;
      }
      .hero-card h1{
        font-size: clamp(28px, 4vw, 44px);
        line-height:1.08; margin:6px 0 10px; color:#fff; font-weight:800;
      }
      .hero-card p{ color:#dfe6ff; margin:0; }
      @keyframes heroIn{
        from{opacity:0; transform:translateY(18px) scale(.985)}
        to{opacity:1; transform:none}
      }

      /* ====== LAYOUT ====== */
      .section-pad{ padding: 64px 0 90px; }
      .g-30>[class*="col-"]{ margin-bottom:30px; }

      /* ====== LEFT: PRODUCT CONTENT ====== */
      .prod-media{
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 24px 60px rgba(16,28,52,.18);
        background:#0b1530;
      }
      .prod-media img{
        width:100%; height:auto; display:block;
        aspect-ratio: 16 / 10;
        object-fit: cover;
        transform: scale(1.001);
        transition: transform .6s ease;
      }
      .prod-media:hover img{ transform: scale(1.03); }

      .h2{ font-size: clamp(22px, 2.6vw, 28px); color:var(--ink); font-weight:800; margin:26px 0 10px; }
      .lead{ color:#2c3e68; font-size: clamp(15px, 1.6vw, 17px); }

      .card-lite{
        background:var(--card);
        border:1px solid var(--line);
        border-radius:16px;
        padding: clamp(18px, 3vw, 24px);
        box-shadow:0 12px 30px rgba(16,28,52,.08);
      }

      .feature-list{ list-style:none; padding:0; margin:10px 0 0; display:grid; gap:10px; }
      .feature-list li{ position:relative; padding-left:28px; color:#2d3c63; }
      .feature-list li::before{
        content:""; position:absolute; left:0; top:6px; width:18px; height:18px; border-radius:50%;
        background: conic-gradient(from 180deg, #3b5bb7, #2a427f);
        box-shadow: inset 0 0 0 3px #fff;
      }

      /* ====== RIGHT: SIDEBAR ====== */
      .project-sidebar .sb-project-detail{
        background:#fff;
        border:1px solid var(--line);
        border-radius:16px;
        box-shadow:0 12px 30px rgba(16,28,52,.08);
        padding: 18px 18px 8px;
        position: static !important;
        top: auto !important;
      }
      .project-sidebar .title{
        margin: 4px 4px 12px;
        font-weight:800; color:var(--ink);
      }
      .project-sidebar ul{ list-style:none; margin:0; padding:0; }
      .project-sidebar li a{
        display:block; padding:10px 12px; margin:2px 0;
        border-radius:10px; color:#33446f; text-decoration:none;
        transition: background .2s ease, color .2s ease, transform .08s ease;
      }
      .project-sidebar li a:hover{
        background:#eef2ff;
        color:#172a57;
        transform: translateX(2px);
      }
      .project-sidebar li a.active{
        background: linear-gradient(180deg, #2b427f, #243865);
        color:#fff;
        box-shadow: 0 10px 22px rgba(20,36,86,.25);
      }
      .project-sidebar li a:focus-visible{
        outline: 3px solid rgba(28,47,87,.45);
        outline-offset: 2px;
      }

      /* ====== CTA BAR ====== */
      .cta-bar{
        margin-top:18px;
        display:flex; gap:10px; flex-wrap:wrap;
      }
      .btn-brand{
        display:inline-block; border:0; cursor:pointer;
        padding:12px 18px; border-radius:12px;
        background:#17203b; color:#fff; font-weight:700;
        box-shadow:0 12px 28px rgba(14,35,68,.28);
        transition: transform .12s ease, box-shadow .2s ease, background .2s ease;
        text-decoration:none;
      }
      .btn-brand:hover{ background:#0f1630; transform: translateY(-1px); box-shadow:0 16px 34px rgba(14,35,68,.34); }

      /* ====== MICRO-ANIMATIONS ====== */
      [data-animate]{ opacity:0; transform: translateY(22px) scale(.985); transition: all .7s cubic-bezier(.2,.65,.3,1); }
      [data-animate].active{ opacity:1; transform:none; }

      @media (max-width: 991px){
        .rs-breadcrumbs .content-part{ padding: 90px 0; }
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
              <span style="display:inline-block;font-size:12px;letter-spacing:.18em;text-transform:uppercase;color:#b9c5e6;">PRODUCT</span>
              <h1 class="mb-10">Cold Storage Refrigeration Units</h1>
              <p>Trusted, energy-efficient systems for warehouses and cold rooms with precise temperature control.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Product Section -->
      <section class="section-pad">
        <div class="container">
          <div class="row">
            <!-- LEFT -->
            <div class="col-lg-8 pr-45 md-pr-15" data-animate>
              <div class="prod-media">
                <img
                  src="https://singhaniarefrigeration.com/assets/images/products/cold-storage.jpg"
                  alt="Cold Storage Refrigeration Units"
                  width="768" height="511" loading="lazy" decoding="async">
              </div>

              <h2 class="h2">Key Product Features</h2>
              <p class="lead">
                Refrigeration units for cold storage in Delhi provided by Singhania Refrigeration are designed to provide high-quality and high-performing cold storage facilities that are energy-efficient. High-quality cold chain refrigeration units provided by Singhania Refrigeration in Delhi NCR are capable of maintaining optimal temperatures in order to keep your food fresh, like fruits, vegetables, dairy products, meats, and medicines. Industrial refrigeration units provided by us in Delhi are reliable and durable, with very little maintenance. By providing optimal cooling facilities, insulation, and optimal air flow, we ensure that you get quality cold storage services in Delhi, Noida, Gurgaon, and Ghaziabad.
              </p>

              <div class="card-lite mt-20">
                <h4 class="mb-10" style="font-weight:800;color:var(--ink);">Highlights</h4>
                <ul class="feature-list">
                  <li>High-COP compressors and optimized heat exchangers are employed to achieve the highest possible energy efficiency.</li>
                  <li>Wide temperature range compatibility for freezer and refrigeration applications.</li>
                  <li>Smart control options that include data logging and alarms for precise monitoring and safety.</li>
                  <li>Service-friendly design and readily available replacements for effortless maintenance.</li>
                  <li>AMC support that is comprehensive and guarantees consistent performance and lifecycle reliability.</li>
                </ul>
                <div class="cta-bar">
                  <a href="contact.php" class="btn-brand">Request a Quote</a>
                </div>
              </div>
            </div>

            <!-- RIGHT: sidebar -->
            <div class="col-lg-4 md-mb-50 md-order-first" data-animate>
              <div class="project-sidebar">
                <div class="sb-project-detail">
                  <h4 class="title">Products</h4>
                  <ul>
                    <li><a href="truck-ac.php">Truck’s AC</a></li>
                    <li><a href="truck-refrigerator-container.php">Truck’s Refrigerator Containers</a></li>
                    <li><a class="active" href="cold-storage-refrigeration-units.php">Cold Storage Refrigeration Units</a></li>
                    <li><a href="compressor-rack-system.php">Compressor Rack System</a></li>
                    <li><a href="ammonia-refrigeration-units.php">Ammonia Refrigeration Units</a></li>
                    <li><a href="ripening-systems.php">Ripening Systems</a></li>
                    <li><a href="multideck-cabinet.php">Multideck Cabinet</a></li>
                    <li><a href="iqf.php">IQF (Individual Quick Freeze)</a></li>
                    <li><a href="doors-ca-doors.php">Doors &amp; CA Doors</a></li>
                    <li><a href="panels.php">PUF Panels</a></li>
                    <li><a href="dock-shelter-dock-leveler.php">Dock Shelter &amp; Dock Leveler</a></li>
                    <li><a href="heavy-duty-racks.php">Heavy Duty Racks</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- /RIGHT -->
          </div>
        </div>
      </section>

    </div>
    <!-- Main content End -->

    <?php include('footer.php'); ?>

    <!-- Reveal-on-scroll -->
    <script>
      (function(){
        const els = document.querySelectorAll('[data-animate]');
        if (!('IntersectionObserver' in window)){
          els.forEach(el=>el.classList.add('active'));
          return;
        }
        const io = new IntersectionObserver((entries)=>{
          entries.forEach(e=>{
            if(e.isIntersecting){ e.target.classList.add('active'); io.unobserve(e.target); }
          });
        }, {threshold:.18});
        els.forEach(el=>io.observe(el));
      })();
    </script>
  </body>
</html>
