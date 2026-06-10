<?php
  // ====== PAGE VARIABLES (edit per product) ======
  $product_slug   = 'ripening-systems.php'; // file name of THIS page
  $product_title  = 'Ripening Systems';
  $hero_tagline   = 'Controlled-atmosphere solutions for uniform, high-quality ripening.';
  $image_src      = 'assets/images/products/ripening-systems.webp';
  $image_alt      = 'Ripening Systems';

  // UPDATED CONTENT (exactly as provided)
  $lead_text      = 'The Singhania refrigeration systems are made to keep the temperature, humidity, and ethylene levels just right, which means that the same fruit will always ripen to the same quality. These systems have been put in place to protect against more damage and make sure that bananas, mangoes, and other climacteric fruits are always available. Our maturing rooms use energy efficiently, improve food safety, and are easy to use to find the right balance between freshness and flavor. Fruit wholesalers, importers, and retailers who need programmable control and new ways to monitor can trust these systems.';

  $highlights = [
    'Uniform maturation is accomplished by precisely controlling humidity and temperature.',
    'Programmable ventilation and ethylene dosing cycles for the regulation of ripening phases.',
    'A construction that is food-safe and has easy sanitation access, thereby assuring compliance and hygiene.',
    'Energy-efficient ventilation and optimized heat exchange for decreased operational expenses.',
    'IoT-enabled monitoring, alerts & data logging options for proactive system management.',
  ];

  // Sidebar list (keep once here and reuse for all pages)
  $products = [
    'truck-ac.php'                         => "Truck’s AC",
    'truck-refrigerator-container.php'     => "Truck’s Refrigerator Container",
    'cold-storage-refrigeration-units.php' => "Cold Storage Refrigeration Units",
    'compressor-rack-system.php'           => "Compressor Rack System",
    'ammonia-refrigeration-units.php'      => "Ammonia Refrigeration Units",
    'ripening-systems.php'                 => "Ripening Systems",
    'multideck-cabinet.php'                => "Multideck Cabinet",
    'iqf.php'                              => "IQF (Individual Quick Freeze)",
    'doors-ca-doors.php'                   => "Doors & CA Doors",
    'panels.php'                           => "PUF Panels",
    'dock-shelter-dock-leveler.php'        => "Dock Shelter & Dock Leveler",
    'heavy-duty-racks.php'                 => "Heavy Duty Racks",
    'ca-solutions.php'                     => "Warehousing Equipment’s",
  ];
