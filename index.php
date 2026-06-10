<?php
error_reporting(0);
include("admin/config.php");

$color = "";
$messageBanner = "";

if (isset($_POST['submit'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $company  = $_POST['company'];
    $location = $_POST['location'];
    $msg      = $_POST['message'];

    if ($name == "" || $email == "" || $phone == "") {
        $color = "<div class='alert alert-danger'>Please fill Name, Email and Phone.</div>";
    } else {
        $sql = "INSERT INTO enquiry (name, email, phone, company, location, message)
                VALUES ('$name', '$email', '$phone', '$company', '$location', '$msg')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Record Added Successfully ✅');</script>";
            $color = "<div class='alert alert-success'>Thanks! We’ll reach out within 24 hours.</div>";
        } else {
            $color = "<div class='alert alert-danger'>Error: Could not save data.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">
  <head> 
    <?php include('head.php'); ?>

    <!-- ===== Light design polish & animations (framework-agnostic) ===== -->
   <style>
/* ========= Base tokens & typography ========= */
:root{
  --brand:#6c63ff;
  --ink:#1f2937;
  --muted:#667085;
  --card:#ffffff;
  --soft:#f6f8fb;
  --line:#e6eaf0;

  /* Responsive hero height (handles mobile browser chrome) */
  --hero-min: 420px;
  --hero-max: 820px;
  --hero-h: clamp(var(--hero-min), 78svh, var(--hero-max));
}
body{ color:var(--ink); }

/* ========= Micro animations & image polish ========= */
[data-animate]{ opacity:0; transform:translateY(26px) scale(.98); transition:all .7s cubic-bezier(.2,.65,.3,1); }
[data-animate].active{ opacity:1; transform:none; }

.img-soft{
  border-radius:14px;
  box-shadow:0 12px 28px rgba(0,0,0,.10);
  transition:transform .45s ease, box-shadow .45s ease, filter .45s ease;
  will-change:transform;
}
.img-soft:hover{ transform:translateY(-3px) scale(1.02); box-shadow:0 18px 40px rgba(0,0,0,.16); }
.blog-cover-img{ width:100%; height:280px; object-fit:cover; display:block; }
.gtm-noscript-iframe{ display:none !important; visibility:hidden !important; }
.section-title-accent{ color:#082243 !important; font-size:30px; }
.about-copy--lead{ margin-top:15px; }
#rs-about p{ text-align:justify; }
.testimonial-shell{ border-radius:16px; }
.testimonial-quote{ color:var(--brand); }

.img-float-onload{ animation:floatY 7s ease-in-out infinite .6s; }
@keyframes floatY{ 0%,100%{transform:translateY(0)} 50%{transform:translateY(-8px)} }

/* ========= Cards & common blocks ========= */
.service-wrap{
  border-radius:16px; background:var(--card);
  box-shadow:0 10px 22px rgba(0,0,0,.06);
  transition:transform .2s ease, box-shadow .25s ease;
}
.service-wrap:hover{ transform:translateY(-4px); box-shadow:0 18px 36px rgba(0,0,0,.12); }
.service-wrap .icon-part img{ filter:drop-shadow(0 6px 10px rgba(0,0,0,.08)); }

#rs-about img, #rs-portfolio .img-part img{ border-radius:16px; }

/* ========= Contact form ========= */
.contact-wrap{ padding:40px 30px; border-radius:16px; }
.contact-sub{ color:var(--muted); margin:.25rem 0 1rem; }
.rs-contact .common-control input,
.rs-contact .common-control textarea{
  background:var(--soft); border:1px solid var(--line); border-radius:10px;
  width:100%; padding:12px 14px; transition:box-shadow .2s ease, border-color .2s ease, background .2s ease;
}
.rs-contact .common-control textarea{ min-height:120px; resize:vertical; }
.rs-contact .common-control input:focus,
.rs-contact .common-control textarea:focus{
  background:#fff; border-color:var(--brand);
  box-shadow:0 0 0 3px rgba(108,99,255,.15); outline:0;
}
.rs-contact .submit-btn .readon{
  background:#17203b; color:#fff; border:none; border-radius:10px; padding:12px 24px; font-weight:600;
  transition:transform .12s ease, box-shadow .2s ease, background .2s ease;
}
.rs-contact .submit-btn .readon:hover{ background:#0f1630; transform:translateY(-1px); box-shadow:0 10px 20px rgba(23,32,59,.22); }
.contact-img{ max-width:100%; height:auto; border-radius:14px; box-shadow:0 12px 26px rgba(0,0,0,.10); }

/* ========= Modal (Quick Connect) ========= */
#myModal .modal-dialog{ max-width:450px; width:92%; margin:1.75rem auto; }
#myModal.modal.in .modal-dialog, #myModal.modal.show .modal-dialog{ display:flex; align-items:center; min-height:calc(100% - 2rem); }
#myModal .modal-content{
  border:1px solid rgba(0,0,0,.06); border-radius:16px; background:#fff;
  box-shadow:0 30px 80px rgba(0, 0, 0, 0.3), 0 12px 24px rgba(0,0,0,.18);
  transform:translateY(6px); transition:transform .25s ease, box-shadow .25s ease;
}
#myModal.modal.in .modal-content, #myModal.modal.show .modal-content{ transform:translateY(0); }
.modal-backdrop.in, .modal-backdrop.show{ opacity:1!important; background:rgba(17,17,17,.12)!important; backdrop-filter:blur(3px); -webkit-backdrop-filter:blur(3px); }

#myModal .modal-header{ border:0; padding:14px 18px 0 18px; display:flex; align-items:center; }
#myModal .modal-title{ margin:0; font-weight:800; font-size:20px; color:#0f2442; }
#myModal .modal-header .close{
  margin-left:auto; padding:0; line-height:1; opacity:.75;
  transition:opacity .12s ease, transform .08s ease;
}
.modal-header .close { margin: 0px ; }
#myModal .modal-header .close:hover{ opacity:1; transform:scale(1.06); }

#myModal .modal-body{ padding:14px 18px 20px 18px; }
#myModal .modal-body .modal-sub{ color:#55607a; margin:0 0 12px; }

#myModal .form-group{ margin-bottom:12px; }
#myModal .form-control{
  height:46px;
  width:100%;
  border-radius:12px;
  border:1px solid rgba(14,35,68,.16);
  box-shadow:none;
}
#myModal .form-control:focus{ border-color:#6c8dff; box-shadow:0 0 0 3px rgba(108,141,255,.18); }

#myModal .btn-primary{
  border-radius:10px; padding:10px 18px; font-weight:700; background:#17203b; border:none; color:#fff;
  box-shadow:0 12px 28px rgba(14,35,68,.28);
  transition:transform .1s ease, box-shadow .2s ease, background .2s ease;
}
#myModal .btn-primary:hover{ background:#132e5f; transform:translateY(-1px); box-shadow:0 16px 34px rgba(14,35,68,.34); }

#myModal .error{ display:block; color:#d93025; font-size:12px; margin-top:6px; }
#myModal .submit-spinner{ display:none; margin-left:8px; }
#myModal .submit-spinner.is-visible{ display:inline-block; }

@media (max-width: 991px){ .md-mt-40{ margin-top:40px!important; } }

/* ========= HERO / BANNER (scoped to #rs-slider) ========= */
.rs-slider.slider1{ position:relative; overflow:hidden; }

#rs-slider #nivoSlider,
#rs-slider #nivoSlider img{
  width:100%;
  height:var(--hero-h);
  object-fit:cover;
  object-position:center;
  display:block;
  background:#0a1530; /* fallback while image loads */
}

/* Hide original overlay container to avoid double overlays */
#rs-slider .slider-direction{ display:none !important; }

/* Nivo places caption HTML here */
/* Nivo-injected caption: force flex + visible */
#rs-slider .nivo-caption{
  display:none !important;
  align-items:center;
  justify-content:flex-start;
  opacity:0 !important;
  padding:0 12px;
  pointer-events:none; /* allow arrows to be clickable */
  transition:opacity .25s ease;
}
#rs-slider .nivo-caption.is-visible{
  display:flex !important;
  opacity:1 !important;
}
#rs-slider .nivo-caption .hero-card{ pointer-events:auto; } /* card stays clickable */

