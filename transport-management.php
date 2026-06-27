<!DOCTYPE html>
<html lang="zxx">
  <head>
    <?php include('head.php'); ?>
    <style>
      :root{
        --ink:#0f2442; --muted:#667085; --soft:#f6f8ff; --card:#ffffff; --line:#e7ecf5;
        --brand:#0e2344; --brand2:#082243;
      }

      /* ====== HERO / BREADCRUMB ====== */
      .rs-breadcrumbs.bg-7{
        position:relative; overflow:hidden;
        background: linear-gradient(180deg, #0f1a39 0%, #0c1224 100%);
      }
      .rs-breadcrumbs.bg-7::before{
        content:""; position:absolute; inset:-30% -10% auto -10%; height:120%;
        background:
          radial-gradient(110% 120% at 8% 0%, rgba(14,35,68,.30) 0%, rgba(14,35,68,0) 60%),
          radial-gradient(120% 130% at 92% -10%, rgba(19,46,95,.22) 0%, rgba(19,46,95,0) 60%);
        pointer-events:none;
      }
      .rs-breadcrumbs .content-part{ padding:80px 0; }
      .hero-card{
        max-width:960px; padding:28px; border-radius:16px; margin:auto; text-align:left;
        background:rgba(255,255,255,.10); border:1px solid rgba(255,255,255,.18);
        color:#eaf0ff; box-shadow:0 24px 60px rgba(0,0,0,.25);
        backdrop-filter:blur(4px) saturate(120%); animation:heroIn .8s ease both;
      }
      .hero-card h1{ font-size:clamp(28px,4vw,44px); line-height:1.08; margin:6px 0 10px; color:#fff; font-weight:800; }
      .hero-card p{ margin:0; color:#dfe6ff; }
      @keyframes heroIn{ from{opacity:0; transform:translateY(18px) scale(.985)} to{opacity:1; transform:none} }

      /* ====== SECTIONS ====== */
      .section-pad{ padding:64px 0 90px; }
      .h2{ font-size:clamp(22px,2.6vw,28px); color:var(--ink); font-weight:800; margin:20px 0 10px; }
      .lead{ color:#2c3e68; text-align: justify; font-size:clamp(15px,1.6vw,17px); }

      /* ====== MEDIA ====== */
      .feature-media{
        position:relative; border-radius:16px; overflow:hidden;
        background:#0b1530; box-shadow:0 24px 60px rgba(16,28,52,.18);
      }
      .feature-media img{
        width:100%; height:auto; display:block; aspect-ratio:16/10; object-fit:cover;
        transform:scale(1.001); transition:transform .6s ease;
      }
      .feature-media:hover img{ transform:scale(1.03); }

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
      .cta-bar{ margin-top:18px; display:flex; gap:10px; flex-wrap:wrap; }
      .btn-brand{
        display:inline-block; padding:12px 18px; border-radius:12px; border:0; cursor:pointer;
        background:#17203b; color:#fff; font-weight:700; text-decoration:none;
        box-shadow:0 12px 28px rgba(14,35,68,.28);
        transition:transform .12s, box-shadow .2s, background .2s;
      }
      .btn-brand:hover{ background:#0f1630; transform:translateY(-1px); box-shadow:0 16px 34px rgba(14,35,68,.34); }

      /* ====== Reveal-on-scroll ====== */
      [data-animate]{ opacity:0; transform:translateY(22px) scale(.985); transition:all .7s cubic-bezier(.2,.65,.3,1); }
      [data-animate].active{ opacity:1; transform:none; }

      @media (max-width: 991px){
        .rs-breadcrumbs .content-part{ padding:90px 0; }
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
              <span style="display:inline-block;font-size:12px;letter-spacing:.18em;text-transform:uppercase;color:#b9c5e6;">SERVICE</span>
              <h1 class="mb-10">Transport Management System</h1>
              <p>Plan routes, monitor environment, alert on deviations, and measure delivery performance &amp; productivity end-to-end.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Overview -->
      <section class="section-pad">
        <div class="container">
          <div class="row">
            <!-- LEFT: Image -->
            <div class="col-lg-5 pr-45 md-pr-15" data-animate>
              <div class="feature-media">
                <img
                  src="assets/images/products/refrigeration-van.webp"
                  alt="Refrigerated transport van for TMS"
                  width="1200" height="800" loading="lazy" decoding="async">
              </div>
            </div>

            <!-- RIGHT: Copy + feature card -->
            <div class="col-lg-7 md-mb-50 md-order-first" data-animate>
              <h2 class="h2">Plan, Monitor &amp; Improve: Intelligent Terrestrial Transport Optimization by Singhania Refrigeration</h2>
              <p class="lead">
                Singhania Refrigeration optimizes terrestrial transport rounds with AI route planning, real-time condition tracking, and actionable reporting. Reduce empty kilometers, lower fuel costs, enhance fleet utilization, and protect refrigerated cargo. Plan, monitor, improve—seamlessly.
              </p>

              <div class="card-lite mt-16">
                <h4 class="mb-10" style="font-weight:800;color:var(--ink);">TMS Features</h4>
                <ul class="checklist">
                  <li><strong>Route planning &amp; optimization:</strong> Build efficient rounds for reduced cost &amp; time</li>
                  <li><strong>Environment monitoring:</strong> Temperature, humidity, pressure, ambient light &amp; gas sensors</li>
                  <li><strong>Live status via SMS:</strong> Location and environment updates to stakeholders</li>
                  <li><strong>Deviation alerts:</strong> Automatic SMS on temperature beyond safe limits</li>
                  <li><strong>Reporting – Delivery performance:</strong> On-time %, exceptions, dwell times</li>
                  <li><strong>Reporting – Monetary productivity:</strong> Cost per unit weight/shipping unit</li>
                  <li><strong>Reporting – Operational productivity:</strong> Shipping units per order, weight per load</li>
                </ul>
                <div class="cta-bar">
                  <a href="contact.php" class="btn-brand">Request a Demo</a>
                  <!-- <a href="assets/brochures/transport-management.pdf" class="btn-brand" target="_blank" rel="noopener">Download Brochure</a> -->
                </div>
              </div>
            </div>
          </div>

          <!-- Optional secondary section -->
          <div class="row mt-30">
            <div class="col-12" data-animate>
              <div class="card-lite">
                <h4 class="mb-10" style="font-weight:800;color:var(--ink);">Benefits</h4>
                <ul class="checklist">
                  <li>Reduce spoilage with proactive alerts &amp; corrective actions</li>
                  <li>Lower transport cost via optimized rounds &amp; utilization</li>
                  <li>Transparent KPIs for finance &amp; operations teams</li>
                  <li>Complete audit trail for compliance and SLAs</li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </section>
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