?>
<!DOCTYPE html>
<html lang="zxx">
  <head>
    <?php include('head.php'); ?>
    <style>
      :root{
        --ink:#0f2442; --muted:#667085; --soft:#f6f8ff; --card:#ffffff; --line:#e7ecf5;
        --brand:#0e2344; --brand2:#082243;
      }
      /* HERO */
      .rs-breadcrumbs.bg-7{position:relative;background:linear-gradient(180deg,#0f1a39 0%,#0c1224 100%);overflow:hidden;}
      .rs-breadcrumbs.bg-7::before{
        content:"";position:absolute;inset:-30% -10% auto -10%;height:120%;
        background:radial-gradient(110% 120% at 8% 0%, rgba(14,35,68,.30) 0%, rgba(14,35,68,0) 60%),
                   radial-gradient(120% 130% at 92% -10%, rgba(19,46,95,.22) 0%, rgba(19,46,95,0) 60%);
        pointer-events:none;
      }
      .rs-breadcrumbs .content-part{ padding:80px 0; }
      .hero-card{
        max-width:760px;background:rgba(255,255,255,.10);border:1px solid rgba(255,255,255,.18);
        border-radius:16px;padding:28px;color:#eaf0ff;box-shadow:0 24px 60px rgba(0,0,0,.25);
        backdrop-filter:blur(4px) saturate(120%);animation:heroIn .8s ease both;
      }
      .hero-card h1{font-size:clamp(28px,4vw,44px);line-height:1.08;margin:6px 0 10px;color:#fff;font-weight:800;}
      .hero-card p{color:#dfe6ff;margin:0;}
      @keyframes heroIn{from{opacity:0;transform:translateY(18px) scale(.985)}to{opacity:1;transform:none}}

      /* LAYOUT */
      .section-pad{ padding:64px 0 90px; }
      .g-30>[class*="col-"]{ margin-bottom:30px; }

      /* LEFT */
      .prod-media{position:relative;border-radius:16px;overflow:hidden;box-shadow:0 24px 60px rgba(16,28,52,.18);background:#0b1530;}
      .prod-media img{width:100%;height:auto;display:block;aspect-ratio:16/10;object-fit:cover;transform:scale(1.001);transition:transform .6s ease;}
      .prod-media:hover img{ transform:scale(1.03); }
      .h2{ font-size:clamp(22px,2.6vw,28px); color:var(--ink); font-weight:800; margin:26px 0 10px; }
      .lead{ color:#2c3e68; font-size:clamp(15px,1.6vw,17px); }

      .card-lite{ background:var(--card); border:1px solid var(--line); border-radius:16px;
        padding:clamp(18px,3vw,24px); box-shadow:0 12px 30px rgba(16,28,52,.08); }

      .feature-list{ list-style:none; padding:0; margin:10px 0 0; display:grid; gap:10px; }
      .feature-list li{ position:relative; padding-left:28px; color:#2d3c63; }
      .feature-list li::before{
        content:""; position:absolute; left:0; top:6px; width:18px; height:18px; border-radius:50%;
        background:conic-gradient(from 180deg,#3b5bb7,#2a427f); box-shadow:inset 0 0 0 3px #fff;
      }

      /* SIDEBAR (non-sticky) */
      .project-sidebar .sb-project-detail{
        background:#fff; border:1px solid var(--line); border-radius:16px; box-shadow:0 12px 30px rgba(16,28,52,.08);
        padding:18px 18px 8px; position:static !important; top:auto !important;
      }
      .project-sidebar .title{ margin:4px 4px 12px; font-weight:800; color:var(--ink); }
      .project-sidebar ul{ list-style:none; margin:0; padding:0; }
      .project-sidebar li a{
        display:block; padding:10px 12px; margin:2px 0; border-radius:10px; color:#33446f; text-decoration:none;
        transition:background .2s ease, color .2s ease, transform .08s ease;
      }
      .project-sidebar li a:hover{ background:#eef2ff; color:#172a57; transform:translateX(2px); }
      .project-sidebar li a.active{
        background:linear-gradient(180deg,#2b427f,#243865); color:#fff; box-shadow:0 10px 22px rgba(20,36,86,.25);
      }
      .project-sidebar li a:focus-visible{ outline:3px solid rgba(28,47,87,.45); outline-offset:2px; }

      /* CTA */
      .cta-bar{ margin-top:18px; display:flex; gap:10px; flex-wrap:wrap; }
      .btn-brand{
        display:inline-block; border:0; cursor:pointer; padding:12px 18px; border-radius:12px;
        background:#17203b; color:#fff; font-weight:700; text-decoration:none;
        box-shadow:0 12px 28px rgba(14,35,68,.28);
        transition:transform .12s ease, box-shadow .2s ease, background .2s ease;
      }
      .btn-brand:hover{ background:#0f1630; transform:translateY(-1px); box-shadow:0 16px 34px rgba(14,35,68,.34); }

      /* Reveal-on-scroll */
      [data-animate]{ opacity:0; transform:translateY(22px) scale(.985); transition:all .7s cubic-bezier(.2,.65,.3,1); }
      [data-animate].active{ opacity:1; transform:none; }

      @media (max-width: 991px){ .rs-breadcrumbs .content-part{ padding:90px 0; } }
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
              <h1 class="mb-10"><?php echo htmlspecialchars($product_title); ?></h1>
              <p><?php echo htmlspecialchars($hero_tagline); ?></p>
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
                <img src="assets/images/products/banana-ripening-cold-room.webp"
                     alt="<?php echo htmlspecialchars($image_alt); ?>"
                     width="1200" height="800" loading="lazy" decoding="async">
              </div>

              <h2 class="h2">Key Product Features</h2>
              <p class="lead"><?php echo htmlspecialchars($lead_text); ?></p>

              <div class="card-lite mt-20">
                <h4 class="mb-10" style="font-weight:800;color:var(--ink);">Highlights</h4>
                <ul class="feature-list">
                  <?php foreach($highlights as $item): ?>
                    <li><?php echo htmlspecialchars($item); ?></li>
                  <?php endforeach; ?>
                </ul>
                <div class="cta-bar">
                  <a href="contact.php" class="btn-brand">Request a Quote</a>
                </div>
              </div>
            </div>

            <!-- RIGHT: scrolling sidebar -->
            <div class="col-lg-4 md-mb-50 md-order-first" data-animate>
              <div class="project-sidebar">
                <div class="sb-project-detail">
                  <h4 class="title">Products</h4>
                  <ul>
                    <?php foreach($products as $file => $label): ?>
                      <li>
                        <a class="<?php echo ($file === $product_slug ? 'active' : ''); ?>" href="<?php echo $file; ?>">
                          <?php echo $label; ?>
                        </a>
                      </li>
                    <?php endforeach; ?>
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

    <script>
      (function(){
        const els = document.querySelectorAll('[data-animate]');
        if(!('IntersectionObserver' in window)){
          els.forEach(el=>el.classList.add('active')); return;
        }
        const io = new IntersectionObserver((entries)=>{
          entries.forEach(e=>{ if(e.isIntersecting){ e.target.classList.add('active'); io.unobserve(e.target);} });
        }, {threshold:.18});
        els.forEach(el=>io.observe(el));
      })();
    </script>
  </body>
</html>
