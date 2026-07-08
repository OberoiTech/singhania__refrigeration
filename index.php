<?php
error_reporting(0);
include("admin/config.php");

$color = "";
$messageBanner = "";

function sr_image_size_attrs($relativePath) {
    static $cache = [];
    $relativePath = ltrim((string)$relativePath, '/\\');
    if ($relativePath === '') {
        return '';
    }
    if (!array_key_exists($relativePath, $cache)) {
        $absolutePath = __DIR__ . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $relativePath);
        $cache[$relativePath] = '';
        if (is_file($absolutePath)) {
            $size = @getimagesize($absolutePath);
            if (!empty($size[0]) && !empty($size[1])) {
                $cache[$relativePath] = ' width="' . (int)$size[0] . '" height="' . (int)$size[1] . '"';
            }
        }
    }
    return $cache[$relativePath];
}

function sr_webp_path($relativePath) {
    $relativePath = ltrim((string)$relativePath, '/\\');
    $info = pathinfo($relativePath);
    if (empty($info['dirname']) || empty($info['filename'])) {
        return '';
    }
    $webpPath = ($info['dirname'] === '.' ? '' : $info['dirname'] . '/') . $info['filename'] . '.webp';
    return is_file(__DIR__ . '/' . $webpPath) ? $webpPath : '';
}

function sr_preferred_image_path($relativePath) {
    $webpPath = sr_webp_path($relativePath);
    return $webpPath !== '' ? $webpPath : $relativePath;
}

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
<html lang="en-IN">
  <?php
    $siteConfigResult = mysqli_query($conn, "SELECT * FROM configuration LIMIT 1");
    if ($siteConfigResult && $siteConfig = mysqli_fetch_assoc($siteConfigResult)) {
      $email = $siteConfig['email'] ?? '';
      $mobile = $siteConfig['mobile'] ?? '';
      $facebook = $siteConfig['facebook'] ?? '';
      $linkedin = $siteConfig['linkedin'] ?? '';
      $address = $siteConfig['address'] ?? '';
    }
    $pageTitle = 'Cold Chain & Industrial Refrigeration Solutions | Delhi';
    $pageDescription = 'Singhania Refrigeration: turnkey cold storage, cold rooms, CA stores, ammonia/freon plants & PUF panels in Delhi NCR. Pan-India service. Call 99710-60822.';

  ?>
  <head> 
    <?php include('head.php'); ?>
    <?php
      $heroPreload = '';
      $heroBannerResult = mysqli_query($conn, "
        SELECT b.image
        FROM menus m
        JOIN banners b ON b.menu_name = m.id
        WHERE m.title = 'Home'
        ORDER BY b.created_at DESC
        LIMIT 1
      ");
      if ($heroBannerResult && ($heroBanner = mysqli_fetch_assoc($heroBannerResult)) && !empty($heroBanner['image'])) {
          $heroPreloadPath = sr_preferred_image_path('admin/uploads/' . $heroBanner['image']);
          if (is_file(__DIR__ . '/' . $heroPreloadPath)) {
              $heroPreload = $heroPreloadPath;
          }
      }
      if ($heroPreload !== ''):
    ?>
    <link rel="preload" as="image" href="<?php echo htmlspecialchars($heroPreload, ENT_QUOTES); ?>"<?php echo strtolower(pathinfo($heroPreload, PATHINFO_EXTENSION)) === 'webp' ? ' type="image/webp"' : ''; ?> fetchpriority="high">
    <?php endif; ?>

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
.notice-banner{ display:block; background:#0a1f3c; color:#fff; padding:10px 16px; font-size:13.5px; font-weight:500; letter-spacing:.3px; }
.text-justify{ text-align:justify; }
.flex-center{ align-items:center; }
#rs-about p{ text-align:justify; }
.testimonial-shell{ border-radius:16px; }
.testimonial-quote{ color:var(--brand); }
.rs-testimonial.style1 .bg-part{
 
  min-height:420px;
  display:flex;
  align-items:center;
  justify-content:center;
}
.testimonial-avatar-icon{
  width:76px;
  height:76px;
  border-radius:50%;
  display:inline-flex;
  align-items:center;
  justify-content:center;
  background:#eef2ff;
  color:var(--brand);
  font-size:34px;
  box-shadow:0 12px 28px rgba(0,0,0,.10);
}

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
.rs-contact.style1{ background:#f6f9fc; }
.rs-contact.style1 .contact-wrap{
  padding:34px;
  border-radius:14px;
  background:#fff;
  border:1px solid #e5edf5;
  box-shadow:0 18px 45px rgba(8,34,67,.08);
}
.rs-contact.style1 .form-part{ padding:18px 24px 18px 18px; }
.contact-tag{
  display:inline-block;
  margin-bottom:10px;
  color:#0b6fc6;
  font-size:13px;
  font-weight:700;
  text-transform:uppercase;
  letter-spacing:.06em;
}
.rs-contact.style1 .sec-title .title{
  color:#082243;
  font-size:32px;
  line-height:1.22;
  margin-bottom:12px !important;
}
.contact-sub{
  color:#5d6b82;
  margin:0 0 24px;
  max-width:650px;
  font-size:16px;
  line-height:1.65;
}
.rs-contact.style1 .contact-form .row{ margin-left:-7px; margin-right:-7px; }
.rs-contact.style1 .contact-form [class*="col-"]{ padding-left:7px; padding-right:7px; }
.rs-contact.style1 .contact-form .common-control input,
.rs-contact.style1 .contact-form .common-control textarea{
  width:100%;
  background:#fff;
  border:1px solid #d8e2ee;
  border-radius:6px;
  color:#1f2937;
  font-size:15px;
  padding:0 15px;
  box-shadow:0 4px 12px rgba(8,34,67,.04);
  transition:border-color .2s ease, box-shadow .2s ease;
}
.rs-contact.style1 .contact-form .common-control input{ height:50px; }
.rs-contact.style1 .contact-form .common-control textarea{
  min-height:124px;
  padding-top:14px;
  resize:vertical;
}
.rs-contact.style1 .contact-form .common-control ::placeholder{ color:#8a96a8; }
.rs-contact.style1 .contact-form .common-control input:focus,
.rs-contact.style1 .contact-form .common-control textarea:focus{
  border-color:#0b6fc6;
  box-shadow:0 0 0 3px rgba(11,111,198,.12);
  outline:0;
}
.rs-contact.style1 .submit-btn .readon{
  background:#082243;
  color:#fff;
  border:none;
  border-radius:6px;
  padding:13px 26px;
  font-weight:700;
  box-shadow:0 12px 24px rgba(11,111,198,.20);
  transition:background .2s ease, transform .12s ease, box-shadow .2s ease;
}
.rs-contact.style1 .submit-btn .readon:hover{
  /* background:#082243; */
  transform:translateY(-1px);
  box-shadow:0 14px 28px rgba(8,34,67,.22);
}
.contact-side{
  height:100%;
  min-height:420px;
  padding:34px 28px;
  border-radius:12px;
  background:#082243;
  color:#fff;
  display:flex;
  flex-direction:column;
  justify-content:space-between;
  overflow:hidden;
}
.contact-side h3{
  color:#fff;
  font-size:24px;
  line-height:1.25;
  margin:0 0 12px;
}
.contact-side p{ color:#d6e4f5; margin:0; line-height:1.65; }
.contact-areas{ margin:0 0 18px; font-size:13px; color:#d6e4f5; }
.contact-areas strong{
  display:block;
  color:#fff;
  font-size:18px;
  margin-bottom:12px;
}
.contact-area-tags{ display:flex; flex-wrap:wrap; gap:8px; }
.contact-area-tags span{
  display:inline-block;
  background:#f0f4f8;
  color:#082243;
  border-radius:4px;
  padding:5px 11px;
  font-weight:700;
}
.contact-img{
  width:100%;
  max-width:330px;
  height:auto;
  margin:18px auto 0;
  display:block;
  border-radius:10px;
  background:#fff;
}
@media (max-width: 991px){
  .rs-contact.style1 .form-part{ padding:0; }
  .contact-side{ margin-top:28px; min-height:auto; }
  .rs-contact.style1 .sec-title .title{ font-size:28px; }
}
@media (max-width: 575px){
  .rs-contact.style1 .contact-wrap{ padding:22px; }
  .rs-contact.style1 .sec-title .title{ font-size:24px; }
  .contact-sub{ font-size:15px; }
  .rs-contact.style1 .submit-btn .readon{ width:100%; }
}

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
  height:clamp(560px, 78svh, var(--hero-max));
  object-fit:cover;
  object-position:center;
  display:block;
  background:#0a1530; /* fallback while image loads */
}

/* Hide original overlay container to avoid double overlays */
#rs-slider .slider-direction{ display:none !important; }

/* Nivo-injected caption */
#rs-slider .nivo-caption{
  display:flex !important;
  align-items:center;
  justify-content:flex-start;
  opacity:1 !important;
  padding:0 12px;
  pointer-events:none; /* allow arrows to be clickable */
}
#rs-slider .nivo-caption .hero-card{ pointer-events:auto; } /* card stays clickable */

/* Reset the theme's absolute positioning and extra wrapper padding. */
#rs-slider .nivo-caption .container{
  display:flex;
  align-items:center;
  height:100%;
}
#rs-slider .nivo-caption .content-part{
  position:static;
  width:100%;
  max-width:none;
  padding:24px 0;
  overflow:visible;
  transform:none;
}

#rs-slider .nivo-caption .hero-card,
#rs-slider .nivo-caption a,
#rs-slider .nivo-caption button,
#rs-slider .nivo-caption input,
#rs-slider .nivo-caption textarea{ pointer-events:auto; }

/* Hero card */
#rs-slider .hero-card{
  background:rgba(13,31,61,.86); color:#fff;
  border-radius:16px; padding:24px 22px; max-width:720px;
  margin-left:0;
  box-shadow:0 20px 60px rgba(0,0,0,.35), 0 8px 18px rgba(0,0,0,.22);
  backdrop-filter:saturate(120%) blur(2px);
  transform-origin:50% 100%;
  animation:heroFloatIn .8s ease .15s both;
}
#rs-slider .hero-card .sl-title{ 
    font-size: clamp(24px, 4vw, 35px);
    line-height: 1.2;
    margin:0 0 14px;
    padding:0;
 }