#rs-slider .nivo-caption .hero-card,
#rs-slider .nivo-caption a,
#rs-slider .nivo-caption button,
#rs-slider .nivo-caption input,
#rs-slider .nivo-caption textarea{ pointer-events:auto; }

/* Hero card */
#rs-slider .hero-card{
  background:rgba(13,31,61,.86); color:#fff;
  border-radius:16px; padding:24px 22px; max-width:720px;
  margin-left:clamp(8px,4vw,32px);
  box-shadow:0 20px 60px rgba(0,0,0,.35), 0 8px 18px rgba(0,0,0,.22);
  backdrop-filter:saturate(120%) blur(2px);
  transform-origin:50% 100%;
  animation:heroFloatIn .8s ease .15s both;
}
#rs-slider .hero-card .sl-title{ 
    font-size: clamp(24px, 4vw, 35px);
    line-height: 1.25;
    margin-bottom: 10px;
    padding: 17px 1px;
 }
#rs-slider .hero-card .sl-desc{ font-size:clamp(14px,1.8vw,16px); line-height:1.7; color:#dfe7ff; }
#rs-slider .hero-card .slider-bottom ul{ margin:18px 0 0; padding:0; list-style:none; }
#rs-slider .hero-card .readon.banner-style{
  display:inline-block; background:#1c2f57; color:#fff; border:0; border-radius:10px; padding:12px 20px; font-weight:600;
  transition:transform .15s ease, background .2s ease, box-shadow .2s ease; box-shadow:0 8px 18px rgba(28,47,87,.35);
}
#rs-slider .hero-card .readon.banner-style:hover{ transform:translateY(-1px); background:#102246; box-shadow:0 12px 28px rgba(28,47,87,.45); }

@keyframes heroFloatIn{ from{opacity:0; transform:translateY(22px) scale(.985);} to{opacity:1; transform:translateY(0) scale(1);} }

/* Arrows/dots stacking */
#rs-slider .nivo-directionNav a{ z-index:9 !important; }
#rs-slider .nivo-controlNav{ z-index:6; }

/* Readability gradient across photos */
.rs-slider.slider1::after{
  content:""; position:absolute; inset:0; pointer-events:none; z-index:2;
  background:linear-gradient(90deg, rgba(6,14,30,0.28) 0%, rgba(6,14,30,0.18) 28%, rgba(6,14,30,0.06) 55%, rgba(6,14,30,0) 80%);
}

/* Mobile tweaks */
@media (max-width: 767px){
  #rs-slider .hero-card{ max-width:92vw; padding:22px 18px; }
  #rs-slider .hero-card .sl-title{ font-size:clamp(22px,7vw,34px); }
  #rs-slider .hero-card .sl-desc{ font-size:14px; }
}

/* ========= Services color theme overrides ========= */
.rs-services.style1:not(.modify) .service-wrap{
  background:#082243 !important; color:#fff !important; box-shadow:0 10px 24px rgba(0,0,0,.28);
}
.rs-services.style1:not(.modify) .service-wrap .title,
.rs-services.style1:not(.modify) .service-wrap .title a{ color:#ffffff !important; }
.rs-services.style1:not(.modify) .service-wrap .desc{ color:#e7eef9 !important; text-align:center !important; }
.rs-services.style1:not(.modify) .service-wrap:hover{ transform:translateY(-3px); box-shadow:0 16px 36px rgba(0,0,0,.35); }
.rs-services.style1:not(.modify) .service-wrap .icon-part img{ filter:drop-shadow(0 6px 10px rgba(0,0,0,.35)) saturate(110%); }

.rs-services.modify .service-wrap{
  background:#082243 !important; color:#fff !important; box-shadow:0 10px 24px rgba(0,0,0,.28);
}
.rs-services.modify .service-wrap .title,
.rs-services.modify .service-wrap .title a{ color:#ffffff !important; }
.rs-services.modify .service-wrap .desc{ color:#e7eef9 !important; }
.rs-services.modify .service-wrap:hover{ transform:translateY(-3px); box-shadow:0 16px 36px rgba(0,0,0,.35); }
.rs-services.modify .service-wrap .icon-part img{ filter:drop-shadow(0 6px 10px rgba(0,0,0,.35)) saturate(110%); }

/* Put this in your CSS after other hero rules */
#hero-caption{ display:none !important; }
</style>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FPFMN90M5H"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-FPFMN90M5H');
</script>

<meta name="google-site-verification" content="t5Xgoar9zL7jV84rmq3iDZQ7vTKJadd2l0ZU3kfFICs" />

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5XNG3TQC');</script>
<!-- End Google Tag Manager -->

<!-- Facebook Pixel Code --><script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '4268533853363514'); fbq('track', 'PageView');</script><noscript> <img loading="lazy" decoding="async" height="1" width="1" alt="" src="https://www.facebook.com/tr?id=4268533853363514&ev=PageView&noscript=1"/></noscript><!-- End Facebook Pixel Code -->

  </head>

  <body class="defult-home">
      <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5XNG3TQC"
        height="0" width="0" class="gtm-noscript-iframe"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

    <?php include('header.php'); ?>

    <!-- ===== Main ===== -->
    <div class="main-content">
      
    <style>
/* === Nivo Hero — height & image fit === */
#nivoSlider,
#nivoSlider img{ width:100%; height: clamp(520px, 78vh, 820px); object-fit: cover; object-position: center; }

/* Mobile */
@media (max-width: 575.98px){ #nivoSlider, #nivoSlider img{ height: 70vh; } }

/* === IMPORTANT: avoid double overlay (hide original caption blocks) === */
.rs-slider .slider-direction{ display: none !important; }

/* Nivo injects the caption HTML here */
/* Put this after your hero CSS */
#rs-slider .nivo-caption{
  display:flex !important;   /* Nivo sets display:block; we want flex */
  align-items:center;
  justify-content:flex-start;
  opacity:1!important;       /* Prevent fade-to-0 glitches */
}

#rs-slider .nivo-caption .hero-card,
#rs-slider .nivo-caption a,
#rs-slider .nivo-caption button,
#rs-slider .nivo-caption input,
#rs-slider .nivo-caption textarea{ pointer-events:auto; }

/* Arrows on top */
.nivo-directionNav a{ z-index: 9 !important; }

/* Optional gradient */
.rs-slider.slider1::after{
  content:""; position:absolute; inset:0; pointer-events:none; z-index:2;
  background: linear-gradient(90deg, rgba(6,14,30,0.28) 0%, rgba(6,14,30,0.18) 28%, rgba(6,14,30,0.06) 55%, rgba(6,14,30,0) 80%);
}
    </style>

      <!-- ===== Slider ===== -->
        <div id="rs-slider" class="rs-slider slider1">
          <div class="bend niceties">
            <div id="nivoSlider" class="slides">
              <?php
                $i = 1;
                // Fetch Home banners
                $get_banner = "
                  SELECT b.image
                  FROM menus m
                  JOIN banners b ON b.menu_name = m.id
                  WHERE m.title = 'Home'
                  ORDER BY b.created_at DESC
                ";
                $banners = mysqli_query($conn, $get_banner);
                while ($banner = mysqli_fetch_assoc($banners)) {
                  // >>> ALL images use the SAME caption so the same box shows on every slide
                  $bannerAttrs = ($i === 1)
                    ? 'fetchpriority="high" loading="eager" decoding="async"'
                    : 'loading="lazy" decoding="async"';
                  echo '<img ' . $bannerAttrs . ' class="img-float-onload" src="admin/uploads/' . htmlspecialchars($banner['image'], ENT_QUOTES) . '" alt="Cold Storage" title="#hero-caption" />' . "\n";
                  $i++;
                }
              ?>
            </div>

            <!-- Single caption reused for all slides -->
            <div id="hero-caption" class="slider-direction">
              <div class="container">
                <div class="content-part">
                  <div class="hero-card">
                    <div class="slider-des">
                      <div class="sl-title white-color">Industrial Refrigeration & Cold Storage Solutions in Delhi</div>
                      <div class="sl-desc">
                        Singhania Refrigeration specializes in industrial refrigeration and cold chain solutions across India. From cold rooms, CA/MA stores, ammonia & freon plants, ripening chambers, IQF systems to transport refrigeration—we deliver safe, efficient, and reliable systems.
                      </div>
                    </div>
                    <div class="slider-bottom">
                      <ul><li><a href="contact.php" class="readon banner-style">Contact Us</a></li></ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Single caption -->
          </div>
        </div>
        <!-- /Slider -->

      <!-- ===== Mini Services ===== -->
      <div class="rs-services style1 pt-100 pb-84 md-pt-80 md-pb-64">
        <div class="container" data-animate>
          <div class="row gutter-16">
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/1.png" alt="Industrial Refrigeration"></div>
                <div class="content-part">
                  <h5 class="title"><a href="services-single.html">Turnkey Execution</a></h5>
                  <div class="desc">End-to-end solutions for cold chain and industrial refrigeration systems encompass design, equipment supply, installation, and commissioning for efficient, uninterrupted, and dependable operations.</div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/2.png" alt="Cooling System"></div>
                <div class="content-part">
                  <h5 class="title"><a href="services-single.html">Energy Efficiency</a></h5>
                  <div class="desc">To achieve energy savings, cost savings, and accurate temperature control, a high-efficiency HVAC system and thermal insulation, with Smart IoT controls, are necessary.</div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/3.png" alt="Cold Storage Plant"></div>
                <div class="content-part">
                  <h5 class="title"><a href="services-single.html">99.9% Uptime</a></h5>
                  <div class="desc">Simplified routine procedures and predictions for spare reaffirm your mechanism's consistent and enduring function. (Features of uninterrupted operation | Foresight of Systematic Field Service Agreements | Strategic Stock of Essential Spares | Predictive Assurance).</div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/4.png" alt="Cold Storage Warehouse"></div>
                <div class="content-part">
                  <h5 class="title"><a href="services-single.html">Pan-India Service</a></h5>
                  <div class="desc">Dedicated engineers provide round-the-clock emergency breakdown assistance for the food, pharma, dairy, and seafood industries throughout India, ensuring uninterrupted production.</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ===== About ===== -->
      <div id="rs-about" class="rs-about style1 bg1 md-pt-80">
        <div class="container">
          <div class="row y-bottom align-items-center">
            <div class="col-lg-6 padding-0" data-animate>
              <img loading="lazy" decoding="async" class="img-soft" src="assets/images/4.jpg" alt="Cold Storage Plant">
            </div>
            <div class="col-lg-6 pl-66 pt-75 pb-75 md-pt-42 md-pb-72" data-animate>
              <div class="sec-title mb-24">
                <h2 class="title mb-0"> <span class="section-title-accent">India's Most Trusted Refrigeration & Cold Chain Supplier </span></h2>
              </div>
              <p class="mb-20">
                Singhania Refrigeration Company provides the most innovative refrigeration system designs and cold chain logistics services available in India. Freshness is the real lifeblood of these systems; safety and quality have always been highly respected in Singhania Refrigeration's refrigeration systems.
              </p>
              <p class="mb-20">
                Providing temperature control services in the largest and most important cities, such as Delhi NCR, Lucknow, Patna, Bihar, Gujarat, and Kolkata, Singhania Refrigeration continues to contribute innovations to its already advanced refrigeration systems, which enable companies to operate without having to deal with any problems.
              </p>
              <p class="mb-20">
                Innovations in designing, efficient engineering, and adherence to high-quality principles allow the company to introduce new standards of functioning in the areas of medicine, agriculture, logistics, warehousing, and food preservation. Whether this is pharmaceutical cold storage in Patna and Bihar, handling agricultural produce in Gujarat, warehousing and food distribution in Delhi NCR, Lucknow, and Kolkata – all of our services work excellently on any scale, under any pressure.
              </p>
              <p class="mb-20">
                We aim to provide services that have perfect temperature control, superb energy efficiency, and flawless operation throughout the entire process, starting from the moment of conception to the end. From fields of Gujarat to plates of families in Delhi NCR.
              </p>
              <div class="menu-cta menu-cta--flush">
                  <a class="btn-cfa" href="about-us.php">Learn more</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ===== Services Grid ===== -->
      <div id="rs-services" class="rs-services style1 modify pt-92 pb-84 md-pt-72 md-pb-64">
        <div class="container" data-animate>
          <div class="sec-title text-center mb-47 md-mb-42">
            <div class="sub-title primary">Services</div>
            <h2 class="title mb-0">Cold Chain &amp; Refrigeration Services in India</h2>
            <p class="about-copy--lead">Singhania focuses on creating cold chain ecosystems rather than producing isolated products. The choices made at Singhania are made based on your specific requirements, irrespective of whether you are in logistics, food processing, pharmaceuticals, or dairies. Our equipment is designed in such a way that, apart from retaining the quality of your products, they also add value when in use.</p>
          </div>

          <div class="row gutter-16">
            <!-- Service 1 -->
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/modify/1.png" alt="Refrigerated Cold Storage"></div>
                <div class="content-part">
                  <h5 class="title">Refrigerated Truck ACs &amp; Containers</h5>
                  <div class="desc">For safe, reliable transport of perishables.</div>
                </div>
              </div>
            </div>

            <!-- Service 2 -->
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/modify/2.png" alt="Cold Storage Warehouse"></div>
                <div class="content-part">
                  <h5 class="title">Cold Rooms &amp; Storage Solutions</h5>
                  <div class="desc">Powered by ammonia/freon systems for ripening, blast freezing, IQF, and CA/MA stores.</div>
                </div>
              </div>
            </div>

            <!-- Service 3 -->
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/modify/3.png" alt="Industrial Refrigeration"></div>
                <div class="content-part">
                  <h5 class="title">Compressor Rack Systems</h5>
                  <div class="desc">Energy-efficient centralized cooling for large-scale facilities.</div>
                </div>
              </div>
            </div>

            <!-- Service 4 -->
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/modify/4.png" alt="Ammonia Refrigeration"></div>
                <div class="content-part">
                  <h5 class="title">Ammonia Refrigeration Units</h5>
                  <div class="desc">Robust solutions for industrial-grade applications.</div>
                </div>
              </div>
            </div>

            <!-- Service 5 -->
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/modify/5.png" alt="Ripening Chamber"></div>
                <div class="content-part">
                  <h5 class="title">Ripening Chambers</h5>
                  <div class="desc">Optimized for bananas, mangoes, and other climacteric fruits.</div>
                </div>
              </div>
            </div>

            <!-- Service 6 -->
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/modify/6.png" alt="Food Cold Room"></div>
                <div class="content-part">
                  <h5 class="title">IQF Technology</h5>
                  <div class="desc">Individual Quick Freezing for seafood, fruits, and ready-to-eat items.</div>
                </div>
              </div>
            </div>

            <!-- Service 7 -->
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/modify/7.png" alt="Cooling System"></div>
                <div class="content-part">
                  <h5 class="title">PUFF Panels &amp; Insulated Doors</h5>
                  <div class="desc">Ensuring airtight, efficient, and durable cold facilities.</div>
                </div>
              </div>
            </div>

            <!-- Service 8 -->
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/modify/8.png" alt="Cold Storage Solutions"></div>
                <div class="content-part">
                  <h5 class="title">Dock Shelters &amp; Dock Levelers</h5>
                  <div class="desc">For seamless warehouse operations.</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ===== Portfolio ===== -->
      <div id="rs-portfolio" class="rs-portfolio style1">
        <div class="rs-carousel owl-carousel dot-style1"
             data-loop="true" data-items="4" data-margin="22" data-autoplay="true"
             data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
             data-dots="true" data-nav="false" data-center-mode="false"
             data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false"
             data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true"
             data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false"
             data-md-device="3" data-lg-device="4" data-md-device-nav="false" data-md-device-dots="true"
             data-animate>
          <?php
            $get_products = "select * from products";
            $products = mysqli_query($conn, $get_products);
            while ($product = mysqli_fetch_assoc($products)) {
          ?>
          <div class="portfolio-item">
            <div class="img-part">
              <img loading="lazy" decoding="async" class="img-soft" src="<?php echo "admin/uploads/" . $product['image']; ?>" alt="Cold Storage Equipment">
            </div>
            <div class="content-part">
              <h5 class="title"><a href="#"><?php echo $product['title'];?></a></h5>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>

      <!-- ===== Testimonials ===== -->
      <div class="rs-testimonial style1 gray-bg pt-92 md-pt-72">
        <div class="container" data-animate>
          <div class="sec-title text-center mb-54 md-mb-39">
            <div class="sub-title primary">Client Feedback</div>
            <h2 class="title mb-0">Customer Reviews</h2>
          </div>
          <div class="white-bg testimonial-shell">
            <div class="row">
              <div class="col-lg-6 pr-0 md-pl-pr-15"><div class="bg-part md-pt-200 md-pb-200"></div></div>
              <div class="col-lg-6 slider-part">
                <div class="rs-carousel owl-carousel dot-style1" data-loop="true" data-items="1" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true" data-nav="false" data-center-mode="false">
                  <div class="testi-item">
                    <div class="content-part text-center">
                      <div class="icon-part testimonial-quote"><i class="fa fa-quote-left"></i></div>
                      <div class="desc">They delivered our cold room and CA/MA store exactly as planned. The temperature stays stable even during peak load, and product spoilage has dropped noticeably.</div>
                    </div>
                    <div class="posted-by text-center">
                      <div class="avatar"><img loading="lazy" decoding="async" class="img-soft" src="assets/images/testimonial/avatar/1.jpg" alt="Cold room client review"></div>
                      <h5 class="name">Anita Verma</h5><span class="designation">Plant Head, Dairy Unit</span>
                    </div>
                  </div>
                  <div class="testi-item">
                    <div class="content-part text-center">
                      <div class="icon-part testimonial-quote"><i class="fa fa-quote-left"></i></div>
                      <div class="desc">Their refrigerated truck AC and container solution made our dispatches much more reliable. Perishables now move safely without temperature drift on long routes.</div>
                    </div>
                    <div class="posted-by text-center">
                      <div class="avatar"><img loading="lazy" decoding="async" class="img-soft" src="assets/images/testimonial/avatar/2.jpg" alt="Refrigerated transport client review"></div>
                      <h5 class="name">Rahul Sharma</h5><span class="designation">Operations Manager, Frozen Foods</span>
                    </div>
                  </div>
                  <div class="testi-item">
                    <div class="content-part text-center">
                      <div class="icon-part testimonial-quote"><i class="fa fa-quote-left"></i></div>
                      <div class="desc">The AMC support for our ammonia system has been dependable and quick. Their team understands industrial refrigeration, and downtime has stayed minimal.</div>
                    </div>
                    <div class="posted-by text-center">
                      <div class="avatar"><img loading="lazy" decoding="async" class="img-soft" src="assets/images/testimonial/avatar/3.jpg" alt="Industrial refrigeration client review"></div>
                      <h5 class="name">Kavita Jain</h5><span class="designation">Owner, Cold Chain Logistics</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <style>
        .section-pad{ padding:80px 0; }
        .section-soft{ background: linear-gradient(180deg,#fafbff 0%,#f3f6ff 100%); }
        .h2{ font-size:clamp(26px,3.4vw,36px); line-height:1.15; font-weight:800; color:#0f2442; }
        .lead{ font-size:clamp(15px,1.7vw,17px); color:#2c3e68; }

        .checklist{ list-style:none; margin:16px 0 0; padding:0; display:grid; gap:10px; }
        .checklist li{ position:relative; padding-left:28px; color:#2d3c63; }
        .checklist li::before{
          content:""; position:absolute; left:0; top:5px; width:18px; height:18px; border-radius:50%;
          background:conic-gradient(from 180deg,#3b5bb7,#2a427f); box-shadow:inset 0 0 0 3px #fff;
        }
      </style>
      
<style>
        /* === Innovation That Drives Trust (scoped) === */
        .innov-section{ padding:88px 0; }
        .innov-eyebrow{
          display:inline-block; font-weight:700; font-size:12px; letter-spacing:.12em; text-transform:uppercase;
          padding:6px 10px; border-radius:999px; background:#e9eeff; color:#1a2b6b; margin-bottom:12px;
        }
        .innov-title{ font-size:clamp(26px,3.4vw,36px); line-height:1.15; font-weight:800; color:#0f2442; margin:0 0 10px; }
        .innov-lead{ font-size:clamp(15px,1.7vw,17px); color:#2c3e68; max-width:900px; margin:0 auto 24px; }
        
        /* cards */
        .innov-grid{ margin-top:18px; }
        .innov-card{
          height:100%; background:#ffffff; border:1px solid rgba(15,36,66,.06); border-radius:16px;
          padding:20px 18px; box-shadow:0 10px 26px rgba(15,36,66,.08);
          transition:transform .16s ease, box-shadow .2s ease, border-color .2s ease;
        }
        .innov-card:hover{ transform:translateY(-2px); box-shadow:0 16px 36px rgba(15,36,66,.12); border-color:rgba(15,36,66,.12); }
        .innov-icon{
          width:48px; height:48px; border-radius:12px; display:inline-flex; align-items:center; justify-content:center;
          background:linear-gradient(180deg,#6c63ff,#3b5bb7); color:#fff; font-size:22px; box-shadow:0 8px 20px rgba(108,99,255,.28);
          margin-bottom:12px;
        }
        .innov-card h5{ margin:0 0 6px; color:#0f2442; font-weight:800; }
        .innov-card p{ margin:0; color:#42507a; }
        
        @media (max-width: 991.98px){
          .innov-section{ padding:64px 0; }
        }
        </style>

      <!-- ===== Innovation That Drives Trust ===== -->
     <section class="innov-section section-pad" data-animate>
          <div class="container">
            <div class="row justify-content-center text-center">
              <div class="col-lg-10">
                <span class="innov-eyebrow">Advanced Refrigeration Solutions for Efficient Cold Storage</span>
                <h2 class="innov-title">Engineered for Reliability, Built for Tomorrow</h2>
                <p class="innov-lead">
                  At Singhania Refrigeration, innovation isn’t optional—it’s our DNA. Every system blends precise engineering,
                  smart controls, and sustainable design to deliver measurable outcomes.
                </p>
              </div>
            </div>
        
            <!-- 2×2 feature cards -->
            <div class="row innov-grid">
              <div class="col-md-6 col-lg-6 mb-3" data-animate>
                <div class="innov-card">
                  <div class="innov-icon"><i class="fa fa-recycle" aria-hidden="true"></i></div>
                  <h5>Reduced Wastage &amp; Losses</h5>
                  <p>Precision temperature control preserves product quality across the chain.</p>
                </div>
              </div>
        
              <div class="col-md-6 col-lg-6 mb-3" data-animate>
                <div class="innov-card">
                  <div class="innov-icon"><i class="fa fa-bolt" aria-hidden="true"></i></div>
                  <h5>Lower Energy Consumption</h5>
                  <p>High-efficiency components and smart logic cut operating costs sustainably.</p>
                </div>
              </div>
        
              <div class="col-md-6 col-lg-6 mb-3" data-animate>
                <div class="innov-card">
                  <div class="innov-icon"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
                  <h5>Improved Uptime</h5>
                  <p>Predictive maintenance and redundancy deliver 99.9% system availability.</p>
                </div>
              </div>
        
              <div class="col-md-6 col-lg-6 mb-3" data-animate>
                <div class="innov-card">
                  <div class="innov-icon"><i class="fa fa-shield" aria-hidden="true"></i></div>
                  <h5>Safety &amp; Compliance</h5>
                  <p>Food/Pharma standards aligned with auditable logs and alerts.</p>
                </div>
              </div>
            </div>
          </div>
        </section>      
      
      <style>
        /* === Towards Tomorrow (scoped) === */
        .tt-section{ padding:88px 0; background: linear-gradient(180deg,#fafbff 0%,#f3f6ff 100%); }
        .tt-section.reverse .tt-col-text{ order:2; }
        .tt-section.reverse .tt-col-visual{ order:1; }
        
        .tt-eyebrow{
          display:inline-block; font-weight:700; font-size:12px; letter-spacing:.12em; text-transform:uppercase;
          padding:6px 10px; border-radius:999px; background:#e9eeff; color:#1a2b6b; margin-bottom:12px;
        }
        .tt-title{ font-size:clamp(26px,3.4vw,36px); line-height:1.15; font-weight:800; color:#0f2442; margin:0 0 10px; }
        .tt-lead{ font-size:clamp(15px,1.7vw,17px); color:#2c3e68; margin-bottom:16px; }
        .tt-desc{ color:#44527a; margin-bottom:20px; }
        
        .tt-list{ list-style:none; padding:0; margin:0 0 18px; display:grid; gap:12px; }
        .tt-list li{ position:relative; padding-left:32px; color:#2d3c63; line-height:1.55; }
        .tt-list li:before{
          content:""; position:absolute; left:0; top:.35em; width:18px; height:18px; border-radius:50%;
          background:conic-gradient(from 180deg,#3b5bb7,#2a427f); box-shadow:inset 0 0 0 3px #fff;
        }
        .tt-cta{ display:flex; gap:12px; flex-wrap:wrap; margin-top:6px; }
        .tt-cta .btn-primary{
          background:#17203b; border:none; border-radius:10px; padding:12px 18px; font-weight:700; color:#fff;
          box-shadow:0 10px 22px rgba(23,32,59,.22); transition:transform .12s ease, box-shadow .2s ease, background .2s ease;
        }
        .tt-cta .btn-primary:hover{ background:#0f1630; transform:translateY(-1px); box-shadow:0 14px 28px rgba(23,32,59,.28); }
        .tt-cta .btn-link{ font-weight:700; color:#1a2b6b; text-decoration:none; padding:12px 6px; }
        .tt-cta .btn-link:hover{ text-decoration:underline; }
        
        /* Visual */
        .tt-visual{
          position:relative; max-width:520px; margin:0 auto;
        }
        .tt-visual .tt-img{
          width:100%; height:auto; display:block; border-radius:18px;
          box-shadow:0 18px 44px rgba(15,36,66,.18), 0 6px 16px rgba(15,36,66,.10);
        }
        .tt-stats{
          position:absolute; right:-10px; bottom:-16px; background:#fff; border-radius:16px;
          padding:14px 16px; box-shadow:0 16px 40px rgba(0,0,0,.18), 0 6px 16px rgba(0,0,0,.10);
          display:grid; grid-template-columns:auto auto; gap:10px 16px; border:1px solid rgba(0,0,0,.06);
        }
        .tt-chip{
          display:flex; align-items:center; gap:8px; white-space:nowrap;
          font-weight:700; color:#0f2442;
        }
        .tt-dot{ width:10px; height:10px; border-radius:50%; background:linear-gradient(180deg,#6c63ff,#3b5bb7); box-shadow:0 0 0 3px #eef2ff inset;}
        
        /* Mobile tweaks */
        @media (max-width: 991.98px){
          .tt-section{ padding:64px 0; }
          .tt-stats{ position:static; margin-top:12px; }
        }
        </style>


      <!-- ===== Towards Tomorrow ===== -->
      <section class="tt-section section-soft" data-animate>
          <div class="container">
            <div class="row align-items-center">
              <!-- CONTENT -->
              <div class="col-lg-7 tt-col-text" data-animate>
                <span class="tt-eyebrow">Advanced Cold Chain &amp; Refrigeration Services</span>
                <h2 class="tt-title">Advanced Cold Chain &amp; Refrigeration Solutions in India</h2>
                <p class="tt-lead">
                  We offer cutting-edge cold chain services in India across the food processing, pharmaceuticals, logistics, and dairy industries. Our energy-saving refrigeration technology ensures the safety and freshness of the products.
                </p>
                <p class="tt-desc">
                  Our core solutions include:
                </p>
                <ul class="tt-list">
                  <li>Advanced cold storage and refrigeration systems for industrial applications</li>
                  <li>Energy-efficient ammonia and freon-based cooling solutions</li>
                  <li>End-to-end cold chain infrastructure for logistics and warehousing</li>
                </ul>
                <br>
                <div class="tt-cta">
                  <a href="contact.php" class="btn btn-primary">Talk to an Expert</a>
                  <a href="products.php" class="btn-link">Explore Our Products →</a>
                </div>
              </div>
        
              <!-- VISUAL -->
              <div class="col-lg-5 tt-col-visual md-mt-40" data-animate>
                <div class="tt-visual">
                  <!-- Replace src with your image -->
                  <img loading="lazy" decoding="async" class="tt-img" src="admin/uploads/Blog-Image-Cold-Chain-Logistics.jpg" alt="Industrial Refrigeration and Cold Storage">
                  <div class="tt-stats">
                    <div class="tt-chip"><span class="tt-dot"></span> 10+ Years</div>
                    <div class="tt-chip"><span class="tt-dot"></span> 99.9% Uptime</div>
                    <div class="tt-chip"><span class="tt-dot"></span> Pan-India</div>
                    <div class="tt-chip"><span class="tt-dot"></span> Energy-Smart</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        


      <!-- ===== Contact ===== -->
      <div class="rs-contact style1 pt-100 pb-100 md-pt-80 md-pb-80">
        <div class="container">
          <div class="white-bg contact-wrap" data-animate>
            <div class="row align-items-center">
              <!-- LEFT: form -->
              <div class="col-lg-7 form-part">
                <div class="sec-title mb-20">
                  <h2 class="title mb-0">Get In Touch</h2>
                  <p class="contact-sub">Fill the form and we’ll reach out within 24 hours.</p>
                </div>

                <div id="form-messages"><?php echo $color;?><?php echo $messageBanner;?></div>

                <form class="contact-form" method="post" action="#">
                  <div class="row">
                    <div class="col-md-6 mb-20">
                      <div class="common-control"><input type="text" name="name" placeholder="Name" required=""></div>
                    </div>
                    <div class="col-md-6 mb-20">
                      <div class="common-control"><input type="email" name="email" placeholder="Email" required=""></div>
                    </div>
                    <div class="col-md-6 mb-20">
                      <div class="common-control"><input type="text" name="phone" placeholder="Phone Number" required=""></div>
                    </div>
                    <div class="col-md-6 mb-20">
                      <div class="common-control"><input type="text" name="company" placeholder="Company Name / Organization" required=""></div>
                    </div>
                    <div class="col-md-12 mb-20">
                      <div class="common-control"><input type="text" name="location" placeholder="Your Location" required=""></div>
                    </div>
                    <div class="col-md-12 mb-20">
                      <div class="common-control"><textarea name="message" placeholder="Your Message Here" required=""></textarea></div>
                    </div>
                    <div class="col-md-12">
                      <div class="submit-btn"><button type="submit" class="readon" name="submit">Submit Now</button></div>
                    </div>
                  </div>
                </form>
              </div>

              <!-- RIGHT: image -->
              <div class="col-lg-5 text-center md-mt-40">
                <img loading="lazy" decoding="async" src="assets/images/contact/contact-us.png" alt="Cold Storage Support" class="contact-img img-soft">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ===== Blog ===== -->
      <div class="rs-blog style1 gray-bg pt-91 pb-92 md-pt-71 md-pb-72 sm-pb-75">
        <div class="container" data-animate>
          <div class="row y-middle mb-40 sm-mb-40">
            <div class="col-md-6 sm-mb-22">
              <div class="sec-title">
                <span class="sub-title primary right-line">LATEST NEWS</span>
                <h2 class="title mb-0">Read Latest Updates</h2>
              </div>
            </div>
            <div class="col-md-6">
              <div class="btn-part text-right sm-text-left">
                <!--<a class="readon" href="blog-single.html">View Updates</a>-->
              </div>
            </div>
          </div>

          <div class="rs-carousel owl-carousel dot-style1"
               data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true"
               data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true" data-nav="false"
               data-center-mode="false" data-mobile-device="1" data-ipad-device="2" data-ipad-device2="1"
               data-md-device="3" data-lg-device="3">
            <?php 
              $record = mysqli_query($conn,"SELECT c.id AS cate_id, c.category_name, b.id AS id , b.image AS image , b.created_at AS created_at,b.title 
                                            FROM category c JOIN blogs b ON b.cate_id = c.id ");
              while($row = mysqli_fetch_assoc($record)){ ?>
              <div class="blog-wrap">
                <div class="img-part">
                  <img loading="lazy" decoding="async" class="img-soft blog-cover-img" src="<?php echo "admin/uploads/" . $row['image']; ?>" alt="Cold Storage Blog">
                  <div class="fly-btn"><a href="blog-details.php?id=<?php echo $row['id'];?>"><i class="flaticon-right-arrow"></i></a></div>
                </div>
                <div class="content-part">
                  <a class="categories" href="blog-details.php?id=<?php echo $row['id'];?>"><?php echo $row['category_name'];?></a>
                  <h3 class="title"><a href="blog-details.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></h3>
                  <div class="blog-meta">
                    <div class="user-data"><img loading="lazy" decoding="async" src="assets/images/blog/avatar/1.png" alt="Customer Review"><span>Singhania</span></div>
                    <div class="date"><i class="fa fa-clock-o"></i> <?php echo $row['created_at'];?></div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

    </div>
    <!-- /Main -->
    
         <?php 
            include("chat-box.php");
    ?>

    <?php include('footer.php'); ?>

    <!-- ===== Quick Connect Popup ===== -->
  <div class="modal fade" id="myModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Quick Connect</h5>
          <button type="button" class="close" aria-label="Close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <div id="response" class="mb-3"></div>

          <form action="#" method="post" id="enquiryForm" novalidate>
            <div class="form-group">
              <label for="name" class="sr-only">Name</label>
              <input type="text" class="form-control" id="name" name="name"
                    placeholder="Name" required>
            </div>

            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="email" class="form-control" id="email" name="email"
                    placeholder="Email" required>
            </div>

            <div class="form-group">
              <label for="mobile" class="sr-only">Mobile Number</label>
              <input type="tel" class="form-control" id="mobile" name="mobile"
                    placeholder="Mobile Number" inputmode="tel" pattern="[0-9+\-\s()]{6,}" required>
            </div>

            <button type="submit" class="btn btn-primary submit_data">
              <span class="btn-text">Submit</span>
              <span class="submit-spinner" aria-hidden="true">⏳</span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

    <style>
/* Testimonials single-slide behavior */
.rs-testimonial .testi-item{ float:none !important; width:auto !important; display:block !important; }
.rs-testimonial .rs-carousel .owl-stage-outer{ overflow: hidden; }

/* Equal-height service cards */
.rs-services .row.gutter-16, .rs-services.modify .row.gutter-16 { display:flex; flex-wrap:wrap; }
.rs-services .row.gutter-16 > [class*="col-"], .rs-services.modify .row.gutter-16 > [class*="col-"] { display:flex; }
.rs-services .service-wrap, .rs-services.modify .service-wrap{
  display:flex; flex-direction:column; height:100%; padding:28px; border-radius:14px; background:#f7f9ff;
  box-shadow:0 4px 16px rgba(0,0,0,0.05); transition: transform .15s ease, box-shadow .15s ease;
}
.rs-services .service-wrap:hover, .rs-services.modify .service-wrap:hover{ transform: translateY(-2px); box-shadow:0 10px 24px rgba(0,0,0,0.08); }
.rs-services .service-wrap .icon-part{ margin-bottom:14px; }
.rs-services .service-wrap .title{ margin:8px 0 6px; }
.rs-services .service-wrap .desc{ margin:0; }
@media (max-width: 767.98px){
  .rs-services .row.gutter-16, .rs-services.modify .row.gutter-16 { display:block; }
  .rs-services .row.gutter-16 > [class*="col-"], .rs-services.modify .row.gutter-16 > [class*="col-"] { display:block; }
  .rs-services .service-wrap, .rs-services.modify .service-wrap{ height:auto; }
}
    </style>

    <!-- ===== Micro-animations & Popup timing ===== -->
    <script>
$(window).on('load', function () {
  if (!sessionStorage.getItem('sr_popup_shown')) {
    setTimeout(function () {
      $('#myModal').modal('show');
      // sessionStorage.setItem('sr_popup_shown', '1');
    }, 10000 + Math.floor(Math.random() * 2001));
  }
});

document.addEventListener("DOMContentLoaded", function(){
  const elems = document.querySelectorAll("[data-animate]");
  const io = new IntersectionObserver((entries)=>{
    entries.forEach(e=>{
      if(e.isIntersecting){
        e.target.classList.add("active");
        io.unobserve(e.target);
      }
    });
  }, {threshold: 0.2});
  elems.forEach(el=>io.observe(el));
});

$(function(){
  function showError($el, msg){
    $el.after('<span class="error">'+msg+'</span>');
  }

  $('#enquiryForm').on('submit', function(e){
    e.preventDefault();

    var $form     = $('#enquiryForm');
    var $btn      = $form.find('.submit_data');

    var name      = $('#name').val().trim();
    var email     = $('#email').val().trim();
    var mobile    = $('#mobile').val().trim();

    $("#response").empty();
    $("#myModal .error").remove();

    var hasError = false;
    if (!name){ showError($('#name'), 'Please enter your name'); hasError = true; }

    if (!email){
      showError($('#email'), 'Please enter your email');
      hasError = true;
    } else {
      var regEx = /^([a-zA-Z0-9_.\-])+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,})$/;
      if (!regEx.test(email)){ showError($('#email'), 'Please enter a valid email'); hasError = true; }
    }

    if (!mobile){
      showError($('#mobile'), 'Please enter your mobile number');
      hasError = true;
    } else if (!/^[0-9]{10}$/.test(mobile)){
      showError($('#mobile'), 'Enter a valid 10-digit mobile number');
      hasError = true;
    }

    if (hasError) return;

    $btn.prop('disabled', true);
    $btn.find('.submit-spinner').addClass('is-visible');

    $.ajax({
      url: "enquirypopup.php",
      method: "POST",
      dataType: "json",
      data: {
        name: name,
        email: email,
        mobile: mobile
      },
      success: function(res){
        if (res && res.status === "success"){
          $("#response").html("<span class='text-success'>Enquiry has submitted Successfully ✅</span>");
          $form[0].reset();
          setTimeout(function(){
            $("#myModal").modal('hide');
            $("#response").html("");
          }, 1500);
        } else {
          var msg = (res && res.message) ? res.message : "Something went wrong";
          $("#response").html("<span class='text-danger'>"+ msg +" ❌</span>");
        }
      },
      error: function(xhr, status, error){
        console.error("AJAX Error:", error);
        $("#response").html("<span class='text-danger'>Network error. Please try again.</span>");
      },
      complete: function(){
        $btn.prop('disabled', false);
        $btn.find('.submit-spinner').removeClass('is-visible');
      }
    });
  });
});


</script>

<script>
(function($){
  function initTestimonialCarousel(){
    var $car = $('.rs-testimonial .rs-carousel');
    if(!$car.length) return;
    try { $car.trigger('destroy.owl.carousel'); } catch(e) {}
    $car.removeClass('owl-loaded owl-hidden');
    $car.find('.owl-stage-outer').children().unwrap();
    $car.find('.owl-stage').children().unwrap();
    $car.owlCarousel({
      items: 1,
      loop: true,
      margin: 30,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: true,
      smartSpeed: 800,
      dots: true,
      nav: false
    });
  }
  $(window).on('load', function(){
    initTestimonialCarousel();
    setTimeout(initTestimonialCarousel, 400);
  });
})(jQuery);
</script>

<script>
jQuery(function ($) {
  var $slider = $('#nivoSlider');
  var TICK_MS = 4000;                 // same as pauseTime
  var tick = null;

  var captionSyncTimer = null;
  var captionObserver = null;

  function ensureCaption(){
    var $cap = $('#rs-slider .nivo-caption');
    if (!$cap.length) return;
    if (!$cap.find('.hero-card').length){
      $cap.html($('#hero-caption').html());
    }
    var $title = $cap.find('.slider-des .sl-title').first();
    if ($title.length && !$title.is('h1')) {
      $title.replaceWith($('<h1>', {
        class: $title.attr('class'),
        text: $title.text()
      }));
    }
    $cap.addClass('is-visible');
  }

  function scheduleCaptionSync(delay){
    clearTimeout(captionSyncTimer);
    captionSyncTimer = setTimeout(ensureCaption, delay == null ? 700 : delay);
  }

  function watchCaption(){
    if (captionObserver || !window.MutationObserver) return;
    var cap = document.querySelector('#rs-slider .nivo-caption');
    if (!cap) return;
    captionObserver = new MutationObserver(function () {
      scheduleCaptionSync(0);
    });
    captionObserver.observe(cap, { childList: true, subtree: true, characterData: true });
  }

  function startTick(){
    stopTick();
    tick = setInterval(function(){
      if (document.hidden) return; // don’t advance on hidden tab
      // Advance to the next slide (works even if Nivo’s internal timer stalls)
      $('#rs-slider .nivo-directionNav .nivo-nextNav').trigger('click');
    }, TICK_MS);
  }
  function stopTick(){ if (tick){ clearInterval(tick); tick = null; } }

  var heroEnhancementsBound = false;

  function attachHeroEnhancements(){
    if (heroEnhancementsBound) return true;

    var $cap = $('#rs-slider .nivo-caption');
    if (!$cap.length) return false;

    heroEnhancementsBound = true;
    watchCaption();
    scheduleCaptionSync(800);
    startTick();

    $('#rs-slider')
      .off('mouseenter.heroTicker mouseleave.heroTicker')
      .on('mouseenter.heroTicker', stopTick)
      .on('mouseleave.heroTicker', startTick);

    document.addEventListener('visibilitychange', function () {
      if (document.hidden) stopTick();
      else startTick();
    });

    return true;
  }

  (function waitForHeroSlider(){
    if (!attachHeroEnhancements()) {
      setTimeout(waitForHeroSlider, 100);
    }
  })();
});
</script>






  </body>
</html>