#rs-slider .hero-card .sl-desc{ font-size:clamp(14px,1.8vw,16px); line-height:1.7; color:#dfe7ff; }
#rs-slider .hero-card .slider-bottom{ margin:20px 0 0; }
#rs-slider .hero-card .slider-bottom ul{ margin:18px 0 0; padding:0; list-style:none; }
#rs-slider .hero-card .readon.banner-style{
  display:inline-block; background:#1c2f57; color:#fff; border:0; border-radius:10px; padding:12px 20px; font-weight:600;
  transition:transform .15s ease, background .2s ease, box-shadow .2s ease; box-shadow:0 8px 18px rgba(28,47,87,.35);
}
#rs-slider .hero-card .readon.banner-style:hover{ transform:translateY(-1px); background:#102246; box-shadow:0 12px 28px rgba(28,47,87,.45); }

@keyframes heroFloatIn{ from{opacity:0; transform:translateY(22px) scale(.985);} to{opacity:1; transform:translateY(0) scale(1);} }

/* Arrows/dots stacking */
#rs-slider .nivo-directionNav,
#rs-slider .nivo-directionNav a{ display:none !important; }
#rs-slider .nivo-controlNav{ z-index:6; }

/* Readability gradient across photos */
.rs-slider.slider1::after{
  content:""; position:absolute; inset:0; pointer-events:none; z-index:2;
  background:linear-gradient(90deg, rgba(6,14,30,0.28) 0%, rgba(6,14,30,0.18) 28%, rgba(6,14,30,0.06) 55%, rgba(6,14,30,0) 80%);
}

/* Mobile tweaks */
@media (max-width: 767px){
  #rs-slider #nivoSlider,
  #rs-slider #nivoSlider img{ height:clamp(620px, 88svh, 760px); }
  #rs-slider .nivo-caption{ padding:0 15px; }
  #rs-slider .nivo-caption .content-part{ padding:20px 0; }
  #rs-slider .hero-card{ width:100%; max-width:100%; padding:22px 18px; }
  #rs-slider .hero-card .sl-title{ font-size:clamp(22px,7vw,34px); }
  #rs-slider .hero-card .sl-desc{ font-size:14px; }
}

/* ========= Services color theme overrides ========= */
.rs-services.style1:not(.modify) .service-wrap,
.rs-services.modify .service-wrap{
  background:#082243 !important;
  color:#ffffff !important;
  border-top-left-radius:20px !important;
  border-top-right-radius:20px !important;
  box-shadow:0 10px 24px rgba(0,0,0,.28) !important;
  position:relative;
  overflow:hidden;
  transition:transform .35s ease, box-shadow .35s ease;
}
.rs-services.style1:not(.modify) .service-wrap:before,
.rs-services.modify .service-wrap:before{
  content:"";
  position:absolute;
  left:0;
  right:0;
  bottom:0;
  height:100%;
  background:#ffffff;
  border-radius:20px 20px 0 0;
  transform:translateY(100%);
  transition:transform .65s ease;
  z-index:0;
}
.rs-services.style1:not(.modify) .service-wrap:hover,
.rs-services.modify .service-wrap:hover{
  transform:translateY(-6px) !important;
  box-shadow:0 18px 40px rgba(0,0,0,.35) !important;
}
.rs-services.style1:not(.modify) .service-wrap:hover:before,
.rs-services.modify .service-wrap:hover:before{
  transform:translateY(0);
}
.rs-services.style1:not(.modify) .service-wrap .icon-part,
.rs-services.style1:not(.modify) .service-wrap .content-part,
.rs-services.modify .service-wrap .icon-part,
.rs-services.modify .service-wrap .content-part{
  position:relative;
  z-index:1;
}
.rs-services.style1:not(.modify) .service-wrap .icon-part,
.rs-services.modify .service-wrap .icon-part{
  display:flex;
  justify-content:center;
  align-items:center;
  width:140px;
  max-width:100%;
  min-height:112px;
  margin:0 auto 14px;
}
.rs-services.style1:not(.modify) .service-wrap .icon-part .icon-hover,
.rs-services.modify .service-wrap .icon-part .icon-hover{
  display:none !important;
}
.rs-services.style1:not(.modify) .service-wrap .icon-part img:not(.icon-hover),
.rs-services.modify .service-wrap .icon-part img:not(.icon-hover){
  display:block;
  /* width:140px !important;
  max-width:none !important;
  height:auto !important;
  max-height:112px;
  object-fit:contain; */
  margin:0 auto;
  filter:brightness(0) invert(1) drop-shadow(0 6px 10px rgba(0,0,0,.35));
  transition:transform .45s ease, filter .18s ease .46s;
}
.rs-services.modify .service-wrap .truck-service-icon{
  width:140px !important;
  max-width:none !important;
  height:140px !important;
  max-height:none !important;
  object-fit:contain;
}
.rs-services.modify .service-wrap .service-card-icon{
  width:140px !important;
  max-width:none !important;
  height:140 !important;
  max-height:none !important;
  object-fit:contain;
}
.rs-services.style1:not(.modify) .service-wrap .title,
.rs-services.style1:not(.modify) .service-wrap .title a,
.rs-services.modify .service-wrap .title,
.rs-services.modify .service-wrap .title a{
  color:#ffffff !important;
  transition:color .35s ease .34s;
}
.rs-services.style1:not(.modify) .service-wrap .desc,
.rs-services.style1:not(.modify) .service-wrap p,
.rs-services.modify .service-wrap .desc{
  color:#e7eef9 !important;
  text-align:center !important;
  transition:color .35s ease .12s;
}
.rs-services.style1:not(.modify) .service-wrap:hover .title,
.rs-services.style1:not(.modify) .service-wrap:hover .title a,
.rs-services.style1:not(.modify) .service-wrap:hover .desc,
.rs-services.style1:not(.modify) .service-wrap:hover p,
.rs-services.modify .service-wrap:hover .title,
.rs-services.modify .service-wrap:hover .title a,
.rs-services.modify .service-wrap:hover .desc{
  color:#082243 !important;
  font-weight:700 !important;
}
.rs-services.style1:not(.modify) .service-wrap:hover .icon-part img:not(.icon-hover),
.rs-services.modify .service-wrap:hover .icon-part img:not(.icon-hover){
  transform:scale(1.08);
  filter:brightness(0) drop-shadow(0 10px 16px rgba(0,0,0,.35));
}
.rs-services.modify .services-products-cta{
  display:flex;
  justify-content:flex-end;
  margin-top:18px;
}

/* Put this in your CSS after other hero rules */
#hero-caption{ display:none !important; }
</style>

<meta name="google-site-verification" content="t5Xgoar9zL7jV84rmq3iDZQ7vTKJadd2l0ZU3kfFICs" />

<!-- Google Tag Manager -->
<script>
function loadGTM() {
  (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-5XNG3TQC');
}
if ('requestIdleCallback' in window) {
  requestIdleCallback(loadGTM, { timeout: 4000 });
} else {
  window.addEventListener('load', loadGTM);
}
</script>
<!-- End Google Tag Manager -->

<!-- Facebook Pixel Code -->
<script>
  window.addEventListener('load', function () {
    var loadPixel = function () {
      !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '4268533853363514');
      fbq('track', 'PageView');
    };
    if ('requestIdleCallback' in window) {
      requestIdleCallback(loadPixel, { timeout: 3000 });
    } else {
      setTimeout(loadPixel, 1500);
    }
  });
</script>
<noscript> <img loading="lazy" decoding="async" height="1" width="1" alt="" src="https://www.facebook.com/tr?id=4268533853363514&ev=PageView&noscript=1"/></noscript>
<!-- End Facebook Pixel Code -->

  </head>

  <body class="defult-home">
      <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5XNG3TQC"
        height="0" width="0" class="gtm-noscript-iframe"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

    <?php include('header.php'); ?>

    <!-- ===== Main ===== -->
    <main class="main-content">
      
      <!-- ===== Slider ===== -->
        <h2 class="sr-only">Cold Chain Highlights</h2>
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
                  $bannerPath = sr_preferred_image_path('admin/uploads/' . $banner['image']);
                  echo '<img ' . $bannerAttrs . ' src="' . htmlspecialchars($bannerPath, ENT_QUOTES) . '"' . sr_image_size_attrs($bannerPath) . ' alt="Cold Storage" title="#hero-caption" />' . "\n";
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
                        Singhania Refrigeration offers design, installation and maintenance of cold rooms, CA/MA stores, ammonia and freon refrigeration plants, ripening chambers, IQF systems and transport refrigeration to businesses in Delhi NCR. With 25 years of cold chain expertise through the Singhania Group, we offer safe, energy efficient and reliable cold storage solutions from Okhla, New Delhi to clients across India.
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

        <!-- ===== TRUST BAR ===== -->
        <marquee class="notice-banner" behavior="scroll" direction="left" scrollamount="9">
          ✅&nbsp; 25 Years Cold Chain Expertise (Singhania Group)
          &nbsp;&nbsp;|&nbsp;&nbsp;
          🏭&nbsp; 10+ Years as Singhania Refrigeration
          &nbsp;&nbsp;|&nbsp;&nbsp;
          ⚙️&nbsp; 99.9% System Uptime
          &nbsp;&nbsp;|&nbsp;&nbsp;
          🌍&nbsp; Pan-India Project Delivery
          &nbsp;&nbsp;|&nbsp;&nbsp;
          📋&nbsp; FSSAI &amp; WHO-GMP Aligned Systems
        </marquee>
        <!-- ===== TRUST BAR END ===== -->
      <!-- ===== Mini Services ===== -->
      <div class="rs-services style1 pt-100 pb-84 md-pt-80 md-pb-64">
        <div class="container" data-animate>
          <h2 class="sr-only">Cold Chain Service Highlights</h2>
          <div class="row gutter-16">
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/1.webp" width="140" height="140" alt="Turnkey cold chain project execution icon"></div>
                <div class="content-part">
                  <h3 class="title"><a href="services-single.html">Turnkey Execution</a></h3>
                  <p>Full turnkey cold storage and industrial refrigeration solutions – design, equipment supply, installation and commissioning, all in-house by our own engineering team for smooth accountable delivery from start to finish.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/2.webp" width="70" height="70" alt="Energy efficient refrigeration system icon"></div>
                <div class="content-part">
                  <h3 class="title"><a href="services-single.html">Energy Efficiency</a></h3>
                  <p>High efficiency compressors, advanced PUF insulation and smart controls help reduce running costs by up to 30% compared with conventional cold storage systems, while maintaining precise temperature control.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/3.webp" width="140" height="140" alt="99.9% uptime cold storage reliability icon"></div>
                <div class="content-part">
                  <h3 class="title"><a href="services-single.html">99.9% Uptime</a></h3>
                  <p>Preventive maintenance and rapid-response AMC support 24 hours a day, 365 days a year keep your cold room, CA store or refrigeration plant running reliably.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" src="assets/images/services/icons/4.webp" width="70" height="70" alt="Pan-India refrigeration service icon"></div>
                <div class="content-part">
                  <h3 class="title"><a href="services-single.html">Pan-India Service</a></h3>
                  <p>Okhla, New Delhi certified refrigeration engineers offer installation and after sales support to clients across Delhi NCR – Noida, Gurgaon and Faridabad and pan India.</p>
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
              <picture>
                <source srcset="assets/images/4.webp" type="image/webp">
                <img loading="lazy" decoding="async" class="img-soft" src="assets/images/4.jpg" width="585" height="583" alt="Cold Storage Plant">
              </picture>
            </div>
            <div class="col-lg-6 pl-66 pt-75 pb-75 md-pt-42 md-pb-72" data-animate>
              <div class="sec-title mb-24">
                <h2 class="title mb-0"> <span class="section-title-accent">India's Most Trusted Refrigeration & Cold Chain Supplier </span></h2>
              </div>
              <p class="mb-20">
                Singhania Refrigeration is an industrial refrigeration and cold storage solution company based in Okhla, New Delhi. We design, manufacture, install and maintain cold rooms, CA/MA stores, ammonia and freon refrigeration plants, ripening chambers, IQF systems, compressor racks, PUF panels, dock shelters and transport refrigeration for clients across Delhi NCR and India, backed by 25 years of cold chain and logistics experience through the Singhania Group.
              </p>
              <p class="mb-20">
                <strong>What does Singhania Refrigeration do?</strong> We offer the complete cold chain infrastructure - from site assessment and engineering design to equipment supply, civil work, installation, commissioning and continued maintenance - for food processing, pharmaceutical, dairy, agri-export and logistics enterprises, with systems in keeping with FSSAI and WHO-GMP standards.
              </p>
              <p class="mb-20">
                We have a team of certified refrigeration engineers in-house who take care of every project, meaning there are no third-party coordination gaps, and no accountability gaps, from the first site visit to final handover and beyond.
              </p>
              <!-- Bullet list — Why choose us -->
              <p><strong>Why Delhi NCR businesses choose us:</strong></p>
              <ul class="tt-list">
                <li>25 years of cold chain engineering experience through the Singhania Group</li>
                <li>10+ years operating as Singhania Refrigeration, with a growing pan-India project base</li>
                <li>Energy-efficient refrigeration systems engineered to reduce electricity consumption vs conventional installations</li>
                <li>99.9% system uptime backed by structured preventive maintenance and AMC services</li>
                <li>Systems designed in line with FSSAI compliant cold storage and WHO-GMP pharma cold room requirements</li>
              </ul>
              <!-- <p class="mb-20">
                We aim to provide services that have perfect temperature control, superb energy efficiency, and flawless operation throughout the entire process, starting from the moment of conception to the end. From fields of Gujarat to plates of families in Delhi NCR.
              </p> -->
              <div class="menu-cta menu-cta--flush">
                  <!-- <a class="btn-cfa" href="about-us.php">Learn more</a> -->
                  <a class="btn-cfa" href="about-us.php" aria-label="Learn more about Singhania Refrigeration">Learn more</a>
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
            <h2 class="title mb-0">Cold Chain &amp; Refrigeration Services in Delhi NCR &amp; India</h2>
            <p class="about-copy--lead">Singhania Refrigeration, located in Okhla, New Delhi, offers  the entire spectrum of cold chain and industrial refrigeration solutions for your  product, industry and regulatory requirements, whether you are operating a food  processing plant, pharmacy, dairy or 3PL warehouse.
            </p>
          </div>

          <div class="row gutter-16">
            <!-- Service 1 -->
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" class="truck-service-icon" src="assets/images/services/icons/modify/refrigerated-truck-acs-containers.webp" width="200" height="200" alt="Refrigerated truck AC and container unit"></div>
                <div class="content-part">
                  <h3 class="title"><a href="truck-ac.php">Refrigerated Truck ACs</a> &amp; <a href="truck-refrigerator-container.php">Containers</a></h3>
                  <div class="desc">Transport Refrigeration Units for trucks and reefer containers, keeping Perishables – Food, Dairy and Pharma Products, temperature controlled on routes across Delhi NCR and Pan India.</div>
                </div>
              </div>
            </div>

            <!-- Service 2 -->
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" class="service-card-icon" src="assets/images/services/icons/modify/cold-storage-warehouse.webp" width="200" height="200" alt="Cold room and cold storage solution"></div>
                <div class="content-part">
                  <h3 class="title"><a href="cold-storage-refrigeration-units.php">Cold Rooms &amp; Storage Solutions</a></h3>
                  <div class="desc">Cold rooms based on ammonia and freon, Controlled Atmosphere (CA) stores, Ripening Chambers &amp; Blast Freezer Systems, designed to meet the shelf-life and temperature requirements of your product.</div>
                </div>
              </div>
            </div>

            <!-- Service 3 -->
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" class="service-card-icon" src="assets/images/services/icons/modify/compressor-rack-systems.webp" width="200" height="200" alt="Industrial compressor rack system"></div>
                <div class="content-part">
                  <h3 class="title"><a href="compressor-rack-system.php">Compressor Rack Systems</a></h3>
                  <div class="desc">Centralised, energy efficient compressor rack systems for supermarkets, food retail chains and large cold storage warehouses, reducing refrigerant charge and maintenance.</div>
                </div>
              </div>
            </div>

            <!-- Service 4 -->
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" class="service-card-icon" src="assets/images/services/icons/modify/ammonia-refrigeration-units.webp" width="200" height="200" alt="Ammonia refrigeration unit"></div>
                <div class="content-part">
                  <h3 class="title"><a href="ammonia-refrigeration-units.php">Ammonia Refrigeration Units</a></h3>
                  <div class="desc">Industrial grade ammonia (NH3) and Freon refrigeration plants are for food processing units, large cold storage warehouses, fisheries and dairy operations requiring high capacity and energy efficient cooling</div>
                </div>
              </div>
            </div>

            <!-- Service 5 -->
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" class="service-card-icon" src="assets/images/services/icons/modify/ripening-chambers.webp" width="200" height="200" alt="Ripening chamber for fruits and produce"></div>
                <div class="content-part">
                  <h3 class="title"><a href="ripening-systems.php">Ripening Chambers</a></h3>
                  <div class="desc">Ethylene-controlled ripening chambers for bananas, mangoes, papayas and other climacteric fruits, delivering consistent, ready-to-sell ripening for every pallet.</div>
                </div>
              </div>
            </div>

            <!-- Service 6 -->
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" class="service-card-icon" src="assets/images/services/icons/modify/iqf-technology.webp" width="200" height="200" alt="IQF individual quick freezing technology"></div>
                <div class="content-part">
                  <h3 class="title"><a href="iqf.php">IQF Technology</a></h3>
                  <div class="desc">Individual Quick Freeze (IQF) machine systems flash-freeze seafood, fruits, vegetables and ready-to-eat products for export-quality output and to preserve texture, nutrition and appearance.</div>
                </div>
              </div>
            </div>

            <!-- Service 7 -->
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" class="service-card-icon" src="assets/images/services/icons/modify/puf-panels-insulated-doors.webp" width="200" height="200" alt="PUF panel and insulated cold storage door"></div>
                <div class="content-part">
                  <h3 class="title"><a href="panels.php">PUF Panels</a> &amp; <a href="doors-ca-doors.php">Insulated Doors</a></h3>
                  <div class="desc">High density PUF panel insulation and cold room doors that make up the thermal envelope of your cold storage facility – designed for airtight insulation and minimal energy loss.</div>
                </div>
              </div>
            </div>

            <!-- Service 8 -->
            <div class="col-lg-3 col-sm-6 mb-16">
              <div class="service-wrap">
                <div class="icon-part"><img loading="lazy" decoding="async" class="service-card-icon" src="assets/images/services/icons/modify/dock-shelters-dock-levelers.webp" width="200" height="200" alt="Dock shelter and dock leveler equipment"></div>
                <div class="content-part">
                  <h3 class="title"><a href="dock-shelter-dock-leveler.php">Dock Shelters &amp; Dock Levelers</a></h3>
                  <div class="desc">Dock Shelter and Leveler Systems seal the gap between your cold facility and delivery vehicles. Protect product temperature while loading and unloading.</div>
                </div>
              </div>
            </div>
            <div class="col-12 tt-cta services-products-cta">
              <a href="products.php" class="btn btn-primary">Explore Our Products</a>
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
              <?php $productImage = "admin/uploads/" . $product['image']; ?>
              <?php $productWebp = sr_webp_path($productImage); ?>
              <?php if ($productWebp !== ''): ?><picture><source srcset="<?php echo htmlspecialchars($productWebp, ENT_QUOTES); ?>" type="image/webp"><?php endif; ?>
              <img loading="lazy" decoding="async" class="img-soft" src="<?php echo htmlspecialchars($productImage, ENT_QUOTES); ?>"<?php echo sr_image_size_attrs(sr_preferred_image_path($productImage)); ?> alt="Cold Storage Equipment">
              <?php if ($productWebp !== ''): ?></picture><?php endif; ?>
            </div>
            <div class="content-part">
              <h3 class="title"><a href="products.php"><?php echo $product['title'];?></a></h3>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>

      <!-- ===== Testimonials ===== -->
      <div class="rs-testimonial style1 gray-bg pt-92 md-pt-72">
        <div class="container" data-animate>
          <div class="sec-title text-center mb-54 md-mb-39">
            <div class="sub-title primary">TESTIMONIAL</div>
            <h2 class="title mb-0">What Our Clients Say</h2>
          </div>
          <div class="white-bg testimonial-shell">
            <div class="row">
              <div class="col-lg-6 pr-0 md-pl-pr-15"><div class="bg-part md-pt-200 md-pb-200"><span class="testimonial-left-icon" role="img" aria-label="Customer feedback"><i class="" aria-hidden="true"></i></span></div></div>
              <div class="col-lg-6 slider-part">
                <div class="rs-carousel owl-carousel dot-style1" data-loop="true" data-items="1" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true" data-nav="false" data-center-mode="false">
                  <div class="testi-item">
                    <div class="content-part text-center">
                      <div class="icon-part testimonial-quote"><i class="fa fa-quote-left"></i></div>
                      <div class="desc">Singhania Refrigeration delivered our entire CA store on time, within budget and to   exact specification. We have not had a single unplanned downtime in over a year.</div>
                    </div>
                    <div class="posted-by text-center">
                      <div class="avatar"><span class="testimonial-avatar-icon" role="img" aria-label="Customer avatar"><i class="fa fa-user" aria-hidden="true"></i></span></div>
                      <h3 class="name">Operations Director</h3><span class="designation">Agri-Export Company, Delhi NCR</span>
                    </div>
                  </div>
                  <div class="testi-item">
                    <div class="content-part text-center">
                      <div class="icon-part testimonial-quote"><i class="fa fa-quote-left"></i></div>
                      <div class="desc">We needed a WHO-GMP-aligned pharma cold room on a tight deadline. Singhania's team
                                      handled the complete turnkey delivery — design, panels, refrigeration and documentation
                                      — without a single coordination issue.</div>
                    </div>
                    <div class="posted-by text-center">
                      <div class="avatar"><span class="testimonial-avatar-icon" role="img" aria-label="Customer avatar"><i class="fa fa-user" aria-hidden="true"></i></span></div>
                      <h3 class="name">Operations Head</h3><span class="designation">Pharmaceutical Distributor, New Delhi</span>
                    </div>
                  </div>
                  <div class="testi-item">
                    <div class="content-part text-center">
                      <div class="icon-part testimonial-quote"><i class="fa fa-quote-left"></i></div>
                      <div class="desc">Their AMC support has been dependable for our cold storage plant. Whenever there is a service requirement, the response is practical and fast, which helps us avoid unnecessary downtime.</div>
                    </div>
                    <div class="posted-by text-center">
                      <div class="avatar"><span class="testimonial-avatar-icon" role="img" aria-label="Customer avatar"><i class="fa fa-user" aria-hidden="true"></i></span></div>
                      <h3 class="name">Manoj Aggarwal</h3><span class="designation">Cold Storage Owner, Kundli</span>
                    </div>
                  </div>
                  <div class="testi-item">
                    <div class="content-part text-center">
                      <div class="icon-part testimonial-quote"><i class="fa fa-quote-left"></i></div>
                      <div class="desc">We got a controlled temperature room installed for our pharma inventory in Noida. The finishing, insulation work, and after-installation checks were handled properly by their team.</div>
                    </div>
                    <div class="posted-by text-center">
                      <div class="avatar"><span class="testimonial-avatar-icon" role="img" aria-label="Customer avatar"><i class="fa fa-user" aria-hidden="true"></i></span></div>
                      <h3 class="name">Neeraj Malhotra</h3><span class="designation">Pharma Warehouse Manager, Noida</span>
                    </div>
                  </div>
                  <div class="testi-item">
                    <div class="content-part text-center">
                      <div class="icon-part testimonial-quote"><i class="fa fa-quote-left"></i></div>
                      <div class="desc">For our fruit and vegetable storage, they suggested a practical cold room setup instead of overselling. The cooling is uniform and the maintenance team is easy to reach.</div>
                    </div>
                    <div class="posted-by text-center">
                      <div class="avatar"><span class="testimonial-avatar-icon" role="img" aria-label="Customer avatar"><i class="fa fa-user" aria-hidden="true"></i></span></div>
                      <h3 class="name">Sandeep Yadav</h3><span class="designation">Vegetable Supplier, Gurugram</span>
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
          position:relative; overflow:hidden;
          transition:transform .35s ease, box-shadow .35s ease, border-color .35s ease;
        }
        .innov-card:before{
          content:""; position:absolute; left:0; right:0; bottom:0; height:100%;
          background:#082243; border-radius:16px 16px 0 0;
          transform:translateY(100%); transition:transform .65s ease; z-index:0;
        }
        .innov-card:hover:before{ transform:translateY(0); }
        .innov-card > *{ position:relative; z-index:1; }
        .innov-card:hover{
          transform:translateY(-6px);
          box-shadow:0 18px 40px rgba(15,36,66,.18);
          border-color:rgba(8,34,67,.18);
        }
        .innov-icon{
          width:48px; height:48px; border-radius:12px; display:inline-flex; align-items:center; justify-content:center;
          background:linear-gradient(180deg,#6c63ff,#3b5bb7); color:#fff; font-size:22px; box-shadow:0 8px 20px rgba(108,99,255,.28);
          margin-bottom:12px; transition:background .3s ease .42s, color .3s ease .42s, transform .35s ease;
        }
        .innov-card h3{ margin:0 0 6px; color:#0f2442; font-size:20px; font-weight:800; transition:color .35s ease .24s; }
        .innov-card p{ margin:0; color:#42507a; transition:color .35s ease .08s; }
        .innov-card:hover .innov-icon{
          background:#ffffff;
          color:#082243;
          transform:scale(1.08);
        }
        .innov-card:hover h3,
        .innov-card:hover p{ color:#ffffff !important; }
        
        @media (max-width: 991.98px){
          .innov-section{ padding:64px 0; }
        }
        </style>

      <!-- ===== Innovation That Drives Trust ===== -->
     <section class="innov-section section-pad" data-animate>
          <div class="container">
            <div class="row justify-content-center text-center">
              <div class="col-lg-10">
                <span class="innov-eyebrow">WHY CHOOSE US</span>
                <h2 class="innov-title">Engineered for Reliability, Built for Tomorrow</h2>
                <p class="innov-lead">
                 Singhania Refrigeration builds reliability into every cold room, CA store and refrigeration plant that we build. Reliability is not an afterthought.
                </p>
              </div>
            </div>
        
            <!-- 2×2 feature cards -->
            <div class="row innov-grid">
              <div class="col-md-6 col-lg-6 mb-3" data-animate>
                <div class="innov-card">
                  <div class="innov-icon"><i class="fa fa-recycle" aria-hidden="true"></i></div>
                  <h3>Reduced Wastage &amp; Losses</h3>
                  <p class="text-justify">Precision temperature control and CA/MA technology keep products fresh from storage to transit, reducing cold chain losses in food and agri businesses.</p>
                </div>
              </div>
        
              <div class="col-md-6 col-lg-6 mb-3" data-animate>
                <div class="innov-card">
                  <div class="innov-icon"><i class="fa fa-bolt" aria-hidden="true"></i></div>
                  <h3>Lower Energy Consumption</h3>
                  <p class="text-justify">Energy-efficient refrigeration with high-efficiency compressors, PUF insulation and smart controls that minimize operating costs without compromising temperature stability.</p>
                </div>
              </div>
        
              <div class="col-md-6 col-lg-6 mb-3" data-animate>
                <div class="innov-card">
                  <div class="innov-icon"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
                  <h3>Improved Uptime</h3>
                  <p class="text-justify">We do preventive maintenance and AMC services. We also give equipment redundancy to ensure 99.9% system availability across our installed base.</p>
                </div>
              </div>
        
              <div class="col-md-6 col-lg-6 mb-3" data-animate>
                <div class="innov-card">
                  <div class="innov-icon"><i class="fa fa-shield" aria-hidden="true"></i></div>
                  <h3>Safety &amp; Compliance</h3>
                  <p class="text-justify">Systems for FSSAI compliant cold storage and WHO-GMP pharma cold room applications with auditable temperature logs and alarms for food and pharmaceutical cold storage.</p>
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
        .tt-lead{ font-size:clamp(15px,1.7vw,17px); color:#2c3e68; margin-bottom:16px; text-align: justify; }
        .tt-desc{ color:#44527a; margin-bottom:20px; }
        
        .tt-list{ list-style:none; padding:0; margin:0 0 18px; display:grid; gap:12px; text-align: justify; }
        .tt-list li{ position:relative; padding-left:32px; color:#2d3c63; line-height:1.55; text-align: justify;}
        .tt-list li:before{
          content:""; position:absolute; left:0; top:.35em; width:18px; height:18px; border-radius:50%;
          background:conic-gradient(from 180deg,#3b5bb7,#2a427f); box-shadow:inset 0 0 0 3px #fff;
        }
        
        .tt-cta{ display:flex; gap:12px; flex-wrap:wrap; margin-top:6px; }
        .tt-cta-center{
          justify-content:center;
          align-items:center;
          margin-top:34px;
        }
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
          .tt-cta-center{ margin-top:24px; }
        }
        </style>


      <!-- ===== Towards Tomorrow ===== -->
      <section class="tt-section section-soft" data-animate>
          <div class="container">
            <div class="row align-items-center">
              <!-- CONTENT -->
              <div class="col-lg-7 tt-col-text" data-animate>
                <!-- <span class="tt-eyebrow">Advanced Cold Chain &amp; Refrigeration Services</span> -->
                 <span class="tt-eyebrow">OUR EXPERTISE</span>
                <h2 class="tt-title">Advanced Cold Chain &amp; Refrigeration Solutions in India</h2>
                <p class="tt-lead">
                   Singhania Refrigeration provides cold chain &amp; industrial refrigeration solutions for food processing, pharmaceuticals, dairy, agri-export &amp; logistics in Delhi NCR &amp; India. Our energy efficient ammonia and freon refrigeration systems are designed to ensure product quality from production to final delivery.
                </p>
                <p class="tt-desc">
                  Our core solutions include:
                </p>
                <ul class="tt-list">
                  <li><a href="turnkey-solution.php">Turnkey cold storage and refrigeration project execution</a> &mdash; from design to commissioning and AMC.</li>
                  <li><a href="segments-wise.php">Segment-specific cold chain solutions</a> for dairy, pharma, seafood and agriculture.</li>
                  <li><a href="cold-chain-refrigeration-ca-store-freon-ammonia.php">Cold chain refrigeration, CA store and ammonia/freon systems</a>.</li>
                  <li><a href="quality-monitoring-solution.php">Real-time quality monitoring for cold storage</a> with IoT sensors and audit trails.</li>
                  <li><a href="ware-house-management.php">End-to-end warehouse management system</a> for cold chain operations.</li>
                  <li><a href="transport-management.php">Cold chain transport management</a> for reliable in-transit visibility.</li>
                  <li><a href="transport-refrigeration.php">Transport refrigeration solutions</a> for reefer trucks and insulated vehicles.</li>
                </ul>
                <!-- <ul class="tt-list">
                  <li>Advanced cold storage and refrigeration systems for industrial applications</li>
                  <li>Energy-efficient ammonia and freon-based cooling solutions</li>
                  <li>End-to-end cold chain infrastructure for logistics and warehousing</li>
                </ul> -->
                <br>
                <!-- <div class="tt-cta">
                  <a href="contact.php" class="btn btn-primary">Talk to an Expert</a>
                  <a href="products.php" class="btn-link">Explore Our Products →</a>
                </div> -->
              </div>
        
              <!-- VISUAL -->
              <div class="col-lg-5 tt-col-visual md-mt-40" data-animate>
                <div class="tt-visual">
                  <!-- Replace src with your image -->
                  <img loading="lazy" decoding="async" class="tt-img" src="admin/uploads/Blog-Image-Cold-Chain-Logistics.jpg" width="1110" height="791" alt="Industrial Refrigeration and Cold Storage">
                  <div class="tt-stats">
                    <div class="tt-chip"><span class="tt-dot"></span> 10+ Years</div>
                    <div class="tt-chip"><span class="tt-dot"></span> 99.9% Uptime</div>
                    <div class="tt-chip"><span class="tt-dot"></span> Pan-India</div>
                    <div class="tt-chip"><span class="tt-dot"></span> Energy-Smart</div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="tt-cta tt-cta-center">
                  <a href="contact.php" class="btn btn-primary">Talk to an Expert</a>
                  <a href="products.php" class="btn-link">Explore Our Products →</a>
                </div>
              </div>
            </div>
          </div>
        </section>

      <style>
        /* === FAQ Section (scoped) === */
        .faq-section{ padding:88px 0; background:#ffffff; }
        .faq-eyebrow{
          display:inline-block; font-weight:700; font-size:12px; letter-spacing:.12em; text-transform:uppercase;
          padding:6px 10px; border-radius:999px; background:#e9eeff; color:#1a2b6b; margin-bottom:12px;
        }
        .faq-title{ font-size:clamp(26px,3.4vw,36px); line-height:1.15; font-weight:800; color:#0f2442; margin:0; }
        .faq-lead{ color:#44527a; max-width:760px; margin:12px auto 0; }
        .faq-list{ max-width:980px; margin:34px auto 0; display:grid; gap:12px; }
        .faq-list details{
          background:#fff;
          border:1px solid rgba(15,36,66,.08);
          border-radius:12px;
          box-shadow:0 10px 26px rgba(15,36,66,.06);
          overflow:hidden;
          transition:border-color .2s ease, box-shadow .2s ease;
        }
        .faq-list details[open]{ border-color:rgba(59,91,183,.22); box-shadow:0 16px 34px rgba(15,36,66,.10); }
        .faq-list summary{
          cursor:pointer;
          list-style:none;
          position:relative;
          padding:18px 52px 18px 20px;
          color:#0f2442;
          font-size:17px;
          line-height:1.45;
        }
        .faq-list summary::-webkit-details-marker{ display:none; }
        .faq-list summary:after{
          content:"+";
          position:absolute;
          right:20px;
          top:50%;
          transform:translateY(-50%);
          width:26px;
          height:26px;
          border-radius:50%;
          background:#eef2ff;
          color:#1a2b6b;
          display:flex;
          align-items:center;
          justify-content:center;
          font-weight:800;
        }
        .faq-list details[open] summary:after{ content:"-"; }
        .faq-list details p{
          margin:0;
          padding:0 20px 20px;
          color:#44527a;
          line-height:1.7;
        }
        @media (max-width: 991.98px){
          .faq-section{ padding:64px 0; }
        }
      </style>

      <!-- ===== FAQ SECTION — FAQPage Schema target ===== -->
      <section id="faqs" class="faq-section" data-animate>
        <div class="container">
          <div class="row justify-content-center text-center">
            <div class="col-lg-10">
              <span class="faq-eyebrow">FAQS</span>
              <h2 class="faq-title">Frequently Asked Questions</h2>
              <p class="faq-lead">Quick answers about Singhania Refrigeration's cold storage, refrigeration and cold chain services.</p>
            </div>
          </div>

          <div class="faq-list">
            <details>
              <summary><strong>What services does Singhania Refrigeration offer?</strong></summary>
              <p>We offer turnkey cold storage construction, cold rooms and CA/MA stores, ammonia and freon refrigeration plants, IQF systems, ripening chambers, compressor rack systems, PUF panels, dock shelters, transport refrigeration and cold chain consulting.</p>
            </details>

            <details>
              <summary><strong>Where is Singhania Refrigeration located?</strong></summary>
              <p>Our office is at C-19, Okhla Phase-I, New Delhi - 110020. We serve clients across Delhi NCR, including Noida, Gurgaon and Faridabad, and execute projects pan-India.</p>
            </details>

            <details>
              <summary><strong>Which industries do you serve?</strong></summary>
              <p>We design cold storage and refrigeration systems for food processing, pharmaceuticals, dairy, agri-export and logistics businesses, with systems aligned to FSSAI and WHO-GMP standards.</p>
            </details>

            <details>
              <summary><strong>How experienced is the Singhania Refrigeration team?</strong></summary>
              <p>Our engineering team draws on 25 years of cold chain and logistics experience through the Singhania Group, delivering ammonia refrigeration, CA storage, IQF and transport refrigeration projects across India.</p>
            </details>

            <details>
              <summary><strong>How quickly will I hear back after submitting an enquiry?</strong></summary>
              <p>Our engineering team responds to all enquiries within 24 hours to discuss your cold storage or refrigeration requirements.</p>
            </details>

            <details>
              <summary><strong>What is controlled atmosphere storage?</strong></summary>
              <p>Controlled atmosphere (CA) storage is a cold storage method that regulates oxygen, carbon dioxide and humidity levels inside a sealed store, alongside temperature, to slow the ripening and respiration of fruits and vegetables. This extends shelf life far beyond standard refrigeration alone, making it the preferred storage format for agri-export businesses handling apples, pears and other long-storage produce.</p>
            </details>

            <details>
              <summary><strong>Ammonia vs freon refrigeration - which is better?</strong></summary>
              <p>Ammonia refrigeration plants are generally more energy-efficient and better suited to large-capacity industrial cold storage, such as food processing units and warehouses, but require stricter safety handling due to toxicity. Freon (HFC/HCFC) refrigeration systems are easier to maintain and commonly used in smaller cold rooms and retail cold storage. The right choice depends on capacity, budget and safety infrastructure - our engineering team assesses this during the site visit.</p>
            </details>

            <details>
              <summary><strong>How does an IQF system work?</strong></summary>
              <p>An IQF (Individual Quick Freeze) machine rapidly freezes individual food items, such as seafood, fruit pieces or vegetables, using high-velocity cold air or cryogenic methods, so each piece freezes separately rather than clumping together. This locks in texture, nutrition and appearance, which is why IQF machine technology is the standard for export-quality frozen food production.</p>
            </details>

            <details>
              <summary><strong>How can I reduce cold storage energy consumption?</strong></summary>
              <p>Cold storage energy consumption can be reduced through high-efficiency compressors, properly sized PUF panel insulation, smart temperature controls, regular preventive maintenance and AMC services, and minimising door-opening losses with dock shelters and dock levelers. Singhania Refrigeration's energy-efficient refrigeration systems are engineered to cut running costs by up to 30% compared with conventional installations.</p>
            </details>
          </div>
        </div>
      </section>
      <!-- ===== END FAQ SECTION ===== -->


      <!-- ===== Contact ===== -->
      <div class="rs-contact style1 pt-100 pb-100 md-pt-80 md-pb-80">
        <div class="container">
          <div class="white-bg contact-wrap" data-animate>
            <div class="row align-items-center">
              <!-- LEFT: form -->
              <div class="col-lg-7 form-part">
                <div class="sec-title mb-20">
                  <!-- H2 -->
                  <h2 class="title mb-0">Get In Touch — Cold Storage &amp; Refrigeration Solutions in Okhla, Delhi NCR</h2>

                  <!-- Intro paragraph -->
                  <p class="contact-sub">
                    Looking for cold storage solutions, an industrial refrigeration company or cold chain
                    consulting near you? Fill in the form and our engineering team will respond within
                    24 hours.
                  </p>
                  <!-- <h2 class="title mb-0">Get In Touch</h2>
                  <p class="contact-sub">Fill the form and we’ll reach out within 24 hours.</p> -->
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
                    <!-- <div class="col-md-12"> -->
                      <div class="submit-btn"><button type="submit" class="readon flex-center" name="submit">Submit Now</button></div>
                    <!-- </div> -->
                  </div>
                </form>
              </div>

              <!-- RIGHT: image -->
              <div class="col-lg-5 text-center md-mt-40">
                <div class="contact-side text-left">
                  <div>
                    <!-- GEO areas — bold tag pills for local/AI search matching -->
                    <p class="contact-areas">
                      <strong>Areas We Serve:</strong>
                      <span class="contact-area-tags">
                        <span>Okhla</span>
                        <span>South Delhi</span>
                        <span>New Delhi</span>
                        <span>Delhi NCR</span>
                        <span>Noida</span>
                        <span>Gurgaon</span>
                        <span>Faridabad</span>
                        <span>Pan-India</span>
                      </span>
                    </p>
                  </div>
                  <img loading="lazy" decoding="async" src="assets/images/contact/contact-us.png" width="740" height="740" alt="Cold Storage Support" class="contact-img">
                </div>
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
                <!-- Eyebrow -->
                <span class="sub-title primary right-line">LATEST NEWS</span>
                <!-- H2 -->
                <h2 class="title mb-0 text-justify">Read Latest Updates — Cold Storage &amp; Cold Chain Insights</h2>
                <!-- Intro -->
                <p>Practical guidance on cold storage, industrial refrigeration, energy efficiency and cold chain compliance — written by our in-house refrigeration engineers.</p>
                <!-- <span class="sub-title primary right-line">LATEST NEWS</span>
                <h2 class="title mb-0">Read Latest Updates</h2> -->
              </div>
            </div>
            <div class="col-md-6">
              <div class="btn-part text-right sm-text-left">
                <a class="readon" href="blog.php">View All Blogs</a>
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
                  <?php $blogImage = (!empty($row['image']) && is_file(__DIR__ . "/admin/uploads/" . $row['image'])) ? "admin/uploads/" . $row['image'] : "admin/uploads/docking-facility.webp"; ?>
                  <?php $blogWebp = sr_webp_path($blogImage); ?>
                  <?php if ($blogWebp !== ''): ?><picture><source srcset="<?php echo htmlspecialchars($blogWebp, ENT_QUOTES); ?>" type="image/webp"><?php endif; ?>
                  <img loading="lazy" decoding="async" class="img-soft blog-cover-img" src="<?php echo htmlspecialchars($blogImage, ENT_QUOTES); ?>"<?php echo sr_image_size_attrs(sr_preferred_image_path($blogImage)); ?> alt="Cold Storage Blog">
                  <?php if ($blogWebp !== ''): ?></picture><?php endif; ?>
                  <div class="fly-btn"><a href="blog-details.php?id=<?php echo $row['id'];?>"><i class="flaticon-right-arrow"></i></a></div>
                </div>
                <div class="content-part">
                  <span class="categories"><?php echo $row['category_name'];?></span>
                  <h3 class="title"><a href="blog-details.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></h3>
                  <div class="blog-meta">
                    <div class="user-data"><img loading="lazy" decoding="async" src="assets/images/blog/avatar/1.png" width="40" height="40" alt="Customer Review"><span>Singhania</span></div>
                    <div class="date"><i class="fa fa-clock-o"></i> <?php echo $row['created_at'];?></div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

    </main>
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
          <h2 class="modal-title">Quick Connect</h2>
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
.rs-services .service-wrap .title,
.portfolio-item .content-part .title{ margin:8px 0 6px; font-size:18px; line-height:28px; }
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
      loop: false,
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
